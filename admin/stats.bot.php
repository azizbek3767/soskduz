<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$visitorId = getRequestVar('visitorId');
	$page      = (int) getRequestVar('page');

	$dsCookieName = 'botDateSelector';
	include('stats.date-selector.php');
	include('stats.type-selector.php');

	if($page < 1){
		$page = 1;
		$smarty->assign('page', $page);
	}
	$itemsPerPage = 25;
	$sortVisits = false;

	/* get information about visitor */
	$join = array('stats_visits'=>'ON(stats_visitors.visitorId=stats_visits.visitorId AND isFirst = 1)', 'stats_user_agents'=>'ON(stats_visitors.userAgentId = stats_user_agents.userAgentId)');
	$fields = 'stats_visitors.visitorId, firstVisitOn, referer, visitorIp, userAgent, isBot, visitId, typeId';
	$visitor = dbQuery('stats_visitors', DB_ARRAY, array('fields'=>$fields, 'where'=>"stats_visitors.visitorId='$visitorId'", 'join'=>$join));
	if(empty($visitor)) die('Visitor Not Found');
	$visitor['firstVisitOn'] = adjustTime($visitor['firstVisitOn']);
	if(!$visitor['isBot']){
		header("HTTP/1.0 301 Moved Permanently");
		header("Location: ".SITE_URL."/admin/stats.visitor.php?visitorId=$visitorId".(!empty($filterTypeId) ? "&filterTypeId=$filterTypeId" : ''));
		exit;
	}

	$where[] = "visitDate >= '$dateStart'";
	$where[] = "visitDate <= '$dateEnd'";
	$where[] = "visitorId = '$visitorId'";
	if(!empty($filterTypeId)) $where[] = "typeId = '$filterTypeId'";

	/* get visits */
	$visits = dbQuery('stats_visits', DB_ARRAYS, array('where'=>$where, 'start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'visitDate DESC', 'indexKey'=>'visitId'));

	if($visits){
		foreach($visits as $visitId=>$visit){
			$visits[$visitId]['typeName']  = lang('visitTypes:'.$visit['typeId']);
			$visits[$visitId]['visitDate'] = langdate(adjustTime($visit['visitDate'], false, 'd M, H:i:s'));
			$visitTypes[$visit['typeId']]  = $visit['typeId'];
		}
		$where2 = 'visitId IN('.implode(',', array_keys($visits)).')';

		/* section visits */
		if(!empty($visitTypes[2])){
			$sectionVisits = dbQuery('stats_section_visits', DB_ARRAYS, array('fields'=>'visitId, sections.sectionId, name, url', 'where'=>$where2, 'indexKey'=>'visitId', 'join'=>array('sections'=>'USING(sectionId)')));
			foreach($sectionVisits as $visitId=>$visit) $visits[$visitId] += $visit;
		}

		/* article visits */
		if(!empty($visitTypes[3])){
			$articleVisits = dbQuery('stats_article_visits', DB_ARRAYS, array('fields'=>'visitId, articles.articleId, title, url', 'where'=>$where2, 'indexKey'=>'visitId', 'join'=>array('articles'=>'USING(articleId)')));
			foreach($articleVisits as $visitId=>$visit) $visits[$visitId] += $visit;
		}

		/* search visits */
		if(!empty($visitTypes[4])){
			$searchVisits = dbQuery('stats_search_visits', DB_ARRAYS, array('fields'=>'visitId, searchQuery, searchPage', 'where'=>$where2, 'indexKey'=>'visitId'));
			foreach($searchVisits as $visitId=>$visit) $visits[$visitId] += $visit;
		}

		/* error visits */
		if(!empty($visitTypes[6])){
			$errorVisits = dbQuery('stats_error_visits', DB_ARRAYS, array('fields'=>'visitId, errorCode, requestUri, referer', 'where'=>$where2, 'indexKey'=>'visitId'));
			foreach($errorVisits as $visitId=>$visit){
				$visit += parseReferer($visit['referer']);
				$visits[$visitId] += $visit;
			}
		}

		/* RSS visits */
		if(!empty($visitTypes[7])){
			$rssVisits = dbQuery('stats_rss_visits', DB_ARRAYS, array('where'=>$where2, 'indexKey'=>'visitId'));
			foreach($rssVisits as $visitId=>$visit){
				if(!empty($SECTIONS[$visit['sectionId']])) $visit['section'] = $SECTIONS[$visit['sectionId']];
				$visits[$visitId] += $visit;
			}
		}
	}

	/* page numbering */
	$totalItems = dbQuery('stats_visits', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where));
	$pageNums = getPageNums($totalItems, $page, $itemsPerPage, 2, 1, 1, 2);
	$smarty->assign('pageNums', $pageNums);
	$smarty->assign('totalItems', $totalItems);

	/* get more information about visitor */
	if(!empty($visitor['visitId'])) $visitor['firstVisit'] = getVisitInfo($visitor['visitId']);
	$smarty->assign('visitor', $visitor);

	/* sort visits, because we've added hidden visit */
	if($sortVisits == true) usort($visits, 'sortByVisitDate');
	$smarty->assign('visits', $visits);
	$smarty->display('stats.bot.tpl');

	function sortByVisitDate(&$a, &$b){
		if ($a == $b) return 0;
		return (strtotime($a['visitDate']) < strtotime($b['visitDate'])) ? 1 : -1;
	}
	function getVisitInfo($visitId, $fromAdClick = false){
		global $allVisitTypes, $visits, $sortVisits;
		if(!empty($visits[$visitId])) return $visits[$visitId];
		$where = "visitId='$visitId'";
		$visit = dbQuery('stats_visits', DB_ARRAY, array('where'=>$where));
		$visit['typeName']  = lang('visitTypes:'.$visit['typeId']);
		$visit['visitDate'] = langdate(adjustTime($visit['visitDate'], false, 'd M, H:i:s'));
		switch($visit['typeId']){
			case 1:
			break;
			case 2:
				$visit += dbQuery('stats_section_visits', DB_ARRAY, array('fields'=>'sections.sectionId, name, url', 'join'=>array('sections'=>'USING(sectionId)'), 'where'=>$where));
			break;
			case 3:
				$visit += dbQuery('stats_article_visits', DB_ARRAY, array('fields'=>'articles.articleId, title, url', 'join'=>array('articles'=>'USING(articleId)'), 'where'=>$where));
			break;
			case 4:
				$visit += dbQuery('stats_search_visits', DB_ARRAY, array('fields'=>'searchQuery, searchPage', 'where'=>$where));
			break;
			case 6:
				$visit += dbQuery('stats_error_visits', DB_ARRAY, array('fields'=>'visitId, errorCode, requestUri, referer', 'where'=>$where));
				$visit['referer'] = parseReferer($visit['referer']);
			break;
			case 7:
				$visit += dbQuery('stats_rss_visits', DB_ARRAY, array('where'=>$where));
				if(!empty($SECTIONS[$visit['sectionId']])) $visit['section'] = $SECTIONS[$visit['sectionId']];
			break;
		}
		return $visit;
	}
?>
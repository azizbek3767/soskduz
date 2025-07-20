<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$page   = (int) getRequestVar('page');

	$dsCookieName = 'botsDateSelector';
	include('stats.date-selector.php');
	include('stats.type-selector.php');

	if($page < 1){
		$page = 1;
		$smarty->assign('page', $page);
	}
	$itemsPerPage = 25;
	$botNameLen = 100;

	$where[] = "visitDate >= '$dateStart'";
	$where[] = "visitDate <= '$dateEnd'";
	$where[] = "isBot = 1";
	if(!empty($filterTypeId)) $where[] = "typeId = '$filterTypeId'";

	$join = array('stats_visitors'=>'USING(visitorId)', 'stats_user_agents'=>'USING(userAgentId)');
	$visitors = dbQuery('stats_visits', DB_ARRAYS, array('fields'=>'stats_visits.visitorId, userAgent, COUNT(*) AS totalVisits', 'where'=>$where, 'join'=>$join, 'start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'totalVisits DESC', 'group'=>'stats_visits.visitorId', 'indexKey'=>'visitorId'));
	foreach($visitors as $visitorId=>$visitor){
		if(preg_match("/^(.*?)([a-z0-9\-_\.\/!: ]*($config[bot_id_regexp])[a-z0-9\-_\.\/!: ]*)(.*?)$/i", stripHtml($visitor['userAgent']), $matches)){
			$lengthLeft = ceil(($botNameLen - strlen($matches[2])) / 2);
			if($lengthLeft > 0) $visitors[$visitorId]['botName'] = strrev(stringTruncate(strrev($matches[1]), $lengthLeft));

			$visitors[$visitorId]['botName'] .= '<b>'.$matches[2].'</b>';

			$lengthLeft = $botNameLen - strlen($visitors[$visitorId]['botName']) + 7;
			if($lengthLeft > 0) $visitors[$visitorId]['botName'] .= stringTruncate($matches[4], $lengthLeft);
		}
		if(preg_match('/^<b>.+<\/b>$/i', $visitors[$visitorId]['botName'])){
			$visitors[$visitorId]['botName'] = preg_replace("/([a-z0-9\-_\.]*($config[bot_id_regexp])[a-z0-9\-_\.]*)/i", '<b>$1</b>', stripHtml($visitor['userAgent']), 1);
		}
	}
	$smarty->assign('visitors', $visitors);

	/* page numbering */
	$totalItems = dbQuery('stats_visits', DB_VALUE, array('fields'=>'COUNT(DISTINCT stats_visits.visitorId)', 'where'=>$where, 'join'=>$join));
	$pageNums = getPageNums($totalItems, $page, $itemsPerPage, 0, 4, 4, 0);
	$smarty->assign('pageNums', $pageNums);
	$smarty->assign('totalItems', $totalItems);

	$smarty->display('stats.bots.tpl');
?>
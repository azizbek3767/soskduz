<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$domain = getRequestVar('domain');
	$page   = (int) getRequestVar('page');

	include('stats.date-selector.php');
	include('stats.type-selector.php');

	if($page < 1){
		$page = 1;
		$smarty->assign('page', $page);
	}
	$itemsPerPage = 25;

	$where[] = "visitDate >= '$dateStart'";
	$where[] = "visitDate <= '$dateEnd'";
	$where[] = "isBot = 0";
	if(!empty($filterTypeId)) $where[] = "typeId = '$filterTypeId'";

	if(!empty($domain)){
		if($domain == 'unknown') $domain = '';
		$where[] = "REPLACE(SUBSTRING_INDEX(referer, '/', 3), 'www.', '')='$domain'";
	}

	$join = array('stats_visitors'=>'USING(visitorId)', 'stats_user_agents'=>'USING(userAgentId)');
	$visitors = dbQuery('stats_visits', DB_ARRAYS, array('fields'=>'stats_visits.visitorId, referer, firstVisitOn, COUNT(*) AS totalVisits', 'where'=>$where, 'join'=>$join, 'start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'firstVisitOn DESC', 'group'=>'stats_visits.visitorId', 'indexKey'=>'visitorId'));
	foreach($visitors as $visitorId=>$visitor){
		$visitor['firstVisitOn'] = langdate(adjustTime($visitor['firstVisitOn'], false, 'd.m.Y H:i'));
		if(!empty($visitor['referer'])) $visitor += parseReferer($visitor['referer']);
		$visitors[$visitorId] = $visitor;
	}
	$smarty->assign('visitors', $visitors);

	/* page numbering */
	$totalItems = dbQuery('stats_visits', DB_VALUE, array('fields'=>'COUNT(DISTINCT stats_visits.visitorId)', 'where'=>$where, 'join'=>$join));
	$pageNums = getPageNums($totalItems, $page, $itemsPerPage, 2, 4, 4, 2);
	$smarty->assign('pageNums', $pageNums);
	$smarty->assign('totalItems', $totalItems);

	$smarty->display('stats.visitors.tpl');
?>
<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$requestUri = getRequestVar('requestUri');
	$page       = (int) getRequestVar('page');

	include('stats.date-selector.php');

	if($page < 1){
		$page = 1;
		$smarty->assign('page', $page);
	}
	$itemsPerPage = 25;

	$where[] = "visitDate >= '$dateStart'";
	$where[] = "visitDate <= '$dateEnd'";
	$where[] = "requestUri = '$requestUri'";

	/* get visits */
	$join = array('stats_error_visits'=>'USING(visitId)');
	$visits = dbQuery('stats_visits', DB_ARRAYS, array('where'=>$where, 'join'=>$join, 'start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'visitDate DESC', 'indexKey'=>'visitId'));
	foreach($visits as $visitId=>$visit) $visits[$visitId]['visitDate'] = langdate(adjustTime($visit['visitDate'], false, 'd M, H:i:s'));

	/* page numbering */
	$totalItems = dbQuery('stats_visits', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where, 'join'=>$join));
	$pageNums = getPageNums($totalItems, $page, $itemsPerPage, 2, 4, 4, 2);
	$smarty->assign('pageNums', $pageNums);
	$smarty->assign('totalItems', $totalItems);

	$smarty->assign('visits', $visits);
	$smarty->display('stats.error.tpl');
?>
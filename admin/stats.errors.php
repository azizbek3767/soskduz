<?php
	include('../includes/admin.inc.php');

	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$domain = getRequestVar('domain');
	$page   = (int) getRequestVar('page');

	include('stats.date-selector.php');
	include('stats.error-code-selector.php');

	if($page < 1){
		$page = 1;
		$smarty->assign('page', $page);
	}
	$itemsPerPage = 25;

	$where[] = "visitDate >= '$dateStart'";
	$where[] = "visitDate <= '$dateEnd'";
	$where[] = "typeId = 6";
	if(!empty($filterErrorCode)) $where[] = "errorCode = '$filterErrorCode'";

	$join = array('stats_error_visits'=>'USING(visitId)');
	$errors = dbQuery('stats_visits', DB_ARRAYS, array('fields'=>'requestUri, referer, errorCode, COUNT(*) AS totalVisits', 'where'=>$where, 'join'=>$join, 'start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'totalVisits DESC', 'group'=>'requestUri'));
	foreach($errors as $i => $error){
		if(!empty($error['referer'])) $errors[$i] += parseReferer($error['referer']);
	}

	$smarty->assign('errors', $errors);

	/* page numbering */
	$totalItems = dbQuery('stats_visits', DB_VALUE, array('fields'=>'COUNT(DISTINCT requestUri)', 'where'=>$where, 'join'=>$join));
	$pageNums = getPageNums($totalItems, $page, $itemsPerPage, 0, 4, 4, 0);
	$smarty->assign('pageNums', $pageNums);
	$smarty->assign('totalItems', $totalItems);

	$smarty->display('stats.errors.tpl');

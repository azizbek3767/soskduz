<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$page = getRequestVar('page');

	include('stats.date-selector.php');
	include('stats.type-selector.php');

	if($page < 1){
		$page = 1;
		$smarty->assign('page', $page);
	}
	$itemsPerPage = 50;

	$where[] = "visitDate >= '$dateStart'";
	$where[] = "visitDate <= '$dateEnd'";
	$where[] = "isBot = 0";
	if(!empty($filterTypeId)) $where[] = "typeId = '$filterTypeId'";

	$join = array('stats_visitors'=>'USING(visitorId)', 'stats_user_agents'=>'USING(userAgentId)');
	$fields = "REPLACE(SUBSTRING_INDEX(referer, '/', 3), 'www.', '') AS domain, COUNT(DISTINCT stats_visitors.visitorId) AS totalVisitors";
	$referers = dbQuery('stats_visits', DB_ARRAYS, array('fields'=>$fields, 'where'=>$where, 'join'=>$join, 'start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'totalVisitors DESC', 'group'=>'domain'));

	if(count($referers) > ceil($itemsPerPage/2)){
		$splitIndex = ceil($itemsPerPage/2);
		$smarty->assign('hasSplit', true);
	}
	foreach($referers as $i=>$referer){
		if(!empty($splitIndex) && ($i + 1) == $splitIndex) $referers[$i]['isSplit'] = true;
		$referers[$i]['website'] = $referers[$i]['domain'];
		$referers[$i]['website'] = preg_replace('|^[a-z]{3,5}://|i', '', $referers[$i]['website']);
	}
	$smarty->assign('referers', $referers);

	/* page numbering */
	$totalItems = dbQuery('stats_visits', DB_VALUE, array('fields'=>"COUNT(DISTINCT REPLACE(SUBSTRING_INDEX(referer, '/', 3), 'www.', ''))", 'where'=>$where, 'join'=>$join));
	$pageNums = getPageNums($totalItems, $page, $itemsPerPage, 0, 4, 4, 0);
	$smarty->assign('pageNums', $pageNums);

	$smarty->display('stats.referers.tpl');
?>
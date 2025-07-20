<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

    $logger = new Logger();

	$user   = getRequestVar('user');
	$action = getRequestVar('action');
	$page   = (int) getRequestVar('page', 1);
    $itemsPerPage = 10;
	$table  = 'subscribe';
	
	if (!empty($action['deleteSubscribe'])) {
		if (dbQuery($table, DB_ARRAY, array('where'=>"userId=$user[userId]"))) {
    		dbQuery($table, DB_DELETE, array('where'=>"userId='$user[userId]'"));
    		echo "writeStatus('".lang('users:messages:1')."');\r\n";
            echo "removeElement($user[userId], 'user');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
			exit;
		} else {
    		echo "writeStatus('".lang('users:errors:1')."', 'aError');\r\n";
			echo "removeElement($user[userId], 'user');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
			exit;
		}
	}

	$smarty->assign('page', $page);
	$subscribeUsers = dbQuery($table, DB_ARRAYS, array('start' => ($page-1)*$itemsPerPage, 'limit' => $itemsPerPage, 'order'=>'addedOn DESC', 'indexKey'=>'userId'));
	$totalUsers = dbQuery($table, DB_VALUE, array('fields'=>'COUNT(*)'));
	$pageNums = getPageNums($totalUsers, $page, $itemsPerPage, 0, 4, 4, 0);
	$smarty->assign('pageNums', $pageNums);
	$smarty->assign('subscribeUsers', $subscribeUsers);

	if (!empty($errors)) $smarty->assign('errors', $errors);
	if (!empty($messages)) $smarty->assign('messages', $messages);

	$smarty->display('subscribers.tpl');

?>
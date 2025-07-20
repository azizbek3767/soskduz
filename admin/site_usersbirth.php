<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die('Access is denied');
	
	$action  = getRequestVar('action');
	$site_user = arrAddSlashes(getRequestVar('site_user', '', $noEscape = true));
	$query   = getRequestVar('query');
	$status  = getRequestVar('status');
	$page    = (int) getRequestVar('page');
	$userId     = getRequestVar('userId', 0);

	 if(!empty($action['deleteSiteUser']) && !empty($site_user['userId'])){
		$where[] = "userId='$site_user[userId]'";

		/* checking access level */
		if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";

		/* checking section permission */
		if(empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

		/* deleting site_user */
		if(dbQuery('customers', DB_DELETE, array('where'=>$where))){

			/* deleting comments */
			dbQuery('comments', DB_DELETE, array('where'=>"userId = '$site_user[userId]'"));

			/* deleting images */
			//dbQuery('images', DB_DELETE, array('where'=>"userId='$site_user[userId]'"));

			/* deleting files */
			deleteDir(SITE_ROOT."/files/customers/$site_user[userId]/");

			echo "writeStatus('".lang('customers:messages:2')."');\r\n";
			echo "removeElement($site_user[userId], 'site_user');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
		} else {
			echo "writeStatus('".lang('customers:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	}

	if(empty($noItems)){
		if($page < 1){
			$page = 1;
			$smarty->assign('page', $page);
		}
		$itemsPerPage = 9999;
		$where = array();

		/* processing search fields */
		if(!empty($query)) $where[] = "email LIKE '%$query%' OR name LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%'";
		if(!empty($status)) $where[] = "status='$status'";

		$fields = array('userId', 'name', 'registredOn');
		$site_users = dbQuery('customers', DB_ARRAYS, array('start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'DAYOFMONTH(birth)', 'where'=>$where));
		
		foreach($site_users as $userId=>$site_user){
			$uid = $site_user['userId'];
			$orders = dbQuery("orders", DB_ARRAYS, array('where'=>"userId='$uid'"));
			
			$site_users[$userId]['statusName'] = lang('customers:statuses:'.$site_users[$userId]['status']);
			$site_users[$userId]['registredOn'] = langdate(adjustTime($site_user['registredOn'], false, 'M d, Y'));
			$site_users[$userId]['pokupok'] = count($orders);
			
			foreach ($orders as $order) $arr[] = $order['grandTotal'];
			$site_users[$userId]['grandTotal'] = @array_sum($arr);
			unset($arr);
			
		}

		/* statuses */
		$smarty->assign('statuses', lang('customers:statuses'));

		$totalSiteUsers = dbQuery('customers', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where));
		$pageNums = getPageNums($totalSiteUsers, $page, $itemsPerPage, 0, 4, 4, 0);
		$smarty->assign('totalSiteUsers', $totalSiteUsers);
		$smarty->assign('site_users', $site_users);
		$smarty->assign('order', $order);
		$smarty->assign('pageNums', $pageNums);
	}
	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
	$smarty->display('site_usersbirth.tpl');
?>
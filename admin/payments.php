<?php
	include('../includes/admin.inc.php');
    if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));
	$action  = getRequestVar('action');
	$payment = arrAddSlashes(getRequestVar('payment', '', $noEscape = true));
	$status  = getRequestVar('status');
	$page    = (int) getRequestVar('page', 1);
	$paymentId    = (int) getRequestVar('paymentId');
    

	if (!empty($action['edit'])) {
    	
		if(empty($errors) && !empty($payment['paymentId'])){
			$where[] = "paymentId='$payment[paymentId]'";

			if($payment = dbQuery('payments', DB_ARRAY, array('where'=>$where))){
				/* получать информацию о пользователях, которые создали и изменили статью */
				$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$payment[addedBy]', '$payment[modifiedBy]')", 'indexKey'=>'userId'));
				$payment['addedBy'] = empty($users[$payment['addedBy']]) ? unknownUser() : $users[$payment['addedBy']];
				$payment['modifiedBy'] = empty($users[$payment['modifiedBy']]) ? unknownUser() : $users[$payment['modifiedBy']];
				$payment['addedOn']     = langdate(adjustTime($payment['addedOn'], false, 'F j, Y H:i'));
				$payment['modifiedOn']  = langdate(adjustTime($payment['modifiedOn'], false, 'F j, Y H:i'));
		
		 
        		if (isset($payment['settings']) && !empty($payment['settings'])) $payment['settings'] = unserialize($payment['settings']);
        		//print_r($payment); 
				$smarty->assign('payment', $payment);
                $smarty->assign('templateName', $payment['fileName']);
				
			} else {
				$errors['payment_not_found'] = true;
			}
		}
		
		
		
		if(empty($errors)){
			$noItems = true;
			$smarty->assign('statuses', array_slice(lang('payments:statuses'), 1));
			$smarty->assign('adjustedNow', adjustTime(gmdate('Y-m-d H:i:s')));
		} else {
			$smarty->clear_assign('action');
		}

	} elseif(!empty($action['save'])) {
		/* проверка полей */
		if (empty($payment['name'])) $errors['name'] = true;
        
		if (empty($payment['paymentId'])){
			if (dbQuery('payments', DB_VALUE, array('fields'=>'paymentId', 'where'=>"LOWER(fileName)=LOWER('$payment[fileName]')"))) $errors['fileNameExists'] = true;
		} else {
			if (dbQuery('payments', DB_VALUE, array('fields'=>'paymentId', 'where'=>"paymentId<>'$payment[paymentId]' AND LOWER(fileName)=LOWER('$payment[fileName]')"))) $errors['fileNameExists'] = true;
		}
		if (preg_match('/^(page\d+|index)$/i', $payment['fileName'])) $errors['fileNameProhibited'] = true;
		if (preg_match('/[^0-9a-zA-Z\-_\.,]/i', $payment['fileName'])) $errors['fileNameCharacters'] = true;

        if (isset($payment['settings']) && !empty($payment['settings'])) $payment['settings'] = serialize($payment['settings']);
        
		if (empty($errors)) {

			if(empty($payment['paymentId'])){
				$payment['addedBy']      = $adminUser['userId'];
				$payment['addedOn']      = gmdate('Y-m-d H:i:s');
				$payment['modifiedBy']   = $adminUser['userId'];
				$payment['modifiedOn']   = gmdate('Y-m-d H:i:s');

				if ($payment['paymentId'] = dbQuery('payments', DB_INSERT, array('values' => $payment))) {
					$messages['saved'] = true;
				} else {
					$errors['not_saved'] = true;
				}
			} else {
				/********** Обновление записи **********/

				/* access level check */
				if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";

				$where[] = "paymentId='$payment[paymentId]'";
				if(!($oldpayment = dbQuery('payments', DB_ARRAY, array('where'=>$where)))) $errors['payment_not_found'] = true;

				if(empty($errors)){

					unset($payment['addedBy']);
					unset($payment['addedOn']);

					$payment['modifiedBy']   = $adminUser['userId'];
					$payment['modifiedOn']   = gmdate('Y-m-d H:i:s');
					
					if(dbQuery('payments', DB_UPDATE, array('where'=>"paymentId='$payment[paymentId]'", 'values'=>$payment))){
						$messages['saved'] = true;
					} else {
						$errors['not_saved'] = true;
					}
				}
			}

		} else {
			/* if there are any errors in fields */
			$smarty->assign('statuses', array_slice(lang('payments:statuses'), 1));
			$smarty->assign('action', array('edit' => true));
			$payment = arrStripSlashes($payment);
			$smarty->assign('payment', $payment);
			$noItems = true;
		}
	}  elseif(!empty($action['deletePayment']) && !empty($payment['paymentId'])){ // удаление статьи
		$where[] = "paymentId='$payment[paymentId]'";

		/* deleting payment */
		if(dbQuery('payments', DB_DELETE, array('where'=>$where))){
            
			echo "removeElement($payment[paymentId], 'payment');\r\n";
		} else {
			echo "writeStatus('".lang('payments:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	} 
	


	if (empty($noItems)) {

        $smarty->assign('page', $page);
		$itemsPerPage = 15;
		$where = array();

		/* processing search fields */
		if(!empty($status)) $where[] = "status = '$status'";

		$fields = array('paymentId', 'name');
		$payments = dbQuery('payments', DB_ARRAYS, array('start' => ($page-1)*$itemsPerPage, 'limit' => $itemsPerPage, 'order' => 'paymentId ASC', 'indexKey' => 'paymentId', 'where' => $where));
		foreach($payments as $paymentId => $payment){
			$payments[$paymentId]['statusName'] = lang('payments:statuses:' . $payments[$paymentId]['status']);
		}

		/* statuses */
		$smarty->assign('statuses', lang('payments:statuses'));

		$totalPayments = dbQuery('payments', DB_VALUE, array('fields' => 'COUNT(*)', 'where' => $where));
		$pageNums = getPageNums($totalPayments, $page, $itemsPerPage, 0, 4, 4, 0);
		$smarty->assign('totalPayments', $totalPayments);
		$smarty->assign('payments', $payments);
		$smarty->assign('pageNums', $pageNums);
	}

	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
	$smarty->display('payments.tpl');



?>

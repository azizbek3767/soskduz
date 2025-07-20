<?php
	include('../includes/admin.inc.php');

	$action  	= getRequestVar('action');
	$donation 	= arrAddSlashes(getRequestVar('donation', '', $noEscape = true));
	$status  	= getRequestVar('status');
	$id         = (int) getRequestVar('id');
	$table      = 'donations';

	if (!empty($action['edit'])) {
		if (empty($errors) && !empty($donation['id'])) {
			$where[] = "id='$donation[id]'";

			if ($donation = dbQuery($table, DB_ARRAY, array('where'=>$where))) {
				$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$donation[addedBy]', '$donation[modifiedBy]')", 'indexKey'=>'userId'));
				$donation['addedBy'] = empty($users[$donation['addedBy']]) ? unknownUser() : $users[$donation['addedBy']];
				$donation['modifiedBy'] = empty($users[$donation['modifiedBy']]) ? unknownUser() : $users[$donation['modifiedBy']];
				$donation['addedOn']     = langdate(adjustTime($donation['addedOn'], false, 'F j, Y H:i'));
				$donation['modifiedOn']  = langdate(adjustTime($donation['modifiedOn'], false, 'F j, Y H:i'));
		
				$smarty->assign('donation', $donation);
			} else {
				$errors['donation_not_found'] = true;
			}
		} 

		if(empty($errors)){
			$noItems = true;
			$smarty->assign('statuses', array_slice(lang('donations:statuses'), 1));
			$smarty->assign('adjustedNow', adjustTime(gmdate('Y-m-d H:i:s')));
		} else {
			$smarty->clearAssign('action');
		}

	/***** CUT FOR DEMO START *****/
	} elseif (!empty($action['save'])) {
		if (empty($donation['name'])) $errors['name'] = true;

		if(empty($errors)){

			if(empty($donation['id'])){
				
				$donation['addedBy']      = $adminUser['userId'];
				$donation['addedOn']      = gmdate('Y-m-d H:i:s');
				$donation['modifiedBy']   = $adminUser['userId'];
				$donation['modifiedOn']   = gmdate('Y-m-d H:i:s');
        
                // print_r($donation);
				if($donation['id'] = dbQuery($table, DB_INSERT, array('values'=>$donation))){
					

					if(!empty($donationUpdate)) dbQuery($table, DB_UPDATE, array('where'=>"id='$donation[id]'", 'values'=>$donationUpdate));
					$messages['saved'] = true;
				} else {
					$errors['not_saved'] = true;
				}
			} else {

				$where[] = "id='$donation[id]'";
				if(!($olddonation = dbQuery($table, DB_ARRAY, array('where'=>$where)))) $errors['donation_not_found'] = true;

				if(empty($errors)){
					unset($donation['addedBy']);
					unset($donation['addedOn']);

					$donation['modifiedBy']   = $adminUser['userId'];
					$donation['modifiedOn']   = gmdate('Y-m-d H:i:s');
				

					if(dbQuery($table, DB_UPDATE, array('where'=>"id='$donation[id]'", 'values'=>$donation))){
						$messages['saved'] = true;
					} else {
						$errors['not_saved'] = true;
					}
				}
			}

		
		} else {
			/* if there are any errors in fields */
			$smarty->assign('statuses', array_slice(lang('donations:statuses'), 1));
			$smarty->assign('action', array('edit'=>true));
			$donation = arrStripSlashes($donation);
			$smarty->assign('donation', $donation);
			$noItems = true;
		}
	} elseif(!empty($action['reorder'])){
		foreach($donation['orderBys'] as $id=>$orderBy){
			dbQuery($table, DB_UPDATE, array('where'=>"id='$id'", 'values'=>"orderBy=$orderBy"));
		} 
		
	}  elseif(!empty($action['deleteDonation']) && !empty($donation['id'])){ // удаление статьи
		$where[] = "id='$donation[id]'";

		if(dbQuery($table, DB_DELETE, array('where'=>$where))){
			echo "removeElement($donation[id], 'donation');\r\n";
			
		} else {
			echo "writeStatus('".lang('donations:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	}

	if(empty($noItems)){
		$where = array();
		if(!empty($status)) $where[] = "status='$status'";

		$fields = array('id', 'name', 'url');
		$donations = dbQuery($table, DB_ARRAYS, array('order'=>'orderBy', 'indexKey'=>'id', 'where'=>$where));
		foreach($donations as $id => $donation){
			$donations[$id]['statusName'] = lang('donations:statuses:' . $donations[$id]['status']);
		}

		/* statuses */
		$smarty->assign('statuses', lang('donations:statuses'));
		$total = dbQuery($table, DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where));
		$smarty->assign('total', $total);
		$smarty->assign('donations', $donations);
	}

	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);

    $smarty->display('donations.tpl');

<?php
	include('../includes/admin.inc.php');
	if ($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die('Access is denied');

	$action     = getRequestVar('action','');
	$customer   = arrAddSlashes(getRequestVar('customer', '', $noEscape = true));
	$query      = getRequestVar('query','');
	$status     = getRequestVar('status', '');
	$subscribe  = getRequestVar('subscribe', '');
	$page       = (int) getRequestVar('page','');
	$userId     = getRequestVar('userId', 0);
	$table = 'customers';

	if (!empty($action['edit'])) {
    	
		if(empty($errors) && !empty($customer['userId'])){
			$where[] = "userId='$customer[userId]'";
			if($customer = dbQuery("{$table}", DB_ARRAY, array('where'=>$where))){
    			$customer = prepareCustomer($customer);
				$customer['password'] = '';
				$smarty->assign('customer', $customer);
			} else {
				$errors['site_user_not_found'] = true;
			}
		}
		
		if(empty($errors)){
			$noItems = true;
			$smarty->assign('statuses', array_slice(lang('customers:statuses'), 1));
			$smarty->assign('subscribes', array_slice(lang('customers:subscribes'), 0));
			$smarty->assign('adjustedNow', adjustTime(gmdate('Y-m-d H:i:s')));
		} else {
			$smarty->clearAssign('action');
		}
		
	} elseif (!empty($action['save'])) {
  	
        if (empty($customer['login'])){ $errors['login'] = true; }
        if (!empty($customer['login']) && @!preg_match('^[0-9A-Za-z_]+$^', $customer['login'])){ $errors['login_correct'] = true; }
        if (empty($customer['name']))  $errors['name'] = true;
        if (empty($customer['phone'])) $errors['phone'] = true;
		if (!empty($customer['phone']) && @!preg_match('/^[0-9]{7,12}+$/', $customer['phone'])){ $errors['phone_correct'] = true; }
		
		if (empty($customer['email'])) {
			$errors['email1'] = true;
		} else {
		    if (!isValidEmail( "$customer[email]")){
                $errors['email_correct'] = true;
            }
			if (!empty($customer['userId'])) {
				$temp = dbQuery("{$table}", DB_ARRAY, array('fields'=>'email', 'where'=>'userId='.$customer['userId']));
				if($temp['email'] == $customer['email']){
					$check = 0;
				}else{
					$check = 1;
				}
			} else {
				$check = 1;
			}
			if ($check){
			    if (dbQuery("{$table}", DB_VALUE, array('fields'=>'userId', 'where'=>"email='$customer[email]'"))) $errors['email2'] = true;
			}
		}
		
		if (empty($customer['userId'])){ if(empty($customer['password'])) $errors['password'] = true; }
		
		if (empty($errors)) {
		  
			if(empty($customer['userId'])){
  			
				$customer['activationCode'] = rand(100000, 999999);
				$customer['password']       = md5($customer['password']);
				$customer['registredOn']    = date('Y-m-d');
				if($maxId = dbQuery('customers', DB_VALUE, array('fields'=>'MAX(userId)'))){
					$customer['userId'] = $maxId + 1;
				} else {
					$customer['userId'] = 1;
				}
				
				if ($customer['userId'] = dbQuery("{$table}", DB_INSERT, array('values' => $customer))){

                    if (!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        if (uploadedFile($_FILES, $customer['userId'])) {
                            $customerUpdate['hasImage'] = 1;
                        } else {
                            $errors['image_not_saved'] = true;
                            $logger->error("Картинка не загружена при добавление клиента" . $customer['login']);
                        }
              		}
              		if (!empty($customerUpdate)) dbQuery('customers', DB_UPDATE, array('where'=>"userId='$customer[userId]'", 'values'=>$customerUpdate));
              		$messages['saved'] = true;
                    $logger->info("Добавлен новый пользователь сайта «" . $customer['login'] . "»");
        		} else {
        		    $errors['not_saved'] = true;
                    $logger->error("Пользователь «" . $customer['login'] . "» не сохранен");
        		}	
    		
			} else {
  			
				if (empty($errors)) {
  				
					if ($customer['password']) {
						$customer['password'] = md5($customer['password']);
					} else {
						$temp = dbQuery("{$table}", DB_ARRAY, array('fields' => 'password', 'where' => "userId='$customer[userId]'"));
						$customer['password'] = $temp['password'];
					}
                    $customer['modifiedBy'] = $adminUser['userId'];
					$customer['modifiedOn'] = gmdate('Y-m-d H:i:s');

					if (dbQuery("{$table}", DB_UPDATE, array('where' => "userId='$customer[userId]'", 'values' => $customer))) {
						if (!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                            if (uploadedFile($_FILES, $customer['userId'])) {
                                $customerUpdate['hasImage'] = 1;
                            } else {
                                $errors['image_not_saved'] = true;
                                $logger->error("Картинка не загружена при редактирование" . $customer['login']);
                            }
                		}
                		if (!empty($customerUpdate)) dbQuery("{$table}", DB_UPDATE, array('where'=>"userId= '$customer[userId]'", 'values' => $customerUpdate));
                		$messages['saved'] = true;
                        $logger->info("Пользователь «" . $customer['login'] . "» отредактирована");
					} else {
						$errors['not_saved'] = true;
                        $logger->error("Пользователь «" . $customer['login'] . "» не добавлен");
					}
				}
			}
			
		} else {

			$smarty->assign('statuses', array_slice(lang('customers:statuses'), 1));
			$smarty->assign('subscribes', array_slice(lang('customers:subscribes'), 1));
			$smarty->assign('action', array('edit'=>true));
			$customer = arrStripSlashes($customer);
			$smarty->assign('customer', $customer);
			$noItems = true;
		}
	} elseif (!empty($action['deleteCustomerImage']) && !empty($customer['userId'])) { // удаление картинки
    	
		$where[] = "userId='$customer[userId]'";
		
		if ($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";
		if (empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

		/* deleting image */
		if ($userId = dbQuery("{$table}", DB_VALUE, array('where'=>$where, 'fields'=>'userId'))){
    		
			$images = dbQuery('customer_images', DB_ARRAYS, array('where'=>"userId='$userId' AND codename<>''", 'indexKey'=>'codename'));
			foreach ($images as $image) @unlink(SITE_ROOT."/images/customers/$customer[userId]/$image[fileName]");
			dbQuery('customer_images', DB_DELETE, array('where'=>"userId='$userId' AND codename<>''"));
			dbQuery("{$table}", DB_UPDATE, array('where'=>$where, 'values'=>"hasImage=0"));

            echo "document.getElementById('imageOptions').style.display='none';\r\n";
			deleteDir(SITE_ROOT."/uploads/customers/$customer[userId]");
			exit;
		} else {
			echo "writeStatus('".lang('customers:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
			exit;
		}
	} elseif (!empty($action['deleteCustomer']) && !empty($customer['userId'])) {
    	
		$where[] = "userId='$customer[userId]'";
		
		if ($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";
		if (empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";
		if (dbQuery("{$table}", DB_DELETE, array('where'=>$where))) {
			//dbQuery('comments', DB_DELETE, array('where'=>"userId = '$customer[userId]'"));
			dbQuery('customer_images', DB_DELETE, array('where'=>"userId='$customer[userId]'"));

			deleteDir(SITE_ROOT."/uploads/customers/$customer[userId]/");

			echo "removeElement($customer[userId], 'customer');\r\n";
            $logger->info("Пользователь «ID-" . $customer['userId'] . "» удален.");
		} else {
			echo "writeStatus('".lang('customers:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
		
	} elseif (!empty($action['approveCustomer']) && !empty($customer['userId'])) {
		$where[] = "userId='$customer[userId]'";
		/* approving customer */
		if (dbQuery("{$table}", DB_UPDATE, array('where'=>$where, 'values'=>"status='active'"))) {
			echo "writeStatus('".lang('customers:messages:2')."');\r\n";
			echo "document.getElementById('status-$customer[userId]').innerHTML = 'Активен';\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
		} else {
			echo "writeStatus('".lang('customers:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	/***** CUT FOR DEMO END *****/
	}

	if (empty($noItems)) {
		if($page < 1){
			$page = 1;
			$smarty->assign('page', $page);
		}
		$itemsPerPage = 15;
		$where = array();

		/* processing search fields */
		if (!empty($query)) $where[] = "email LIKE '%$query%' OR name LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%'";
		if (!empty($status)) $where[] = "status='$status'";

		$fields = array('userId', 'name', 'registredOn');
		$customers = dbQuery("{$table}", DB_ARRAYS, array('start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'registredOn DESC', 'where'=>$where));
		foreach ($customers as $userId=>$customer) {
			$uid = $customer['userId'];
			$customers[$userId]['statusName'] = lang('customers:statuses:'.$customers[$userId]['status']);
			$customers[$userId]['registredOn'] = langdate(adjustTime($customer['registredOn'], false, 'd.m.Y'));
		}

		/* statuses */
		$smarty->assign('statuses', lang('customers:statuses'));
		$smarty->assign('subscribes', lang('customers:subscribes'));

		$totalCustomers = dbQuery("{$table}", DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where));
		$pageNums = getPageNums($totalCustomers, $page, $itemsPerPage, 0, 4, 4, 0);
		$smarty->assign('totalCustomers', $totalCustomers);
		$smarty->assign('customers', $customers);
		$smarty->assign('pageNums', $pageNums);
	}

	if (!empty($errors)) $smarty->assign('errors', $errors);
	if (!empty($messages)) $smarty->assign('messages', $messages);

    try {
        $smarty->display('customers.tpl');
    } catch (Exception $e) {
        $e->getMessage();
    }


function uploadedFile($img, $userId) {
    $ext = explode(".", $img['image']['name']);
    $extension = strtolower(array_pop($ext));
    if($images = createCustomerImage($img['image']['tmp_name'], $extension, $userId, '', $img['image']['name'])){
        $customerImages = dbQuery('customer_images', DB_ARRAYS, array('where'=>"userId='$userId' AND codename<>''", 'indexKey'=>'codename'));
        foreach($images as $codename=>$image){
            if(!empty($customerImages[$codename])) $image['imageId'] = $customerImages[$codename]['imageId'];
            dbQuery('customer_images', DB_REPLACE, array('values'=>$image));
        }
        return true;
    }
    return false;
}
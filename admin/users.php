<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

    $logger = new Logger();

	$user   = getRequestVar('user');
	$action = getRequestVar('action');
	$page   = (int) getRequestVar('page');
	
	if(!empty($action['edit'])){
    	
		if(!empty($user['userId'])){
    		
			$user = dbQuery('admin_users', DB_ARRAY, array('where'=>"userId='$user[userId]'"));
            $user = prepareUser($user);
            
			/* getting info about users who created and modified the user */
			$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$user[addedBy]', '$user[modifiedBy]')", 'indexKey'=>'userId'));
			$user['addedBy'] = empty($users[$user['addedBy']]) ? unknownUser() : $users[$user['addedBy']];
			$user['modifiedBy'] = empty($users[$user['modifiedBy']]) ? unknownUser() : $users[$user['modifiedBy']];
			$user['addedOn']    = adjustTime($user['addedOn']);
			$user['modifiedOn'] = adjustTime($user['modifiedOn']);
			$user['eventOn']    = adjustTime($user['eventOn']);

			$user['sectionRights'] = dbQuery('section_rights', DB_ARRAYS, array('fields'=>'sectionId', 'where'=>"userId='$user[userId]'", 'valueKey'=>'sectionId'));
			$smarty->assign('user', $user);
			
			$totalArticle = dbQuery('articles', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>"addedBy = '$user[userId]'"));
			$smarty->assign('totalArticle', $totalArticle);
			
			
			
		}
		$noItems = true;

	} elseif(!empty($action['save'])){
  	
		$user['loginName'] = trim($user['loginName']);
		$user['fullName']  = trim($user['fullName']);
		
		if($adminUser['accessLevel'] != 'developer') {
            if($user['accessLevel'] == 'developer') $errors['developer_status'] = true;
		} else {
            $user['accessLevel'] = $user['accessLevel'];
		}    
		
		if(empty($user['fullName']) || preg_match('/[^[а-яА-ЯёЁa-zA-Z0-9]+$]/', $user['fullName'])) $errors['fullName'] = true;
		if(empty($user['loginName']) || preg_match('/[^a-zA-Z0-9]/', $user['loginName'])) $errors['loginName'] = true;
		if(empty($user['userId']) && empty($user['password'])) $errors['password'] = true;

		if(strtolower($user['accessLevel']) == 'administrator') $user['permitAllSections'] = 1;
        if(strtolower($user['accessLevel']) == 'developer'){ $user['statusLevel'] = 1;}else{$user['statusLevel'] = 0;}

		if(empty($errors)){
			if(empty($user['userId'])){
    			
				if(empty($errors)){
    				
					$user['password']   = md5(PRE . md5(PRE . $user['password']));
					$user['addedBy']    = $adminUser['userId'];
					$user['addedOn']    = gmdate('Y-m-d H:i:s');
					$user['modifiedBy'] = $adminUser['userId'];
					$user['modifiedOn'] = gmdate('Y-m-d H:i:s');
					$user['eventOn']    = gmdate('Y-m-d H:i:s');

					if($user['userId'] = dbQuery('admin_users', DB_INSERT, array('values'=>$user))){
						
						dbQuery('section_rights', DB_DELETE, array('where'=>"userId='$user[userId]'"));
						if(empty($user['permitAllSections']) && !empty($user['sectionRights'])){
							dbQuery('section_rights', DB_INSERT, array('values'=>"$user[userId],".implode("),($user[userId],", $user['sectionRights'])));
						}
						if(!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    						$ext = explode(".", $_FILES['image']['name']);
                            $extension = strtolower(array_pop($ext));
							if($images = createAvatars($_FILES['image']['tmp_name'], $extension, $user['userId'], '', $_FILES['image']['name'])){
								$userImages = dbQuery('admin_user_images', DB_ARRAYS, array('where'=>"userId='$user[userId]' AND codename<>''", 'indexKey'=>'codename'));
								foreach($images as $codename=>$image){
									if(!empty($userImages[$codename])) $image['imageId'] = $userImages[$codename]['imageId'];
									dbQuery('admin_user_images', DB_REPLACE, array('values'=>$image));
								}
								$userUpdate['hasImage'] = 1;
							} else {
								$errors['image_not_saved'] = true;
							}
						}
						
						if($user['userId'] == $adminUser['userId']) loadAdminUser($user['userId']);
                        if(!empty($userUpdate)) dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$user[userId]'", 'values'=>$userUpdate));
						$messages['saved'] = true;
                        $logger->info("Добавлен новый администратор");
					} else {
						$errors['not_saved'] = mysqli_connect_error($mysqli);
					}
				}
				
			} else {
				/********** Updating Entry **********/
				if(!($oldUser = dbQuery('admin_users', DB_ARRAY, array('where'=>"userId=$user[userId]")))) $errors['user_not_found'] = true;
				if(empty($errors) && $user['loginName'] != $oldUser['loginName']){
					if(dbQuery('admin_users', DB_ARRAY, array('where'=>"loginName='$user[loginName]' AND userId<>'$user[userId]'"))){
						$errors['login_exists'] = true;
					} else {
						$update['loginName'] = $user['loginName'];
					}
				}
				if(strtolower($user['accessLevel']) != 'administrator' && strtolower($oldUser['accessLevel']) == 'administrator'){
					if(!dbQuery('admin_users', DB_ARRAY, array('where'=>"userId<>$user[userId] AND accessLevel='administrator'"))){
						$errors['no_more_admins'] = true;
					}
				}
				if(strtolower($user['accessLevel']) != 'developer' && strtolower($oldUser['accessLevel']) == 'developer'){
					if(!dbQuery('admin_users', DB_ARRAY, array('where'=>"userId<>$user[userId] AND accessLevel='developer'"))){
						$errors['no_more_developers'] = true;
					}
				}
        
				if(empty($errors)){
					unset($user['addedBy']);
					unset($user['addedOn']);
					unset($user['password']);

                    if(!empty($user['newPassword'])) { $user['password'] = md5(PRE. md5(PRE.$user['newPassword'])); }
					$user['modifiedBy'] = $adminUser['userId'];
					$user['modifiedOn'] = gmdate('Y-m-d H:i:s');
					
					if(dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$user[userId]'", 'values'=>$user))){
						
						dbQuery('section_rights', DB_DELETE, array('where'=>"userId='$user[userId]'"));
						
						if(empty($user['permitAllSections']) && !empty($user['sectionRights'])){
							dbQuery('section_rights', DB_INSERT, array('values'=>"$user[userId],".implode("),($user[userId],", $user['sectionRights'])));
						}
    	
						if(!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    						$ext = explode(".", $_FILES['image']['name']);
                            $extension = strtolower(array_pop($ext));
							if($images = createAvatars($_FILES['image']['tmp_name'], $extension, $user['userId'], '', $_FILES['image']['name'])){
								$userImages = dbQuery('admin_user_images', DB_ARRAYS, array('where'=>"userId='$user[userId]' AND codename<>''", 'indexKey'=>'codename'));
								foreach($images as $codename=>$image){
									if(!empty($userImages[$codename])) $image['imageId'] = $userImages[$codename]['imageId'];
									dbQuery('admin_user_images', DB_REPLACE, array('values'=>$image));
								}
								$userUpdate['hasImage'] = 1;
							} else {
								$errors['image_not_saved'] = true;
							}
						}
                  
						if($user['userId'] == $adminUser['userId']) loadAdminUser($user['userId']);
                        if(!empty($userUpdate)) dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$user[userId]'", 'values'=>$userUpdate));
						$messages['saved'] = true;
                        $logger->info("Администратор " . $user['fullName'] . " отредактирован");
					} else {
  					//print_r($action);
						$errors['not_saved'] = mysql_error($mysqli);
					}
				}
			}
		}
		if(!empty($errors)) {
			$smarty->assign('action', array('edit'=>true));
			$smarty->assign('user', $user);
			$noItems = true;
		}
	} elseif(!empty($action['deleteAdminUserImage']) && !empty($user['userId'])){
		$where[] = "userId='$user[userId]'";

		if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";
		if(empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

		if($userId = dbQuery('admin_users', DB_VALUE, array('where'=>$where, 'fields'=>'userId'))){
			$images = dbQuery('admin_user_images', DB_ARRAYS, array('where'=>"userId='$userId' AND codename<>''", 'indexKey'=>'codename'));
			foreach($images as $image) @unlink(SITE_ROOT."/admin/avatar/$user[userId]/$image[fileName]");
			dbQuery('admin_user_images', DB_DELETE, array('where'=>"userId='$userId' AND codename<>''"));
			dbQuery('admin_users', DB_UPDATE, array('where'=>$where, 'values'=>"hasImage=0"));

			echo "document.getElementById('imageOptions').style.display='none';\r\n";

			deleteIfEmpty(SITE_ROOT."/admin/avatar/$user[userId]");
			exit;
		} else {
			echo "writeStatus('".lang('users:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 1000);\r\n";
			exit;
		}
	} elseif(!empty($action['delete'])){
		if(!($user = dbQuery('admin_users', DB_ARRAY, array('where'=>"userId=$user[userId]")))){
			echo "writeStatus('".lang('users:errors:1')."', 'aError');\r\n";
			echo "removeElement($user[userId], 'user');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
			exit;
		}
		if(strtolower($user['accessLevel']) == 'administrator'){
			if(!dbQuery('admin_users', DB_ARRAY, array('where'=>"userId<>$user[userId] AND accessLevel='administrator'"))){
				echo "writeStatus('".lang('users:errors:7')."', 'aError');\r\n";
				echo "removeElement($user[userId], 'user');\r\n";
				echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
				exit;
			}
		}
		dbQuery('admin_user_images', DB_DELETE, array('where'=>"userId='$user[userId]'"));
		deleteDir(SITE_ROOT."/admin/avatar/$user[userId]/");
		dbQuery('admin_users', DB_DELETE, array('where'=>"userId='$user[userId]'"));
		dbQuery('section_rights', DB_DELETE, array('where'=>"userId='$user[userId]'"));
		echo "writeStatus('".lang('users:messages:1')."');\r\n";
		echo "removeElement($user[userId], 'user');\r\n";
		echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
        $logger->info("Администратор " . $user['fullName'] . " удален");
		exit;
	}

	$accessLevels = lang('users:accessLevels');
	$smarty->assign('accessLevels', $accessLevels);

	if(empty($noItems)){
		if($page < 1){
			$page = 1;
			$smarty->assign('page', $page);
		}
		$itemsPerPage = 10;
		
		$where[] = "accessLevel != 'developer'";
		
		if($_SESSION['adminUser']['accessLevel'] == 'developer'){
            $adminUsers = dbQuery('admin_users', DB_ARRAYS, array('start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'userId', 'indexKey'=>'userId'));	
            $adminUsers = prepareAdminUsers($adminUsers);
            $totalUsers = dbQuery('admin_users', DB_VALUE, array('fields'=>'COUNT(*)'));
		} else {
            $adminUsers = dbQuery('admin_users', DB_ARRAYS, array('start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>'userId', 'where'=>$where, 'indexKey'=>'userId'));
            $adminUsers = prepareAdminUsers($adminUsers);
            $totalUsers = dbQuery('admin_users', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>"accessLevel<>'developer'"));	
		}
		
		foreach($adminUsers as $userId=>$user){
			$users[$userId]['accessLevel'] = $accessLevels[$user['accessLevel']];
		}
		
		$pageNums = getPageNums($totalUsers, $page, $itemsPerPage, 0, 4, 4, 0);
		$smarty->assign('pageNums', $pageNums);
        $smarty->assign('adminUsers', $adminUsers);
        
	}

	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);

	
	$smarty->display('users.tpl');

?>
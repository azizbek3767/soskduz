<?php
	include('../includes/admin.inc.php');
	
	$action  = getRequestVar('action');
	$banner = getRequestVar('banner');
	$lang = getRequestVar('SITE_LANG');
	
	if(empty($lang)){
	    $lang = $DEFAULT_LANG;
	}
	
	if(!empty($action['edit'])){
		$noListing = true;
		if(!empty($banner['bannerId'])){
			$smarty->assign('banner', dbQuery('banners', DB_ARRAY, array('where'=>"bannerId = '$banner[bannerId]'")));
		}
		
	} elseif(!empty($action['generateCode'])){
	
		$banner['frame'] = $smarty->fetch('banners-output.tpl');	
		$smarty->assign('banner', $banner);	
		
	} elseif(!empty($action['save'])){
		
			$banner['lang'] = $lang;
			
			if(empty($banner['isActive'])) $banner['isActive'] = 0;
			
		if(is_file($_FILES['file']['tmp_name'])){
			$uploadedFile = getimagesize($_FILES['file']['tmp_name']);
			if($uploadedFile[2] != 1 AND $uploadedFile[2] != 2 AND $uploadedFile[2] != 3 AND $uploadedFile[2] != 4  AND $uploadedFile[2] != 13) $error['fileType'] = true;
			$fileSrc = $_FILES['file'];
		}
		if(empty($banner['bannerName'])) $error['bannerName'] = true;
		
		if(empty($error)){

			if(!empty($fileSrc)){
				$banner['bannerWidth']	 	= $uploadedFile[0];
				$banner['bannerHeight'] 	= $uploadedFile[1];
				$banner['bannerType'] 		= $uploadedFile[2];
				
				if(!is_dir(SITE_ROOT . '/uploads/bs')){
					mkdir(SITE_ROOT . '/uploads/bs', 0777);
				}
				
				/* Deleting old banner file */
				if($banner['fileUrl']){
					@unlink(SITE_ROOT . '/' . $banner['fileUrl']);
				}
				
				$fileExtension = explode("." , $_FILES['file']['name']);
				$fileExtension = $fileExtension[sizeof($fileExtension)-1];
				$banner['fileUrl'] = 'uploads/bs/bs-' . substr(md5($_FILES['file']['name'] . time()) , 3, 6) . '.' . $fileExtension;
				move_uploaded_file($_FILES['file']['tmp_name'], SITE_ROOT . '/' . $banner['fileUrl']);
				chmod(SITE_ROOT	 . '/' . $banner['fileUrl'], 0755);
			}

			$smarty->assignByRef('banner', $banner);
			$banner['generatedCode'] = $smarty->fetch('generate-banner-code.tpl');

			if(empty($banner['bannerId'])){
				if($banner['bannerId'] = dbQuery('banners', DB_INSERT, array('values'=>$banner))){
					/********** Inserting Entry **********/
					$messages['saved'] = true;
				}  else {
					$errors['not_saved'] = true;
				}	
			} else {
				/********** Updating Entry **********/
				if(dbQuery('banners', DB_UPDATE, array('where'=>"bannerId='$banner[bannerId]'", 'values'=>$banner))){
					$messages['saved'] = true;
				} else {
					$errors['not_saved'] = true;
				}	
				
			}
			
		} else {
			$smarty->assign('action', array('edit'=>true));
			$smarty->assign('error', $error);
		}
		
	} elseif(!empty($action['confirmDelete'])){
		$smarty->assign('banner', dbQuery('banners', DB_ARRAY, array('where'=>"bannerId = '$banner[bannerId]'", 'fields'=>'bannerId, bannerName')))	;
		
	} elseif(!empty($action['delete'])){

		$bannerFile = dbQuery('banners', DB_VALUE, array('where'=>"bannerId = '$banner[bannerId]'", 'fields'=>'fileUrl'));
		@unlink(SITE_ROOT . '/' . $bannerFile);
		dbQuery('banners', DB_DELETE, array('where'=>"bannerId = '$banner[bannerId]'"));
		$messages['deleted'] = true;
	}

	if(empty($noListing)){
		$adBanners = dbQuery('banners', DB_ARRAYS, array('order'=>"bannerId"));
		if(!empty($adBanners)){
			$smarty->assign('adBanners', $adBanners);
		}	
			
	}
	
	
	
	
	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
	$smarty->display('banners.tpl');
?>
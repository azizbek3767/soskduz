<?php
	include('../includes/admin.inc.php');
	if ($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));
    $logger = new Logger();

	$parentId 	      = (int) getRequestVar('parentId');
	$sectionId 	      = (int) getRequestVar('sectionId');
	$section  	      = getRequestVar('section');
	$action   	      = getRequestVar('action');
	$page     	      = (int) getRequestVar('page');
	$fieldcontent 	  = getRequestVar('fieldcontent', '', $noEscape = true);
	$success = '';
	$imageTmpName = '';
	

	
	if(isset($_FILES['file']) && $_POST['action'] == 'uploadImage') {	
    			
        $imageTmpName = empty($_SESSION['imageTmpName']) ? md5(microtime()) : $_SESSION['imageTmpName'];
        $_SESSION['imageTmpName'] = $imageTmpName; 

        if(empty($_FILES['file']['tmp_name']) || $_FILES['file']['tmp_name'] == 'none') {
            $error = '';
        } else {  
            $msg ='updd';
			$ext = explode(".", $_FILES['file']['name']);
            $extension = strtolower(array_pop($ext));
			/* WORKING WITH UPLOADED IMAGES */
			$image['fileName'] = substr(md5(number_format(time() * rand(),0,'','')),3,6) . "." . $extension;
    		$image['sectionId']    = $sectionId;
            $image['imageTmpName'] = $imageTmpName;
            $image['url'] 	       = SITE_URL.'/uploads/gallery/';

			dbQuery('section_gallerys', DB_REPLACE, array('values' => $image));	
			createThumbnail($_FILES['file']['tmp_name'], $config['smallX'], $config['smallY'], SITE_ROOT.'/uploads/gallery/small-'.$image['fileName'], $config['quality']);
			createThumbnail($_FILES['file']['tmp_name'], $config['mediumX'], $config['mediumY'], SITE_ROOT.'/uploads/gallery/medium-'.$image['fileName'], $config['quality']);
			createThumbnail($_FILES['file']['tmp_name'], $config['bigX'], $config['bigY'], SITE_ROOT.'/uploads/gallery/big-'.$image['fileName'], $config['quality']);
			@unlink($_FILES['file']['tmp_name']);
    			
			if(empty($error)){
    			$fileLists = dbQuery('section_gallerys', DB_ARRAYS, array('where'=>"sectionId='$sectionId'", 'orderBy'=>"imageId ASC"));
    			foreach($fileLists as $fileList){
        		  echo	'<div class="gallery-item item-'.$fileList['imageId'].'"><div class="image" id="image-'.$fileList['imageId'].'"><img src="'.SITE_URL.'/uploads/gallery/medium-'.$fileList['fileName'].'" alt=""/><ul class="gallery-item-controls"><li><span class="edit_image" data-id="'.$fileList['imageId'].'" data-desc="'.$fileList['description'].'" data-link="'.$fileList['link'].'" data-toggle="modal" data-target="#edit_image"><i class="fa fa-pen"></i></span></li></ul></div><div class="meta"><strong>'.$fileList['fileName'].'</strong><span class="im_desc">'.$fileList['description'].'</span><span class="im_link">'.$fileList['link'].'</span></div></div>';
    			}
			}		
        }	
        	
		exit;
    }
     
     
	if(isset($action['edit']) && !empty($action['edit'])){

		if(isset($section['sectionId']) && !empty($section['sectionId'])){
			/* getting info about section */
			$section = dbQuery('sections', DB_ARRAY, array('where'=>"sectionId='$section[sectionId]'"));
			
			if(empty($section['top_menu'])) $section['top_menu'] = 0;
			
			/* getting info about users who created and modified the section */
			$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$section[addedBy]', '$section[modifiedBy]')", 'indexKey'=>'userId'));
			$section['addedBy'] = empty($users[$section['addedBy']]) ? unknownUser() : $users[$section['addedBy']];
			$section['modifiedBy'] = empty($users[$section['modifiedBy']]) ? unknownUser() : $users[$section['modifiedBy']];
			$section['addedOn']    = langdate(adjustTime($section['addedOn'], false, 'd.m.Y H:i'));
			$section['modifiedOn'] = langdate(adjustTime($section['modifiedOn'], false, 'd.m.Y H:i'));
			
			/* getting article images */
			$images = dbQuery('section_images', DB_ARRAYS, array('where'=>"sectionId='$section[sectionId]'"));
			foreach($images as $image){
				if(!empty($image['codename'])){
					if(empty($section['images'])) $section['images'] = array();
					$section['images'][$image['codename']] = $image;
				}
			}
            /* получение картинки статьи */
            if ($files = dbQuery('section_files', DB_ARRAY, array('where'=>"sectionId='$section[sectionId]'"))) {
                $section['files'] = $files;
            }

			$fileList = dbQuery('section_gallerys', DB_ARRAYS, array('where'=>"sectionId='$section[sectionId]'", 'orderBy'=>"imageId ASC"));
			$smarty->assign('fileList', $fileList);


			$smarty->assign('section', $section);
		}

		loadFieldData();
		$noItems = true;

	/***** CUT FOR DEMO START *****/
	} elseif(isset($action['save']) && !empty($action['save'])) {
    	
		/* проверка полей */
		$section['name'] = trim($section['name']);
		if(empty($section['name'])) $errors['name'] = true;
		if(empty($section['top_menu'])) $section['top_menu'] = 0;
		if(empty($section['footer_menu'])) $section['footer_menu'] = 0;
		if(empty($section['top_submenu'])) $section['top_submenu'] = 0;
		if(empty($section['photo_gallery'])) $section['photo_gallery'] = 0;
		
		if($section['fileName'] == 'index'){
			$section['type'] = 'plain';
			$section['parentId'] = 0;
			if(empty($section['sectionId'])){
				if(dbQuery('sections', DB_VALUE, array('fields'=>'sectionId', 'where'=>"LOWER(fileName)=LOWER('$section[fileName]')"))) $errors['fileNameExists'] = true;
			} else {
				if(dbQuery('sections', DB_VALUE, array('fields'=>'sectionId', 'where'=>"sectionId<>'$section[sectionId]' AND LOWER(fileName)=LOWER('$section[fileName]')"))) $errors['fileNameExists'] = true;
			}
		}

		/* checking existance of children */
		if(!empty($section['sectionId'])) $oldSection = $SECTIONS[$section['sectionId']];
		if(empty($section['fileName'])){
			 $errors['fileName'] = true;
		} elseif(empty($section['sectionId'])){
			if (dbQuery('sections', DB_VALUE, array('fields'=>'sectionId', 'where'=>"LOWER(fileName)=LOWER('$section[fileName]')"))) $errors['fileNameExists'] = true;
		} else {
			if(dbQuery('sections', DB_VALUE, array('fields'=>'sectionId', 'where'=>"sectionId<>'$section[sectionId]' AND parentId='$section[parentId]' AND LOWER(fileName)=LOWER('$section[fileName]')"))) $errors['fileNameExists'] = true;
			if($section['type'] == 'plain'){
				if(dbQuery('sections', DB_VALUE, array('fields'=>'sectionId', 'where'=>"parentId='$section[sectionId]'"))) $errors['sectionType'] = true;
				if(dbQuery('articles', DB_VALUE, array('fields'=>'sectionId', 'where'=>"sectionId='$section[sectionId]'"))) $errors['sectionType'] = true;
			}
		}
		
		if(preg_match('/^(admin|images|files)$/i', $section['fileName'])) $errors['fileNameProhibited'] = true;
		if(preg_match('/[^0-9a-zA-Z\-_\.,]/i', $section['fileName'])) $errors['fileNameCharacters'] = true;
		if(strlen($section['fileName']) == 2) $errors['fileNameProhibited'] = true;

		if (empty($section['parentId'])) $section['parentId'] = 0;

		$templates = searchDir(THEME_ROOT.'/templates', '*.tpl');
		if(!in_array($section['templateName'], $templates)) $section['templateName'] = '';
		if(!in_array($section['subTemplateName'], $templates)) $section['subTemplateName'] = '';
		if(!in_array($section['artTemplateName'], $templates)) $section['artTemplateName'] = '';

        if($parentTypeContent = dbQuery('sections', DB_ARRAY, array('fields'=>'type_content, type', 'where'=>"sectionId='$section[parentId]'"))){
            if($parentTypeContent['type'] != $section['type']){  
				$errors['error_parent_type'] = true;               
			}elseif (!empty($section['type_content'])){
                if($parentTypeContent['type_content'] != $section['type_content']) $errors['error_parent_type_content'] = true;               
			}
        }
        
		if (empty($errors)) {
		
			if(empty($section['sectionId'])){
				$section['sectionId']  = NULL;
				$section['addedBy']    = $adminUser['userId'];
				$section['addedOn']    = gmdate('Y-m-d H:i:s');
				$section['modifiedBy'] = $adminUser['userId'];
				$section['modifiedOn'] = gmdate('Y-m-d H:i:s');
				$section['sortOrder']  = dbQuery('sections', DB_VALUE, array('fields'=>'MAX(sortOrder)', 'where'=>"parentId='$section[parentId]'")) + 1;

				if ($section['sectionId'] = dbQuery('sections', DB_INSERT, array('values' => $section))) {

					if (!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
					    die('im here baby');
    					$ext = explode(".", $_FILES['image']['name']);
                        $extension = strtolower(array_pop($ext)); 
						if ($images = createSectionImages($_FILES['image']['tmp_name'], $extension, $section['sectionId'], '', $_FILES['image']['name'])) {
							$sectionImages = dbQuery('section_images', DB_ARRAYS, array('where'=>"sectionId='$section[sectionId]' AND codename<>''", 'indexKey'=>'codename'));
							foreach($images as $codename=>$image) {
								if (!empty($sectionImages[$codename])) $image['imageId'] = $sectionImages[$codename]['imageId'];
								dbQuery('section_images', DB_REPLACE, array('values'=>$image));
							}
							$sectionUpdate['hasImage'] = 1;
						} else {
							$errors['image_not_saved'] = true;
						}
					}
                    /* добавление или замена изображения в статье */
                    if (!empty($_FILES['doc']) && is_uploaded_file($_FILES['doc']['tmp_name'])) {
                        if($files = createFiles($_FILES['doc'], 'sections',  $section['sectionId'])){
                            if ($updateFiles = dbQuery('section_files', DB_ARRAY, array('where'=>"sectionId='$files[sectionId]'"))) {
                                unlink(SITE_ROOT."/uploads/sections/$section[sectionId]/$updateFiles[fileName]");
                                dbQuery('section_files', DB_UPDATE, array('where'=> "fileId = $updateFiles[fileId]", 'values' => $files));
                            } else {
                                dbQuery('section_files', DB_INSERT, array('values' => $files));
                            }

                            $sectionUpdate['hasFile'] = 1;
                        }
                    }

					if ($section['photo_gallery'] == 1 && !empty($_FILES['file'])){
					    dbQuery('section_gallerys', DB_UPDATE, array('where'=>"imageTmpName ='$imageTmpName' AND sectionId=0", 'values'=>"sectionId='$section[sectionId]'"));
                        $_SESSION['imameTmpName'] = '';
					}
					
					if(!empty($sectionUpdate)) dbQuery('sections', DB_UPDATE, array('where'=>"sectionId='$section[sectionId]'", 'values'=>$sectionUpdate));
					$messages['saved'] = true;
				
					$parentId = $section['parentId'];
					
					if(!saveSerializations()) $errors['serializations'] = true;
					if(!writeHtaccess()) $errors['htaccess'] = true;
                    $logger->info("Добавлен новый раздел");
				} else {
					$errors['not_saved'] = true;
				}
				
			} else {
				
				//$oldSection = $SECTIONS[$section['sectionId']];
				//if(!($oldSection = dbQuery('sections', DB_ARRAY, array('where'=>$where)))) $errors['article_not_found'] = true;
					
				unset($section['addedBy']);
				unset($section['addedOn']);
				unset($section['sortOrder']);
				unset($section['images']);
				unset($section['hasImage']);
                if($section['parentId'] != $oldSection['parentId']){
					/* изменить порядок сортировки, если был изменен родитель */
					$section['sortOrder']  = dbQuery('sections', DB_VALUE, array('fields'=>'MAX(sortOrder)', 'where'=>"parentId='$section[parentId]'")) + 1;
				}
               
				$section['modifiedBy'] = $adminUser['userId'];
				$section['modifiedOn'] = gmdate('Y-m-d H:i:s');
				
				if(!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    				$ext = explode(".", $_FILES['image']['name']);
                    $extension = strtolower(array_pop($ext));

					if($images = createSectionImages($_FILES['image']['tmp_name'], $extension, $section['sectionId'], '', $_FILES['image']['name'])){


						$sectionImages = dbQuery('section_images', DB_ARRAYS, array('where'=>"sectionId='$section[sectionId]' AND codename<>''", 'indexKey'=>'codename'));

						foreach($images as $codename=>$image){
							if(!empty($sectionImages[$codename])) $image['imageId'] = $sectionImages[$codename]['imageId'];
							dbQuery('section_images', DB_REPLACE, array('values'=>$image));
						}
						$section['hasImage'] = 1;
					} else {
						$errors['image_not_saved'] = true;
					}
				}
                /* добавление или замена изображения в статье */
                if (!empty($_FILES['doc']) && is_uploaded_file($_FILES['doc']['tmp_name'])) {
                    if ($files = createFiles($_FILES['doc'], 'sections', $section['sectionId'])){

                        if ($updateFiles = dbQuery('section_files', DB_ARRAY, array('where'=>"sectionId='$files[sectionId]'"))) {
                            unlink(SITE_ROOT."/uploads/sections/$section[sectionId]/$updateFiles[fileName]");
                            dbQuery('section_files', DB_UPDATE, array('where'=> "fileId = $updateFiles[fileId]", 'values' => $files));
                        } else {
                            dbQuery('section_files', DB_INSERT, array('values' => $files));
                        }
                        $section['hasFile'] = 1;
                    }
                }
        				
				if(dbQuery('sections', DB_UPDATE, array('where'=>"sectionId='$section[sectionId]'", 'values'=>$section))){
					$messages['saved'] = true;
					if($section['parentId'] != $oldSection['parentId']){
						/* обновить порядок сортировки, если был изменен родитель */
						writeSortOrders($section['parentId']);
						writeSortOrders($oldSection['parentId']);
					}
					if(!saveSerializations()) $errors['serializations'] = true;
					if(!writeHtaccess()) $errors['htaccess'] = true;
					$parentId = $section['parentId'];

                    $logger->info("Раздел «" . $section['name'] . "» отредактирован");
				} else {
					$errors['not_saved'] = true;
				}
			}
			
		} else {
			/* если есть какие-либо ошибки в полях */
			loadFieldData();
			$smarty->assign('action', array('edit'=>true));
			$noItems = true;
		}
		$smarty->assign('section', $section);
		
	} elseif(isset($action['deleteSectionImage']) && !empty($action['deleteSectionImage']) && !empty($section['sectionId'])){
		$where[] = "sectionId='$section[sectionId]'";
		
		if($sectionId = dbQuery('sections', DB_VALUE, array('where'=>$where, 'fields'=>'sectionId'))){
			$images = dbQuery('section_images', DB_ARRAYS, array('where'=>"sectionId='$sectionId' AND codename<>''", 'indexKey'=>'codename'));
			foreach($images as $image) @unlink(SITE_ROOT."/uploads/sections/$section[sectionId]/$image[fileName]");
			dbQuery('section_images', DB_DELETE, array('where'=>"sectionId='$sectionId' AND codename<>''"));
			dbQuery('sections', DB_UPDATE, array('where'=>$where, 'values'=>"hasImage=0"));
			
			echo "document.getElementById('imageOptions').style.display='none';\r\n";
			deleteDir(SITE_ROOT."/uploads/sections/$section[sectionId]");
			exit;
		} else {
			echo "writeStatus('".lang('Удалено')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
			exit;
		}
	}  elseif (!empty($action['deleteFileSection']) && !empty($section['sectionId'])) { // удаление картинки
        $where[] = "sectionId='$section[sectionId]'";


        if ($file = dbQuery('section_files', DB_ARRAY, array('where' => $where))) {
            dbQuery('section_files', DB_DELETE, array('where'=> "fileId='$file[fileId]'" ));
            unlink(SITE_ROOT."/uploads/sections/$section[sectionId]/$file[fileName]");
            dbQuery('sections', DB_UPDATE, array('where' => $where, 'values'=>"hasFile=0"));

            echo "document.getElementById('delFile').style.display='none';\r\n";

            deleteIfEmpty(SITE_ROOT."/uploads/sections/$section[sectionId]");
            exit;
        } else {
            echo "writeStatus('".lang('НЕ удалено')."', 'aError');\r\n";
            echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
            exit;
        }
    } elseif (isset($action['moveUp']) && !empty($action['moveUp'])) {
		if($section = dbQuery('sections', DB_ARRAY, array('fields'=>'sectionId, sortOrder, parentId', 'where'=>"sectionId='$section[sectionId]'"))){
			if($upperSection = dbQuery('sections', DB_ARRAY, array('fields'=>'sectionId', 'where'=>"sortOrder=$section[sortOrder]-1 AND parentId=$section[parentId]"))){
				/* обновление разделов, двигаясь вверх */
				dbQuery('sections', DB_UPDATE, array('where'=>"sectionId='$section[sectionId]'", 'values'=>"sortOrder=sortOrder-1"));
				dbQuery('sections', DB_UPDATE, array('where'=>"sectionId='$upperSection[sectionId]'", 'values'=>"sortOrder=sortOrder+1"));
				if(saveSerializations()){
					echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
				} else {
					echo "writeStatus('".lang('sections:errors:9')."', 'aError');\r\n";
					echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
				}
				echo "swapElements('section-$section[sectionId]', 'section-$upperSection[sectionId]', 'section');\r\n";
			} else {
				echo "writeStatus(\"".lang('sections:errors:10')."\", 'aError');\r\n";
				echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
			}
		} else {
			echo "writeStatus(\"".lang('sections:errors:1')."\", 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	} elseif(isset($action['moveDown']) && !empty($action['moveDown'])){
		if($section = dbQuery('sections', DB_ARRAY, array('fields'=>'sectionId, sortOrder, parentId', 'where'=>"sectionId='$section[sectionId]'"))){
			if($downSection = dbQuery('sections', DB_ARRAY, array('fields'=>'sectionId', 'where'=>"sortOrder=$section[sortOrder]+1 AND parentId=$section[parentId]"))){
				/* обновление разделов, перемещение вниз */
				dbQuery('sections', DB_UPDATE, array('where'=>"sectionId='$section[sectionId]'", 'values'=>"sortOrder=sortOrder+1"));
				dbQuery('sections', DB_UPDATE, array('where'=>"sectionId='$downSection[sectionId]'", 'values'=>"sortOrder=sortOrder-1"));
				if(saveSerializations()){
					echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
				} else {
					echo "writeStatus('".lang('sections:errors:9')."', 'aError');\r\n";
					echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
				}
				echo "swapElements('section-$downSection[sectionId]', 'section-$section[sectionId]', 'section')";
			} else {
				echo "writeStatus(\"".lang('sections:errors:11')."\", 'aError');\r\n";
				echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
			}
		} else {
			echo "writeStatus(\"".lang('sections:errors:1')."\", 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	} elseif(isset($action['confirmDelete']) && !empty($action['confirmDelete'])){ // подтвердите удаление
		/* загрузка раздел */
		if($section = dbQuery('sections', DB_ARRAY, array('where'=>"sectionId='$section[sectionId]'"))){
			
			/* проверки, если раздел имеет подразделы */
			$section['hasSubsections'] = dbQuery('sections', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>"parentId='$section[sectionId]'"));

			/* проверки, если раздел имеет статьи */
			$section['hasArticles'] = dbQuery('articles', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>"sectionId='$section[sectionId]'"));

			if($section['hasSubsections']){
				$subsectionOptions = array('delete'=>lang('general:delete'));
				$subsectionOptions[0] = lang('sections:moveToRoot');
				$subsectionOptions += getSectionOptions($section['sectionId']);
				foreach($subsectionOptions as $key=>$name) if($key > 0) $subsectionOptions[$key] = lang('sections:moveTo').': '.$name;
				$smarty->assign('subsectionOptions', $subsectionOptions);
			}

			if($section['hasArticles']){
				$articleOptions = array('delete'=>lang('general:delete'));
				$articleOptions += getSectionOptions($section['sectionId']);
				foreach($articleOptions as $key=>$name) if($key > 0) $articleOptions[$key] = lang('sections:moveTo').': '.$name;
				unset($articleOptions[0]);
				$smarty->assign('articleOptions', $articleOptions);
			}
			
			$smarty->assign('section', $section);
			$noItems = true;
		} else {
			$errors['section_not_found'] = true;
		}
	} elseif(isset($action['deleteConfirmed']) && !empty($action['deleteConfirmed'])){ // deleteConfirmed - подтвердить удаление
		/* удаление раздела */
		if($section = dbQuery('sections', DB_ARRAY, array('where'=>"sectionId='$section[sectionId]'"))){
		
			/* обработка статей */
			if(isset($action['moveArticlesTo'])){
				if($action['moveArticlesTo'] == 'delete'){
					deleteArticles($section['sectionId']);
				} else {
					dbQuery('articles', DB_UPDATE, array('where'=>"sectionId='$section[sectionId]'", 'values'=>"sectionId='$action[moveArticlesTo]', url=CONCAT('".mysqli_real_escape_string($mysqli, $SECTIONS[$action['moveArticlesTo']]['path'])."', '/', fileName, '.".mysqli_real_escape_string($mysqli, $config['file_extension'])."')"));
				}
			}

			/* обработка подразделов */
			if(isset($action['moveSubsectionsTo'])){
				if($action['moveSubsectionsTo'] == 'delete'){
					if(!empty($SECTIONS[$section['sectionId']]['allChildren'])){
						dbQuery('sections', DB_DELETE, array('where'=>"sectionId IN ('".implode("', '", $SECTIONS[$section['sectionId']]['allChildren'])."')"));
						deleteArticles($SECTIONS[$section['sectionId']]['allChildren']);
					}
				} else {
					/* двигать подразделы */
					if($destSection = dbQuery('sections', DB_ARRAY, array('where'=>"sectionId='$action[moveSubsectionsTo]'"))){
						$maxSortOrder = (int) dbQuery('sections', DB_VALUE, array('fields'=>'MAX(sortOrder)', 'where'=>"parentId='$destSection[sectionId]'"));
						dbQuery('sections', DB_UPDATE, array('values'=>"sortOrder=sortOrder + $maxSortOrder, parentId='$destSection[sectionId]'", 'where'=>"parentId='$section[sectionId]'"));
						writeSortOrders($destSection['sectionId']);
					} else {
						$errors['section_not_found'] = true;
					}
				}
			}
			
			/* Работает удаление изображения вместе с удалением раздела удаляет из базы данных и папку */
			dbQuery('section_images', DB_DELETE, array('where'=>"sectionId='$section[sectionId]'"));
			$fileList = dbQuery('section_gallerys', DB_ARRAYS, array('fields'=>'fileName', 'where'=>"sectionId IN (".$section['sectionId'].")"));
    		foreach($fileList as $fileName){
    			@unlink(SITE_ROOT . "/uploads/gallery/small-" . $fileName['fileName']);
    			@unlink(SITE_ROOT . "/uploads/gallery/medium-" . $fileName['fileName']);
    			@unlink(SITE_ROOT . "/uploads/gallery/big-" . $fileName['fileName']);
    		}
    		dbQuery('section_gallerys', DB_DELETE, array('where'=>"sectionId IN (".$section['sectionId'].")"));
			deleteDir(SITE_ROOT."/uploads/sections/$section[sectionId]/");
			
			/* удаление раздела */
			dbQuery('sections', DB_DELETE, array('where'=>"sectionId='$section[sectionId]'"));
			writeSortOrders($section['parentId']);
			if(!saveSerializations()) $errors['serializations'] = true;
			if(!writeHtaccess()) $errors['htaccess'] = true;
			$messages['deleted'] = true;
			$smarty->assign('section', $section);

			/* перейти родителя, если нет подразделы */
			if(!dbQuery('sections', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>"parentId='$section[parentId]'"))){
				$parentId = dbQuery('sections', DB_VALUE, array('fields'=>'parentId', 'where'=>"sectionId='$section[parentId]'"));
			}
			
		} else {
			$errors['section_not_found'] = true;
		}
		
	}

	
	if (isset($_POST['action']) && $_POST['action'] == 'menu') {
		if($_POST['check'] == 1){
            if(dbQuery('sections', DB_UPDATE, array('where'=>"sectionId = '$_POST[id]'", 'values'=>"top_menu = 1"))){
      			if(!saveSerializations()) $errors['serializations'] = true;
      			if(!writeHtaccess()) $errors['htaccess'] = true;
      			$success = array('check' => 0);
    			}
    		}elseif ($_POST['check'] == 0){
      		  if(dbQuery('sections', DB_UPDATE, array('where'=>"sectionId = '$_POST[id]'", 'values'=>"top_menu = 0"))){
    	        if(!saveSerializations()) $errors['serializations'] = true;
                $success = array('check' => 1);
            }
        }
        echo json_encode($success);
        exit;
      }
  
    if (isset($_POST['action']) && $_POST['action'] == 'status') {
    	if (!empty($_POST['choice']) && $_POST['choice'] == 'visible') {
            if(dbQuery('sections', DB_UPDATE, array('where'=>"sectionId = '$_POST[id]'", 'values'=>"status = 'hidden'"))){
      			if(!saveSerializations()) $errors['serializations'] = true;
      			if(!writeHtaccess()) $errors['htaccess'] = true;
      			$success = array('choice' => 'hidden');
    		}
    	}
    	if (!empty($_POST['choice']) && $_POST['choice'] == 'hidden') {
            if(dbQuery('sections', DB_UPDATE, array('where'=>"sectionId = '$_POST[id]'", 'values'=>"status = 'visible'"))){
      			if(!saveSerializations()) $errors['serializations'] = true;
      			if(!writeHtaccess()) $errors['htaccess'] = true;
      			$success = array('choice' => 'visible');
    		}
    	}
        echo json_encode($success);
        exit;
    }
    
    if (isset($_POST['action']) && !empty($_POST['id']) && $_POST['action'] == 'editimage') {
        
        $imageUpdate['description'] = $_POST['desc'];
        $imageUpdate['link'] = $_POST['link'];
        if(dbQuery('section_gallerys', DB_UPDATE, array('where'=>"imageId = '$_POST[id]'", 'values'=>$imageUpdate))){
            $success = array('update' => 1);
        } else{
            $success = array('update' => 0);
        }
        echo json_encode($success);
        exit;
    }
    

	if (empty($noItems)) {
		/* перейти родительский раздел, если нет подраздела */
/*
		if(!empty($parentId) && !dbQuery('sections', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>"parentId='$parentId'"))){
			$parentId = dbQuery('sections', DB_VALUE, array('fields'=>'parentId', 'where'=>"sectionId='$parentId'"));
			header('Location: '.SITE_URL.'/admin/sections.php?parentId='.$parentId);
			die(lang('sections:noSubsections'));
		}
*/

		if($page < 1){
			$page = 1;
			$smarty->assign('page', $page);
		}
		$itemsPerPage = 15;

		if($parentId > 0){
    		
			/* получать информацию о родительском разделе */
			$parent = $SECTIONS[$parentId];
			if($parent['parentId'] > 0) $parent['parent'] = $SECTIONS[$parent['parentId']];
			$smarty->assign('parent', $parent);
		}

		$fields = array('sectionId, parentId, name, alias, top_menu, fileName, url, status, type_content, type');
		$sections = dbQuery('sections', DB_ARRAYS, array('fields'=>$fields, 'where'=>"parentId='$parentId'", 'start'=>($page-1)*$itemsPerPage - ($page > 1 ? 1 : 0), 'limit'=>$itemsPerPage + ($page > 1 ? 2 : 1), 'order'=>'sortOrder'));

		for ($i = 0; $i < count($sections); $i++) {
			$sections[$i]['statusName'] = lang('sections:statuses:'.$sections[$i]['status']);
			$sections[$i]['typeName'] = lang('sections:types:'.$sections[$i]['type']);
			$sections[$i]['typeContentName'] = lang('sections:typeContents:'.$sections[$i]['type_content']);
			if (($page > 1 && $i == 0) || (($i - $itemsPerPage >= 0) && ($i == count($sections) - 1))) $sections[$i]['isHidden'] = true;
			if (!empty($SECTIONS[$sections[$i]['sectionId']]['children'])) $sections[$i]['hasSubsections'] = true;
	
		}
		
/*
		if (empty($TREE)) {
			$totalSections = 0;
		} else {
			$totalSections = $parentId > 0 ? count($SECTIONS[$parentId]['children']) : count($TREE);
		}
*/
        $totalSections = 0;
		if ($parentId > 0 && !empty($SECTIONS[$parentId]['children'])) {
			$totalSections = count($SECTIONS[$parentId]['children']);
		} elseif (!empty($TREE)){
			$totalSections = count($TREE);
		}

		$pageNums = getPageNums($totalSections, $page, $itemsPerPage,0,4,4,0);
		$smarty->assign('sections', $sections);
		$smarty->assign('pageNums', $pageNums);
		$smarty->assign('parentId', $parentId);
		
	}

	if(isset($errors) && !empty($errors))   $smarty->assign('errors', $errors);
	if(isset($messages) && !empty($messages)) $smarty->assign('messages', $messages);
	$smarty->display('sections.tpl');

  
  	
	/***************** FUNCTIONS *****************/

	function deleteArticles($sectionIds){
		if(is_array($sectionIds)){
			$where = "sectionId IN('".implode("','", $sectionIds)."')";
		} else {
			$where = "sectionId='$sectionIds'";
		}
		$articleIds = dbQuery('articles', DB_ARRAYS, array('fields'=>'articleId', 'where'=>$where, 'valueKey'=>'articleId'));
		foreach($articleIds as $articleId){
			dbQuery('articles', DB_DELETE, array('where'=>"articleId='$articleId'"));
			dbQuery('comments', DB_DELETE, array('where'=>"articleId='$articleId'"));
			deleteDir(SITE_ROOT."/uploads/articles/$articleId/");
		}
	}
	function writeSortOrders($parentId = 0){
		$sections = dbQuery('sections', DB_ARRAYS, array('fields'=>'sectionId, sortOrder', 'where'=>"parentId='$parentId'", 'order'=>'sortOrder'));
		$sortOrder = 0;
		foreach($sections as $section){
			$sortOrder++;
			if($section['sortOrder'] != $sortOrder){
				dbQuery('sections', DB_UPDATE, array('where'=>"sectionId='$section[sectionId]'", 'values'=>array('sortOrder'=>$sortOrder)));
			}
		}
	}
	
	
	function loadFieldData(){
		global $smarty, $config, $SECTIONS, $section;

		if(!empty($section['sectionId'])){

			$smarty->assign('parents', getSectionOptions($section['sectionId']));
		} else {
			$smarty->assign('parents', getSectionOptions());
		}

		/* template options */
		$templates = searchDir(THEME_ROOT.'/templates', '*.tpl');
		array_unshift($templates, lang('general:useDefaultTemplate'));
		$smarty->assign('templates', $templates);

		/* caching time options */
		for($i = 1; $i <= 60; $i++) $cachingTimeOptions[$i] = $i;
		$smarty->assign('cachingTimeOptions', $cachingTimeOptions);
		$smarty->assign('cachingPeriodOptions', lang('general:cachingPeriodOptions'));
		$smarty->assign('statuses', lang('sections:statuses'));
		$smarty->assign('typeContents', lang('sections:typeContents'));
		$smarty->assign('types', lang('sections:types'));
		
		
		
	}	
	

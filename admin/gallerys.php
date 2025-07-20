<?php
	include('../includes/admin.inc.php');

	$action  = getRequestVar('action');
	$article = arrAddSlashes(getRequestVar('article', '', $noEscape = true));
	$query   = getRequestVar('query');
	$section = (int) getRequestVar('section');
	$status  = getRequestVar('status');
	$page    = (int) getRequestVar('page');
	$articleId    = (int) getRequestVar('articleId');
	$type_content  = getRequestVar('type_content', 'gallerys');
	$table = 'articles';
    
	if(empty($adminUser['permitAllSections'])){
		$allowedSections = getAllowedSections();
		if(empty($allowedSections)){
			$allowedSections = array(-1);
			$errors['access_denied'] = true;
			$action = array();
			$smarty->clearAssign('action');
		}
	}
	
	$imageTmpName = empty($_SESSION['imageTmpName']) ? md5(microtime()) : $_SESSION['imageTmpName'];
    $_SESSION['imageTmpName'] = $imageTmpName; 
        
	if(isset($_FILES['file']) && $_POST['action'] == 'uploadImage') {	
	
        if(empty($_FILES['file']['tmp_name']) || $_FILES['file']['tmp_name'] == 'none') {
            $error = '';
        } else {
            $msg ='updd';
			$ext = explode(".", $_FILES['file']['name']);
            $extension = strtolower(array_pop($ext));
			/* WORKING WITH UPLOADED IMAGES */
			$image['fileName'] = substr(md5(number_format(time() * rand(),0,'','')),3,6) . ".".$extension;
			$image['articleId'] 	= $articleId;
			$image['imageTmpName'] 	= $imageTmpName;
			$image['url'] 	= SITE_URL.'/uploads/gallery/';
			
			dbQuery('article_gallerys', DB_REPLACE, array('values'=>$image));
			
			createThumbnail($_FILES['file']['tmp_name'], $config['smallX'],  $config['smallY'],  SITE_ROOT. '/uploads/gallery/small-' . $image['fileName'],  $config['quality']);
			createThumbnail($_FILES['file']['tmp_name'], $config['mediumX'], $config['mediumY'], SITE_ROOT .'/uploads/gallery/medium-'.$image['fileName'], $config['quality']);
			createThumbnail($_FILES['file']['tmp_name'], $config['bigX'], 	 $config['bigY'],    SITE_ROOT. '/uploads/gallery/big-'.$image['fileName'],      $config['quality']);
			@unlink($_FILES['file']['tmp_name']);
			if (empty($error)) {
    			if (!empty($articleId)){
    			    $fileLists = dbQuery('article_gallerys', DB_ARRAYS, array('where'=>"articleId='$articleId'"));
    			} else {
        			$fileLists = dbQuery('article_gallerys', DB_ARRAYS, array('where'=>"articleId='0'"));
    			}
    			foreach($fileLists as $fileList){
        		  echo	'<div class="gallery-item item-'.$fileList['imageId'].'"><div class="image" id="image-'.$fileList['imageId'].'"><img src="'.SITE_URL.'/uploads/gallery/medium-'.$fileList['fileName'].'" alt=""/></div><div class="meta"><strong>'.$fileList['fileName'].'</strong><span class="im_desc">'.$fileList['description'].'</span><span class="im_link">'.$fileList['link'].'</span></div></div>';
    			}
			}		
        }	
        	
		exit;
    }

	if(!empty($action['edit'])){
		$sections = getSectionContent($mysqli, $type_content);
		if(count($sections) < 2) $errors['no_sections'] = true;

		if(empty($errors) && !empty($article['articleId'])){
			$where[] = "articleId='$article[articleId]'";

			/* проверка уровня доступа */
			if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";

			/* проверка раздела */
			if(empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

			if ($article = dbQuery("{$table}", DB_ARRAY, array('where'=>$where))){
				/* получать информацию о пользователях, которые создали и изменили статью */
				$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$article[addedBy]', '$article[modifiedBy]')", 'indexKey'=>'userId'));
				$article['addedBy'] = empty($users[$article['addedBy']]) ? unknownUser() : $users[$article['addedBy']];
				$article['modifiedBy'] = empty($users[$article['modifiedBy']]) ? unknownUser() : $users[$article['modifiedBy']];
				$article['addedOn']     = langdate(adjustTime($article['addedOn'], false, 'F j, Y H:i'));
				$article['modifiedOn']  = langdate(adjustTime($article['modifiedOn'], false, 'F j, Y H:i'));
				$article['publishedOn'] = adjustTime($article['publishedOn']);
				
				$fileList = dbQuery('article_gallerys', DB_ARRAYS, array('where'=>"articleId='$article[articleId]'"));
				$smarty->assign('fileList', $fileList);

				/* получение картинки статьи */
				$images = dbQuery('article_images', DB_ARRAYS, array('where'=>"articleId='$article[articleId]'"));
				foreach($images as $image){
					if(!empty($image['codename'])){
						if(empty($article['images'])) $article['images'] = array();
						$article['images'][$image['codename']] = $image;
					}
				}

				$smarty->assign('article', $article);
			} else {
				$errors['article_not_found'] = true;
			}
		} 
		
		if(empty($errors)){
			$noItems = true;
			$smarty->assign('statuses', array_slice(lang('articles:statuses'), 1));
			$smarty->assign('sections', $sections);
			$smarty->assign('adjustedNow', adjustTime(gmdate('Y-m-d H:i:s')));
		} else {
			$smarty->clearAssign('action');
		}

	} elseif(!empty($action['save'])){
		/* проверка полей */
		if(empty($article['title'])) $errors['title'] = true;
		$article['type_content'] = $type_content;

		/* проверка раздела статьи */
		$sections = getSectionContent($mysqli, $type_content);
		if(empty($article['sectionId']) || empty($sections[$article['sectionId']])) $errors['sectionId'] = true;

		if(empty($article['fileName'])){
			if($maxId = dbQuery("{$table}", DB_VALUE, array('fields'=>'MAX(articleId)'))){
				$article['fileName'] = $maxId + 1;
			} else {
				$article['fileName'] = 1;
			}
		} elseif(empty($article['articleId'])){
			if(dbQuery("{$table}", DB_VALUE, array('fields'=>'articleId', 'where'=>"LOWER(fileName)=LOWER('$article[fileName]')"))) $errors['fileNameExists'] = true;
		} else {
			if(dbQuery("{$table}", DB_VALUE, array('fields'=>'articleId', 'where'=>"articleId<>'$article[articleId]' AND LOWER(fileName)=LOWER('$article[fileName]')"))) $errors['fileNameExists'] = true;
		}
		if(preg_match('/^(page\d+|index)$/i', $article['fileName'])) $errors['fileNameProhibited'] = true;
		if(preg_match('/[^0-9a-zA-Z\-_\.,]/i', $article['fileName'])) $errors['fileNameCharacters'] = true;

		$article['publishedOn'] = "$article[Year]-$article[Month]-$article[Day] $article[Hour]:$article[Minute]:00";
		if(!empty($article['Meridian'])) $article['publishedOn'] .= " $article[Meridian]";
		$article['publishedOn'] = date('Y-m-d H:i:s', strtotime($article['publishedOn']));

		if(empty($errors)){
			$article['url'] = mysqli_real_escape_string($mysqli, $SECTIONS[$article['sectionId']]['path'].'/'.$article['fileName'].'.'.$config['file_extension']);
			
			if(empty($article['articleId'])){
				/********** Установка запись **********/
				$article['addedBy']      = $adminUser['userId'];
				$article['addedOn']      = gmdate('Y-m-d H:i:s');
				$article['modifiedBy']   = $adminUser['userId'];
				$article['modifiedOn']   = gmdate('Y-m-d H:i:s');
				$article['publishedOn']  = adjustTime($article['publishedOn'], $isReverse = true);
				if($adminUser['accessLevel'] == 'writer'){
					$article['status'] = 'pending';
					$article['isFeatured'] = 0;
				}

				if($article['articleId'] = dbQuery('articles', DB_INSERT, array('values'=>$article))){
					/* добавление изображения к статье */
					if(!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        if (uploadedFile($_FILES, $article['articleId'])) {
                            $articleUpdate['hasImage'] = 1;
                        } else {
                            $errors['image_not_saved'] = true;
                            $logger->error("Картинка не загружена при добавление галереи" . $article['title']);
                        }
					}
					

					/* Установка sectionId для изображений */
					dbQuery('article_gallerys', DB_UPDATE, array('where'=>"imageTmpName ='$imageTmpName'  AND articleId=0", 'values'=>"articleId='$article[articleId]'"));
					$_SESSION['imageTmpName'] = '';

					if(!empty($articleUpdate)) dbQuery("{$table}", DB_UPDATE, array('where'=>"articleId='$article[articleId]'", 'values'=>$articleUpdate));
					$messages['saved'] = true;
                    $logger->info("Добавлена новая галерея «" . $article['title'] . "»");
				} else {
					$errors['not_saved'] = true;
				}
			} else {
				/********** Обновление записи **********/

				/* access level check */
				if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";

				$where[] = "articleId='$article[articleId]'";
				if(!($oldArticle = dbQuery("{$table}", DB_ARRAY, array('where'=>$where)))) $errors['article_not_found'] = true;

				if(empty($errors)){

					unset($article['addedBy']);
					unset($article['addedOn']);
					unset($article['images']);
					unset($article['hasImage']);

					$article['modifiedBy']   = $adminUser['userId'];
					$article['modifiedOn']   = gmdate('Y-m-d H:i:s');
					$article['publishedOn']  = adjustTime($article['publishedOn'], $isReverse = true);
					if(empty($article['isFeatured'])) $article['isFeatured'] = 0;
					if($adminUser['accessLevel'] == 'writer'){
						$article['status'] = 'pending';
						unset($article['isFeatured']);
					}

					/* добавление или замена изображения в статье */
					if(!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        if (uploadedFile($_FILES, $article['articleId'])) {
                            $article['hasImage'] = 1;
                        } else {
                            $errors['image_not_saved'] = true;
                            $logger->error("Картинка не загружена при редактирование" . $article['title']);
                        }
					}
					
					if (dbQuery("{$table}", DB_UPDATE, array('where'=>"articleId='$article[articleId]'", 'values'=>$article))) {
						$messages['saved'] = true;
                        $logger->info("Галерея «" . $article['title'] . "» отредактирована");
					} else {
						$errors['not_saved'] = true;
					}
				}
			}

			/* удаление пустых директорий */
			if(!empty($article['articleId'])){
				deleteIfEmpty(SITE_ROOT."/uploads/articles/$article[articleId]");

				/* deleting old temporary directories */
				deleteOldTmpDirs(SITE_ROOT."/uploads/articles");
			}
		} else {
			/* if there are any errors in fields */
			$smarty->assign('sections', getSectionContent($mysqli, $type_content));
			$smarty->assign('statuses', array_slice(lang('articles:statuses'), 1));
			$smarty->assign('action', array('edit'=>true));
			$article = arrStripSlashes($article);
			$smarty->assign('article', $article);
			$noItems = true;
		}
	} elseif(!empty($action['deleteGalleryImage']) && !empty($article['articleId'])){ // удаление картинки
		$where[] = "articleId='$article[articleId]'";
		if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";
		if(empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

		/* deleting image */
		if($articleId = dbQuery("{$table}", DB_VALUE, array('where'=>$where, 'fields'=>'articleId'))){
			$images = dbQuery('article_images', DB_ARRAYS, array('where'=>"articleId='$articleId' AND codename<>''", 'indexKey'=>'codename'));
			foreach($images as $image) @unlink(SITE_ROOT."/uploads/articles/$article[articleId]/$image[fileName]");
			dbQuery('article_images', DB_DELETE, array('where'=>"articleId='$articleId' AND codename<>''"));
			dbQuery('articles', DB_UPDATE, array('where'=>$where, 'values'=>"hasImage=0"));

			echo "document.getElementById('imageOptions').style.display='none';\r\n";
			
			deleteIfEmpty(SITE_ROOT."/uploads/articles/$article[articleId]");
			exit;
		} else {
			echo "writeStatus('".lang('articles:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
			exit;
		}
	} elseif(!empty($action['deleteGallery']) && !empty($article['articleId'])){ // удаление статьи
		$where[] = "articleId='$article[articleId]'";
		if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";
		if(empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

		if(dbQuery("{$table}", DB_DELETE, array('where'=>$where))){
			dbQuery('comments', DB_DELETE, array('where'=>"articleId = '$article[articleId]'"));
			dbQuery('article_images', DB_DELETE, array('where'=>"articleId='$article[articleId]'"));
			$fileList = dbQuery('article_gallerys', DB_ARRAYS, array('fields'=>'fileName', 'where'=>"articleId IN (".$article['articleId'].")"));
    		foreach($fileList as $fileName){
    			@unlink(SITE_ROOT . "/uploads/gallery/small-" . $fileName['fileName']);
    			@unlink(SITE_ROOT . "/uploads/gallery/medium-" . $fileName['fileName']);
    			@unlink(SITE_ROOT . "/uploads/gallery/big-" . $fileName['fileName']);
    		}
    		dbQuery('article_gallerys', DB_DELETE, array('where'=>"articleId IN (".$article['articleId'].")"));
			deleteDir(SITE_ROOT."/uploads/articles/$article[articleId]/");

			echo "removeElement($article[articleId], 'article');\r\n";
            $logger->info("Статья «ID-" . $article['articleId'] . "» удалена.");
		} else {
			echo "writeStatus('".lang('articles:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	} elseif(!empty($action['approveGallery']) && !empty($article['articleId'])){
		$where[] = "articleId='$article[articleId]'";
		/* checking access level */
		if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";

		/* checking section permission */
		if(empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

		/* approving article */
		if(dbQuery("{$table}", DB_UPDATE, array('where'=>$where, 'values'=>"status='visible'"))){
			echo "writeStatus('".lang('articles:messages:3')."');\r\n";
			echo "document.getElementById('status-$article[articleId]').innerHTML = 'Включено';\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
		} else {
			echo "writeStatus('".lang('articles:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	/***** CUT FOR DEMO END *****/
	}
    
    if(isset($_POST['action']) && !empty($_POST['id']) && $_POST['action'] == 'editimage'){
        
        $imageUpdate['description'] = $_POST['desc'];
        $imageUpdate['link'] = $_POST['link'];
        if(dbQuery('article_gallerys', DB_UPDATE, array('where'=>"imageId = '$_POST[id]'", 'values'=>$imageUpdate))){
            $success = array('update' => 1);
        } else{
            $success = array('update' => 0);
        }
        echo json_encode($success);
        exit;
    }
    
	if(empty($noItems)){
		if($page < 1){
			$page = 1;
			$smarty->assign('page', $page);
		}
		$itemsPerPage = 15;
		$where = array();
		
		/* processing search fields */
		if(!empty($query)) $where[] = "MATCH(title, content) AGAINST ('$query')";
		if(!empty($status)) $where[] = "status = '$status'";
		if(!empty($type_content)) $where[] = "type_content = '$type_content'";

		/* access level check */
		if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";

		/* showing articles from allowed sections only */
		if(empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

		if(!empty($section) && !empty($SECTIONS[$section])){
			$sectionIds = array($section);
			if(!empty($SECTIONS[$section]['allChildren'])) $sectionIds = array_merge($sectionIds, $SECTIONS[$section]['allChildren']);
			$where[] = "sectionId IN (".implode(',', $sectionIds).")";
		}

        $fields = array('articleId', 'title', 'sectionId', 'isFeatured', 'url', 'publishedOn', 'type_content', 'status', 'hasImage');
		$articles = dbQuery(
			"{$table}",
			DB_ARRAYS,
			array(
				'fields'=>$fields,
				'start'=>($page-1)*$itemsPerPage,
				'limit'=>$itemsPerPage,
				'order'=>'publishedOn DESC',
				'indexKey'=>'articleId',
				'where'=>$where
			)
		);
		$articles = prepareArticles($articles);
		$sections = getSectionContent($mysqli, $type_content);

		$sections[0] = lang('articles:allSections');
		foreach($articles as $articleId=>$article){
			$articles[$articleId]['statusName'] = lang('articles:statuses:'.$articles[$articleId]['status']);
			$articles[$articleId]['publishedOn'] = langdate(adjustTime($article['publishedOn'], false, 'd.m.Y'));
			$articles[$articleId]['section'] = array();
			if(isset($SECTIONS[$article['sectionId']])) $articles[$articleId]['section'] = $SECTIONS[$article['sectionId']];
			if(isset($sections[$article['sectionId']])) $articles[$articleId]['section']['fullName'] = $sections[$article['sectionId']];
		}

		/* statuses */
		$smarty->assign('statuses', lang('articles:statuses'));

		$totalArticles = dbQuery("{$table}", DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where));
		$pageNums = getPageNums($totalArticles, $page, $itemsPerPage, 0, 4, 4, 0);
		$smarty->assign('totalArticles', $totalArticles);
		$smarty->assign('articles', $articles);
		$smarty->assign('pageNums', $pageNums);
		$smarty->assign('sections', $sections);
		$smarty->assign('type_content', $type_content);	
	}

	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
	try {
		$smarty->display('gallerys.tpl');
	} catch (Exception $e) {
		$e->getMessage();
	}

function uploadedFile($img, $articleId) {
    $ext = explode(".", $img['image']['name']);
    $extension = strtolower(array_pop($ext));
    if($images = createThumbnails($img['image']['tmp_name'], $extension, $articleId, '', $img['image']['name'])){
        $articleImages = dbQuery('article_images', DB_ARRAYS, array('where'=>"articleId='$articleId' AND codename<>''", 'indexKey'=>'codename'));
        foreach($images as $codename=>$image){
            if(!empty($articleImages[$codename])) $image['imageId'] = $articleImages[$codename]['imageId'];
            dbQuery('article_images', DB_REPLACE, array('values'=>$image));
        }
        return true;
    }
    return false;
}

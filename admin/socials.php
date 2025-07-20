<?php
	include('../includes/admin.inc.php');
	if ($adminUser['accessLevel']!='administrator' and $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));
	
	$social	= arrAddSlashes(getRequestVar('social','',$noEscape=true));
	$action = getRequestVar('action', '');
	$page   = (int)getRequestVar('page','');
	$table  = 'socials';
	
	if (!empty($action['edit'])) {
		
		if (empty($errors) && !empty($social['socialId'])) {
			$social = dbQuery("{$table}", DB_ARRAY, array('where' => "socialId = '$social[socialId]'"));
			$smarty->assign('social', $social);
		}
		
	} elseif (!empty($action['save'])) {
		
		if (empty($social['name'])) $errors['name']=true;
		
		if (empty($social['fileName'])) {
			if ($maxId = dbQuery("{$table}", DB_VALUE, array('fields'=>'MAX(socialId)'))) {
				$social['fileName'] = $maxId + 1;
			} else {
				$social['fileName'] = 1;
			}
		} elseif (empty($social['socialId'])) {
			if (dbQuery("{$table}", DB_VALUE, array('fields'=>'socialId', 'where'=>"LOWER(fileName)=LOWER('$social[fileName]')"))) $errors['fileNameExists'] = true;
		} else {
			if (dbQuery("{$table}", DB_VALUE, array('fields'=>'socialId', 'where'=>"socialId<>'$social[socialId]' AND LOWER(fileName)=LOWER('$social[fileName]')"))) $errors['fileNameExists'] = true;
		}
		if (preg_match('/^(page\d+|index)$/i', $social['fileName'])) $errors['fileNameProhibited'] = true;
		if (preg_match('/[^0-9a-zA-Z\-_\.,]/i', $social['fileName'])) $errors['fileNameCharacters'] = true;
		
		
		if (empty($errors)) {
			
			if (empty($social['socialId'])) {
				dbQuery("{$table}",DB_INSERT,array('values'=>$social));
				$messages['saved'] = true;
                $logger->info("Добавлена новая соц.сеть «" . $social['name'] . "»");
			} else {
				if (dbQuery("{$table}",DB_UPDATE,array('where'=>"socialId='$social[socialId]'",'values'=>$social))) {
					$messages['saved'] = true;
                    $logger->info("Соц.сеть «" . $social['name'] . "» отредактирована");
				} else {
					$errors['not_saved'] = true;
                    $logger->error("Соц.сеть «" . $social['name'] . "» не сохранена");
				}
			}
		} else {
			$smarty->assign('action',array('edit'=>true));
			$smarty->assign('social',$social);
			$noItems=true;
		}

	} elseif (!empty($action['deleteSocial'])) {

		if (dbQuery("{$table}", DB_DELETE, array('where'=>"socialId='$social[socialId]'"))) {
			echo "removeElement($social[socialId], 'social');\r\n";
            $logger->info("Соц.сеть «ID-" . $social['socialId'] . "» удалена.");
		} else {
			echo "writeStatus('".lang('socials:errors:2')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	}
	if (empty($noItems)) {
		if ($page < 1) {
			$page = 1;
			$smarty->assign('page',$page);
		}
		$itemsPerPage = 45;
		
		$socials = dbQuery("{$table}",DB_ARRAYS,array('start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'indexKey'=>'socialId'));
		foreach($socials as $socialId => $social){
			$socials[$socialId]['status'] = lang('socials:statuses:'.$socials[$socialId]['status']);
		}
	
		$totalSocials=dbQuery("{$table}",DB_VALUE,array('fields'=>'COUNT(*)'));
		$pageNums = getPageNums($totalSocials, $page, $itemsPerPage,0,4,4,0);
		$smarty->assign('socials', $socials);
		$smarty->assign('pageNums', $pageNums);

	}
	
	$smarty->assign('statuses', lang('socials:statuses'));
		
	if (!empty($errors)) $smarty->assign('errors', $errors);
	if (!empty($messages)) $smarty->assign('messages', $messages);

    try {
        $smarty->display('socials.tpl');
    } catch (Exception $e) {
        $e->getMessage();
    }


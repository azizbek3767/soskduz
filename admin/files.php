<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$path   = getRequestVar('path', '', $noEscape = true);
	$action = getRequestVar('action');
	$folder = getRequestVar('folder');
	$file   = getRequestVar('file', '', $noEscape = true);
	
	$realPath = realpath(SITE_ROOT.'/uploads/files').DIRECTORY_SEPARATOR;
	$path = str_replace(SITE_ROOT, '', $realPath);
	$smarty->assign('path', $path);

	if(!empty($action['delete'])){
		if(is_file($realPath.$file['name'])){
			if (@unlink($realPath.$file['name'])) {
				$messages['deletedFile'] = true;
			} else {
				$errors['deleteFile'] = true;
			}
		}
	} 

	if(empty($noItems)){
		if($path != DIRECTORY_SEPARATOR){
			$upPath = realpath($realPath).DIRECTORY_SEPARATOR;
			$upPath = str_replace(SITE_ROOT, '/uploads/', $upPath);
		} else {
			$upPath = $path;
		}
		$smarty->assign('upPath', $upPath);

		if($dh = @opendir($realPath)){
			while (($fileName = readdir($dh)) !== false){
				if(!preg_match('/[\/\\\\]\./i', $path . $fileName)){
					$stat = stat($realPath . $fileName);
					$stat['name'] = $fileName;
					if(is_dir($realPath . $fileName)){
						$list['dirs'][] = $stat;
					} else {
						$list['files'][] = $stat;
					}
				}
			}
			
			if(!empty($list)) $smarty->assign('list', $list);
			closedir($dh);
		}
	}
	
	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
	
	$smarty->display('files.tpl');
		
	
/*
	$path   = getRequestVar('path', '', $noEscape = true);
	$action = getRequestVar('action');
	$folder = getRequestVar('folder');
	$file   = getRequestVar('file', '', $noEscape = true);
	
    $realPath = realpath(UPLOAD_ROOT . $path).DIRECTORY_SEPARATOR;
	if(strpos($realPath, UPLOAD_ROOT) === false) $realPath = UPLOAD_ROOT . DIRECTORY_SEPARATOR;

	$path = str_replace(UPLOAD_ROOT, '', $realPath);
	$smarty->assign('path', $path);

	if(!empty($action['delete'])){
		if(is_file($realPath.$file['name'])){
			if (@unlink($realPath.$file['name'])) {
				$messages['deletedFile'] = true;
			} else {
				$errors['deleteFile'] = true;
			}
		}
	} 

	if(empty($noItems)){

		if($path != DIRECTORY_SEPARATOR){
			$upPath = realpath($realPath.'/../').DIRECTORY_SEPARATOR;
			$upPath = str_replace(UPLOAD_ROOT, '', $upPath);
		} else {
			$upPath = $path;
		}

		$smarty->assign('upPath', $upPath);


		if ($dh = @opendir($realPath)) {
    		
			while (($fileName = readdir($dh)) !== false) {
    			
				if (!preg_match('/[\/\\\\]\./i', $path . $fileName)) {
    				
					$stat = stat($realPath . $fileName);
					$stat['name'] = $realPath;
					
					if (is_dir($realPath . $fileName)) {
						$list['dirs'][] = $stat;
					} else {
						$list['files'][] = $stat;
					}
					
				}
				
			}
			
			if(!empty($list['dirs'])) usort($list['dirs'], 'sortListByName');
			if(!empty($list['files'])) usort($list['files'], 'sortListByName');
			
			if(!empty($list)) $smarty->assign('list', $list);
			closedir($dh);
		}
	}
	
	function sortListByName(&$a, &$b){
		return strcasecmp($a['name'], $b['name']);
	}
	
	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
	
	$smarty->display('files.tpl');
	
	
*/
<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$path   = getRequestVar('path', '', $noEscape = true);
	$action = getRequestVar('action');
	$folder = getRequestVar('folder');
	$file   = getRequestVar('file', '', $noEscape = true);

	$realPath = realpath(GLOBAL_ROOT.$path).DIRECTORY_SEPARATOR;
	if(strpos($realPath, GLOBAL_ROOT) === false) $realPath = GLOBAL_ROOT.DIRECTORY_SEPARATOR;

	$path = str_replace(GLOBAL_ROOT, '', $realPath);
	$smarty->assign('path', $path);

	/***** CUT FOR DEMO START *****/
	if(!empty($action['upload'])){
		/* uploading file */
		if(preg_match('/[^0-9a-zA-Z\-_\. ]/i', $_FILES['upload']['name'])) $errors['fileNameCharacters'] = true;

		if(empty($errors)){
			if (@move_uploaded_file($_FILES['upload']['tmp_name'], $realPath.$_FILES['upload']['name'])) {
				$messages['uploaded'] = true;
			} else {
				$errors['upload'] = true;
			}
		}

	} elseif(!empty($action['add_folder'])){
		/* adding new folder */
		if(preg_match('/[^0-9a-zA-Z\-_\. ]/i', $folder['name'])) $errors['fileNameCharacters'] = true;

		if(empty($errors)){
			if(mkdir($realPath.$folder['name'])) {
				$messages['folder'] = true;
			} else {
				$errors['folder'] = true;
			}
		}

	} elseif(!empty($action['delete'])){
		if(is_file($realPath.$file['name'])){
			if (@unlink($realPath.$file['name'])) {
				$messages['deletedFile'] = true;
			} else {
				$errors['deleteFile'] = true;
			}
		} elseif(is_dir($realPath.$file['name'])) {
			if (@rmdir($realPath.$file['name'])) {
				$messages['deletedFolder'] = true;
			} else {
				$errors['deleteFolder'] = true;
			}
		}

	} elseif(!empty($action['edit']) && !empty($file['name'])){
		/* editing file */
		if(!is_file($realPath.$file['name'])) $errors['fileNotFound'] = true;

		if(empty($errors)){
			$file['content'] = file_get_contents($realPath.$file['name']);
			$smarty->assign('file', $file);
			$noItems = true;
		}

	} elseif(!empty($action['save']) && !empty($file['name'])){
		/* saving file */
		if(!is_file($realPath.$file['name'])) $errors['fileNotFound'] = true;

		if(empty($errors)){
			if($fh = fopen($realPath.$file['name'], 'wb')){
				fwrite($fh, $file['content']);
				fclose($fh);
				$messages['saved'] = true;
			} else {
				$errors['save'] = true;
			}
		}

	}
	/***** CUT FOR DEMO END *****/

	if(empty($noItems)){
		/* outputting file list */
		if($path != DIRECTORY_SEPARATOR){
			$upPath = realpath($realPath.'/../').DIRECTORY_SEPARATOR;
			$upPath = str_replace(GLOBAL_ROOT, '', $upPath);
		} else {
			$upPath = $path;
		}
		$smarty->assign('upPath', $upPath);

		if($dh = @opendir($realPath)){
			while (($fileName = readdir($dh)) !== false){
				if(!preg_match('/[\/\\\\]\./i', $path.$fileName)){
					$stat = stat($realPath.$fileName);
					$stat['name'] = $fileName;
					if(is_dir($realPath.$fileName)){
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
	$smarty->display('file-manager.tpl');
?>
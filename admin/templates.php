<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$path   = getRequestVar('path', '', $noEscape = true);
	$action = getRequestVar('action');
	$folder = getRequestVar('folder');
	$file   = getRequestVar('file', '', $noEscape = true);
	$template = getRequestVar('template', '', $noEscape = true);
	
	$settings = getRequestVar('settings', '', $noEscape = true);
	$date     = getRequestVar('date');
	$template['content'] = lang('templates:dateTemplateNewFile');

	$realPath = realpath(GLOBAL_ROOT.$path."/themes/$config[theme]/").DIRECTORY_SEPARATOR;
	if(strpos($realPath, GLOBAL_ROOT) === false) $realPath = GLOBAL_ROOT.DIRECTORY_SEPARATOR;

	$path = str_replace(GLOBAL_ROOT, '', $realPath);
	$smarty->assign('path', $path);

    if(!empty($action['checkTemplate'])){
		$templates = searchDir(THEME_ROOT.'/templates', '*.tpl');
		if(empty($template['fileName'])){
			echo "document.getElementById('submitButton').disabled = false;\r\n";
		} elseif(preg_match('/[^0-9a-zA-Z\-_\. ]/i', $template['fileName'])){
			echo "document.getElementById('submitButton').disabled = false;\r\n";
		} elseif(!empty($template['isNew']) && in_array($template['fileName'].'.tpl', $templates)){
			echo "document.getElementById('submitButton').disabled = false;\r\n";
		} elseif(saveFile(THEME_ROOT.'/templates/test-template.tmp', $template['content'])){
			$tmpSmarty = $smarty;
			$tmpSmarty->setTemplateDir(THEME_ROOT.'/templates');
			$tmpSmarty->force_compile = true;
			$tmpSmarty->caching = false;
			$tmpSmarty->compile_id = 'test';
            try {
                $tmpSmarty->fetch('test-template.tmp');
            } catch (Exception $e) {
                $e->getMessage();
            }
            @unlink(THEME_ROOT.'/templates/test-template.tmp');
			echo "httpResponseEvalOnError = '';\r\n";
			echo "templateForm['action[save]'].value = 1;\r\n";
			echo "templateForm['action[checkTemplate]'].value = 0;\r\n";
			echo "document.getElementById('template').submit();\r\n";
			echo "writeStatus('".lang('templates:messages:2')."');\r\n";
		} else {
			echo "templateForm['template[content]'].readOnly = false;\r\n";
			echo "writeStatus('".lang('templates:errors:5')."', 'aError');\r\n";
		}
		exit;
	} 
	
	
	if (!empty($action['save'])) {
		if (!empty($template['isNew'])) {
			if(empty($template['fileName'])) $errors['fileName'] = true;
			if(preg_match('/[^0-9a-zA-Z\-_\. ]/i', $template['fileName'])) $errors['fileNameCharacters'] = true;
			$templates = searchDir(THEME_ROOT.'/templates', '*.tpl');
			if(in_array($template['fileName'].'.tpl', $templates)) $errors['fileNameExists'] = true;
		} else {
			/* updating template */
			$templates = searchDir(THEME_ROOT.'/templates', '*.tpl');
			if(!in_array($template['fileName'], $templates)) $errors['not_found'] = true;
		}
		if (empty($errors)) {
			if (!empty($template['isNew'])) $template['fileName'] = $template['fileName'].'.tpl';
			if (saveFile(THEME_ROOT.'/templates/'.$template['fileName'], $template['content'])){
				//@unlink(THEME_ROOT.'/templates/test-template.tmp');
				$messages['saved_new_file'] = true;
                $logger->info("Шаблон «" . $template['fileName'] . "» отредактирован");
			} else {
				$errors['not_saved'] = true;
			}
		} else {

			$smarty->assign('template', $template);
			$noItems = true;
		}

	/***** CUT FOR DEMO END *****/
	}

	
	if (empty($noItems)) {
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



	/* themes */
    $themes     = getThemes();
	$smarty->assign('themes', $themes);


	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
    try {
        $smarty->display('templates.tpl');
    } catch (Exception $e) {
        $e->getMessage();
    }
	
	
	
	
	
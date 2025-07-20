<?php
	include('../includes/admin.inc.php');
	
	if ($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$action   = getRequestVar('action','');
	$maps     = getRequestVar('maps', '', $noEscape = true);

	if (!empty($action['save'])) {
		if (empty($errors)) {
			foreach ($maps as $codename => $value) {
				$maps['codename'] = mysqli_real_escape_string($mysqli, $codename);
				$maps['value'] 	  = mysqli_real_escape_string($mysqli, $value);
				dbQuery('maps', DB_REPLACE, array('values'=>$maps));
			}			
			$messages['saved'] = true;
            $logger->info("Параметры карты сохранены.");
		}
	}
    $maps = getSettingsMaps();
	$smarty->assign('maps', $maps);
		
	if (!empty($errors)) $smarty->assign('errors', $errors);
	if (!empty($messages)) $smarty->assign('messages', $messages);

    try {
        $smarty->display('maps.tpl');
    } catch (Exception $e) {
        $e->getMessage();
    }

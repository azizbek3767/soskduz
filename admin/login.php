<?php
	include('../includes/overall.inc.php');
	include('../includes/admin-functions.inc.php');

	session_name($adminSessionName);
	session_start();
	$sessionId = session_id();
	$smarty->assign('sessionId', $sessionId);
	$adminLang = $config['admin_language'];
	loadLanguage($adminLang);
	$smarty->assign('adminLang', $adminLang);
	$smarty->registerFilter('pre', 'replaceLanguageTags');
	$action = getRequestVar('action');
	$login  = getRequestVar('login');

    $userIp = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

	if(!empty($action['selfRedirect']) || (SITE_URL != GLOBAL_URL)){
		header('Location: '.GLOBAL_URL.'/admin/login.php');
		die('Moving to '.GLOBAL_URL.'/admin/login.php');
	}

	$loginHistory['eventOn']   = gmdate('Y-m-d H:i:s');
	$loginHistory['userId']    = 0;
	$loginHistory['visitorIp'] = $userIp;
	$loginHistory['loginName'] = '';
	$loginHistory['status']    = 'error';

	if(!empty($login['loginName'])) $loginHistory['loginName'] = $login['loginName'];
	if(!empty($adminUser['loginName'])) $loginHistory['loginName'] = $adminUser['loginName'];

	/* if there was no successful logins during last hour, then show captcha after three unsuccessful login attempts */
	$logins = dbQuery('admin_history', DB_ARRAYS, array('fields'=>'status, COUNT(*) AS total', 'where'=>"visitorIp='$loginHistory[visitorIp]' AND eventOn > '$gmNow' - INTERVAL 1 HOUR AND action='login'", 'group'=>'status', 'indexKey'=>'status', 'valueKey'=>'total'));

	if(empty($logins['ok']) && !empty($logins['error'])){
		if($logins['error'] > 3){
			$requireCaptcha = true;
			$smarty->assign('requireCaptcha', true);
		} elseif ($logins['error'] == 3){
			$requireCaptcha = true;
			$smarty->assign('requireCaptcha', true);
		}
	}

	if(!empty($action['login'])){
		$loginHistory['action'] = 'login';
		if (!empty($requireCaptcha) && (empty($login['captcha']) || $_SESSION['captcha'] != md5($login['captcha']))) $errors['captcha'] = true;
		if (empty($login['loginName'])) $errors['enter_username'] = true;
        if (empty($login['password'])) $errors['enter_password'] = true;
  		if (empty($errors)) if (($adminUser = dbQuery('admin_users', DB_ARRAY, array('where'=>"loginName = '$login[loginName]'"))) && $adminUser['password'] == md5(PRE . md5(PRE.$login['password']))){

        $adminUserUpdate['status'] = '1';
        $adminUserUpdate['eventOn'] = $gmNow;
        $adminUserUpdate['ip'] = $userIp;
        $adminUserUpdate = dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$adminUser[userId]'", 'values'=>$adminUserUpdate));

        $adminUser['sectionRights'] = dbQuery('section_rights', DB_ARRAYS, array('fields'=>'sectionId', 'where'=>"userId='$adminUser[userId]'", 'valueKey'=>'sectionId'));
        $_SESSION['adminUser'] = $adminUser;

        if($adminUser['accessLevel'] == 'administrator'){
            header('Location: ' . SITE_URL . '/admin/stats.overview.php');
        } else if($adminUser['accessLevel'] == 'developer'){
            header('Location: ' . SITE_URL . '/admin/sections.php');
        } else {
            header('Location: ' . SITE_URL . '/admin/articles.php');
        }

			/* saving login in history */
			$loginHistory['userId'] = $adminUser['userId'];
			$loginHistory['status'] = 'ok';
			dbQuery('admin_history', DB_INSERT, array('values' => $loginHistory));
			/* delete history older than one month */
			dbQuery('admin_history', DB_DELETE, array('where'=>"eventOn < '$gmNow' - INTERVAL 1 MONTH"));
			exit;
		} else {
			dbQuery('admin_history', DB_INSERT, array('values' => $loginHistory));
			if(!empty($logins['error']) && ($logins['error'] == 2) && empty($logins['ok'])){
				$requireCaptcha = true;
				$smarty->assign('requireCaptcha', true);
			}

			/* возможно попытка грубой силы */
			/* если не было успешных входов в систему в течение последних 24 часов, тогда забаньте IP */
			$logins = dbQuery('admin_history', DB_ARRAYS, array('fields'=>'status, COUNT(*) AS total', 'where'=>"visitorIp='$loginHistory[visitorIp]' AND eventOn > '$gmNow' - INTERVAL 24 HOUR AND action='login'", 'group'=>'status', 'indexKey'=>'status', 'valueKey'=>'total'));
			if(!empty($logins['error']) && ((empty($logins['ok']) && $logins['error'] > 15) || (!empty($logins['ok']) && $logins['error'] > 240))){
				$ban['visitorIp'] = $_SERVER['REMOTE_ADDR'];
				$ban['bannedOn']  = date('Y-m-d H:i:s');
				$ban['expiresOn'] = date('Y-m-d H:i:s', strtotime('+10 hours'));
				dbQuery('banned_ips', DB_INSERT, array('values'=>$ban));
				dbQuery('settings', DB_REPLACE, array('values'=>array('codename'=>'check_banned_ips', 'value'=>'1')));
				saveSettingsArray();
				die($L['banned']);
			}
			$errors['wrong_username_password'] = true;
		}
	} elseif(!empty($action['logout'])){

		$loginHistory['action'] = 'logout';
		if(!empty($_SESSION['adminUser'])){
			$adminUser = $_SESSION['adminUser'];
			$loginHistory['userId']    = $adminUser['userId'];
			$loginHistory['loginName'] = $adminUser['loginName'];
			$messages['logged_out'] = true;
			$loginHistory['status'] = 'ok';

			$adminUserUpdate['status'] = '0';
			$adminUserUpdate['eventOn'] = $gmNow;
            $adminUserUpdate['sessionId'] = '';
			dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$adminUser[userId]'", 'values'=>$adminUserUpdate));
		} else {
			$errors['already_logged_out'] = true;
			$loginHistory['status'] = 'error';
		}
		$_SESSION = array();
		session_destroy();
		dbQuery('admin_history', DB_INSERT, array('values'=>$loginHistory));
	}

	if(!empty($_SESSION['adminUser']['userId'])){
		$adminUser = loadAdminUser($_SESSION['adminUser']['userId']);
		if($_SESSION['adminUser']['accessLevel'] == 'administrator' || $adminUser['accessLevel'] == 'developer'){
			header('Location: '.SITE_URL.'/admin/stats.overview.php');
		} else {
			header('Location: '.SITE_URL.'/admin/sections.php');
		}
		exit;
	}

	if (!empty($errors))   $smarty->assign('errors', $errors);
	if (!empty($messages)) $smarty->assign('messages', $messages);

	$smarty->template_dir = GLOBAL_ROOT.'/admin/templates';
	$smarty->compile_id   = 'admin-'.$adminLang;
	$smarty->display('login.tpl');
?>
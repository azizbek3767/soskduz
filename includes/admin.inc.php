<?php
	require_once('overall.inc.php');
	require_once('admin-functions.inc.php');

	/* no proxy/browser cache */
	header("Pragma: no-cache");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");

	/* starting session */
	session_name($adminSessionName);
	session_start();
	$sessionId = session_id();
	$smarty->assign('sessionId', $sessionId);
	//print_r($sessionId);
	global $smarty, $adminUser;

	/* language functions */
	$adminLang = $config['admin_language'];
	loadLanguage($adminLang);
	$smarty->assign('adminLang', $adminLang);
	$smarty->assign('jsLang', langjs('javascript'));

    try {
        $smarty->registerFilter('pre', 'replaceLanguageTags');
    } catch (SmartyException $e) {
        $e->getMessage();
    }
    $smarty->setTemplateDir(GLOBAL_ROOT . '/admin/templates');
	$smarty->compile_id = 'admin-' . $adminLang;



	if (!empty($_SESSION['adminUser']['userId'])) {
		$adminUser = loadAdminUser($_SESSION['adminUser']['userId']);

		$_SESSION['adminUser'] = $adminUser;
		$smarty->assign('adminUser', $adminUser);
		$accessLevels = lang('users:accessLevels');
        $smarty->assign('accessLevels', $accessLevels);

	} else {
		header('Location: '.SITE_URL.'/admin/login.php');
		die('You are not logged in.');
	}
		
		
	if ($adminUserOnline =  dbQuery('admin_users', DB_ARRAY, array('where'=>"userId='$adminUser[userId]'"))) {
        $adminUserUpdate['eventOn'] = $gmNow;
    	$adminUserUpdate['status'] = '1';
        $adminUserOnline = dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$adminUser[userId]'", 'values'=>$adminUserUpdate));
	} 
	
	if ($adminUserOfflines = dbQuery('admin_users', DB_ARRAYS, array('where'=>"eventOn < '$gmNow' - INTERVAL 3 MINUTE"))){
        foreach ($adminUserOfflines as $adminUserOffline) {
            $adminUserOfflineUpdate['status'] = '0';
           dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$adminUserOffline[userId]'", 'values'=>$adminUserOfflineUpdate));
        }
	}
			
	/* get number of pending comments */
	if ($config['comments_enabled']) {
		if ($adminUser['accessLevel'] == 'administrator' || $adminUser['accessLevel'] == 'developer'){
			$totalPendingComments = dbQuery('comments', DB_VALUE, array('where'=>"status='pending'", 'fields'=>'COUNT(*)'));
            $comments = dbQuery('comments', DB_ARRAYS, array('where'=>"status='pending'"));
		} elseif ($adminUser['accessLevel'] == 'editor' && $config['comments_editors_may_approve']) {
			if (empty($adminUser['permitAllSections'])) {
				if ($allowedSections = getAllowedSections()) {
					$totalPendingComments = dbQuery('comments', DB_VALUE, array('where'=>"comments.status='pending' AND sectionId IN(".implode(',', $allowedSections).")", 'fields'=>'COUNT(commentId)', 'join'=>array('articles' => "USING(articleId)")));
				}
			} else {
				$totalPendingComments = dbQuery('comments', DB_VALUE, array('where'=>"status='pending'", 'fields'=>'COUNT(*)'));
			}
		}
	}
	
	$smarty->assign('totalPendingComments', empty($totalPendingComments) ? 0 : $totalPendingComments);
    $smarty->assign('comments', empty($comments) ? 0 : $comments);
  
	/* defining default language */
	if (is_array($LANGUAGES)) {
		foreach($LANGUAGES as $codename=>$tmpLang){
			$LANGUAGES[$codename]['languageTransName'] = lang('languageList:'.$codename);
			if ($tmpLang['isDefault']) {
				$DEFAULT_LANG = $codename;
				$smarty->assign('DEFAULT_LANG', $DEFAULT_LANG);
			}
		}
	}

	require_once(GLOBAL_ROOT.'/includes/admin.pub.inc.php');
    require_once(GLOBAL_ROOT . '/includes/core/Menu.php');

    $menu = new Menu();
    $smarty->assign('menu', $menu->result);
  // print_r($menu);
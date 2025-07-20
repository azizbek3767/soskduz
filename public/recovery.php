<?php
	require_once("../includes/Customers.php");
	
	$SiteUsers = new SiteUsers;
	
	$uid  = (int)getRequestVar('uid');
	$code = getRequestVar('code');
	
	if($uid > 0 && !empty($code)){
		if($SiteUsers->sendNewPassword($uid, $code)){
			$messages['changed'] = true;
		}else{
			$errors['recoveryFailed'] = true;
		}
	}
	if(defined('SITE_URL')){
    	
		global $smarty, $config;
		
		$recovery = getRequestVar('recovery', '', $noEscape = true);
		
		if ($recovery['email']) {
			if (preg_match('/^[A-Z0-9\._\-]+@[A-Z0-9\.\-]+\.[A-Z]{2,4}$/i', $recovery['email']) && !$SiteUsers->checkUserEmail($recovery['email'])) {
				$SiteUsers->sendPasswordChangeCode($recovery['email']);
				$messages['sent'] = true;
			} else {
				$errors['noSuchEmail'] = true;
			}
		}
	}
	
	if(!empty($messages)) $smarty->assign('messages', $messages);
	if(!empty($errors)) $smarty->assign('errors', $errors);
?>
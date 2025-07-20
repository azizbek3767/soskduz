<?php
	$adminSessionName   = 'ls-admin';
	$visitorSessionName = 'ls-visitor';
	$smarty->assign('adminSessionName', $adminSessionName);
	$smarty->assign('visitorSessionName', $visitorSessionName);	

	//setlocale(LC_ALL, 'ru_RU.utf-8');
	
	//setlocale(LC_ALL, 'ru_RU.utf-8');
	
	$config['date'] = '%I:%M %p';
	$config['time'] = '%H:%M:%S';
	$smarty->assign('config', $config);
	$smarty->assign('maps', $maps);
	$smarty->assign('yesterday', strtotime('0 day'));


    require_once(GLOBAL_ROOT . '/includes/core/Logger.php');
    require_once(GLOBAL_ROOT . '/includes/core/Test.php');

    //new Test();
    $logger = new Logger();



	
<?php
	require_once('overall.inc.php');
    require_once "core/SiteApp.php";
    require_once "core/Newsletter.php";


    $adminIp = '';
    
    $userIp = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    if (!empty($config['listIp'])){
        $listIps = explode(",", $config['listIp']);
        foreach($listIps as $listIp){
            if($listIp == $userIp){
                $adminIp = $listIp;  
            }
        }
    }
    
	/* если сайте отключен вывести шаблон или сообщение */
	if($config['website_down'] == 1 && $adminIp == ''){

		header("HTTP/1.0 503 Service Unavailable");
		if(file_exists(THEME_ROOT.'/templates/maintenance.tpl')){
			$smarty->display('maintenance.tpl');
		} else {
			print "<html><head><title>Сервис недоступен</title><style> html, body {height : 100vh;width : 100%;overflow : hidden;margin: 0 auto;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen-Sans,Ubuntu,Cantarell,'Helvetica Neue',sans-serif;}.wrapper {height : 100%;width : 100%;padding: 0px;text-align: center;}.content {position:absolute; width:100%; top:50%;transform: translateY(-100%);}h3{color: #424242;font-weight: 400;}</style></head><body><div class='wrapper'><div class='content'><h3>".nl2br($config['maintenance_message'])."</h3></div></div></body></html>";
		}
		exit;
	}

	/* сессия */
	session_name($visitorSessionName);
	session_start();
	$sessionId = session_id();
	$smarty->assign('sessionId', $sessionId);



    $app = new SiteApp();
    $newsletter = new Newsletter();

	/* Загрузка активных баннеров */
	$banners = dbQuery('banners', DB_ARRAYS, array('where'=>"isActive=1",'indexKey'=>'bannerId', 'valueKey'=>'generatedCode'));
	if(!empty($banners)) $smarty->assign('banners', $banners);
	
	// Default currency

	$defaultCurrency = dbQuery('currency', DB_ARRAY, array('where' => "isDefault = '1'"));
	$smarty->assign('defaultCurrency', $defaultCurrency);

	$action = getRequestVar('action');
	if (isset($action['setActiveCurrency'])) {
		$activeCurrencyId = getRequestVar('activeCurrencyId');
	} else	{
		if (isset($_COOKIE['activeCurrencyId'])) {
	        $activeCurrencyId = $_COOKIE['activeCurrencyId'];
	    } else {
	        $activeCurrencyId = $defaultCurrency['id'];
	    }
	}

	setActiveCurrency($activeCurrencyId);

	function setActiveCurrency($currencyId)
    {
        global $smarty, $allCurrency, $defaultCurrency;
        if(!empty($allCurrency))
        foreach ($allCurrency as $c)
        {
        	if ($c['id'] == $currencyId) {
        		$currency = $c;
        		break;
        	}
        }

        if (empty($currency)) {
            $currency = $defaultCurrency;
        }

        setcookie('activeCurrencyId', $currency['id'], 0, "/");

        $GLOBALS['activeCurrency'] = $currency;
        $smarty->assign('activeCurrency', $currency);
    }


	
	
?>
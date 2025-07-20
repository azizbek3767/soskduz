<?php
// echo('123');
if(strpos($_SERVER['REQUEST_URI'], "//") !== false || strpos($_SERVER['REQUEST_URI'], "///") !== false){
  $url = str_replace("///", "/", $_SERVER['REQUEST_URI']);
  $url = str_replace("//", "/", $url);
  $protocol = "http";
  if(isset($_SERVER['HTTPS'])){
   $protocol = "https";
  }
  $url_final = $protocol . "://" . $_SERVER['HTTP_HOST'] . $url;
  header("HTTP/1.1 301 Moved Permanently s");
  header("Location: $url_final");
}

	define('LS_VERSION', '6.2.00');
	define('GLOBAL_ROOT', realpath(dirname(__FILE__).'/../'));
	define('UPLOAD_ROOT', GLOBAL_ROOT.'/uploads/');
	define('SITE_TRUE_URL', $_SERVER['HTTP_HOST']);
    define('IS_HTTPS', !empty($_SERVER['HTTPS']));
    define('PRE', '.dQUEtby7P35;k"5EhPB<j.;,9hqvs!(<"B]=#dBfhnyaN)v>8Z_bs%YJW/u~{w5:4B!s5F>');
    define('LS_SERIAL', '+99890345-11-33');
    define('PRODUCT_NAME', 'LS PANEL (https://www.life-style.uz/)');
    define('TBL_PREFIX', 'ls_');

/*echo '<pre>';
    print_r($_GET);
    print_r($_GET['lang']);
    print_r($_GET['SITE_LANG']);*/

	/* загрузить все языки */
	$LANGUAGES = include GLOBAL_ROOT.'/includes/global-languages.inc.php';
	/* определить язык */
	if (
	    isset($_GET['SITE_LANG']) && isset($LANGUAGES[$_GET['SITE_LANG']]) ||
        isset($_GET['lang']) && $_GET['lang'] != 'ru'
    ) {

		define('SITE_LANG', isset($_GET['SITE_LANG']) ? $_GET['SITE_LANG'] : $_GET['lang']);
		define('SITE_LANG_PATH', '/'.SITE_LANG);
		define('SITE_LANG_PREFIX', SITE_LANG.'_');
		define('SITE_LANG_POSTFIX', '-'.SITE_LANG);
		define('SITE_ROOT', GLOBAL_ROOT.SITE_LANG_PATH);

	} else {
		define('SITE_LANG', '');
		define('SITE_LANG_PATH', '');
		define('SITE_LANG_PREFIX', '');
		define('SITE_LANG_POSTFIX', '');
		define('SITE_ROOT', GLOBAL_ROOT);
	}


    if (IS_HTTPS) {
        define('GLOBAL_URL', 'https://'.SITE_TRUE_URL);
		define('GLOBAL_URI', '');
		define('SITE_URL', 'https://'.SITE_TRUE_URL.SITE_LANG_PATH);
		define('SITE_URI', '/'.SITE_LANG_PATH);
	} else {
		define('GLOBAL_URL', 'http://'.SITE_TRUE_URL);
		define('GLOBAL_URI', '');
		define('SITE_URL', 'http://'.SITE_TRUE_URL.SITE_LANG_PATH);
		define('SITE_URI', '/'.SITE_LANG_PATH);
	}

	// if (SITE_LANG != '' && $LANGUAGES[SITE_LANG]['isDefault'] == 1) {
	// 	header('Location: '.GLOBAL_URL);
	// 	die('Moving to '.GLOBAL_URL);
	// }

	$gmNow = gmdate('Y-m-d H:i:s');
	/* типы визитов */
	$allVisitTypes[1]['name'] = 'Home';
	$allVisitTypes[2]['name'] = 'Section';
	$allVisitTypes[3]['name'] = 'Article';
	$allVisitTypes[4]['name'] = 'Search';
	$allVisitTypes[5]['name'] = 'AdClick';
	$allVisitTypes[6]['name'] = 'Error';
	//$allVisitTypes[7]['name'] = 'RSS';
	$allVisitTypes[8]['name'] = 'Sitemap';

	/* Сценарий начала времени */
	list($usec, $sec) = explode(' ', microtime());
	$scriptStartTime = ((float)$usec + (float)$sec);

	/* подключение компонентов */
	require_once GLOBAL_ROOT.'/includes/config.inc.php';
	require_once GLOBAL_ROOT.'/includes/functions.inc.php';
	require_once GLOBAL_ROOT.'/includes/mysql-functions.inc.php';
    require_once GLOBAL_ROOT.'/includes/core/App.php';
    require_once GLOBAL_ROOT.'/includes/core/Cookie.php';
    require_once GLOBAL_ROOT.'/includes/core/Session.php';

	/* Подключение to DB */
	$mysqli = @mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	if(mysqli_connect_errno()){
		print "<html><head><title>HTTP/1.0 503 Service Unavailable</title><style> html, body {height : 100vh;width : 100%;overflow : hidden;margin: 0 auto;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen-Sans,Ubuntu,Cantarell,'Helvetica Neue',sans-serif;}.wrapper {height : 100%;width : 100%;padding: 0px;text-align: center;}.content {position:absolute; width:100%; top:50%;transform: translateY(-100%);}h3{color: #424242;font-weight: 400;}</style></head><body><div class='wrapper'><div class='content'><h3>Error 503 Service Unavailable</h3><p><b>Service temporary unavailable (database connection problem).</b><br>Our apologies for any inconvenience this may cause.<br>We appreciate your patience and invite you to return soon.<br />".mysqli_connect_errno()." : ". mysqli_connect_error()."</p></div></div></body></html>";
		logThis('Database connection problem: '.mysqli_connect_errno()." : ". mysqli_connect_error());
		mysqli_close($mysqli);
	}
	mysqli_query($mysqli, "SET CHARACTER SET 'utf8'");

	/* Вся таблица базы данных */
    require_once GLOBAL_ROOT.'/includes/db.table.inc.php';

	/* Загрузка параметров системы */
    $config  = getSettings();
	$maps    = getSettingsMaps();

    // проверка запрещенных IP-адресов
	if(!empty($config['check_banned_ips'])) dieIfBanned($_SERVER['REMOTE_ADDR']);

	/* инициализации Smarty  */
	require_once GLOBAL_ROOT.'/includes/Smarty.php';

    /* определение пути до темы */
    define('THEME_URL', (empty($THEME_URL) || IS_HTTPS) ? GLOBAL_URL.'/themes/'.$config['theme'] : $THEME_URL);
	define('THEME_ROOT', (empty($THEME_ROOT) || IS_HTTPS) ? GLOBAL_ROOT.'/themes/'.$config['theme'] : $THEME_ROOT);

	$LANG = App::site_language($config['website_language']);
	$smarty->assign('LANG', $LANG);



	/* назначение основных переменных */
	$smarty->assign('config', $config);
	$smarty->assign('SITE_URL', SITE_URL);
	$smarty->assign('SITE_URI', SITE_URI);
	$smarty->assign('SITE_LANG', SITE_LANG);
	$smarty->assign('THEME_URL', THEME_URL);
	$smarty->assign('GLOBAL_URL', GLOBAL_URL);
	$smarty->assign('GLOBAL_URI', GLOBAL_URI);
	$smarty->assignByRef('LANGUAGES', $LANGUAGES);

    // настройки Smarty
	$smarty->default_modifiers = array('escape');

	//$smarty->registerResource('rss', array('rss_get_template', 'rss_get_timestamp', 'rss_get_secure', 'rss_get_trusted')); //* registering resource "rss". rss:<b>{$var}</b>
	// в том числе сериализации
	require_once SITE_ROOT.'/includes/serializations.inc.php';
	// кодировка
	@header('Content-Type: text/html; charset=' . $config['charset']);
	// Имя продукта
	@header('X-Powered-By: ' . PRODUCT_NAME . ' - ' . LS_SERIAL);
	// сжатия GZIP
	//@ob_start('ob_gzhandler');

	/* Информация о странице Расположение */
	$LOCATION['URL']   = getSelfUrl();
	$LOCATION['URI']   = preg_replace('~^(/.*?)/[^/]*$~i', '$1', $_SERVER['PHP_SELF']);
	$LOCATION['PATH']  = preg_replace('~^(/.*?)/[^/]*$~i', '$1', $_SERVER['REQUEST_URI']);
	$LOCATION['FILE']  = preg_replace('~^/.*?/([^/]*)$~i', '$1', $_SERVER['REQUEST_URI']);
	$LOCATION['QUERY'] = $_SERVER['QUERY_STRING'];
	$LOCATION['URLQ']  = getSelfUrl(true);
	$LOCATION['PATH_QUERY'] = str_replace('/'.SITE_LANG.'/',"",$_SERVER['REQUEST_URI']);

	$smarty->assign('LOCATION', $LOCATION);
    $smarty->assign('IS_HTTPS', IS_HTTPS);

    if ($config['telegram_send'] == 1){
        define('TELEGRAM_TOKEN', $config['telegram_token']);
        define('TELEGRAM_CHATID', $config['telegram_chat_id']);
    }
    if ($config['allow_recaptcha'] == 1) {
        define('PRIVATE_REY', $config['recaptcha_private_key']);
    }

    define('DEBUGMODE',	$config['error_test']);
    define('ERRORSLOG', GLOBAL_ROOT."/temp/log/lowerrors.log");
    define('SYSERRLOG', GLOBAL_ROOT."/temp/log/syserrors.log");

    require_once(GLOBAL_ROOT.'/includes/overall.pub.inc.php');

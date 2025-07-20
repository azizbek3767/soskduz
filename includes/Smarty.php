<?php
if(!defined('SITE_URL')) die('Hacking attempt!');

require_once GLOBAL_ROOT.'/includes/Smarty/SmartyBC.class.php';

$smarty = new SmartyBC;
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->auto_literal = true;

$smarty->setTemplateDir( GLOBAL_ROOT . '/themes/'.$config['theme'].'/templates');
$smarty->setCacheDir(GLOBAL_ROOT . '/temp/smarty/cache');
$smarty->setCompileDir(GLOBAL_ROOT . '/temp/smarty/compile');
$smarty->compile_id   = 'main' . SITE_LANG_POSTFIX.  '-' . $config['theme'];
//print_r($smarty);
//* Кэш -  блок
function smarty_block_nocache($param, $content, &$smarty){
	return $content;
}

try {
    $smarty->registerPlugin('nocache', $gmNow, 'smarty_block_nocache', false);
} catch (SmartyException $e) {
        $e->getMessage();
}
    
$smarty->addPluginsDir(GLOBAL_ROOT.'/includes/smarty_plugins');

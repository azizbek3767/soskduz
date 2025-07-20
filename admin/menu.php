<?php
include('../includes/admin.inc.php');
if($adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

$action = getRequestVar('action');
$file   = getRequestVar('file', '', $noEscape = true);


$realFile = GLOBAL_ROOT.'/admin/menu/menu.json';

$file = file_read($realFile);

$smarty->assign('file', $file);

if (!empty($action) && $action == 'save'){
//    $newFile = file_put_contents($realFile, $file);
//    print_r($newFile);
//    $f = fopen('test_new.js', 'w');
//    fputs($f, json_encode($test));
//    fclose($f);
    $fh = fopen($realFile, 'w');
    fputs($fh, $file);
        fclose($fh);
        $messages['saved'] = true;

}





if (!empty($errors)) $smarty->assign('errors', $errors);
if (!empty($messages)) $smarty->assign('messages', $messages);

try {
    $smarty->display('menu.tpl');
} catch (Exception $e) {
    $e->getMessage();
}



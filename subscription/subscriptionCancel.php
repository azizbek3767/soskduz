<?php
require_once(realpath(dirname(__FILE__) . '/../includes/visitor.inc.php'));

$lang = getRequestVar('lang', '');
$form = getRequestVar('form', '', $noEscape = true);
$token = getRequestVar('token', '');

$phone  =preg_replace("/[^0-9]/","", $form['phone']);

$response = array(
    'success' => false,
    'message' => null,
    'data' => null,
);

$query = dbRawQuery("SELECT * FROM subscription_members WHERE phone = '$phone'");

if (is_array($query)) {
    dbRawQuery("UPDATE subscription_members SET
                            is_active = 0
                            WHERE phone = '" . $phone . "'");

    $response['success'] = true;
    $response['message'] = $LANG['subscription_cancel_success'];
} else {
    $response['message'] = $LANG['subscription_not_found'];
}

App::jsonResponse($response);
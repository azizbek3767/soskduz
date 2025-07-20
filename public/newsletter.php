<?php

require_once "../includes/visitor.inc.php";
global $smarty, $config, $mysqli, $LANG;

$email   = getRequestVar('email', '');
if (empty($email)) {
    $newsletter->errors = $LANG['newsletter_empty email'];
} else {
    if ($email = filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($newsletter->is_subscribe($email)) {
            $newsletter->register($email);
            $newsletter->success = $LANG['newsletter_successfully'];
        } else {
            $newsletter->errors = $LANG['newsletter_subscribed'];
        }

    } else {
        $newsletter->errors = $LANG['newsletter_valid email'];
    }
}


if (!empty($newsletter->errors)) $result = array('code' => false, 'info' => $newsletter->errors);
if (!empty($newsletter->success)) $result = array('code' => true, 'info' => $newsletter->success);
App::jsonResponse($result);
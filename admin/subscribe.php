<?php
    require '../includes/SubscribeSend.php';
    if ($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

    $action  = getRequestVar('action');
    $adminEmail = $config['feedback_email'];
    $adminName = $config['company_name'];

    $action    = getRequestVar('action', '');
    $subject   = getRequestVar('subject', '');
    $message   = getRequestVar('message', '');

    print_r($action);
    switch ($action) {
        case 'send':
            if (isset($subject) && !empty($subject) && !empty($message)) {

                $sendSubscribe = new SubscribeSend;
                if ($sendSubscribe->send($subject, $message)) {
                    $result = array('code' => true, 'info' => $sendSubscribe->success);
                } else {
                    $result = array('code' => false, 'info' => $sendSubscribe->errors);
                }

                header('Content-Type: application/json');
                echo json_encode($result);
                exit;
               // App::jsonResponse($result);
            }
            break;
        case '':
            default;
    }
    
    $smarty->display('subscribe.tpl');
    

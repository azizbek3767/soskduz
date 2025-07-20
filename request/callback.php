<?php
require_once "../includes/visitor.inc.php";
require_once "SendFeedbackOrder.php";
include('Ipn.php');

global $smarty;

$payment = getSettingsPayment('paypal');

$notification = new SendFeedbackOrder();
$listener     = new Ipn();


if (!empty($payment['settings']['mode'])) {
    
    if($payment['settings']['mode'] == 'sandbox') {
        
        $listener->use_sandbox = true; 
        
    } else {
        
        $listener->use_sandbox = false; 
    }
}

try {
    $listener->requirePostMethod();
    $verified = $listener->processIpn();
} catch (Exception $e) {
    error_log($e->getMessage());
   // exit(0);
}

if ($verified) {
   // $infoTransaction  = $listener->getTextTransactions();
   // $infoTransaction  = var_export($listener->getTextTransactions(), true);
    $notification->successful_payment_notification('Verified', $listener->getTextTransactions());

} else {
   // $notification->successful_payment_notification('Verified', $listener->getTextTransactions());
   // file_put_contents('error.txt', $listener->getTextReport());
    //mail('YOUR EMAIL ADDRESS', 'Invalid IPN', $listener->getTextReport());
}



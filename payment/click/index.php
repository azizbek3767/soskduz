<?php
require_once  '../../includes/visitor.inc.php';
require_once  '../../includes/Payment.php';

require_once 'ClickAPI.php';

$clickApi = new ClickAPI();
$clickApi->apiRequests();

//print_r($clickApi);
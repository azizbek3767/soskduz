<?php
    
require_once  '../../includes/visitor.inc.php';
require_once 'upayApi.php';

$upay = new upayApi();
$upay->setParams();
//print_r($upay);

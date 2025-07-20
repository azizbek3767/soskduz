<?php
// Enable to debug
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

ini_set("precision", 16);

require_once  '../../includes/visitor.inc.php';

if (!function_exists('getallheaders')) {
    function getallheaders()
    {
        $headers = '';
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

require_once 'Application.php';

// load configuration
$paycomConfig = require_once 'paycom.config.php';

$application = new Application($paycomConfig);
$application->run();


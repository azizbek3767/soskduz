<?php

include('../includes/admin.inc.php');


class ServerInfo
{
    public $template;
    public $name;
    public $activeItem;

    public function __construct()
    {
        global $adminUser ;
        if($adminUser['accessLevel'] != 'administrator' and $adminUser['accessLevel'] != 'developer')die(lang('general:accessIsDenied'));
        $this->serverInfo();
    }


    /**
     * Server information
     */
    private function serverInfo()
    {

        $this->activeItem = 'serverinfo';
        $this->template   = 'serverinfo.tpl';
        $this->name       = "Информация о сервере";
        global $smarty, $mysqli;

        # MySQL version
        $data1 = [];
        $data1['mysql']     = mysqli_get_server_info($mysqli);
        $data1['php'] 		= PHP_VERSION;				# php version
        $data1['zend']		= zend_version();			# Zend version
        $data1['ws'] 		= $_SERVER['SERVER_SOFTWARE'];		# Server sowfware version apache_get_version();
        $data1['os']		= php_uname("s")." (".PHP_OS.")"; 	# OS
        $data1['uname']		= php_uname(); 				# UNAME
        $data1['lscms']	    = LS_VERSION;			# LS_VERSION

        $data1['pid']		= PEAR_INSTALL_DIR; 			# PEAR extends dir
        $data1['dip']		= DEFAULT_INCLUDE_PATH;
        $data1['ped']		= PHP_EXTENSION_DIR;			# PHP extends dir
        $data1['pcp']		= PHP_CONFIG_FILE_PATH;

        $data1['sn']		= $_SERVER["SERVER_NAME"];
        $data1['sa']		= $_SERVER["SERVER_ADDR"];
        $data1['sp']		= $_SERVER["SERVER_PROTOCOL"];
        $data1['ra']		= $_SERVER["REMOTE_ADDR"];
        $data1['docroot']	= SITE_ROOT;

        $data1['ml']		= ini_get('memory_limit');		# Memory limit
        $data1['mfs']		= ini_get('upload_max_filesize');	# Maximum file size
        $data1['mps']		= ini_get('post_max_size');		# Maximum post size
        $data1['met']		= ini_get('max_execution_time');	# Max execution time

        if(array_search("apache2handler", get_loaded_extensions())) {
            $data1['apache_mods']	= apache_get_modules();		# Apache extends
            $data1['apache_ver']	= apache_get_version();		# Apache version
        }

        $server_vars = array(
            'PHP_SELF',
            'GATEWAY_INTERFACE',
            'SERVER_ADDR',
            'SERVER_NAME',
            'SERVER_SOFTWARE',
            'SERVER_PROTOCOL',
            'REQUEST_METHOD',
            'REQUEST_TIME',
            'REQUEST_TIME_FLOAT',
            'QUERY_STRING',
            'DOCUMENT_ROOT',
            'HTTP_ACCEPT',
            'HTTP_ACCEPT_CHARSET',
            'HTTP_ACCEPT_ENCODING',
            'HTTP_ACCEPT_LANGUAGE',
            'HTTP_CONNECTION',
            'HTTP_HOST',
            'HTTP_REFERER',
            'HTTP_USER_AGENT',
            'HTTPS',
            'REMOTE_ADDR',
            'REMOTE_HOST',
            'REMOTE_PORT',
            'REMOTE_USER',
            'REDIRECT_REMOTE_USER',
            'SCRIPT_FILENAME',
            'SERVER_ADMIN',
            'SERVER_PORT',
            'SERVER_SIGNATURE',
            'PATH_TRANSLATED',
            'SCRIPT_NAME',
            'REQUEST_URI',
            'PHP_AUTH_DIGEST',
            'PHP_AUTH_USER',
            'PHP_AUTH_PW',
            'AUTH_TYPE',
            'PATH_INFO',
            'ORIG_PATH_INFO'
        ) ;

        $data2 = [];
        foreach ($server_vars as $arg) {
            if (isset($_SERVER[$arg])) {
                if(is_array($_SERVER[$arg])) {
                    $_SERVER[$arg] = json_encode($_SERVER[$arg]);
                }
                $data2[] = array("var"=>$arg, "value"=>$_SERVER[$arg]);
            }
            else {
                $data2[] = array("var"=>$arg, "value"=>"not found");
            }
        }

        $smarty->assign('data1',	$data1);
        $smarty->assign('data2',	$data2);

        $smarty->assign('activeItem', $this->activeItem);
        $smarty->assign('name',       $this->name);
        $smarty->display($this->template);
    }
}

$server = new ServerInfo();
<?php
include('../includes/admin.inc.php');


class Lowerrors
{

    public $template;
    public $name;
    public $activeItem;


    /**
     * About constructor.
     */
    public function __construct()
    {
        global $smarty;
        
        if (!empty($_GET['act']) && $_GET['act'] == 'clear_lowerrors'){
            $this->clearLogErrors(ERRORSLOG);
        }        
        $this->lowErrors();
        
        $this->activeItem = 'lowerrors';
        $this->template = 'lowerrors.tpl';
        $this->name  = 'Ошибки PHP';
        
        $smarty->assign('activeItem', $this->activeItem);
        $smarty->assign('name', $this->name);
        $smarty->display($this->template);
    }
    

     private function lowErrors()
     {
        global $smarty;
        $data = file_read(ERRORSLOG);
		$error = [];
		$errors = explode("\r", $data);
        foreach($errors as $e) {
			if(trim($e) != "") {
				$error[] = explode("|", $e);
			}
		}
		//print_r($error);
		$smarty->assign('error', $error);
	}

    private function clearLogErrors($logfile)
    {

		global $logger;
		$this->write_file($logfile, "");
        $logger = new Logger();
		$logger->info("Лог ".basename($logfile)." очищен");
	}
	
	
	public function write_file($file, $context) {
		$f = fopen($file, "w+");
		if(is_writable($file) && is_resource($f)) {
			fwrite($f, $context);
		}
		fclose($f);
	}

}

$template = new Lowerrors();



<?php

/**
 * Class Test
 */
class Test
{
    
    public  $show_debug          = false;
    public  $debug_info          = ""; # buffer for debug info text

    private $starttime           = 0;
    private $endtime             = 0;

    public  $productivity_time   = 0.0;
    public  $productivity_memory = 0;
    public  $memory_peak_usage   = 0;
    public  $exist_errors;

    /**
     * Test constructor.
     */
    public function __construct()
    {
        global $smarty;
        
        set_error_handler(array($this, 'debug_critical_error'));
		# default : error hide
		$this->error_report(false);
        # for admins all time measure productivity
        # start Debug timer
        $this->start_productivity();
        # try show error
        $this->error_report(true);
        # check error log
        $this->check_errorlog();
		# show debug info
		if ($this->show_debug) {
            register_shutdown_function(array($this,'shutdown'), false);
		}

        $this->endtime = microtime(true);
        $this->productivity_time = round(($this->endtime - $this->starttime), 4);
        
        $this->productivity_memory 	= memory_get_usage();
        $this->memory_peak_usage 	= memory_get_peak_usage();
        $this->memory_peak_usage    = round($this->memory_peak_usage/1024/1024, 2);
        $this->productivity_memory  = round($this->productivity_memory/1024/1024, 2);
        
        $smarty->assign("debug_timer",    $this->productivity_time);
		$smarty->assign("debug_memory",   $this->productivity_memory);
		$smarty->assign("debug_memusage",	 $this->memory_peak_usage);
    }
    
    private function start_productivity() 
    {
        $this->starttime = $_SERVER['REQUEST_TIME'];
    }
        
    
    private function check_errorlog() 
    {
		if(is_file(ERRORSLOG) && filesize(ERRORSLOG) != 0) {
			$this->exist_errors = true;
		}

		if(is_file(SYSERRLOG) && filesize(SYSERRLOG) != 0) {
			$this->exist_errors = true;
		}
	}


	/**
	 * System Error Interceptor
	 *
	 * @param mixed $errno - error number
	 * @param mixed $msg   - message od error
	 * @param mixed $file  - filename with error
	 * @param mixed $line  - string number with error
	 *
	 * @return null|boolean
	 */
	public static function debug_critical_error($errno, $msg, $file, $line) 
	{
	    # read error in file
		$subj = file_read(ERRORSLOG);

        switch($errno) {
	        case E_ERROR:			# critical
		        $erlevel = 0;
		        $ertitle = "Критическая ошибка";
                $ercode  = "E_ERROR";
		        break;

	        case E_USER_ERROR:		# critical
		        $erlevel = 0;
		        $ertitle = "Критическая пользовательская ошибка";
                $ercode  = "E_USER_ERROR";
		        break;

	        case E_RECOVERABLE_ERROR :	# warning(?)critical
		        $erlevel = 1;
		        $ertitle = "Критическая ошибка в работе ПО";
                $ercode  = "E_RECOVERABLE_ERROR";
		        break;

	        case E_WARNING:			# warning
		        $erlevel = 1;
		        $ertitle = "Критическая ошибка";
                $ercode  = "E_WARNING";
		        break;

	        case E_USER_WARNING:		# warning
		        $erlevel = 1;
		        $ertitle = "Некритическая пользовательская ошибка";
                $ercode  = "E_USER_WARNING";
		        break;

	        case E_CORE_WARNING:		# warning
		        $erlevel = 1;
		        $ertitle = "Некритическая ошибка ядра";
                $ercode  = "E_CORE_WARNING";
		        break;

	        case E_COMPILE_WARNING:		# warning
		        $erlevel = 1;
		        $ertitle = "Некритическая ошибка Zend";
                $ercode  = "E_COMPILE_WARNING";
		        break;

	        case E_NOTICE:			# notice
		        $erlevel = 2;
		        $ertitle = "Ошибка";
		        $ercode  = "E_NOTICE";
		        break;

	        case E_USER_NOTICE:		# notice
		        $erlevel = 2;
		        $ertitle = "Пользователская ошибка";
                $ercode  = "E_USER_NOTICE";
		        break;

	        default:			# unknown
		        $erlevel = 3;
		        $ertitle = "Неизвестная ошибка";
                $ercode  = "";
		        break;
        }

        if ($erlevel == 0) {
            register_shutdown_function(array('debug','shutdown'), "debug");
		}

        $time = date("d.m.Y H:i:s");

		$subj .= $time." | ".getenv('REMOTE_ADDR')." | ".$_SERVER['REQUEST_URI']." | ".$ertitle." | ".$errno." | ".$msg." | ".$line." | ".$file." | ".$ercode."\r\n";

		$f = fopen(ERRORSLOG, "w+");
		if (is_writable(ERRORSLOG)) {
			fwrite($f, $subj);
		}
		fclose($f);

		# hide error if not use debugmode
		if(error_reporting() == 0 && $erlevel == 0) {
			die("<blockquote style='padding: 1rem; margin: .2rem .4rem;border: 1px solid moccasin;background-color: lemonchiffon;color: #1e1e1e;font-size: .85rem;'>
					Извините, что то пошло не так. Мы уже работаем над устранением причин. <small>".$time."</small> 
				    <a href='javascript:history.back(1)'>< Вернуться назад</a></blockquote>");
		}

        if (DEBUGMODE) {
			print "
			<div style='padding: 1rem; margin: .2rem .4rem;border: 1px solid red;background-color: moccasin;color: #1e1e1e;font-size: .85rem;'>
			Error: <b> #{$errno} - {$ertitle} | {$ercode}</b>
			<br />Строка: <b>{$line}</b> в файле <b>{$file}</b>
			<br /><b>{$msg}</b>
			</div>\n";
		}

		# We kill the standard handler, so that he would not give out anything to spy (:
		return true;
	}
	
	private static function error_report($show = true)
	{
		//ini_set("error_log", SYSERRLOG);
		if ($show) {
			error_reporting(E_ALL);			     #8191
			//ini_set("display_startup_errors",	1);
			//ini_set("display_errors",		    1);
			//ini_set("html_errors",			    1);
			//ini_set("report_memleaks",		    1);
			//ini_set("track_errors",			    1);
			//ini_set("log_errors",			    1);
			//ini_set("log_errors_max_len",		2048);
			//ini_set("ignore_repeated_errors",	1);
			//ini_set("ignore_repeated_source",	1);
		}
		else {
			error_reporting(0);
		}
	}

}
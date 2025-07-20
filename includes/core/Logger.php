<?php

/**
 * Class Logger
 */
class Logger 
{
	private	$log = [];

	/* Logger constructor. */
	public function __construct() 
	{
		# register handler for logs
		register_shutdown_function(array($this, 'save'));
	}

	/**
	 * Log error
	 * @param      $subj
	 * @param bool $save - on/off write error in db
	 */
	public function error($subj, $save = true) 
	{
		$_SESSION['error'][] = $subj;
		if ($save) {
			$this->log($subj, "error");
		}
	}

	/**
	 * Log info
	 * @param      $subj
	 * @param bool $save - on/off write notice in db
	 */
	public function info($subj, $save = true) 
	{
		$_SESSION['info'][] = $subj;
		if ($save) {
			$this->log($subj, "info");
		}
	}

	/**
	 * Add msg to log
	 * @param        $subj
	 * @param string $type
	 */
	public function log($subj, $type = "log") 
	{
		if ($type != "info" && $type != "error") {
			$type = "log";
		}
		$this->log[] = array("subj" => $subj, "type" => $type);
	}


	/* Save log into database */
	public function save() 
	{
		global $adminUser;
		$userIp = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
		if (!empty($this->log)) {
			$dump = [];
			$userId = (isset($adminUser['userId'])) ? $adminUser['userId'] : 0;

			foreach ($this->log AS $value) {
                $dump['userId']   = $userId;
                $dump['message']  = $value["subj"];
                $dump['type_log'] = $value["type"];
                $dump['date_log'] = time();
                $dump['user_ip']  = $userIp;
			}
            # insert log msg in to db
            dbQuery('log', DB_INSERT, array('values'=>$dump));
		}

	}
}

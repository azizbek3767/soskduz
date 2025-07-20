<?php
include('../includes/admin.inc.php');


class Logaction
{

    public $template;
    public $name;
    public $activeItem;
    public $page;
    public $itemsPerPage = 10;
    public $dataLogs;

    /**
     * About constructor.
     * @throws SmartyException
     */
    public function __construct()
    {
        global $smarty, $adminUser;

        if (!empty($_GET['act']) && $_GET['act'] == 'clear_logaction'){
            $this->clearLogs();
        }
        $page  = (int) getRequestVar('page');
        $this->logs($page);
        
        $this->activeItem = 'logaction';
        $this->template = 'logaction.tpl';
        $this->name  = 'Лог действий';

        if ($adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

        $smarty->assign('activeItem', $this->activeItem);
        $smarty->assign('name', $this->name);
        $smarty->display($this->template);

    }
    

    private function logs($page)
    {

		global $smarty;
        include('../includes/core/ParserDate.php');
		$parse = new ParserDate();

        if($page < 1){
            $page = 1;
            $smarty->assign('page', $page);
        }

        $join = array('admin_users'=>'ON(admin_users.userId=log.userId)');
        $fields = 'log.userId, log.message, log.type_log, log.date_log, admin_users.loginName';
        $q = dbQuery("log", DB_ARRAYS, array('fields' => $fields, 'order' => 'log.date_log ASC', 'join' => $join, 'start'=>($page-1)*$this->itemsPerPage, 'limit'=>$this->itemsPerPage));
        foreach ($q  as $data) {
            $data['date_log'] = $parse->unix_to_rus($data['date_log'], false, true, true);
		    $this->dataLogs[] = $data;
        }
        $totalLogs = dbQuery('log', DB_VALUE, array('fields'=>'COUNT(*)'));
        $pageNums = getPageNums($totalLogs, $page, $this->itemsPerPage, 0, 4, 4, 0);
        $smarty->assign('totalLogs', $totalLogs);
        $smarty->assign('pageNums', $pageNums);
		$smarty->assign("datalog", $this->dataLogs);
	}

    private function clearLogs()
    {
        global $logger;
        dbQuery("log", DB_DELETE, array());
        $logger->info("Лог действий очищен");
    }
}

$template = new Logaction();



<?php

include('../includes/admin.inc.php');


class Inivars
{
    public $template;
    public $name;
    public $activeItem;

    public function __construct()
    {
        global $adminUser ;
        if($adminUser['accessLevel'] != 'administrator' and $adminUser['accessLevel'] != 'developer')die(lang('general:accessIsDenied'));

        $this->inivars();
    }


    private function inivars()
    {
        global $smarty;
        $this->activeItem = 'inivars';
        $this->template   = 'inivars.tpl';
        $this->name       = "Значение PHP переменных";

        $inivars = ini_get_all();
        # draw tpl
        $smarty->assign('inivars',	$inivars);

        $smarty->assign('activeItem', $this->activeItem);
        $smarty->assign('name',       $this->name);
        $smarty->display($this->template);

    }


}

$inivars = new Inivars();
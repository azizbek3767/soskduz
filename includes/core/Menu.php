<?php

/**
 * Class Menu
 */
class Menu
{

    public $result;
    private $adminUser;
    public function __construct()
    {
        global $adminUser;
        $this->adminUser = $adminUser;
        $this->generateMenu();
    }

    public function generateMenu()
    {

        $this->result = json_decode(file_read(GLOBAL_ROOT."/admin/menu/menu.json"), true);

        foreach ($this->result as $key => $menu) {
            if (in_array($this->adminUser['accessLevel'], $menu['accessLevel'])){
                $this->result[$key]['children'] = $this->generateChildrenMenu($menu['children']);
                continue;
            } else {
                unset($this->result[$key]);
            }

        }

        return null;
    }

    public function generateChildrenMenu($children)
    {
        foreach ($children as $k => $child) {
            if (in_array($this->adminUser['accessLevel'], $child['accessLevel'])) {
                continue;
            } else {
                unset($children[$k]);
            }
        }
        return $children;
    }
}
<?php

/**
 * Class ConfigParams
 */
class ConfigParams
{

    /**
     * @return int
     */
    public function getSettings() {
        $config = dbQuery('settings', DB_ARRAYS, array('fields'=>'codename, value', 'indexKey'=>'codename', 'valueKey'=>'value'));
        return $config;
    }

    /**
     * @return int
     */
    public function getMenus() {
        $conf = dbQuery('menu_settings', DB_ARRAYS, array('fields'=>'field_name, field_value', 'indexKey'=>'field_name', 'valueKey'=>'field_value'));
        return $conf;
    }

    /**
     * @return int
     */
    public function getMaps() {
        $maps = dbQuery('maps', DB_ARRAYS, array('fields'=>'codename, value', 'indexKey'=>'codename', 'valueKey'=>'value'));
        return $maps;
    }

    public function getThemes(){
        $themes = array();
        $dh = opendir(GLOBAL_ROOT.'/themes');
        while($item = readdir($dh)) if($item != '.' && $item != '..' && is_dir(GLOBAL_ROOT."/themes/$item")) $themes[] = $item;
        sort($themes);
        closedir($dh);
        return $themes;
    }
}
<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_modifier_to_gmt($string)
{
    if($string != '') {
        return strtotime(gmdate('Y-m-d H:i:s', $string));
    } else {
        return;
    }
}

/* vim: set expandtab: */

?>
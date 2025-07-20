<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_modifier_format_time($string, $format = 'r')
{
    if($string != '') {
        return date($format, $string);
    } else {
        return;
    }
}

/* vim: set expandtab: */

?>
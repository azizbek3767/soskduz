<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty replace modifier plugin
 *
 * Type:     modifier<br>
 * Name:     fsize_format<br>
 * Purpose:  File size
 * @param string
 * @param string
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_fsize_format($size, $showBytes = false)
{
	if($showBytes && $size < 1024){
		return $size.' bytes';
	} elseif ($size < 1024*1024) {
		return number_format($size/1024, 2).' KB';
	} elseif ($size < 1024*1024*1024) {
		return number_format($size/(1024*1024), 2).' MB';
	} else {
		return number_format($size/(1024*1024*1024), 2).' GB';
	}
}

/* vim: set expandtab: */

?>

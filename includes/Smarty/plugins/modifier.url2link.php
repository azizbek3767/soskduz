<?php
/******************************************************************************/
//                                                                            //
//                             Smarty plugin                                  //
//                            @package Smarty                                 //
//							 @subpackage plugins                              //
//                        http://life-style.uz/                               //
//                   produced by Life Style, life-style.uz                    //
//                                                                            //
/******************************************************************************/

function smarty_modifier_url2link($string, $maxLength = 50, $etc = '...'){
	$pattern = '/(http:[^\s"<>]+|ftp:[^\s"<>]+|https:[^\s"<>]+|www\.[^\s"<>]+|[^\s"<>]+\.co\.uk[^\s"<>]+)/i';
	$string = preg_replace($pattern, '<a href="$1" rel="nofollow">$1</a>', $string);
	$string = preg_replace('/<a href="(?!http|ftp|https)([^"]+)"/i', '<a href="http://$1"', $string);
	$string = preg_replace('~<a href="(.+?)([\.,)\:\-;\'"!?]*)" rel="nofollow">(.+?)[\.,)\:\-;\'"!?]*</a>~i', '<a href="$1" rel="nofollow">$3</a>$2', $string);
	$string = preg_replace('~<a href="(.+?)" rel="nofollow">(.+?)</a>~ie', '\'<a href="$1" rel="nofollow">\'._smarty_modifier_url2link_truncate(\'$2\', '.$maxLength.', \''.$etc.'\').\'</a>\'', $string);
	return $string;
}
function _smarty_modifier_url2link_truncate($string, $length, $etc){
	if ($length == 0) return '';

	if (strlen($string) > $length) {
		$length -= strlen($etc);
		return substr($string, 0, $length/2) . $etc . substr($string, -$length/2);
	} else {
		return $string;
	}
}

?>
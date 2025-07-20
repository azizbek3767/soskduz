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

function smarty_modifier_bold_words($string, $words = '', $limit = -1)
{
	if (preg_match_all("/\w+/", $words, $matches)) {
		foreach($matches[0] as $word) $string = preg_replace("/\b($word)\b/i", "<b>$1</b>", $string, $limit);
	}
	return $string;
}


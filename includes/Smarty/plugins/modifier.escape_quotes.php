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

function smarty_modifier_escape_quotes($string) {
   $string = preg_replace('/"/', '"', $string);
   return preg_replace("/'/", "\\\'", $string);
}


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

/*
function smarty_modifier_price($price)
{
	global $activeCurrency;
	return $price * $activeCurrency['course'] . ' ' . $activeCurrency['codeName'];
}
*/

function smarty_modifier_price($price, $format = true)
{
	global $activeCurrency;


	$result = $price * $activeCurrency['course'];

	if ($format) {
        $result = number_format($result, $activeCurrency['cent'], '.', $activeCurrency['thousands_separator']);
    }

	if ($activeCurrency['codeName'] == '$' || $activeCurrency['codeName'] == '€') {
    	$result = $activeCurrency['codeName'] . '' . $result;
	} else {
    	$result = $result . ' <sup><span>' . $activeCurrency['codeName']. '</span></sup>';
	}
	
	return $result;
}

?>
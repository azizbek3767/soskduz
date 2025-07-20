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

function smarty_function_fetch_payments_method($params, &$smarty){
	global $SECTIONS, $gmNow, $config, $mysqli;
	
	$assign        = fetch_getParam('assign', $params, 'payments');
	$fields        = fetch_getParam('fields', $params, 'paymentId, name, fileName, summary');
	$status        = fetch_getParam('status', $params, 'visible');

	
	/* conditions */
	$where = array();	
	if(!empty($status)) $where[] 		= "status='".mysqli_real_escape_string($mysqli, $status)."'";


    $payments = dbQuery('payments', DB_ARRAYS, array('fields' => $fields, 'order' => 'paymentId ASC', 'where' => $where));
   // print_r($donations);

	$smarty->assign($assign, $payments);

	
	return null;
}
?>
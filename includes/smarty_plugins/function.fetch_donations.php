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

function smarty_function_fetch_donations($params, &$smarty){
	global $SECTIONS, $gmNow, $config, $mysqli;
	
	$assign        = fetch_getParam('assign', $params, 'donations');
	$fields        = fetch_getParam('fields', $params, 'id, name, price, summary');
	$status        = fetch_getParam('status', $params, 'visible');

	
	/* conditions */
	$where = array();	
	if(!empty($status)) $where[] 		= "status='".mysqli_real_escape_string($mysqli, $status)."'";


    $donations = dbQuery('donations', DB_ARRAYS, array('fields' => $fields, 'order'=> 'orderBy ASC', 'where'=>$where));
   // print_r($donations);

	$smarty->assign($assign, $donations);

	
	return null;
}
?>
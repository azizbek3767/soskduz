<?php
/******************************************************************************/
//                                                                            //
//                             Smarty plugin                                  //
//                            @package Smarty                                 //
//							 @subpackage plugins                              //
//                        https://life-style.uz/                              //
//                   produced by Life Style, life-style.uz                    //
//                                                                            //
/******************************************************************************/

function smarty_function_fetch_sliders($params, &$smarty){
	global $gmNow, $mysqli, $config;
	
	$assign        = fetch_getParam('assign', $params, 'sliders');
	$fields        = fetch_getParam('fields', $params, 'sliderId, publishedOn, title, alias, text, url, summary');
	$status        = fetch_getParam('status', $params, 'visible');
	$limit         = (int) fetch_getParam('limit', $params,  $config['cont_slide']);
	$hasImage      = fetch_getParam('hasImage', $params, NULL);

	/* conditions */
	$where = array();
	$where[] = "publishedOn <= '$gmNow'";
	if(!empty($status)) $where[] = "status='".mysqli_real_escape_string($mysqli, $status)."'";
	if(!is_null($hasImage)) $where[] = 'hasImage = '.((boolean) $hasImage ? 1 : 0);

    $sliders = dbQuery('sliders', DB_ARRAYS, array('fields'=>$fields, 'order'=>'orderBy ASC', 'where'=>$where, 'limit'=>$limit));
    $sliders = prepareSliders($sliders);

	$smarty->assign($assign, $sliders);

}
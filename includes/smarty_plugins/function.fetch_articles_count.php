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

function smarty_function_fetch_articles_count($params, &$smarty){
	global $mysqli;

	$status        = fetch_getParam('status', $params, 'visible');
	$section       = (int) fetch_getParam('section', $params);
	$type_content  = fetch_getParam('type_content', $params);
    $assignCount   = fetch_getParam('assignCount', $params);

	/* conditions */
	$where = array();	
	if(!empty($status))       $where[]  = "status       = '".mysqli_real_escape_string($mysqli, $status)."'";
	if(!empty($type_content)) $where[] 	= "type_content = '".mysqli_real_escape_string($mysqli, $type_content)."'";
    if(!empty($section))      $where[] 	= "sectionId    = '".mysqli_real_escape_string($mysqli, $section)."'";

	if (!empty($assignCount)) {
		$total = dbQuery('articles', DB_VALUE, array('fields' => 'COUNT(*)', 'where' => $where));
		$smarty->assign($assignCount, $total);
	}
	
	return null;
}

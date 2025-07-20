<?php
/******************************************************************************/
//                                                                            //
//                             Smarty plugin                                  //
//                            @package Smarty                                 //
//							             @subpackage plugins                              //
//                        http://life-style.uz/                               //
//                   produced by Life Style, life-style.uz                    //
//                                                                            //
/******************************************************************************/

function smarty_function_fetch_comments($params, &$smarty){
  global $mysqli;

	$assign    = fetch_getParam('assign', $params, 'comments');
	$fields    = fetch_getParam('fields', $params, '*');
	$status    = fetch_getParam('status', $params, 'approved');
	$orderBy   = fetch_getParam('orderBy', $params, 'addedOn ASC');
	$limit     = (int) fetch_getParam('limit', $params);
	$articleId = (int) fetch_getParam('articleId', $params);
	
	if(empty($assign)){
		$smarty->_trigger_fatal_error('fetch_comments: "assign" must not be empty');
		return;
	}
	
	/* conditions */
	$where = array();
	if(!empty($status)) $where[] = "status='".mysqli_real_escape_string($mysqli, $status)."'";
	if(!empty($articleId)) $where[] = "articleId='".mysqli_real_escape_string($mysqli, $articleId)."'";

	$comments = dbQuery('comments', DB_ARRAYS, array('fields'=>$fields, 'order'=>$orderBy, 'where'=>$where, 'limit'=>$limit));
	$smarty->assign($assign, $comments);

	return null;
}
?>
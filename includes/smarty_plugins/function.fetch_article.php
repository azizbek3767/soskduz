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

function smarty_function_fetch_article($params, &$smarty){
	global $SECTIONS, $gmNow, $fetchedArticles, $mysqli;

	$assign        = fetch_getParam('assign', $params, 'article');
	$fields        = fetch_getParam('fields', $params, 'sectionId, publishedOn, title, alias, url, summary, isFeatured, counter');
	$status        = fetch_getParam('status', $params, 'visible');
	$isFeatured    = fetch_getParam('isFeatured', $params, NULL);
	$hasImage      = fetch_getParam('hasImage', $params, NULL);
	$query         = fetch_getParam('query', $params, NULL);
	$match         = fetch_getParam('match', $params, 'any');
	$order         = fetch_getParam('order', $params, NULL);
	$orderBy       = fetch_getParam('orderBy', $params, $order);
	$section       = fetch_getParam('section', $params);
	$articleId     = (int) fetch_getParam('articleId', $params);
	$skip          = fetch_getParam('skip', $params, NULL);
	$noSubsections = (boolean) fetch_getParam('noSubsections', $params, false);

	/* conditions */
	$where = array();
	$where[] = "publishedOn <= '$gmNow'";
	if(!empty($status)) $where[] = "status='".mysqli_real_escape_string($mysqli, $status)."'";
	if(!is_null($isFeatured)) $where[] = 'isFeatured = '.((boolean) $isFeatured ? 1 : 0);
	if(!is_null($hasImage)) $where[] = 'hasImage = '.((boolean) $hasImage ? 1 : 0);
	if(is_null($orderBy)) $orderBy = (is_null($query) ? 'publishedOn DESC' : '');
	if($articleId > 0) $where[] = "articleId = '$articleId'";
	

	/* query conditions */
	fetch_articles_addQueryConditions($query, $match, $where, $fields, $orderBy);

	/* add section conditions */
	fetch_articles_addSectionConditions($section, $noSubsections, $where);

	/* skipping articles */
	fetch_articles_addSkipConditions($skip, $where);

	/* checking article fields */
	fetch_articles_filterFields($fields);

	/* calculate article popularity article fields */
	fetch_articles_calculatePopularity($orderBy);

	if(!is_null($query) && empty($query)){
		$article = array();
	} else {
		$article = dbQuery('articles', DB_ARRAY, array('fields'=>$fields, 'order'=>$orderBy, 'where'=>$where, 'limit'=>1));
		$article = prepareArticle($article);
	}
	$smarty->assign($assign, $article);

	/* saving fetched article for SKIP ability */
	if(empty($fetchedArticles[$assign])) $fetchedArticles[$assign] = array();
	if(!empty($article)) $fetchedArticles[$assign][] = $article['articleId'];

	return null;
}
?>
<?php

//Produced by Akmal Nodirov))

function smarty_function_fetch_sections_search($params, &$smarty){
    global $SECTIONS, $gmNow, $fetchedArticles, $config, $mysqli;

    $assign        = fetch_getParam('assign', $params, 'articles');
    $fields        = fetch_getParam('fields', $params, 'sectionId, parentId, name, alias, summary, content, keywords, description, code_maps');
    $status        = fetch_getParam('status', $params, 'visible');
    $limit         = (int) fetch_getParam('limit', $params);
    $perPage       = (int) fetch_getParam('perPage', $params, $limit);
    $isFeatured    = fetch_getParam('isFeatured', $params, NULL);
    $hasImage      = fetch_getParam('hasImage', $params, NULL);
    $query         = fetch_getParam('query', $params, NULL);
    $match         = fetch_getParam('match', $params, 'any');
    $order         = fetch_getParam('order', $params, NULL);
    $orderBy       = fetch_getParam('orderBy', $params, $order);
    $section       = fetch_getParam('section', $params);
    $type_content  = fetch_getParam('type_content', $params, '');
    $page          = (int) fetch_getParam('page', $params);
    $skip          = fetch_getParam('skip', $params, NULL);
    $noSubsections = (boolean) fetch_getParam('noSubsections', $params, false);


    $label    	   = fetch_getParam('label', $params);
    $atrtable      = fetch_getParam('atrtable', $params);
    $min_price 		= (int) fetch_getParam('min_price', $params);
    $max_price 		= (int) fetch_getParam('max_price', $params);

    $product_labels =  getRequestVar('product_labels');

    $assignPagination = fetch_getParam('assignPagination', $params);
    $path             = fetch_getParam('path', $params);
    $seFriendly       = (boolean) fetch_getParam('seFriendly', $params);
    $pnFirst          = (int) fetch_getParam('pnFirst', $params, 0);
    $pnBefore         = (int) fetch_getParam('pnBefore', $params, 4);
    $pnAfter          = (int) fetch_getParam('pnAfter', $params, 4);
    $pnLast           = (int) fetch_getParam('pnLast', $params, 0);

    if(empty($assign)){
        $smarty->_trigger_fatal_error('fetch_articles: "assign" must not be empty');
        return;
    }

    if(empty($path)) $path = array();

    $where = array();
    if(!empty($status)) $where[] 		= "status='".mysqli_real_escape_string($mysqli, $status)."'";
    if(!empty($type_content)) $where[] 	= "type_content='".mysqli_real_escape_string($mysqli, $type_content)."'";
    if(!is_null($isFeatured)) $where[] 	= 'isFeatured = '.((boolean) $isFeatured ? 1 : 0);
    if(!is_null($hasImage)) $where[] 	= 'hasImage = '.((boolean) $hasImage ? 1 : 0);
    if(is_null($orderBy)) $orderBy 		= (is_null($query) ? 'publishedOn DESC' : '');
    if(!empty($label)) $where[] 	    = "label='".mysqli_real_escape_string($mysqli, $label)."'";
    if(!is_null($query) && is_array($path)) $path[] = "query=".urlencode($query);
    fetch_sections_addQueryConditions($query, $match, $where, $fields, $orderBy);
    fetch_sections_filterFields($fields);
    if($page < 1) $page = 1;
    if($perPage < 1) $perPage = $config['cont_section'];
    if(!is_null($query) && empty($query)){
        $articles = array();
    } else {
        $articles = dbQuery('sections', DB_ARRAYS, array('fields'=>$fields, 'order'=>$orderBy, 'where'=>$where, 'start'=>($page-1)*$perPage, 'limit'=>$perPage));
        $articles = prepareSections($articles);
    }
    $smarty->assign($assign, $articles);

    if(empty($fetchedArticles[$assign])) $fetchedArticles[$assign] = array();
    if(!empty($articles)) foreach($articles as $article) $fetchedArticles[$assign][] = $article['sectionId'];

    if(!empty($assignPagination)){
        /* page numbering */
        $total = dbQuery('sections', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where));
        if(is_array($path)){
            $path = SITE_URL.'/'.basename($_SERVER['PHP_SELF']).'?'.(!empty($path) ? implode('&', $path).'&' : '');
            $seFriendly = false;
        }
        $pagination = getPageNums($total, $page, $perPage, $pnFirst, $pnBefore, $pnAfter, $pnLast, $path, $seFriendly);
        $smarty->assign($assignPagination, $pagination);
    }

    return null;
}
?>

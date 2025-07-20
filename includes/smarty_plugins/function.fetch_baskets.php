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

function smarty_function_fetch_baskets($params, &$smarty) {

	$assign        = fetch_getParam('assign', $params, 'baskets');
    $join          = array('articles' => 'ON(articles.articleId = baskets.articleId)');
    $fields        = fetch_getParam('fields', $params, 'baskets.basketId, baskets.articleId, baskets.price, baskets.amount, articles.title, articles.url, articles.summary');
    $image         = fetch_getParam('image', $params, false);
	$userId        =  fetch_getParam('userId', $params);
	
	 if (empty( SITE_LANG )){
        $site_lang = 'ru';
    } else {
        $site_lang = SITE_LANG;
    }
    

	if (!empty($userId)) {
    	$where = array();
    	$totalPrice = 0;

    	$where[] = "baskets.userId = '$userId'";
    	$where[] = "baskets.site_lang = '$site_lang'";

    	$baskets = dbQuery('baskets', DB_ARRAYS, array('fields' => $fields, 'where' => $where, 'join' => $join));
    	
    
        if ($image == true) $baskets = prepareArticles($baskets);
        foreach($baskets as $key => $basket){
            $int =  $basket["price"] * $basket['amount'];
            $totalPrice = $totalPrice + $int;
        }
//         print_r($baskets);

        $smarty->assign($assign, $baskets);
        $smarty->assign('totalPrice', $totalPrice);

        return null;

    }
}
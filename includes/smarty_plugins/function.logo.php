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

function smarty_function_logo($params, &$smarty){
	global $config;
	
	//$assign	= fetch_getParam('assign', $params, 'logos');
	$fields	= fetch_getParam('fields', $params, 'logoId, logoName, logoUrl, logoType, lang');
	
	$logos = dbQuery('logos', DB_ARRAYS, array('fields'=>$fields));
	
	//d($logos);
	$result = '';
	foreach ($logos as $logo){
		if ($logo['logoId'] == '1') {
			$result = '<a class="logo" href="' . SITE_URL . '"><img src="' . $logo['logoUrl'] . '" atl="' . $config['website_name'] . '"></a>';
		}
	}
	
	return $result;
}

		


?>
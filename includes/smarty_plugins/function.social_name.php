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

function smarty_function_social_name($params, &$smarty){
	global $socials, $config, $MUSQLILINK;
	
	$assign	= fetch_getParam('assign', $params, 'socials');
	$fields	= fetch_getParam('fields', $params, 'socialId, name, url, fileName, icon, status, isText');
	$status  = fetch_getParam('status', $params, 'visible');
    
    $where = array();
	if(!empty($status)) $where[] = "status='".mysqli_real_escape_string($MUSQLILINK, $status)."'";
	
    $socials = dbQuery('socials', DB_ARRAYS, array('fields'=>$fields, 'where'=>$where, 'order'=>'socialId ASC'));

	$result = '';

	foreach ($socials as $social){	
        
		if (!empty($social['icon'])){
    	
		    $result .= '<li><a href="' .  $social['url'] . '" title="' . $social['name'] . '" target="_blank"> ' . $social['icon'] . '<span class="rotate-text">' . $social['name'] . '</span></a></li>';
		} else {
			$result .= '<li><a href="' .  $social['url'] . '" title="' . $social['name'] . '" target="_blank"> ' . $social['name'] . '</a></li>';
		}

	}

	return $result;
}




?>
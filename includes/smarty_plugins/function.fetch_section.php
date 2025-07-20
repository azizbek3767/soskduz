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

function smarty_function_fetch_section($params, &$smarty){
	global $SECTIONS;

	$assign  = fetch_getParam('assign', $params, 'section');
	$status  = fetch_getParam('status', $params, 'visible');
	$from    = fetch_getParam('from', $params, NULL);
	$level   = (int) fetch_getParam('level', $params, 0);
	$type    = fetch_getParam('type', $params, '');
	$section = fetch_getParam('section', $params, '');
	$getContent = (bool) fetch_getParam('getContent', $params, true);
	
	$image   = fetch_getParam('image', $params, false);
	$gallery = fetch_getParam('gallery', $params, false);

	if(empty($assign)){
		$smarty->_trigger_fatal_error('fetch_sections: "assign" must not be empty');
		return;
	}

   
    
	if(!empty($section)){
		if(!empty($SECTIONS[$section])){
			$result = $SECTIONS[$section];
		} else {
			$sectionName = $section;
		}
	}

	if (empty($result)){
		if (!is_null($from)){
			if(is_numeric($from) && (($from == 0) || !empty($SECTIONS[$from]))){
				$parentId = $from;
			} else {
				foreach($SECTIONS as $sectionId=>$section){
					if($section['dir'] == $from){
						$parentId = $sectionId;
						break;
					}
				}
			}
		}

		foreach($SECTIONS as $sectionId=>$section){
			if (!empty($sectionName) && ($section['fileName'] != $sectionName) && ($section['dir'] != $sectionName)) continue;
			if (!empty($parentId) && $section['parentId'] != $parentId) continue;
			if (!empty($level) && $section['level'] != $level) continue;
			if (!empty($status) && $section['status'] != $status) continue;
			if (!empty($type) && $section['type'] != $type) continue;
			$result = $section;
			break;
		}
	}

	if($getContent && !empty($result)){
		$result['content'] = dbQuery('sections', DB_VALUE, array('where'=>"sectionId=$result[sectionId]", 'fields'=>'content'));
		
		
	}
	
	/* получение картинки */
	if ($image === true) {
	    $result = prepareSection($result);
	}
	//print_r($result);
	
    if (isset($result)) {
	    $smarty->assign($assign, $result);
    }
    
    
    
    
	return null;
}
?>
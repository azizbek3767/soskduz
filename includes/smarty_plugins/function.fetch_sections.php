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

function smarty_function_fetch_sections($params, &$smarty) {
	global $SECTIONS;

	$assign     = fetch_getParam('assign', $params, 'sections');
	$fields     = fetch_getParam('fields', $params, 'sectionId, parentId, name, alias, url, summary, content, top_menu, code_maps');
	$status     = fetch_getParam('status', $params, 'visible');
	$from       = fetch_getParam('from', $params, NULL);
	$level      = (int) fetch_getParam('level', $params, 0);
	$type       = fetch_getParam('type', $params, '');
	$limit      = (int) fetch_getParam('limit', $params);
    $top_menu   = (int) fetch_getParam('top_menu', $params);
	$sections   = fetch_getParam('sections', $params, NULL);
	$getContent = (bool) fetch_getParam('getContent', $params, false);
	
	$image  = fetch_getParam('image', $params, false);
	$maps   = (bool) fetch_getParam('maps', $params, false);


	if (empty($assign)) {
		$smarty->_trigger_fatal_error('fetch_sections: "assign" must not be empty');
		return;
	}

    
	if (!is_null($sections)) {
    	//print_r($sections);
		// if "sections" is a list separated with comma
		$sectionIds = array();
		if (!is_array($sections)){
			$sections = explode(',', $sections);
			$sections = array_map('trim', $sections);
		}
		// replace all section codeNames with their sectionIds
		$sectionIds = $sections;
		foreach ($SECTIONS as $sectionId => $section) {
			if (($key = array_search($section['dir'], $sectionIds)) || ($key = array_search($section['fileName'], $sectionIds)) || ($key = array_search($section['sectionId'], $sectionIds))) {
				$sectionIds[$key] = $section['sectionId'];
			}
		}
		foreach ($sectionIds as $sectionId) $result[$sectionId] = array();
	}

	/* получние всех подразделов */
	if (!is_null($from)) {
		// find parentId
		if (is_numeric($from) && (($from == 0) || !empty($SECTIONS[$from]))) {
			$parentId = $from;
		} else {
			foreach ($SECTIONS as $sectionId=>$section) {
				if ($section['dir'] == $from) {
					$parentId = $sectionId;
					break;
				}
			}
		}
	}


	$total = 0;
	$result = array();
	foreach ($SECTIONS as $sectionId => $section) {
		if (!empty($limit) && $total >= $limit) break;
		if (isset($sectionIds) && !in_array($section['sectionId'], $sectionIds)) continue;
		if (!empty($parentId) && $section['parentId'] != $parentId) continue;
		if (!empty($level) && $section['level']       != $level) continue;
		if (!empty($status) && $section['status']     != $status) continue;
        if (!empty($top_menu) && $section['top_menu'] != $top_menu) continue;
		if (!empty($type) && $section['type']         != $type) continue;
		$result[$sectionId] = $section;
		$total++;
	}

	if (isset($result) && !empty($result)) {
		// remove empty elements from result
		foreach ($result as $sectionId => $section) {
            if (empty($section)) unset($result[$sectionId]);
		}
	}

    /* получение контена */
	if ($getContent && !empty($result)) {
		$where    = 'sectionId IN ('.implode(',', array_keys($result)).')';
		$contents = dbQuery('sections', DB_ARRAYS, array('where'=>$where, 'indexKey'=>'sectionId', 'valueKey'=>'content', 'fields'=>$fields));
		
		foreach ($contents as $sectionId => $content) {
			$result[$sectionId]['content'] = $content;
		}
	}


	if ($maps && !empty($result)) {
    	$where  = 'sectionId IN ('.implode(',', array_keys($result)).')';
		$mapsarr = dbQuery('sections', DB_ARRAYS, array('where' => $where, 'indexKey'=>'sectionId', 'valueKey'=>'code_maps', 'fields' => $fields));
	
		foreach ($mapsarr as $sectionId => $map) {

			$result[$sectionId]['code_maps'] = $map;
		}

	}
	/* получение картинки */
	if ($image) {
	    $result = prepareSections($result);
	}
    
    //print_r($result);
    
	$smarty->assign($assign, $result);
	

	return null;
}


?>
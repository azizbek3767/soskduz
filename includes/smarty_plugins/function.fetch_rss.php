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

function smarty_function_fetch_rss($params, &$smarty){
	if(!empty($params['from'])) {
		$from = $params['from'];
	} else {
		$smarty->trigger_error("rss: missing 'from' parameter");
       	return false;
	}
	
	/* smarty variable name */
	if(!empty($params['assign'])) {
		$assign = (string) $params['assign'];
	} else {
		$assign = "rss";
	}
	
	/* cache lifetime */
	if(isset($params['cache'])){
		if(is_numeric($params['cache'])){
			$cache = $params['cache'];
		} else {
			$cache = strtotime($params['cache']) - time();
		}
	} else {
		$cache = 86400;
	}

	/* strip tags */
	if(isset($params['stripTags'])){
		$stripTags = (boolean) $params['stripTags'];
	} else {
		$stripTags = true;
	}
	
	/* cache */
	$cacheFile = 'rss:rss-dummy';
	$cacheId = md5($from);
	$oldCacheStatus = $smarty->caching;
	$oldCacheLifetime = $smarty->cache_lifetime;
	$smarty->caching  = ($cache == 0) ? false : true;
	$smarty->cache_lifetime = $cache;

	if(!$smarty->is_cached($cacheFile, $cacheId)) {
		/* download RSS */
		if(!($content = file_get_contents($from))) return false;
		$smarty->assign('smarty_function_fetch_rss_data', $content);
	}
	
	/* get content from smarty */
	$content = $smarty->fetch($cacheFile, $cacheId);

	/* reset cache status */
	$smarty->caching = $oldCacheStatus;
	$smarty->cache_lifetime = $oldCacheLifetime;
	
	/* find source encoding */
	$encoding = 'utf-8';
	if(preg_match("/<\?xml[^>]+encoding=[\"']([^>\"']+?)[\"']\?>/si", $content, $match)) $encoding = trim($match[1]);
	
	$data = smarty_function_fetch_rss_parse_rss($content, $encoding, $stripTags);
	
	if(is_array($data)){
		$rss = current($data);
		$smarty->assign($assign, $rss);
	}
	
	return null;
}

function smarty_function_fetch_rss_parse_rss($data, $sourceEncoding = 'utf-8', $stripTags = true){
	global $config;
	$multiChannel = false;
	if(preg_match('~^<!\[CDATA\[(.+?)\]\]~is', trim($data), $match)){
		$result = $match[1];
		if(!empty($sourceEncoding) && function_exists('mb_convert_encoding')){
			$result = mb_convert_encoding($result, $config['charset'], $sourceEncoding);
		}
		return $result;
	}
	if(preg_match_all("~<channel>.+?</channel>~si", $data, $matches) > 1) $multiChannel = true;
	if(preg_match_all("~<([a-z0-9:][^>\s]+)([^>]*?|\s*)>(.*?)</\\1>~si", $data, $matches)){
		for($i = 0; $i < count($matches[1]); $i++){
			$tagName = str_replace(':', '_', $matches[1][$i]);
			$tagData = $matches[3][$i];
			$tagResult = smarty_function_fetch_rss_parse_rss($tagData, $sourceEncoding, $stripTags);
			$tagAttrs = trim($matches[2][$i]);

			/* adding TAGs */
			if($tagName == 'item'){
				$result['items'][] = $tagResult;
			} elseif($tagName == 'channel' && $multiChannel == true){
				$result['channels'][] = $tagResult;
			} else {
				$result[$tagName] = $tagResult;

				/* adding attributes */
				if(!empty($tagAttrs)){
					if(preg_match_all("~([a-z0-9][^>\s:]+?)=['\"]([a-z0-9][^>\s]+?)['\"]~si", $tagAttrs, $attribs)){
						for($j = 0; $j < count($attribs[1]); $j++){
							$attrName = str_replace(':', '_', $attribs[1][$j]);
							$attrData = $attribs[2][$j];
							$result[$tagName."-".$attrName] = $attrData;
						}
					}
				}
			}
		}
	} else {
		$result = unhtmlentities($data);
		if($stripTags) $result = strip_tags($result);
		$result = trim($result);
		
		if(!empty($sourceEncoding) && function_exists('mb_convert_encoding')){
			$result = mb_convert_encoding($result, $config['charset'], $sourceEncoding);
		}
	}
	return $result;
}
?>
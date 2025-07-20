<?php
	require_once('../includes/visitor.inc.php');
	
	global $config, $tbl;
	
	$fileName  = getRequestVar('fileName');
	$sectionId = (int) getRequestVar('sectionId');
	$rewrite   = getRequestVar('rewrite');
	$top_menu  = getRequestVar('top_menu');
	$nocache   = (boolean) getRequestVar('nocache');	

	if(!empty($SECTIONS[$sectionId]) && $article = dbQuery('articles', DB_ARRAY, array('where'=>"sectionId='$sectionId' AND fileName='$fileName'"))){
		/* checking whether we in rewrite mode */
		if($rewrite != $config['rewrite']){
			header("HTTP/1.0 301 Moved Permanently");
			header("Location: $article[url]");

			/* saving visit */
			writeErrorVisit(301);
			exit;
		}
		
		/* caching procedures */
		if($nocache){
			$smarty->caching = 0;
		} elseif($SECTIONS[$sectionId]['artIsCached'] == 1){
			$smarty->caching = 2;
			$smarty->cache_lifetime = $SECTIONS[$sectionId]['artCacheTime'] * $SECTIONS[$sectionId]['artCachePeriod'];
		} elseif($SECTIONS[$sectionId]['artIsCached'] != -1 && $config['cache_enabled_article'] == 1) {
			$smarty->caching = 2;
			$smarty->cache_lifetime = $config['cache_time_article'] * $config['cache_period_article'];
		}

		/* commenting procedures */
		if($article['commentsEnabled'] == 1){
			$article['commentsEnabled'] = 1;
		} elseif($article['commentsEnabled'] == -1){
			$article['commentsEnabled'] = 0;
		} elseif($article['commentsEnabled'] == 0){
			$article['commentsEnabled'] = 0;
			if($SECTIONS[$sectionId]['commentsEnabled'] == 1){
				$article['commentsEnabled'] = 1;
			} elseif($SECTIONS[$sectionId]['commentsEnabled'] != -1 && $config['comments_enabled'] == 1){
				$article['commentsEnabled'] = 1;
			}
		}

		$article['section'] = $SECTIONS[$article['sectionId']];
		$templateName = empty($SECTIONS[$sectionId]['artTemplateName']) ? 'article.tpl' : $article['section']['artTemplateName'];

		if(!$smarty->isCached($templateName, md5($fileName).SITE_LANG_POSTFIX)){
			/* for "you-are-here" navigation */
			$sectionParents = getSectionParents($article['sectionId']);
			$smarty->assign('sectionParents', $sectionParents);
			
			/* displaying article */
			$article = prepareArticle($article);
			
			$smarty->assign('article', $article);
			
			/* saving fetched article for SKIP ability */
			if(empty($fetchedArticles['primaryArticle'])) $fetchedArticles['primaryArticle'] = array();
			$fetchedArticles['primaryArticle'][] = $article['articleId'];

			$smarty->assign('activeSection', $SECTIONS[$sectionId]);
		}
    
        /* просмотры */
        articleViewCounter($article['articleId']);
        
		/* saving visit */
		writeArticleVisit($article['articleId']);
		
		$smarty->display($templateName, md5($fileName).SITE_LANG_POSTFIX);

		/* precise load time */
		updateLoadTime();
	} elseif($article = dbQuery('articles', DB_ARRAY, array('where'=>"LOWER(fileName)=LOWER('$fileName')", 'fields'=>'articleId, url'))) {

		/* wrong section or filename character case - redirecting browser to the correct address */
		header("HTTP/1.0 301 Moved Permanently");
		header("Location: $article[url]");
		echo "<html><body>Moved to <a href=\"$article[url]\">$article[url]</a></body></html>";

		/* saving visit */
		writeErrorVisit(301);
		exit;

	} elseif($section = dbQuery('sections', DB_ARRAY, array('where'=>"LOWER(fileName)=LOWER('$fileName')", 'fields'=>'sectionId, url'))) {

		/* user wanted to open section, but not an article - redirecting browser to the correct address */
		header("HTTP/1.0 301 Moved Permanently");
		header("Location: $section[url]");
		echo "<html><body>Moved to <a href=\"$section[url]\">$section[url]</a></body></html>";

		/* saving visit */
		writeErrorVisit(301);
		exit;

	} else {

		/* article not found */
		header("HTTP/1.0 404 Not Found");

		/* finding URI part, that caused 404 error */
		$requestUri = strtolower(urldecode($_SERVER['REQUEST_URI']));
		$parsedUrl  = parse_url(strtolower(SITE_URL));
		$errorUrl   = @str_replace($parsedUrl['path'], '', $requestUri);

		/* finding all words in the URL */
		if(preg_match_all("/[a-zA-Z0-9]+/", $errorUrl, $matches)) $query = implode(' ', $matches[0]);
		if(!empty($query)) $smarty->assign('query', $query);

		/* finding all words in the URL and find all sections equal to the words */
		if(preg_match_all("/[0-9a-zA-Z]+/", $errorUrl, $matches)){
			$query = implode(' ', $matches[0]);
			$where = array("status='visible'");
			$where[] = "MATCH(name) AGAINST ('".mysqli_real_escape_string($mysqli, $query)."')";
			$sectionIDs = dbQuery('sections', DB_ARRAYS, array('fields'=>'sectionId', 'where'=>$where, 'valueKey'=>'sectionId'));
			
			foreach($sectionIDs as $sectionId){
				$section = $SECTIONS[$sectionId];
				$section['codeName'] = array();
				if($section['parents']) foreach($section['parents'] as $parentId){
					$section['codeName'][] = ucfirst($SECTIONS[$parentId]['name']);
				}
				$section['codeName'][] = ucfirst($section['name']);
				$section['codeName'] = implode(' :: ', $section['codeName']);
				$sections[] = $section;
				if(count($sections) >= 5) break;
			}
			if(!empty($sections)) $smarty->assign('sections', $sections);
		}

		/* saving visit */
		writeErrorVisit(404);
		
		$smarty->display('error-404.tpl', md5($fileName).SITE_LANG_POSTFIX);

		/* precise load time */
		updateLoadTime();
	}
?>
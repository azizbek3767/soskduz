<?php
	require_once('../includes/visitor.inc.php');
	/* finding URI part, that caused 404 error */
	$requestUri = strtolower(urldecode($_SERVER['REQUEST_URI']));
	$parsedUrl  = parse_url(strtolower(SITE_URL));

    $errorUrl   = @str_replace($parsedUrl, '', $requestUri);
	
	if(preg_match('!^/index\.(htm|html)$!', $errorUrl)){
		/* redirecting root /index.htm and /index.html requests to the unified home page address */
		header("HTTP/1.0 301 Moved Permanently");
		header('Location: '.SITE_URL.'/');
		echo '<html><body>Moved to <a href="'.SITE_URL.'/">'.SITE_URL.'/</a></body></html>';
		
		/* saving visit */
		writeErrorVisit(301);
		exit;
	} elseif(preg_match('/([0-9a-zA-Z\-_\.]+?)$/i', $errorUrl, $matches)){
		$leftPart = str_replace($matches[1], '', $errorUrl);
		$fileName = preg_replace('/(\.htm|\.html)$/i', '', $matches[1]);
		$fileName = mysqli_real_escape_string($mysqli, $fileName);

		/* lets try to find an article */
		if($article = dbQuery('articles', DB_ARRAY, array('where'=>"LOWER(fileName)=LOWER('$fileName')", 'fields'=>'articleId, url'))) {
			/* redirecting to correct address */
			header("HTTP/1.0 301 Moved Permanently");
			header("Location: $article[url]");
			echo "<html><body>Moved to <a href=\"$article[url]\">$article[url]</a></body></html>";
			
			/* saving visit */
			writeErrorVisit(301);
			exit;
		}

		/* lets try to find a section */
		if($section = dbQuery('sections', DB_ARRAY, array('where'=>"LOWER(fileName)=LOWER('$fileName')", 'fields'=>'sectionId, url'))) {
			/* redirecting to correct address */
			header("HTTP/1.0 301 Moved Permanently");
			header("Location: $section[url]");
			echo "<html><body>Moved to <a href=\"$section[url]\">$section[url]</a></body></html>";
			
			/* saving visit */
			writeErrorVisit(301);
			exit;
		} elseif(preg_match('/(index|page\d+)/i', $fileName) && preg_match('|/([^/]+)/$|', $leftPart, $matches)){
			/* possibly a section has been moved; lets try to find section by dirname (/section/) */
			$fileName = preg_replace('/(\.htm|\.html)$/i', '', $matches[1]);
			$fileName = mysqli_real_escape_string($mysqli, $fileName);
			if($section = dbQuery('sections', DB_ARRAY, array('where'=>"LOWER(fileName)=LOWER('$fileName')", 'fields'=>'sectionId, url'))) {
				/* redirecting to correct address */
				header("HTTP/1.0 301 Moved Permanently");
				header("Location: $section[url]");
				echo "<html><body>Moved to <a href=\"$section[url]\">$section[url]</a></body></html>";
				
				/* saving visit */
				writeErrorVisit(301);
				exit;
			}
		}
	}

	header("HTTP/1.0 404 Not Found");

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

	$smarty->display('error-404.tpl');

	/* precise load time */
	updateLoadTime();
?>
<?php
    /**
     * @return bool
     */
    function buildLanguagesArray(){
    	global $LANGUAGES;
    	$LANGUAGES = dbQuery('languages', DB_ARRAYS, array('fields'=>'languageName, codename, name, url, isDefault, status', 'indexKey'=>'codename', 'order'=>'sortOrder'));
    	$langExport = "<?php\r\n";
    	$langExport .= '$LANGUAGES = '.var_export($LANGUAGES, true).";\r\n";
    	$langExport .= "return \$LANGUAGES;\r\n";
    	$langExport .= "?>";
    	saveFile(GLOBAL_ROOT.'/includes/global-languages.inc.php', $langExport);
    	foreach($LANGUAGES as $codename => $void){
    		$LANGUAGES[$codename]['languageTransName'] = lang('languageList:'.$codename);
    	}
    	return true;
    }
    
    /**
     * @param $path
     * @return bool
     */
    function makeDir($path){
    	if(!is_dir($path)) mkdir($path);
    	return true;
    }
    
    /**
     * @param $fileFrom
     * @param $fileTo
     * @return bool
     */
    function moveFile($fileFrom, $fileTo){
    	if(!is_file($fileFrom)) return false;
    	if(is_file($fileTo)) @unlink($fileTo);
    	if(copy($fileFrom, $fileTo)) @unlink($fileFrom);
    	return true;
    }
    
    /**
     * @param $pathFrom
     * @param $pathTo
     * @return bool
     */
    function moveDir($pathFrom, $pathTo){
    	if(!is_dir($pathFrom)) return false;
    	if(!is_dir($pathTo)) @mkdir($pathTo);
    	$pathTo = realpath($pathTo);
    	$pathFrom = realpath($pathFrom);
    	if(!is_dir($pathFrom)) return false;
    	if(!is_dir($pathTo)) @mkdir($pathTo);
    
    	$dh = opendir($pathFrom);
    	while (false !== ($fileName = readdir($dh))) {
    		if($fileName != '.' && $fileName != '..'){
    			$fileNameFrom = "$pathFrom/$fileName";
    			$fileNameTo   = "$pathTo/$fileName";
    			if(is_dir($fileNameFrom)){
    				moveDir($fileNameFrom, $fileNameTo);
    			} else {
    				if(copy($fileNameFrom, $fileNameTo)) @unlink($fileNameFrom);
    			}
    		}
    	}
    	closedir($dh);
    	@rmdir($pathFrom);
    	return true;
    }
    
    /**
     * @param $userId
     * @return int
     */
    function loadAdminUser($userId){
    	global $adminUser, $smarty;
    	$adminUser = dbQuery('admin_users', DB_ARRAY, array('where'=>"userId='$userId'"));
    	$adminUser = prepareAdminUser($adminUser);
    	$adminUser['sectionRights'] = dbQuery('section_rights', DB_ARRAYS, array('fields'=>'sectionId', 'where'=>"userId='$userId'", 'valueKey'=>'sectionId'));
    	$_SESSION['adminUser'] = $adminUser;
    	$smarty->assign('adminUser', $adminUser);
    	return $adminUser;
    }
    
    /**
     * @param $date
     * @return array|string
     */
    function langdate($date){
    	global $L;
    	$date = strtr($date, $L['dates']);
    	return array2unicode($date);
    }
    
    /**
     * @param $tag
     * @param string $default
     * @return int
     */
    function langlen($tag, $default = ''){
    	$text = getTagVal(array($default, $tag));
    	return strlen($text);
    }
    
    /**
     * @param $tag
     * @param string $default
     * @return array|string
     */
    function langjs($tag, $default = ''){
    	$text = getTagVal($tag, $default);
    	$text = array2js($text);
    	return $text;
    }
    
    /**
     * @param $tag
     * @param string $default
     * @return array|string
     */
    function lang($tag, $default = ''){
    	$text = getTagVal($tag, $default);
    	$text = array2unicode($text);
    	return $text;
    }
    
    /**
     * @param $source
     * @param $smarty
     * @return null|string|string[]
     */
    function replaceLanguageTags($source){
    	global $adminLang, $L;
    	if(!isset($L)) loadLanguage($adminLang);
    	$source = preg_replace_callback('/{([0-9a-zA-Z_\-:]+?)}/', '_replace_lang_tags_callback', $source);
    	return $source;
    }
    
    /**
     * @param $matches
     * @return array|string
     */
    function _replace_lang_tags_callback($matches){
    	$text = getTagVal($matches[1], $matches[0]);
    	return array2unicode($text);
    }
    
    /**
     * @param $tag
     * @param $default
     * @return mixed
     */
    function getTagVal($tag, $default){
    	global $L;
    	$keys = explode(':', $tag);
    	switch (count($keys)) {
    		case 1:
    			$result = isset($L[$keys[0]]) ? $L[$keys[0]] : $default;
    		break;
    		case 2:
    			$result = isset($L[$keys[0]][$keys[1]]) ? $L[$keys[0]][$keys[1]] : $default;
    		break;
    		case 3:
    			$result = isset($L[$keys[0]][$keys[1]][$keys[2]]) ? $L[$keys[0]][$keys[1]][$keys[2]] : $default;
    		break;
    		case 4:
    			$result = isset($L[$keys[0]][$keys[1]][$keys[2]][$keys[3]]) ? $L[$keys[0]][$keys[1]][$keys[2]][$keys[3]] : $default;
    		break;
    	}
    	return $result;
    }
    
    /**
     * @param $var
     * @return array|string
     */
    function array2js($var){
    	global $L;
    	if(is_array($var)) {
    		return array_map('array2js', $var);
    	} else {
    		return text2js($var, $L['charset']);
    	}
    }
    
    /**
     * @param $text
     * @param $encoding
     * @return string
     */
    function text2js($text, $encoding){
    	$text = text2unicode($text, $encoding);
    	//$text = preg_replace('/&#(\d+);/e', "'\u0'.dechex($1)", $text);
    	return $text;
    }
    
    /**
     * @param $var
     * @return array|string
     */
    function array2unicode($var){
    	global $L;
    	if(is_array($var)) {
    		return array_map('array2unicode', $var);
    	} else {
    		return text2unicode($var, $L['charset']);
    	}
    }
    
    /**
     * @param $text
     * @param $encoding
     * @return string
     */
    function text2unicode($text, $encoding){
    	mb_internal_encoding('UTF-8');
    	$convmap = array(0x0, 0x2FFFF, 0, 0xFFFF);
    	$convmap = array(0x80, 0xFFFF, 0, 0xFFFF);
    	$text = mb_convert_encoding($text, 'UTF-8', $encoding);
    	return $text;
    }
    
    /**
     * @param $language
     */
    function loadLanguage($language){
    	global $L;
    	if(is_file(GLOBAL_ROOT.'/admin/languages/'.$language.'.inc.php')){
    		$L = include(GLOBAL_ROOT.'/admin/languages/'.$language.'.inc.php');
    	} else {
    		$L = include(GLOBAL_ROOT.'/admin/languages/en.inc.php');
    	}
    }
    
    /**
     * @param $date
     */
    function deleteStatsPriorTo($date){
    	global $tbl;
    	$type2table = array(2=>'stats_section_visits', 3=>'stats_article_visits', 4=>'stats_search_visits', 5=>'stats_ad_clicks', 6=>'stats_error_visits', 7=>'stats_rss_visits', 10=>'stats_webpage_visits');
    	do{
    		if($visitors = dbQuery('stats_visitors', DB_ARRAYS, array('where'=>"firstVisitOn < '$date'", 'fields'=>'visitorId', 'valueKey'=>'visitorId', 'limit'=>1000))){
    			do{
    				if($visits = dbQuery('stats_visits', DB_ARRAYS, array('where'=>"visitorId IN ('".implode("','", $visitors)."')", 'fields'=>'visitId, typeId', 'indexKey'=>'visitId', 'valueKey'=>'typeId', 'limit'=>1000))){
    					$visitsByType = array();
    					foreach($visits as $visitId=>$typeId){
    						if(!isset($visitsByType[$typeId])) $visitsByType[$typeId] = array();
    						$visitsByType[$typeId][] = $visitId;
    					}
    
    					/* deleting each type of visit */
    					foreach($visitsByType as $typeId=>$typeVisits) if(!empty($tbl[$type2table[$typeId]])) {
    						dbQuery($type2table[$typeId], DB_DELETE, array('where'=>"visitId IN('".implode("','", $typeVisits)."')"));
    					}
    
    					/* deleting all visits */
    					dbQuery('stats_visits', DB_DELETE, array('where'=>"visitId IN ('".implode("','", array_keys($visits))."')"));
    				}
    			} while(!empty($visits));
    
    			/* deleting visitors */
    			dbQuery('stats_visitors', DB_DELETE, array('where'=>"visitorId IN ('".implode("','", $visitors)."')"));
    		}
    	} while(!empty($visitors));
    }
    
    /**
     * @return array
     */
    function getThemes(){
        $themes = array();
        $dh = opendir(GLOBAL_ROOT.'/themes');
        while($item = readdir($dh)) if($item != '.' && $item != '..' && is_dir(GLOBAL_ROOT."/themes/$item")) $themes[] = $item;
        sort($themes);
        closedir($dh);
        return $themes;
    }
    
    /**
    * @return array
    */
    function getLanguages(){
    	$languages = array();
    	$dh = opendir(GLOBAL_ROOT.'/admin/languages');
    	while ($item = readdir($dh)) if ($item != '.' && $item != '..' && is_file(GLOBAL_ROOT."/admin/languages/$item")){
    		$L = include(GLOBAL_ROOT."/admin/languages/$item");
    		$languages[$L['codeName']] = text2unicode($L['langName'], $L['charset']);
    	}
    	closedir($dh);
    	return $languages;
    }
    
    /**
    * @param $values
    * @return mixed
    */
    function midValues($values){
    	$totalValues = count($values) - 1;
    	$step = ceil($totalValues/10);
    	for($i = 2; $i < $totalValues; $i++){
    		if(($i < $step) || ($i > ($totalValues - $step)) || (($i - 1) % $step)) $values[$i] = '';
    	}
    	return $values;
    }
    
    /**
     * @param $document
     * @return null|string|string[]
     */
    function cleanHtml($document){
    	$search = array(
    		"/Article Source: <a href=\"http:\/\/ezinearticles.com\/\?expert=[^\">]+\">http:\/\/EzineArticles.com\/\?expert=[^\<]+<\/a>/si",
    		"/<!-- google_ad_section_start -->/i",
    		"/(<(p|b|br|strong|i)>)?\s*(ABOUT THE AUTHOR|RESOURCE BOX)\s*(<\/?(p|b|br|strong|i)>)?\s*[\:\.]?\s*(<\/(p|b|strong)>)?\s*(<br>)?/si",
    		"/<\!+?[^<>]*?>/si", // убираем все комментарии
    		"/<([^a\/][^\s<>]*)[^<>]*?>/si", // убираем атрибуты у всех тэгов, кроме A
    		"/<a [^<>]*?href=[\"']*?([^\"'<>\s]+)[\"']*?\s?[^<>]*?>/si",  //убираем лишние атрибуты у A тэга
    		"/<(?!\/?\b(a|p|b|strong|i|em|u|br|blockquote|xmp|ol|ul|li)\b)[^>]+>/si",  // убираем все тэги, кроме ...
    		"/<p>\s*<\/p>/si",  // убираем пустые параграфы
    		"/(\s*<\/?p>\s*)+/si",  // заменяем <p> и </p> на два <br>
    		"/<p>/si",  // убираем все тэги P
    		"/(\s*<br>\s*){3,}/si",  // заменяем более 3-х <br> на два <br>
    		"/^(\s*<br>\s*)+/si",  // убираем первые <br>
    		"/(\s*<br>\s*)+$/si",  // убираем последние <br>
    		"/(\s*<br>\s*)+<ul>/si",  // убираем <br> до <ul>
    		"/<\/ul>(\s*<br>\s*)+/si",  // убираем <br> после </ul>
    		"/\s+/", // убираем лишние пробелы
    	);
    	$replace = array(
    		' ',
    		' ',
    		' ',
    		' ', // убираем все комментарии
    		'<$1>', // убираем атрибуты у всех тэгов, кроме A
    		'<a href="$1">', // убираем лишние атрибуты у A тэга
    		' ', // убираем все тэги, кроме ...
    		' ', // убираем пустые параграфы
    		'<br><br>', // заменяем <p> и </p> на два <br>
    		' ', // убираем все тэги P
    		'<br><br>', // заменяем более 3-х <br> на два <br>
    		' ', // убираем первые <br>
    		' ', // убираем последние <br>
    		'<ul>', // убираем <br> до <ul>
    		'</ul>', // убираем <br> после </ul>
    		' ', // убираем лишние пробелы
    	);
    	return preg_replace($search, $replace, $document);
    }
    
    /**
     * @param $srcFileName
     * @param $dstFileName
     * @return bool
     */
    function gunzipFile($srcFileName, $dstFileName) {
    	$srcH = gzopen($srcFileName, 'rb');
    	$dstH = fopen($dstFileName, 'wb');
    
    	if(!$srcH || !$dstH) return false;
    	while(!gzeof($srcH)) {
    		$buffer = gzread($srcH, 4096);
    		fwrite($dstH, $buffer);
    	}
    
    	gzclose ($srcH);
    	fclose ($dstH);
    
    	return true;
    }
    
    /**
     * @param $srcFileName
     * @param $dstFileName
     * @param string $compression
     * @return bool
     */
    function gzipFile($srcFileName, $dstFileName, $compression = '6') {
    	$srcH = fopen($srcFileName, 'rb');
    	$dstH = gzopen($dstFileName, 'wb'.$compression);
    
    	if(!$srcH || !$dstH) return false;
    	while(!feof($srcH)) {
    		$buffer = fgets($srcH, 4096);
    		gzwrite($dstH, $buffer);
    	}
    
    	fclose ($srcH);
    	gzclose ($dstH);
    
    	return true;
    }
    
    /**
     * @param $article
     * @return mixed
     */
    function preparePreview($article){
    	global $config, $adminUser, $SECTIONS;
    	if(empty($article['title'])) die('Enter title.');
    	if((int) $article['sectionId'] <= 0) die('Select section.');
    
    	if(empty($article['fileName'])){
    		die('Enter filename.');
    	} elseif(empty($article['articleId'])){
    		if(dbQuery('articles', DB_VALUE, array('fields'=>'articleId', 'where'=>"LOWER(fileName)=LOWER('$article[fileName]')"))) $errors['fileNameExists'] = true;
    	} else {
    		if(dbQuery('articles', DB_VALUE, array('fields'=>'articleId', 'where'=>"articleId<>'$article[articleId]' AND LOWER(fileName)=LOWER('$article[fileName]')"))) $errors['fileNameExists'] = true;
    	}
    	if(preg_match('/^(page\d+|index)$/i', $article['fileName'])) die('This filename is prohibited. Enter another filename.');
    	if(preg_match('/[^0-9a-zA-Z\-_\.]/i', $article['fileName'])) die('Filename may contain only these characters: A-Z a-z 0-9 . , - _ ( ) space. .');
    
    	if(empty($article['articleId'])){
    		/* new article */
    		$article['addedBy']      = $adminUser['userId'];
    		$article['addedOn']      = gmdate('Y-m-d H:i:s');
    		$article['modifiedBy']   = $adminUser['userId'];
    		$article['modifiedOn']   = gmdate('Y-m-d H:i:s');
    	} elseif($oldArticle = dbQuery('articles', DB_ARRAY, array('where'=>"articleId='$article[articleId]'"))) {
    		/* updated article */
    		$article['addedBy']      = $oldArticle['addedBy'];
    		$article['addedOn']      = $oldArticle['addedOn'];
    		$article['modifiedBy']   = $adminUser['userId'];
    		$article['modifiedOn']   = gmdate('Y-m-d H:i:s');
    
    		/* getting article images */
    		$images = dbQuery('article_images', DB_ARRAYS, array('where'=>"articleId='$oldArticle[articleId]'"));
    		foreach($images as $image){
    			if(!empty($image['codename'])){
    				if(empty($article['images'])) $article['images'] = array();
    				$article['images'][$image['codename']] = $image;
    			} else {
    				if(empty($article['gallery'])) $article['gallery'] = array();
    				$article['gallery'][] = $image;
    			}
    		}
    	} else {
    		/* I don't know, why we are here, but it doesn't matter */
    		$article['addedBy']      = $adminUser['userId'];
    		$article['addedOn']      = gmdate('Y-m-d H:i:s');
    		$article['modifiedBy']   = $adminUser['userId'];
    		$article['modifiedOn']   = gmdate('Y-m-d H:i:s');
    	}
    
    	$article['addedOn']     = adjustTime($article['addedOn']);
    	$article['modifiedOn']  = adjustTime($article['modifiedOn']);
    	$article['publishedOn'] = "$article[Year]-$article[Month]-$article[Day] $article[Hour]:$article[Minute]:00";
    	if(!empty($article['Meridian'])) $article['publishedOn'] .= " $article[Meridian]";
    	$article['publishedOn'] = date('Y-m-d H:i:s', strtotime($article['publishedOn']));
    
    	/* getting info about users who created and modified the article */
    	$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$article[addedBy]', '$article[modifiedBy]')", 'indexKey'=>'userId', 'fields'=>'userId, fullName, loginName, email, accessLevel'));
    	$article['addedBy'] = empty($users[$article['addedBy']]) ? unknownUser() : $users[$article['addedBy']];
    	$article['modifiedBy'] = empty($users[$article['modifiedBy']]) ? unknownUser() : $users[$article['modifiedBy']];
    
    	/* adding info about parent sections */
    	#if(!empty($article['sectionId'])) $article['parents'] = getSectionParents($article['sectionId']);
    
    	/* saving article image */
    	if(!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    		$article['images'] = createThumbnails($_FILES['image']['tmp_name'], 0);
    	}
        
    	$article['url'] = $SECTIONS[$article['sectionId']]['path'].'/'.$article['fileName'].'.'.$config['file_extension'];
    
    	return $article;
    }
    
    /**
     * @param $path
     * @param $content
     * @return bool
     */
    function saveFile($path, $content){
    	if($fh = fopen($path, 'wb')){
    		fwrite($fh, $content);
    		fclose($fh);
    		return true;
    	}
    	return false;
    }
    
    /**
     * @param $path
     * @param string $pattern
     * @return array
     */
    function searchDir($path, $pattern = '*.*'){
    	$files = array();
    	$dh = opendir($path);
    	$pattern = preg_quote($pattern);
    	$pattern = str_replace('\\*', '.*?', $pattern);
    	while($file = readdir($dh)) if(preg_match("/^$pattern$/i", $file) && $file != '.' && $file != '..') $files[] = $file;
    	sort($files);
    	closedir($dh);
    	return $files;
    }

function xcopy($source, $dest, $permissions = 0755)
{
    // Check for symlinks / Проверяет на символические ссылки
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file / Простая копия для файла
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory / Сделать каталог назначения
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder / Цикл по папке
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers / Пропускаем указатели
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories / Углубленные копии каталогов
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    // Clean up
    $dir->close();
    return true;
}

/**
 * @param $fileName
 * @param int $folder
 * @param string $id
 * @return bool
 */
function createFiles($fileName, $folder, $id){
    global $config, $smarty;

    if (empty($id)) {
        $rawDir = tmpDirName(SITE_ROOT."/uploads/$folder/");
        $destDir = SITE_ROOT."/uploads/$folder/".$rawDir;
    } else {
        $rawDir  = $id;
        $destDir = SITE_ROOT."/uploads/$folder/".$rawDir;
    }
    if(!is_dir($destDir) && !@mkdir($destDir)) return false;
    $smarty->assign('imageDir', $destDir);

    $ext = preg_replace('/^.*\./', '', $fileName['name']);

    xcopy($fileName['tmp_name'], "$destDir/".$fileName['name']);

    $files = array(
        'fileName'  => $fileName['name'],
        'size'      => $fileName['size'],
        'type'      => $fileName['type'],
        'ext'       => $ext,
        'url'       => SITE_URL."/uploads/$folder/$rawDir/".$fileName['name'],
    );
    if ($folder == 'sections') $files['sectionId'] = $id;
    if ($folder == 'articles') $files['articleId'] = $id;

    return $files;
}

    /**
     * @param $fileName
     * @param int $articleId
     * @param string $alt
     * @param string $origFileName
     * @return bool
     */
    function createThumbnails($fileName, $extension, $articleId = 0, $alt = '', $origFileName = ''){
    	global $config, $smarty;
        //print_r($extension);
    	/* get image info */
    	$image = getimagesize($fileName);
    	if(empty($image) || $image[2] > 3 || $image[2] < 1) return false;
    
    	/* if keeping original image name */
    	if($config['keep_original_image_name']) $imageName = pregGetValue('/([^\/]+)\.[^\.]+$/', $origFileName);
    	if(empty($imageName)) $imageName = 'article';
    
    	if(empty($articleId)){
    		$rawDir = tmpDirName(SITE_ROOT."/uploads/articles/");
    		$destDir = SITE_ROOT."/uploads/articles/".$rawDir;
    	} else {
    		$rawDir = $articleId;
    		$destDir = SITE_ROOT."/uploads/articles/".$rawDir;
    	}
    	if(!is_dir($destDir) && !@mkdir($destDir)) return false;
    	$smarty->assign('imageDir', $destDir);
    	
    	foreach(array('small', 'medium') as $size){
    		$images[$size] = array();
    		$images[$size]['articleId'] = $articleId;
    		$images[$size]['fileName'] = $imageName."-$size.$extension";
    		$thumb = createThumbnail($fileName, $config[$size.'_thumb_width'], $config[$size.'_thumb_height'], "$destDir/".$images[$size]['fileName'], $config['thumbnail_quality'] );
    		$images[$size]['alt'] = $size;
    		//$images[$size]['width']  = imagesx($thumb);
    		//$images[$size]['height'] = imagesy($thumb);
    		$images[$size]['url'] = SITE_URL."/uploads/articles/$rawDir/".$images[$size]['fileName'];
    		$images[$size]['codename'] = $size;
    	}
    	/* saving original image */
    	if($config['save_original_image']){
    		$images['original'] = array();
    		$images['original']['articleId'] = $articleId;
    		$extensions = array(1=>'gif', 2=>'jpg', 3=>'png');
    		$images['original']['fileName'] = $imageName.'-original.'.$extensions[$image[2]];
    		copy($fileName, "$destDir/".$images['original']['fileName']);
    		$images['original']['alt'] = $alt;
    		$images['original']['width']  = $image[0];
    		$images['original']['height'] = $image[1];
    		$images['original']['url'] = SITE_URL."/uploads/articles/$rawDir/".$images['original']['fileName'];
    		$images['original']['codename'] = 'original';
    	}
    	@unlink($fileName);
    	return $images;
    }
    
    /**
     * @param $fileName
     * @param int $sliderId
     * @param string $alt
     * @param string $origFileName
     * @return bool
     */
    function createThumbnailsSlider($fileName, $extension, $sliderId = 0, $alt = '', $origFileName = ''){
    	global $config, $smarty;
    
    	/* get image info */
    	$image = getimagesize($fileName);
    	if(empty($image) || $image[2] > 3 || $image[2] < 1) return false;
    
    	/* if keeping original image name */
    	if($config['keep_original_image_name']) $imageName = pregGetValue('/([^\/]+)\.[^\.]+$/', $origFileName);
    	if(empty($imageName)) $imageName = '';
    
    	if(empty($sliderId)){
    		$rawDir = tmpDirName(SITE_ROOT."/uploads/sliders");
    		$destDir = SITE_ROOT."/uploads/sliders/".$rawDir;
    	} else {
    		$rawDir = $sliderId;
    		$destDir = SITE_ROOT."/uploads/sliders/$sliderId";
    	}
    	if(!is_dir($destDir) && !@mkdir($destDir)) return false;
    	$smarty->assign('imageDir', $destDir);
    	/* saving thumbnails */
    	foreach(array('medium') as $size){
    		$images[$size] = array();
    		$images[$size]['sliderId'] = $sliderId;
    		$images[$size]['fileName'] = $imageName."$size.$extension";
    		$thumb = createThumbnail($fileName, $config[$size.'_thumb_width'], $config[$size.'_thumb_height'], "$destDir/".$images[$size]['fileName'], $config['thumbnail_quality'] );
    		$images[$size]['alt'] = $alt;
    		//$images[$size]['width']  = imagesx($thumb);
    		//$images[$size]['height'] = imagesy($thumb);
    		$images[$size]['url'] = SITE_URL."/uploads/sliders/$rawDir/".$images[$size]['fileName'];
    		$images[$size]['codename'] = $size;
    	}
    	/* saving original image */
    	$images['original'] = array();
    	$images['original']['sliderId'] = $sliderId;
    	$extensions = array(1=>'gif', 2=>'jpg', 3=>'png');
    	$images['original']['fileName'] = $imageName.'original.'.$extensions[$image[2]];
    	copy($fileName, "$destDir/".$images['original']['fileName']);
    	$images['original']['alt'] = $alt;
    	$images['original']['width']  = $image[0];
    	$images['original']['height'] = $image[1];
    	$images['original']['url'] = SITE_URL."/uploads/sliders/$rawDir/".$images['original']['fileName'];
    	$images['original']['codename'] = 'original';
    	@unlink($fileName);
    	return $images;
    }
    
    /**
     * @param $fileName
     * @param int $userId
     * @param string $alt
     * @param string $origFileName
     * @return bool
     */
    function createAvatars($fileName, $extension, $userId = 0, $alt = '', $origFileName = ''){
    	global $config, $smarty;
    
    	$image = getimagesize($fileName);
    	if(empty($image) || $image[2] > 3 || $image[2] < 1) return false;
    
    	/* if keeping original image name */
    	if($config['keep_original_image_name']) $imageName = pregGetValue('/([^\/]+)\.[^\.]+$/', $origFileName);
    	if(empty($imageName)) $imageName = 'user';
    
    	if(empty($userId)){
    		$rawDir = tmpDirName(SITE_ROOT."/admin/avatar");
    		$destDir = SITE_ROOT."/admin/avatar/".$rawDir;
    	} else {
    		$rawDir = $userId;
    		$destDir = SITE_ROOT."/admin/avatar/$userId";
    	}
    	if(!is_dir($destDir) && !@mkdir($destDir)) return false;
    	$smarty->assign('imageDir', $destDir);
    	/* saving thumbnails */
    	foreach(array('medium') as $size){
    		$images[$size] = array();
    		$images[$size]['userId'] = $userId;
    		$images[$size]['fileName'] = $imageName."-$size.$extension";
    		$thumb = createThumbnail($fileName, $config[$size.'_thumb_width'], $config[$size.'_thumb_height'], "$destDir/".$images[$size]['fileName'], $config['thumbnail_quality']);
    		$images[$size]['alt'] = $alt;
    		//$images[$size]['width']  = imagesx($thumb);
    		//$images[$size]['height'] = imagesy($thumb);
    		$images[$size]['url'] = SITE_URL."/admin/avatar/$rawDir/".$images[$size]['fileName'];
    		$images[$size]['codename'] = $size;
    	}
    	/* saving original image */
    	if($config['save_original_image']){
    		$images['original'] = array();
    		$images['original']['userId'] = $userId;
    		$extensions = array(1=>'gif', 2=>'jpg', 3=>'png');
    		$images['original']['fileName'] = $imageName.'-original.'.$extensions[$image[2]];
    		copy($fileName, "$destDir/".$images['original']['fileName']);
    		$images['original']['alt'] = $alt;
    		$images['original']['width']  = $image[0];
    		$images['original']['height'] = $image[1];
    		$images['original']['url'] = SITE_URL."/admin/avatar/$rawDir/".$images['original']['fileName'];
    		$images['original']['codename'] = 'original';
    	}
    	@unlink($fileName);
    	return $images;
    }
    
    
    /**
     * @param $fileName
     * @param int $userId
     * @param string $alt
     * @param string $origFileName
     * @return bool
     */
    function createCustomerImage($fileName, $extension, $userId = 0, $alt = '', $origFileName = ''){
    	global $config, $smarty;
    
    	/* users images*//* get image info */
    	$image = getimagesize($fileName);
    	if(empty($image) || $image[2] > 3 || $image[2] < 1) return false;
    
    	/* if keeping original image name */
    	if($config['keep_original_image_name']) $imageName = pregGetValue('/([^\/]+)\.[^\.]+$/', $origFileName);
    	if(empty($imageName)) $imageName = 'user';
    
    	if(empty($userId)){
    		$rawDir = tmpDirName(SITE_ROOT."/uploads/customers");
    		$destDir = SITE_ROOT."/uploads/customers/".$rawDir;
    	} else {
    		$rawDir = $userId;
    		$destDir = SITE_ROOT."/uploads/customers/$userId";
    	}
    	if(!is_dir($destDir) && !@mkdir($destDir)) return false;
    	$smarty->assign('imageDir', $destDir);
    	/* saving thumbnails */
    	foreach(array('small', 'medium') as $size){
    		$images[$size] = array();
    		$images[$size]['userId'] = $userId;
    		$images[$size]['fileName'] = $imageName."-$size.$extension";
    		$thumb = createThumbnail($fileName, $config[$size.'_thumb_width'], $config[$size.'_thumb_height'], "$destDir/".$images[$size]['fileName'], $config['thumbnail_quality'] );
    		$images[$size]['alt'] = $alt;
    		//$images[$size]['width']  = imagesx($thumb);
    		//$images[$size]['height'] = imagesy($thumb);
    		$images[$size]['url'] = SITE_URL."/uploads/customers/$rawDir/".$images[$size]['fileName'];
    		$images[$size]['codename'] = $size;
    	}
    	/* saving original image */
    	if($config['save_original_image']){
    		$images['original'] = array();
    		$images['original']['userId'] = $userId;
    		$extensions = array(1=>'gif', 2=>'jpg', 3=>'png');
    		$images['original']['fileName'] = $imageName.'-original.'.$extensions[$image[2]];
    		copy($fileName, "$destDir/".$images['original']['fileName']);
    		$images['original']['alt'] = $alt;
    		$images['original']['width']  = $image[0];
    		$images['original']['height'] = $image[1];
    		$images['original']['url'] = SITE_URL."/uploads/customers/$rawDir/".$images['original']['fileName'];
    		$images['original']['codename'] = 'original';
    	}
    	@unlink($fileName);
    	return $images;
    }
    
    /**
     * @param $fileName
     * @param int $sectionId
     * @param string $alt
     * @param string $origFileName
     * @return bool
     */
    function createSectionImages($fileName, $extension, $sectionId = 0, $alt = '', $origFileName = ''){
    	global $config, $smarty;
    	//print_r($extension);
    	/* section images*//* get image info */
    	$image = getimagesize($fileName);
    	if(empty($image) || $image[2] > 3 || $image[2] < 1) return false;
    
    	/* если держать оригинальное название изображения */
    	if($config['keep_original_image_name']) $imageName = pregGetValue('/([^\/]+)\.[^\.]+$/', $origFileName);
    	if(empty($imageName)) $imageName = '';
    
    	if(empty($sectionId)){
    		$rawDir = tmpDirName(SITE_ROOT."/uploads/sections");
    		$destDir = SITE_ROOT."/uploads/sections/".$rawDir;
    	} else {
    		$rawDir = $sectionId;
    		$destDir = SITE_ROOT."/uploads/sections/$sectionId";
    	}
    	if(!is_dir($destDir) && !@mkdir($destDir)) return false;
    	$smarty->assign('imageDir', $destDir);
    	
    	foreach(array('small', 'medium') as $size){
    		$images[$size] = array();
    		$images[$size]['sectionId'] = $sectionId;
    		$images[$size]['fileName']  = "$size.$extension";

    		$thumb = createThumbnail( $fileName, $config[$size.'_thumb_width'], $config[$size.'_thumb_height'], "$destDir/".$images[$size]['fileName'], $config['thumbnail_quality'] );
           // print_r($thumb);
    		$images[$size]['alt']      = $size;
    		//$images[$size]['width']    = @imagesx($thumb);
    		//$images[$size]['height']   = @imagesy($thumb);
    		$images[$size]['url']      = SITE_URL."/uploads/sections/$rawDir/".$images[$size]['fileName'];
    		$images[$size]['codename'] = $size;
    	}
    	/* saving original image */
    	if($config['save_original_image']){
    		$images['original'] = array();
    		$images['original']['sectionId'] = $sectionId;
    		$extensions = array(1=>'gif', 2=>'jpg', 3=>'png');
    		$images['original']['fileName'] = 'original.'.$extensions[$image[2]];
    		copy($fileName, "$destDir/".$images['original']['fileName']);
    		//$images['original']['alt'] = $alt;
    		$images['original']['width']  = $image[0];
    		$images['original']['height'] = $image[1];
    		$images['original']['url'] = SITE_URL."/uploads/sections/$rawDir/".$images['original']['fileName'];
    		$images['original']['codename'] = 'original';
    	}

    	@unlink($fileName);
    	return $images;
    }
    
    /**
     * @param $fileName
     * @param $logo
     * @param $file_name
     * @param $move_folder
     * @param string $origFileName
     * @return bool
     */
    function replacelogo($fileName, $logo, $file_name, $move_folder, $origFileName = ''){
    	global $config, $smarty;
    
    	/* get image info */
    	$image = getimagesize($fileName);
    
    	/* if keeping original image name */
    	if($config['keep_original_image_name']) $imageName = pregGetValue('/([^\/]+)\.[^\.]+$/', $origFileName);
    	if(empty($imageName)) $imageName = '';
    
    	if(empty($logo)){
    		$rawDir = tmpDirName($move_folder);
    		$destDir = $move_folder;
    	} else {
    		$destDir = $move_folder;
    	}
    	if(!is_dir($destDir) && !@mkdir($destDir)) return false;
    	$smarty->assign('imageDir', $destDir);
    	/* saving thumbnails */
    
    	/* saving original image */
    	if($config['save_original_image']){
    		$images['original'] = array();
    		$extensions = array(1=>'gif', 2=>'jpg', 3=>'png');
    		$images['original']['fileName'] = $imageName.'logo.'.$extensions[$image[2]];
    		copy($fileName, "$destDir/".$images['original']['fileName']);
    		$images['original']['width']  = $image[0];
    		$images['original']['height'] = $image[1];
    		$images['original']['url'] = SITE_URL."/images/".$images['original']['fileName'];
    	}
    	//d($images);
    	@unlink($fileName);
    	return $images;
    }
    
    /**
     * @return array
     */
    function getAllowedSections(){
    	global $adminUser, $SECTIONS;
    	$allowedSections = array();
    	if (empty($adminUser['sectionRights'])) return array();
    	foreach ($adminUser['sectionRights'] as $sectionId) if (!empty($SECTIONS[$sectionId])) {
    		$allowedSections[] = $sectionId;
    		if (!empty($SECTIONS[$sectionId]['allChildren'])) $allowedSections = array_merge($allowedSections, $SECTIONS[$sectionId]['allChildren']);
    	}
    	return $allowedSections;
    }
    
    /**
     * @param int $skipId
     * @param int $maxDepth
     * @param string $prefix
     * @param string $separator
     * @param string $productType
     * @return array
     */
    function getSectionOptions($skipId = 0, $maxDepth = 99, $prefix = '', $separator = ' -- '){
    	global $config, $TREE, $SECTIONS, $adminUser;
    
    	if(empty($SECTIONS)) return array();
    	if(empty($adminUser['permitAllSections']) && !($allowedSections = getAllowedSections())) return array();
    
    	$skipChildren = array();
    	$options = array(0 => '');
    	foreach($SECTIONS as $section){
            if($section['type'] == 'plain') continue;
    		if($section['sectionId'] == $skipId){
    			if(!empty($section['allChildren'])) $skipChildren = $section['allChildren'];
    			continue;
    		}
    		if(in_array($section['sectionId'], $skipChildren)) continue;
    		if(empty($adminUser['permitAllSections']) && !in_array($section['sectionId'], $allowedSections)) continue;
    		if($section['level'] > $maxDepth) continue;
    
    		$option = '';
    		if(!empty($section['parents'])) foreach($section['parents'] as $parentId){
    			if(!empty($SECTIONS[$parentId])) $option .= $SECTIONS[$parentId]['name'].$separator;
    		}
    		$option .= $section['name'];
    		$options[$section['sectionId']] = $option;
    	}
    
    	if(count($options) == 1) return array();
    
    	return $options;
    }
    
    /**
     * @param int $skipId
     * @param string $type_content
     * @param int $maxDepth
     * @param string $prefix
     * @param string $separator
     * @return array
     */
    function getSectionContent($skipId = 0, $type_content, $maxDepth = 99, $prefix = '', $separator = ' :: '){
        global $config, $TREE, $SECTIONS, $adminUser;
    
        if(empty($SECTIONS)) return array();
        if(empty($adminUser['permitAllSections']) && !($allowedSections = getAllowedSections())) return array();
    
        $skipChildren = array();
        $options = array(0 => '');
        foreach($SECTIONS as $section){
            if($section['sectionId'] == $skipId || $section['type_content'] != $type_content){
                if(!empty($section['allChildren'])) $skipChildren = $section['allChildren'];
                continue;
            }
            if(in_array($section['sectionId'], $skipChildren)) continue;
            if(empty($adminUser['permitAllSections']) && !in_array($section['sectionId'], $allowedSections)) continue;
            if($section['level'] > $maxDepth) continue;
    
            $option = '';
            if(!empty($section['parents'])) foreach($section['parents'] as $parentId){
                if(!empty($SECTIONS[$parentId])) $option .=  $SECTIONS[$parentId]['name'].$separator;
            }
            $option .= $section['name'];
            $options[$section['sectionId']] = $option;
        }
    
        if(count($options) == 1) return array();
    
        return $options;
    }
    
	
    /**
     * @param array $buildLang
     * @return bool
     */
    function buildSectionArrays($buildLang = array()){
    	global $SECTIONS, $TREE, $config, $mysqli;
        
    	/* section path */
    	if(empty($buildLang)){
    		$SECTION_PATH = SITE_URL;
    	} else {
    		$SECTION_PATH = ($buildLang['isDefault'] ? GLOBAL_URL : GLOBAL_URL.'/'.$buildLang['codename']);
    	}
    
    	/* retrieve all sections */
    	
    	$SECTIONS = dbQuery('sections', DB_ARRAYS, array('indexKey'=>'sectionId', 'order'=>'parentId, sortOrder'));
    
    	/* find all parent sections */
    	foreach($SECTIONS as $sectionId=>$section){
    		$SECTIONS[$sectionId]['parents'] = array_reverse(getAllParents($sectionId));
    		$SECTIONS[$sectionId]['childLevels'] = 0;
    		/* section level */
    		$SECTIONS[$sectionId]['level'] = count($SECTIONS[$sectionId]['parents']) + 1;
    		unset($SECTIONS[$sectionId]['content']);
    		unset($SECTIONS[$sectionId]['code_maps']);
    	}
        
    	foreach($SECTIONS as $sectionId=>$section){
    
    		$SECTIONS[$sectionId]['path'] = $SECTION_PATH;
    		if(!empty($section['parents'])){
    			/* find child sections */
    			$SECTIONS[$section['parents'][(count($section['parents'])-1)]]['children'][] = $sectionId;
    
    			/* find all child sections (including children of children) */
    			/* build path and url */
    			/* count child levels */
    			foreach($section['parents'] as $parentId){
    
    				/* if templateName is empty, look through parents for subTemplateName */
    				if(empty($section['templateName']) && !empty($SECTIONS[$parentId]['subTemplateName'])){
    					$section['templateName'] = $SECTIONS[$sectionId]['templateName'] = $SECTIONS[$parentId]['subTemplateName'];
    				}
    
    				/* if subTemplateName is empty, look through parents for subTemplateName */
    				if(empty($section['subTemplateName']) && !empty($SECTIONS[$parentId]['subTemplateName'])){
    					$section['subTemplateName'] = $SECTIONS[$sectionId]['subTemplateName'] = $SECTIONS[$parentId]['subTemplateName'];
    				}
    
    				/* if artTemplateName is empty, look through parents for artTemplateName */
    				if(empty($section['artTemplateName']) && !empty($SECTIONS[$parentId]['artTemplateName'])){
    					$section['artTemplateName'] = $SECTIONS[$sectionId]['artTemplateName'] = $SECTIONS[$parentId]['artTemplateName'];
    				}
    
    				/* if isCached is 0 (use default), look through parents for subIsCached */
    				if($section['isCached'] == 0 && $SECTIONS[$parentId]['subIsCached'] != 0){
    					if($SECTIONS[$parentId]['subIsCached'] == 1){
    						$section['isCached']    = $SECTIONS[$sectionId]['isCached']    = $SECTIONS[$parentId]['subIsCached'];
    						$section['cacheTime']   = $SECTIONS[$sectionId]['cacheTime']   = $SECTIONS[$parentId]['subCacheTime'];
    						$section['cachePeriod'] = $SECTIONS[$sectionId]['cachePeriod'] = $SECTIONS[$parentId]['subCachePeriod'];
    					} elseif($SECTIONS[$parentId]['subIsCached'] == -1) {
    						$section['isCached'] = $SECTIONS[$sectionId]['isCached'] = -1;
    					}
    				}
    
    				/* if artIsCached is 0 (use default), look through parents for artIsCached */
    				if($section['artIsCached'] == 0 && $SECTIONS[$parentId]['artIsCached'] != 0){
    					if($SECTIONS[$parentId]['artIsCached'] == 1){
    						$section['artIsCached']    = $SECTIONS[$sectionId]['artIsCached']    = $SECTIONS[$parentId]['artIsCached'];
    						$section['artCacheTime']   = $SECTIONS[$sectionId]['artCacheTime']   = $SECTIONS[$parentId]['artCacheTime'];
    						$section['artCachePeriod'] = $SECTIONS[$sectionId]['artCachePeriod'] = $SECTIONS[$parentId]['artCachePeriod'];
    					} elseif($SECTIONS[$parentId]['artIsCached'] == -1) {
    						$section['artIsCached'] = $SECTIONS[$sectionId]['artIsCached'] = -1;
    					}
    				}
    
    				/* if commentsEnabled is 0 (use default), look through parents for subCommentsEnabled */
    				if($section['commentsEnabled'] == 0 && $SECTIONS[$parentId]['subCommentsEnabled'] != 0){
    					if($SECTIONS[$parentId]['subCommentsEnabled'] == 1){
    						$section['commentsEnabled'] = $SECTIONS[$sectionId]['commentsEnabled'] = $SECTIONS[$parentId]['subCommentsEnabled'];
    					} elseif($SECTIONS[$parentId]['subCommentsEnabled'] == -1) {
    						$section['commentsEnabled'] = $SECTIONS[$sectionId]['commentsEnabled'] = -1;
    					}
    				}
    
    				$SECTIONS[$parentId]['allChildren'][] = $sectionId;
    				$SECTIONS[$sectionId]['path'] .= '/'.$SECTIONS[$parentId]['fileName'];
    				if(empty($SECTIONS[$sectionId]['dir'])){
    					$SECTIONS[$sectionId]['dir'] = $SECTIONS[$parentId]['fileName'];
    				} else {
    					$SECTIONS[$sectionId]['dir'] .= '/'.$SECTIONS[$parentId]['fileName'];
    				}
    				if($SECTIONS[$parentId]['childLevels'] < ($section['level'] - $SECTIONS[$parentId]['level'])){
    					$SECTIONS[$parentId]['childLevels'] = $section['level'] - $SECTIONS[$parentId]['level'];
    				}
    			}
    		}
    
    		if(empty($SECTIONS[$sectionId]['dir'])){
    			$SECTIONS[$sectionId]['dir'] = $section['fileName'];
    		} else {
    			$SECTIONS[$sectionId]['dir'] .= '/'.$section['fileName'];
    		}
    		$SECTIONS[$sectionId]['path'] .= '/'.$section['fileName'];
    		if($section['type'] == 'plain'){
    			if($section['fileName'] == 'index'){
    				$tmpUrl = $SECTION_PATH.'/';
    			} else {
    				$tmpUrl = $SECTIONS[$sectionId]['path'].'.'.$config['file_extension'];
    			}
    		} else {
    			$tmpUrl = $SECTIONS[$sectionId]['path'].'/';
    		}
    		if($SECTIONS[$sectionId]['url'] != $tmpUrl){
    			$SECTIONS[$sectionId]['url'] = $tmpUrl;
    			dbQuery('sections', DB_UPDATE, array('where'=>"sectionId='$sectionId'", 'values'=>array('url'=>mysqli_real_escape_string($mysqli, $tmpUrl))));
    			dbQuery('articles', DB_UPDATE, array('where'=>"sectionId='$sectionId'", 'values'=>"url=CONCAT('".mysqli_real_escape_string($mysqli, $SECTIONS[$sectionId]['path'])."', '/', fileName, '.".mysqli_real_escape_string($mysqli, $config['file_extension'])."')"));
    		}
    	}
    
    	/* building section tree */
    	$TREE = array_reverse($SECTIONS, true);
    	foreach($TREE as $sectionId=>$section){
    		if(empty($section['hasSubsections'])) $TREE[$sectionId]['hasSubsections'] = false;
    		if($section['parentId'] > 0){
    			$TREE[$section['parentId']]['hasSubsections'] = true;
    			$TREE[$section['parentId']]['subsections'][] = $TREE[$sectionId];
    		}
    	}
    
    	/* cutting sections-subsections */
    	foreach($TREE as $sectionId=>$section) if ($section['parentId'] > 0) unset($TREE[$sectionId]);
    
    	/* sort the Tree recursively by sortOrder */
    	usort($TREE, 'sortBySortOrder');
    
    	/* sort SECTIONS by order of TREE */
    	$newSections = array();
    	sortAllSections($TREE, $newSections);
    	$SECTIONS = $newSections;
    
    	return true;
    }
    
    /**
     * @param $sections
     * @param $newSections
     */
    function sortAllSections($sections, &$newSections){
    	global $SECTIONS;
    	foreach($sections as $section){
    		$newSections[$section['sectionId']] = $SECTIONS[$section['sectionId']];
    		if(!empty($section['subsections'])) sortAllSections($section['subsections'], $newSections);
    	}
    }
    
    /**
     * @param $sectionId
     * @param array $parents
     * @return array
     */
    function getAllParents($sectionId, $parents = array()){
    	global $SECTIONS;
    	if($SECTIONS[$sectionId]['parentId'] > 0){
    		$parents[] = $SECTIONS[$sectionId]['parentId'];
    		$parents = getAllParents($SECTIONS[$sectionId]['parentId'], $parents);
    	}
    	return $parents;
    }
    
    
    /**
     *
     */
    function typeContents(){
        global $typeContents;
        if ($typesContents = dbQuery('sections', DB_ARRAYS, array('fields'=>'type_content', 'indexKey'=>'type_content'))){
        	foreach($typesContents as $i=>$typesContent){
          	if ($typesContent['type_content'] != ''){
            	$typesContentIndexes[$typesContent['type_content']] = $i;
            	$typesContentIndexes[$typesContent['type_content']] = lang('sections:typeContents:'.$typesContents[$i]['type_content']);
        	    $typeContents = $typesContentIndexes;    
    
        	  }
        	}
      	}
      	return $typeContents;
	}


    /**
     * @param $a
     * @param $b
     * @return int
     */
    function sortBySortOrder(&$a, &$b){
    	if(!empty($a['subsections'])) usort($a['subsections'], 'sortBySortOrder');
    	if(!empty($b['subsections'])) usort($b['subsections'], 'sortBySortOrder');
    	if ($a == $b) return 0;
    	return ($a['sortOrder'] < $b['sortOrder']) ? -1 : 1;
    }
    
    
    /**
     * @param array $buildLang
     * @return bool
     */
    function writeHtaccess($buildLang = array()){
    	global $smarty, $SECTIONS;
    
    	$rewrite = md5(rand() * time());
    
    	$tmpSmarty = new Smarty;
    	$tmpSmarty->template_dir = $smarty->template_dir;
    	$tmpSmarty->cache_dir    = $smarty->cache_dir;
    	$tmpSmarty->compile_dir  = $smarty->compile_dir;
    	$tmpSmarty->compile_id   = $smarty->compile_id;
    	$tmpSmarty->default_modifiers = $smarty->default_modifiers;
    
    	$smartyTemplateVars = $smarty->getTemplateVars();
    	foreach($smartyTemplateVars as $key=>$value){
    		$tmpSmarty->assign($key, $value);
    	}
    
    	$tmpSmarty->assign('rewrite', $rewrite);
    
    	/* find home page */
    	foreach($SECTIONS as $section){
    		if(empty($homePageId)) $homePageId = $section['sectionId'];
    		if($section['fileName'] == 'index') $homePageId = $section['sectionId'];
    	}
    	if(!empty($homePageId)) $tmpSmarty->assign('homePageId', $homePageId);
    
    	if(empty($buildLang)){
    		$siteRoot    = SITE_ROOT;
    		$htaccessTPL = (SITE_LANG == '' ? 'htaccess.tpl' : 'htaccess-ml.tpl');
    	} else {
    		$tmpSmarty->assign('SITE_LANG', $buildLang['codename']);
    		$siteRoot    = ($buildLang['isDefault'] ? GLOBAL_ROOT : GLOBAL_ROOT.'/'.$buildLang['codename']);
    		$htaccessTPL = ($buildLang['isDefault'] ? 'htaccess.tpl' : 'htaccess-ml.tpl');
    	}
    	$htaccess = $tmpSmarty->fetch(GLOBAL_ROOT . '/admin/templates/' . $htaccessTPL);
    
    
        if($fh = fopen($siteRoot.'/.htaccess', 'w')){
    		fwrite($fh, $htaccess);
    		fclose($fh);
    
    		/* saving seed */
    		$setting['codename'] = 'rewrite';
    		$setting['value'] = $rewrite;
    		dbQuery('settings', DB_REPLACE, array('values' => $setting));
    
    		/* saving settings */
    		saveSettingsArray();
    
    		return true;
    	} else {
    		return false;
    	}
    	unset($tmpSmarty);
    }
    
    /**
     * @return bool
     */
    function saveSettingsArray(){
    	$settings = dbQuery('settings', DB_ARRAYS, array('indexKey'=>'codename', 'valueKey'=>'value'));
    
    	$config = "<?php\r\n";
    	$config .= '$config = '.var_export($settings, true)."\r\n";
    	$config .= "?>";
    
    	saveFile(SITE_ROOT.'/includes/settings-array.inc.php', $config);
    
    	return true;
    }
    
    /**
     * @param $referer
     * @return array
     */
    function parseReferer($referer){
    	global $config;
    	$result = array();
    	if(preg_match('|^http|i', $referer)) $result['refererUrl'] = $referer;
    	if(preg_match('|^http://(www\.)?([^/]+)/.*|i', $referer, $matches)) $result['refererWebsite'] = $matches[2];
    	if(preg_match("/^http.+[\?\&]($config[query_fields])=([^\&]+).*/i", $referer, $matches)){
    		$result['searchPhrase'] = urldecode($matches[2]);
    		if(function_exists('mb_detect_order')){
    			mb_detect_order("UTF-8,$config[charset],ASCII");
    			$encoding = mb_detect_encoding($result['searchPhrase']);
    			$result['searchPhrase'] = ($encoding == 'UTF-8') ? mb_convert_encoding($result['searchPhrase'], $config['charset'], $encoding) : $result['searchPhrase'];
    		}
    	}
    	return $result;
    }
    
    /**
     * @param $dirName
     * @return bool
     */
    function deleteDir($dirName){
    	if(!is_dir($dirName)) return false;
    	$dh = opendir($dirName);
    	while (false !== ($fileName = readdir($dh))) {
    		if($fileName != '.' && $fileName != '..'){
    			$fileName = "$dirName/$fileName";
    			if(is_dir($fileName)){
    				deleteDir($fileName);
    			} else {
    				@unlink($fileName);
    			}
    		}
    	}
    	closedir($dh);
    	@rmdir($dirName);
    }
    
    /**
     * @param $destination
     * @return bool
     */
    function deleteOldTmpDirs($destination){
    	$d = dir($destination);
    	while (false !== ($entry = $d->read())) if(preg_match('/tmp\-\w+\-\d+/', $entry)) {
    		$oldTime = substr(strrchr($entry, "-"), 1);
    		if(time() - $oldTime > 5 * 60 * 60) deleteDir("$destination/$entry");
    	}
    	$d->close();
    	return true;
    }
    
    /**
     * @param $destination
     * @return string
     */
    function tmpDirName($destination){
    	$d = dir($destination);
    	while (false !== ($entry = $d->read())) {
    		if(strstr($entry, "tmp-".session_id())){
    			$d->close();
    			return $entry;
    		}
    	}
    	$d->close();
    	return "tmp-".session_id()."-".time();
    }
    
    /**
     * @param $destination
     * @return bool
     */
    function deleteIfEmpty($destination){
    	if(!is_dir($destination)) return false;
    	$d = dir($destination);
    	while (false !== ($entry = $d->read())) {
    		if(is_file("$destination/$entry")) return false;
    	}
    	$d->close();
    	@rmdir($destination);
    	return true;
    }
    
    /**
     * @param $srcname исходный файл
     * @param $maxw максимальная ширина
     * @param $maxh максимальная высота
     * @param $destname файл с результатом
     * @param int $quality качество
     * @return bool|resource
     */


/*

    function createThumbnail($srcname, $maxw, $maxh, $destname, $quality = 75){
    	
    	list($srcw, $srch, $type) = @getimagesize($srcname);

        switch ($type){
    		case 1: 
                if(function_exists('ImageCreateFromGIF'))  $oldimg = ImageCreateFromGIF($srcname); 
    		    break;
    		case 2: 
    		    if(function_exists('ImageCreateFromJPEG')) $oldimg = ImageCreateFromJPEG($srcname);
                break;
    		case 3: 
    		    if(function_exists('ImageCreateFromPNG')) $oldimg = ImageCreateFromPNG($srcname); 
    		    break;
    	}
    
		
    	if(empty($oldimg)) return false;
    
    	$dstw = $srcw;
    	$dsth = $srch;
    
    	if($dstw > $maxw){
    		$dstw = $maxw;
    		$dsth = round($srch * $maxw / $srcw);
    	}
    	if($dsth > $maxh){
    		$dsth = $maxh;
    		$dstw = round($srcw * $maxh / $srch);
    	}
    
    	if(function_exists('ImageCreateTrueColor')) {
    		$newimg = ImageCreateTrueColor($dstw, $dsth);
    	} else {
    		$newimg = ImageCreate($dstw, $dsth);
    	}
    
    	if(function_exists('ImageInterlace')) ImageInterlace($newimg, 1);
    
    	$tidx = imagecolortransparent($oldimg);
    	if($tidx > -1){
    		$tclr = @imagecolorsforindex($oldimg, $tidx);
    		ImageFilledRectangle($newimg, 0, 0, $srcw, $srch, ImageColorAllocate($newimg, $tclr['red'], $tclr['blue'], $tclr['green']));
    	}
    
    	if(function_exists('ImageCopyResampled')) {
    		ImageCopyResampled($newimg, $oldimg, 0, 0, 0, 127, $dstw, $dsth, $srcw, $srch);
    	} else {
    		ImageCopyResized($newimg, $oldimg, 0, 0, 0, 127, $dstw, $dsth, $srcw, $srch);
    	}
    
    	$destname = preg_replace('/{width}/', $dstw, $destname);
    	$destname = preg_replace('/{height}/', $dsth, $destname);
    
        print_r($destname);
    	imagejpeg($newimg, $destname, $quality);
    
    	return $newimg;
    }
*/

    function createThumbnail($srcname, $maxw, $maxh, $destname, $quality = 100){
        copy($srcname, $destname);

        list($srcw, $srch, $srctype) = array_values(getimagesize($srcname));
		$srctype = image_type_to_mime_type($srctype);	
		
		list($dstw, $dsth) = calcContrainSize($srcw, $srch, $maxw, $maxh);
	 
		switch ($srctype){
    		case 'image/gif':
    			$oldimg = imageCreateFromGif($srcname);		
    			break;
            case 'image/jpeg':	
    			$oldimg = imageCreateFromJpeg($srcname);		
    			break;
    		case 'image/png':
    			$oldimg = imageCreateFromPng($srcname);					
    			break;
    		default:
    			return false;
		}
		
        if(empty($oldimg)) return false;
        
        $newimg = imagecreatetruecolor(ceil($dstw), ceil($dsth));
    
        if ($srctype == 'image/jpeg'){
           $endereco = imagecreatefromjpeg($destname); 
        }elseif ($srctype == 'image/png')    {
            $endereco = imagecreatefrompng($destname);
            imagealphablending($newimg, false);
            imagesavealpha($newimg, true);
            $transparent = imagecolorallocatealpha($newimg, 255, 255, 255, 127);
            imagefilledrectangle($endereco, 0, 0, $dstw, $dsth, $transparent);
        }elseif ($srctype == 'image/gif')  {
            $endereco = imagecreatefromgif($destname);
        }
        
        imagecopyresampled($newimg, $endereco, 0, 0, 0, 0, ceil($dstw), ceil($dsth), ceil($srcw), ceil($srch));

		if ($srctype === 'image/png'){
			$quality = round(($quality / 100) * 10);
			if ($quality < 1)
				$quality = 1;
			elseif ($quality > 10)
				$quality = 10;
                $quality = 10 - $quality;
		}
        
        //$destname = preg_replace('/{width}/', $dstw, $destname);
    	//$destname = preg_replace('/{height}/', $dsth, $destname);
        
		switch ($srctype){
    		case 'image/jpeg':	
                return imageJpeg($newimg, $destname, $quality);
    		case 'image/gif':
                return imageGif($newimg, $destname, $quality);
    		case 'image/png':
                return imagePng($newimg, $destname, $quality);
    		default:
    			return false;
		}
	}	
    
    /**
	 * Вычисляет размеры изображения, до которых нужно его пропорционально уменьшить, чтобы вписать в квадрат $maxw x $maxh
	 * @param srcw ширина исходного изображения
	 * @param srch высота исходного изображения
	 * @param maxw максимальная ширина
	 * @param maxh максимальная высота
	 * @return array(w, h)
	 */

	function calcContrainSize($srcw, $srch, $maxw = 0, $maxh = 0){
		if($srcw == 0 || $srch == 0)
			return false;
			
		$dstw = $srcw;
		$dsth = $srch;
	
		if($srcw > $maxw && $maxw > 0)
		{
			$dsth = $srch * ($maxw / $srcw);
			$dstw = $maxw;
		}
		if($dsth > $maxh && $maxh > 0)
		{
			$dstw = $dstw * ($maxh / $dsth);
			$dsth = $maxh;
		}
		return array($dstw, $dsth);
	}

	
    /**
     * Функция изменения размера изображения
     * @param $image
     * @param $width
     * @param $height
     * @param $scale
     * @return mixed
     */
    function resizeImage($image, $width, $height, $scale) {
    		
    	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
    	$imageType = image_type_to_mime_type($imageType);
    	
    	$newImageWidth = ceil($width * $scale);
    	$newImageHeight = ceil($height * $scale);
    	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
    	switch($imageType) {
    		case "image/gif":
    			$source=imagecreatefromgif($image); 
    			break;
    	    case "image/pjpeg":
            case "image/jpeg":
    		case "image/jpg":
    			$source=imagecreatefromjpeg($image); 
    			break;
    	    case "image/png":
    		case "image/x-png":
                $source=imagecreatefrompng($image); 
                break;
      	}
    	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
    	
    	switch($imageType) {
    		case "image/gif":
    	  		@imagegif($newImage,$image); 
    			break;
          	case "image/pjpeg":
    		case "image/jpeg":
    		case "image/jpg":
    	  		@imagejpeg($newImage,$image,90); 
    			break;
    		case "image/png":
    		case "image/x-png":
    			@imagepng($newImage,$image);  
    			break;
        }
    	
    	//	chmod($image, 0644);
    	return $image;
    }
    	
    
    /**
     * Функция для получения высоты изображения.
     * @param $image
     * @return mixed
     */
    function getHeight($image) {
    	$sizes = getimagesize($image);
    	$height = $sizes[1];
    	return $height;	
    }
    
    /**
     * Функция для получения ширины изображения
     * @param $image
     * @return mixed
     */
    function getWidth($image) {
    	$sizes = getimagesize($image);
    	$width = $sizes[0];
    	return $width;
    }
    
    /**
     * @param $errno
     * @param $errmsg
     * @param $filename
     * @param $linenum
     * @param $vars
     * @return bool
     */
    function errorHandler($errno, $errmsg, $filename, $linenum, $vars) {
    	// skip error if error reporting level is bigger
    	if(($errno & error_reporting()) != $errno) return false;
    
    	// timestamp for the error entry
    	$dt = gmdate("Y-m-d H:i:s (T)");
    
    	// define an assoc array of error string
    	// in reality the only entries we should
    	// consider are E_WARNING, E_NOTICE, E_USER_ERROR,
    	// E_USER_WARNING and E_USER_NOTICE
    	$errortype = array (
    		E_ERROR           => "Error",
    		E_WARNING         => "Warning",
    		E_PARSE           => "Parsing Error",
    		E_NOTICE          => "Notice",
    		E_CORE_ERROR      => "Core Error",
    		E_CORE_WARNING    => "Core Warning",
    		E_COMPILE_ERROR   => "Compile Error",
    		E_COMPILE_WARNING => "Compile Warning",
    		E_USER_ERROR      => "User Error",
    		E_USER_WARNING    => "User Warning",
    		E_USER_NOTICE     => "User Notice",
    	);
    
    	// set of errors for which a var trace will be saved
    	$user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);
    
    	$err  = "<errorentry>\n";
    	$err .= "\t<datetime>" . $dt . "</datetime>\n";
    	$err .= "\t<errornum>" . $errno . "</errornum>\n";
    	$err .= "\t<errortype>" . $errortype[$errno] . "</errortype>\n";
    	$err .= "\t<errormsg>" . $errmsg . "</errormsg>\n";
    	$err .= "\t<scriptname>" . $filename . "</scriptname>\n";
    	$err .= "\t<scriptlinenum>" . $linenum . "</scriptlinenum>\n";
    
    	#if (in_array($errno, $user_errors)) $err .= "\t<vartrace>" . print_r($vars, true) . "</vartrace>\n";
    	$err .= "</errorentry>\n\n";
    
    	// save to the error log
    	error_log($err, 3, basename($_SERVER['PHP_SELF']).'.err');
    
    	die($errmsg);
    }
    
    /**
     * @param $srcImage
     * @param $destImage
     * @param $waterImage
     * @param $params
     */
    function waterMark($srcImage, $destImage, $waterImage, $params){
    	/**
    	* put watermark on image 
    	* allowed params
        *   $quality: 1 - 100; quality of destination image
    	*	$percentage: 1 - 100; percentage of watermark transforming
    	*	$align: default value is "rightTop" also have can  be  rightBottom, rightTop, leftTop, leftBottom, center
    	**/
    	
    	if(!empty($params)) extract($params);
    	$quality = empty($quality) ? 100 : $quality;
    	$percentage = empty($percentage) ? 20 : $percentage;
    	$align = empty($align) ? 'rightTop' : $align;
    	list($srcW, $srcH, $imageType) = @getimagesize($srcImage);
    	list($waterW, $waterH, $waterImageType) = @getimagesize($waterImage);
    	switch ($waterImageType){
    		case 1: if(function_exists('ImageCreateFromGIF'))  $waterMark = ImageCreateFromGIF($waterImage); break;
    		case 2: if(function_exists('ImageCreateFromJPEG')) $waterMark = ImageCreateFromJPEG($waterImage); break;
    		case 3: if(function_exists('ImageCreateFromPNG'))  $waterMark = ImageCreateFromPNG($waterImage); break;
    	}
    	
    	@$ratioOrig = $srcW/$srcH;
    	@$ratioWaterOrig = $waterW/$waterH;
    		
    	$sR =  @ceil(ABS(($srcW - $waterW) / $ratioWaterOrig));
    	$waterNewW = $srcW -$sR;
    	$waterNewH = @ceil($waterNewW / $ratioWaterOrig);
    	
    	if($waterNewW > $waterW) {
    		$waterNewW = $waterW;
    		$waterNewH = $waterNewW * $ratioWaterOrig;
    	}
    	
    	if($waterNewH > $waterH) {
    		$waterNewH = $waterH;
    		$waterNewW = $waterNewH * $ratioWaterOrig;
    	}
    	
    	
    	if(!empty($align)){
    		switch ($align){
    			case 'rightBottom':
    				$fromX = $srcW - $waterNewW - 10;
    				$fromW = $srcH - $waterNewH - 10;
    			break;
    			case 'rightTop':
    				$fromX = $srcW - $waterNewW - 10;
    				$fromW = 10;
    			break;
    			case 'leftBottom':
    				$fromX = 10;
    				$fromW = $srcH - $waterNewH - 10;
    			break;
    			case 'leftTop':
    				$fromX = 10;
    				$fromW = 10;
    			break;
    			case 'center':
    				$fromX = ceil(($srcW - $waterNewW)/2);
    				$fromW = ceil(($srcH - $waterNewH)/2);
    			break;
    			case 'bottom':
    				$fromX = ceil(($srcW - $waterNewW)/2);
    				$fromW =  $srcH - $waterNewH ;
    			break;
    		}    
    	}
    	switch ($imageType){
    			case 1: if(function_exists('ImageCreateFromGIF'))  $source = ImageCreateFromGIF($srcImage); break;
    			case 2: if(function_exists('ImageCreateFromJPEG')) $source = ImageCreateFromJPEG($srcImage); break;
    			case 3: if(function_exists('ImageCreateFromPNG'))  $source = ImageCreateFromPNG($srcImage); break;
    	}	
    	  
    	if(function_exists('ImageCopyResampled')) {
    		@ImageCopyResampled($source, $waterMark, $fromX, $fromW, 0, 0, $waterNewW, $waterNewH, $waterW, $waterH);
    	} else {
    		@ImageCopyResized($newImage, $waterMark, $fromX, $fromW, 0, 0, $waterNewW, $waterNewH, $waterW, $waterH);
    	}
    	@imagedestroy($waterMark);
    	@imagejpeg($source, $destImage, $quality);
    	@imagedestroy($source);
    	
    }
  
  

?>	
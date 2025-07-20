<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));
	$languageOptions = include('../includes/languages.inc.php');

	$language = arrAddSlashes(getRequestVar('language', '', $noEscape = true));
	$action   = getRequestVar('action');

	if(!empty($action['edit'])){
		
		if(!empty($language['languageId'])){
			
			/* getting info about language */
			$language = dbQuery('languages', DB_ARRAY, array('where'=>"languageId='$language[languageId]'"));

			/* getting info about users who created and modified the language */
			$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$language[addedBy]', '$language[modifiedBy]')", 'indexKey'=>'userId'));
			$language['addedBy']    = empty($users[$language['addedBy']]) ? unknownUser() : $users[$language['addedBy']];
			$language['modifiedBy'] = empty($users[$language['modifiedBy']]) ? unknownUser() : $users[$language['modifiedBy']];
			$language['addedOn']    = langdate(adjustTime($language['addedOn'], false, 'F j, Y H:i'));
			$language['modifiedOn'] = langdate(adjustTime($language['modifiedOn'], false, 'F j, Y H:i'));

			$smarty->assign('language', $language);
			
		} elseif (count($LANGUAGES) > 0){
			
			/* admin languages */
			$adminLangs = getLanguages();
			$smarty->assign('adminLangs', $adminLangs);

			/* charsets */
			include('../includes/charsets.inc.php');
		}
		$smarty->assign('statuses', lang('languages:statuses'));
		$noItems = true;

	} elseif (!empty($action['save'])) {
		
		/* checking fields */
		if (empty($language['languageName'])) $errors['languageName'] = true;
		if (preg_match('/[^a-zA-Z]/', $language['languageName'])) $errors['languageNameCharacters'] = true;

		if (empty($language['languageId'])) {
			
			/* check codename only for new languages */
			$language['codename'] = strtolower(trim($language['codename']));

			if (empty($language['codename'])) {
				$errors['codename'] = true;
			} elseif (empty($language['languageId'])) {
				if (dbQuery('languages', DB_VALUE, array('fields'=>'languageId', 'where'=>"codename='$language[codename]'"))) $errors['codenameExists'] = true;
			} else {
				if (dbQuery('languages', DB_VALUE, array('fields'=>'languageId', 'where'=>"languageId<>'$language[languageId]' AND codename='$language[codename]'"))) $errors['codenameExists'] = true;
			}
			if (preg_match('/[^a-z]/', $language['codename'])) $errors['codenameCharacters'] = true;
		}

		if (empty($errors)) {
			if (empty($language['languageId'])) {
				if (!empty($language['isDefault'])) {
					$language['url'] = SITE_URL;
				} else {
					$language['url'] = SITE_URL."/$language[codename]";
				}

				if (!empty($language['isDefault']) || addLanguage($language)) {
					$language['addedBy']       = $adminUser['userId'];
					$language['addedOn']       = gmdate('Y-m-d H:i:s');
					$language['modifiedBy']    = $adminUser['userId'];
					$language['modifiedOn']    = gmdate('Y-m-d H:i:s');
					$language['sortOrder']     = dbQuery('languages', DB_VALUE, array('fields'=>'MAX(sortOrder)')) + 1;

					if ($language['languageId'] = dbQuery('languages', DB_INSERT, array('values'=>$language))) {
						$messages['saved']     = true;
						writeSortOrders();
						buildLanguagesArray();
					}
				} else {
					$errors['not_saved'] = true;
				}
			} else {
				/********** Updating Entry **********/
				unset($language['url']);
				unset($language['codename']);
				unset($language['isDefault']);
				unset($language['addedBy']);
				unset($language['addedOn']);
				unset($language['sortOrder']);
				$language['modifiedBy'] = $adminUser['userId'];
				$language['modifiedOn'] = gmdate('Y-m-d H:i:s');

				if(dbQuery('languages', DB_UPDATE, array('where'=>"languageId='$language[languageId]'", 'values'=>$language))){
					buildLanguagesArray();
					$messages['saved'] = true;
				} else {
					$errors['not_saved'] = true;
				}
			}
		} else {
			
			/* if there are any errors in fields */
			$smarty->assign('action', array('edit'=>true));
			$smarty->assign('language', $language);
			$smarty->assign('statuses', lang('languages:statuses'));
			$noItems = true;
			
		}
	} elseif(!empty($action['changeDefaultLanguage'])){
		if($language = dbQuery('languages', DB_ARRAY, array('where'=>"languageId='$language[languageId]' AND isDefault=0"))){
			$defaultLaguage = dbQuery('languages', DB_ARRAY, array('where'=>"isDefault=1"));
			swapLanguages($language, $defaultLaguage);
			header('Location: '.GLOBAL_URL.'/admin/languages.php');
			die('Moving to '.GLOBAL_URL.'/admin/languages.php');
		} else {
			$errors['language_not_found'] = true;
		}
	} elseif(!empty($action['confirmDelete'])){
		if($language = dbQuery('languages', DB_ARRAY, array('where'=>"languageId='$language[languageId]'"))){
			if(!empty($language['isDefault']) && count($LANGUAGES) > 1){
				header('Location: languages.php');
				die('Moving to languages.php');
			} else {
				$smarty->assign('language', $language);
				$noItems = true;
			}
		} else {
			$errors['language_not_found'] = true;
		}
	} elseif(!empty($action['delete'])){
		if($language = dbQuery('languages', DB_ARRAY, array('where'=>"languageId='$language[languageId]'"))){

			if(empty($language['isDefault'])) removeLanguage($language);
			dbQuery('languages', DB_DELETE, array('where'=>"languageId='$language[languageId]'"));
			buildLanguagesArray();

			$messages['deleted'] = true;
			$smarty->assign('language', $language);
			$noItems = true;

			header('Location: '.GLOBAL_URL.'/admin/languages.php');
			die('Moving to '.GLOBAL_URL.'/admin/languages.php');
		} else {
			$errors['language_not_found'] = true;
		}
	} elseif(!empty($action['moveUp'])){
		if($language = dbQuery('languages', DB_ARRAY, array('fields'=>'languageId, sortOrder', 'where'=>"languageId='$language[languageId]'"))){
			if($upperLanguage = dbQuery('languages', DB_ARRAY, array('fields'=>'languageId', 'where'=>"sortOrder=$language[sortOrder]-1"))){
				/* updating languages, moving up */
				dbQuery('languages', DB_UPDATE, array('where'=>"languageId='$language[languageId]'", 'values'=>"sortOrder=sortOrder-1"));
				dbQuery('languages', DB_UPDATE, array('where'=>"languageId='$upperLanguage[languageId]'", 'values'=>"sortOrder=sortOrder+1"));
				if(buildLanguagesArray()){
					echo "writeStatus('".lang('languages:messages:2')."');\r\n";
					echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
				} else {
					echo "writeStatus('".lang('languages:errors:8')."', 'aError');\r\n";
					echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
				}
				echo "swapElements('language-$language[languageId]', 'language-$upperLanguage[languageId]', 'language');\r\n";
			} else {
				echo "writeStatus(\"".lang('languages:errors:9')."\", 'aError');\r\n";
				echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
			}
		} else {
			echo "writeStatus(\"".lang('languages:errors:1')."\", 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	} elseif(!empty($action['moveDown'])){
		if($language = dbQuery('languages', DB_ARRAY, array('fields'=>'languageId, sortOrder', 'where'=>"languageId='$language[languageId]'"))){
			if($downLanguage = dbQuery('languages', DB_ARRAY, array('fields'=>'languageId', 'where'=>"sortOrder=$language[sortOrder]+1"))){
				/* updating languages, moving down */
				dbQuery('languages', DB_UPDATE, array('where'=>"languageId='$language[languageId]'", 'values'=>"sortOrder=sortOrder+1"));
				dbQuery('languages', DB_UPDATE, array('where'=>"languageId='$downLanguage[languageId]'", 'values'=>"sortOrder=sortOrder-1"));
				if(buildLanguagesArray()){
					echo "writeStatus('".lang('languages:messages:3')."');\r\n";
					echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
				} else {
					echo "writeStatus('".lang('languages:errors:8')."', 'aError');\r\n";
					echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
				}
				echo "swapElements('language-$downLanguage[languageId]', 'language-$language[languageId]', 'language')";
			} else {
				echo "writeStatus(\"".lang('languages:errors:10')."\", 'aError');\r\n";
				echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
			}
		} else {
			echo "writeStatus(\"".lang('languages:errors:1')."\", 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	/***** CUT FOR DEMO END *****/
	}

	if ((int) dbQuery('languages', DB_VALUE, array('fields'=>'COUNT(*)')) == 0) {
		$action = array();
		$action['toMultilangMode'] = true;
		$noItems = true;
		$smarty->assign('action', $action);
		$smarty->assign('statuses', lang('languages:statuses'));
	}

	if(empty($noItems)){
		$languages = dbQuery('languages', DB_ARRAYS, array('fields'=>'languageId, languageName, codename, url, status, isDefault', 'order'=>'sortOrder'));
		$defaultLanguageOptions = array();
		foreach($languages as $i => $language){
			$languages[$i]['languageTransName'] = lang('languageList:'.$language['codename']);
			$languages[$i]['statusName'] = lang('languages:statuses:'.$language['status']);
			if(!$language['isDefault']) $defaultLanguageOptions[$language['languageId']] = $languages[$i]['languageTransName'];
		}
		$smarty->assign('defaultLanguageOptions', $defaultLanguageOptions);
		$smarty->assign('languages', $languages);
	}

	if (!empty($errors)) $smarty->assign('errors', $errors);
	if (!empty($messages)) $smarty->assign('messages', $messages);

    try {
        $smarty->display('languages.tpl');
    } catch (Exception $e) {
        $e->getMessage();
    }

/***************** FUNCTIONS *****************/
	function writeSortOrders(){
		$languages = dbQuery('languages', DB_ARRAYS, array('fields'=>'languageId, sortOrder', 'order'=>'sortOrder'));
		$sortOrder = 0;
		foreach($languages as $language){
			$sortOrder++;
			if($language['sortOrder'] != $sortOrder){
				dbQuery('languages', DB_UPDATE, array('where'=>"languageId='$language[languageId]'", 'values'=>array('sortOrder'=>$sortOrder)));
			}
		}
	}
	function removeLanguage($language){
		global $tbl, $tablePrefix;

		/* удаляем файлы */
		deleteDir(GLOBAL_ROOT.'/'.$language['codename']);

		/* удаляем таблицы */
		foreach ($tbl as $tableKey => $void) {
			if(!in_array($tableKey, array('languages', 'admin_history', 'banned_ips', 'admin_users', 'admin_user_images', 'subscribe', 'customers', 'customer_images', 'socials', 'maps', 'menu_settings', 'log', 'baskets', 'orders'))){
				/* delete table */
				$tableName = $tablePrefix.$language['codename'].'_'.$tableKey;
				$result = dbRawQuery("DROP TABLE `$tableName`");
			}
		}
	}

    /**
     * @param $language1
     * @param $language2
     * @return bool
     */
	function swapLanguages($language1, $language2){
		global $tbl, $tablePrefix, $DEFAULT_LANG, $mysqli;

		if($language1['isDefault']){
			$dLanguage = $language1;
			$nLanguage = $language2;
		}
		if($language2['isDefault']){
			$dLanguage = $language2;
			$nLanguage = $language1;
		}

		/* turning off the websites */

		/* renaming SQL tables */
		$dLanguage['oldPrefix'] = $tablePrefix;
		$dLanguage['newPrefix'] = $tablePrefix.$dLanguage['codename'].'_';
		$nLanguage['oldPrefix'] = $tablePrefix.$nLanguage['codename'].'_';
		$nLanguage['newPrefix'] = $tablePrefix;
		$tmpPrefix              = $tablePrefix.'tmp_';
		$nLanguage['oldURL'] = mysqli_real_escape_string($mysqli, GLOBAL_URL.'/'.$nLanguage['codename']);
		$nLanguage['newURL'] = mysqli_real_escape_string($mysqli, GLOBAL_URL);
		$dLanguage['oldURL'] = mysqli_real_escape_string($mysqli, GLOBAL_URL);
		$dLanguage['newURL'] = mysqli_real_escape_string($mysqli, GLOBAL_URL.'/'.$dLanguage['codename']);

		foreach($tbl as $tableKey => $void){
			if(!in_array($tableKey, array('languages', 'admin_history', 'banned_ips', 'admin_users', 'admin_user_images', 'subscribe', 'customers', 'customer_images', 'socials', 'maps', 'menu_settings', 'log', 'baskets', 'orders'))){
				dbRawQuery('DROP TABLE IF EXISTS `'.$tmpPrefix.$tableKey.'`');
				dbRawQuery('RENAME TABLE `'.$dLanguage['oldPrefix'].$tableKey.'` TO `'.$tmpPrefix.$tableKey.'`');
				dbRawQuery('RENAME TABLE `'.$nLanguage['oldPrefix'].$tableKey.'` TO `'.$nLanguage['newPrefix'].$tableKey.'`');
				dbRawQuery('RENAME TABLE `'.$tmpPrefix.$tableKey.'` TO `'.$dLanguage['newPrefix'].$tableKey.'`');
			}
		}

		/* updating sections */
		dbRawQuery("UPDATE `".$nLanguage['newPrefix']."sections` SET url=REPLACE(url, '".$nLanguage['oldURL']."', '".$nLanguage['newURL']."')");
		dbRawQuery("UPDATE `".$dLanguage['newPrefix']."sections` SET url=REPLACE(url, '".$dLanguage['oldURL']."', '".$dLanguage['newURL']."')");
		/* updating articles */
		dbRawQuery("UPDATE `".$nLanguage['newPrefix']."articles` SET url=REPLACE(url, '".$nLanguage['oldURL']."', '".$nLanguage['newURL']."')");
		dbRawQuery("UPDATE `".$dLanguage['newPrefix']."articles` SET url=REPLACE(url, '".$dLanguage['oldURL']."', '".$dLanguage['newURL']."')");
		/* updating sliders */
		dbRawQuery("UPDATE `".$nLanguage['newPrefix']."sliders` SET url=REPLACE(url, '".$nLanguage['oldURL']."', '".$nLanguage['newURL']."')");
		dbRawQuery("UPDATE `".$dLanguage['newPrefix']."sliders` SET url=REPLACE(url, '".$dLanguage['oldURL']."', '".$dLanguage['newURL']."')");
		/* updating sections images */ 
		dbRawQuery("UPDATE `".$nLanguage['newPrefix']."section_images` SET url=REPLACE(url, '".$nLanguage['oldURL']."', '".$nLanguage['newURL']."')");
		dbRawQuery("UPDATE `".$dLanguage['newPrefix']."section_images` SET url=REPLACE(url, '".$dLanguage['oldURL']."', '".$dLanguage['newURL']."')");
		/* updating sections images */ 
		dbRawQuery("UPDATE `".$nLanguage['newPrefix']."section_gallerys` SET url=REPLACE(url, '".$nLanguage['oldURL']."', '".$nLanguage['newURL']."')");
		dbRawQuery("UPDATE `".$dLanguage['newPrefix']."section_gallerys` SET url=REPLACE(url, '".$dLanguage['oldURL']."', '".$dLanguage['newURL']."')");
		/* updating article images */ 
		dbRawQuery("UPDATE `".$nLanguage['newPrefix']."article_images` SET url=REPLACE(url, '".$nLanguage['oldURL']."', '".$nLanguage['newURL']."')");
		dbRawQuery("UPDATE `".$dLanguage['newPrefix']."article_images` SET url=REPLACE(url, '".$dLanguage['oldURL']."', '".$dLanguage['newURL']."')");
		/* updating article images */ 
		dbRawQuery("UPDATE `".$nLanguage['newPrefix']."article_gallerys` SET url=REPLACE(url, '".$nLanguage['oldURL']."', '".$nLanguage['newURL']."')");
		dbRawQuery("UPDATE `".$dLanguage['newPrefix']."article_gallerys` SET url=REPLACE(url, '".$dLanguage['oldURL']."', '".$dLanguage['newURL']."')");
		/* updating slider images */
		dbRawQuery("UPDATE `".$nLanguage['newPrefix']."slider_images` SET url=REPLACE(url, '".$nLanguage['oldURL']."', '".$nLanguage['newURL']."')");
		dbRawQuery("UPDATE `".$dLanguage['newPrefix']."slider_images` SET url=REPLACE(url, '".$dLanguage['oldURL']."', '".$dLanguage['newURL']."')");
		/* updating languages */
		dbQuery('languages', DB_UPDATE, array('where'=>"languageId='$dLanguage[languageId]'", 'values'=>"isDefault=0, url='$dLanguage[newURL]'"));
		dbQuery('languages', DB_UPDATE, array('where'=>"languageId='$nLanguage[languageId]'", 'values'=>"isDefault=1, url='$nLanguage[newURL]'"));

		/* moving out dLanguage */
		makeDir(GLOBAL_ROOT.'/'.$dLanguage['codename']);
		moveDir(GLOBAL_ROOT.'/uploads', GLOBAL_ROOT.'/'.$dLanguage['codename'].'/uploads');
		makeDir(GLOBAL_ROOT.'/'.$dLanguage['codename'].'/includes');
		moveFile(GLOBAL_ROOT.'/includes/settings-array.inc.php', GLOBAL_ROOT.'/'.$dLanguage['codename'].'/includes/settings-array.inc.php');
		moveFile(GLOBAL_ROOT.'/includes/serializations.inc.php', GLOBAL_ROOT.'/'.$dLanguage['codename'].'/includes/serializations.inc.php');
		moveFile(GLOBAL_ROOT.'/includes/.htaccess', GLOBAL_ROOT.'/'.$dLanguage['codename'].'/includes/.htaccess');

		/* moving nLanguage */
		moveDir(GLOBAL_ROOT.'/'.$nLanguage['codename'], GLOBAL_ROOT);

		/* leaving redirect in the language directory */
		makeDir(GLOBAL_ROOT.'/'.$nLanguage['codename']);
		$htaccess  = "Options -Indexes\r\n";
		$htaccess .= "RewriteEngine On\r\n";
		$htaccess .= "RewriteRule ^(.*)$ ".GLOBAL_URL."/\$1 [L,R=301]\r\n";
		saveFile(GLOBAL_ROOT.'/'.$nLanguage['codename'].'/.htaccess', $htaccess);

		/* getting languages */
		$dLanguage = dbQuery('languages', DB_ARRAY, array('where'=>"languageId='$dLanguage[languageId]'"));
		$nLanguage = dbQuery('languages', DB_ARRAY, array('where'=>"languageId='$nLanguage[languageId]'"));

		/* building serializations and .htaccess */
		foreach($tbl as $tableKey=>$void){
			if(!in_array($tableKey, array('languages', 'admin_history', 'banned_ips', 'admin_users', 'admin_user_images', 'subscribe', 'customers', 'customer_images', 'socials', 'maps', 'menu_settings', 'log', 'baskets', 'orders'))){
				$tbl[$tableKey] = $tablePrefix.$dLanguage['codename'].'_'.$tableKey;
			}
		}
		saveSerializations($dLanguage);
		writeHtaccess($dLanguage);

		foreach($tbl as $tableKey=>$void){
			if(!in_array($tableKey, array('languages', 'admin_history', 'banned_ips', 'admin_users', 'admin_user_images', 'subscribe', 'customers', 'customer_images', 'socials', 'maps', 'menu_settings', 'log', 'baskets', 'orders'))){
				$tbl[$tableKey] = $tablePrefix.$tableKey;
			}
		}
		saveSerializations($nLanguage);
		writeHtaccess($nLanguage);
		buildLanguagesArray();

		return true;
	}
	
	function addLanguage($language){
		global $tbl, $tablePrefix, $DEFAULT_LANG, $mysqli;

		if (!empty($language['isDefault']) || $DEFAULT_LANG == $language['codename']) return false;

		/* SQL */
		foreach($tbl as $tableKey => $void){
			if (!in_array($tableKey, array('languages', 'admin_history', 'banned_ips', 'admin_users', 'admin_user_images', 'subscribe', 'customers', 'customer_images', 'socials', 'maps', 'settings_content', 'log', 'baskets', 'orders'))) {
				$tableName = $tablePrefix.$tableKey;
				/* copy table */
				$result = dbRawQuery("SHOW CREATE TABLE `$tableName`");
				$createTableSQL = $result[0]['Create Table'];
				$newTableName = $tablePrefix.$language['codename'].'_'.$tableKey;
				$createTableSQL = preg_replace('/'.preg_quote($tableName).'/', $newTableName, $createTableSQL);
				$createTableSQL = preg_replace('/AUTO_INCREMENT=\d+/i', '', $createTableSQL);
				$result = dbRawQuery($createTableSQL);

				/* copy settings */
				if ($tableKey == 'settings') {
					if ($langSettings = dbRawQuery("SELECT * FROM `$tableName` LIMIT 200", 'codename', 'value')) {
						if(!empty($language['charset'])) $langSettings['charset'] = $language['charset'];
						if(!empty($language['admin_language'])) $langSettings['admin_language'] = $language['admin_language'];
						$langSettings['website_language'] = $language['codename'];
						$langSettings['website_down'] = 1;
						foreach($langSettings as $codename=>$value){
							dbRawQuery("INSERT INTO `$newTableName` VALUES('".mysqli_real_escape_string($mysqli, $codename)."','".mysqli_real_escape_string($mysqli, $value)."')");
						}
					}
				}
			}
		}

		/* file system */
		$newLangRoot = GLOBAL_ROOT.'/'.$language['codename'];
		if(!is_dir($newLangRoot)) mkdir($newLangRoot);

		/* images articles */
		if(!is_dir($newLangRoot.'/uploads')) mkdir($newLangRoot.'/uploads');
		if(!is_dir($newLangRoot.'/uploads/articles')) mkdir($newLangRoot.'/uploads/articles');
		$htaccess = "Options -Indexes";
		saveFile($newLangRoot.'/uploads/.htaccess', $htaccess);
		saveFile($newLangRoot.'/uploads/articles/.htaccess', $htaccess);
		
		/* images sliders */
		if(!is_dir($newLangRoot.'/uploads')) mkdir($newLangRoot.'/uploads');
		if(!is_dir($newLangRoot.'/uploads/sliders')) mkdir($newLangRoot.'/uploads/sliders');
		$htaccess = "Options -Indexes";
		saveFile($newLangRoot.'/uploads/.htaccess', $htaccess);
		saveFile($newLangRoot.'/uploads/sliders/.htaccess', $htaccess);
		
		/* images sections */
		if(!is_dir($newLangRoot.'/uploads')) mkdir($newLangRoot.'/uploads');
		if(!is_dir($newLangRoot.'/uploads/sections')) mkdir($newLangRoot.'/uploads/sections');
		$htaccess = "Options -Indexes";
		saveFile($newLangRoot.'/uploads/.htaccess', $htaccess);
		saveFile($newLangRoot.'/uploads/sections/.htaccess', $htaccess);
		
		/* images gallery */
		if(!is_dir($newLangRoot.'/uploads')) mkdir($newLangRoot.'/uploads');
		if(!is_dir($newLangRoot.'/uploads/gallery')) mkdir($newLangRoot.'/uploads/gallery');
		$htaccess = "Options -Indexes";
		saveFile($newLangRoot.'/uploads/.htaccess', $htaccess);
		saveFile($newLangRoot.'/uploads/gallery/.htaccess', $htaccess);
		
		/* files */
		if(!is_dir($newLangRoot.'/uploads')) mkdir($newLangRoot.'/uploads');
		if(!is_dir($newLangRoot.'/uploads/files')) mkdir($newLangRoot.'/uploads/files');
		$htaccess = "Options -Indexes";
		saveFile($newLangRoot.'/uploads/.htaccess', $htaccess);
		saveFile($newLangRoot.'/uploads/files/.htaccess', $htaccess);
		
		/* images for posts */
		if(!is_dir($newLangRoot.'/uploads')) mkdir($newLangRoot.'/uploads');
		if(!is_dir($newLangRoot.'/uploads/posts')) mkdir($newLangRoot.'/uploads/posts');
		$htaccess = "Options -Indexes";
		saveFile($newLangRoot.'/uploads/.htaccess', $htaccess);
		saveFile($newLangRoot.'/uploads/posts/.htaccess', $htaccess);
		
		/* images banner */
		if(!is_dir($newLangRoot.'/uploads')) mkdir($newLangRoot.'/uploads');
		if(!is_dir($newLangRoot.'/uploads/bs')) mkdir($newLangRoot.'/uploads/bs');
		$htaccess = "Options -Indexes";
		saveFile($newLangRoot.'/uploads/.htaccess', $htaccess);
		saveFile($newLangRoot.'/uploads/bs/.htaccess', $htaccess);
		
		/* images customers */
		if(!is_dir($newLangRoot.'/uploads')) mkdir($newLangRoot.'/uploads');
		if(!is_dir($newLangRoot.'/uploads/customers')) mkdir($newLangRoot.'/uploads/customers');
		$htaccess = "Options -Indexes";
		saveFile($newLangRoot.'/uploads/.htaccess', $htaccess);
		saveFile($newLangRoot.'/uploads/customers/.htaccess', $htaccess);
		
		/* main htaccess */
		$htaccess  = "Options -Indexes\r\n";
		saveFile($newLangRoot.'/.htaccess', $htaccess);

		/* includes */
		if(!is_dir($newLangRoot.'/includes')) mkdir($newLangRoot.'/includes');
		$htaccess  = "Deny from all";
		saveFile($newLangRoot.'/includes/.htaccess', $htaccess);

		/* saving settings */
		$langConfig  = "<?php\r\n";
		$langConfig .= '$config = '.var_export($langSettings, true).";\r\n";
		$langConfig .= "?>";
		saveFile($newLangRoot.'/includes/settings-array.inc.php', $langConfig);

		$serializations  = "<?php\r\n";
		$serializations .= "\$SECTIONS = array();\r\n";
		$serializations .= "\$TREE = array();\r\n";
		$serializations .= "?>";
		saveFile($newLangRoot.'/includes/serializations.inc.php', '');

		return true;
	}

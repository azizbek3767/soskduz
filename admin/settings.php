<?php
  include('../includes/admin.inc.php');
  if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

  $action   = getRequestVar('action');
  $settings = getRequestVar('settings', '', $noEscape = true);
  $date     = getRequestVar('date');
  
  if(!empty($action['clear_cache'])){
    $smarty->clearAllCache();
    exit;

  } elseif(!empty($action['delete_stats']) && !empty($date)){
    deleteStatsPriorTo($date);
    exit;
    
  } elseif(!empty($action['save'])){
    
    $thumbSizeNames = array('small_thumb_width', 'small_thumb_height', 'medium_thumb_width', 'medium_thumb_height', 'large_thumb_width', 'large_thumb_height');
    $galleryConfig = array('smallX', 'smallY', 'mediumX', 'mediumY', 'bigX', 'bigY');
    
    if(empty($settings['convert_filename_to_lowercase'])) $settings['convert_filename_to_lowercase'] = 0;
    if(empty($settings['statistics_enabled'])) $settings['statistics_enabled'] = 0;
    if(empty($settings['comments_enabled'])) $settings['comments_enabled'] = 0;
    if(empty($settings['comments_must_be_approved'])) $settings['comments_must_be_approved'] = 0;
    if(empty($settings['comments_whitelist_enabled'])) $settings['comments_whitelist_enabled'] = 0;
    if(empty($settings['comments_blacklist_enabled'])) $settings['comments_blacklist_enabled'] = 0;
    if(empty($settings['comments_editors_may_approve'])) $settings['comments_editors_may_approve'] = 0;
    if(empty($settings['comments_captcha_enabled'])) $settings['comments_captcha_enabled'] = 0;
    if(empty($settings['comments_strip_html'])) $settings['comments_strip_html'] = 0;
    if(empty($settings['comments_convert_links'])) $settings['comments_convert_links'] = 0;
    if(empty($settings['comments_email_confirmation_required'])) $settings['comments_email_confirmation_required'] = 0;
    if(empty($settings['save_original_image'])) $settings['save_original_image'] = 0;
    if(empty($settings['keep_original_image_name'])) $settings['keep_original_image_name'] = 0;
    if(empty($settings['cache_enabled_index'])) $settings['cache_enabled_index'] = 0;
    if(empty($settings['cache_enabled_article'])) $settings['cache_enabled_article'] = 0;
    if(empty($settings['cache_enabled_section'])) $settings['cache_enabled_section'] = 0;
    if(empty($settings['cache_enabled_rss'])) $settings['cache_enabled_rss'] = 0;
    if(empty($settings['cache_enabled_sitemap'])) $settings['cache_enabled_sitemap'] = 0;
    if(empty($settings['feedback_captcha_enabled'])) $settings['feedback_captcha_enabled'] = 0;
    if(empty($settings['website_down'])) $settings['website_down'] = 0;
    if(empty($settings['slider'])) $settings['slider'] = 0;
    if(empty($settings['compress_js_css'])) $settings['compress_js_css'] = 0;
    if(empty($settings['website_language'])) $settings['website_language'] = '';
    if(empty($settings['telegram_send'])) $settings['telegram_send'] = 0;
    if(empty($settings['view_enabled'])) $settings['view_enabled'] = 0;
    if(empty($settings['click_off'])) $settings['click_off'] = 0;
    if(empty($settings['error_test'])) $settings['error_test'] = 0;

    	
    if(empty($settings['timezone'])) $settings['timezone'] = $settings['timezone'];
    
    foreach (lang('langtimezones:timezone') as $key=>$langtimezone) {
        if ($settings['timezone'] == $key)  {
            $timezone = explode(":", $langtimezone);
            $settings['hour_adjustment']   = $timezone[0];
            $settings['minute_adjustment'] = $timezone[1];
        }
    }
    
    if(empty($settings['site_url'])) $settings['site_url'] = GLOBAL_URL;
	if(!empty($settings['old_site_url'])){
		
        dbQuery('article_images', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')"));
        dbQuery('article_gallerys', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')"));
        dbQuery('section_images', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')"));
        dbQuery('section_gallerys', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')"));
        dbQuery('slider_images', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')"));
        dbQuery('admin_user_images', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')"));
        dbQuery('customer_images', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')"));
        dbQuery('sections', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')"));
        dbQuery('articles', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')")); 
        dbQuery('sliders', DB_UPDATE, array('values'=>"url = replace(url, '$settings[old_site_url]', '$settings[site_url]')")); 
        dbQuery('sliders', DB_UPDATE, array('values'=>"links = replace(links, '$settings[old_site_url]', '$settings[site_url]')"));  
        dbQuery('logos', DB_UPDATE, array('values'=>"logoUrl = replace(logoUrl, '$settings[old_site_url]', '$settings[site_url]')")); 
        
    }
    
    $settings += dbRawQuery("SHOW VARIABLES LIKE 'ft_min_word_len'", 'Variable_name', 'Value');
			
    foreach($settings as $codename=>$value) if(!isset($config[$codename]) || $config[$codename] != $value) {
  		if(in_array($codename, $thumbSizeNames)) $value = (int) $value;
        switch ($codename){
  			case('compress_js_css'):
            $updateHtaccess = true;
            break;
				
                /* control panel language has changed */
				case('admin_language'):
				$adminLang = $value;
					loadLanguage($adminLang);
					$smarty->compile_id = 'admin-'.$adminLang;
					$smarty->assign('adminLang', $adminLang);
				break;
				/* file extension has been changed */
				case('file_extension'):
				$updateHtaccess = true;
					$oldExtension = $config['file_extension'];
					     
                    /* update all article and sections URLs */
					dbQuery('articles', DB_UPDATE, array('where'=>"url LIKE '%.$oldExtension'", 'values'=>"url=CONCAT(LEFT(url, CHAR_LENGTH(url)-CHAR_LENGTH('$oldExtension')), '$config[file_extension]')"));
					dbQuery('sections', DB_UPDATE, array('where'=>"url LIKE '%.$oldExtension'", 'values'=>"url=CONCAT(LEFT(url, CHAR_LENGTH(url)-CHAR_LENGTH('$oldExtension')), '$config[file_extension]')"));
				break;
								
				case('bot_id_strings'):
				if($bots = explode("\r\n", $value)){
  					$bots = array_map('trim', $bots);
						$bots = array_preg_quote($bots);
                        $bots = implode('|', $bots);
				  } else {
  					$bots = '';
				  }
					$setting['codename'] = 'bot_id_regexp';
					$setting['value'] = mysqli_real_escape_string($mysqli, $bots);
					dbQuery('settings', DB_REPLACE, array('values'=>$setting));
					dbQuery('stats_user_agents', DB_UPDATE, array('values'=>"isBot = IF(userAgent RLIKE '".mysqli_real_escape_string($mysqli, $bots)."', 1, 0)"));
    				case('bot_id_regexp'):
    				  continue;
    				case('query_fields_strings'):
    				    if($queryFields = explode("\r\n", $value)){
                            $queryFields = array_map('trim', $queryFields);
    						$queryFields = array_preg_quote($queryFields);
                            $queryFields = implode('|', $queryFields);
				        } else {
                            $queryFields = '';
				        }
        					$setting['codename'] = 'query_fields';
        					$setting['value'] = mysqli_real_escape_string($mysqli, $queryFields);
        					dbQuery('settings', DB_REPLACE, array('values'=>$setting));
        				case 'theme':
        				/* theme has been changed */
        					$smarty->clearAllCache();
        				break;
        		        }
		$setting['codename'] = mysqli_real_escape_string($mysqli, $codename);
		$setting['value'] = mysqli_real_escape_string($mysqli, $value);
		dbQuery('settings', DB_REPLACE, array('values'=>$setting));
    }
				
    $config  = getSettings();
    $smarty->assign('config', $config);
		
    if(!saveSerializations()) $errors['serializations'] = true;
		if(!writeHtaccess()) $errors['htaccess'] = true;
		$messages['saved'] = true;
    }
	
    $languageOptions = include('../includes/languages.inc.php');
	
    include('../includes/charsets.inc.php');
	
    for($i = 100; $i >= 50; $i = $i - 5) $thumbQualityOptions[$i] = $i;
	$smarty->assign('thumbQualityOptions', $thumbQualityOptions);
	
    for($i = 1; $i <= 10; $i++) $sectionDepthOptions[$i] = $i;
    $smarty->assign('sectionDepthOptions', $sectionDepthOptions);
	
    /* caching time options */
	for($i = 1; $i <= 60; $i++) $cachingTimeOptions[$i] = $i;
	$smarty->assign('cachingTimeOptions', $cachingTimeOptions);
	
    $smarty->assign('cachingPeriodOptions', lang('general:cachingPeriodOptions'));
	
    $smarty->assign('adjustedTime', langdate(adjustTime(gmdate('Y-m-d H:i:s'), false, 'F j, Y - H:i')));
	$smarty->assign('gmtTime', langdate(gmdate('F j, Y - H:i')));
	
    if($deleteStatsTime = dbQuery('stats_visitors', DB_VALUE, array('fields'=>'MIN(firstVisitOn)'))){
        $deleteStatsTime = strtotime($deleteStatsTime);
    } else {
    	$deleteStatsTime = time() - 60*60*24*365;
    }
	$smarty->assign('deleteStatsTime', $deleteStatsTime);
	
    /* themes */
    $themes = getThemes();
	$smarty->assign('themes', $themes);
	
	/* languages */
	$adminLangs = getLanguages();
	$smarty->assign('adminLangs', $adminLangs);
	$smarty->assign('ports', lang('settings:mails:ports'));
    $smarty->assign('secures', lang('settings:mails:secures'));
	$smarty->assign('mailTransports', lang('settings:mails:mailTransports'));
	$smarty->assign('langtimezones', lang('langtimezones:langtimezone'));
    $smarty->assign('captchas', lang('settings:captchas'));
    $smarty->assign('timeformats', lang('settings:timeFormats'));
    $smarty->assign('fileExtension', lang('settings:fileExtension'));
    $smarty->assign('separators', lang('settings:separators'));
  
    $ADMINIP = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR'];
    $smarty->assign('ADMINIP', $ADMINIP);
  
	if(!empty($errors)) $smarty->assign('errors', $errors);
    if(!empty($messages)) $smarty->assign('messages', $messages);
	
	$smarty->display('settings.tpl');
?>
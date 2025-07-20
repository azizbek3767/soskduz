<?php
	require_once('../includes/visitor.inc.php');
	
	$sectionId 	= (int) getRequestVar('sectionId');
	$page      	= (int) getRequestVar('page');
	$rewrite   	= getRequestVar('rewrite');
	$top_menu   = getRequestVar('top_menu');


	if (!empty($SECTIONS[$sectionId])) {
		$section = prepareSection($SECTIONS[$sectionId]);
		$smarty->assign('section', $section);
        $smarty->assign('csrf_input', App::initCsrf());
//       print_r(Session::get('token'));
	} else {
		header("HTTP/1.0 301 Moved Permanently");
		header("Location: ".SITE_URL."/");

		/* saving visit */
		writeErrorVisit(301);
		exit;
	}

	/* checking whether we in rewrite mode */
	if ($rewrite != $config['rewrite']) {
		header("HTTP/1.0 301 Moved Permanently");
		header("Location: $section[url]");

		/* saving visit */
		writeErrorVisit(301);
		exit;
	}
	
	/* caching procedures */
	if ($section['isCached'] == 1) {
		$smarty->caching = 2;
		$smarty->cache_lifetime = $section['cacheTime'] * $section['cachePeriod'];
	} elseif ($section['isCached'] != -1 && $config['cache_enabled_section'] == 1) {
		$smarty->caching = 2;
		$smarty->cache_lifetime = $config['cache_time_section'] * $config['cache_period_section'];
	}

	if ($page < 1) $page = 1;
    $smarty->assign('page', $page);

    /* for "you-are-here" navigation */
	$sectionParents = getSectionParents($sectionId);
	$smarty->assign('sectionParents', $sectionParents);
	$smarty->assign('activeSection', $SECTIONS[$sectionId]);

	/* saving visit */
	//writeSectionVisit($sectionId, $page);

    $templateName = empty($section['templateName']) ? ($section['type'] == 'tree' ? 'section.tpl' : 'page.tpl') : $section['templateName'];
	$smarty->display($templateName, "$sectionId-$page".SITE_LANG_POSTFIX);


	/* precise load time */
	updateLoadTime();
	
?>
<?php
	require_once('../includes/visitor.inc.php');

	$rewrite = getRequestVar('rewrite');
	
	/* caching procedures */
	if(!empty($config['cache_enabled_sitemap'])){
		$smarty->caching = 2;
		$smarty->cache_lifetime = $config['cache_time_sitemap'] * $config['cache_period_sitemap'];
	}

	/* checking whether we in rewrite mode */
	if($rewrite != $config['rewrite']){
		header("HTTP/1.0 301 Moved Permanently");
		header("Location: ".SITE_URL.'/sitemap.xml');

		/* saving visit */
		writeErrorVisit(301);
		exit;
	}
	
	/* saving visit */
	writeVisit(9);

	header('Content-Type: text/xml');
	$smarty->display('sitemap-xml.tpl', SITE_LANG);

	/* precise load time */
	updateLoadTime();
?>
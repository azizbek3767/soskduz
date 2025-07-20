<?php
	require_once('includes/visitor.inc.php');
	
	$query     = getRequestVar('query');
	$sectionId = (int) getRequestVar('sectionId');
	$page      = (int) getRequestVar('page');

	

	$type_content = getRequestVar('type_content');

	if($page < 1){
		$page = 1;
		$smarty->assign('page', $page);
	}

	/* saving visit */
	writeSearchVisit($query, $page);

	$smarty->display('search.tpl');

	/* precise load time */
	updateLoadTime();
?>
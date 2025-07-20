<?php
	require_once('includes/admin.inc.php');
	
	$smarty->template_dir = THEME_ROOT.'/templates';
	$smarty->compile_id   = 'main'.$config['theme'];
	
	$articleId = (int) getRequestVar('articleId');
	$article   = getRequestVar('article', '', $noEscape = true);
	
	if(empty($article)){
		/* preview from articles list */
		if($article = dbQuery('articles', DB_ARRAY, array('where'=>"articleId='$articleId'"))){
			$article = prepareArticle($article);
		} else {
			die('Article not found');
		}
	} else {
		/* preview from "Preview" button */
		$article = preparePreview($article);
	}
	
	if(!empty($article['sectionId'])){
		/* for "you-are-here" navigation */
		$sectionParents = getSectionParents($article['sectionId']);
		$smarty->assign('sectionParents', $sectionParents);
		$smarty->assign('activeSection', $article['sectionId']);
	}

	$smarty->assign('article', $article);
	$smarty->display('article.tpl');	
	
?>
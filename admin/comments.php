<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'editor' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

	$action  = getRequestVar('action');
	$comment = getRequestVar('comment');
	$query   = getRequestVar('query');
	$status  = getRequestVar('status');
	$bulk    = getRequestVar('bulk');
	$page    = (int) getRequestVar('page');

	if(empty($adminUser['permitAllSections'])){
		$allowedSections = getAllowedSections();
		if(empty($allowedSections)){
			$allowedSections = array(-1);
			$errors['access_denied'] = true;
			$action = array();
			$smarty->clear_assign('action');
			$noItems = true;
		}
	}

	if($adminUser['accessLevel'] == 'editor' && !$config['comments_editors_may_approve']){
		$errors['access_denied'] = true;
		$noItems = true;
	}

	if(!empty($action['edit']) && empty($errors)){
		if(empty($errors) && !empty($comment['commentId'])){
			$where[] = "commentId='$comment[commentId]'";

			/* access level check */
			if(empty($adminUser['permitAllSections'])){
				$join['articles'] = "USING(articleId)";
				$where[] = "sectionId IN(".implode(',', $allowedSections).")";
			}

			/* checking section permission */
			if(empty($adminUser['permitAllSections'])) $where[] = "sectionId IN(".implode(',', $allowedSections).")";

			if($comment = dbQuery('comments', DB_ARRAY, array('where'=>$where))){
				/* getting info about users who created and modified the comment */
				$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId = '$comment[modifiedBy]'", 'indexKey'=>'userId'));
				$comment['modifiedBy'] = empty($users[$comment['modifiedBy']]) ? unknownUser() : $users[$comment['modifiedBy']];
				$comment['addedOn']    = langdate(adjustTime($comment['addedOn'], false, 'F j, Y H:i'));
				$comment['modifiedOn'] = langdate(adjustTime($comment['modifiedOn'], false, 'F j, Y H:i'));

				$smarty->assign('comment', $comment);
			} else {
				$errors['comment_not_found'] = true;
			}
		}

		if(empty($errors)){
			$noItems = true;
			$smarty->assign('statuses', array_slice(lang('comments:statuses'), 1));
		} else {
			$smarty->clear_assign('action');
		}

	/***** CUT FOR DEMO START *****/
	} elseif(!empty($action['save']) && empty($errors)){
		$comment['authorName']  = trim($comment['authorName']);
		$comment['authorEmail'] = trim($comment['authorEmail']);
		$comment['content']     = trim($comment['content']);

		/* checking fields */
		if(empty($comment['authorName'])) $errors['authorName'] = true;
		if(empty($comment['authorEmail'])) $errors['authorEmail'] = true;
		if(!empty($comment['authorEmail']) && @!ereg('^[a-zA-Z0-9\._\-]+@[a-zA-Z0-9\.\-]+\.[a-z]{2,4}$',$comment['authorEmail'])) $errors['authorEmailNot'] = true;
		if(empty($comment['content'])) $errors['content'] = true;

		if(empty($errors)){
			/********** Updating Entry **********/

			/* access level check */
			if(empty($adminUser['permitAllSections'])){
				$join['articles'] = "USING(articleId)";
				$where[] = "sectionId IN(".implode(',', $allowedSections).")";
			}

			$where[] = "commentId='$comment[commentId]'";
			if(!($oldcomment = dbQuery('comments', DB_ARRAY, array('where'=>$where)))) $errors['comment_not_found'] = true;

			if(empty($errors)){
				unset($comment['addedOn']);

				$comment['modifiedBy']   = $adminUser['userId'];
				$comment['modifiedOn']   = gmdate('Y-m-d H:i:s');

				if(dbQuery('comments', DB_UPDATE, array('where'=>"commentId='$comment[commentId]'", 'values'=>$comment))){
					$messages['saved'] = true;
				} else {
					$errors['not_saved'] = true;
				}

				/* update totalComments */
				$articleId = dbQuery('comments', DB_VALUE, array('where'=>"commentId='$comment[commentId]'", 'fields'=>'articleId'));
				$totalComments = dbQuery('comments', DB_VALUE, array('where'=>"articleId='$articleId' AND status='approved'", 'fields'=>'COUNT(*)'));
				dbQuery('articles', DB_UPDATE, array('where'=>"articleId='$articleId'", 'values'=>"totalComments='$totalComments'"));
			}

		} else {
			/* if there are any errors in fields */
			$smarty->assign('statuses', array_slice(lang('comments:statuses'), 1));
			$smarty->assign('action', array('edit'=>true));
			$smarty->assign('comment', $comment);
			$noItems = true;
		}
	} elseif(!empty($action['bulk']) && !empty($bulk) && empty($errors)){
		$articleIds = dbQuery('comments', DB_ARRAYS, array('where'=>"commentId IN ('".implode("','", array_keys($bulk))."')", 'fields'=>'DISTINCT articleId', 'valueKey'=>'articleId'));

		foreach($bulk as $commentId=>$commentStatus){
			if($commentStatus == 1){
				dbQuery('comments', DB_UPDATE, array('where'=>"commentId = '$commentId'", 'values'=>"status='approved'"));
			} elseif($commentStatus == 2){
				dbQuery('comments', DB_UPDATE, array('where'=>"commentId = '$commentId'", 'values'=>"status='spam'"));
			} elseif($commentStatus == 3){
				dbQuery('comments', DB_DELETE, array('where'=>"commentId = '$commentId'"));
			} elseif($commentStatus == 0){
				dbQuery('comments', DB_UPDATE, array('where'=>"commentId = '$commentId'", 'values'=>"status='pending'"));
			}
		}
		$messages['bulk_save'] = true;

		/* update totalComments */
		$commentTotals = dbQuery('comments', DB_ARRAYS, array('where'=>"articleId IN('".implode("','", $articleIds)."') AND status='approved'", 'fields'=>'articleId, COUNT(*) AS totalComments', 'group'=>'articleId', 'indexKey'=>'articleId', 'valueKey'=>'totalComments'));
		foreach($commentTotals as $articleId=>$totalComments) dbQuery('articles', DB_UPDATE, array('where'=>"articleId='$articleId'", 'values'=>"totalComments='$totalComments'"));
	}

	if(empty($noItems)){
		if($page < 1){
			$page = 1;
			$smarty->assign('page', $page);
		}
		$itemsPerPage = 15;
		$where = array();

		/* showing comments from allowed sections only */
		$join = array();
		$fields = '*';
		if(empty($adminUser['permitAllSections'])){
			$join['articles'] = "USING(articleId)";
			$where[] = "sectionId IN(".implode(',', $allowedSections).")";
			$fields = 'comments.*';
		}

		/* processing search fields */
		if(!empty($query)){
			if(empty($join)){
				$where[] = "content LIKE '%$query%' OR authorName LIKE '%$query%' OR authorEmail LIKE '%$query%' OR authorIp LIKE '%$query%'";
			} else {
				$where[] = "comments.content LIKE '%$query%' OR comments.authorName LIKE '%$query%' OR comments.authorEmail LIKE '%$query%' OR comments.authorIp LIKE '%$query%'";
			}
		}
		if(!empty($status)){
			$where[] = empty($join) ? "status='$status'" : "comments.status='$status'";
			if($status == 'pending'){
				$order = empty($join) ? 'addedOn ASC' : 'comments.addedOn ASC';
			} else {
				$order = empty($join) ? 'addedOn DESC' : 'comments.addedOn DESC';
			}
		} else {
			$where[] = empty($join) ? "status IN('pending', 'approved')" : "comments.status IN('pending', 'approved')";
			$order   = empty($join) ? 'addedOn DESC' : 'comments.addedOn DESC';
		}

		$comments = dbQuery('comments', DB_ARRAYS, array('fields'=>$fields, 'start'=>($page-1)*$itemsPerPage, 'limit'=>$itemsPerPage, 'order'=>$order, 'indexKey'=>'commentId', 'where'=>$where, 'join'=>$join));
		foreach($comments as $commentId=>$comment){
			$comments[$commentId]['addedOn'] = adjustTime($comment['addedOn']);
			$articleIds[$comment['articleId']] = $comment['articleId'];
		}
		if(!empty($articleIds)){
			$articles = dbQuery('articles', DB_ARRAYS, array('indexKey'=>'articleId', 'fields'=>'articleId, title, url', 'where'=>"articleId IN('".implode("','", array_keys($articleIds))."')"));
			if (!empty($articles)) { 
    			foreach($comments as $commentId => $comment){
    				$comments[$commentId]['article'] = $articles[$comment['articleId']];
    			}
			}
		}

		/* statuses */
		$smarty->assign('statuses', lang('comments:statuses'));

		$totalComments = dbQuery('comments', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where, 'join'=>$join));
		$pageNums = getPageNums($totalComments, $page, $itemsPerPage, 0, 4, 4, 0);
		$smarty->assign('totalComments', $totalComments);
		$smarty->assign('comments', $comments);
		$smarty->assign('pageNums', $pageNums);
	}

	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
	$smarty->display('comments.tpl');
?>
<?php
include('../includes/admin.inc.php');
if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));
$action  = getRequestVar('action');
$abroad = arrAddSlashes(getRequestVar('abroad', '', $noEscape = true));
$status  = getRequestVar('status');
$page    = (int) getRequestVar('page', 1);
$id    = (int) getRequestVar('id');

if (!empty($action['edit'])) {

    if(empty($errors) && !empty($abroad['id'])){
        $where[] = "id='$abroad[id]'";

        if($abroad = dbQuery('abroad_requisits', DB_ARRAY, array('where'=>$where))){
            /* получать информацию о пользователях, которые создали и изменили статью */
            $users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$abroad[addedBy]', '$abroad[modifiedBy]')", 'indexKey'=>'userId'));
            $abroad['addedBy'] = empty($users[$abroad['addedBy']]) ? unknownUser() : $users[$abroad['addedBy']];
            $abroad['modifiedBy'] = empty($users[$abroad['modifiedBy']]) ? unknownUser() : $users[$abroad['modifiedBy']];
            $abroad['addedOn']     = langdate(adjustTime($abroad['addedOn'], false, 'F j, Y H:i'));
            $abroad['modifiedOn']  = langdate(adjustTime($abroad['modifiedOn'], false, 'F j, Y H:i'));


            if (isset($abroad['settings']) && !empty($abroad['settings'])) $abroad['settings'] = unserialize($abroad['settings']);
            //print_r($abroad);
            $smarty->assign('abroad', $abroad);
            $smarty->assign('templateName', $abroad['fullName']);

        } else {
            $errors['abroad_not_found'] = true;
        }
    }



    if(empty($errors)){
        $noItems = true;
        $smarty->assign('statuses', array_slice(lang('abroad_requisits:statuses'), 1));
        $smarty->assign('adjustedNow', adjustTime(gmdate('Y-m-d H:i:s')));
    } else {
        $smarty->clear_assign('action');
    }

} elseif(!empty($action['save'])) {


    /* проверка полей */
    if (empty($abroad['name'])) $errors['fullName'] = true;

    if (empty($abroad['id'])){
        if (dbQuery('abroad_requisits', DB_VALUE, array('fields'=>'id', 'where'=>"LOWER(fullName)=LOWER('$abroad[fullName]')"))) $errors['fullNameExists'] = true;
    } else {
        if (dbQuery('abroad_requisits', DB_VALUE, array('fields'=>'id', 'where'=>"id<>'$abroad[id]' AND LOWER(fullName)=LOWER('$abroad[fullName]')"))) $errors['fullNameExists'] = true;
    }
    if (preg_match('/^(page\d+|index)$/i', $abroad['fullName'])) $errors['fullNameProhibited'] = true;
    if (preg_match('/[^0-9a-zA-Z\-_\.,]/i', $abroad['fullName'])) $errors['fullNameCharacters'] = true;

    if (isset($abroad['settings']) && !empty($abroad['settings'])) $abroad['settings'] = serialize($abroad['settings']);

    if (empty($errors)) {

        if(empty($abroad['id'])){
            $abroad['addedBy']      = $adminUser['userId'];
            $abroad['addedOn']      = gmdate('Y-m-d H:i:s');
            $abroad['modifiedBy']   = $adminUser['userId'];
            $abroad['modifiedOn']   = gmdate('Y-m-d H:i:s');

            if ($abroad['id'] = dbQuery('abroad_requisits', DB_INSERT, array('values' => $abroad))) {
                $messages['saved'] = true;
            } else {
                $errors['not_saved'] = true;
            }
        } else {
            /********** Обновление записи **********/

            /* access level check */
            if($adminUser['accessLevel'] == 'writer') $where[] = "addedBy='$adminUser[userId]'";

            $where[] = "id='$abroad[id]'";
            if(!($oldabroad = dbQuery('abroad_requisits', DB_ARRAY, array('where'=>$where)))) $errors['abroad_not_found'] = true;

            if(empty($errors)){

                unset($abroad['addedBy']);
                unset($abroad['addedOn']);

                $abroad['modifiedBy']   = $adminUser['userId'];
                $abroad['modifiedOn']   = gmdate('Y-m-d H:i:s');

                if(dbQuery('abroad_requisits', DB_UPDATE, array('where'=>"id='$abroad[id]'", 'values'=>$abroad))){
                    $messages['saved'] = true;
                } else {
                    $errors['not_saved'] = true;
                }
            }
        }

    } else {
        /* if there are any errors in fields */
        $smarty->assign('statuses', array_slice(lang('abroad_requisits:statuses'), 1));
        $smarty->assign('action', array('edit' => true));
        $abroad = arrStripSlashes($abroad);
        $smarty->assign('abroad', $abroad);
        $noItems = true;
    }
}  elseif(!empty($action['deleteabroad']) && !empty($abroad['id'])){ // удаление статьи
    $where[] = "id='$abroad[id]'";


    /* deleting abroad */
    if(dbQuery('abroad_requisits', DB_DELETE, array('where'=>$where))){

        echo "removeElement($abroad[id], 'abroad');\r\n";
    } else {
        echo "writeStatus('".lang('abroad_requisits:errors:13')."', 'aError');\r\n";
        echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
    }
    exit;
}



if (empty($noItems)) {


    $smarty->assign('page', $page);
    $itemsPerPage = 15;
    $where = array();

    /* processing search fields */
    if(!empty($status)) $where[] = "status = '$status'";

    $fields = array('id', 'fullName');
    $abroad_requisits = dbQuery('abroad_requisits', DB_ARRAYS, array('start' => 1, 'limit' => 1, 'order' => 'id ASC', 'indexKey' => 'id', 'where' => $where));

    $totalAbroad_requisits = dbQuery('abroad_requisits', DB_VALUE, array('fields' => 'COUNT(*)', 'where' => $where));
    $pageNums = getPageNums($totalAbroad_requisits, $page, $itemsPerPage, 0, 4, 4, 0);
    $smarty->assign('totalAbroad_requisits', $totalAbroad_requisits);
    $smarty->assign('abroad_requisits', $abroad_requisits);
    $smarty->assign('pageNums', $pageNums);


}

if(!empty($errors)) $smarty->assign('errors', $errors);
if(!empty($messages)) $smarty->assign('messages', $messages);
$smarty->display('from_abroad.tpl');



?>

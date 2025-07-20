<?php
include('../includes/admin.inc.php');
if ($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));
$logger = new Logger();

$parentId = (int)getRequestVar('parentId');
$sectionId = (int)getRequestVar('sectionId');
$section = getRequestVar('section');
$action = getRequestVar('action');
$page = (int)getRequestVar('page');
$fieldcontent = getRequestVar('fieldcontent', '', $noEscape = true);
$success = '';
$imageTmpName = '';

if (isset($action['edit']) && !empty($action['edit'])) {
    if (isset($section['sectionId']) && !empty($section['sectionId'])) {
        /* getting info about section */
        $section = dbQuery('sections', DB_ARRAY, array('where' => "sectionId='$section[sectionId]'"));

        if (empty($section['top_menu'])) $section['top_menu'] = 0;

        /* getting info about users who created and modified the section */
        $users = dbQuery('admin_users', DB_ARRAYS, array('where' => "userId IN('$section[addedBy]', '$section[modifiedBy]')", 'indexKey' => 'userId'));
        $section['addedBy'] = empty($users[$section['addedBy']]) ? unknownUser() : $users[$section['addedBy']];
        $section['modifiedBy'] = empty($users[$section['modifiedBy']]) ? unknownUser() : $users[$section['modifiedBy']];
        $section['addedOn'] = langdate(adjustTime($section['addedOn'], false, 'd.m.Y H:i'));
        $section['modifiedOn'] = langdate(adjustTime($section['modifiedOn'], false, 'd.m.Y H:i'));

        /* getting article images */
        $images = dbQuery('section_images', DB_ARRAYS, array('where' => "sectionId='$section[sectionId]'"));
        foreach ($images as $image) {
            if (!empty($image['codename'])) {
                if (empty($section['images'])) $section['images'] = array();
                $section['images'][$image['codename']] = $image;
            }
        }
        /* получение картинки статьи */
        if ($files = dbQuery('section_files', DB_ARRAY, array('where' => "sectionId='$section[sectionId]'"))) {
            $section['files'] = $files;
        }

        $fileList = dbQuery('section_gallerys', DB_ARRAYS, array('where' => "sectionId='$section[sectionId]'", 'orderBy' => "imageId ASC"));
        $smarty->assign('fileList', $fileList);


        $smarty->assign('section', $section);
    }

    loadFieldData();
    $noItems = true;

    /***** CUT FOR DEMO START *****/
} elseif (isset($action['save']) && !empty($action['save'])) {
    /* проверка полей */
    $section['name'] = trim($section['name']);
    if (empty($section['name'])) $errors['name'] = true;
    if (empty($section['top_menu'])) $section['top_menu'] = 0;
    if (empty($section['footer_menu'])) $section['footer_menu'] = 0;
    if (empty($section['top_submenu'])) $section['top_submenu'] = 0;
    if (empty($section['photo_gallery'])) $section['photo_gallery'] = 0;

    if ($section['fileName'] == 'index') {
        $section['type'] = 'plain';
        $section['parentId'] = 0;
        if (empty($section['sectionId'])) {
            if (dbQuery('sections', DB_VALUE, array('fields' => 'sectionId', 'where' => "LOWER(fileName)=LOWER('$section[fileName]')"))) $errors['fileNameExists'] = true;
        } else {
            if (dbQuery('sections', DB_VALUE, array('fields' => 'sectionId', 'where' => "sectionId<>'$section[sectionId]' AND LOWER(fileName)=LOWER('$section[fileName]')"))) $errors['fileNameExists'] = true;
        }
    }

    /* checking existance of children */
    if (!empty($section['sectionId'])) $oldSection = $SECTIONS[$section['sectionId']];
    if (empty($section['fileName'])) {
        $errors['fileName'] = true;
    } elseif (empty($section['sectionId'])) {
        if (dbQuery('sections', DB_VALUE, array('fields' => 'sectionId', 'where' => "LOWER(fileName)=LOWER('$section[fileName]')"))) $errors['fileNameExists'] = true;
    } else {
        if (dbQuery('sections', DB_VALUE, array('fields' => 'sectionId', 'where' => "sectionId<>'$section[sectionId]' AND parentId='$section[parentId]' AND LOWER(fileName)=LOWER('$section[fileName]')"))) $errors['fileNameExists'] = true;
        if ($section['type'] == 'plain') {
            if (dbQuery('sections', DB_VALUE, array('fields' => 'sectionId', 'where' => "parentId='$section[sectionId]'"))) $errors['sectionType'] = true;
            if (dbQuery('articles', DB_VALUE, array('fields' => 'sectionId', 'where' => "sectionId='$section[sectionId]'"))) $errors['sectionType'] = true;
        }
    }

    if (preg_match('/^(admin|images|files)$/i', $section['fileName'])) $errors['fileNameProhibited'] = true;
    if (preg_match('/[^0-9a-zA-Z\-_\.,]/i', $section['fileName'])) $errors['fileNameCharacters'] = true;
    if (strlen($section['fileName']) == 2) $errors['fileNameProhibited'] = true;

    if (empty($section['parentId'])) $section['parentId'] = 0;

    $templates = searchDir(THEME_ROOT . '/templates', '*.tpl');
    if (!in_array($section['templateName'], $templates)) $section['templateName'] = '';
    if (!in_array($section['subTemplateName'], $templates)) $section['subTemplateName'] = '';
    if (!in_array($section['artTemplateName'], $templates)) $section['artTemplateName'] = '';

    if ($parentTypeContent = dbQuery('sections', DB_ARRAY, array('fields' => 'type_content, type', 'where' => "sectionId='$section[parentId]'"))) {
        if ($parentTypeContent['type'] != $section['type']) {
            $errors['error_parent_type'] = true;
        } elseif (!empty($section['type_content'])) {
            if ($parentTypeContent['type_content'] != $section['type_content']) $errors['error_parent_type_content'] = true;
        }
    }

    if (empty($errors)) {
        if (empty($section['sectionId'])) {
            $section['sectionId'] = NULL;
            $section['addedBy'] = $adminUser['userId'];
            $section['addedOn'] = gmdate('Y-m-d H:i:s');
            $section['modifiedBy'] = $adminUser['userId'];
            $section['modifiedOn'] = gmdate('Y-m-d H:i:s');
            $section['sortOrder'] = dbQuery('sections', DB_VALUE, array('fields' => 'MAX(sortOrder)', 'where' => "parentId='$section[parentId]'")) + 1;

            if ($section['sectionId'] = dbQuery('sections', DB_INSERT, array('values' => $section))) {

                if (!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                    die('im here baby');
                    $ext = explode(".", $_FILES['image']['name']);
                    $extension = strtolower(array_pop($ext));
                    if ($images = createSectionImages($_FILES['image']['tmp_name'], $extension, $section['sectionId'], '', $_FILES['image']['name'])) {
                        $sectionImages = dbQuery('section_images', DB_ARRAYS, array('where' => "sectionId='$section[sectionId]' AND codename<>''", 'indexKey' => 'codename'));
                        foreach ($images as $codename => $image) {
                            if (!empty($sectionImages[$codename])) $image['imageId'] = $sectionImages[$codename]['imageId'];
                            dbQuery('section_images', DB_REPLACE, array('values' => $image));
                        }
                        $sectionUpdate['hasImage'] = 1;
                    } else {
                        $errors['image_not_saved'] = true;
                    }
                }
                /* добавление или замена изображения в статье */
                if (!empty($_FILES['doc']) && is_uploaded_file($_FILES['doc']['tmp_name'])) {
                    if ($files = createFiles($_FILES['doc'], 'sections', $section['sectionId'])) {
                        if ($updateFiles = dbQuery('section_files', DB_ARRAY, array('where' => "sectionId='$files[sectionId]'"))) {
                            unlink(SITE_ROOT . "/uploads/sections/$section[sectionId]/$updateFiles[fileName]");
                            dbQuery('section_files', DB_UPDATE, array('where' => "fileId = $updateFiles[fileId]", 'values' => $files));
                        } else {
                            dbQuery('section_files', DB_INSERT, array('values' => $files));
                        }

                        $sectionUpdate['hasFile'] = 1;
                    }
                }

                if ($section['photo_gallery'] == 1 && !empty($_FILES['file'])) {
                    dbQuery('section_gallerys', DB_UPDATE, array('where' => "imageTmpName ='$imageTmpName' AND sectionId=0", 'values' => "sectionId='$section[sectionId]'"));
                    $_SESSION['imameTmpName'] = '';
                }

                if (!empty($sectionUpdate)) dbQuery('sections', DB_UPDATE, array('where' => "sectionId='$section[sectionId]'", 'values' => $sectionUpdate));
                $messages['saved'] = true;

                $parentId = $section['parentId'];

                if (!saveSerializations()) $errors['serializations'] = true;
                if (!writeHtaccess()) $errors['htaccess'] = true;
                $logger->info("Добавлен новый раздел");
            } else {
                $errors['not_saved'] = true;
            }

        } else {
            unset($section['addedBy']);
            unset($section['addedOn']);
            unset($section['sortOrder']);
            unset($section['images']);
            unset($section['hasImage']);
            if ($section['parentId'] != $oldSection['parentId']) {
                /* изменить порядок сортировки, если был изменен родитель */
                $section['sortOrder'] = dbQuery('sections', DB_VALUE, array('fields' => 'MAX(sortOrder)', 'where' => "parentId='$section[parentId]'")) + 1;
            }

            $section['modifiedBy'] = $adminUser['userId'];
            $section['modifiedOn'] = gmdate('Y-m-d H:i:s');

            if (!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $ext = explode(".", $_FILES['image']['name']);
                $extension = strtolower(array_pop($ext));

                if ($images = createSectionImages($_FILES['image']['tmp_name'], $extension, $section['sectionId'], '', $_FILES['image']['name'])) {


                    $sectionImages = dbQuery('section_images', DB_ARRAYS, array('where' => "sectionId='$section[sectionId]' AND codename<>''", 'indexKey' => 'codename'));

                    foreach ($images as $codename => $image) {
                        if (!empty($sectionImages[$codename])) $image['imageId'] = $sectionImages[$codename]['imageId'];
                        dbQuery('section_images', DB_REPLACE, array('values' => $image));
                    }
                    $section['hasImage'] = 1;
                } else {
                    $errors['image_not_saved'] = true;
                }
            }
            /* добавление или замена изображения в статье */
            if (!empty($_FILES['doc']) && is_uploaded_file($_FILES['doc']['tmp_name'])) {
                if ($files = createFiles($_FILES['doc'], 'sections', $section['sectionId'])) {

                    if ($updateFiles = dbQuery('section_files', DB_ARRAY, array('where' => "sectionId='$files[sectionId]'"))) {
                        unlink(SITE_ROOT . "/uploads/sections/$section[sectionId]/$updateFiles[fileName]");
                        dbQuery('section_files', DB_UPDATE, array('where' => "fileId = $updateFiles[fileId]", 'values' => $files));
                    } else {
                        dbQuery('section_files', DB_INSERT, array('values' => $files));
                    }
                    $section['hasFile'] = 1;
                }
            }

            if (dbQuery('sections', DB_UPDATE, array('where' => "sectionId='$section[sectionId]'", 'values' => $section))) {
                $messages['saved'] = true;
                if ($section['parentId'] != $oldSection['parentId']) {
                    /* обновить порядок сортировки, если был изменен родитель */
                    writeSortOrders($section['parentId']);
                    writeSortOrders($oldSection['parentId']);
                }
                if (!saveSerializations()) $errors['serializations'] = true;
                if (!writeHtaccess()) $errors['htaccess'] = true;
                $parentId = $section['parentId'];

                $logger->info("Раздел «" . $section['name'] . "» отредактирован");
            } else {
                $errors['not_saved'] = true;
            }
        }

    } else {
        loadFieldData();
        $smarty->assign('action', array('edit' => true));
        $noItems = true;
    }
    $smarty->assign('section', $section);

}
if (empty($noItems)) {

    if ($page < 1) {
        $page = 1;
        $smarty->assign('page', $page);
    }
    $itemsPerPage = 15;

    if ($parentId > 0) {

        /* получать информацию о родительском разделе */
        $parent = $SECTIONS[$parentId];
        if ($parent['parentId'] > 0) $parent['parent'] = $SECTIONS[$parent['parentId']];
        $smarty->assign('parent', $parent);
    }

    $fields = array('sectionId, parentId, name, alias, top_menu, fileName, url, status, type_content, type');
    $sections = dbQuery('sections', DB_ARRAYS, array('fields' => $fields, 'where' => "parentId='38'", 'start' => ($page - 1) * $itemsPerPage - ($page > 1 ? 1 : 0), 'limit' => $itemsPerPage + ($page > 1 ? 2 : 1), 'order' => 'sortOrder'));

    for ($i = 0; $i < count($sections); $i++) {
        $sections[$i]['statusName'] = lang('sections:statuses:' . $sections[$i]['status']);
        $sections[$i]['typeName'] = lang('sections:types:' . $sections[$i]['type']);
        $sections[$i]['typeContentName'] = lang('sections:typeContents:' . $sections[$i]['type_content']);
        if (($page > 1 && $i == 0) || (($i - $itemsPerPage >= 0) && ($i == count($sections) - 1))) $sections[$i]['isHidden'] = true;
        if (!empty($SECTIONS[$sections[$i]['sectionId']]['children'])) $sections[$i]['hasSubsections'] = true;

    }

    $totalSections = 0;
    if ($parentId > 0 && !empty($SECTIONS[$parentId]['children'])) {
        $totalSections = count($SECTIONS[$parentId]['children']);
    } elseif (!empty($TREE)) {
        $totalSections = count($TREE);
    }

    $pageNums = getPageNums($totalSections, $page, $itemsPerPage, 0, 4, 4, 0);
    $smarty->assign('sections', $sections);
    $smarty->assign('pageNums', $pageNums);
    $smarty->assign('parentId', $parentId);

}

if (isset($errors) && !empty($errors)) $smarty->assign('errors', $errors);
if (isset($messages) && !empty($messages)) $smarty->assign('messages', $messages);
$smarty->display('numbers.tpl');


function loadFieldData()
{
    global $smarty, $config, $SECTIONS, $section;

    if (!empty($section['sectionId'])) {
        $smarty->assign('parents', getSectionOptions($section['sectionId']));
    } else {
        $smarty->assign('parents', getSectionOptions());
    }

    /* template options */
    $templates = searchDir(THEME_ROOT . '/templates', '*.tpl');
    array_unshift($templates, lang('general:useDefaultTemplate'));
    $smarty->assign('templates', $templates);

    /* caching time options */
    for ($i = 1; $i <= 60; $i++) $cachingTimeOptions[$i] = $i;
    $smarty->assign('cachingTimeOptions', $cachingTimeOptions);
    $smarty->assign('cachingPeriodOptions', lang('general:cachingPeriodOptions'));
    $smarty->assign('statuses', lang('sections:statuses'));
    $smarty->assign('typeContents', lang('sections:typeContents'));
    $smarty->assign('types', lang('sections:types'));
}
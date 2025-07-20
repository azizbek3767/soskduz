<?php
/*include('includes/visitor.inc.php');*/
include('includes/overall.inc.php');
include('includes/smarty_plugins/function.fetch_articles.php');

global $mysqli, $tbl;
$result_articles = [];
$result_sections = [];


$query = getRequestVar('query');
$sectionId = (int)getRequestVar('sectionId');
$page = (int)getRequestVar('page');
$lang = getRequestVar('lang');

$params = [
    'query' => $query,
    'page' => $page,
    'perPage' => 10,
    'assign' => 'searchResults',
    'assignPagination' => 'pagination',
//    'fields' => 'title, url, summary, content, sectionId',
    'fields' => 'title, url, sectionId',
];

global $SECTIONS, $gmNow, $fetchedArticles, $config, $mysqli;
$config['website_language'] = $lang;

/*echo '<pre>';
print_r($params);
print_r($config['website_language']);
die;*/

$assign = fetch_getParam('assign', $params, 'articles');
$fields = fetch_getParam('fields', $params, 'articleId, sectionId, fileName, publishedOn, title, alias, url, summary, content, isFeatured, orderBy, price, oldPrice, type_content, articul, link');
$status = fetch_getParam('status', $params, 'visible');
$limit = (int)fetch_getParam('limit', $params);
$perPage = (int)fetch_getParam('perPage', $params, $limit);
$isFeatured = fetch_getParam('isFeatured', $params, NULL);
$hasImage = fetch_getParam('hasImage', $params, NULL);
$query = fetch_getParam('query', $params, NULL);
$match = fetch_getParam('match', $params, 'any');
$order = fetch_getParam('order', $params, NULL);
$orderBy = fetch_getParam('orderBy', $params, $order);
$section = fetch_getParam('section', $params);
$type_content = fetch_getParam('type_content', $params, '');
$page = (int)fetch_getParam('page', $params);
$skip = fetch_getParam('skip', $params, NULL);
$noSubsections = (boolean)fetch_getParam('noSubsections', $params, false);


$label = fetch_getParam('label', $params);
$atrtable = fetch_getParam('atrtable', $params);
$min_price = (int)fetch_getParam('min_price', $params);
$max_price = (int)fetch_getParam('max_price', $params);

$product_labels = getRequestVar('product_labels');

$assignPagination = fetch_getParam('assignPagination', $params);
$path = fetch_getParam('path', $params);
$seFriendly = (boolean)fetch_getParam('seFriendly', $params);
$pnFirst = (int)fetch_getParam('pnFirst', $params, 0);
$pnBefore = (int)fetch_getParam('pnBefore', $params, 4);
$pnAfter = (int)fetch_getParam('pnAfter', $params, 4);
$pnLast = (int)fetch_getParam('pnLast', $params, 0);


if (empty($path)) $path = array();

/* conditions */
$where = array();
$where[] = "publishedOn <= '$gmNow'";

if (!empty($status)) $where[] = "status='" . mysqli_real_escape_string($mysqli, $status) . "'";
if (!empty($type_content)) $where[] = "type_content='" . mysqli_real_escape_string($mysqli, $type_content) . "'";
if (!is_null($isFeatured)) $where[] = 'isFeatured = ' . ((boolean)$isFeatured ? 1 : 0);
if (!is_null($hasImage)) $where[] = 'hasImage = ' . ((boolean)$hasImage ? 1 : 0);
if (is_null($orderBy)) $orderBy = (is_null($query) ? 'publishedOn DESC' : '');

if (!empty($label)) $where[] = "label='" . mysqli_real_escape_string($mysqli, $label) . "'";

if (!is_null($query) && is_array($path)) $path[] = "query=" . urlencode($query);

/* query conditions */
fetch_articles_addQueryConditionsAjax($query, $match, $where, $fields, $orderBy);

/* add section conditions */
fetch_articles_addSectionConditions($section, $noSubsections, $where);

/* skipping articles */
fetch_articles_addSkipConditions($skip, $where);

/* checking article fields */
fetch_articles_filterFields($fields);

/* calculate article popularity article fields */
fetch_articles_calculatePopularity($orderBy);

if ($page < 1) $page = 1;
if ($perPage < 1) $perPage = $config['cont_section'];

if (!is_null($query) && empty($query)) {
    $articles = array();
} else {
    $articles = dbQuery('articles', DB_ARRAYS, array('fields' => $fields, 'order' => $orderBy, 'where' => $where, 'start' => ($page - 1) * $perPage, 'limit' => $perPage));
}

//SECTIONS_PART

$params = [
    'query' => $query,
    'page' => $page,
    'perPage' => 10,
    'assign' => 'searchSearchResults',
    'assignPagination' => 'sectionPagination',
//    'fields' => 'name, url, summary, content, sectionId',
    'fields' => 'name, url, sectionId',
];

$assign = fetch_getParam('assign', $params, 'articles');
$fields = fetch_getParam('fields', $params, 'sectionId, parentId, name, alias, summary, content, keywords, description, code_maps');
$status = fetch_getParam('status', $params, 'visible');
$limit = (int)fetch_getParam('limit', $params);
$perPage = (int)fetch_getParam('perPage', $params, $limit);
$isFeatured = fetch_getParam('isFeatured', $params, NULL);
$hasImage = fetch_getParam('hasImage', $params, NULL);
$query = fetch_getParam('query', $params, NULL);
$match = fetch_getParam('match', $params, 'any');
$order = fetch_getParam('order', $params, NULL);
$orderBy = fetch_getParam('orderBy', $params, $order);
$section = fetch_getParam('section', $params);
$type_content = fetch_getParam('type_content', $params, '');
$page = (int)fetch_getParam('page', $params);
$skip = fetch_getParam('skip', $params, NULL);
$noSubsections = (boolean)fetch_getParam('noSubsections', $params, false);

$label = fetch_getParam('label', $params);
$atrtable = fetch_getParam('atrtable', $params);
$min_price = (int)fetch_getParam('min_price', $params);
$max_price = (int)fetch_getParam('max_price', $params);

$product_labels = getRequestVar('product_labels');

$assignPagination = fetch_getParam('assignPagination', $params);
$path = fetch_getParam('path', $params);
$seFriendly = (boolean)fetch_getParam('seFriendly', $params);
$pnFirst = (int)fetch_getParam('pnFirst', $params, 0);
$pnBefore = (int)fetch_getParam('pnBefore', $params, 4);
$pnAfter = (int)fetch_getParam('pnAfter', $params, 4);
$pnLast = (int)fetch_getParam('pnLast', $params, 0);


if (empty($path)) $path = array();

/* conditions */
$where = array();
//    $where[] = "publishedOn <= '$gmNow'";

if (!empty($status)) $where[] = "status='" . mysqli_real_escape_string($mysqli, $status) . "'";
if (!empty($type_content)) $where[] = "type_content='" . mysqli_real_escape_string($mysqli, $type_content) . "'";
if (!is_null($isFeatured)) $where[] = 'isFeatured = ' . ((boolean)$isFeatured ? 1 : 0);
if (!is_null($hasImage)) $where[] = 'hasImage = ' . ((boolean)$hasImage ? 1 : 0);
if (is_null($orderBy)) $orderBy = (is_null($query) ? 'publishedOn DESC' : '');

if (!empty($label)) $where[] = "label='" . mysqli_real_escape_string($mysqli, $label) . "'";

if (!is_null($query) && is_array($path)) $path[] = "query=" . urlencode($query);

fetch_sections_addQueryConditionsAjax($query, $match, $where, $fields, $orderBy);
fetch_sections_filterFields($fields);

if ($page < 1) $page = 1;
if ($perPage < 1) $perPage = $config['cont_section'];

if (!is_null($query) && empty($query)) {
    $sections = array();
} else {
    $sections = dbQuery('sections', DB_ARRAYS, array('fields' => $fields, 'order' => $orderBy, 'where' => $where, 'start' => ($page - 1) * $perPage, 'limit' => $perPage));
}

$query_result = [];

foreach ($articles as $key => $value) {
    $item = [];
    $item['title'] = $value['title'];
    $item['url'] = $value['url'];
    $query_result[] = $item;
}

foreach ($sections as $key => $value) {
    $item = [];
    $item['title'] = $value['name'];
    $item['url'] = $value['url'];
    $query_result[] = $item;
}

$result['result'] = $query_result;

header('Content-Type: application/json');
echo json_encode($result);

?>

<?php
include('../includes/admin.inc.php');
if ($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

if (isset($_POST['action']) && !empty($_POST['id']) && $_POST['action'] == 'stopsubscription') {
    dbQuery('subscription_members', DB_UPDATE, array('where' => "id = '$_POST[id]'", 'values' => 'is_active = 0'));
}

$totalProfit = dbQuery('subscription_transactions', DB_VALUE, array('fields' => 'SUM(amount)', 'where' => 'is_failed = 0'));
$monthProfit = dbQuery('subscription_transactions', DB_VALUE, array('fields' => 'SUM(amount)',
    'where' => 'is_failed = 0 AND payment_date >= "' . date('Y-m-01') . '" AND payment_date <= "' . date('Y-m-t') . '"'));
$smarty->assign('totalProfit', $totalProfit);
$smarty->assign('monthProfit', $monthProfit ? $monthProfit : 0);

$filterAmounts = dbQuery('subscription_members', DB_ARRAYS, array('fields' => 'DISTINCT amount', 'order' => 'amount'));
$smarty->assign('filterAmounts', $filterAmounts);


$search = getRequestVar('search');
$amount = getRequestVar('amount');
$status = getRequestVar('status');
$page = (int)getRequestVar('page');

include('stats.date-selector.php');

if (!empty($newDateStart)) $filterDateStart = "$newDateStart[Year]-$newDateStart[Month]-$newDateStart[Day]";
if (!empty($newDateEnd)) $filterDateEnd = "$newDateEnd[Year]-$newDateEnd[Month]-$newDateEnd[Day]";

if ($page < 1) {
    $page = 1;
    $smarty->assign('page', $page);
}
$itemsPerPage = 20;

$where = [];

if (!empty($search)) $where[] = "phone LIKE '%$search%' OR name LIKE '%$search%' OR email LIKE '%$search%'";
if (!empty($filterDateStart)) $where[] = "subscription_date >= '$filterDateStart'";
if (!empty($filterDateEnd)) $where[] = "subscription_date <= '$filterDateEnd'";
if (!empty($amount)) $where[] = "amount = $amount";
if (!empty($status)) $where[] = $status == 'active' ? "is_active = 1" : "is_active = 0";


$subscribers = dbQuery('subscription_members', DB_ARRAYS, array('where' => $where, 'start' => ($page - 1) * $itemsPerPage, 'limit' => $itemsPerPage, 'order' => 'subscription_date DESC', 'indexKey' => 'id'));
$smarty->assign('subscribers', $subscribers);

$smarty->assign('status', $status);
$smarty->assign('requestAmount', $amount);

/* page numbering */
$totalItems = dbQuery('subscription_members', DB_VALUE, array('fields' => 'COUNT(DISTINCT id)', 'where' => $where));
$pageNums = getPageNums($totalItems, $page, $itemsPerPage, 2, 4, 4, 2);
$smarty->assign('pageNums', $pageNums);
$smarty->assign('totalItems', $totalItems);

$smarty->display('donations.subscribers.tpl');

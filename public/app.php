<?php
require_once "../includes/visitor.inc.php";
global $smarty, $config, $mysqli;

$userId = Session::sessionId();
$userId = mysqli_real_escape_string($mysqli, trim($userId));

$action   = getRequestVar('act', '');
$site_lang = getRequestVar('lang', 'ru');
$action   = mysqli_real_escape_string($mysqli, trim($action));
$amount   = (int) getRequestVar('amount', 1);
$id       = (int) getRequestVar('id', 0);

switch ($action) {
    case 'add_to_cart':
        if (!empty($id) && !empty($userId)) {
            if ($product = $app->is_product_basket($id, $userId, $site_lang)) {
                if ($app->update_basket($product, $userId, $amount)) {
                    $app->success = 'Product update to cart!';
                } else {
                    $app->errors = 'Product not update to cart!';
                }
            } else {
                if ($app->add_to_basket($id, $userId, $amount, $site_lang)) {
                    $app->success = 'Product added to cart!';
                } else {
                    $app->errors = 'Product not added to cart!';
                }

            }
        }
        if (!empty($app->errors)) $result = array('code' => false, 'info' => $app->errors, 'lang' => $site_lang);
        if (!empty($app->success)) $result = array('code' => true, 'info' => $app->success, 'lang' => $site_lang);
        App::jsonResponse($result);
        break;
    case 'minus':
    case 'plus':
    case 'amount_input_product':
        if (!empty($id) && !empty($userId)) {
            if ($product = $app->get_product_basket($id, $userId)) {
                 $app->update_amount_basket($product, $amount, $userId);
                 $product = $app->get_product_basket($id, $userId);
                 $total_amount = $product["price"] * (int)$product['amount'];
                 $app->success = 'Product added to cart';
            } else {
                $app->errors = 'There is no such product';
            }
        }
        if (!empty($app->errors)) $result = array('code' => false, 'info' => $app->errors);
        if (!empty($app->success)) $result = array('code' => true, 'info' => $app->success, 'subtotal' => $app->price_format($total_amount));
        App::jsonResponse($result);
        break;
    case 'remove_product':
        if (!empty($id) && !empty($userId)) {
            if ($app->remove_product_basket($id, $userId)) {
                $app->success = 'Product removed!';
            } else {
                $app->errors = 'Product not removed!';
            }
        }
        if (!empty($app->errors)) $result = array('code' => false, 'info' => $app->errors);
        if (!empty($app->success)) $result = array('code' => true, 'info' => $app->success);
        App::jsonResponse($result);
        break;
    case 'remove_all_products':
        if (isset($userId) && !empty($userId)) {
            if ($app->remove_all_products_basket($userId, $site_lang)) {
                $app->success = 'All items removed from cart!';
            } else {
                $app->errors = 'Product not removed!';
            }
        }
        if (!empty($app->errors)) $result = array('code' => false, 'info' => $app->errors);
        if (!empty($app->success)) $result = array('code' => true, 'info' => $app->success);
        App::jsonResponse($result);
        break;
    case 'cart_products_amount':
        if (isset($userId) && !empty($userId)) {
            $amount = $app->products_count_basket($userId, $site_lang);
        }
        App::jsonResponse($amount);
        break;
    case 'cart_total_price':
        if (isset($userId) && !empty($userId)) {
            $price = $app->total_price_basket($userId, $site_lang);
            App::jsonResponse($app->price_format($price));
        }
        break;

}

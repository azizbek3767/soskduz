<?php

class SiteApp
{

    private static $table_baskets           = 'baskets';
    private static $table_orders            = 'orders';
    private static $table_postcard_orders   = 'postcard_orders';
    private static $table_articles          = 'articles';
    private static $table  = 'articles';

    public static $COOKIE_EXPIRY = 31536000;

    public $success;
    public $errors;

    /**
     * Проверка добавляемого товара в корзину
     * @param $articleId
     * @param $userId
     * @return int|null
     */
    public function is_product_basket($articleId, $userId, $site_lang)
    {
        if ($baskets = dbQuery(static::$table_baskets, DB_ARRAY, array('fields'=>'basketId, articleId, price, amount', 'where'=>"userId='$userId' AND articleId='$articleId' AND site_lang='$site_lang'"))) return $baskets;

        return null;
    }

    /**
     * Добавление товара в корзину
     * @param $articleId
     * @param $userId
     * @param $amount
     * @return bool
     */
    public function add_to_basket($articleId, $userId, $amount = 1, $site_lang)
    {
        // $addProduct = dbQuery(static::$table_articles, DB_ARRAY, array('fields'=>'articleId, title, price', 'where'=>"articleId='$articleId'"));

        if ($site_lang === 'ru') {
            $table = 'ls_articles';
        } else {
             $table = 'ls_'.$site_lang.'_articles';
        }
        $product = dbRawQuery("SELECT * FROM `$table` WHERE articleId = " . $articleId . " LIMIT 1");
        $newProduct['articleId']   = $product[0]['articleId'];
        $newProduct['price']       = $product[0]['price'];
        $newProduct['amount']      = $amount;
        $newProduct['userId']      = $userId;
        $newProduct['addedOn']      = gmdate('Y-m-d H:i:s');
        if (empty($site_lang)) {
            $newProduct['site_lang'] = 'ru';
        } else {
            $newProduct['site_lang'] = $site_lang;
        }
        if ( dbQuery(static::$table_baskets, DB_INSERT, array('values' => $newProduct))) {
            return true;
        }

        return false;
    }

    /**
     * Обновление товара в корзине
     * @param $product
     * @param $userId
     * @param $amount
     * @return bool
     */
    public function update_basket($product, $userId, $amount = 1)
    {
        $baskets["amount"] = $product["amount"] + $amount;
        if (dbQuery(static::$table_baskets, DB_UPDATE, array('where'=>"userId='$userId' AND basketId='$product[basketId]'", 'values' => $baskets))) {
            return true;
        }

        return false;
    }

    /**
     * Полкчение
     * @param $basketId
     * @param $userId
     * @return int|null
     */
    public function get_product_basket($basketId, $userId)
    {
        if ($product = dbQuery(static::$table_baskets, DB_ARRAY, array('fields' => 'basketId, articleId, amount, price', 'where'=>"basketId='$basketId' AND userId='$userId'"))) return $product;

        return null;
    }

    public function get_product_stock($articleId)
    {
        if ($article = dbQuery(static::$table_articles, DB_ARRAY, array('fields' => 'stock', 'where'=>"articleId='$articleId'"))) return $article['stock'];

        return false;
    }

    public function update_amount_basket($product, $amount, $userId)
    {
        if ($amount > 0) {
            $newCount['amount'] = $amount;
            dbQuery(static::$table_baskets, DB_UPDATE, array('where' => "basketId='$product[basketId]' AND userId='$userId'", 'values' => $newCount));
            return true;
        }
        return false;
    }


    /**
     * Удаление товара из корзины
     * @param $articleId
     * @param $userId
     * @return bool
     */
    public function remove_product_basket($articleId, $userId)
    {
        if (dbQuery(static::$table_baskets, DB_DELETE, array('where' => "userId='$userId' AND basketId='$articleId'"))) return true;

        return false;
    }

    /**
     * Удаление всех товаров из корзины
     * @param $userId
     * @return bool
     */
    public function remove_all_products_basket($userId, $site_lang)
    {
        if (dbQuery(static::$table_baskets, DB_DELETE, array('where' => "userId='$userId' AND site_lang='$site_lang'"))) return true;

        return false;
    }

    /**
     * Кол-во товара в корзине
     * @param $userId
     * @return int
     */
    public function products_count_basket($userId, $site_lang)
    {
        $count = 0;
        if ($amounts = dbQuery(static::$table_baskets, DB_ARRAYS, array('fields' => 'amount', 'where' => "userId='$userId' AND site_lang='$site_lang'"))) {
            foreach ($amounts as $amount) $count  += (int) $amount['amount'];

            return $count;
        }

        return 0;
    }

    /**
     * Общая сумма корзины
     * @param $userId
     * @return float|int
     */
    public function total_price_basket($userId, $site_lang)
    {
        $totalPrice = 0;
        if ($baskets = dbQuery(static::$table_baskets, DB_ARRAYS, array('fields'=>'price, amount', 'where'=>"userId='$userId' AND site_lang='$site_lang'"))) {
            foreach ($baskets as $key => $basket) {
                $int =  $basket["price"] * (int) $basket['amount'];
                $totalPrice = $totalPrice + $int;
            }
        }

        return $totalPrice;
    }

    /**
     * Формат цены
     * @param $price
     * @param bool $format
     * @return float|int|string
     */
    public function price_format($price, $format = true)
    {
        global $activeCurrency;

        $result = $price * $activeCurrency['course'];

        if ($format) $result = number_format($result, $activeCurrency['cent'], '.', $activeCurrency['thousands_separator']);

        if ($activeCurrency['codeName'] == '$' || $activeCurrency['codeName'] == '€') {
            $result = $activeCurrency['codeName'] . '' . $result;
        } else {
            $result = $result . ' <sup><span>' . $activeCurrency['codeName']. '</span></sup>';
        }

        return $result;
    }

    /**
     * Получение скиска товара из корзины
     * @param $userId
     * @return int|null
     */
    public function get_order_products($userId, $site_lang)
    {
        if (!empty($userId)) {
            $where = array();
            $totalPrice = 0;

            $where[] = "baskets.userId = '$userId'";
            $where[] = "baskets.site_lang = '$site_lang'";
            $join    = array('articles' => 'ON(articles.articleId = baskets.articleId)');
            $fields  = 'baskets.basketId, baskets.articleId, baskets.price, baskets.amount, articles.title, articles.url, articles.articul';

            $baskets = dbQuery(static::$table_baskets, DB_ARRAYS, array('fields' => $fields, 'where' => $where, 'join' => $join));
            foreach($baskets as $key => $basket){
                $int =  $basket["price"] * $basket['amount'];
                $totalPrice = $totalPrice + $int;
            }

            return $baskets;

        }

        return null;
    }

    public function create_order($orders, $userId, $user_name, $user_email, $user_phone, $user_message = '')
    {
        $totalPrice = 0;
        $orderIndexes = '';
        foreach($orders as $key => $order) {
            $orderIndexes[$order['articleId']] = $key;
            $int =  $order["price"] * $order['amount'];
            $totalPrice = $totalPrice + $int;
        }
        $createOrder['user_id']      = $userId;
        $createOrder['user_name']    = $user_name;
        $createOrder['email']        = $user_email;
        $createOrder['phone']        = $user_phone;
        $createOrder['comment']      = $user_message;
        $createOrder['state']        = 1;
        $createOrder['amount']       = $totalPrice;
        $createOrder['products']     = serialize($orders);
        $createOrder['product_ids']  = implode(",", array_keys($orderIndexes));
        $createOrder['created']      = gmdate('Y-m-d H:i:s');
        if ($orderId =  dbQuery(static::$table_postcard_orders, DB_INSERT, array('values' => $createOrder))) {
            return $orderId;
        }
        return false;
    }

}
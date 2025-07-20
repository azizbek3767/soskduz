<?php
/**
 * Created by PhpStorm.
 * User: nikolaimv
 * Date: 12/20/19
 * Time: 2:04 PM
 */

class Request
{
    private static $table_order = 'orders';

    public $success;
    public $errors;
    public $amountPayment = 0;
    public $note = array();

    public function __construct()
    {

    }

    
    /**
     * @param $amount
     * @param $userId
     * @param $params
     * @param $hash
     * @return int
     */
    public function create_order($amount, $userId, $params, $hash)
    {

        $order['amount']		= $amount;
        $order['state']			= 1;
        $order['user_id']		= $userId;
//        $order['user_name']		= $params['name'];
//        $order['phone']			= $params['phone'];
        //$order['email']         = $params['email'];
        $order['payment_method']= $params['payment'];
        

       // print_r($order);
        // вставляем запись полученный заказ в таблицу  orders
        return dbQuery(static::$table_order, DB_INSERT, array('values' => $order));
    }


}
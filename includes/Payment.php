<?php
/**
 * Created by PhpStorm.
 * User: nikolaimv
 * Date: 12/22/19
 * Time: 2:05 PM
 */

class Payment
{

    private static $table = 'payments';

    protected $payment;

    public function __construct()
    {
    }

    public function get_payment($name)
    {
         $this->payment = dbQuery(static::$table, DB_ARRAY, array('fields' => 'name, fileName, settings', 'where' => "fileName='$name'"));
         $this->payment['settings'] = unserialize($this->payment['settings']);

         return $this->payment;
    }
}
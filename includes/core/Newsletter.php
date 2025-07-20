<?php


class Newsletter
{
    private static $table_subscribe = 'subscribe';

    public $success;
    public $errors;


    public function is_subscribe($email)
    {
        if (dbQuery(static::$table_subscribe, DB_ARRAY, array( 'where'=>"email='$email'"))) return false;

        return true;
    }

    public static function register($email)
    {
        $subscribe['email']   = $email;
        $subscribe['addedOn'] = gmdate('Y-m-d H:i:s');
        if (dbQuery(static::$table_subscribe, DB_INSERT, array( 'values'=>$subscribe))) return true;

        return false;

    }
}
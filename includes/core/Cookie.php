<?php
/**
 * Class Cookie
 */
class Cookie
{
    public static function set($name, $value, $expiry)
    {
        if (setCookie($name, $value, time()+$expiry, '/')) {
            return true;
        }
        return false;
    }

    public static function delete($name)
    {
        self::set($name, '', time() -1);
    }

    public static function get($name)
    {
        return $_COOKIE[$name];
    }

    public static function exists($name)
    {
        return isset($_COOKIE[$name]);
    }

}
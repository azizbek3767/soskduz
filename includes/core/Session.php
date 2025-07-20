<?php

/**
 * Class Session
 */
class Session
{
    /**
     * start session
     */
    public static function start()
    {
        if (empty($_SESSION)){
            session_start();
        }
    }

    /**
     * @return string
     */
    public static function sessionId()
    {
        return session_id();
    }

    /**
     * @param $name
     * @return string
     */
    public static function session_name($name)
    {
        return session_name($name);
    }

    /**
     * @param $name
     * @return bool
     */
    public static function exists($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    /**
     * Get a session Value
     * @param $name
     * @return mixed
     */
    public static function get($name)
    {
        if (!empty($_SESSION[$name]))  return $_SESSION[$name];

        return null;
    }

    /**
     * @param $name
     * @return string
     */
    public static function getImageSession($name)
    {
       return empty($_SESSION[$name]) ? md5(microtime()) : $_SESSION[$name];
    }
    /**
     * Set up a session Value
     * @param $name
     * @param $value
     * @return mixed
     */
    public static function set($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    /**
     * Write off a session Value
     * @param $name
     */
    public static function delete($name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function finish() {
        session_write_close();
    }

    /**
     * End all session Value
     * Use setcookie() Delete the client's SESSION ID
     */
    public static function clear()
    {
            session_unset();
            session_destroy();
    }

    /**
     * Проверка session_id
     */
    public static function check_session()
    {
        if (!empty($_POST)) {
            if (empty($_POST['session_id']) || $_POST['session_id'] != session_id()) {
                unset($_POST);
                return false;
            }
        }
        return true;
    }

    public static function uagent_no_version()
    {
        $uagent = $_SERVER['HTTP_USER_AGENT'];
        $regx = '/\/[a-zA-Z0-9.]+/';
        $newString = preg_replace($regx, '', $uagent);
        return $newString;
    }

}
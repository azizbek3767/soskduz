<?php

require_once 'StringGenerator.php';
/**
 * Class App
 */
class App
{
    
    private static $tokenLength = 64;
    private static $randLength = 128;
    private static $token = '';
    

    /**
     * @param $url
     */
    public static function redirect($url)
    {
        if(!headers_sent()) {
            header('Location: '.$url);
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>';exit;
        }
    }

    /**
     * @param $resp
     */
    public static function jsonResponse($resp)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Cache-Control: must-revalidate");
        header("Pragma: no-cache");
        header("Expires: -1");
        http_response_code(200);
        echo json_encode($resp);
        exit;
    }

    /**
     * Valid email
     * @param $email
     * @return bool
     */
    public static function is_validate_email($email)
    {
        if (!preg_match('/^[A-Z0-9\._\-]+@[A-Z0-9\.\-]+\.[A-Z]{2,4}$/i', $email)) return false;

        return true;
    }

    /**
     * @param $website_language
     * @return mixed
     */
    public static function site_language($website_language)
    {
        if (is_file(THEME_ROOT . '/lang/' . $website_language . '.php')) {
            $site_language = require_once THEME_ROOT . '/lang/' . $website_language . '.php';
        } else {
            $site_language = require_once THEME_ROOT . '/lang/ru.php';
        }

        return $site_language;
    }


    /**
     * Создает токен csrf и сохраняет его в $_SESSION
     * @method generateAuthCsrfToken
     * @return bool|string значение токена, установленного в $ _SESSION
     * @throws Exception
     */
    public static function generateAuthCsrfToken()
    {
        //$token = base64_encode(openssl_random_pseudo_bytes(32));
//        if (function_exists("random_bytes")) {
//            self::$token = bin2hex(random_bytes(self::$randLength));
//        } elseif (function_exists("openssl_random_pseudo_bytes")) {
//            self::$token = bin2hex(openssl_random_pseudo_bytes(self::$randLength));
//        } else {
//            for ($i = 0; $i < 128; ++$i) {
//                $r = mt_rand(0, 35);
//                if ($r < 26) {
//                    $c = chr(ord('a') + $r);
//                } else {
//                    $c = chr(ord('0') + $r - 26);
//                }
//                self::$token .= $c;
//            }
//        }
//        $token =  substr(self::$token, 0, self::$tokenLength);

        $token = StringGenerator::randomUuid();
        Session::set('token', $token);
        return $token;

    }
    
    /**
     * Проверьте, является ли токен действительным
     * @param  string   $token значение, которое было сгенерировано
     * @return boolean  вернувшийся токен был верным
     */
    public static function isValidCsrfToken($token)
    {
        return (Session::exists('token') && Session::get('token') == $token);
    }

    /**
     * Создает скрытый ввод для использования в форме для csrf
     * @method initCsrf
     * @return string
     * @throws Exception
     */
    public static function initCsrf()
    {
        return '<input type="hidden" name="token" id="token" value="' . self::generateAuthCsrfToken() . '" />';
    }



}
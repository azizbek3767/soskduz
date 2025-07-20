<?php
/**
 *  PayPal IPN Listener
 *  Класс для прослушивания и обработки уведомлений о мгновенных платежах (IPN) с сервера PayPal.
 */
class Ipn
{
    /**
     * Если true, рекомендованная библиотека cURL PHP используется для отправки сообщения обратно в PayPal.
     * Если flase, то используется fsockopen (). По умолчанию true.
     *  @var boolean
     */
    public $use_curl = false;

    /**
     * Если true, явно устанавливает cURL для использования SSL версии 3. Используется это, если cURL скомпилирован с GnuTLS SSL.
     *  @var boolean
     */
    public $force_ssl_v3 = false;

    /**
     *  Если true, cURL будет использовать CURLOPT_FOLLOWLOCATION, чтобы следовать за любыми заголовками «Location: ...» в ответе.
     *  @var boolean
     */
    public $follow_location = false;

    /**
     *  Если значение равно true, безопасное соединение SSL (порт 443) используется для обратной отправки в соответствии с рекомендациями PayPal.
     *  Если false, используется стандартное соединение HTTP (порт 80). По умолчанию true.
     *  @var boolean
     */
    public $use_ssl = true;

    /**
     *  Если true, URI песочницы PayPal www.sandbox.paypal.com используется для обратной записи.
     *  Если false, используется действующий URI www.paypal.com. По умолчанию false.
     *  @var boolean
     */
    public $use_sandbox = false;

    /**
     *  Время ожидания в секундах, в течение которого сервер PayPal отвечает до истечения времени ожидания. По умолчанию 30 секунд.
     *  @var int
     */
    public $timeout = 30;

    private $post_data       = array();
    private $post_uri        = '';
    private $response_status = '';
    private $response        = '';
    
    private static $table_transactions = 'transactions_paypal';
    private static $table_orders       = 'orders';
    
    const PAYPAL_HOST = 'www.paypal.com'; // ipnpb.paypal.com / www.paypal.com
    const SANDBOX_HOST = 'ipnpb.sandbox.paypal.com'; // ipnpb.sandbox.paypal.com / www.sandbox.paypal.com

    /**
     * Post Back Using cURL
     * Отправляет сообщение обратно в PayPal с помощью библиотеки cURL. Вызывается методом processIpn(), если свойство use_curl имеет значение true.
     * Выдает исключение, если сообщение не удается.
     * Заполняет свойства response, response_status и post_uri в случае success.
     *
     * @param  string  Данные публикации в виде строки в кодировке URL
     * @throws Exception
     */
    protected function curlPost($encoded_data)
    {
        if ($this->use_ssl) {
            $uri = 'https://'.$this->getPaypalHost().'/cgi-bin/webscr';
            $this->post_uri = $uri;
        } else {
            $uri = 'http://'.$this->getPaypalHost().'/cgi-bin/webscr';
            $this->post_uri = $uri;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        //curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__)."/cert/api_cert_chain.crt");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->follow_location);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);

        if ($this->force_ssl_v3) {
            curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        }

        $this->response = curl_exec($ch);
        $this->response_status = strval(curl_getinfo($ch, CURLINFO_HTTP_CODE));

        if ($this->response === false || $this->response_status == '0') {
            $errno = curl_errno($ch);
            $errstr = curl_error($ch);
            throw new Exception("cURL error: [$errno] $errstr");
        }
    }

    /**
     * Post Back Using fsockopen()
     * Отправляет сообщение обратно в PayPal с помощью функции fsockopen (). Вызывается методом processIpn(), если свойство use_curl имеет значение false.
     * Выдает исключение, если сообщение не удается. Заполняет свойства response, response_status и post_uri в случае success.
     * @param  string  The post data as a URL encoded string
     * @throws Exception
     */
    protected function fsockPost($encoded_data)
    {
        if ($this->use_ssl) {
            $uri = 'ssl://'.$this->getPaypalHost();
            $port = '443';
            $this->post_uri = $uri.'/cgi-bin/webscr';
        } else {
            $uri = $this->getPaypalHost(); // no "http://" in call to fsockopen()
            $port = '80';
            $this->post_uri = 'http://'.$uri.'/cgi-bin/webscr';
        }
        $fp = fsockopen($uri, $port, $errno, $errstr, $this->timeout);

        if (!$fp) {
            throw new Exception("fsockopen error: [$errno] $errstr");
        }
        $header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
        $header .= "Host: ".$this->getPaypalHost()."\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: ".strlen($encoded_data)."\r\n";
        $header .= "Connection: Close\r\n\r\n";

        fputs($fp, $header.$encoded_data."\r\n\r\n");

        while(!feof($fp)) {
            if (empty($this->response)) {
                // извлечь статус HTTP из первой строки
                $this->response .= $status = fgets($fp, 1024);
                $this->response_status = trim(substr($status, 9, 4));
            } else {
                $this->response .= fgets($fp, 1024);
            }
        }

        fclose($fp);
    }

    private function getPaypalHost()
    {
        if ($this->use_sandbox) return self::SANDBOX_HOST;
        else return self::PAYPAL_HOST;
    }

    /**
     * Get POST URI
     * Возвращает URI, который использовался для отправки сообщения обратно в PayPal.
     * Это может быть полезно для устранения проблем с подключением.
     * URI по умолчанию будет "ssl://www.sandbox.paypal.com:443/cgi-bin/webscr"
     *
     * @return string
     */
    public function getPostUri()
    {
        return $this->post_uri;
    }

    /**
     * Get Response
     * Возвращает весь ответ от PayPal в виде строки, включая все заголовки HTTP.
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Get Response Status
     * Возвращает код состояния ответа HTTP от PayPal. Это должно быть "200", если сообщение было успешным (successful).
     * @return string
     */
    public function getResponseStatus()
    {
        return $this->response_status;
    }

    /**
     *  Get Text Report
     * Возвращает отчет о транзакции IPN в текстовом формате.
     * Это полезно в электронных письмах для процессоров заказов и системных администраторов.
     * Переопределите этот метод в своем собственном классе, чтобы настроить отчет.
     *
     *  @return string
     */
    public function getTextReport()
    {
        $r = '';
        // дата и POST URL
        for ($i = 0; $i < 80; $i++) { $r .= '-'; }
        $r .= "\n[".date('m/d/Y g:i A').'] - '.$this->getPostUri();
        if ($this->use_curl) $r .= " (curl)\n";
        else $r .= " (fsockopen)\n";

        // HTTP Response
        for ($i = 0; $i < 80; $i++) { $r .= '-';}
        $r .= "\n{$this->getResponse()}\n";

        // POST vars
        for ($i = 0; $i < 80; $i++) { $r .= '-';}
        $r .= "\n";

        foreach ($this->post_data as $key => $value) {
            $r .= str_pad($key, 25)."$value\n";
        }
        $r .= "\n\n";

        return $r;
    }
    
    public function getTextTransactions()
    {
/*
        $arr = array();
        foreach ($this->post_data as $key => $value) {
            $arr[$key] = $value;
        }
*/
        return $this->post_data;
    }
    
    

    /**
     * Process IPN
     * Обрабатывает сообщение IPN обратно в PayPal и анализирует ответ.
     * Вызовите этот метод из сценария прослушивателя IPN.
     * Возвращает true, если ответ вернулся как «VERIFIED», false, если ответ вернулся «INVALID», и выдает исключение, если произошла ошибка.
     *
     *  @param array
     *
     *  @return boolean
     * @throws Exception
     */
    public function processIpn($post_data = null)
    {
        $encoded_data = 'cmd=_notify-validate';

        if ($post_data === null) {
            // использовать необработанные данные POST
            if (!empty($_POST)) {
                $this->post_data = $_POST;
                $encoded_data .= '&'.file_get_contents('php://input');                
            } else {
                throw new Exception("No POST data found.");
            }
        } else {
            // использовать предоставленный массив данных
            $this->post_data = $post_data;

            foreach ($this->post_data as $key => $value) {
                $encoded_data .= "&$key=".urlencode($value);
            }
        }
        if ($this->use_curl) {
            $this->curlPost($encoded_data);
        } else {
            $this->fsockPost($encoded_data);
        }
        
        if (!empty($this->post_data)) $this->insert_transactions($this->post_data); 

        if (strpos($this->response_status, '200') === false) {
            throw new Exception("Invalid response status: ".$this->response_status);
        }
       
        if (strpos($this->response, "VERIFIED") !== false) {
             if (!empty($this->post_data)) $this->update_order($this->post_data['invoice']);
            return true;
            
        } elseif (strpos($this->response, "INVALID") !== false) {
            
            return false;
        } else {
            
            throw new Exception("Unexpected response from PayPal.");
        }
    }

    public function insert_transactions($post_data)
    {

        $transactions['transaction_id']   = $post_data['txn_id'];
        $transactions['payer_id']         = $post_data['payer_id'];
        $transactions['amount']           = $post_data['mc_gross'];
        $transactions['order_id']         = $post_data['invoice'];
        dbQuery(static::$table_transactions, DB_INSERT, array('values' => $transactions));
        
        return true;
    }
    
    public function update_order($orderId)
    {

        dbQuery(static::$table_orders, DB_UPDATE, array( 'where' => "id = '$orderId'", 'values' => "state = 2"));
    }
    
    /**
     * Require Post Method
     * Выдает исключение и устанавливает заголовок ответа HTTP 405, если метод запроса не был POST.
     * @throws Exception
     */
    public function requirePostMethod()
    {
        if ($_SERVER['REQUEST_METHOD'] && $_SERVER['REQUEST_METHOD'] != 'POST') {
            header('Allow: POST', true, 405);
            throw new Exception("Invalid HTTP request method.");
        }
    }
}

<?php

require("Exception.php");
require("PHPMailer.php");
require("SMTP.php");

class Feedback
{

    private $telegram_send;
    private $private_key;
    private $telegram_token;
    private $telegram_chat_id;

    private $send_email;

    public $errors;
    public $success = [];
    public $type;

    private $captchaEnabled;
    private $allowCaptcha;
    private $url = 'https://www.google.com/recaptcha/api/siteverify';
    private $response;

    public $smarty;
    private $config;
    protected $mail;

    /**
     * Feedback constructor.
     */
    public function __construct($action = 'default')
    {
         global $config, $smarty;

        $this->config = $config;
        $this->smarty = $smarty;

        $this->mail = new PHPMailer\PHPMailer\PHPMailer();

        if ($this->config['mail_transport'] == 'smtp') {
            $this->mail->SMTPAuth = true;
            $this->mail->isSMTP();
            $this->mail->CharSet    = $this->config['charset'];
            $this->mail->SMTPSecure = $this->config['smtp_secure'];
            $this->mail->Port       = $this->config['smtp_port'];

            if ($action == 'vacancy') {
                $this->mail->Host       = $this->config['smtp_server3'];
                $this->mail->Username   = $this->config['smtp_user3'];
                $this->mail->Password   = $this->config['smtp_pass3'];
                $this->send_email       = $this->config['smtp_user3'];
            } elseif ($action == 'order') {
                $this->mail->Host       = $this->config['smtp_server2'];
                $this->mail->Username   = $this->config['smtp_user2'];
                $this->mail->Password   = $this->config['smtp_pass2'];
                $this->send_email       = $this->config['smtp_user2'];
            } else {
                $this->mail->Host       = $this->config['smtp_server'];
                $this->mail->Username   = $this->config['smtp_user'];
                $this->mail->Password   = $this->config['smtp_pass'];
                $this->send_email       = $this->config['smtp_user'];
            }


        } else {
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPAutoTLS = false;
            $this->mail->SMTPSecure = false;
            $this->mail->Host = $this->config['smtp_server'];
            $this->mail->Port = 25;
            $this->mail->IsHTML(true);
            $this->mail->Username = "";
            $this->mail->Password = "";
        }

        if ($config['telegram_send'] == 1){
            $this->telegram_token   = $config['telegram_token'];
            $this->telegram_chat_id = $config['telegram_chat_id'];
        }
        if ($config['allow_recaptcha'] == 1) {
            $this->private_key = $config['recaptcha_private_key'];
        }
    }

    /**
     * получение параметра, включена капча или нет
     * @param $param
     */
    public function getCaptchaEnabled($param)
    {
        $this->captchaEnabled = $param;
    }

    /**
     * @return mixed
     */
    public function setCaptchaEnabled()
    {
        return $this->captchaEnabled;
    }

    /**
     * тип капти
     * @param $param
     */
    public function getAllowCaptcha($param)
    {
        $this->allowCaptcha = $param;
    }

    /**
     * @return mixed
     */
    public function setAllowCaptcha()
    {
        return $this->allowCaptcha;
    }


    /**
     * метод для проверки длины строки
     * @param $string
     * @param $minLength
     * @param $maxLength
     * @return bool
     */
    public function checkStringLength($string, $minLength, $maxLength)
    {
        $length = mb_strlen($string, $this->config['charset']);
        if (($length < $minLength) || ($length > $maxLength)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * метод проверки имени (name)
     * @param $name
     */
    public function checkName($name)
    {
        if (!empty($name)) {
            if (!$this->checkStringLength($name, 2, 30)) {
                $this->errors = 'Поля имя содержит недопустимое количество символов!';
            }
        } else {
            $this->errors = 'Не допустимо оставлять поле имя пустым!';
        }
    }

    /**
     * получение параметра, включен теленрам или нет
     * @param $telegram
     */
    public function telegram($telegram)
    {
        $this->telegram_send = $telegram;
    }


    /**
     * отправка письма в телеграм
     * @param $txt
     */
    public function sendTelegram($txt)
    {
        if ($this->telegram_send == 1) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . $this->telegram_token . '/sendMessage');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'chat_id=' . $this->telegram_chat_id . '&parse_mode=html&text=' . $txt);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

            curl_exec($ch);
            curl_close($ch);
        }
    }

    /**
     * проверка капча (reCaptcha:v3)
     * @param $recaptcha_token
     * @return bool
     */
    public function captchaToken($recaptcha_token)
    {    
        // $this->response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$this->private_key."&response={$recaptcha_token}");

    	$ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(
                array(
                    'secret' => $this->private_key,
                    'response' => $recaptcha_token,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ),
                '', '&'
            )
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close ($ch);

		$response = json_decode($response, true);

//        var_dump($response);die();
        
        if ($response['success'] == true && $response['score'] > 0.5) {
            return true;
        } else {
            $this->errors = '* You did not pass the test, I am a robot 1';
        }

    }

    /**
     * Анти бот
     * @param $bot_one
     * @param $bot_two
     * @param $bot_email
     * @return bool
     */
    public function antiBot($bot_one, $bot_two, $bot_email)
    {
        if (trim($bot_one) != date('Y')){
            if (trim($bot_one) != trim($bot_two)){
                $this->errors =  'I am a robot! Picked up captcha';
            } elseif (empty($bot_two)) {
                $this->errors =  'Error: empty response.';
            } else {
                $this->errors = 'Error: wrong answer.';
            }
        } elseif (!empty($bot_email)) {
            $this->errors = 'Bots go no!';
        } else {
            return true;
        }
    }

    /**
     * Отправка письма PHPMailer
     * @param $subject
     * @param $htmlBody
     * @param $user_email
     * @param $file
     * @return bool|string
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function sendFeedbackSMTP($subject, $htmlBody, $user_email = '', $file = '')
    {

	    if (!empty($file)) {
            if ($file['error'] == UPLOAD_ERR_OK){
                $this->mail->AddAttachment($file['tmp_name'], $file['name']);
            }
        }

        $this->mail->setFrom($this->send_email, 'Отклик на вакансию');
        $this->mail->addAddress($this->send_email, $this->config['website_name']);
        $this->mail->addAddress($user_email, $this->config['website_name']);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body    = $htmlBody;

        //print_r($mail);

        if(!$this->mail->send()) {
            return $this->errors = $this->mail->ErrorInfo;

        } else {
            return true;
        }
    }


}

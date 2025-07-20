<?php
include('admin.inc.php');
require "Mailer/Exception.php";
require "Mailer/PHPMailer.php";
require "Mailer/SMTP.php";

class SubscribeSend
{
    private static $table = 'subscribe';
    public $smarty;
    public $mail;
    private $config;

    protected $subject;
    protected $htmlBody;

    public $errors;
    public $success;
    public $subscribers = [];
    public $send;

    public function __construct()
    {
        global $config, $smarty;



        $this->config = $config;
        $this->smarty = $smarty;
        $this->mail = new PHPMailer\PHPMailer\PHPMailer();

        if ($this->config['mail_transport'] == 'smtp') {
            $this->mail->SMTPAuth = true;
            $this->mail->isSMTP();
            $this->mail->CharSet    = $this->config['charset'];
            $this->mail->Host       = $this->config['smtp_server'];
            $this->mail->Username   = $this->config['smtp_user'];
            $this->mail->Password   = $this->config['smtp_pass'];
            $this->mail->SMTPSecure = $this->config['smtp_secure'];
            $this->mail->Port       = $this->config['smtp_port'];
            $this->mail->IsHTML(true);
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
    }

    /**
     * send
     * @param $subject
     * @param $message
     * @return bool|string
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function send($subject, $message)
    {
        $this->subject = $this->validate($subject);
        $this->htmlBody = $message;

        $this->mail->isHTML(true);
        $this->mail->Subject = $this->subject;
        $this->mail->Body    = $this->htmlBody;
        $this->mail->setFrom($this->config['smtp_user'], $this->config['company_name']);

       // $this->subscribers = dbQuery('customers', DB_ARRAYS, array('fields'=>'userId, email, name', 'where'=>"subscribe='yes' AND status='active'"));
        $this->subscribers = dbQuery(static::$table, DB_ARRAYS, array('fields'=>'userId, email'));
        
        foreach($this->subscribers as $subscribe){
            $this->mail->addAddress($subscribe['email'], $this->subject);
        }

        print_r($this->mail);
        if(! $this->mail->send()) {
            $this->errors =  $this->mail->ErrorInfo;
            return $this->errors;
        } else {
            return true;
        }
    }

    /**
     * @param $data
     * @return string
     */
    public function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars(strip_tags($data, ENT_QUOTES));
        return $data;
    }

}
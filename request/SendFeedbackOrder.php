<?php

/**
 * Class SendFeedbackOrder
 */
class SendFeedbackOrder
{
    private static $table_order = 'orders';
    public $smarty;
    public $mail;

    private $config;
    public $feedbackData;
    public $errors;

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
    

    public function get_order($id)
    {
        return $order = dbQuery(
            static::$table_order,
            DB_ARRAY, array(
                'fields'=>'id, product_name, institution, amount, user_name, passport_id, birth, email, phone, citizenship, degree, direction, payment_method, created',
                'where' => "id='$id'"
            )
        );

        //print_r($this->feedbackData);

        $this->smarty->assign('userData', $this->feedbackData);

        $this->mail->setFrom($this->config['smtp_user'], $this->config['company_name'], '');
        $this->mail->addAddress($this->config['smtp_user']);
        $this->mail->addAddress($this->feedbackData['email']);
        $this->mail->Subject = $this->feedbackData['product_name'];
        $this->mail->Body    = $this->smarty->fetch('mail/feedback-send.tpl');

        if (!$this->mail->send()) {
            $this->errors = $this->mail->ErrorInfo;
            return false;
        }
        return true;
    }

    /**
     * @param $id
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function set_data($id)
    {
        $this->feedbackData = $this->get_order($id);

        //print_r($this->feedbackData);

        $this->smarty->assign('userData', $this->feedbackData);

        $this->mail->setFrom($this->config['smtp_user'], $this->config['company_name'], '');
        $this->mail->addAddress($this->config['smtp_user']);
        $this->mail->addAddress($this->feedbackData['email']);
        $this->mail->Subject = $this->feedbackData['product_name'];
        $this->mail->Body    = $this->smarty->fetch('mail/feedback-send.tpl');

        if (!$this->mail->send()) {
            $this->errors = $this->mail->ErrorInfo;
            return false;
        }
        return true;
    }
    
    /**
     * @param $id
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function successful_payme_notification($status, $text)
    {

        $this->smarty->assign('userData', $text);

        $this->mail->setFrom($this->config['smtp_user'], $this->config['company_name'], '');
        $this->mail->addAddress($this->config['smtp_user']);
        $this->mail->addAddress($text['email']);
        $this->mail->Subject = $text['product_name'];
        $this->mail->Body    = $this->smarty->fetch('mail/feedback-send.tpl');

        if (!$this->mail->send()) {
            $this->errors = $this->mail->ErrorInfo;
            return false;
        }
        return true;
    }
    
    
    public function successful_payment_notification($status, $text)
    {
        if ($text['mc_currency'] == 'EUR') { 
            $text['currency'] = '€';
        } elseif ($text['mc_currency'] == 'USD') { 
            $text['currency'] = '$';
        } else {
            $text['currency'] = '';
        }
        
       // $text = $this->get_order($text['invoice']);
        
        $this->smarty->assign('userData', $text);

        $this->mail->setFrom($this->config['smtp_user'], $this->config['company_name'], '');
        $this->mail->addAddress($this->config['smtp_user']);
        $this->mail->addAddress($text['payer_email']);
        //$this->mail->addAddress($payer_email);
        $this->mail->Subject = 'Подтверждение об оплате';
        $this->mail->Body    = $this->smarty->fetch('mail/successful-payment-notification.tpl'); // successful-payment-notification.tpl

        if (!$this->mail->send()) {
            $this->errors = $this->mail->ErrorInfo;
            return false;
        }
        return true;
        
    }

}
<?php

include_once('../includes/visitor.inc.php');

class Psp
{
    private $payment_method;
    private $VENDORID;
    private $RETURNURL;

    private $SECTETKEY;

    public function __construct()
    {
        $this->payment_method = new Payment();
        $this->payment_method = $this->payment_method->get_payment('psp');
        $this->VENDORID = $this->payment_method['settings']['vendor_id'];
        $this->SECTETKEY  = $this->payment_method['settings']['secret_key'];
        $this->RETURNURL = $this->payment_method['settings']['return_url'];
    }

    public function form($order_id, $amount, $note, $currency, $auto = true)
    {
        if (!$order_id) {
            return null;
        }

        $button = '<button type="submit" class="send">Перейти к оплате</button>';
        if ($auto) {
            $auto = '<script type="text/javascript">payment.submit()</script>';
            $button = '';
        }


        $fields = $this->fields($order_id, $amount, $note, $currency);

        return <<<HTML
    <form action="https://agr.uz/pay" name="payment" method="post">
        {$fields}
        {$button}
    </form>
    {$auto}
HTML;
    }


    public function fields($order_id, $amount, $note, $currency): string
    {
        $timestamp = round(microtime(true) * 1000);

        $params = array(
            'VENDOR_ID' => $this->VENDORID,
            'MERCHANT_TRANS_ID' => $order_id,
            'MERCHANT_TRANS_AMOUNT' => $amount,
            'MERCHANT_CURRENCY' => $currency,
            'MERCHANT_TRANS_RETURN_URL' => $this->RETURNURL,
            'MERCHANT_TRANS_NOTE' => join(', ', $note),
            'SIGN_TIME' => $timestamp,
        );

        $params['SIGN_STRING'] = md5(
            $this->SECTETKEY .
            $params['VENDOR_ID'] .
            $params['MERCHANT_TRANS_ID'] .
            $params['MERCHANT_TRANS_AMOUNT'] .
            $params['MERCHANT_CURRENCY'] .
            $timestamp
        );
        $html = '';
        foreach ($params as $field => $val) {
            $html .= '<input type="hidden" name="' . $field . '" value="' . $val . '" />' . PHP_EOL;
        }
        return $html;
    }
}



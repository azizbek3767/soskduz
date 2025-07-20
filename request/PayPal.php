<?php
include_once('../includes/visitor.inc.php');
include_once('../includes/Payment.php');
/**
 * Class PayPal
 */
class PayPal
{

    //const SUCCESS  = SITE_URL.'/payment-success.htm';
    //const FAILED   = SITE_URL.'/failed.htm';
    const NOTIFY   = GLOBAL_URL.'/request/callback.php';

    //private $endpoint;
    private $paypal_url;
    //private $host;

    private $payment_method;
    private $MERCHANT;
    public $CURRENCY;

    public function __construct()
    {
        $this->payment_method = new Payment();
        $this->payment_method = $this->payment_method->get_payment('paypal');
        $this->MERCHANT = $this->payment_method['settings']['merchant'];
        $this->CURRENCY = $this->payment_method['settings']['currency'];

        //$this->endpoint = '/nvp';
        if ($this->payment_method['settings']['mode'] == 'live') {
            //$this->host = "api-3t.paypal.com";
            $this->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
        } else {
            //sandbox
            //$this->host = "api-3t.sandbox.paypal.com";
            $this->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        }
    }

    public function form($order_id, $amount, $name, $lang = '', $auto = true)
    {
        if (!$order_id) return null;

        $button = '<button type="submit"></button>';
        if ($auto) {
            $auto   = '<script type="text/javascript">paypal.submit()</script>';
            $button = '';
        }
       
        if (isset($lang) && !empty($lang)) {
           $SUCCESS = SITE_URL . '/' . $lang . '/payment-success.htm';
           $FAILED  =  SITE_URL . '/' . $lang . '/failed.htm';
            
        } else {
            $SUCCESS  = SITE_URL.'/payment-success.htm';
            $FAILED   = SITE_URL.'/failed.htm';
        }


        $fields = $this->fields($order_id, $amount, $name, $lang, $SUCCESS, $FAILED);

        return <<<HTML
<form action="$this->paypal_url" method="post" name="paypal" target="_blank">
{$fields}
{$button}
</form>
{$auto}
HTML;

    }


    public function fields($order_id, $amount, $name, $lang = '', $SUCCESS, $FAILED)
    {
        $fields = array(
            'cmd'           => '_xclick',
            'charset'       => 'utf-8',
            'business'      => $this->MERCHANT,
            'currency_code' => $this->CURRENCY,
            'invoice'       => $order_id,
            'item_name'     => $name,
            'amount'        => $amount,
            'return'        => $SUCCESS,
            'cancel_return' => $FAILED,
            'notify_url'    => self::NOTIFY,
            'rm'            => 'POST'
        );

        $html = '';

        foreach ($fields as $field => $val) {
            $html .= '<input type="hidden" name="' . $field . '" value="' . $val . '" />' . PHP_EOL;
        }

        return $html;
    }


}


//<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
//    <div>
//        <label for="amount">Amount for transfer</label>
//        <input id="amount" type="text" />
//    </div>
//    <input type="hidden" name="cmd" value="_donations" />
//    <input type="hidden" name="charset" value="utf-8" />
//    <input type="hidden" name="bussiness" value="business@paypal.acc" />
//    <input type="hidden" name="item_name" value="Item short name" />
//    <input type="hidden" name="currency_code" value="USD" />
//    <input type="hidden" name="undefined_quantity" value="1" />
//    <input type="hidden" name="return" value="https://site.com/" />
//    <input type="hidden" name="cancel_return" value="https://site.com/" />
//    <input type="hidden" name="notify_url" value="https://site.com/paypal/result" />
//    <input type="hidden" name="custom" value="userId:1|orderId:25" />
//    <input type="hidden" name="button_subtype" value="services" />
//    <input type="hidden" name="no_note" value="1" />
//    <input type="hidden" name="no_shipping" value="1" />
//    <input type="hidden" name="rm" value="" />
//    <div>
//        <input type="submit" value="Transfer" />
//    </div>
//</form>
<?php
include_once('../includes/visitor.inc.php');


class Click
{

    private $payment_method;
    private $MERCHANTID;
    private $SERVICEID;
    private $SECTETKEY;

    public function __construct()
    {
        $this->payment_method = new Payment();
        $this->payment_method = $this->payment_method->get_payment('click');
       // print_r($this->payment_method['settings']);
        $this->MERCHANTID = $this->payment_method['settings']['merchant_id'];
        $this->SERVICEID  = $this->payment_method['settings']['service_id'];
        $this->SECTETKEY  = $this->payment_method['settings']['secret_key'];

    }

	public function form($order_id, $amount, $note, $auto = true)
	{
    	 
		if (!$order_id) return null;

        $button = '<button type="submit" class="send">Перейти к оплате</button>';
		if ($auto) {
			$auto = '<script type="text/javascript">payment.submit()</script>';
            $button = '';
		}
        
		$fields = $this->fields($order_id, $amount, $note);

return <<<HTML
<form action="https://my.click.uz/pay/" name="payment" method="post">
{$fields}
{$button}
</form>
{$auto}
HTML;

	}


	public function fields($order_id, $amount, $note)
	{

		$date   = date("Y-m-d h:i:s");
		$amount = number_format($amount, 2, '.', '');
       
		$fields = array(
			'MERCHANT_ID'           => $this->MERCHANTID,
			'MERCHANT_SERVICE_ID'   => $this->SERVICEID,
			'MERCHANT_TRANS_ID'     => $order_id,
			'MERCHANT_TRANS_AMOUNT' => $amount,
			'MERCHANT_TRANS_NOTE'   => join(', ', $note),
			'SIGN_TIME'             => $date,
			'SIGN_STRING'           => md5($date . $this->SECTETKEY . $this->SERVICEID . $order_id . $amount),
			'RETURN_URL'            => SITE_URL,
		);
        
		$html = '';

		foreach ($fields as $field => $val) {
			$html .= '<input type="hidden" name="' . $field . '" value="' . $val . '" />' . PHP_EOL;
		}

		return $html;
	}
	
}



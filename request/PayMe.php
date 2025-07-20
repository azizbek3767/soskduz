<?php
    include_once('../includes/visitor.inc.php');
    include_once('../includes/Payment.php');

class PayMe
{

    private $payment_method;
    private $MERCHANT;
    private $MODE;
    
    public $form_action;

    public function __construct()
    {
        $this->payment_method = new Payment();
        $this->payment_method = $this->payment_method->get_payment('payme');
        $this->MERCHANT = $this->payment_method['settings']['merchant'];
        $this->MODE     = $this->payment_method['settings']['mode'];
        
        if ($this->MODE == 'sandbox') {
            $this->form_action = 'https://test.paycom.uz';
        } else {
             $this->form_action = 'https://checkout.paycom.uz/';
        }
        
    }

    public function form($order_id, $amount, $note, $lang = '', $auto = true)
	{
		if (!$order_id) return null;

		$button = '<button type="submit"></button>';
		if ($auto) {
			$auto   = '<script type="text/javascript">payme.submit()</script>';
			$button = '';
		}
/*
		if (isset($lang) && !empty($lang)) {
           $CALLBACK = SITE_URL . '/' . $lang . '/callback/';
        } else {
            $CALLBACK  = SITE_URL.'/callback/';
        }
*/

		$fields = $this->fields($order_id, $amount, $note, $lang);
        
       
        // https://checkout.paycom.uz/ / использовать для теста https://test.paycom.uz
		$form = <<<FORM
<form action="{$this->form_action}" method="post" name="payme">
{$fields}
{$button}
</form>
{$auto}
FORM;

return $form;

	}

	public function fields($order_id, $amount, $note, $lang = 'ru')
	{
		$fields = array(
			'merchant'          => $this->MERCHANT,
			'amount'            => $amount.'00',
			'account[order_id]' => $order_id,
			'lang'              => $lang,
			'callback'          => SITE_URL
		);

		$html = '';

		foreach ($fields as $field => $val) {
			$html .= '<input type="hidden" name="' . $field . '" value="' . $val . '" />' . PHP_EOL;
		}
		return $html;
	}
}



/*
<form name="payme" method="POST" action="https://checkout.paycom.uz/" id="PaymentPaycom" target="_blank">
    <input type="hidden" name="merchant"          value="5b9c8c32e641de247e63d491">
    <input type="hidden" name="account[order_id]" value="'.$order_id.'">
    <input type="hidden" name="amount"            value="'.$cartsAmount.'00">
    <input type="hidden" name="callback"          value="'.SITE_URL.'/success.htm" />
    <input type="hidden" name="lang"              value="ru">
    <input type="hidden" name="button" data-type="svg" value="colored">
    <button type="submit" class="btn-res hidden"></button>
</form>
<script src="https://cdn.paycom.uz/integration/js/checkout.min.js"></script>
*/





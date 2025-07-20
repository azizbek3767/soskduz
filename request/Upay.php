<?php
    include_once('../includes/visitor.inc.php');
    //include_once('../includes/Payment.php');

class Upay
{

    private $payment_method;
    private $ACCOUNT;
    private $SERVICE;

    public function __construct()
    {
        $this->payment_method = new Payment();
        $this->payment_method = $this->payment_method->get_payment('upay');
        $this->SERVICE = $this->payment_method['settings']['merchant'];
    }

    public function form($order_id, $amount, $auto = true)
	{
		if (!$order_id) return null;

		$button = '<button type="submit" value="Оплатить через UPAY"></button>';
		if ($auto) {
			$auto   = '<script type="text/javascript">upay.submit()</script>';
			$button = '';
		}

		$fields = $this->fields($order_id, $amount);

		$form = <<<FORM
<form action="https://pay.smst.uz/prePay.do" method="post" name="upay">
{$fields}
{$button}
</form>
{$auto}
FORM;

return $form;
	}

	public function fields($order_id, $amount)
	{

		$fields = array(
			'personalAccount'   => $order_id,       // Аккаунт или Id номер за который поизводиться оплата
			'serviceId'         => $this->SERVICE,  //  Уникальный номер услуги в системе UPAY
			'amount'            => $amount,         // Сумма оплаты
			'apiVersion'        => 1,               // Версия UPAY = 1
			'callback'          => SITE_URL,

		);

		$html = '';

		foreach ($fields as $field => $val) {
			$html .= '<input type="hidden" name="' . $field . '" value="' . $val . '" />' . PHP_EOL;
		}
		return $html;
	}
}


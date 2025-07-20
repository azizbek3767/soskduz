<?php
include_once('../includes/visitor.inc.php');


class PaySys
{

    private $payment_method;
    private $VENDORID;
    private $VENDORNAME;
    private $RETURNURL;
    const SECRET_KEY = 'ffs=rkd+@9e6dY=FL*n!NH!RBaai5Yqz'; // SECRET_KEY из личного кабинета поставщика услуг

    public function __construct()
    {
        $this->payment_method = new Payment();
        $this->payment_method = $this->payment_method->get_payment('paysys');
        // print_r($this->payment_method['settings']);
        $this->VENDORID = $this->payment_method['settings']['vendor_id'];
        $this->VENDORNAME = $this->payment_method['settings']['vendor_name'];
        $this->RETURNURL = $this->payment_method['settings']['return_url'];
    }

    public function form($order_id, $amount, $note, $auto = true)
    {

        if (!$order_id) return null;
//        $fields = $this->fields($order_id, $amount, $note);
        $siteUrl = SITE_URL;
        $notes = join(', ', $note);

        return <<<HTML
<script>
    AGR.PayButton({
            ID: "form_payment", // ID контейнра для отображения кнопки оплаты
            PAY_BUTTON_TITLE: "Оплатить", // текст внутри кнопки оплаты
            URL: "https://paysys.uz/pay-universal", // URL для обработки оплаты, где vendor_name имя поставщика услуг в системе PaySys
            VENDOR_ID: "$this->VENDORID", // VENDOR_ID поставщика услуг в системе PaySys
            MERCHANT_TRANS_ID: "$order_id", // ID заказа на стороне поставщика услуг
            MERCHANT_TRANS_AMOUNT: "$amount", // сумма заказа
            MERCHANT_CURRENCY: "sum", // валюта для оплаты заказа
            MERCHANT_TRANS_RETURN_URL: "$siteUrl", // URL для возврата пользователя на сайт после успешной оплаты
            MERCHANT_TRANS_NOTE: "$notes" // описание услуги, которое будет отображаться в списке транзакций в кабинете поставщика услуг
        });
    $("#agr_form").submit()
</script>
{$auto}
HTML;

    }


    public function fields($order_id, $amount, $note)
    {
        $timestamp = round(microtime(true) * 1000);
// Список параметров для запроса
        $params = array(
            'VENDOR_ID' => $this->VENDORID, // VENDOR_ID поставщика услуг в системе PaySys
            'MERCHANT_TRANS_ID' => $order_id, // ID заказа на стороне поставщика услуг
            'MERCHANT_TRANS_AMOUNT' => $amount,  // сумма платежа
            'MERCHANT_CURRENCY' => 'sum', // валюта платежа
            'MERCHANT_TRANS_NOTE' => join(', ', $note), // описание услуги, которое будет отображаться в списке транзакций в кабинете поставщика услуг
            'MERCHANT_TRANS_RETURN_URL' => SITE_URL,
//            'MERCHANT_TRANS_DATA' => $order_id,
            'SIGN_TIME' => $timestamp,
        );
// формирование подписи запроса
        $params['SIGN_STRING'] = md5(
            self::SECRET_KEY .
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



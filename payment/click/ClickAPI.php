<?php

/**
 * Class ClickAPI
 */
class ClickAPI
{

    private static $_table = 'orders';

    private $payment_method;
    private $secret;

    private $confirmed;
    private $rejected;
    private $waiting;

    /**
     * ClickAPI constructor.
     */
    public function __construct()
    {

        $this->payment_method = new Payment();
        $this->payment_method = $this->payment_method->get_payment('click');
        // print_r($this->payment_method['settings']);
        $this->secret = $this->payment_method['settings']['secret_key'];

        $this->confirmed = 'confirmed'; //подтвердил
        $this->rejected  = 'rejected';  //отвергнуто
        $this->waiting   = 'waiting';   //ожидание

        $this->callback();
    }


    public function callback()
    {

        if (isset($_GET['payment_status']) ) {

            switch ($_GET['payment_status']) {
                case 0:
                    header('Location: ' . SITE_URL.'/success.htm');
                    exit;
                    break;
                case -10000:
                    header('Location: ' . SITE_URL.'/cancel-payment.htm');
                    exit;
                case -4008:
                    header('Location: ' . SITE_URL.'/cancel-payment.htm');
                    exit;

            }
        }

    }

    /**
     * этот метод может найти данные платежа по merchant_trans_id
     * @param $merchant_trans_id
     * @return bool|int
     */
    function find_by_merchant_trans_id($merchant_trans_id)
    {
        if ($result = dbQuery(static::$_table, DB_ARRAY, array('where' => "id='$merchant_trans_id'"))) {
            $order = $result;
        } else {
            $order = false;
        }
        return $order;
    }

    /**
     * этот метод может найти данные платежа по id
     * @param $id
     * @return bool|int
     */
    public function find_by_id($id)
    {
        if ($result = dbQuery(static::$_table, DB_ARRAY, array('where' => "id='$id'"))) {
            $transaction = $result;
        } else {
            $transaction = false;
        }
        return $transaction;
    }

    public function apiRequests()
    {

        if (isset($_POST['action']) && $_POST['action'] != null) {

            $response = array();

            if ($_POST['action'] == 0) {
                $response = $this->prepare();
            }
            if ($_POST['action'] == 1){
                $response = $this->complete();
            }

            header('Content-Type: application/json');
            echo json_encode($response);

            exit;
        }
    }

    /**
     * @param null $request
     * @return array
     */
    public function prepare($request = null)
    {
        if ($request == null) {
            $request = $_POST;
        }

        $payment = $this->find_by_merchant_trans_id($request['merchant_trans_id']);

        $merchant_confirm_id = 0;
        $merchant_prepare_id = 0;

        if ($payment) {
            $merchant_confirm_id = $payment['id'];
            $merchant_prepare_id = $payment['id'];
        }

        $result = $this->request_check($request);

        $result += [
            'click_trans_id'      => $request['click_trans_id'],
            'merchant_trans_id'   => $request['merchant_trans_id'],
            'merchant_confirm_id' => $merchant_confirm_id,
            'merchant_prepare_id' => $merchant_prepare_id
        ];

        if ($result['error'] == 0) {

            $this->update($payment['id'], [
                'click_trans_id'    => $request['click_trans_id'],
                'merchant_trans_id' => $request['merchant_trans_id'],
                'click_paydoc_id'   => $request['click_paydoc_id'],
                'error_note'        => $request['error_note'],
                'error'             => $request['error'],
                'statusPayment'     => $this->waiting,
                'state'             => 1,

            ]);
        }

        return $result;

    }


    /**
     * @param null $request
     * @return array
     */
    public function complete($request = null)
    {

        if($request == null){
            $request = $_POST;
        }

        $payment = $this->find_by_merchant_trans_id($request['merchant_trans_id']);

        $merchant_confirm_id = 0;
        $merchant_prepare_id = 0;

        if($payment){
            $merchant_confirm_id = $payment['id'];
            $merchant_prepare_id = $payment['id'];
        }

        $result = $this->request_check($request);
        $result += [
            'click_trans_id'      => $request['click_trans_id'],
            'merchant_trans_id'   => $request['merchant_trans_id'],
            'merchant_confirm_id' => $merchant_confirm_id,
            'merchant_prepare_id' => $merchant_prepare_id
        ];

        if ($request['error'] < 0 && ! in_array($result['error'], [-4, -9])) {

            $this->update($payment['id'], [
                'statusPayment' => $this->rejected,
                'state' => 3
            ]);

            $result = ['error' => -9, 'error_note' => 'Transaction cancelled'];

        } elseif ($result['error'] == 0) {

            $this->update($payment['id'], [
                'statusPayment' => $this->confirmed,
                'state' => 2
            ]);
        }

        return $result;
    }


    public function request_check($request)
    {

        if ($this->is_not_possible_data()) { // if ($this->is_not_possible_data($request)) {
            return [ 'error' => -8, 'error_note' => 'Error in request from click' ];
        }

        $sign_string = md5($request['click_trans_id'] . $request['service_id'] . $this->secret . $request['merchant_trans_id'] . ($request['action'] == 1 ? $request['merchant_prepare_id'] : '') . $request['amount'] . $request['action'] . $request['sign_time']);


        if ($sign_string != $request['sign_string']) {
            return [ 'error' => -1, 'error_note' => 'SIGN CHECK FAILED!' ];
        }

        if (!((int)$request['action'] == 0 || (int)$request['action'] == 1)) {
            return [ 'error' => -3, 'error_note' => 'Action not found' ];
        }

        $payment = $this->find_by_merchant_trans_id($request['merchant_trans_id']);
        if (!$payment) {
            return [ 'error' => -5, 'error_note' => 'User does not exist' ];
        }

        if ($request['action'] == 1) {
            $payment = $this->find_by_id($request['merchant_prepare_id']);
            if(!$payment){
                return [ 'error' => -6, 'error_note' => 'Transaction does not exist'];
            }
        }

        if ($payment['statusPayment'] == $this->confirmed) {
            return ['error' => -4, 'error_note' => 'Already paid'];
        }

        if (abs((float)$payment['amount'] - (float)$request['amount']) > 0.01){
            return ['error' => -2, 'error_note' => 'Incorrect parameter amount'];
        }

        if ($payment['statusPayment'] == $this->rejected) {
            return ['error' => -9, 'error_note' => 'Transaction cancelled'];
        }

        return ['error' => 0, 'error_note' => 'Success'];

    }

    /**
     * @return bool
     */
    private function is_not_possible_data(){
        if (!(
                isset($_POST['click_trans_id']) &&
                isset($_POST['service_id']) &&
                isset($_POST['merchant_trans_id']) &&
                isset($_POST['amount']) &&
                isset($_POST['action']) &&
                isset($_POST['error']) &&
                isset($_POST['error_note']) &&
                isset($_POST['sign_time']) &&
                isset($_POST['sign_string']) &&
                isset($_POST['click_paydoc_id'])
            ) || $_POST['action'] == 1 && !isset($_POST['merchant_prepare_id'])) {
            return true;
        }
        return false;
    }


    public function update($id, $data)
    {
        $values = array();

        foreach ($data as $key => $value) {
            $values[$key] = $value;
        }

        dbQuery(static::$_table, DB_UPDATE, array('where' => "id='$id'", 'values' => $values));

    }

}

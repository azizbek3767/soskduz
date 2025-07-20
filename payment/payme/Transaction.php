<?php

/**
 * Class Transaction
 *
 * Example MySQL table might look like to the following:
 *
 * CREATE TABLE `transactions` (
 *   `id` INT(11) NOT NULL AUTO_INCREMENT,
 *   `paycom_transaction_id` VARCHAR(25) NOT NULL COLLATE 'utf8_unicode_ci',
 *   `paycom_time` VARCHAR(13) NOT NULL COLLATE 'utf8_unicode_ci',
 *   `paycom_time_datetime` DATETIME NOT NULL,
 *   `create_time` DATETIME NOT NULL,
 *   `perform_time` DATETIME NULL DEFAULT NULL,
 *   `cancel_time` DATETIME NULL DEFAULT NULL,
 *   `amount` INT(11) NOT NULL,
 *   `state` TINYINT(2) NOT NULL,
 *   `reason` TINYINT(2) NULL DEFAULT NULL,
 *   `receivers` VARCHAR(500) NULL DEFAULT NULL COMMENT 'JSON array of receivers' COLLATE 'utf8_unicode_ci',
 *   `order_id` INT(11) NOT NULL,
 *
 *   PRIMARY KEY (`id`)
 * )
 *   COLLATE='utf8_unicode_ci'
 *   ENGINE=InnoDB
 *   AUTO_INCREMENT=1;
 *
 */
class Transaction
{
    /** Transaction expiration time in milliseconds. 43 200 000 ms = 12 hours. */
    const TIMEOUT = 43200000;

    const STATE_CREATED                  = 1;
    const STATE_COMPLETED                = 2;
    const STATE_CANCELLED                = -1;
    const STATE_CANCELLED_AFTER_COMPLETE = -2;

    const REASON_RECEIVERS_NOT_FOUND         = 1;
    const REASON_PROCESSING_EXECUTION_FAILED = 2;
    const REASON_EXECUTION_FAILED            = 3;
    const REASON_CANCELLED_BY_TIMEOUT        = 4;
    const REASON_FUND_RETURNED               = 5;
    const REASON_UNKNOWN                     = 10;

    /** @var string Paycom transaction id. */
    public $paycom_transaction_id;

    /** @var int Paycom transaction time as is without change. */
    public $paycom_time;

    /** @var string Paycom transaction time as date and time string. */
    public $paycom_time_datetime;

    /** @var int Transaction id in the merchant's system. */
    public $id;

    /** @var string Transaction create date and time in the merchant's system. */
    public $create_time;

    /** @var string Transaction perform date and time in the merchant's system. */
    public $perform_time;

    /** @var string Transaction cancel date and time in the merchant's system. */
    public $cancel_time;

    /** @var int Transaction state. */
    public $state;

    /** @var int Transaction cancelling reason. */
    public $reason;

    /** @var int Amount value in coins, this is service or product price. */
    public $amount;

    /** @var string Pay receivers. Null - owner is the only receiver. */
    public $receivers;

    // additional fields:
    // - to identify order or product, for example, code of the order
    // - to identify client, for example, account id or phone number

    /** @var string Code to identify the order or service for pay. */
    public $order_id;

    /**
     * Сохраняет текущий экземпляр транзакции в DB.
     * @return bool true - on success
     */
    public function save()
    {
        
        if (!$this->id) {
            // Создать новую транзакцию
            $this->create_time = Application::timestamp2datetime(Application::timestamp(true));

            $params['paycom_transaction_id'] = $this->paycom_transaction_id;
            $params['paycom_time']           = $this->paycom_time;
            $params['paycom_time_datetime']  = $this->paycom_time_datetime;
            $params['create_time']           = $this->create_time;
            $params['amount']                = 1 * $this->amount;
            $params['state']                 = $this->state;
            $params['receivers']             = $this->receivers ? json_encode($this->receivers, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : null;
            $params['order_id']              = 1 * $this->order_id;

            if ($is_success = dbQuery( 'transactions_payme', DB_INSERT, array('values' => $params))) {
                $this->id = "$is_success";
            }

        } else {
            // Обновить существующую транзакцию по id
            $where = array();
            $params = [];
            $where[] = "paycom_transaction_id='" . $this->paycom_transaction_id . "'";
            $where[] =  "id='" . $this->id . "'";
            if ($this->amount) {
                $where[] = "amount='" . $this->amount . "'";
                $params['amount'] = 1 * $this->amount;
            }
            $perform_time = $this->perform_time ? $this->perform_time : null;
            $cancel_time  = $this->cancel_time ? $this->cancel_time : null;
            $reason       = $this->reason ? 1 * $this->reason : null;
            
            $params['perform_time']           = $perform_time;
            $params['cancel_time']            = $cancel_time;
            $params['state']                  = 1 * $this->state;
            $params['reason']                 = $reason;
            $params['paycom_transaction_id']  = $this->paycom_transaction_id;
            $params['id']                     = $this->id;

            $is_success = dbQuery('transactions_payme', DB_UPDATE, array('where' => $where , 'values' => $params));
        }


        return $is_success;
    }

    /**
     * Отменяет транзакцию по указанной причине.
     * @param int $reason cancelling reason.
     * @return void
     */
    public function cancel($reason)
    {
       
        $this->cancel_time = Application::timestamp2datetime(Application::timestamp());

        // todo: Изменить $state на отменено (-1 или -2) в соответствии с текущим состоянием
        if ($this->state == 2) {
            $this->state = -2;
        } else {
            $this->state = -1;
        }

        // set reason
        $this->reason = $reason;

        // todo: Обновить транзакцию в DB
        $this->save();
    }

    /**
     * Определяет, истекла ли текущая транзакция или нет.
     * @return bool true - если текущий экземпляр транзакции истек, false - в противном случае.
     */
    public function isExpired()
    {
        // todo: Реализуйте проверку истечения срока действия транзакции, например, если транзакция активна и прошла TIMEOUT миллисекунды после ее создания, то срок ее действия истек
        //return $this->state == 1 && abs(Application::datetime2timestamp($this->create_time) - Application::timestamp(true)) > 43200000;
        return $this->state == self::STATE_CREATED && abs(Application::datetime2timestamp($this->create_time) - Application::timestamp(true)) > self::TIMEOUT;

    }

    /**
     * Найти транзакцию по заданным параметрам.
     * @param mixed $params parameters
     * @return Transaction|Transaction[]
     * @throws PaycomException invalid parameters specified
     */
    public function find($params)
    {
        
        // todo: Реализовать поисковую транзакцию по идентификатору, заполнить текущий экземпляр данными и вернуть их
        if (isset($params['id'])) {
            $is_success = dbQuery('transactions_payme', DB_ARRAY, array('where' => "paycom_transaction_id = '" . $params['id'] . "'"));
        } elseif (isset($params['account'], $params['account']['order_id'])) {
            $is_success = dbQuery('transactions_payme', DB_ARRAY, array('where' => "state IN ('1', '2') AND order_id = '" . $params['account']['order_id'] . "'"));
        } else {
            throw new PaycomException($params['request_id'], 'Parameter to find a transaction is not specified.', PaycomException::ERROR_INTERNAL_SYSTEM);
           // throw new PaycomException($params['request_id'], 'Параметр для поиска транзакции не указан.', -32400);
        }

        if ($is_success) {
            $this->id                    = $is_success['id'];
            $this->paycom_transaction_id = $is_success['paycom_transaction_id'];
            $this->paycom_time           = 1 * $is_success['paycom_time'];
            $this->paycom_time_datetime  = $is_success['paycom_time_datetime'];
            $this->create_time           = $is_success['create_time'];
            $this->perform_time          = $is_success['perform_time'];
            $this->cancel_time           = $is_success['cancel_time'];
            $this->state                 = 1 * $is_success['state'];
            $this->reason                = $is_success['reason'] ? 1 * $is_success['reason'] : null;
            $this->amount                = 1 * $is_success['amount'];
            $this->receivers             = $is_success['receivers'] ? json_decode($is_success['receivers'], true) : null;
            $this->order_id              = 1 * $is_success['order_id'];

            return $this;
        }
        

        // transaction not found, return null
        return null;
    }

    /**
     * Получает список транзакций за указанный период, включая границы периода.
     * @param int $from_date start of the period in timestamp.
     * @param int $to_date end of the period in timestamp.
     * @return array list of found transactions converted into report for send as a response.
     */
    public function report($from_date, $to_date)
    {
        
        $from_date = Application::timestamp2datetime($from_date);
        $to_date   = Application::timestamp2datetime($to_date);

        if ($transactions = dbQuery('transactions_payme', DB_ARRAYS, array('where' => "paycom_time_datetime >='" . $from_date . "' AND paycom_time_datetime <='" . $to_date . "'", 'order' => 'paycom_time_datetime ASC' ))) {
            $result = [];
            foreach ($transactions as $transaction) {
                $result['id']           = $transaction['paycom_transaction_id'];
                $result['time']         = 1 * $transaction['paycom_time'];
                $result['amount']       = 1 * $transaction['amount'];
                $result['account']      = [
                    'order_id' => 1 * $transaction['order_id'],
                ];
                $result['create_time']  = Application::datetime2timestamp($transaction['create_time']);
                $result['perform_time'] = Application::datetime2timestamp($transaction['perform_time']);
                $result['cancel_time']  = Application::datetime2timestamp($transaction['cancel_time']);
                $result['transaction']  = 1 * $transaction['id'];
                $result['state']        = 1 * $transaction['state'];
                $result['reason']       = isset($transaction['reason']) ? 1 * $transaction['reason'] : null;
                $result['receivers']    = isset($transaction['receivers']) ? json_decode($transaction['receivers'], true) : null;
            }

            return $result;
        }

        return null;

    }
}
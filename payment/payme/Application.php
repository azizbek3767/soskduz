<?php

require_once 'Order.php';
require_once 'Transaction.php';
require_once 'PaycomException.php';


class Application
{
    public $config;
    public $request;

    /**
     * Application constructor.
     * @param array $config configuration array with <em>merchant_id</em>, <em>login</em>, <em>keyFile</em> keys.
     * @throws PaycomException
     */
    public function __construct($config)
    {
        $this->config   = $config;
        if ($this->config['keyFile']) {
            $this->config['key'] = trim(file_get_contents($this->config['keyFile']));
        }


        $request_body  = file_get_contents('php://input');
        $this->payload = json_decode($request_body, true);

        if (!$this->payload) {
            throw new PaycomException(null, 'Invalid JSON-RPC object.', PaycomException::ERROR_INVALID_JSON_RPC_OBJECT);
        }

        // populate request object with data
        $this->request->id     = isset($this->payload['id']) ? 1 * $this->payload['id'] : null;
        $this->request->method = isset($this->payload['method']) ? trim($this->payload['method']) : null;
        $this->request->params = isset($this->payload['params']) ? $this->payload['params'] : [];
        $this->request->amount = isset($this->payload['params']['amount']) ? 1 * $this->payload['params']['amount'] : null;

        // добавить ID запроса в параметры тоже
        $this->request->params['request_id'] = $this->request->id;
        
    }

    /**
     * Получает параметр учетной записи, если такой существует, в противном случае возвращает null.
     * @param string $param name of the parameter.
     * @return mixed|null account parameter value or null if such parameter doesn't exists.
     */
    public function account($param)
    {
        return isset($this->request->params['account'], $this->request->params['account'][$param]) ? $this->request->params['account'][$param] : null;
    }
    
    /**
     * @param $request_id
     * @return bool
     * @throws PaycomException
     */
    public function Authorize($request_id)
    {
        $headers = getallheaders();

        if (!$headers || 
            !isset($headers['Authorization']) || 
            !preg_match('/^\s*Basic\s+(\S+)\s*$/i', $headers['Authorization'], $matches) || 
            base64_decode($matches[1]) != $this->config['login'] . ":" . $this->config['key']
        ) {
            throw new PaycomException($request_id, 'Insufficient privilege to perform this method.', PaycomException::ERROR_INSUFFICIENT_PRIVILEGE); //  -32504
        }

        return true;
    }

    /**
     * Authorizes session and handles requests.
     */
    public function run()
    {
        try {
            // authorize session
            $this->Authorize($this->request->id);

            // handle request
            switch ($this->request->method) {
                case 'CheckPerformTransaction':
                    $this->CheckPerformTransaction();
                    break;
                case 'CheckTransaction':
                    $this->CheckTransaction();
                    break;
                case 'CreateTransaction':
                    $this->CreateTransaction();
                    break;
                case 'PerformTransaction':
                    $this->PerformTransaction();
                    break;
                case 'CancelTransaction':
                    $this->CancelTransaction();
                    break;
                case 'ChangePassword':
                    $this->ChangePassword();
                    break;
                case 'GetStatement':
                    $this->GetStatement();
                    break;
                default:
                    $this->error(PaycomException::ERROR_METHOD_NOT_FOUND, 'Method not found.', $this->request->method); // -32601
                    break;
            }
        } catch (PaycomException $exc) {
            $exc->send();
        }
    }

    /**
     * @throws PaycomException
     */
    private function CheckPerformTransaction()
    {
        $order = new Order($this->request->id);
        $order->find($this->request->params['account']);
        // проверить параметры
        $order->validate($this->request->params);

        // todo: Проверьте, есть ли другая активная или завершенная транзакция для этого заказа
        $transaction = new Transaction();
        $found       = $transaction->find($this->request->params);
        if ($found && ($found->state == 1 || $found->state == 2)) {
            $this->error(PaycomException::ERROR_COULD_NOT_PERFORM, 'There is other active/completed transaction for this order.'); // -31008, Для этого  заказа есть другая активная / завершенная транзакция
        }
        // todo: если контроль здесь, то мы передаем все проверки и проверки отправляем ответ, этот заказ готов к оплате.
        $this->send(['allow' => true]);
    }

    private function CheckTransaction()
    {
        // todo: Найти транзакцию по ID
        $transaction = new Transaction();
        $found       = $transaction->find($this->request->params);
        if (!$found) {
            $this->error(PaycomException::ERROR_TRANSACTION_NOT_FOUND, 'Transaction not found.'); // -31003, Транзакция не найдена
        }

        // todo: Подготовить и отправить найденную транзакцию
        $this->send([

            'create_time'  => self::timestamp2milliseconds(self::datetime2timestamp($found->create_time)),
            'perform_time' => self::timestamp2milliseconds(self::datetime2timestamp($found->perform_time)),
            'cancel_time'  => self::timestamp2milliseconds(self::datetime2timestamp($found->cancel_time)),
            'transaction'  => $found->id,
            'state'        => $found->state,
            'reason'       => isset($found->reason) ? 1 * $found->reason : null,
        ]);
    }

    /**
     * @throws PaycomException
     */
    private function CreateTransaction()
    {
        $order = new Order($this->request->id);
        $order->find($this->request->params['account']);
        $order->validate($this->request->params);

        // todo: Проверьте, есть ли другие транзакции для этого заказа / услуги
        $transaction = new Transaction();
        $found       = $transaction->find(['account' => $this->request->params['account']]);
        
        if ($found) {
            if (($found->state == 1 || $found->state == 2) && $found->paycom_transaction_id !== $this->request->params['id']) {
                $this->error(PaycomException::ERROR_INVALID_ACCOUNT, 'There is other active/completed transaction for this order.'); // -31050
            }
        }

        // todo: Найти транзакцию по ID
        $transaction = new Transaction();
        $found       = $transaction->find($this->request->params);


        if ($found) {
            if ($found->state != Transaction::STATE_CREATED) {  // 1 проверить состояние транзакции
                $this->error(PaycomException::ERROR_COULD_NOT_PERFORM, 'Transaction found, but is not active.'); // -31008, 'Транзакция найдена, но не активна.'
            } elseif ($found->isExpired()) {// если время транзакции истекло, отмените ее и отправьте сообщение об ошибке
                $found->cancel(Transaction::REASON_CANCELLED_BY_TIMEOUT); // $found->cancel(4);
                $this->error(PaycomException::ERROR_COULD_NOT_PERFORM, 'Transaction is expired.'); // -31008, 'Транзакция истекла'
            } else { // если транзакция найдена и активна, отправьте ее как ответ

                $this->send([
                    'create_time' => self::datetime2timestamp($found->create_time),
                    'transaction' => $found->id,
                    'state'       => $found->state,
                    'receivers'   => $found->receivers,
                ]);
            }
        } else { // транзакция не найдена, создайте новую

            // подтвердить новое время транзакции
            if (self::timestamp2milliseconds(1 * $this->request->params['time']) - self::timestamp(true) >= Transaction::TIMEOUT) {
                $this->error(
                    PaycomException::ERROR_INVALID_ACCOUNT,  //-31050,
                    self::message(
                        'С даты создания транзакции прошло ' . Transaction::TIMEOUT . 'мс',
                        'Tranzaksiya yaratilgan sanadan ' . Transaction::TIMEOUT . 'ms o`tgan',
                        'Since create time of the transaction passed ' . Transaction::TIMEOUT . 'ms'
                    ),
                    'time'
                );
            }

            // todo: создать новую транзакцию, сохранить create_time как отметку времени, необходимо в ответе
            $create_time                        = self::timestamp(true);
            $transaction->paycom_transaction_id = $this->request->params['id'];
            $transaction->paycom_time           = $this->request->params['time'];
            $transaction->paycom_time_datetime  = self::timestamp2datetime($this->request->params['time']);
            $transaction->create_time           = self::timestamp2datetime($create_time);
            $transaction->state                 = 1;
            $transaction->amount                = $this->request->amount;
            $transaction->order_id              = $this->account('order_id');
            $transaction->save();

            // отправить ответ
            $this->send([
                'create_time' => $create_time,
                'transaction' => $transaction->id,
                'state'       => $transaction->state,
                'receivers'   => null,
            ]);
        }
    }

    /**
     * @throws PaycomException
     */
    private function PerformTransaction()
    {
        $transaction = new Transaction();
        $found = $transaction->find($this->request->params); // поиск транзакции по ID

        // если транзакция не найдена, отправить ошибку
        if (!$found) {
            $this->error(PaycomException::ERROR_TRANSACTION_NOT_FOUND, 'Transaction not found.'); // -31003, 'Транзакция не найдена.'
        }

        switch ($found->state) {
            case Transaction::STATE_CREATED: // 1 обрабатывать активную транзакцию
                if ($found->isExpired()) { // if transaction is expired, then cancel it and send error
                    $found->cancel(Transaction::REASON_CANCELLED_BY_TIMEOUT); //  $found->cancel(4);
                    $this->error( PaycomException::ERROR_COULD_NOT_PERFORM,'Transaction is expired.'); // -31008, 'Транзакция истекла'
                } else { // выполнить активную транзакцию
                    // todo: Отметить заказ / услугу как выполненные
                    $params = ['order_id' => $found->order_id];
                    $order  = new Order($this->request->id);
                    $order->find($params);
                    $order->changeState(Order::STATE_PAY_ACCEPTED); // $order->changeState(2);

                    // todo: Отметить транзакцию как завершенную
                    $perform_time        = self::timestamp(true);
                    $found->state        = Transaction::STATE_COMPLETED; // 2
                    $found->perform_time = self::timestamp2datetime($perform_time);

                    $found->save();

                    // отправить ответ
                    $this->send([
                        'transaction'  => $found->id,
                        'perform_time' => $perform_time,
                        'state'        => $found->state,
                    ]);
                }
                break;

            case Transaction::STATE_COMPLETED: // 2 обрабатывать полную транзакцию
                // todo: Если транзакция завершена, просто верните ее
                $this->send([
                    'transaction'  => $found->id,
                    'perform_time' => self::datetime2timestamp($found->perform_time),
                    'state'        => $found->state,
                ]);
                break;

            default:
                // неизвестная ситуация
                $this->error(PaycomException::ERROR_COULD_NOT_PERFORM, 'Could not perform this operation.'); // -31008, 'Не удалось выполнить эту операцию.'
                break;
        }
    }

    /**
     * @throws PaycomException
     */
    private function CancelTransaction()
    {
        $transaction = new Transaction();
        $found = $transaction->find($this->request->params);  // поиск транзакции по ID

        if (!$found) { // если транзакция не найдена, отправить ошибку
            $this->error(PaycomException::ERROR_TRANSACTION_NOT_FOUND, 'Transaction not found.'); // -31003, 'Транзакция не найдена.'

        }

        switch ($found->state) {
            // todo: если уже отменили, просто отправьте
            case Transaction::STATE_CANCELLED: // -1
            case Transaction::STATE_CANCELLED_AFTER_COMPLETE: // -2
                $this->send([
                    'transaction' => $found->id,
                    'cancel_time' => self::datetime2timestamp($found->cancel_time),
                    'state'       => $found->state,
                ]);
                break;

            // todo: отменить активную транзакцию
            case Transaction::STATE_CREATED: // 1
                // отменить транзакцию по указанной причине
                $found->cancel(1 * $this->request->params['reason']);
                // после того, как $found-> cancel(), свойства cancel_time и state, заполненные состоянием изменения порядка данных на отменено

                $params = ['order_id' => $found->order_id];
                $order = new Order($this->request->id);
                $order->find($params);
                $order->changeState(Order::STATE_CANCELLED); // $order->changeState(3);

                // отправить ответ
                $this->send([
                    'transaction' => $found->id,
                    'cancel_time' => self::datetime2timestamp($found->cancel_time),
                    'state'       => $found->state,
                ]);
                break;

            // todo: отменить заверешенной транзакции
            case Transaction::STATE_COMPLETED: // 2
                // найдите заказ и проверьте, возможна ли отмена этого заказа
                $params = ['order_id' => $found->order_id];
                $order = new Order($this->request->id);
                $order->find($params);
                if ($order->allowCancel()) {
                    // отменить и изменить состояние на отменено
                    $found->cancel(1 * $this->request->params['reason']); // после $found->cancel(), свойства cancel_time и state, заполненные данными
                    $order->changeState(Order::STATE_CANCELLED); // $order->changeState(3);

                    // отправить ответ
                    $this->send([
                        'transaction' => $found->id,
                        'cancel_time' => self::datetime2timestamp($found->cancel_time),
                        'state'       => $found->state,
                    ]);
                } else {
                    $this->error(PaycomException::ERROR_COULD_NOT_CANCEL, 'Could not cancel transaction. Order is delivered/Service is completed.');  // -31007, 'Не удалось отменить транзакцию. Заказ доставлен / Сервис завершен.'
                }
                break;
        }
    }

    /**
     * @throws PaycomException
     */
    private function ChangePassword()
    {
        // подтвердить, пароль указан, в противном случае отправить ошибку
        if (!isset($this->request->params['password']) || !trim($this->request->params['password'])) {
            $this->error(PaycomException::ERROR_INVALID_ACCOUNT, 'New password not specified.', 'password'); // -31050, 'Новый пароль не указан.', 'password'
        }

        // если текущий пароль указан как новый, то отправить ошибку
        if ($this->config['key'] == $this->request->params['password']) {
            $this->error(PaycomException::ERROR_INSUFFICIENT_PRIVILEGE, 'Insufficient privilege. Incorrect new password.'); // -32504, 'Недостаточная привилегия. Неверный новый пароль.'
        }

        // todo: Реализовать сохранение пароля в хранилище данных или файл
        // пример реализации, который сохраняет новый пароль в файл, указанный в конфигурации
        if (!file_put_contents($this->config['keyFile'], $this->request->params['password'])) {
            $this->error(PaycomException::ERROR_INTERNAL_SYSTEM, 'Internal System Error.'); // -32400, 'Внутренняя системная ошибка.'
        }

        // если контроль здесь, то пароль сохраняется в хранилище данных.
        $this->send(['success' => true]);
    }

    /**
     * @throws PaycomException
     */
    private function GetStatement()
    {
        // validate 'from'
        if (!isset($this->request->params['from'])) {
            $this->error(PaycomException::ERROR_INVALID_ACCOUNT, 'Incorrect period.', 'from'); //-31050, 'Неправильный период.', 'from'
        }

        // validate 'to'
        if (!isset($this->request->params['to'])) {
            $this->error(PaycomException::ERROR_INVALID_ACCOUNT, 'Incorrect period.', 'to'); // -31050, 'Неправильный период.', 'to'
        }

        // validate period
        if (1 * $this->request->params['from'] >= 1 * $this->request->params['to']) {
            $this->error(PaycomException::ERROR_INVALID_ACCOUNT, 'Incorrect period. (from >= to)', 'from'); // -31050, 'Неправильный период. (от >= до)', 'from'

        }

        // получить список транзакций за указанный период
        $transaction  = new Transaction();
        $transactions = $transaction->report($this->request->params['from'], $this->request->params['to']);

        // отправить результаты назад
        $this->send(['transactions' => $transactions]);
    }

    /**
     * Sends response with the given result and error.
     * @param mixed $result result of the request.
     * @param mixed|null $error error.
     */
    public function send($result, $error = null)
    {
        header('Content-Type: application/json; charset=UTF-8');

        $response['jsonrpc'] = '2.0';
        $response['id']      = $this->request->id;
        $response['result']  = $result;
        $response['error']   = $error;

        echo json_encode($response);
    }

    /**
     * Generates PaycomException exception with given parameters.
     * @param int $code error code.
     * @param string|array $message error message.
     * @param string $data parameter name, that resulted to this error.
     * @throws PaycomException
     */
    public function error($code, $message = null, $data = null)
    {
        throw new PaycomException($this->request->id, $message, $code, $data);
    }


    /**
     * @param $ru
     * @param string $uz
     * @param string $en
     * @return array
     */
    public static function message($ru, $uz = '', $en = '')
    {
        return ['ru' => $ru, 'uz' => $uz, 'en' => $en];
    }

    /**
     * Конвертирует монеты в сум.
     * @param int|string $coins coins.
     * @return float coins converted to som.
     */
    public static function toSom($coins)
    {
        return 1 * $coins / 100;
    }

    /**
     * Конвертирует сум в монеты.
     * @param float $amount
     * @return int
     */
    public static function toCoins($amount)
    {
        return round(1 * $amount * 100);
    }

    /**
     * Получить текущую метку времени в секундах или миллисекундах.
     * @param bool $milliseconds true - получить метку времени в миллисекундах, false - в секундах.
     * @return int текущее значение метки времени
     */
    public static function timestamp($milliseconds = false)
    {
        if ($milliseconds) {
            return round(microtime(true)) * 1000; // milliseconds
        }
        return time(); // seconds
    }

    /**
     * Преобразует значение метки времени из миллисекунд в секунды.
     * @param int $timestamp timestamp in milliseconds.
     * @return int timestamp in seconds.
     */
    public static function timestamp2seconds($timestamp)
    {
        if (strlen((string)$timestamp) == 10) { // это уже как секунды
            return $timestamp;
        }
        return floor(1 * $timestamp / 1000);
    }

    /**
     * Преобразует значение метки времени из секунд в миллисекунды.
     * @param int $timestamp timestamp in seconds.
     * @return int timestamp in milliseconds.
     */
    public static function timestamp2milliseconds($timestamp)
    {
        if (strlen((string)$timestamp) == 13) { // это уже как миллисекунды
            return $timestamp;
        }

        return $timestamp * 1000;
    }

    /**
     * Преобразует метку времени в строку даты и времени.
     * @param int $timestamp timestamp value as seconds or milliseconds.
     * @return string string representation of the timestamp value in 'Y-m-d H:i:s' format.
     */
    public static function timestamp2datetime($timestamp)
    {
        if (strlen((string)$timestamp) == 13) { // если в миллисекундах, конвертировать в секунды
            $timestamp = self::timestamp2seconds($timestamp);
        }
        return date('Y-m-d H:i:s', $timestamp); // преобразовать в строку даты и времени
    }

    /**
     * Преобразует строку даты и времени в значение метки времени.
     * @param string $datetime date time string.
     * @return int timestamp as milliseconds.
     */
    public static function datetime2timestamp($datetime)
    {
        if ($datetime) {
            return 1000 * strtotime($datetime);
        }
        return $datetime;
    }


}

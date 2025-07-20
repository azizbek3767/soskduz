<?php

/**
 * Class Order
 *
 * Example MySQL table might look like to the following:
 *
 * CREATE TABLE orders
 * (
 *     id          INT AUTO_INCREMENT PRIMARY KEY,
 *     product_ids VARCHAR(255)   NOT NULL,
 *     amount      DECIMAL(18, 2) NOT NULL,
 *     state       TINYINT(1)     NOT NULL,
 *     user_id     INT            NOT NULL,
 *     phone       VARCHAR(15)    NOT NULL
 * ) ENGINE = InnoDB;
 *
 */
class Order
{

    const STATE_AVAILABLE    = 0; /** Заказ доступен для продажи, его может купить каждый. */
    const STATE_WAITING_PAY  = 1; /** Оплата в процессе, заказ не должен быть изменен. */
    const STATE_PAY_ACCEPTED = 2; /** Заказ завершен и не доступен для продажи. */
    const STATE_CANCELLED    = 3; /** Заказ отменен. */

    public $request_id;
    public $params;

    // todo: Adjust Order specific fields for your needs

    /** Order ID */
    public $id;
    /** IDs выбранных товаров / услуг */
    public $product_ids;
    /** Общая стоимость выбранных товаров / услуг */
    public $amount;
    /** Состояние заказа */
    public $state;
    /** ID клиента, создавшего заказ */
    public $user_id;
    /** Номер телефона пользователя */
    public $phone;

    public function __construct($request_id)
    {
        $this->request_id = $request_id;
    }

    /**
     * Проверяет сумму и значения счета.
     * @param array $params amount and account parameters to validate.
     * @return bool true - if validation passes
     * @throws PaycomException - if validation fails
     */
    public function validate(array $params)
    {
        // todo: Проверка суммы, если, например, произошел сбой при ошибке, сумма проверки числовая
        if (!is_numeric($params['amount'])) {
            throw new PaycomException( $this->request_id, 'Incorrect amount.', PaycomException::ERROR_INVALID_AMOUNT);
           // throw new PaycomException($this->request_id, 'Неверная сумма.',-31001);
        }

        // todo: Подтвердите аккаунт, если предполагается, что произошел сбой при броске, у нас должен быть order_id
        if (!isset($params['account']['order_id']) || !$params['account']['order_id']) {
            throw new PaycomException(
                $this->request_id,
                Application::message(
                    'Неверный код заказа.',
                    'Harid kodida xatolik.',
                    'Incorrect order code.'
                ),
                PaycomException::ERROR_INVALID_ACCOUNT, //-31050,
                'order_id'
            );
        }

        // todo: Проверьте, доступен ли заказ
        // предположим, после find() $this это будет заполнено данными Order
        $order = $this->find($params['account']);

        // Проверьте, найден ли заказ по указанному идентификатору order_id
        if (!$order || !$order->id) {
            throw new PaycomException(
                $this->request_id,
                Application::message(
                    'Неверный код заказа.',
                    'Harid kodida xatolik.',
                    'Incorrect order code.'
                ),
                PaycomException::ERROR_INVALID_ACCOUNT, //-31050,
                'order_id'
            );
        }

        // подтвердить сумму
        // convert $this->amount to coins
        // $params['amount'] already in coins
        if ((100 * $this->amount) != (1 * $params['amount'])) {
            throw new PaycomException($this->request_id, 'Incorrect amount.', PaycomException::ERROR_INVALID_AMOUNT);
            //throw new PaycomException($this->request_id, 'Неверная сумма.', -31001);
        }

        // например, состояние заказа до оплаты должно быть «ожидание оплаты»
        if ($this->state != self::STATE_WAITING_PAY) { // 1
            throw new PaycomException($this->request_id, 'Order state is invalid.', PaycomException::ERROR_COULD_NOT_PERFORM);
            //throw new PaycomException($this->request_id, 'Состояние заказа недействительно.', -31008);
        }

        // сохранить параметры для дальнейшего использования
        $this->params = $params;

        return true;
    }

    /**
     * Найти порядок по заданным параметрам.
     * @param mixed $params parameters.
     * @return Order|Order[] found order or array of orders.
     */
    public function find($params)
    {
        
        // todo: Реализация порядка (ов) поиска по заданным параметрам, заполнение текущего экземпляра данными
        // Пример реализации для загрузки заказа по идентификатору
        if (isset($params['order_id'])) {

            if ($result = dbQuery('orders', DB_ARRAY, array('where' => "id='" . $params['order_id'] ."'"))) {
                $this->id          = 1 * $result['id'];
                $this->amount      = 1 * $result['amount'];
                // $this->product_ids = json_decode($row['product_ids'], true);
                $this->state       = 1 * $result['state'];
                $this->user_id     = 1 * $result['user_id'];
                $this->phone       = $result['phone'];

                return $this;
            }

        }

        return null;
    }

    /**
     * Изменить состояние заказа на указанное.
     * @param int $state new state of the order
     * @throws PaycomException
     */
    public function changeState($state)
    {
        // todo: Реализовать изменение состояния заказа (резервный заказ после создания транзакции или свободный заказ после отмены)
        $this->state = 1 * $state;
        $this->save();
    }

    /**
     *Проверьте, можно ли отменить заказ или нет.
     * @return bool true - заказ отменяется, в противном случае ложный.
     */
    public function allowCancel()
    {
        // todo: Реализация проверки отмены заказа
        return true; // do not allow cancellation
    }

    /**
     * Сохраняет этот заказ.
     * @throws PaycomException
     */
    public function save()
    {
        
        if (!$this->id) {
            // Если новый заказ, установите его состояние ожидания
            //$is_success['product_ids'] = json_encode($this->product_ids);
            $result['amount']      = $this->amount;
            $result['state']       = 1;
            $result['user_id']     = $this->user_id;
            $result['phone']       = $this->phone;

            if ($is_success = dbQuery( 'orders', DB_INSERT, array('values' => $result))) {
                $this->id = "$is_success";
            }
        } else {
            $is_success = dbQuery('orders', DB_UPDATE, array('where' => "id='".$this->id."'" , 'values' => "state='" . $this->state . "'"));
        }

        if ($is_success == -1) {
            throw new PaycomException($this->request_id, 'Could not save order.', PaycomException::ERROR_INTERNAL_SYSTEM);
            //throw new PaycomException($this->request_id, 'Не удалось сохранить заказ.', PaycomException::ERROR_INTERNAL_SYSTEM);
        }

    }
}







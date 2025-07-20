<?php

require_once(realpath(dirname(__FILE__) . '/../includes/overall.inc.php'));
require_once(realpath(dirname(__FILE__) . '/../includes/settings-upay.inc.php'));

// Получаем активные подписки, у которых не было оплаты в текущем месяце
$members = dbRawQuery("SELECT * FROM subscription_members WHERE is_active = 1 
    AND (DATE_FORMAT(last_payment_date, '%Y-%m') != DATE_FORMAT(CURRENT_TIMESTAMP, '%Y-%m') OR last_payment_date IS NULL)");

foreach ($members as $member) {

//        Создаем запись транзакции
    dbRawQuery("INSERT INTO subscription_transactions SET
                        subscription_id = '" . $member['id'] . "',
                        amount = '" . $member['amount'] . "'");

    $transactionId = mysqli_insert_id($mysqli);
    $amount = $member['amount'] * 100;

//        Подготавливаем параметры для отправки запроса в Upay
    $request = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:st="http://st.apus.com/">
          <soapenv:Header/>
          <soapenv:Body>
            <st:partnerPayment>
                <partnerPaymentRequest>
                    <StPimsApiPartnerKey>'.$upayConfig['STPimsApiPartnerKey'].'</StPimsApiPartnerKey>
                    <AccessToken>'.md5($upayConfig['upay_login'] . $member['phone'] . $member['uzcard_id'] . $upayConfig['upay_serviceId'] . $transactionId . $amount . $upayConfig['upay_password']).'</AccessToken>
                    <CardPhone>'.$member['phone'].'</CardPhone>
                    <UzcardId>'.$member['uzcard_id'].'</UzcardId>
                    <ServiceId>'.$upayConfig['upay_serviceId'].'</ServiceId>
                    <PaymentType></PaymentType>
                    <PersonalAccount>'.$transactionId.'</PersonalAccount>
                    <RegionId></RegionId>
                    <SubRegionId></SubRegionId>
                    <AmountInTiyin>' . $amount . '</AmountInTiyin>
                    <Version>1</Version>
                    <Lang>ru</Lang>
                </partnerPaymentRequest>
            </st:partnerPayment>
          </soapenv:Body>
        </soapenv:Envelope>';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.upay.uz/STAPI/STWS?wsdl");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));

    $soapResponse = curl_exec($ch);
    curl_close($ch);

//        Пробуем отправить запрос в Upay
    if ($soapResponse) {
        $simpleXml = simplexml_load_string($soapResponse);
        $code = (string) $simpleXml->xpath('//code')[0];
        $result_description = (string) $simpleXml->xpath('//Description')[0];
        $confirmed = $simpleXml->xpath('//Confirmed')[0];
        $upayTransactionId = $simpleXml->xpath('//TransactionId')[0];
        $uzcardTransactionId = $simpleXml->xpath('//UzcardTransactionId')[0];
        $paymentDate = $simpleXml->xpath('//PaymentDate')[0];

        if ($code == 'OK') {
//                Если все ОК проверям нужно ли подтверждение по СМС для оплаты. true = платеж проходит безакцептно
            if ($confirmed == true) {
//                    Обновляем данные транзакции
                dbRawQuery("UPDATE subscription_transactions SET
                        transaction_id = '" . $upayTransactionId . "',
                        uzcard_transaction_id = '" . $uzcardTransactionId . "',
                        payment_date = '" . $paymentDate . "' 
                        WHERE id = $transactionId");

//                    Обновляем дату последнего платежа у подписки
                dbRawQuery("UPDATE subscription_members SET
                        last_payment_date = '" . $paymentDate . "' 
                        WHERE id = " . $member['id']);
            } else {
//                    Если требуется подтверждение платежа, то переводим транзакцию в статус неоплаченной
                dbRawQuery("UPDATE subscription_transactions SET
                        is_failed = 1,
                        reason = 'Необходимо осуществить подписку еще раз'
                        WHERE id = $transactionId");

//                    И делаем подписку неактивной. Для осуществления списания необходимо заново оформить подписку
                dbRawQuery("UPDATE subscription_members SET
                        is_active = 0 
                        WHERE id = " . $member['id']);
            }
        } else {
//                Если при оплате возникли ошибки добавляем транзакцию как неудачную. Будет произведено еще несколько попыток оплаты.
            addFailedTransaction($transactionId, "Upay code " . $code . ": " . $result_description);
        }
    } else {
//            Если при запросе к Upay возникли ошибки добавляем транзакцию как неудачную. Будет произведено еще несколько попыток оплаты.
        addFailedTransaction($transactionId, 'Ошибка SOAP запроса к Upay');
    }
}

function addFailedTransaction($transactionId, $reason)
{
    dbRawQuery("INSERT INTO subscription_failed_transactions SET
                        transaction_id = '" . $transactionId . "',
                        reason = '" . $reason . "',
                        date = '" . date('Y-m-d H:i:s') . "'");
}
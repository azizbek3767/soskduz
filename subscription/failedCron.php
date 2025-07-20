<?php

require_once(realpath(dirname(__FILE__) . '/../includes/overall.inc.php'));
require_once(realpath(dirname(__FILE__) . '/../includes/settings-upay.inc.php'));

// Выбираем все неудачные транзакции
$fails = dbRawQuery('SELECT fail.*, transaction.subscription_id, transaction.amount, member.uzcard_id, member.phone 
    FROM subscription_failed_transactions as fail 
    LEFT JOIN subscription_transactions as transaction on fail.transaction_id = transaction.id
    LEFT JOIN subscription_members as member on transaction.subscription_id = member.id');

foreach ($fails as $fail) {
    if ($fail['retry'] >= 3) {
//                    Если было больше 3 попыток платежа, то переводим транзакцию в статус неоплаченной
        failTransaction($fail, 'Платеж не проходит спустя 3 попытки');
    } else {
        $amount = $fail['amount'] * 100;
//    Подготавливаем параметры для отправки запроса в Upay
        $request = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:st="http://st.apus.com/">
          <soapenv:Header/>
          <soapenv:Body>
            <st:partnerPayment>
                <partnerPaymentRequest>
                    <StPimsApiPartnerKey>'.$upayConfig['STPimsApiPartnerKey'].'</StPimsApiPartnerKey>
                    <AccessToken>'.md5($upayConfig['upay_login'] . $fail['phone'] . $fail['uzcard_id'] . $upayConfig['upay_serviceId'] . $fail['transaction_id'] . $amount . $upayConfig['upay_password']).'</AccessToken>
                    <CardPhone>'.$fail['phone'].'</CardPhone>
                    <UzcardId>'.$fail['uzcard_id'].'</UzcardId>
                    <ServiceId>'.$upayConfig['upay_serviceId'].'</ServiceId>
                    <PaymentType></PaymentType>
                    <PersonalAccount>'.$fail['transaction_id'].'</PersonalAccount>
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
                        WHERE id = " . $fail['transaction_id']);

//                    Обновляем дату последнего платежа у подписки
                    dbRawQuery("UPDATE subscription_members SET
                        last_payment_date = '" . $paymentDate . "' 
                        WHERE id = " . $fail['subscription_id']);

//                    Удаляем транзакцию из списка повторных запросов на платеж
                    dbRawQuery("DELETE FROM subscription_failed_transactions WHERE id = " . $fail['id']);
                } else {
//                    Если требуется подтверждение платежа, то переводим транзакцию в статус неоплаченной
                    failTransaction($fail, 'Необходимо осуществить подписку еще раз');
                }
            } else {
//                Если при оплате возникли ошибки добавляем транзакцию как неудачную. Будет произведено еще несколько попыток оплаты.
                retryTransaction($fail['id'], "Upay code " . $code . ": " . $result_description);
            }
        } else {
//            Если при запросе к Upay возникли ошибки добавляем транзакцию как неудачную. Будет произведено еще несколько попыток оплаты.
            retryTransaction($fail['id'], 'Ошибка запроса к Upay');
        }
    }
}

function failTransaction($fail, $reason)
{
//    Указываем причину неудавшейся транзакции
    dbRawQuery("UPDATE subscription_transactions SET
                        is_failed = 1,
                        reason = '$reason'
                        WHERE id = " . $fail['transaction_id']);

//                    Делаем подписку неактивной. Для осуществления списания необходимо заново оформить подписку
    dbRawQuery("UPDATE subscription_members SET
                        is_active = 0
                        WHERE id = " . $fail['subscription_id']);

//    Удаляем транзакцию из списка повторных запросов на платеж
    dbRawQuery("DELETE FROM subscription_failed_transactions WHERE id = " . $fail['id']);
}

function retryTransaction($transactionId, $reason)
{
    dbRawQuery("UPDATE subscription_failed_transactions SET
                        retry = retry + 1,
                        reason = '" . $reason . "',
                        date = '" . date('Y-m-d H:i:s') . "'
                        WHERE id = " . $transactionId);
}

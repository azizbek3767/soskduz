<?php

require_once(realpath(dirname(__FILE__) . '/../includes/visitor.inc.php'));
require_once(realpath(dirname(__FILE__) . '/../includes/settings-upay.inc.php'));
//require_once(realpath(dirname(__FILE__) . '/../includes/overall.inc.php'));

$lang = getRequestVar('lang', '');
$form = getRequestVar('form', '', $noEscape = true);
$token = getRequestVar('token', '');

$response = array(
    'success' => false,
    'upay' => false,
    'message' => null,
    'data' => null,
);

if (App::isValidCsrfToken($token)) {
    if (!empty($form['code']) && !empty($form['amount']) && !empty($form['confirm_id'])) {
        $request = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:st="http://st.apus.com/">
          <soapenv:Header/>
          <soapenv:Body>
            <st:partnerConfirmCard>
                <partnerConfirmCardRequest>
                    <StPimsApiPartnerKey>'.$upayConfig['STPimsApiPartnerKey'].'</StPimsApiPartnerKey>
                    <AccessToken>'.md5($upayConfig['upay_login'] . $form['confirm_id'] . $form['code'] . $upayConfig['upay_password']).'</AccessToken>
                    <ConfirmId>'.$form['confirm_id'].'</ConfirmId>
                    <VerifyCode>'.$form['code'].'</VerifyCode>
                    <Version>1</Version>
                    <Lang>'.$lang.'</Lang>
                </partnerConfirmCardRequest>
            </st:partnerConfirmCard>
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
            $uzcardId = (string) $simpleXml->xpath('//UzcardId')[0];
            $cardphone = (string) $simpleXml->xpath('//CardPhone')[0];
            $cardholder = (string) $simpleXml->xpath('//CardHolder')[0];

            if ($code == 'OK') {
                $query = dbRawQuery("SELECT * FROM subscription_members WHERE uzcard_id = '$uzcardId'");
                $card = is_array($query) ? $query[0] : null;

                if ($card) {
                    dbRawQuery("UPDATE subscription_members SET
                            phone = '" . $cardphone . "',
                            name = '" . $cardholder . "',
                            email = '" . $form['email'] . "',
                            amount = " . $form['amount'] . ",
                            is_active = 1,
                            subscription_date = '" . date('Y-m-d H:i:s') . "'
                            WHERE uzcard_id = '" . $uzcardId . "'");
                } else {
                    dbRawQuery("INSERT INTO subscription_members SET
                        uzcard_id = '" .$uzcardId . "',
                        phone = '" . $cardphone . "',
                        name = '" . $cardholder . "',
                        email = '" . $form['email'] . "',
                        amount = " . $form['amount'] . ",
                        is_active = 1,
                        subscription_date = '" . date('Y-m-d H:i:s') . "'");
                }

                $response['success'] = true;
                $response['data']['amount'] = number_format($form['amount'], '0', '.', ' ');
            } else {
                $response['upay'] = true;
                $response['message'] = $result_description;
            }
        } else {
            $response['message'] = $LANG['request_error'];
        }
    } else {
        $response['message'] = $LANG['incorrect_form_data'];
    }
} else {
    $response['message'] = $LANG['invalid_token'];
}

App::jsonResponse($response);
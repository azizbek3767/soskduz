<?php

require_once(realpath(dirname(__FILE__) . '/../includes/visitor.inc.php'));
require_once(realpath(dirname(__FILE__) . '/../includes/settings-upay.inc.php'));
//require_once(realpath(dirname(__FILE__) . '/../includes/overall.inc.php'));

$lang = getRequestVar('lang', '');
$form = getRequestVar('form', '', $noEscape = true);
$token = getRequestVar('token', '');

$response = array(
    'success' => false,
    'message' => null,
    'data' => null,
);

if (!empty($form['other-amount'])) {
    $amountPayment = (int)number_format($form['other-amount'], 0, '.', ''); // $form['other-amount'];
} else {
    $amountPayment = (int)number_format($form['amount'], 0, '.', ''); //  $form['amount'];
}

if (App::isValidCsrfToken($token)) {
    if (!empty($form['card']) && !empty($form['expire']) && $amountPayment >= 1000) {
        $card = str_replace(' ', '', $form['card']);
        $parts = explode('/', $form['expire']);
        $expire = isset($parts[1]) ? $parts[1] : '';
        $expire .= isset($parts[0]) ? $parts[0] : '';

        $request = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:st="http://st.apus.com/">
          <soapenv:Header/>
          <soapenv:Body>
            <st:partnerRegisterCard>
                <partnerRegisterCardRequest>
                    <StPimsApiPartnerKey>'.$upayConfig['STPimsApiPartnerKey'].'</StPimsApiPartnerKey>
                    <AccessToken>'.md5($upayConfig['upay_login'] . $card . $expire . $upayConfig['upay_password']).'</AccessToken>
                    <CardNumber>'.$card.'</CardNumber>
                    <ExDate>'.$expire.'</ExDate>
                    <Version>1</Version>
                    <Lang>'.$lang.'</Lang>
                </partnerRegisterCardRequest>
            </st:partnerRegisterCard>
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
            $confirmid = (string) $simpleXml->xpath('//ConfirmId')[0];
            $cardphone = (string) $simpleXml->xpath('//CardPhone')[0];

            if ($code == 'OK') {
                $response['success'] = true;
                $response['data'] = [
                    'success' => true,
                    'ConfirmId' => $confirmid,
                    'amount' => $amountPayment,
                    'email' => $form['email'],
                ];
            } else {
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
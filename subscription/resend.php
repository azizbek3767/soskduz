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

if (App::isValidCsrfToken($token)) {
    if (!empty($form['confirm_id'])) {
        $request = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:st="http://st.apus.com/">
          <soapenv:Header/>
          <soapenv:Body>
            <st:partnerCardResendSms>
                <partnerCardResendSmsRequest>
                    <StPimsApiPartnerKey>'.$upayConfig['STPimsApiPartnerKey'].'</StPimsApiPartnerKey>
                    <AccessToken>'.md5($upayConfig['upay_login'] . $form['confirm_id'] . $upayConfig['upay_password']).'</AccessToken>
                    <ConfirmId>'.$form['confirm_id'].'</ConfirmId>
                    <Version>1</Version>
                    <Lang>'.$lang.'</Lang>
                </partnerCardResendSmsRequest>
            </st:partnerCardResendSms>
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
            if ($code == 'OK') {
                $response['success'] = true;
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
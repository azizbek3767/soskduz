<?php
require_once "../includes/visitor.inc.php";
require_once '../includes/Mailer/Feedback.php';

	global $smarty, $config;
	$action   = getRequestVar('action', 'default');
    $token   = getRequestVar('token','');

	$feedback = new Feedback($action);
    $feedback->getCaptchaEnabled($config['feedback_captcha_enabled']);
    $feedback->getAllowCaptcha($config['allow_recaptcha']);
    $feedback->telegram($config['telegram_send']);

	$htmlBody = '';
    $error    = '';
    $success  = false;
    $captcha_good = false;
    $file = '';
    $sendTo = 'resume@sos-kd.uz';

    $subject	  = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $user_name    = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $user_email   = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$user_phone   = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $user_message = strip_tags(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_MAGIC_QUOTES), '<p><a><b><div>');

//$token    = filter_input(INPUT_POST, 'CSRF_TOKEN', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
//print_r($token);
if ($res = App::isValidCsrfToken($token)) {

    if (isset($_FILES) && !empty($_FILES)) $file = $_FILES['file'];
    if (empty($subject)) $subject = $config['smtp_subject'];
    if (empty($user_phone)) $user_phone = '';
    if (empty($user_message)) $user_message = '';

    $arrayMessage = array_filter([
        'Дата отправки сообщения' => date('d-m-Y H:i'),
        'Имя и Фамилия' => $user_name,
        'Email' => $user_email,
        'Телефон' => $user_phone,
        'Сообщение' => $user_message,
    ]);
    $txt = "<b>" . $subject . "</b>%0A";
    foreach ($arrayMessage as $key => $value) {
        $txt .= "<b>" . $key . ":</b> " . $value . "%0A";
    }
    foreach ($arrayMessage as $key => $value) {
        $htmlBody .= "<b>" . $key . ":</b> " . $value . "<br/>";
    }

    /* проверка включена капча */
    if ($feedback->setCaptchaEnabled() == 1) {
        /* вид капчи */
        if ($feedback->setAllowCaptcha() == 1) {
            /* 'recaptcha_token' */
            if (empty($feedback->errors) && $feedback->captchaToken($_POST['recaptcha_token'])) {
                $captcha_good = true;
            } else {
                $captcha_good = false;
                $success = array('code' => false, 'message' => $feedback->errors);
            }

        } else {
            if (empty($feedback->errors) && $feedback->antiBot($_POST['anti-bot-a'], $_POST['anti-bot-q'], $_POST['anti-email'])) {
                $captcha_good = true;
            } else {
                $success = array('code' => false, 'message' => $feedback->errors);
            }

        }

    }
    /* если все good то пропускаем на отправку */
    if (empty($feedback->errors) && $captcha_good == true) {
        /* отправка в теленрам */
        $feedback->sendTelegram($txt);
        /* отправка по smtp */
        if (empty($feedback->errors) && $feedback->sendFeedbackSMTP($subject, $htmlBody, $sendTo, $file)) {
            $success = array('code' => true, 'name' => $user_name, 'errors' => $feedback->errors);
        } else {
            $success = array('code' => false, 'msg' => $feedback->errors);
        }

    }

} else {
    $success = array('code' => false, 'msg' => 'valid_token', 'token'=>$token, 'res'=>$res);
}
    
    App::jsonResponse($success);

   // echo json_encode($success);
   // exit;
  


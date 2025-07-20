<?php
	include '../includes/visitor.inc.php';
	include '../includes/Mailer/Feedback.php';

	global $smarty, $config;

    $userId = Session::sessionId();

    $action     = getRequestVar('action', 'default');
    $token      = getRequestVar('token','');
    $site_lang  = getRequestVar('lang','');
	
	$feedback = new Feedback($action);
    $feedback->getCaptchaEnabled($config['feedback_captcha_enabled']);
    $feedback->getAllowCaptcha($config['allow_recaptcha']);
    $feedback->telegram($config['telegram_send']);

	$htmlBody = '';
    $htmlOrder  = '';
    $error    = '';
    $totalPrice = '';
    $success  = false;
    $captcha_good = false;
    
    $subject	      = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $user_name        = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $user_email       = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$user_phone       = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $user_message     = strip_tags(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_MAGIC_QUOTES), '<p><a><b><div>');

    if ($res = App::isValidCsrfToken($token)) {
        if (empty($subject))  $subject = $config['smtp_subject'];
        if (empty($user_phone))   $user_phone = '';
        if (empty($user_message)) $user_message = '';

        if ($action == 'order' && !empty($userId)) {

            if ($orders = $app->get_order_products($userId, $site_lang)) {

                $orderId = $app->create_order($orders, $userId, $user_name, $user_email, $user_phone, $user_message);

                $htmlOrder .= "
                <div style='width: 680px;'>
                <p style='margin-top: 0px; margin-bottom: 20px;'>Благодарим за заказ sos-kd.uz<br /> Ваш заказ получен и поступит в обработку в ближайшее время</p>
                <p style='margin-top: 0px; margin-bottom: 20px;'></p>
                <p style='margin-top: 0px; margin-bottom: 20px;'></p>
                <table style='border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;'><thead><tr><td style='ont-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;' colspan='2'>Детализация заказа</td></tr></thead><tbody>
                     <tr>
                         <td style='font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;'>
                              <b>Заказ №:</b>             " . $orderId      . "<br />	
                              <b>Имя:</b>                 " . $user_name    . "<br />
                              <b>Email:</b>               " . $user_email   . "<br />
                              <b>Телефон:</b>             " . $user_phone   . "<br />   
                              <b>Комментарий к заказу:</b> " . $user_message . "<br />       
                         </td>
                     </tr></tbody></table><table style='border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;'><thead>
                     <tr>
                         <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;'>Товар</td>
                         <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;'>Артикул</td>
                         <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;'>Кол-во</td>
                         <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;'>Цена</td>
                         <td style='font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;'>Итого:</td>
                     </tr></thead><tbody>";

                    foreach ($orders as $order) {
                        $int =  $order["price"] * $order['amount'];
                        $totalPrice = $totalPrice + $int;
                        $htmlOrder .= '<tr>
                            <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">' . $order['title'] . '</td>
                            <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">' . $order['articul'] . '</td>
                            <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">' . $order['amount'] . '</td>
                            <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">' . strip_tags($app->price_format($order['price'])) . '</td>
                            <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">' . strip_tags($app->price_format($order['price'] * $order['amount'])) . '</td>
                        </tr> ';
                    }

                    $htmlOrder .= '</tbody> <tfoot><tr>
                        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;" colspan="4"><b>Итого к оплате:</b></td>
                        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">' . strip_tags($app->price_format($totalPrice)) . '</td>
                    </tr></tfoot></table></div>';



            }

        }

    //$arrayMessage = array_filter([
    //    'Дата отправки сообщения' => gmdate('d-m-Y H:i'),
    //    'Имя и Фамилия'           => $user_name,
    //    'Email'                   => $user_email,
    //    'Телефон'                 => $user_phone,
    //    'Комментарий к заказу'    => $user_message,
    //    'Номер заказа'            => '№'.$orderId,
    //    'Заказ'                   => $htmlOrder,
    //]);
    //    $txt = "<b>" . $subject . "</b>%0A";
    //    foreach($arrayMessage as $key => $value) {
    //        $txt .= "<b>".$key.":</b> ".$value."%0A";
    //    }
    //    foreach($arrayMessage as $key => $value) {
    //        $htmlBody .= "<b>".$key.":</b> ".$value."<br/>";
    //    }

        /* проверка включена капча */
        if ($feedback->setCaptchaEnabled() == 1){
            /* вид капчи */
            if ($feedback->setAllowCaptcha() == 1) {

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
           // $feedback->sendTelegram($txt);
            /* отправка по smtp */
            if (empty($feedback->errors) && $feedback->sendFeedbackSMTP($subject, $htmlOrder, $user_email)) {
                $app->remove_all_products_basket($userId, $site_lang);
                $success = array('code' => true, 'name' => $user_name, 'res'=>$res);
            } else {
                $success = array('code' => false, 'msg' => $feedback->errors);
            }

        }
    } else {
        $success = array('code' => false, 'msg' => 'valid_token', 'token'=>$token, 'res'=>$res);
    }

    App::jsonResponse($success);

  


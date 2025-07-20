<?php
    require_once "../includes/visitor.inc.php";
    require_once "../includes/Request.php";
    require_once "../request/PayMe.php";
    require_once "../request/Click.php";
    require_once "../request/Upay.php";
    require_once "../request/PaySys.php";
    require_once "../request/Paynet.php";
    require_once "../request/Psp.php";
    require_once "../request/SendFeedbackOrder.php";

    global $smarty, $config, $mysqli;

    $userId = $_COOKIE['ls-visitor'];

    $action  = getRequestVar('action', '');
    $lang    = getRequestVar('lang', '');
    $form    = getRequestVar('form', '', $noEscape = true);
    $token   = getRequestVar('token','');

    $request = new Request();

    if (!empty($form['amount'])) $form['amount'] = mysqli_real_escape_string($mysqli, $form['amount']);
    if (!empty($form['other-amount'])) $form['other-amount'] = mysqli_real_escape_string($mysqli, $form['other-amount']);
//    if (!empty($form['name']))   $form['name']   = mysqli_real_escape_string($mysqli, $form['name']);
   // if (!empty($form['email']))  $form['email']  = mysqli_real_escape_string($mysqli, $form['email']);
//    if (!empty($form['phone']))  $form['phone']  = mysqli_real_escape_string($mysqli, $form['phone']);

    //print_r($form);
    if (!empty($form['other-amount'])) {
        $request->amountPayment = number_format($form['other-amount'], 0, '.', ''); // $form['other-amount'];
    } else {
        $request->amountPayment =  number_format($form['amount'], 0, '.', ''); //  $form['amount'];
    }

    if (App::isValidCsrfToken($token)) {
//         if (App::is_validate_email($form['email'])) {
            if (!empty($form['payment']) && !empty($request->amountPayment)) {
                $request->note[] = 'Пожертвование';
//                $hash = md5($form['name'] . $request->amountPayment . $userId);
                $hash = md5($request->amountPayment . $userId);
                if ($id = $request->create_order($request->amountPayment, $userId, $form, $hash)) {
                    if ($form['payment'] === 'payme') {
                        $payme = new PayMe();
                        $ret = $payme->form($id, $request->amountPayment, $request->note, $lang);
                    } else if ($form['payment'] === 'click') {
                        $click = new Click();
                        $ret = $click->form($id, $request->amountPayment, $request->note);
                    } else if ($form['payment'] === 'upay') {
                        $upay = new Upay();
                        $ret = $upay->form($id, $request->amountPayment);
                    } else if ($form['payment'] === 'psp') {
                        $psp = new Psp();
                        $ret = $psp->form($id, $request->amountPayment, $request->note, $form['currency'], true);
                    } else if ($form['payment'] === 'paynet') {
                        $paynet = new Paynet();
                        $ret = $paynet->form($id);
                    }

//                    else if ($form['payment'] === 'paysys') {
//                        $paysys = new PaySys();
//                        $ret = $paysys->form($id, $request->amountPayment, $request->note);
//                    }
                }
            }

            $request->success = $form['payment'] === 'paynet' ? 'paynet' : 'create_order';
/*
        } else {
            $request->errors = 'not_valid_email';
        }
*/
    } else {
        $request->errors = 'valid_token';
    }

/*
    if (!empty($ret)) {
        $feedback = new SendFeedbackOrder();
        if ($feedback->set_data($id)) {
            $request->success = 'Notification letter sent by mail!';
        } else {
            $request->errors = $feedback->errors;
        }
    }
*/

    //print_r($form);
   
    if (!empty($request->errors))  $success = array('code' => false, 'msg' => $request->errors, 'payment' => $request->amountPayment, 'id' => $id);
    if (!empty($request->success)) $success = array('code' => true, 'msg' => $request->success,  'payment' => $request->amountPayment, 'id' => $id, 'form' => $ret, 'token' => $token);
    App::jsonResponse($success);
    //echo json_encode($success);
    //exit;
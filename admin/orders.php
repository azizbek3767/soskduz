<?php
	include('../includes/admin.inc.php');
	if($adminUser['accessLevel']!='administrator' and $adminUser['accessLevel'] != 'developer')die(lang('general:accessIsDenied'));
	
	$order	= arrAddSlashes(getRequestVar('order','',$noEscape=true));
	$action	= getRequestVar('action');
	$page   = (int)getRequestVar('page');
	$table  = 'postcard_orders';
	
	if (!empty($action['edit'])) {
		if (empty($errors) && !empty($order['id'])) {
			$order = dbQuery($table, DB_ARRAY, array('where' => "id='$order[id]'"));
            $order['created'] = langdate(adjustTime($order['created'], false, 'd.m.Y H:i'));
            $order['amount']  = price_format($order['amount']);
            if (!empty($order['products'])) {
                $products = unserialize($order['products']);
                foreach ($products as $i => $product) {
                    $product['count_price'] = $product['price'] * $product['amount'];
                    $product['count_price'] = price_format($product['count_price']);
                    $product['price'] = price_format($product['price']);

                    $order['product'][] = $product;
                }
                unset($order['products']);
            }

            $smarty->assign('order', $order);
		}
		
		
	} elseif (!empty($action['save'])) {
		if (empty($errors)) {
			if (empty($order['id'])) {
				dbQuery($table ,DB_INSERT,array('values'=>$order));
				$messages['saved'] = true;
			} else {
				if (dbQuery($table,DB_UPDATE,array('where'=>"id='$order[id]'",'values'=>$order))){
					$messages['saved']=true;
				}else{
					$errors['not_saved']=true;
				}
			}
		} else {
			$smarty->assign('action',array('edit'=>true));
			$smarty->assign('order', $order);
			$noItems=true;
		}
		
	} elseif (!empty($action['deleteOrder'])) {
		if (dbQuery($table, DB_DELETE, array('where' => "id='$order[id]'"))){
			echo "removeElement($order[id], 'order');\r\n";
		} else {
			echo "writeStatus('".lang('orders:errors:3')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	}
	if (empty($noItems)) {
		
		if ($page < 1) {
			$page = 1;
			$smarty->assign('page', $page);
		}
		$itemsPerPage = 10;
		
		$orders = dbQuery($table, DB_ARRAYS, array('start' => ($page-1)* $itemsPerPage, 'limit' => $itemsPerPage, 'order'=>'id DESC', 'indexKey'=>'id'));
		foreach($orders as $orderId => $order){
			$orders[$orderId]['amount']  = price_format($order['amount']);
			$orders[$orderId]['created'] = langdate(adjustTime($order['created'], false, 'd.m.Y H:i'));
		}

		$totalOrders = dbQuery($table, DB_VALUE, array('fields' => 'COUNT(*)'));
		$pageNums = getPageNums($totalOrders, $page, $itemsPerPage, 0, 4, 4, 0);
		$smarty->assign('orders', $orders);
		$smarty->assign('pageNums', $pageNums);
	}
	
	//$smarty->assign('statuses',lang('orders:statuses'));
		
	if(!empty($errors))   $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);


	$smarty->display('orders.tpl');


    function price_format($price, $format = true) {
         $defaultCurrency = dbQuery('currency', DB_ARRAY, array('where' => "isDefault = '1'"));
         $result = $price * $defaultCurrency['course'];
         if ($format) $result = number_format($result, $defaultCurrency['cent'], '.', $defaultCurrency['thousands_separator']);
         if ($defaultCurrency['codeName'] == '$' || $defaultCurrency['codeName'] == '€') {
             $result = $defaultCurrency['codeName'] . '' . $result;
         } else {
             $result = $result . ' ' . $defaultCurrency['codeName'];
         }

        return $result;
    }
?>
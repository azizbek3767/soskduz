<?php
    include('../includes/admin.inc.php');

    if ($adminUser['accessLevel'] != 'administrator' and $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

    $action     = getRequestVar('action');
    $currency   = getRequestVar('currency');
    $errors     = array();
    $messages   = array();
    
    $currencyList = true;

    if (isset($action['edit'])){
        
        if (isset($currency['id']))	{
            
    			$currencyList = false;
                $currency = dbQuery('currency', DB_ARRAY, array('where' => "id = '{$currency['id']}'"));
                $smarty->assign('currency', $currency);
        }
        
    } elseif (isset($action['save'])) {
        
        if (empty($currency['title'])) $errors['titleNull'] = true;
        if (empty($currency['codeName'])) $errors['codeNameNull'] = true;
        if (empty($currency['course'])) $errors['course'] = true;
    
        if (empty($errors)) {   
            if (!empty($currency['id'])) {
                dbQuery('currency', DB_UPDATE, array('values' => $currency, 'where' => "id = '{$currency['id']}'"));
            } else {
    			if($maxId = dbQuery('currency', DB_VALUE, array('fields'=>'MAX(id)'))){
    				$currency['id'] = $maxId + 1;
    			} else {
    				$currency['id'] = 1;
    			}
                dbQuery('currency', DB_INSERT, array('values' => $currency));
            }
            $messages['saved'] = true;
                
            // Save serializations
            if (!saveSerializations()) $errors['serializations'] = true;
        } else {
        	$currencyList = false;
            $smarty->assign('action',array('edit'=>true));
        }
        
    } elseif (isset($action['delete'])) {
        
    	dbQuery('currency', DB_DELETE, array('where' => "id = '{$currency['id']}'"));
    	$messages['deleted'] = true;
    	
    	// Save serializations
    	if (!saveSerializations ()) $errors['serializations'] = true;
    	
    } elseif (isset($action['setDefaulrCurrency'])) {
        
    	setDefaultCurrency($currency['id']);
    	
    	// Save serializations
    	if (!saveSerializations ()) $errors['serializations'] = true;
    	
    }
    
    if ($currencyList) {
    	$currencyList = dbQuery('currency', DB_ARRAYS);
        $smarty->assign('currencyList', $currencyList); 
    }
    
    $smarty->assign('errors', $errors);
    $smarty->assign('messages', $messages);
    
    $smarty->display('currency.tpl');
    
    
    /***************** FUNCTIONS *****************/
    
    function setDefaultCurrency($defaultCurrencyId)
    {
    	dbQuery('currency', DB_UPDATE, array('values'  => array('isDefault' => '0'), 'where' => "isDefault = '1'"));
    	                                     
        dbQuery('currency', DB_UPDATE, array('values'  => array('isDefault' => '1'),'where' => "id = '$defaultCurrencyId'"));	                                     
    }
    
    
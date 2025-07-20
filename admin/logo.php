<?php
  include('../includes/admin.inc.php');
  if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));
  
  $languageOptions = include('../includes/languages.inc.php');

	$language = arrAddSlashes(getRequestVar('language', '', $noEscape = true));
	$action  = getRequestVar('action');
    $logo 	= getRequestVar('logo');
	
	if(isset($_FILES) && isset($_FILES['image'])) {
		
		$extensions = array('jpeg', 'jpg', 'png', 'gif', 'svg');
		$maxsize = 2 * 1024 * 1024;
	  	$image = $_FILES['image'];
	 
	  	if  ($_FILES['image']['size'] > $maxsize){  
		  	
            $resData['success'] = 0;
            $resData['message'] = lang('logo:errors:4');
            
	 	} else {
		  	// Загружен ли файл
		  if(!is_uploaded_file($image['tmp_name'])){
		        
		    $resData['success'] = 0;
				$resData['message'] = lang('logo:errors:0');
				
			} else {
				
			 	$ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
			  	// Генерируем новое имя для изображения.
			  	$logo['tmpName'] = SITE_ROOT.'/uploads/logo.' . $ext;
			  	$logo['logoUrl'] = SITE_URL.'/uploads/logo.' . $ext;
			  	$logo['logoName'] = 'logo';
			  	
// 			  	print_r($logo['logoUrl']);
			  	if(empty($logo['lang'])) {
				  	
				  	$resData['success'] = 0;
				  	$resData['message'] = lang('logo:errors:3');
				  	
			  	} else {
				  	// Сверяем доступные форматы изображений, если изображение соответствует
					if (in_array($ext, $extensions)){
						 
						$logo['logoType'] = mysqli_real_escape_string($mysqli, $ext);
						 	
						if (move_uploaded_file($image['tmp_name'], $logo['tmpName'])) { 
							
							//d($logo);
						  if(empty($logo['logoId'])){
								if($logo['logoId'] = dbQuery('logos', DB_INSERT, array('values'=>$logo))){
									 $resData['success'] = 1;
									 $resData['message'] = lang('logo:messages:0');
								}  else {
									$resData['success'] = 0;
									$resData['message'] = lang('logo:errors:2');
								}	
							} else {
								
								if(dbQuery('logos', DB_UPDATE, array('where'=>"logoId='$logo[logoId]'", 'values'=>$logo))){
									$resData['success'] = 1;
									$resData['message'] = lang('logo:messages:1');
								} else {
									
									$resData['success'] = 1;
									$resData['message'] = lang('logo:messages:2');
								}	
							}	
								
						}
				    	
				  	} else{
					  	$resData['success'] = 0;
						$resData['message'] = lang('logo:errors:1');
				  	}
				}
		            	            
	        }
        
        }
        
        
	    echo json_encode($resData);
	    return;
	  	
	}

	
	if(empty($noListing)){
		$allLogos = dbQuery('logos', DB_ARRAYS, array('where'=>"logoId"));
		if(!empty($allLogos)){
			$smarty->assign('allLogos', $allLogos);
		}		
	}
	
  $smarty->display('logo.tpl');
	
?>
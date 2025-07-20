<?php
    include('../includes/admin.inc.php');
    if($adminUser['accessLevel'] != 'administrator' && $adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));

    $section = arrAddSlashes(getRequestVar('section', '', $noEscape = true));
    $action  = getRequestVar('action');
    $page    = (int) getRequestVar('page');
    
    
    $LOGO_DIR = '/themes/'.$config['theme'].'/images/';
    $smarty->assign('LOGO_DIR', $LOGO_DIR);
    
    if ($_POST['action'] != 'add') {

		clearstatcache ();
	
		if (file_exists($_SERVER['DOCUMENT_ROOT'].$LOGO_DIR.'banner_top.jpg') != '1'){
			$err_file_top = 'Файл http://'.$_SERVER['HTTP_HOST'].$LOGO_DIR.'banner_top.jpg отсутствует!';
			$smarty->assign('err_file_top', $err_file_top);
		}
		
		if (file_exists($_SERVER['DOCUMENT_ROOT'].$LOGO_DIR.'banner_left.jpg') != '1'){
			$err_file_left = 'Файл http://'.$_SERVER['HTTP_HOST'].$LOGO_DIR.'banner_left.jpg отсутствует!';
			$smarty->assign('err_file_left', $err_file_left);
		}
		
		if (file_exists($_SERVER['DOCUMENT_ROOT'].$LOGO_DIR.'banner_right.jpg') != '1'){
			$err_file_top = 'Файл http://'.$_SERVER['HTTP_HOST'].$LOGO_DIR.'banner_right.jpg отсутствует!';
			$smarty->assign('err_file_right', $err_file_right);
	    }
    
    }

	if ($_POST['action'] == 'add') {
		
		if (is_uploaded_file($_FILES['top']['tmp_name']) != '1' and is_uploaded_file($_FILES['left']['tmp_name']) != '1' and is_uploaded_file($_FILES['right']['tmp_name']) != '1'){
			
			$err_no_files = 'Не было выбрано ни одного файла!!!';
			$smarty->assign('err_no_files', $err_no_files);
		
		}else{
			
			if ($_FILES['top']['type'] != 'image/pjpeg' and is_uploaded_file($_FILES['top']['tmp_name']) == '1') {
	       		$err_jpg_top = 'Картинка должна быть в формате jpg!';
				$smarty->assign('err_jpg_top', $err_jpg_top);
			} elseif (is_uploaded_file($_FILES['top']['tmp_name']) == '1') {
	           	if(replacebanner($_FILES['top']['tmp_name'], 'banner_top', 'jpg', $_SERVER['DOCUMENT_ROOT'].$LOGO_DIR)){
	           		$add_success = true; $add_success_top = 'Верхний баннер успешно изменен.';
	           		$smarty->assign('add_success', $add_success);
					$smarty->assign('add_success_top', $add_success_top);
	           	}
	        }
	        
	        if ($_FILES['left']['type'] != 'image/pjpeg' and is_uploaded_file($_FILES['left']['tmp_name']) == '1') {
	       		$err_jpg_left = 'Картинка должна быть в формате jpg!';
				$smarty->assign('err_jpg_left', $err_jpg_left);
			} elseif (is_uploaded_file($_FILES['left']['tmp_name']) == '1') {
	           	if(replacebanner($_FILES['left']['tmp_name'], 'banner_left', 'jpg', $_SERVER['DOCUMENT_ROOT'].$LOGO_DIR)){
	           		$add_success = true; $add_success_left = 'Левый баннер успешно изменен.';
	           		$smarty->assign('add_success', $add_success);
					$smarty->assign('add_success_left', $add_success_left);
	           	}
	        }
	        
	        if ($_FILES['top']['type'] != 'image/pjpeg' and is_uploaded_file($_FILES['left']['tmp_name']) == '1') {
	       		$err_jpg_right = 'Картинка должна быть в формате jpg!';
				$smarty->assign('err_jpg_right', $err_jpg_right);
			} elseif (is_uploaded_file($_FILES['right']['tmp_name']) == '1') {
	           	if(replacebanner($_FILES['right']['tmp_name'], 'banner_right', 'jpg', $_SERVER['DOCUMENT_ROOT'].$LOGO_DIR)){
	           		$add_success = true; $add_success_right = 'Правый баннер успешно изменен.';
	           		$smarty->assign('add_success', $add_success);
					$smarty->assign('add_success_right', $add_success_right);
	           	}
	        }
		
		}
    }

    $smarty->display('banner.tpl');
    
    function replacebanner($banner, $file_name, $format, $move_folder) {
		if(file_exists($move_folder.$file_name.".".$format)) unlink($move_folder.$file_name.".".$format);
		$new_banner = imagecreatefromjpeg($banner);
		$file_name .= ".jpg";
		imagejpeg($new_banner, $move_folder.$file_name);
		return $file_name;
	}
?>
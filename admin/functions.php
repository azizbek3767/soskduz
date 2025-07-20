<?php 
    include('../includes/admin.inc.php');
    header('Content-type: application/json');
  
    $error = '';
    // мини сайбар  
    if (isset($_POST['userSidebar']) && !empty($_POST['userSidebar'])){
        $user['check_menu'] = $_POST['userSidebarVal'];
        $user['userId'] = $_POST['userSidebar'];
    
        dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$user[userId]'", 'values'=>$user));
        $message = 'Ваши данные обнавлены!';
        echo json_encode(array('code'=>200, 'msg' => $message));
    }
  
	// удаление картинок из галереи в статьях
	if (!empty($_POST['delAiricleGalImg']) && $_POST['delAiricleGalImg'] == 'deleteImage'){
		$deleteList = $_POST['delAiricleGalId'];
		$fileList = dbQuery('article_gallerys', DB_ARRAYS, array('fields'=>'fileName', 'where'=>"imageId IN ($deleteList)"));
		foreach($fileList as $fileName){
			@unlink(SITE_ROOT . "/uploads/gallery/small-" . $fileName['fileName']);
			@unlink(SITE_ROOT . "/uploads/gallery/medium-" . $fileName['fileName']);
			@unlink(SITE_ROOT . "/uploads/gallery/big-" . $fileName['fileName']);
		}
		if(dbQuery('article_gallerys', DB_DELETE, array('where'=>"imageId IN ($deleteList)"))){
            echo json_encode(1);
		}else {
            echo json_encode(0);
        }
	} 
	
	// удаление картинок из галереи в разделах
	if (!empty($_POST['delSectionGalImg'])){
		$deleteList = $_POST['delSectionGalId'];
		$fileList = dbQuery('section_gallerys', DB_ARRAYS, array('fields'=>'fileName', 'where'=>"imageId IN ($deleteList)")) ;
		foreach($fileList as $fileName){
			@unlink(SITE_ROOT . "/uploads/gallery/small-".$fileName['fileName']);
			@unlink(SITE_ROOT . "/uploads/gallery/medium-" . $fileName['fileName']);
			@unlink(SITE_ROOT . "/uploads/gallery/big-" . $fileName['fileName']);
		}
		if(dbQuery('section_gallerys', DB_DELETE, array('where'=>"imageId IN ($deleteList)"))){		
            echo json_encode(1);
		}else {
            echo json_encode(0);
        }
	} 

    // добавление картинок в текст (в разделах и контент)
    if (isset($_FILES['contentImage']) && !empty($_FILES['contentImage'])){
        $imageFolder = SITE_ROOT."/uploads/posts/";
        $imageFolder2 = SITE_URL.'/uploads/posts/';
        //print_r($imageFolder);
        if (!file_exists($imageFolder)) { 
            mkdir($imageFolder, 0755, true); 
        }
        $filetowrite = '';
        if (is_uploaded_file($_FILES['contentImage']['tmp_name'])){
            // Очистка ввода
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $_FILES['contentImage']['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }    
            $extentions = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "svg", "SVG");
            $image_parts = explode(".", $_FILES['contentImage']['name']);
            $image_end_part = end($image_parts);
      
            if(in_array($image_end_part, $extentions ) == true){
                $filetowrite = $imageFolder . 'post-'.time() . "." . basename($image_end_part);
                $filetowrite2 = $imageFolder2 . 'post-'.time() . "." . basename($image_end_part);
            }else{
                $error = '<div>Формат файла не поддерживается!</div>';
                echo json_encode(array('code'=>400, 'error'=> $error));
                return;
            }  
      
            if(move_uploaded_file($_FILES['contentImage']['tmp_name'], $filetowrite)){
                $message = '<div>Картинка загружена!</div>';
                echo json_encode(array('code'=>200, 'msg'=> $message, 'url' => $filetowrite2));
            }
        
        } else {
            // Уведомление о сбое загрузки
            $error = '<div>HTTP/1.1 500 Server Error</div>';
            echo json_encode(array('code'=>400, 'error'=> $error));
            return;
        }
    }

    // загрузка файлов
    if (isset($_FILES['file']) && !empty($_FILES['file'])){
        print_r($_FILES);
    	$folder = SITE_ROOT."/uploads/files/";
    	if (!file_exists($folder)) { 
        	mkdir($folder, 0755, true); 
        }
        $target_file = $folder . basename($_FILES["file"]["name"]);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$_FILES['file']['name'])) {
            echo json_encode(array('code'=>200));
        } else {
            $error = "Ошибка! файл(ы) не загрузился(ись)";
            echo json_encode(array('code'=>400, 'error'=> $error));
            return;
        }
    }
  
    

    if (!empty($_POST['noActiveUser']) && !empty($_POST['user'])){
        $userId = $_POST['user'];
        $userlogin = $_POST['login'];
        $userIp = $_POST['ip'];
        $adminUserUpdate['status'] = '0';
        $adminUserUpdate['eventOn'] = $gmNow;
        $adminUserUpdate['sessionId'] = '';
        if($adminUserUpdate = dbQuery('admin_users', DB_UPDATE, array('where'=>"userId='$userId'", 'values'=>$adminUserUpdate))){
            $loginHistory['action'] = 'logout';
            $loginHistory['userId']    = $userId;
            $loginHistory['loginName'] = $userlogin;
            $loginHistory['visitorIp'] = $userIp;
            $loginHistory['eventOn']   = gmdate('Y-m-d H:i:s');
			$loginHistory['status'] = 'ok';
            session_destroy();
            dbQuery('admin_history', DB_INSERT, array('values'=>$loginHistory));
            $message = 'Вас давно не было видно!';
            echo json_encode(array('code'=>1, 'msg' => $message));
        }
    }
  
?>
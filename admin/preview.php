<?php
	include('../includes/admin.inc.php');
	
	global $config, $smarty;

	$image_art = getRequestVar('image_art');
	
	/* Получить данные о сообщении */
	$post = isset($_POST) ? $_POST: array();
	switch($post['action']) {
		case 'save' :
		@saveProfilePicTmp();
		break;
		default:
		changeProfilePic();
	}
	
	/* Функция изменения изображения */
	function changeProfilePic() {
		$image_art = getRequestVar('image_art');
		$post = isset($_POST) ? $_POST: array();
		$max_file = "3"; 
		$max_width = "700";
		$path = '../images/articles/' . $image_art . '/';
		$valid_formats = array("jpg", "png", "gif", "jpeg");
		$name = $_FILES['photoimg']['name'];
		$size = $_FILES['photoimg']['size'];
		
		if(strlen($name)) {
			list($txt, $ext) = explode(".", $name);
				
			if(in_array($ext,$valid_formats)) {
				
				if($size < ($max_file*1048576)) { 
					
					$actual_image_name = 'article-medium.'.$ext;  
					$filePath = $path . $actual_image_name; 
					$tmp = $_FILES['photoimg']['tmp_name'];
					//d($filePath);
					if(move_uploaded_file($tmp, $filePath)) { 
						
						$width 	= getWidth($filePath); 
						$height = getHeight($filePath); 
						
						//Scale the image if it is greater than the width set above 
						if ($width > $max_width){
							
							$scale = $max_width/$width;
							$uploaded = resizeImage($filePath,$width,$height,$scale, $ext);
							
						}else{
							
							$scale = 1;
							$uploaded = resizeImage($filePath,$width,$height,$scale, $ext);
						}
					
							echo "<img id='photo' file-name='".$actual_image_name."' src='".$filePath.'?'.time()."' class='preview'/>";
				
					}else
			
					echo "failed";
				
			}else
			
				echo "Размер файла изображения не более 3 МБ";
				
			} else
			
				echo "Недопустимый формат файла..";
		}else
		
		echo "Выберите изображение..!";
		exit;
	}
	
	/* Функция обновления изображения */
	function saveProfilePicTmp() {
		global $config, $smarty;
		$image_art = getRequestVar('image_art');
		$post = isset($_POST) ? $_POST: array();
		$path = '../images/articles/'.$image_art;
		$t_width  = $config['medium_thumb_width']; // Максимальная ширина эскиза
		$t_height = $config['medium_thumb_height'];; // Максимальная высота эскиза
		
		if(isset($_POST['t']) and $_POST['t'] == "ajax") {
			extract($_POST);
			$imagePath = '../images/articles/' . $image_art . '/'. $_POST['image_name'];
			$ratio = ($t_width/$w1);
			$nw = ceil($w1 * $ratio);
			$nh = ceil($h1 * $ratio);
			$nimg = imagecreatetruecolor($nw,$nh);
			$im_src = imagecreatefromjpeg($imagePath);
			imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
			@imagejpeg($nimg,$imagePath,90);
		}
		
		echo $imagePath.'?'.time();
		exit(0);
		
	}


?>



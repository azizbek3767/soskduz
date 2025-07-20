<?php
	include('../includes/admin.inc.php');

	$logger = new Logger();

	$action  	= getRequestVar('action');
	$slider 	= arrAddSlashes(getRequestVar('slider', '', $noEscape = true));
	$status  	= getRequestVar('status');
	$sliderId   = (int) getRequestVar('sliderId');

	if (!empty($action['edit'])) {
		if (empty($errors) && !empty($slider['sliderId'])) {
			$where[] = "sliderId='$slider[sliderId]'";

			if ($slider = dbQuery('sliders', DB_ARRAY, array('where'=>$where))) {
				$users = dbQuery('admin_users', DB_ARRAYS, array('where'=>"userId IN('$slider[addedBy]', '$slider[modifiedBy]')", 'indexKey'=>'userId'));
				$slider['addedBy'] = empty($users[$slider['addedBy']]) ? unknownUser() : $users[$slider['addedBy']];
				$slider['modifiedBy'] = empty($users[$slider['modifiedBy']]) ? unknownUser() : $users[$slider['modifiedBy']];
				$slider['addedOn']     = langdate(adjustTime($slider['addedOn'], false, 'F j, Y H:i'));
				$slider['modifiedOn']  = langdate(adjustTime($slider['modifiedOn'], false, 'F j, Y H:i'));
				$slider['publishedOn'] = adjustTime($slider['publishedOn']);
				
				/* getting slider images */
				$images = dbQuery('slider_images', DB_ARRAYS, array('where'=>"sliderId='$slider[sliderId]'"));
				foreach($images as $image){
					if(!empty($image['codename'])){
						if(empty($slider['images'])) $slider['images'] = array();
						$slider['images'][$image['codename']] = $image;
					} 
				}
				$smarty->assign('slider', $slider);
			} else {
				$errors['slider_not_found'] = true;
			}
		} 

		if(empty($errors)){
			$noItems = true;
			$smarty->assign('statuses', array_slice(lang('sliders:statuses'), 1));
			$smarty->assign('adjustedNow', adjustTime(gmdate('Y-m-d H:i:s')));
		} else {
			$smarty->clearAssign('action');
		}

	/***** CUT FOR DEMO START *****/
	} elseif (!empty($action['save'])) {
		if (empty($slider['title'])) $errors['title'] = true;

		$slider['publishedOn'] = "$slider[Year]-$slider[Month]-$slider[Day] $slider[Hour]:$slider[Minute]:00";
		if(!empty($slider['Meridian'])) $slider['publishedOn'] .= " $slider[Meridian]";
		$slider['publishedOn'] = date('Y-m-d H:i:s', strtotime($slider['publishedOn']));

		if(empty($errors)){

			if(empty($slider['sliderId'])){
				
				$slider['addedBy']      = $adminUser['userId'];
				$slider['addedOn']      = gmdate('Y-m-d H:i:s');
				$slider['modifiedBy']   = $adminUser['userId'];
				$slider['modifiedOn']   = gmdate('Y-m-d H:i:s');
				$slider['publishedOn']  = adjustTime($slider['publishedOn'], $isReverse = true);
        
                // print_r($slider);
				if($slider['sliderId'] = dbQuery('sliders', DB_INSERT, array('values'=>$slider))){
					if(!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        if (uploadedFile($_FILES, $slider['sliderId'])) {
                            $sliderUpdate['hasImage'] = 1;
                        } else {
                            $errors['image_not_saved'] = true;
                            $logger->error("Картинка не загружена при добавление слайда" . $slider['title']);
                        }
					}

					if(!empty($sliderUpdate)) dbQuery('sliders', DB_UPDATE, array('where'=>"sliderId='$slider[sliderId]'", 'values'=>$sliderUpdate));
					$messages['saved'] = true;
                    $logger->info("Добавлен новый слайд «" . $slider['title'] . "»");
				} else {
					$errors['not_saved'] = true;
				}
			} else {

				$where[] = "sliderId='$slider[sliderId]'";
				if(!($oldslider = dbQuery('sliders', DB_ARRAY, array('where'=>$where)))) $errors['slider_not_found'] = true;

				if(empty($errors)){
					unset($slider['addedBy']);
					unset($slider['addedOn']);
					unset($slider['images']);
					unset($slider['hasImage']);

					$slider['modifiedBy']   = $adminUser['userId'];
					$slider['modifiedOn']   = gmdate('Y-m-d H:i:s');
					$slider['publishedOn']  = adjustTime($slider['publishedOn'], $isReverse = true);
					if(empty($slider['isFeatured'])) $slider['isFeatured'] = 0;
				
					if(!empty($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        if (uploadedFile($_FILES, $slider['sliderId'])) {
                            $slider['hasImage'] = 1;
                        } else {
                            $errors['image_not_saved'] = true;
                            $logger->error("Картинка не загружена при редактирование" . $slider['title']);
                        }
					}

					if(dbQuery('sliders', DB_UPDATE, array('where'=>"sliderId='$slider[sliderId]'", 'values'=>$slider))){
						$messages['saved'] = true;
                        $logger->info("Слайд «" . $slider['title'] . "» отредактирован");
					} else {
						$errors['not_saved'] = true;
					}
				}
			}

		
		} else {
			/* if there are any errors in fields */
			$smarty->assign('statuses', array_slice(lang('sliders:statuses'), 1));
			$smarty->assign('action', array('edit'=>true));
			$slider = arrStripSlashes($slider);
			$smarty->assign('slider', $slider);
			$noItems = true;
		}
	} elseif(!empty($action['reorder'])){
		foreach($slider['orderBys'] as $sliderId=>$orderBy){
			dbQuery('sliders', DB_UPDATE, array('where'=>"sliderId='$sliderId'", 'values'=>"orderBy=$orderBy"));
		} 
		
	} elseif(!empty($action['deleteSliderImage']) && !empty($slider['sliderId'])){
		$where[] = "sliderId='$slider[sliderId]'";

		/* deleting image */
		if($sliderId = dbQuery('sliders', DB_VALUE, array('where'=>$where, 'fields'=>'sliderId'))){
			$images = dbQuery('slider_images', DB_ARRAYS, array('where'=>"sliderId='$sliderId'"));
			foreach($images as $image) @unlink(SITE_ROOT."/uploads/sliders/$slider[sliderId]/$image[fileName]");
			dbQuery('slider_images', DB_DELETE, array('where'=>"sliderId='$sliderId' AND codename<>''"));
			dbQuery('sliders', DB_UPDATE, array('where'=>$where, 'values'=>"hasImage=0"));

			echo "document.getElementById('imageOptions').style.display='none';\r\n";
			deleteIfEmpty(SITE_ROOT."/uploads/sliders/$slider[sliderId]");
			exit;
		} else {
			echo "writeStatus('".lang('sliders:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
			exit;
		}
	} elseif(!empty($action['deleteSlide']) && !empty($slider['sliderId'])){ // удаление статьи
		$where[] = "sliderId='$slider[sliderId]'";

		if(dbQuery('sliders', DB_DELETE, array('where'=>$where))){
			dbQuery('slider_images', DB_DELETE, array('where'=>"sliderId='$slider[sliderId]'"));
			deleteDir(SITE_ROOT."/uploads/sliders/$slider[sliderId]/");
            $logger->info("Слайд « ID-" . $slider['sliderId'] . "» удален.");
			echo "removeElement($slider[sliderId], 'slider');\r\n";
			
		} else {
			echo "writeStatus('".lang('sliders:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	} elseif(!empty($action['approveSlider']) && !empty($slider['sliderId'])){
		$where[] = "sliderId='$slider[sliderId]'";

		/* approving slider */
		if(dbQuery('sliders', DB_UPDATE, array('where'=>$where, 'values'=>"status='visible'"))){
			echo "writeStatus('".lang('sliders:messages:3')."');\r\n";
			echo "document.getElementById('status-$slider[sliderId]').innerHTML = 'Включено';\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 3000);\r\n";
		} else {
			echo "writeStatus('".lang('sliders:errors:13')."', 'aError');\r\n";
			echo "window.setTimeout(\"writeStatus('')\", 5000);\r\n";
		}
		exit;
	}

	if(empty($noItems)){
		$where = array();
		if(!empty($status)) $where[] = "status='$status'";

		$fields = array('sliderId', 'title', 'url', 'publishedOn, images');
		$sliders = dbQuery('sliders', DB_ARRAYS, array('order'=>'orderBy', 'indexKey'=>'sliderId', 'where'=>$where));
		$sliders = prepareSliders($sliders);
		foreach($sliders as $sliderId=>$slider){
			$sliders[$sliderId]['statusName'] = lang('sliders:statuses:'.$sliders[$sliderId]['status']);
			$sliders[$sliderId]['publishedOn'] = langdate(adjustTime($slider['publishedOn'], false, 'd.m.Y'));
		}

		/* statuses */
		$smarty->assign('statuses', lang('sliders:statuses'));
		$totalSliders = dbQuery('sliders', DB_VALUE, array('fields'=>'COUNT(*)', 'where'=>$where));
		$smarty->assign('totalSliders', $totalSliders);
		$smarty->assign('sliders', $sliders);
	}

	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);
    try {
        $smarty->display('sliders.tpl');
    } catch (Exception $e) {
        $e->getMessage();
    }


function uploadedFile($img, $slideId) {
     $ext = explode(".", $img['image']['name']);
     $extension = strtolower(array_pop($ext));
     if($images = createThumbnailsSlider($img['image']['tmp_name'], $extension, $slideId, '', $img['image']['name'])){
         $sliderImages = dbQuery('slider_images', DB_ARRAYS, array('where'=>"sliderId='$slideId'"));
         foreach($images as $codename=>$image){
             if(!empty($sliderImages[$codename])) $image['imageId'] = $sliderImages[$codename]['imageId'];
             dbQuery('slider_images', DB_REPLACE, array('values'=>$image));
         }
         return true;
     }
     return false;
}
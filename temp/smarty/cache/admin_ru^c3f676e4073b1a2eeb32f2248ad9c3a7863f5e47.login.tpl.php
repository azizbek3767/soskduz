<?php
/* Smarty version 3.1.33, created on 2025-07-17 09:05:28
  from '/home/soskduz/public_html/admin/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687876882d6ac0_59244188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ea1bbb09dc7bbb4eef05baf88af79b47dfdfe82' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/login.tpl',
      1 => 1571729384,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_687876882d6ac0_59244188 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>        
    <title>Вход в админ-панель - Life Style CMS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />     
    <link href="https://www.sos-kd.uz/admin/assets/favicon/favicon.png" rel="icon" type="image/x-icon"/>
    <link href="https://www.sos-kd.uz/admin/assets/favicon/favicon.png" rel="shortcut icon">
    <link href="https://www.sos-kd.uz/admin/assets/favicon/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://www.sos-kd.uz/admin/assets/favicon/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="https://www.sos-kd.uz/admin/assets/favicon/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="https://www.sos-kd.uz/admin/assets/favicon/icon-192x192.png" rel="icon" sizes="192x192">
          
    <link rel="stylesheet" type="text/css" href="assets/css/admin-theme.min.css"/>
    <script type="text/javascript" src="assets/js/plugins-header.js"></script>
</head>
<body>
    
    <div class="login-container login-v2">
        <div class="login-box">
            <form method="post" action="login.php" id="login">
                <input type="hidden" name="action[login]" value="1"/>
                <div class="login-body form-horizontal">
                    <div class="login-logo"></div>
                                          					 
                    <div class="form-group" style="margin-bottom: 10px">
                        <div class="col-md-12 nopadding">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                <input type="text" id="adlogin" name="login[loginName]" value="" class="form-control" placeholder="Пользователь" autocomplete="on" style="margin-bottom: 0"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 10px">
                        <div class="col-md-12 nopadding">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-lock"></span></div>                                
                                <input type="password" id="adpass" type="password" name="login[password]" class="form-control" placeholder="Пароль" autocomplete="on" style="margin-bottom: 0"/>
                            </div>
                        </div>
                    </div>
                      					
                    <div class="form-group"><input type="submit" class="btn btn-info btn-block ls_btn" value="Вход в админ-панель" style="height:40px;"/> </div>
                    <div class="podderjka"><p class="pull-right">Забыли пароль?<br> Напишите в техподдержку <a href="mailto:info@life-style.uz">info@life-style.uz</a></p></div>
                </div>
            </form>
        </div>
            
        <div class="login-footer">
            <div class="col-md-6"><p class=" pull-left"> &copy; 2001-2025 <a href="http://life-style.uz/">Создание и продвижение сайтов</a> Life Style</p></div>
            <div class="col-md-6"><p class="pull-right"> <a href="https://life-style.uz/contacts/index.htm" target="_blank">Контакты</a></p></div>
        </div>
    
    </div>

	<script type="text/javascript">
	  
	(function($) {
    $( document ).ready(function() {
  
	    var classnum = 3 // 6 - количество классов с фоном
			var random = Math.floor(Math.random()*classnum);
		
			$("div.login-container").addClass("body_background_"+random); // добавляем случайный фон
			$("div.login-container").addClass("body_background_all"); // добавляем общий класс
			
			$("div.lockscreen-container").addClass("body_background_"+random); // добавляем случайный фон
			$("div.lockscreen-container").addClass("body_background_all"); // добавляем общий класс
		  });
	})(jQuery) 
	
	
	</script>
</body>
</html>






<?php }
}

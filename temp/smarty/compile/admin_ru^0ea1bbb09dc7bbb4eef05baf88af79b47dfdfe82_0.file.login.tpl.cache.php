<?php
/* Smarty version 3.1.33, created on 2025-07-17 09:05:28
  from '/home/soskduz/public_html/admin/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687876882c8863_03668765',
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
  'includes' => 
  array (
  ),
),false)) {
function content_687876882c8863_03668765 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '16782812846878768829b317_73107022';
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>        
    <title>Вход в админ-панель - Life Style CMS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['charset'], ENT_QUOTES, 'UTF-8', true);?>
">
    <meta name="viewport" content="width=device-width, initial-scale=1" />     
    <link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/assets/favicon/favicon.png" rel="icon" type="image/x-icon"/>
    <link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/assets/favicon/favicon.png" rel="shortcut icon">
    <link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/assets/favicon/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/assets/favicon/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/assets/favicon/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/assets/favicon/icon-192x192.png" rel="icon" sizes="192x192">
          
    <link rel="stylesheet" type="text/css" href="assets/css/admin-theme.min.css"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="assets/js/plugins-header.js"><?php echo '</script'; ?>
>
</head>
<body>
    
    <div class="login-container login-v2">
        <div class="login-box">
            <form method="post" action="login.php" id="login">
                <input type="hidden" name="action[login]" value="1"/>
                <div class="login-body form-horizontal">
                    <div class="login-logo"></div>
                    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?><p style="color: #fff"><?php if ($_smarty_tpl->tpl_vars['messages']->value['logged_out']) {?>Вы вышли из системы администрирования.<?php }?></p><?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
                    <p class="error">
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['enter_username'])) {?>Введите имя пользователя.<br><?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['enter_password'])) {?>Введите пароль.<br><?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['wrong_username_password'])) {?>Введенные имя пользователя и пароль неверные.<?php }?>	                		
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['enter_username_password'])) {?>Введите имя пользователя и пароль.<?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['captcha'])) {?>Введите цифры, отображенные на картинке <a href="http://ru.wikipedia.org/wiki/CAPTCHA">CAPTCHA</a>.<?php }?>	
                    </p>
                    <?php }?>
  					 
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
                    <?php if (isset($_smarty_tpl->tpl_vars['requireCaptcha']->value)) {?>
                    <div class="form-group">
                        <div class="col-md-6 nopadding_left" title="Полностью автоматизированный публичный тест Тьюринга для различения компьютеров и людей">
                            <div class="row"><input class="form-control" type="text" name="login[captcha]" autocomplete="off" placeholder="CAPTCHA"></div>
                        </div>
                        <div class="col-md-6 nopadding_right"><img src="captcha.php" align="absMiddle" alt="CAPTCHA" style="border-radius: 4px;"/></div>
                    </div>
                    <?php }?>
  					
                    <div class="form-group"><input type="submit" class="btn btn-info btn-block ls_btn" value="Вход в админ-панель" style="height:40px;"/> </div>
                    <div class="podderjka"><p class="pull-right">Забыли пароль?<br> Напишите в техподдержку <a href="mailto:info@life-style.uz">info@life-style.uz</a></p></div>
                </div>
            </form>
        </div>
            
        <div class="login-footer">
            <div class="col-md-6"><p class=" pull-left"> &copy; 2001-<?php echo htmlspecialchars(smarty_modifier_date_format(time(),"%Y"), ENT_QUOTES, 'UTF-8', true);?>
 <a href="http://life-style.uz/">Создание и продвижение сайтов</a> Life Style</p></div>
            <div class="col-md-6"><p class="pull-right"> <a href="https://life-style.uz/contacts/index.htm" target="_blank">Контакты</a></p></div>
        </div>
    
    </div>

	<?php echo '<script'; ?>
 type="text/javascript">
	  
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
	
	
	<?php echo '</script'; ?>
>
</body>
</html>






<?php }
}

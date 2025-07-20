<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>        
    <title>{login:title} - {productName}</title>
    <meta http-equiv="Content-Type" content="text/html; charset={$config.charset}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />     
    <link href="{$SITE_URL}/admin/assets/favicon/favicon.png" rel="icon" type="image/x-icon"/>
    <link href="{$SITE_URL}/admin/assets/favicon/favicon.png" rel="shortcut icon">
    <link href="{$SITE_URL}/admin/assets/favicon/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{$SITE_URL}/admin/assets/favicon/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="{$SITE_URL}/admin/assets/favicon/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="{$SITE_URL}/admin/assets/favicon/icon-192x192.png" rel="icon" sizes="192x192">
          
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
                    {if isset($messages)}<p style="color: #fff">{if $messages.logged_out}{login:errors:1}{/if}</p>{/if}
                    {if isset($errors)}
                    <p class="error">
                        {if isset($errors.enter_username)}{login:errors:5}<br>{/if}
                        {if isset($errors.enter_password)}{login:errors:6}<br>{/if}
                        {if isset($errors.wrong_username_password)}{login:errors:0}{/if}	                		
                        {if isset($errors.enter_username_password)}{login:errors:3}{/if}
                        {if isset($errors.captcha)}{login:errors:4}{/if}	
                    </p>
                    {/if}
  					 
                    <div class="form-group" style="margin-bottom: 10px">
                        <div class="col-md-12 nopadding">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                <input type="text" id="adlogin" name="login[loginName]" value="" class="form-control" placeholder="{login:username}" autocomplete="on" style="margin-bottom: 0"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 10px">
                        <div class="col-md-12 nopadding">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-lock"></span></div>                                
                                <input type="password" id="adpass" type="password" name="login[password]" class="form-control" placeholder="{login:password}" autocomplete="on" style="margin-bottom: 0"/>
                            </div>
                        </div>
                    </div>
                    {if isset($requireCaptcha)}
                    <div class="form-group">
                        <div class="col-md-6 nopadding_left" title="{login:captchaDesc}">
                            <div class="row"><input class="form-control" type="text" name="login[captcha]" autocomplete="off" placeholder="{login:captcha}"></div>
                        </div>
                        <div class="col-md-6 nopadding_right"><img src="captcha.php" align="absMiddle" alt="{login:captcha}" style="border-radius: 4px;"/></div>
                    </div>
                    {/if}
  					
                    <div class="form-group"><input type="submit" class="btn btn-info btn-block ls_btn" value="{login:signIn}" style="height:40px;"/> </div>
                    <div class="podderjka"><p class="pull-right">{header:forgotPassword}<br> {header:techSupport} <a href="mailto:info@life-style.uz">info@life-style.uz</a></p></div>
                </div>
            </form>
        </div>
            
        <div class="login-footer">
            <div class="col-md-6"><p class=" pull-left"> &copy; 2001-{$smarty.now|date_format:"%Y"} <a href="http://life-style.uz/">{header:copyright}</a> Life Style</p></div>
            <div class="col-md-6"><p class="pull-right"> <a href="https://life-style.uz/contacts/index.htm" target="_blank">{header:contacts}</a></p></div>
        </div>
    
    </div>

	<script type="text/javascript">
	{literal}  
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
	
	{/literal}
	</script>
</body>
</html>







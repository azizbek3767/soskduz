<?php
/* Smarty version 3.1.33, created on 2025-06-28 21:26:09
  from '/home/soskduz/public_html/admin/templates/users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_686017a123dc22_44299858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdc83d0aba253eea42f6f2a1d18694c3c4d30bf3' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/users.tpl',
      1 => 1571729386,
      2 => 'file',
    ),
    '4629014038a5128208a4f1719eeb7e10cf5c5a7b' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/header.tpl',
      1 => 1604269700,
      2 => 'file',
    ),
    'b567440c09fc9deb5ebf6c836e5b385318de2435' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/footer.tpl',
      1 => 1571729382,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_686017a123dc22_44299858 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
      <title>Администраторы - Управление - Life Style CMS</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
      <link rel="manifest" href="assets/favicon/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
        <meta name="robots" content="noindex, follow" />    
      <link rel="stylesheet" type="text/css" href="assets/css/admin-theme.min.css"/>
    
      <script type="text/javascript" src="assets/js/plugins-header.js"></script>

      <link href="assets/js/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />

      <script src="assets/js/jquery-scrollbar/jquery.scrollbar.min.js"></script>
      <script type="text/javascript" src="assets/js/script.js"></script>
      <script>
          lang = new Array();
                        lang['operationError'] = 'Операция завершена с ошибкой. Страница будет перезагружена. Ответ сервера:';
                        lang['processingRequest'] = 'Обрабатывается другой запрос. Попробуйте повторить запрос позже.';
                        lang['movingDown'] = 'Перемещаем вниз';
                        lang['movingUp'] = 'Перемещаем вверх';
                        lang['sureToChangeLang'] = 'Вы уверены, что хотите изменить основной язык сайта на';
                        lang['sureToDelete'] = 'Вы уверены, что хотите удалить';
                        lang['sureToDeleteOrderStatus'] = 'Вы уверены, что хотите удалить статус';
                        lang['sureToDeleteImage'] = 'Вы уверены, что хотите удалить картинку';
                        lang['surToDeleteImage'] = 'Вы уверены, что хотите удалить изображение?';
                        lang['sureToDeleteStats'] = 'Вы уверены, что хотите удалить статистические данные до';
                        lang['deletingImage'] = 'Картинка удаляется';
                        lang['deletingSecImage'] = 'картинка удалится после сохранения';
                        lang['deletingUser'] = 'Пользователь удаляется';
                        lang['deletingArticle'] = 'Статья удаляется';
                        lang['deletingMail'] = 'Письмо удаляется';
                        lang['deletingOrderStatus'] = 'Статус заказа удаляется';
                        lang['sureToDeleteLabel'] = 'Вы уверены, что хотите удалить';
                        lang['deletingLabel'] = 'Удаляется';
                        lang['deletingСountry'] = 'Страна удаляется';
                        lang['deletingTemplate'] = 'Шаблон удаляется';
                        lang['deletingCss'] = 'Стили удаляются';
                        lang['changingStatus'] = 'Изменяется статус';
                        lang['smartyErrorOnLine'] = 'Smarty: ошибка на строке';
                        lang['testingTemplate'] = 'Шаблон тестируется';
                        lang['search'] = 'Искать';
                        lang['clearingCache'] = 'Очищается кэш';
                        lang['clearingStats'] = 'Очищаются статистические данные, пожалуйста подождите';
                        lang['changeDefaultLang'] = 'Изменить основной язык';
                        lang['demoMode'] = 'В демонстрационном режиме эта функция заблокирована.';
                </script>
</head>
  
<body class="">
    <div id="page_container" class="page-container page-navigation-top-fixed ">
        <div class="page-header">
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <li class="xn-logo pull-left"><a></a><a href="#" class="x-navigation-control"></a></li>
                <li class="xn-icon-button">
                    <a href="#" id="mini" class="x-navigation-minimize" data-user="1"  data-val="1"><span class="fa fa-outdent"></span></a>
                </li>

                <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                    <div class="mb-container">
                        <div class="mb-middle">
                            <div class="mb-title"><span class="fa fa-sign-out"></span> Выйти ?</div>
                            <div class="mb-content"><p>Вы действительно хотите выйти?</p><p></p></div>
                            <div class="mb-footer">
                                <div class="pull-right">
                                    <a href="https://www.sos-kd.uz/admin/login.php?action[logout]=true" class="btn btn-success btn-lg close_yes">Да</a>
                                    <button class="btn btn-default btn-lg mb-control-close close_no">Нет</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <li class="pull-right last">
                    <a id="userbox" class="userbox">
                        <figure class="profile-picture">
                                                            <img src="https://www.sos-kd.uz/admin/avatar/1/user-medium.jpg" alt="admin" class="rounded-circle"/>
                                                    </figure>
                        <div class="profile-info">
                            <span class="name">admin</span>
                            <span class="role"> Администратор</span>
                        </div>
                        <i class="fa fa-angle-down"></i>
                    </a>
  
                    <div class="userbox_info animated zoomIn">
                        <ul class="list-unstyled mb-2">
                            <li class="divider"></li>
                            <li><a href="users.php?action[edit]=true&user[userId]=1"><i class="fa fa-user"></i>Профиль</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><i class="fa fa-power-off"></i> Выход</a></li>
                        </ul>
                    </div>

                </li>
  
                <li class="xn-icon-button pull-right">
                    <a target="blank" href="https://www.sos-kd.uz/">
                        <span class="fa fa-desktop" data-toggle="tooltip" data-placement="left" data-original-title="Перейти на сайт"></span>
                    </a>
                </li>
          

                
                        
  
                    <li class="xn-icon-button pull-right hidden-xs">
                        <a href="#" style="width: 40px;" data-toggle="tooltip" data-placement="left" title data-original-title="Компрессия выключена">
                            <span class="icon-markup">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M6.01 14.707l5.812-8c.16-.223.14-.668-.285-.668H9.234c-.27 0-.393-.2-.262-.448l2.046-3.875c.147-.24.143-.717-.3-.717H6.514c-.266 0-.552.213-.618.477L4.12 8.527c-.066.262.105.477.383.477h2.04c.283 0 .422.21.324.472 0 0-1.866 4.93-1.866 5.025 0 .276.224.5.5.5.144 0 .275-.06.366-.16.053-.03.102-.074.145-.133z" class="icon-color-yellow"></path>
                                </svg>
                            </span>
                        </a>
                    </li>

                                            <li class="xn-icon-button pull-right">
                            <a href="#">
                                <span class="flag fa fa-flag" style="font-size: 16px;"></span>
                                <div class="informer informer-warning">ru</div>
                            </a>
                            <ul class="xn-drop-left animated zoomIn">
                                                                                                            <li class="active">
                                            <a href="https://www.sos-kd.uz/admin/users.php?action[edit]=true&amp;user[userId]=1">
                                                <span class="flag flag-ru"></span> Русский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/en/users.php?action[edit]=true&amp;user[userId]=1">
                                                <span class="flag flag-en"></span> Английский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/uz/users.php?action[edit]=true&amp;user[userId]=1">
                                                <span class="flag flag-uz"></span> Узбекский
                                            </a>
                                        </li>
                                                                                                </ul>
                        </li>
                    
                
             
            </ul>
        </div>

        <nav class="page-sidebar page-sidebar-fixed" data-pages="sidebar">
            <div class="sidebar-menu">
                <div id="page_sidebar" class="page-sidebar ">
                    <ul id="navigation_sidebar" class="menu-items x-navigation x-navigation-custom ">
        
                                                <li class="xn-openable ">
                            <a href="null"><span class="fa fa-chart-area"></span> <span class="xn-text"> Статистика</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="stats.overview.php"><span class="fa fa-signal"></span> Обзор</a>
                                </li>
                                                                <li class="">
                                    <a href="stats.visitors.php"><span class="fa fa-male"></span> Посетители</a>
                                </li>
                                                                <li class="">
                                    <a href="stats.referers.php"><span class="fa fa-globe"></span> Источники</a>
                                </li>
                                                                <li class="">
                                    <a href="stats.bots.php"><span class="fab fa-android"></span> Боты</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable ">
                            <a href="sections.php"><span class="fa fa-layer-group"></span> <span class="xn-text"> Структура</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="sections.php"><span class="fa fa-layer-group"></span> Структура</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable ">
                            <a href="null"><span class="fa fa-file-contract"></span> <span class="xn-text"> Контент</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="sliders.php"><span class="fa fa-file-contract"></span> Слайдер</a>
                                </li>
                                                                <li class="">
                                    <a href="articles.php"><span class="fa fa-file-contract"></span> Контент</a>
                                </li>
                                                                <li class="">
                                    <a href="products.php"><span class="fa fa-file-contract"></span> Продукция</a>
                                </li>
                                                                <li class="">
                                    <a href="news.php"><span class="fa fa-file-contract"></span> Новости</a>
                                </li>
                                                                <li class="">
                                    <a href="questions.php"><span class="fa fa-file-contract"></span> Вопросы и ответы</a>
                                </li>
                                                                <li class="">
                                    <a href="what_we_do.php"><span class="fa fa-file-contract"></span> Что мы делаем</a>
                                </li>
                                                                <li class="">
                                    <a href="partners.php"><span class="fa fa-file-contract"></span> Наши партнеры</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable ">
                            <a href="null"><span class="fa fa-address-card"></span> <span class="xn-text"> Наши адреса</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="contacts.php"><span class="fa fa-address-card"></span> Наши адреса</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable ">
                            <a href="donations.php"><span class="fa fa-money-check-alt"></span> <span class="xn-text"> Пожертвования</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="donations.php"><span class="fa fa-money-check-alt"></span> Сумма пожертвования</a>
                                </li>
                                                                <li class="">
                                    <a href="donation.subscribers.php"><span class="fa fa-users"></span> Подписки</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable  active">
                            <a href="customers.php"><span class="fa fa-cog"></span> <span class="xn-text"> Система</span></a>
                            <ul>
                                                                <li class="active">
                                    <a href="users.php"><span class="fa fa-users"></span> Администраторы</a>
                                </li>
                                                                <li class="">
                                    <a href="logo.php"><span class="fab fa-r-project"></span> Логотип сайта</a>
                                </li>
                                                                <li class="">
                                    <a href="settings.php"><span class="fa fa-cogs"></span> Настройки</a>
                                </li>
                                                                <li class="">
                                    <a href="socials.php"><span class="fa fa-link"></span> Социальные сети</a>
                                </li>
                                                                <li class="">
                                    <a href="numbers.php"><span class="fa fa-calculator"></span> Бенефициар</a>
                                </li>
                                                                <li class="">
                                    <a href="maps.php"><span class="fa fa-map-marked-alt"></span> Настройки карты</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable ">
                            <a href="javascript:;"><span class="fab fa-amazon-pay"></span> <span class="xn-text"> Способы оплаты</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="payments.php"><span class="fab fa-amazon-pay"></span> Способы оплаты</a>
                                </li>
                                                                <li class="">
                                    <a href="from_abroad.php"><span class="fab fa-amazon-pay"></span> From abroad</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable ">
                            <a href="javascript:;"><span class="fa fa-envelope"></span> <span class="xn-text"> Рассылка писем</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="subscribers.php"><span class="fa fa-users"></span> Подписчики</a>
                                </li>
                                                                <li class="">
                                    <a href="subscribe.php"><span class="fa fa-envelope"></span> Рассылка писем</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable ">
                            <a href="javascript:;"><span class="fa fa-info"></span> <span class="xn-text"> Дополнительно</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="about.php"><span class="fa fa-coffee"></span> О проекте</a>
                                </li>
                                                                <li class="">
                                    <a href="documentation.php"><span class="fa fa-info"></span> Документация</a>
                                </li>
                                                            </ul>
                        </li>
                                            </ul>
                </div>
            </div>
        </nav>
     
        <div class="page-content">
       



        
     
                 
     
         
          
  <script>
    $(document).ready(function () {
                                                                                        
            });
    function deleteImageMessage(){
        noty({
            text: 'Картинка удалена.',
            layout: 'topRight',
            type: 'success'
        })
    }
    function deleteUserMessage(){
        noty({
            text: 'Пользователь удален.',
            layout: 'topRight',
            type: 'success'
        })
    }           
    </script>
  
  
<div class="page-content-wrap">

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
        <div class="col-md-3 col-xs-3 nopadding"><div class="page-title"><h2>Профайл пользователя</h2></div></div> 	
			<div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"> </div> 
            </div>
		</div>
	</div>	
	<form action="users.php" method="post" enctype="multipart/form-data" id="user">
		<input type="hidden" name="user[userId]" value="1" />
		<input type="hidden" name="action[save]" value="1" />
		
		<div class="page-content-wrap">
            <div class="row">                        
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                                                    <div class="panel-body"><h3>Редактирование пользователя</h3></div>
                                                <div class="panel-body">
                            
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label for="fullName" class="field_name ">Полное имя</label></div>
                                <div class="col-md-9 nopadding_right">
                                    <input class="form-control" autocomplete="off" id="fullName" type="text" name="user[fullName]" value="admin" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label for="loginName" class="field_name ">Логин</label></div>
                                <div class="col-md-9 nopadding_right">
                                    <input class="form-control" autocomplete="off" id="loginName" type="text" name="user[loginName]" value="admin" />
                                </div>
                            </div>
              
                                                        <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label for="password" class="field_name ">Новый пароль</label></div>
                                <div class="col-md-9 nopadding_right"><input class="form-control" id="newPassword" type="password" name="user[newPassword]"/></div>
                            </div>
                                                        <div class="form-group">
                                <div class="col-md-3 nopadding_left">E-mail</div>
                                <div class="col-md-9 nopadding_right">
                                    <input class="form-control" autocomplete="off" id="email" type="text" name="user[email]" value="info@sos-kd.uz"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label class="field_name">Уровень доступа</label></div>
                                <div class="col-md-9 nopadding_right"> 
                                       
                                        <select name="user[accessLevel]" class="form-control select" id="accessLevel" onchange="accessLevelChange()">
<option value="developer" id="accessLevel-0">Разработчик</option>
<option value="administrator" selected="selected" id="accessLevel-1">Администратор</option>
<option value="editor" id="accessLevel-2">Редактор</option>
<option value="writer" id="accessLevel-3">Писатель</option>
</select>

                                                                                              
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label class="field_name">Контроль доступа</label></div>
                                <div class="col-md-9 nopadding_right"> 
                                    <div class="check_box" style="margin-bottom: 5px">
                                        <label class="check" id="labelAllow" class="passive">
                                            <input class="icheckbox" type="radio" name="user[permitAllSections]" value="1" id="allow" checked />
                                            <i> Разрешить доступ ко всем разделам</i>
                                        </label>
                                    </div>
                                    <div class="check_box">
                                        <label class="check" id="labelDisallow" class="passive">
                                            <input class="iradio" type="radio" name="user[permitAllSections]" value="0" id="disallow"  />
                                            <i> Разрешить доступ только к <span onclick="document.getElementById('disallow').checked='true'; openPane('rights')" id="link2rights">выбранным разделам</span></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
              
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label class="field_name">Доступ к разделам</label></div>
                                                                <div class="col-md-9 nopadding_right"> 
                                    <select multiple class="form-control select" name="user[sectionRights][]">
                                        <option value=""></option>
                                         
                                            <option value="1"  >
                                                  Главная
                                            </option>
                                         
                                            <option value="2"  >
                                                  SOS Детские деревни Узбекистана
                                            </option>
                                         
                                            <option value="58"  >
                                                ::  СМИ о нас
                                            </option>
                                         
                                            <option value="13"  >
                                                ::  Официальные документы
                                            </option>
                                         
                                            <option value="12"  >
                                                ::  Организационная структура
                                            </option>
                                         
                                            <option value="11"  >
                                                ::  Ассоциация SOS Детские деревни в Узбекистане
                                            </option>
                                         
                                            <option value="10"  >
                                                ::  Идея
                                            </option>
                                         
                                            <option value="3"  >
                                                  Что мы делаем
                                            </option>
                                         
                                            <option value="32"  >
                                                ::  Вопросы и ответы
                                            </option>
                                         
                                            <option value="18"  >
                                                ::  Проекты
                                            </option>
                                         
                                            <option value="55"  >
                                                ::  Защита детей и молодежи
                                            </option>
                                         
                                            <option value="17"  >
                                                ::  Сопровождение молодёжи
                                            </option>
                                         
                                            <option value="16"  >
                                                ::  Поддержка уязвимых семей
                                            </option>
                                         
                                            <option value="15"  >
                                                ::  Альтернативная опека
                                            </option>
                                         
                                            <option value="4"  >
                                                  Где мы работаем
                                            </option>
                                         
                                            <option value="53"  >
                                                ::  Сурхандарьинская
                                            </option>
                                         
                                            <option value="52"  >
                                                ::  Наманганская
                                            </option>
                                         
                                            <option value="51"  >
                                                ::  Джизакская
                                            </option>
                                         
                                            <option value="50"  >
                                                ::  Ферганская
                                            </option>
                                         
                                            <option value="49"  >
                                                ::  Сырдарьинская
                                            </option>
                                         
                                            <option value="47"  >
                                                ::  Навоийская
                                            </option>
                                         
                                            <option value="46"  >
                                                ::  Кашкадарьинская
                                            </option>
                                         
                                            <option value="45"  >
                                                ::  Бухарская
                                            </option>
                                         
                                            <option value="44"  >
                                                ::  Республика Каракалпакстан
                                            </option>
                                         
                                            <option value="43"  >
                                                ::  Андижанская
                                            </option>
                                         
                                            <option value="21"  >
                                                ::  Ургенч и Шават (Хорезмская область)
                                            </option>
                                         
                                            <option value="20"  >
                                                ::  Самарканд
                                            </option>
                                         
                                            <option value="19"  >
                                                ::  Ташкент1
                                            </option>
                                         
                                            <option value="48"  >
                                                ::  Ташкент
                                            </option>
                                         
                                            <option value="6"  >
                                                  Что можете сделать вы
                                            </option>
                                         
                                            <option value="31"  >
                                                ::  Реквизиты для юридических лиц
                                            </option>
                                         
                                            <option value="24"  >
                                                ::  Ящики для пожертвований
                                            </option>
                                         
                                            <option value="23"  >
                                                ::  Благотворительные открытки
                                            </option>
                                         
                                            <option value="22"  >
                                                ::  Помочь сейчас
                                            </option>
                                         
                                            <option value="7"  >
                                                  Последние новости и события
                                            </option>
                                         
                                            <option value="9"  >
                                                  Контакты
                                            </option>
                                         
                                            <option value="8"  >
                                                  Ознакомительный фильм об Ассоциации SOS Детские деревни Узбекистана
                                            </option>
                                         
                                            <option value="25"  >
                                                  Что вы получите, работая в SOS Детские деревни Узбекистана:
                                            </option>
                                         
                                            <option value="28"  >
                                                ::  Кандидат на вакансию SOS воспитатель (SOS мама):
                                            </option>
                                         
                                            <option value="27"  >
                                                ::  Кандидат на вакансию в SOS Детской деревне:
                                            </option>
                                         
                                            <option value="26"  >
                                                ::  Кандидат на вакансию в Национальном офисе:
                                            </option>
                                         
                                            <option value="5"  >
                                                  Наши партнеры
                                            </option>
                                         
                                            <option value="33"  >
                                                  Магазин
                                            </option>
                                         
                                            <option value="36"  >
                                                ::  Самоделки
                                            </option>
                                         
                                            <option value="35"  >
                                                ::  Футболки
                                            </option>
                                         
                                            <option value="34"  >
                                                ::  Открытки
                                            </option>
                                         
                                            <option value="37"  >
                                                  Корзина
                                            </option>
                                         
                                            <option value="38"  >
                                                  Цифры и факты
                                            </option>
                                         
                                            <option value="41"  >
                                                ::  Молодых людей из SOS
                                            </option>
                                         
                                            <option value="40"  >
                                                ::  На сегодняшний день
                                            </option>
                                         
                                            <option value="39"  >
                                                ::  SOS-семьях воспитывается
                                            </option>
                                         
                                            <option value="42"  >
                                                  Фотогалерея
                                            </option>
                                         
                                            <option value="54"  >
                                                  Публичная оферта
                                            </option>
                                         
                                            <option value="14"  >
                                                  Вакансии
                                            </option>
                                         
                                            <option value="30"  >
                                                ::  Принципы работы с персоналом:
                                            </option>
                                         
                                            <option value="29"  >
                                                ::  Стандарты управления персоналом SOS Детские деревни Узбекистана:
                                            </option>
                                         
                                            <option value="56"  >
                                                  Политика конфиденциальности
                                            </option>
                                         
                                    </select> 
                                </div>
                                                            </div>

              
                            <div class="btn-group pull-right" style="padding-top: 10px;padding-bottom: 15px;">
                                <div class="col-md-12 col-xs-5">
                                    <input class="btn btn-primary" type="submit" value="&nbsp; Сохранить &nbsp;" /> &nbsp; 
                                    <a class="btn btn-primary" href="users.php">Отменить</a>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="panel panel-default">                                
                        <div class="panel-body">
                            <h3>Фото пользователя</h3>
                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 nopadding">
                                 
                                    Фото  
                                    <div class="file-previewzo-obzor" id="imageOptions">
                                        <div class="close fileinput-remove text-right" onclick="return deleteAdminUserImage(1)" data-toggle="tooltip" data-placement="left" data-original-title="Удалить картинку">×</div>
                                        <div class="file-preview-thumbnails">
                                            <div class="file-preview-frame" id="imageOptions"><img src="https://www.sos-kd.uz/admin/avatar/1/user-medium.jpg" class="file-preview-image" alt="Политика конфиденциальности"></div>
                                            <div id="ajaxStatus"></div>
                                            <span id="deletingStatus"></span>
                                            <span id="errorBlock"></span>
                                        </div>
  							       </div>
                                                                    <div class=""><input type="file" name="image" id="file-simple" data-preview-file-type="any"></div>
                                </div> 
                            </div>
                
                            <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>

                        </div>
                        
                        <div class="panel-body form-group-separated">
                                                        <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Публикаций</label>
                                <div class="col-md-6 col-xs-7">184</div>
                            </div>
                                                                                    <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">E-mail</label>
                                <div class="col-md-6 col-xs-7">info@sos-kd.uz</div>
                            </div>
                                                                                    <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Зарегистрирован</label>
                                <div class="col-md-6 col-xs-7">21.10.2014 14:33</div>
                            </div>
                                                                                    <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Полное имя</label>
                                <div class="col-md-6 col-xs-7">admin</div>
                            </div>
                                                                                                                <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Статус</label>
                                <div class="col-md-6 col-xs-7">
                                     <span style="color: #009688">online</span>                                </div>
                            </div>
                                                    </div>
                    </div>
                </div>        
            </div>
        </div> 
    </form>

    <script>
      $("#file-simple").fileinput({
      	showUpload: false,
      	uploadClass: "btn btn-success",
      	uploadLabel: "Upload",
      	showCaption: false,
      	showRemove: true,
      	removeClass: "btn btn-danger",
      	removeLabel: "Удалить",
      	browseClass: "btn btn-primary",
      	fileType: "any",
      	showPreview: true,
      	allowedFileTypes: ["image"],
        allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
        elErrorContainer: "#errorBlock",
        overwriteInitial: true,
        maxFileSize: 400
    });
    </script>


</div>
		</div>            
	</div>
	
	
  <audio id="audio-alert" src="assets/audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="assets/audio/fail.mp3" preload="auto"></audio>
  
  <script type="text/javascript" src="assets/js/plugins-footer.js"></script>
   
  <script type='text/javascript' src='assets/js/noty/jquery.noty.js'></script>
  <script type='text/javascript' src='assets/js/noty/layouts/topCenter.js'></script>
  <script type='text/javascript' src='assets/js/noty/layouts/topLeft.js'></script>
  <script type='text/javascript' src='assets/js/noty/layouts/topRight.js'></script>
  <script type='text/javascript' src='assets/js/noty/themes/default.js'></script>

  <script type="text/javascript" src="assets/js/main.js"></script>
  <script type="text/javascript" src="assets/js/actions.js"></script>
  <script>

    $(function() { 
        var toc = $("#tocify").tocify({ 
            context: ".tocify-content", 
            showEffect: "fadeIn",
            extendPage:false,
            selectors: "h3, h4, h5" 
        });
    });
  
  var validNavigation = false;
  var noActiveUser = 1; 
  var user =  '1'; 
  var login = 'admin'; 
  var ip = '188.113.236.100';
  
  function timerIncrement() {
    idleTime = idleTime + 1;
    
    if (idleTime > 29) {
      $.ajax({ 
        url: 'functions.php', 
        type: 'POST', 
        data: { noActiveUser:noActiveUser, user:user, login:login, ip:ip }, 
        datatype: 'json', 
        success: function(d){ 
          if (d.code == 1){ 
            location.reload(); 
          } 
        } 
      });
    }
  }; 
  
    
    </script>
  </body>
</html><?php }
}

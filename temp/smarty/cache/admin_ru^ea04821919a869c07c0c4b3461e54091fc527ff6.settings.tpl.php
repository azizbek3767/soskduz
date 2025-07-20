<?php
/* Smarty version 3.1.33, created on 2025-04-15 14:54:31
  from '/home/soskduz/public_html/admin/templates/settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67fe2cd79bb012_54850006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b50ebe978e3e3a497b79a5a35a657c00bc056ef3' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/settings.tpl',
      1 => 1581102464,
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
function content_67fe2cd79bb012_54850006 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
      <title>Настройки - Управление - Life Style CMS</title>
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
    <div id="page_container" class="page-container page-navigation-top-fixed  page-navigation-toggled page-container-wide">
        <div class="page-header">
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <li class="xn-logo pull-left"><a></a><a href="#" class="x-navigation-control"></a></li>
                <li class="xn-icon-button">
                    <a href="#" id="mini" class="x-navigation-minimize" data-user="1" data-val="0"><span class="fa fa-outdent"></span></a>
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
                                            <a href="https://www.sos-kd.uz/admin/settings.php">
                                                <span class="flag flag-ru"></span> Русский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/en/settings.php">
                                                <span class="flag flag-en"></span> Английский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/uz/settings.php">
                                                <span class="flag flag-uz"></span> Узбекский
                                            </a>
                                        </li>
                                                                                                </ul>
                        </li>
                    
                
             
            </ul>
        </div>

        <nav class="page-sidebar page-sidebar-fixed" data-pages="sidebar">
            <div class="sidebar-menu">
                <div id="page_sidebar" class="page-sidebar mCS_disabled">
                    <ul id="navigation_sidebar" class="menu-items x-navigation x-navigation-custom x-navigation-minimized">
        
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
                                                <li class="xn-openable  ">
                            <a href="customers.php"><span class="fa fa-cog"></span> <span class="xn-text"> Система</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="users.php"><span class="fa fa-users"></span> Администраторы</a>
                                </li>
                                                                <li class="">
                                    <a href="logo.php"><span class="fab fa-r-project"></span> Логотип сайта</a>
                                </li>
                                                                <li class="active">
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
       


<div class="page-content-wrap">
    <span id="savedMessage" onclick="noty({ text: 'Настройки сохранены.', layout: 'topRight', type: 'success', timeout: 1500 });"></span> 
    <span id="htaccessError" onclick="noty({ text: 'Невозможно сохранить файл ".htaccess".', layout: 'topRight', type: 'error', timeout: 1500 });"></span> 
    
    <script>
        $(document).ready(function() { 
            $('#htaccessError').click();  
             
            $('#savedMessage').click();   
        });
        function deleteStatsMessage() { noty({  text: 'Статистические данные удалены.',  layout: 'topRight',  type: 'success', timeout: 1500 }) }
        function clearCacheMessage() { noty({ text: 'Кэш очищен', layout: 'topRight', type: 'success', timeout: 1500}) } 
    
    </script>

    <div class="content-frame" style="margin-bottom:10px;"><div class="content-frame-top"><div class="col-md-12"><h2>Настройки</h2></div></div></div>
    <div class="col-md-12">
        <form action="settings.php" method="post" id="settings" autocomplete="off">
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">Основные</a></li>
                    <li class=""><a href="#security" data-toggle="tab" aria-expanded="false">Безопасность</a></li>
                    <li class=""><a href="#contactInfo" data-toggle="tab" aria-expanded="false">Контактная инф-ция</a></li>
                    <li class=""><a href="#mail" data-toggle="tab" aria-expanded="false">Почта</a></li>
                    <li class=""><a href="#telegram" data-toggle="tab" aria-expanded="false">Отправка сообщений в Telegram</a></li>
                    <li class=""><a href="#content" data-toggle="tab" aria-expanded="false">Контент</a></li>
                    <li class=""><a href="#comment" data-toggle="tab" aria-expanded="false">Комментарии</a></li>
                    <li class=""><a href="#cache" data-toggle="tab" aria-expanded="false">Оптимизация</a></li>
                    <li class=""><a href="#statistic" data-toggle="tab" aria-expanded="false">Статистика</a></li>
                                    </ul>

                <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="general">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Название сайта</label><p>например: "Моя домашняя страница"</p></div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[website_name]" value="За права и интересы детей"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Шаблон сайта по умолчанию</label><p>Выберите шаблон, который будет использоваться на сайте</p></div>
                                    <div class="col-md-6 nopadding_right"><select name="settings[theme]" class="form-control select">
<option value="app" selected="selected">app</option>
</select>
 </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Используемый язык сайта</label><p>Выберите язык, который будет использоваться, согласно языковой версии сайта</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <script type="text/javascript">
                                            lang2charset = {                                             "ab": "windows-1252" ,                                             "ar": "windows-1256" ,                                             "hy": "windows-1252" ,                                             "az": "windows-1252" ,                                             "eu": "windows-1252" ,                                             "be": "windows-1250" ,                                             "bn": "utf-8" ,                                             "bs": "utf-8" ,                                             "bg": "windows-1251" ,                                             "ca": "windows-1252" ,                                             "zh": "big5" ,                                             "hr": "windows-1250" ,                                             "cs": "windows-1250" ,                                             "da": "windows-1252" ,                                             "nl": "windows-1252" ,                                             "en": "utf-8" ,                                             "eo": "windows-1252" ,                                             "et": "windows-1257" ,                                             "fo": "windows-1252" ,                                             "fi": "windows-1252" ,                                             "fr": "windows-1252" ,                                             "ka": "windows-1252" ,                                             "de": "windows-1252" ,                                             "el": "windows-1253" ,                                             "he": "windows-1255" ,                                             "hi": "utf-8" ,                                             "hu": "windows-1250" ,                                             "id": "windows-1252" ,                                             "ga": "windows-1252" ,                                             "it": "windows-1252" ,                                             "ja": "iso-2022-jp" ,                                             "kk": "windows-1252" ,                                             "ky": "windows-1252" ,                                             "ko": "iso-2022-kr" ,                                             "ku": "utf-8" ,                                             "la": "windows-1252" ,                                             "lv": "windows-1257" ,                                             "lt": "windows-1257" ,                                             "mk": "utf-8" ,                                             "ms": "windows-1252" ,                                             "mo": "utf-8" ,                                             "mn": "utf-8" ,                                             "no": "windows-1252" ,                                             "os": "windows-1252" ,                                             "fa": "utf-8" ,                                             "pl": "windows-1250" ,                                             "pt": "windows-1252" ,                                             "ro": "windows-1250" ,                                             "ru": "utf-8" ,                                             "sa": "utf-8" ,                                             "sr": "windows-1251" ,                                             "sk": "windows-1250" ,                                             "sl": "windows-1250" ,                                             "es": "windows-1252" ,                                             "sv": "windows-1252" ,                                             "tg": "windows-1252" ,                                             "tt": "windows-1252" ,                                             "th": "windows-874" ,                                             "tr": "windows-1254" ,                                             "tk": "windows-1252" ,                                             "ug": "windows-1252" ,                                             "uk": "windows-1251" ,                                             "uz": "utf-8" ,                                             "vi": "windows-1258"  };
                                        </script>

                                        <select name="settings[website_language]" class="form-control select" onChange="webLanguageOptionChange(this)">
<option value=""></option>
<option value="ab">Abkhazian</option>
<option value="ar">Arabic</option>
<option value="hy">Armenian</option>
<option value="az">Azerbaijani</option>
<option value="eu">Basque</option>
<option value="be">Belarusian</option>
<option value="bn">Bengali</option>
<option value="bs">Bosnian</option>
<option value="bg">Bulgarian</option>
<option value="ca">Catalan</option>
<option value="zh">Chinese</option>
<option value="hr">Croatian</option>
<option value="cs">Czech</option>
<option value="da">Danish</option>
<option value="nl">Dutch</option>
<option value="en">English</option>
<option value="eo">Esperanto</option>
<option value="et">Estonian</option>
<option value="fo">Faroese</option>
<option value="fi">Finnish</option>
<option value="fr">French</option>
<option value="ka">Georgian</option>
<option value="de">German</option>
<option value="el">Greek</option>
<option value="he">Hebrew</option>
<option value="hi">Hindi</option>
<option value="hu">Hungarian</option>
<option value="id">Indonesian</option>
<option value="ga">Irish</option>
<option value="it">Italian</option>
<option value="ja">Japanese</option>
<option value="kk">Kazakh</option>
<option value="ky">Kirghiz</option>
<option value="ko">Korean</option>
<option value="ku">Kurdish</option>
<option value="la">Latin</option>
<option value="lv">Latvian</option>
<option value="lt">Lithuanian</option>
<option value="mk">Macedonian</option>
<option value="ms">Malay</option>
<option value="mo">Moldavian</option>
<option value="mn">Mongolian</option>
<option value="no">Norwegian</option>
<option value="os">Ossetian</option>
<option value="fa">Persian</option>
<option value="pl">Polish</option>
<option value="pt">Portuguese</option>
<option value="ro">Romanian</option>
<option value="ru" selected="selected">Russian</option>
<option value="sa">Sanskrit</option>
<option value="sr">Serbian</option>
<option value="sk">Slovak</option>
<option value="sl">Slovenian</option>
<option value="es">Spanish</option>
<option value="sv">Swedish</option>
<option value="tg">Tajik</option>
<option value="tt">Tatar</option>
<option value="th">Thai</option>
<option value="tr">Turkish</option>
<option value="tk">Turkmen</option>
<option value="ug">Uighur</option>
<option value="uk">Ukrainian</option>
<option value="uz">Uzbek</option>
<option value="vi">Vietnamese</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Кодировка сайта</label><p>Кодировка сайта по-умолчанию (Unicode - UTF-8), желательно не менять</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <select name="settings[charset]" class="form-control select" id="charsetOptions">
<option value="ASMO-708" id="charsetOptions-0">Arabic (ASMO 708)</option>
<option value="DOS-720" id="charsetOptions-1">Arabic (DOS)</option>
<option value="iso-8859-6" id="charsetOptions-2">Arabic (ISO)</option>
<option value="x-mac-arabic" id="charsetOptions-3">Arabic (Mac)</option>
<option value="windows-1256" id="charsetOptions-4">Arabic (Windows)</option>
<option value="ibm775" id="charsetOptions-5">Baltic (DOS)</option>
<option value="iso-8859-4" id="charsetOptions-6">Baltic (ISO)</option>
<option value="windows-1257" id="charsetOptions-7">Baltic (Windows)</option>
<option value="ibm852" id="charsetOptions-8">Central European (DOS)</option>
<option value="iso-8859-2" id="charsetOptions-9">Central European (ISO)</option>
<option value="x-mac-ce" id="charsetOptions-10">Central European (Mac)</option>
<option value="windows-1250" id="charsetOptions-11">Central European (Windows)</option>
<option value="EUC-CN" id="charsetOptions-12">Chinese Simplified (EUC)</option>
<option value="gb2312" id="charsetOptions-13">Chinese Simplified (GB2312)</option>
<option value="hz-gb-2312" id="charsetOptions-14">Chinese Simplified (HZ)</option>
<option value="x-mac-chinesesimp" id="charsetOptions-15">Chinese Simplified (Mac)</option>
<option value="big5" id="charsetOptions-16">Chinese Traditional (Big5)</option>
<option value="x-Chinese-CNS" id="charsetOptions-17">Chinese Traditional (CNS)</option>
<option value="x-Chinese-Eten" id="charsetOptions-18">Chinese Traditional (Eten)</option>
<option value="x-mac-chinesetrad" id="charsetOptions-19">Chinese Traditional (Mac)</option>
<option value="cp866" id="charsetOptions-20">Cyrillic (DOS)</option>
<option value="iso-8859-5" id="charsetOptions-21">Cyrillic (ISO)</option>
<option value="koi8-r" id="charsetOptions-22">Cyrillic (KOI8-R)</option>
<option value="koi8-u" id="charsetOptions-23">Cyrillic (KOI8-U)</option>
<option value="x-mac-cyrillic" id="charsetOptions-24">Cyrillic (Mac)</option>
<option value="windows-1251" id="charsetOptions-25">Cyrillic (Windows)</option>
<option value="x-Europa" id="charsetOptions-26">Europa</option>
<option value="x-IA5-German" id="charsetOptions-27">German (IA5)</option>
<option value="ibm737" id="charsetOptions-28">Greek (DOS)</option>
<option value="iso-8859-7" id="charsetOptions-29">Greek (ISO)</option>
<option value="x-mac-greek" id="charsetOptions-30">Greek (Mac)</option>
<option value="windows-1253" id="charsetOptions-31">Greek (Windows)</option>
<option value="ibm869" id="charsetOptions-32">Greek, Modern (DOS)</option>
<option value="DOS-862" id="charsetOptions-33">Hebrew (DOS)</option>
<option value="iso-8859-8-i" id="charsetOptions-34">Hebrew (ISO-Logical)</option>
<option value="iso-8859-8" id="charsetOptions-35">Hebrew (ISO-Visual)</option>
<option value="x-mac-hebrew" id="charsetOptions-36">Hebrew (Mac)</option>
<option value="windows-1255" id="charsetOptions-37">Hebrew (Windows)</option>
<option value="ibm861" id="charsetOptions-38">Icelandic (DOS)</option>
<option value="x-mac-icelandic" id="charsetOptions-39">Icelandic (Mac)</option>
<option value="x-iscii-as" id="charsetOptions-40">ISCII Assamese</option>
<option value="x-iscii-be" id="charsetOptions-41">ISCII Bengali</option>
<option value="x-iscii-de" id="charsetOptions-42">ISCII Devanagari</option>
<option value="x-iscii-gu" id="charsetOptions-43">ISCII Gujarathi</option>
<option value="x-iscii-ka" id="charsetOptions-44">ISCII Kannada</option>
<option value="x-iscii-ma" id="charsetOptions-45">ISCII Malayalam</option>
<option value="x-iscii-or" id="charsetOptions-46">ISCII Oriya</option>
<option value="x-iscii-pa" id="charsetOptions-47">ISCII Panjabi</option>
<option value="x-iscii-ta" id="charsetOptions-48">ISCII Tamil</option>
<option value="x-iscii-te" id="charsetOptions-49">ISCII Telugu</option>
<option value="euc-jp" id="charsetOptions-50">Japanese (EUC)</option>
<option value="iso-2022-jp" id="charsetOptions-51">Japanese (JIS)</option>
<option value="x-mac-japanese" id="charsetOptions-52">Japanese (Mac)</option>
<option value="shift_jis" id="charsetOptions-53">Japanese (Shift-JIS)</option>
<option value="ks_c_5601-1987" id="charsetOptions-54">Korean</option>
<option value="euc-kr" id="charsetOptions-55">Korean (EUC)</option>
<option value="iso-2022-kr" id="charsetOptions-56">Korean (ISO)</option>
<option value="Johab" id="charsetOptions-57">Korean (Johab)</option>
<option value="x-mac-korean" id="charsetOptions-58">Korean (Mac)</option>
<option value="iso-8859-3" id="charsetOptions-59">Latin 3 (ISO)</option>
<option value="iso-8859-15" id="charsetOptions-60">Latin 9 (ISO)</option>
<option value="x-IA5-Norwegian" id="charsetOptions-61">Norwegian (IA5)</option>
<option value="IBM437" id="charsetOptions-62">OEM United States</option>
<option value="x-IA5-Swedish" id="charsetOptions-63">Swedish (IA5)</option>
<option value="windows-874" id="charsetOptions-64">Thai (Windows)</option>
<option value="ibm857" id="charsetOptions-65">Turkish (DOS)</option>
<option value="iso-8859-9" id="charsetOptions-66">Turkish (ISO)</option>
<option value="x-mac-turkish" id="charsetOptions-67">Turkish (Mac)</option>
<option value="windows-1254" id="charsetOptions-68">Turkish (Windows)</option>
<option value="unicode" id="charsetOptions-69">Unicode</option>
<option value="unicodeFFFE" id="charsetOptions-70">Unicode (Big-Endian)</option>
<option value="utf-7" id="charsetOptions-71">Unicode (UTF-7)</option>
<option value="utf-8" selected="selected" id="charsetOptions-72">Unicode (UTF-8)</option>
<option value="us-ascii" id="charsetOptions-73">US-ASCII</option>
<option value="windows-1258" id="charsetOptions-74">Vietnamese (Windows)</option>
<option value="ibm850" id="charsetOptions-75">Western European (DOS)</option>
<option value="x-IA5" id="charsetOptions-76">Western European (IA5)</option>
<option value="iso-8859-1" id="charsetOptions-77">Western European (ISO)</option>
<option value="macintosh" id="charsetOptions-78">Western European (Mac)</option>
<option value="windows-1252" id="charsetOptions-79">Western European (Windows)</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Язык интерфейса -->
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Используемый язык</label><p>Выберите язык, который будет использоваться при работе с системой</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <select name="settings[admin_language]" class="form-control select">
<option value="ru" selected="selected">Русский</option>
<option value="en">English</option>
</select>

                                    </div> 
                                </div>
                                <div class="form-group">
                                    <!-- Формат ввода времени -->
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Формат времени</label><p>Формат времени по-умолчанию (24-часовой)</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <select name="settings[use_24_hours]" class="form-control select">
<option value="0">12-часовой</option>
<option value="1" selected="selected">24-часовой</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Часовой пояс </label><p>Выберете часовой пояс, по которому будет работать ваш сайт и сервер.<br /> Текущее время сервера с учетом часового пояса: Апрель 15, 2025 - 14:54</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <select name="settings[timezone]" class="form-control select" id="timezone">
<option value="Pacific/Midway" id="timezone-0">(GMT-11:00) Остров Мидуэй</option>
<option value="US/Samoa" id="timezone-1">(GMT-11:00) Самоа</option>
<option value="US/Hawaii" id="timezone-2">(GMT-10:00) Гавайи</option>
<option value="US/Alaska" id="timezone-3">(GMT-09:00) Аляска</option>
<option value="US/Pacific" id="timezone-4">(GMT-08:00) Тихоокеанское время (США и Канада)</option>
<option value="America/Tijuana" id="timezone-5">(GMT-08:00) Тихуана</option>
<option value="US/Arizona" id="timezone-6">(GMT-07:00) Аризона</option>
<option value="US/Mountain" id="timezone-7">(GMT-07:00) Горное время (США и Канада)</option>
<option value="America/Chihuahua" id="timezone-8">(GMT-07:00) Чихуахуа</option>
<option value="America/Mazatlan" id="timezone-9">(GMT-07:00) Масатлан</option>
<option value="America/Mexico_City" id="timezone-10">(GMT-06:00) Мехико</option>
<option value="America/Monterrey" id="timezone-11">(GMT-06:00) Монтеррей</option>
<option value="US/Central" id="timezone-12">(GMT-06:00) Центральное время (США и Канада)</option>
<option value="US/Eastern" id="timezone-13">(GMT-05:00) Восточное время (США и Канада)</option>
<option value="US/East-Indiana" id="timezone-14">(GMT-05:00) Индиана (Восток)</option>
<option value="America/Lima" id="timezone-15">(GMT-05:00) Лима, Богота</option>
<option value="America/Caracas" id="timezone-16">(GMT-04:30) Каракас</option>
<option value="Canada/Atlantic" id="timezone-17">(GMT-04:00) Атлантическое время (Канада)</option>
<option value="America/La_Paz" id="timezone-18">(GMT-04:00) Ла-Пас</option>
<option value="America/Santiago" id="timezone-19">(GMT-04:00) Сантьяго</option>
<option value="Canada/Newfoundland" id="timezone-20">(GMT-03:30) Ньюфаундленд</option>
<option value="America/Buenos_Aires" id="timezone-21">(GMT-03:00) Буэнос-Айрес</option>
<option value="America/Godthab" id="timezone-22">(GMT-03:00) Гренландия</option>
<option value="Atlantic/Stanley" id="timezone-23">(GMT-02:00) Стэнли</option>
<option value="Atlantic/Azores" id="timezone-24">(GMT-01:00) Азорские острова</option>
<option value="Africa/Casablanca" id="timezone-25">(GMT) Касабланка</option>
<option value="Europe/Dublin" id="timezone-26">(GMT) Дублин</option>
<option value="Europe/Lisbon" id="timezone-27">(GMT) Лиссабон</option>
<option value="Europe/London" id="timezone-28">(GMT) Лондон</option>
<option value="Europe/Amsterdam" id="timezone-29">(GMT+01:00) Амстердам</option>
<option value="Europe/Belgrade" id="timezone-30">(GMT+01:00) Белград</option>
<option value="Europe/Berlin" id="timezone-31">(GMT+01:00) Берлин</option>
<option value="Europe/Bratislava" id="timezone-32">(GMT+01:00) Братислава</option>
<option value="Europe/Brussels" id="timezone-33">(GMT+01:00) Брюссель</option>
<option value="Europe/Budapest" id="timezone-34">(GMT+01:00) Будапешт</option>
<option value="Europe/Copenhagen" id="timezone-35">(GMT+01:00) Копенгаген</option>
<option value="Europe/Madrid" id="timezone-36">(GMT+01:00) Мадрид</option>
<option value="Europe/Paris" id="timezone-37">(GMT+01:00) Париж</option>
<option value="Europe/Prague" id="timezone-38">(GMT+01:00) Прага</option>
<option value="Europe/Rome" id="timezone-39">(GMT+01:00) Рим</option>
<option value="Europe/Sarajevo" id="timezone-40">(GMT+01:00) Сараево</option>
<option value="Europe/Stockholm" id="timezone-41">(GMT+01:00) Стокгольм</option>
<option value="Europe/Vienna" id="timezone-42">(GMT+01:00) Вена</option>
<option value="Europe/Warsaw" id="timezone-43">(GMT+01:00) Варшава</option>
<option value="Europe/Zagreb" id="timezone-44">(GMT+01:00) Загреб</option>
<option value="Europe/Athens" id="timezone-45">(GMT+02:00) Афины</option>
<option value="Europe/Bucharest" id="timezone-46">(GMT+02:00) Бухарест</option>
<option value="Europe/Helsinki" id="timezone-47">(GMT+02:00) Хельсинки</option>
<option value="Europe/Istanbul" id="timezone-48">(GMT+02:00) Стамбул</option>
<option value="Asia/Jerusalem" id="timezone-49">(GMT+02:00) Иерусалим</option>
<option value="Europe/Kiev" id="timezone-50">(GMT+02:00) Киев</option>
<option value="Europe/Minsk" id="timezone-51">(GMT+02:00) Минск</option>
<option value="Europe/Riga" id="timezone-52">(GMT+02:00) Рига</option>
<option value="Europe/Sofia" id="timezone-53">(GMT+02:00) София</option>
<option value="Europe/Tallinn" id="timezone-54">(GMT+02:00) Таллин</option>
<option value="Europe/Vilnius" id="timezone-55">(GMT+02:00) Вильнюс</option>
<option value="Europe/Kaliningrad" id="timezone-56">(GMT+02:00) Калининград</option>
<option value="Asia/Baghdad" id="timezone-57">(GMT+03:00) Багдад</option>
<option value="Asia/Kuwait" id="timezone-58">(GMT+03:00) Кувейт</option>
<option value="Africa/Nairobi" id="timezone-59">(GMT+03:00) Найроби</option>
<option value="Asia/Tehran" id="timezone-60">(GMT+03:30) Иран, Тегеран</option>
<option value="Europe/Moscow" id="timezone-61">(GMT+03:00) Москва</option>
<option value="Europe/Volgograd" id="timezone-62">(GMT+03:00) Волгоград</option>
<option value="Europe/Samara" id="timezone-63">(GMT+04:00) Самара, Удмуртия</option>
<option value="Asia/Baku" id="timezone-64">(GMT+04:00) Баку</option>
<option value="Asia/Muscat" id="timezone-65">(GMT+04:00) Абу-Даби, Маскат</option>
<option value="Asia/Tbilisi" id="timezone-66">(GMT+04:00) Тбилиси</option>
<option value="Asia/Yerevan" id="timezone-67">(GMT+04:00) Ереван</option>
<option value="Asia/Kabul" id="timezone-68">(GMT+04:30) Афганистан, Кабул</option>
<option value="Asia/Yekaterinburg" id="timezone-69">(GMT+05:00) Екатеринбург, Пермь</option>
<option value="Asia/Tashkent" selected="selected" id="timezone-70">(GMT+05:00) Ташкент, Карачи</option>
<option value="Asia/Kolkata" id="timezone-71">(GMT+05:30) Бомбей, Калькутта, Мадрас, Нью-Дели, Коломбо</option>
<option value="Asia/Kathmandu" id="timezone-72">(GMT+05:45) Катманду</option>
<option value="Asia/Almaty" id="timezone-73">(GMT+06:00) Алматы, Астана</option>
<option value="Asia/Novosibirsk" id="timezone-74">(GMT+06:00) Новосибирск</option>
<option value="Asia/Jakarta" id="timezone-75">(GMT+07:00) Бангкок, Ханой, Джакарта</option>
<option value="Asia/Krasnoyarsk" id="timezone-76">(GMT+07:00) Красноярск</option>
<option value="Asia/Hong_Kong" id="timezone-77">(GMT+08:00) Гонконг, Чунцин</option>
<option value="Asia/Kuala_Lumpur" id="timezone-78">(GMT+08:00) Куала-Лумпур</option>
<option value="Asia/Singapore" id="timezone-79">(GMT+08:00) Сингапур</option>
<option value="Asia/Taipei" id="timezone-80">(GMT+08:00) Тайбэй</option>
<option value="Asia/Ulaanbaatar" id="timezone-81">(GMT+08:00) Улан-Батор</option>
<option value="Asia/Urumqi" id="timezone-82">(GMT+08:00) Урумчи</option>
<option value="Asia/Irkutsk" id="timezone-83">(GMT+08:00) Иркутск</option>
<option value="Asia/Seoul" id="timezone-84">(GMT+09:00) Сеул</option>
<option value="Asia/Tokyo" id="timezone-85">(GMT+09:00) Токио, Осака, Саппоро</option>
<option value="Australia/Adelaide" id="timezone-86">(GMT+09:30) Аделаида</option>
<option value="Australia/Darwin" id="timezone-87">(GMT+09:30) Дарвин</option>
<option value="Asia/Yakutsk" id="timezone-88">(GMT+09:00) Якутск</option>
<option value="Australia/Brisbane" id="timezone-89">(GMT+10:00) Брисбен</option>
<option value="Pacific/Port_Moresby" id="timezone-90">(GMT+10:00) Гуам, Порт-Морсби</option>
<option value="Australia/Sydney" id="timezone-91">(GMT+10:00) Мельбурн, Сидней, Канберра</option>
<option value="Asia/Vladivostok" id="timezone-92">(GMT+10:00) Владивосток</option>
<option value="Asia/Sakhalin" id="timezone-93">(GMT+11:00) Сахалин</option>
<option value="Asia/Magadan" id="timezone-94">(GMT+12:00) Магадан, Камчатка</option>
<option value="Pacific/Auckland" id="timezone-95">(GMT+12:00) Окленд, Веллингтон</option>
<option value="Pacific/Fiji" id="timezone-96">(GMT+12:00) Фиджи, Маршалловы о.</option>
</select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Выключить сайт</label><p>Перевести сайт в состояние offline, для проведения технических работ</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="website_down" name="settings[website_down]" value="1" ><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Сообщение посетителям, если сайт отключен</label><p>Сообщение для отображения в режиме отключенного сайта</p></div>
                                    <div class="col-md-6 nopadding_right"><textarea name="settings[maintenance_message]" class="form-control" rows="5"><h1>Сайт временно заблокирован!</h1>
<p>Для выяснения причины блокировки свяжитесь по номеру :</p>
<p><a href="tel:+998903451133"><big>+99890 345 11 33</big></a> </p>
<p>или напишите на <a href="mailto:info@life-style.uz">info@life-style.uz</a></p>						
</textarea></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Список IP адресов</label>
                                        <p>Список IP адресов разрешенных для просмотра сайта, когда сайт выключен.<br> Ваш IP адрес: <b>217.12.84.58</b></p>
                                    </div>
                                    <div class="col-md-6 nopadding_right"><input type="text" id="listIp" class="form-control" name="settings[listIp]" value="" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Тестировать сайт на ошибки</label> </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="error_test" name="settings[error_test]" value="1" ><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Основные -->

                    <div class="tab-pane" id="security">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Контактная форма (CAPTCHA)</label><p>Включить каптчу (CAPTCHA) от спама, который будет использоваться на сайте.</p></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" name="settings[feedback_captcha_enabled]" value="1" checked><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Формат ввода времени -->
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Тип кода безопасности (CAPTCHA):</label><p>Укажите тип кода безопасности, который будет использоваться на сайте. Вы можете установить использование стандартную капчу, либо установить код сервиса reCAPTCHA:v3</p></div>
                                    <div class="col-md-6 nopadding_right"><select name="settings[allow_recaptcha]" class="form-control select">
<option value="0">Стандартный каптча</option>
<option value="1" selected="selected">reCAPTCHA:v3</option>
</select>
</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Публичный ключ сервиса reCAPTCHA:v3:</label><p>Получить ключ вы можете по ссылке: <a href="http://www.google.com/recaptcha" target="_blank">http://www.google.com/recaptcha</a><br /> Внимание, настоятельно рекомендуется зарегистрироваться на сервисе и сгенерировать для своего сайта уникальную пару ключей, установив разрешение на использование только на своем домене. Использование стандартной пары ключей, не дает должного эффекта по защите от спам роботов.</p></div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[recaptcha_public_key]" value="6Lfldf8ZAAAAAOLkHQIQeHxsX9v0090BzsTh7vG-"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Секретный ключ сервиса reCAPTCHA:v3:</label><p>Получить ключ вы можете по ссылке: <a href="http://www.google.com/recaptcha" target="_blank">http://www.google.com/recaptcha</a><br /> Внимание, настоятельно рекомендуется зарегистрироваться на сервисе и сгенерировать для своего сайта уникальную пару ключей, установив разрешение на использование только на своем домене. Использование стандартной пары ключей, не дает должного эффекта по защите от спам роботов.</p></div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[recaptcha_private_key]" value=" 6Lfldf8ZAAAAACQg51tPUexytWqLV-y5fSBZ8NZ6"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Контактная инф-ция -->
                    <div class="tab-pane" id="contactInfo">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Название компании</label><p>Название организации или юридическое название организации</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[company_name]" value="Ассоциация SOS Детские деревни Узбекистана"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Режим работы</label><p>Укажите режим работы вашей организации</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[operating_mode]" value="9:00-18:00"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Адрес</label><p>Укажите юридический адрес вашей компании</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[address]" value="ул. Нукус, 79, Ташкент, 100015, Узбекистан"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Информационные почтовые адреса</label><p>Информационные почтовые адреса для вывода на сайт. <br>Можно указать несколько почтовых адресов через запятую </p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[feedback_email]" value="info@sos-kd.uz soscv@exat.uz"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Основной телефон</label></div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone]" value="+998 78 140-97-27"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Доп. телефон</label></div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone_two]" value="+998 78 140-97-28"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Телефон менеджера</label></div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone_three]" value="+998 78 140-97-29"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/ Контактная инф-ция -->

                    <div class="tab-pane" id="mail">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Метод отправки почты</label> <p>Если функция PHP mail() недоступна, выберите метод SMTP</p></div>
                                    <div class="col-md-6 nopadding">
                                        <select name="settings[mail_transport]" class="form-control select">
<option value="mail">PHP mail()</option>
<option value="smtp" selected="selected">SMTP</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Порт (Port)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding">
                                        <select name="settings[smtp_port]" class="form-control select" id="ports">
<option value="" id="ports-0">По-умолчанию</option>
<option value="25" id="ports-1">25</option>
<option value="465" id="ports-2">465</option>
<option value="587" selected="selected" id="ports-3">587</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Шифрование (SMTPSecure)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding">
                                        <select name="settings[smtp_secure]" class="form-control select" id="secures">
<option value="" id="secures-0">Без шифрования</option>
<option value="ssl" id="secures-1">SSL</option>
<option value="tls" selected="selected" id="secures-2">TLS</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Заголовок отправителя писем, при отправке писем</label><p>При отправке писем с сайта вы можете указать заголовок, который будет добавляться к почте отправителя. Например, вы можете там указать краткое название вашего сайта</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_subject]" value="Сообщение с сайта SOS Детские деревни Узбекистана"></div>
                                </div>
                            </div> 
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для info@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Адрес отправителя (to)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email]" value="info@sos-kd.uz" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Сервер (Host)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()<br> SMTP — smtp.yandex.ru, smtp.gmail.com</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server]" value="smtp.office365.com" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пользователь (Username)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user]" value="soskduz.sosna@sos-kd.uz" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пароль</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass]" value="psHgdTR25!wd" id="password"></div>
                                </div>   
                                
                            </div>
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для заказа открыток  charitycards@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Адрес отправителя (to)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email2]" value="soskduz.sosna@sos-kd.uz" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Сервер (Host)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()<br> SMTP — smtp.yandex.ru, smtp.gmail.com</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server2]" value="smtp.office365.com" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пользователь (Username)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user2]" value="soskduz.sosna@sos-kd.uz" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пароль</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass2]" value="Safecopy1234$" id="password"></div>
                                </div>   
                                
                            </div>
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для резюме recruitment@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Адрес отправителя (to)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email3]" value="soskidsvacancies@gmail.com" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Сервер (Host)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()<br> SMTP — smtp.yandex.ru, smtp.gmail.com</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server3]" value="smtp.gmail.com" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пользователь (Username)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user3]" value="soskidsvacancies@gmail.com" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пароль</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass3]" value="ckye ptdp awnk tpcw" id="password"></div>
                                </div>   
                                
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="tab-pane" id="telegram">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Включить телеграм</label><p>Включить получение писем с сайта в телеграм</p></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[telegram_send]" value="1" ><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Токен для доступа к HTTP API</label> <p>Сюда нужно вписать токен вашего бота</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[telegram_token]" value=""></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Идентификатор чата</label><p>Сюда нужно вписать ваш внутренний идентификатор</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[telegram_chat_id]" value=""></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding" style="padding-top: 60px"><label class="field_name">Как подключить</label><p>Первым делом надо зарегистрировать бота. Для этого надо зайти в приложение Telegram и открыть чат с <a href="https://t.me/@BotFather" target="_blank"  style="text-decoration: underline"> @BotFather</a>. Откроется список команд, где надо выбрать /newbot. Затем система попросит выбрать название бота и его имя, по которому бот будет доступен для поиска. Если к названию особых требований нет, то имя должно обязательно быть уникальным и заканчиваться на "bot".</p></div>
                                    <div class="col-md-6 nopadding text-center">
                                        <p><img src="/admin/assets/images/telegram/telegram-1.jpg" style="width: 250px;"></p>
                                    </div>
                                    <div class="col-md-6 nopadding" style="padding-top: 60px"><p>Когда все основные параметры будут введены, система выдаст вам персональный токен, с помощью которого можно будет работать с ботом через HTTP-запросы. Никому не передавайте этот токен, чтобы никто посторонний не получил к нему доступ. Если все же произошла утечка данных, то через <a href="https://t.me/@BotFather" target="_blank" style="text-decoration: underline">@BotFather</a> можно сгенерировать новый токен для вашего бота.</p></div>
                                    <div class="col-md-6 nopadding text-center">
                                        <p><img src="/admin/assets/images/telegram/telegram-2.jpg" style="width: 250px;"></p>
                                    </div>
                                    <div class="col-md-6 nopadding" style="padding-top: 30px"><p>Если в настройках бота включен режим приватности (а он включен по умолчанию), то все сообщения, отправляемые ботом конкретному пользователю, не будут видны остальным подписчикам этого бота. Именно это нам и надо, ведь мы же не хотим, чтобы кто-то, случайно подписавшись на нашего бота, перехватывал все наши уведомления. Чтобы бот отправлял сообщения только нам, надо узнать идентификатор нашего чата.</p><p>Для этого подпишитесь на своего бота и отправьте ему любое сообщение. После этого в браузере надо сформировать ссылку следующего вида:<br /><a href="https://api.telegram.org/bot/getUpdates" target="_blank" style="text-decoration: underline">https://api.telegram.org/bot/getUpdates</a></p></div>
                                    <div class="col-md-6 nopadding text-center">
                                        <p><img src="/admin/assets/images/telegram/telegram-3.jpg" style="width: 250px;"></p>
                                    </div>
                                    <div class="col-md-6 nopadding" style="padding-top: 0px"><p>Если все сделано правильно, то в браузере откроется что-то подобное:</p><p>Красным цветом выделен нужный нам идентификатор чата. Если ответ пустой, то напишите боту еще парочку сообщений в чат и сразу же обновите страницу в браузере.</p></div>
                                    <div class="col-md-6 nopadding">
                                        <code style="color: #2554c7;background: none"> { 
                                        "ok":true,
                                        "result":[ <br>
                                            &nbsp;&nbsp; { <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;"update_id":434540657,<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;"message": { <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"message_id":2,<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"from": { <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id":<font color="#FF0000">698237240</font>,<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"is_bot":false,<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"first_name":"Ivanov",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"language_code":"ru"<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; } ,<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"chat": { <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"id":<font color="#FF0000">698237240</font>,<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"first_name":"Ivanov",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"type":"private"<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; } ,<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"date":1536053889,<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"text":"Hello"<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp; } <br>
                                            &nbsp;&nbsp; } <br>
                                          ] } <br>
                                        </code>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Контент -->
                    <div class="tab-pane" id="content">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Включить слайдер</label><p>Включить слайдер на сайте</p></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[slider]" value="1" checked><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Кол-во слайдов на сайте</label> </div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[cont_slide]" value="5"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Кол-во контента в разделах</label><p>Настройка вывода контента, кол-во статей в разделах</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[cont_section]" value="9"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Включить счетчик</label><p>Включить счетчик просмотра статьи</p></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[view_enabled]" value="1" checked><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-heading">
                                <h5 class="panel-title"><label class="field_name">Настойки изображений</label></h5>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Маленькая картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[small_thumb_width]" value="200" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[small_thumb_height]" value="200" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Средняя картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[medium_thumb_width]" value="420" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[medium_thumb_height]" value="420" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Большая картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[large_thumb_width]" value="600" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[large_thumb_height]" value="600" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Качество сжатия</label></div>
                                    <div class="col-md-6 nopadding"><select name="settings[thumbnail_quality]" class="form-control select">
<option value="100" selected="selected">100</option>
<option value="95">95</option>
<option value="90">90</option>
<option value="85">85</option>
<option value="80">80</option>
<option value="75">75</option>
<option value="70">70</option>
<option value="65">65</option>
<option value="60">60</option>
<option value="55">55</option>
<option value="50">50</option>
</select>
</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Сохранять исходную картинку</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="save_original_image" name="settings[save_original_image]" value="1" checked><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Сохранять исходное имя картинки</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="keep_original_image_name" name="settings[keep_original_image_name]" value="1" ><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-heading">
                                <h5 class="panel-title"><label class="field_name">Настройки изображений для галереи</label></h5>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Маленькая картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[smallX]" value="100" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[smallY]" value="100" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Средняя картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[mediumX]" value="600" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[mediumY]" value="600" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Большая картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[bigX]" value="1200" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[bigY]" value="1200" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Качество сжатия</label></div>
                                    <div class="col-md-6 nopadding"><select name="settings[quality]" class="form-control select">
<option value="100">100</option>
<option value="95">95</option>
<option value="90">90</option>
<option value="85" selected="selected">85</option>
<option value="80">80</option>
<option value="75">75</option>
<option value="70">70</option>
<option value="65">65</option>
<option value="60">60</option>
<option value="55">55</option>
<option value="50">50</option>
</select>
</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/ Контент -->

                    <!-- Комментарии -->
                    <div class="tab-pane" id="comment">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Комментарии разрешены по-умолчанию</label><p>Эта настрока может быть изменена для отдельных статей или разделов</p></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_enabled]" value="1" /><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Редакторы могут одобрять/удалять комментарии</label><p>Только для разрешенных разделов</p></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_editors_may_approve]" value="1" /><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Требовать заполнения CAPTCHA</label><p>Предотвращает автоматическую отправку комментариев</p></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_captcha_enabled]" value="1"  /><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Модерация контента комментариев</label></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_strip_html]" value="1"  /><span></span></label>
                                            </div>
                                        </div>
                                        <i>удалять HTML тэги</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_convert_links]" value="1"  /><span></span></label>
                                            </div>
                                        </div>
                                        <i>конвертировать URL адреса в ссылки</i>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Подтверждение через email</label></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_box" style="margin-bottom:10px;">
                                            <label>
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="0" checked /> 
                                                <i style="padding-left: 58px">Не требуется</i>
                                            </label>
                                        </div>
                                        <div class="check_box" style="margin-bottom:10px;">
                                            <label>
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="1"  /> 
                                                <i style="padding-left: 58px">Требуется если пользователь оставляет комментарий первый раз</i>
                                            </label>
                                        </div>
                                        <div class="check_box" style="margin-bottom:10px;">
                                            <label>
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="2"  /> 
                                                <i style="padding-left: 58px">Требуется для каждого комментария</i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Модерация комментариев</label></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_must_be_approved]" value="1"  /><span></span></label>
                                            </div>
                                        </div>
                                        <i>все комментарии одобряются вручную</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_whitelist_enabled]" value="1"  /><span></span></label>
                                            </div>
                                        </div>
                                        <i>публиковать комментарий если у пользователя уже были одобренные комментарии</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_blacklist_enabled]" value="1"  /><span></span></label>
                                            </div>
                                        </div>
                                        <i>отмечать комментарий как СПАМ, если у пользователя уже были подобные комментарии</i>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Не публиковать комментарий</label><p>Eсли в нем содержится:<br> Одно слово или IP в строке. <br>Проверяется на наличие в тексте комментария, имени автора, email и IP.</p></div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[comments_hold_words]" class="form-control" rows="6"></textarea></div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Пометить комментарий как СПАМ</label><p>Если в нем содержится:<br> Одно слово или IP в строке. <br>Проверяется на наличие в тексте комментария, имени автора, email и IP.</p></div>
                                    <div class="col-md-6 nopadding"> <textarea name="settings[comments_spam_words]" class="form-control" rows="6"></textarea></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <!--/ Комментарии -->

                    <!-- Кэширование -->
                    <div class="tab-pane" id="cache">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Включить Gzip сжатие JS и CSS файлов</label><p>Если «Включено», то JavaScript и CSS файлы будут сжаты при помощи Gzip, это позволит уменьшить вес файлов до 70%, а также в 6 раз снизить количество HTTP запросов, что существенно ускоряет время загрузки ваших страниц.</p></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" id="compress_js_css" name="settings[compress_js_css]" value="1" ><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Расширение файлов</label></div>
                                    <div class="col-md-6 nopadding"><select name="settings[file_extension]" class="form-control select">
<option value="htm" selected="selected">.htm</option>
<option value="html">.html</option>
</select>
</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Переводить имя файла в строчные</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="convert_filename_to_lowercase" name="settings[convert_filename_to_lowercase]" value="1" >
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Разделитель слов в имени файла</label></div>
                                    <div class="col-md-6 nopadding">
                                        <select name="settings[filename_word_separator]" class="form-control select">
<option value="-" selected="selected">- (тире)</option>
<option value="_">_ (подчеркивание)</option>
</select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Контент</label><p>Вы можете задать интервал в минутах, после которого будет осуществляться принудительная очистка кэша. Например задав 30, кеш будет очищаться каждые 30 минут. Данная настройка будет полезна если вы публикуете новости на будущую дату и включено кеширование на сайте.</p></div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:20px;">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_article]" value="1" id="cache_enabled_article" >
                                                <i> Включить кэширование на</i>
											</label>
                                        </div>

                                        <div class="col-md-1 col-xs-2 nopadding">
                                            <select name="settings[cache_time_article]" class="form-control select">
<option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
<option value="60">60</option>
</select>

                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            <select name="settings[cache_period_article]" class="form-control select">
<option value="60" selected="selected">минут</option>
<option value="3600">часов</option>
<option value="86400">дней</option>
</select>

                                        </div>
                                    </div>
                                </div>
                                <!--/ Статьи -->

                                <div class="form-group">
                                    <!--Разделы -->
                                    <div class="col-md-6 nopadding"><label class="field_name">Страницы, разделы</label><p>Вы можете задать интервал в минутах, после которого будет осуществляться принудительная очистка кэша. Например задав 30, кеш будет очищаться каждые 30 минут. Данная настройка будет полезна если вы публикуете новости на будущую дату и включено кеширование на сайте.</p></div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:20px;">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_section]" value="1" id="cache_enabled_section" >
                                                <i> Включить кэширование на </i>
                                            </label>
                                        </div>
                                        <div class="col-md-1 col-xs-2 nopadding">
                                            <select name="settings[cache_time_section]" class="form-control select">
<option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
<option value="60">60</option>
</select>

                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            <select name="settings[cache_period_section]" class="form-control select">
<option value="60" selected="selected">минут</option>
<option value="3600">часов</option>
<option value="86400">дней</option>
</select>

                                        </div>
                                    </div>
                                </div>
                                <!--/ Разделы -->

                                
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Карта сайта (XML)</label><p>Вы можете задать интервал в минутах, после которого будет осуществляться принудительная очистка кэша. Например задав 30, кеш будет очищаться каждые 30 минут. Данная настройка будет полезна если вы публикуете новости на будущую дату и включено кеширование на сайте.</p></div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:20px;">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_sitemap]" value="1" id="cache_enabled_sitemap" >
                                                <i>Включить кэширование на </i>
                                            </label>
                                        </div>
                                        <div class="col-md-1 col-xs-2 nopadding">
                                            <select name="settings[cache_time_sitemap]" class="form-control select">
                                                <option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
<option value="60">60</option>

                                            </select>
                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            <select name="settings[cache_period_sitemap]" class="form-control select">
                                                <option value="минут" selected="selected"></option>
<option value="часов"></option>
<option value="дней"></option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!--Карта сайта (XML) -->
                                    <div class="col-md-6 nopadding"><label class="field_name"> Очистка кэша шаблонов.</label>
                                        <p>Данная опция позволяет очистить кеш шаблонов.</p>
                                    </div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:10px;">
                                        <a class="btn btn-primary control-cache" id="status" onclick="clearCache()">Очистить кеш</a>
                                    </div>
                                </div>
                                <!--/ Карта сайта (XML) -->
                            </div>
                        </div>
                    </div>
                    <!--/ Кэширование -->

                    <!-- Статистика -->
                    <div class="tab-pane" id="statistic">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Ваш ID в Яндекс Метрике</label></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[yandex_metrika]" value="66574897"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Ваш ID в Google Analytics</label></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[google_analytics]" value="UA-175844968-1"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Включить статистику</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="statistics_enabled" name="settings[statistics_enabled]" value="1" checked><span></span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--Идентификаторы ботов -->
                                    <div class="col-md-6 nopadding"><label class="field_name">Идентификаторы ботов</label></div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[bot_id_strings]" class="form-control" rows="5">bot
crawl
slurp
archive
search
ng/
spider
teoma
sleuth
link_verification
mediapartners
grub
ichiro
validator
checker
verifier</textarea></div>
                                </div>
                                <!--/ Идентификаторы ботов -->
                                <div class="form-group">
                                    <!--Идентификаторы ботов -->
                                    <div class="col-md-6 nopadding"><label class="field_name">Идентификаторы поисковых запросов</label></div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[query_fields_strings]" class="form-control" rows="5">text
q
query
searchfor
qkw
qt
qry
googlesearch
keywords
string
p
va</textarea></div>
                                </div>
                                <!--/ Идентификаторы ботов -->

                                <div class="form-group">
                                    <!--Удалить статистические данные -->
                                    <div class="col-md-6 nopadding"><label class="field_name">Удалить статистические данные до</label></div>
                                    <div class="col-md-6 nopadding date">
                                        <select name="date[Month]" class="form-control select">
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03">Mar</option>
<option value="04" selected="selected">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<select name="date[Day]" class="form-control select">
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28" selected="selected">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="date[Year]" class="form-control select">
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023" selected="selected">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
</select>
                                        <input class="btn btn-primary" type="button" onclick="deleteStats();" value="Удалить">
                                    </div>
                                </div>
                                <!--/ Удалить статистические данные -->

                            </div>
                        </div>
                    </div>
                    <!--/ Статистика -->

                    <!-- Разное -->
                                        <!--/ Разное -->
                    
			    
			    
                    <div class="tab-pane" id="update_url">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Старый домен сайта </label><p>Укажите старый адрес сайта</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[old_site_url]" value="" placeholder="http://domain.uz/"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Действующий домен сайта</label> <p>Укажите новый или оставьте действующий адрес сайта </p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[site_url]" value="https://www.sos-kd.uz/" placeholder="http://domain.uz/"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div align="center" class="col-md-12 main main_buttons"><input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Сохранить &nbsp;" /></div>
        </form>
    </div>
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
  var ip = '217.12.84.58';
  
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

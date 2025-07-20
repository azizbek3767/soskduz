<?php
/* Smarty version 3.1.33, created on 2025-04-24 15:20:04
  from '/home/soskduz/public_html/admin/templates/donations.subscribers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_680a1054767fe8_77400567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '302d9472b0a39e15c503660fdf796b7e495e11d5' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/donations.subscribers.tpl',
      1 => 1684157438,
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
function content_680a1054767fe8_77400567 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
      <title>Подписки - Life Style CMS</title>
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
                    <a target="blank" href="https://www.sos-kd.uz/en/">
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
                                <div class="informer informer-warning">en</div>
                            </a>
                            <ul class="xn-drop-left animated zoomIn">
                                                                                                            <li>
                                            <a href="https://www.sos-kd.uz/admin/donation.subscribers.php">
                                                <span class="flag flag-ru"></span> Русский
                                            </a>
                                        </li>
                                                                                                                                                <li class="active">
                                            <a href="https://www.sos-kd.uz/admin/en/donation.subscribers.php">
                                                <span class="flag flag-en"></span> Английский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/uz/donation.subscribers.php">
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
                                                <li class="xn-openable  active">
                            <a href="donations.php"><span class="fa fa-money-check-alt"></span> <span class="xn-text"> Пожертвования</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="donations.php"><span class="fa fa-money-check-alt"></span> Сумма пожертвования</a>
                                </li>
                                                                <li class="active">
                                    <a href="donation.subscribers.php"><span class="fa fa-users"></span> Подписки</a>
                                </li>
                                                            </ul>
                        </li>
                                                <li class="xn-openable ">
                            <a href="customers.php"><span class="fa fa-cog"></span> <span class="xn-text"> Система</span></a>
                            <ul>
                                                                <li class="">
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
       


<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>Подписки</h2></div>
    </div>
</div>
<div class="clear"></div>
<div class="row">
    <div class="col-md-2">
        <div class="alert alert-info" style="position: relative">
            <h3>Всего поступлений</h3>
            <div style="font-size: 16px"><b>33188500 сум</b></div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="alert alert-info" style="position: relative">
            <h3>Поступлений за месяц</h3>
            <div style="font-size: 16px"><b>0 сум</b></div>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-5 text-right">
        <form method="get">
            <div class="input-group" style="display: flex">
                <input type="text" name="search" class="form-control" value="" placeholder="Поиск" autocomplete="off" aria-describedby="basic-addon2">
                <button type="submit" class="btn btn-primary" id="basic-addon2">Поиск</button>
            </div>
        </form>
    </div>
</div>

<div class="form-group main" style="margin-top: 15px">
    <form method="get">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group" style="display: flex">
                    <select name="status" class="form-control select">
                        <option value="">Статус</option>
                        <option value="active" >Active</option>
                        <option value="inactive" >Inactive</option>
                    </select>
                    <select name="amount" class="form-control select">
                        <option value="">Сумма</option>
                                                    <option value="1000" >1000</option>
                                                    <option value="5000" >5000</option>
                                                    <option value="7000" >7000</option>
                                                    <option value="50000" >50000</option>
                                                    <option value="100000" >100000</option>
                                                    <option value="3000000" >3000000</option>
                                            </select>
                </div>
            </div>
            <div class="col-md-6 date text-right">
                <select name="newDateStart[Month]" class="form-control select">
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03" selected="selected">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<select name="newDateStart[Day]" class="form-control select">
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
<option value="24" selected="selected">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="newDateStart[Year]" class="form-control select">
<option value="2023" selected="selected">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
</select> &nbsp;-&nbsp;
                <select name="newDateEnd[Month]" class="form-control select">
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03" selected="selected">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<select name="newDateEnd[Day]" class="form-control select">
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
<option value="24" selected="selected">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="newDateEnd[Year]" class="form-control select">
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025" selected="selected">2025</option>
</select>
                <input class="btn btn-warning" type="submit" value="Показать" />
            </div>
        </div>
    </form>
</div>

<div class="clear"></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-actions">
                        <thead>
                        <tr>
                            <th class="text-center">Дата</th>
                            <th class="text-center">ФИО</th>
                            <th class="text-center">Телефон</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">ID карты</th>
                            <th class="text-center">Сумма</th>
                            <th class="text-center">Статус</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                                                                                    <tr class="">
                                    <td nowrap="nowrap">2024-09-06 17:59:36</td>
                                    <td>AZIZJON AZIMOV</td>
                                    <td>998933950097</td>
                                    <td>a.azizjon@gmail.com</td>
                                    <td>DTA4LYKXTUJYLCYJJMMD9DQPMK6NSMTU</td>
                                    <td>5000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="9">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2024-07-11 12:14:24</td>
                                    <td>MASHCHAKEVYCH OLEKSANDR</td>
                                    <td>998908083025</td>
                                    <td>a.mashchakevich@gmail.com</td>
                                    <td>LU7PI4NVMR4PQARBLBA9JUKLGC36NLDD</td>
                                    <td>50000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="13">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2024-06-12 14:44:17</td>
                                    <td>UMID KUCHKUNOV</td>
                                    <td>998993367777</td>
                                    <td>umid700k@gmail.com</td>
                                    <td>EI5TUYV0TXDWTUFLCMUXTKVGI8YQNO4C</td>
                                    <td>3000000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="12">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2024-05-23 11:56:47</td>
                                    <td>DILDOR YUSUPOVA</td>
                                    <td>998998777050</td>
                                    <td>yusupovadildor@gmail.com</td>
                                    <td>EFQ7HYZ4FGIN3EXHGWBLCD5YOKCJD4WM</td>
                                    <td>100000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="11">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2024-04-25 10:31:23</td>
                                    <td>SERGEI BALASHOV COO</td>
                                    <td>998994246139</td>
                                    <td>balashovsv@gmail.com</td>
                                    <td>MCCE4FUXJ2IOJLH2NSQQUKL3OPMID7SU</td>
                                    <td>100000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="10">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2024-03-06 02:18:41</td>
                                    <td>SARDOR MIRZORAKHIMOV</td>
                                    <td>998937054621</td>
                                    <td>sardormirzorakhimov@gmail.com</td>
                                    <td>SRHPH0Z736YKJ7DMBJKASOPR0F524FWY</td>
                                    <td>5000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="8">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2024-01-06 16:22:59</td>
                                    <td>OLL ISANBAYEV</td>
                                    <td>998971158298</td>
                                    <td>sardor.abduraxmanov@ssd.uz</td>
                                    <td>Q9XHCE37CC2H8HRCZAFJPCQNS1YTIXFE</td>
                                    <td>1000</td>
                                    <td>
                                                                                    <span style="color: #f10000">inactive</span>
                                                                            </td>
                                    <td>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2024-01-06 16:18:19</td>
                                    <td>KHUSANBAYEVA KUNDUZXON 364</td>
                                    <td>998971158298</td>
                                    <td>sardor.abduraxmanov@ssd.uz</td>
                                    <td>9T4QGPGYGTUA6M61TTVWIP0BQLHZNNDO</td>
                                    <td>1000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="6">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2023-12-15 11:21:04</td>
                                    <td>SATTOROVA SHAXZODA</td>
                                    <td>998917981458</td>
                                    <td></td>
                                    <td>DJ7JFMWEBFWF4QLRS7TZPE7UND8KGPTT</td>
                                    <td>5000</td>
                                    <td>
                                                                                    <span style="color: #f10000">inactive</span>
                                                                            </td>
                                    <td>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2023-11-15 09:46:27</td>
                                    <td>AZIZJON AZIMOV</td>
                                    <td>998933950097</td>
                                    <td></td>
                                    <td>K7ZXPAV3WASSAW6VMONSTDAKVPZ2OEAG</td>
                                    <td>5000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="4">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2023-11-06 12:05:15</td>
                                    <td>AZIZJON AZIMOV</td>
                                    <td>998933950097</td>
                                    <td>a.azizjon@gmail.com</td>
                                    <td>HTM3YXHXS7HVDRETOLNZCQRWXHPXJ4H1</td>
                                    <td>7000</td>
                                    <td>
                                                                                    <span style="color: #009688">active</span>
                                                                            </td>
                                    <td>
                                                                                    <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="3">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2023-05-18 16:06:56</td>
                                    <td>ANDREY MIKHAYLOV MUF</td>
                                    <td>998909625344</td>
                                    <td></td>
                                    <td>ACRHHGIUVKVXMI4HUTT68PFGW35YTU7I</td>
                                    <td>1000</td>
                                    <td>
                                                                                    <span style="color: #f10000">inactive</span>
                                                                            </td>
                                    <td>
                                                                            </td>
                                </tr>
                                                            <tr class="">
                                    <td nowrap="nowrap">2023-04-26 16:39:28</td>
                                    <td></td>
                                    <td>998935851118</td>
                                    <td></td>
                                    <td>YGXUAHICYBHV5TDQCMC2LNRFLTZJD1J4</td>
                                    <td>5000</td>
                                    <td>
                                                                                    <span style="color: #f10000">inactive</span>
                                                                            </td>
                                    <td>
                                                                            </td>
                                </tr>
                                                        <tr>
                                <td colspan="8">
                                    <div class="pull-left">Результаты с <b>1</b> по <b>13</b> из <b>13</b></div>
                                                                    </td>
                            </tr>
                                                </tbody>
                    </table>
                </div>
            </div>
        </div>
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

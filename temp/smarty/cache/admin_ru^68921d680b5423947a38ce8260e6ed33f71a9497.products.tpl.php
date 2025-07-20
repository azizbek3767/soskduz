<?php
/* Smarty version 3.1.33, created on 2025-07-02 13:40:18
  from '/home/soskduz/public_html/admin/templates/products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6864f0725e8200_24196878',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12f8a2729addcb7f4de3b89cf7f70ced94609967' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/products.tpl',
      1 => 1604265832,
      2 => 'file',
    ),
    '4629014038a5128208a4f1719eeb7e10cf5c5a7b' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/header.tpl',
      1 => 1604269700,
      2 => 'file',
    ),
    '1d750a560aa5c3db7a0d276373beae704ff1e939' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/tinymce_init.tpl',
      1 => 1584699884,
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
function content_6864f0725e8200_24196878 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
      <title>Продукция - Life Style CMS</title>
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
                                            <a href="https://www.sos-kd.uz/admin/products.php">
                                                <span class="flag flag-ru"></span> Русский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/en/products.php">
                                                <span class="flag flag-en"></span> Английский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/uz/products.php">
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
                                                <li class="xn-openable  active">
                            <a href="null"><span class="fa fa-file-contract"></span> <span class="xn-text"> Контент</span></a>
                            <ul>
                                                                <li class="">
                                    <a href="sliders.php"><span class="fa fa-file-contract"></span> Слайдер</a>
                                </li>
                                                                <li class="">
                                    <a href="articles.php"><span class="fa fa-file-contract"></span> Контент</a>
                                </li>
                                                                <li class="active">
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
       


<div class="page-content-wrap">
  
         
				 
	 
		 
						<script>
    $(document).ready(function () {
      
                                                                                                                            });
    function deleteImageMessage(){ noty({ text: 'Картинка удалена.', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function deleteProductMessage(){ noty({ text: 'Продукт удален.', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function deleteImageError(){ noty({ text: 'Картинка не удалена.', layout: 'topRight', type: 'error', timeout: 1500 }) }
    function deleteImageMessage(){ noty({ text: 'Картинка удалена.', layout: 'topRight', type: 'success', timeout: 1500 }) }
    function successImageMessage(){ noty({ text: 'Картинка успешно загружена', layout: 'topRight', type: 'success', timeout: 1500 }) }           
    </script>
    <div class="modal" id="edit_image">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title" id="defModalHead">Добавить описание к картинке</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">Описание к картинке<input class="form-control" autocomplete="off" id="image_description" type="text" name="image_description" value=""/>
                    </div>
                    <div class="form-group">Переход(ссылка) с картинки<input class="form-control" id="image_url" type="text" name="image_url" value="" /> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary save_edit_image" type="submit" value="" data-dismiss="modal"> Сохранить </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                </div>
            </div>
        </div>
    </div>
  


    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-6 col-xs-6 nopadding_left"><h2>Продукция</h2></div> 
            <div class="col-md-6 col-xs-6 nopadding_right">        
                <a class="btn btn-danger pull-right" href="products.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="Добавить"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>

    <div id="searchRow">
	    <div class="col-md-12">
	        <form id="searchForm">
	    	    <div class=" panel panel-colorful">
                    <div class="panel-body">
                        <div class="col-md-4 col-xs-12">
                            <label class="field_name">Поиск по названию</label>
                            <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Поиск по названию" class="fa fa-question-circle"></i>  
                            <input id="quick-search" class="form-control" type="text" name="query" value="" autocomplete="off" placeholder="Поиск по названию"/>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <label class="field_name">Фильтровать по направлению</label>
                                                            <select name="section" class="form-control select" onchange="this.form.submit()">
<option value="0">Все разделы</option>
<option value="33">Магазин</option>
<option value="36">Магазин :: Самоделки</option>
<option value="35">Магазин :: Футболки</option>
<option value="34">Магазин :: Открытки</option>
</select>

                                                    </div>
                        <div class="col-md-4 col-xs-12">
                            <label class="field_name">Статус</label>
                            <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Статус" class="fa fa-question-circle"></i>
                                                            <select name="status" class="form-control select" onchange="this.form.submit()">
<option value="">Все статусы</option>
<option value="visible">Включено</option>
<option value="hidden">Скрыто</option>
</select>

                                                    </div>
                        <div class="clear"></div>
                        <div class="col-md-12 col-xs-12 text-right"><input class=" btn btn-primary" type="submit" value="Фильтр"/></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="col-md-12">
	    <form action="products.php?page=1" method="post"> 
            <div class="panel panel-default">
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions table-hover" id="articles">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50">ID</th>
                                    <th class="text-center" width="50">Дата</th>
                                    <th class="text-center" width="50">Картинка</th>
                                    <th>Наименование</th>
                                    <th>Раздел</th>
                                    <th class="text-center" width="50">Избраное</th>
                                    <th class="text-center">Статус</th>
                                    <th class="text-center" width="140">Действие</th>
                                </tr>
                            </thead>
                                                            <tbody>
                                                                            <tr id="article-224">
                                             <td class="text-center" nowrap="nowrap">224</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/224/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/31b.htm" target="_blank">Новогодняя открытка 031</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-224">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=224&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(224, 'Новогодняя открытка 031');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-223">
                                             <td class="text-center" nowrap="nowrap">223</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/223/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-030.htm" target="_blank">Новогодняя открытка 030</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-223">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=223&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(223, 'Новогодняя открытка 030');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-222">
                                             <td class="text-center" nowrap="nowrap">222</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/222/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-029.htm" target="_blank">Новогодняя открытка 029</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-222">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=222&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(222, 'Новогодняя открытка 029');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-221">
                                             <td class="text-center" nowrap="nowrap">221</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/221/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-028.htm" target="_blank">Новогодняя открытка 028</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-221">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=221&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(221, 'Новогодняя открытка 028');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-220">
                                             <td class="text-center" nowrap="nowrap">220</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/220/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-027.htm" target="_blank">Новогодняя открытка 027</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-220">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=220&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(220, 'Новогодняя открытка 027');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-219">
                                             <td class="text-center" nowrap="nowrap">219</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/219/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-026.htm" target="_blank">Новогодняя открытка 026</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-219">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=219&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(219, 'Новогодняя открытка 026');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-218">
                                             <td class="text-center" nowrap="nowrap">218</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/218/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-025.htm" target="_blank">Новогодняя открытка 025</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-218">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=218&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(218, 'Новогодняя открытка 025');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-217">
                                             <td class="text-center" nowrap="nowrap">217</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/217/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-024.htm" target="_blank">Новогодняя открытка 024</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-217">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=217&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(217, 'Новогодняя открытка 024');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-216">
                                             <td class="text-center" nowrap="nowrap">216</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/216/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-023.htm" target="_blank">Новогодняя открытка 023</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-216">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=216&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(216, 'Новогодняя открытка 023');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                            <tr id="article-215">
                                             <td class="text-center" nowrap="nowrap">215</td>
                                            <td class="text-center" nowrap="nowrap">27.03.2020</td>
                                            <td class="text-center">
                                                                                                    <img src="https://www.sos-kd.uz/uploads/articles/215/article-medium.jpg" class="article_img" style="width: 50px"/>
                                                                                            </td>
                                            <td width="100%">
                                                <a href="https://www.sos-kd.uz/magazin/postcards/novogodnyaya-otkrytka-022.htm" target="_blank">Новогодняя открытка 022</a>
                                            </td>
                                            <td nowrap="nowrap"><span data-toggle="tooltip" data-placement="top" data-original-title="Открытки">Открытки</span></td>
                                            <td class="text-center" nowrap="nowrap">
                                                <span class="fa fa-star"></span>                                            </td>
                                            <td id="status-215">
                                                Включено
                                                                                            </td>
                                            <td class="btn-link-action text-center">
                                                <a class="btn btn-rounded" href="products.php?action[edit]=true&article[articleId]=215&page=1"><span class="fa fa-pen"></span></a>
                                                <a class="btn btn-danger btn-rounded" onclick="deleteProduct(215, 'Новогодняя открытка 022');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                                                    </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9">
                                            <div class="pull-left">Результаты с <b>1</b> по <b>10</b> из <b>35</b></div>
                                                                                            <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                                                                                                                                                        <li class="active"><a href="products.php?page=1">1</a></li>
                                                                                                                                                                                                                                <li><a href="products.php?page=2">2</a></li>
                                                                                                                                                                                                                                <li><a href="products.php?page=3">3</a></li>
                                                                                                                                                                                                                                <li><a href="products.php?page=4">4</a></li>
                                                                                                                                                            </ul>
                                                                                    </td>
                                    </tr>
                                </tfoot>
                                                    </table>
                    </div>                                
                </div>
            </div> 
        </form>	
    </div>

  <script type="text/javascript">
      </script>

</div> 

<script src="/admin/assets/js/superredactor/sredactor.min.js"></script>
<script>
    
     $(function(){
        tinyMCE.init({
            selector: "textarea.description",
            height: 400,
            plugins: [
                "advlist autolink lists link image preview anchor responsivefilemanager emoticons",
                "hr visualchars autosave noneditable searchreplace wordcount visualblocks",
                "code fullscreen save charmap nonbreaking",
                "insertdatetime media table paste imagetools",
            ],
            toolbar_items_size : 'small',
            menubar:'file edit insert view format table tools',
            toolbar1: "restoredraft save fontselect formatselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor | table | link unlink anchor media image | fullscreen code",

            table_class_list:[
                { title: 'None', value: '' },
                { title: 'table_style1', value: 'table_style1' },
                { title: 'table_style2', value: 'table_style2' },
                { title: 'table_style3', value: 'table_style3' }
            ],
           
            statusbar: true,
            font_formats: "Andale Mono=andale mono,times;"+
            "Arial=arial,helvetica,sans-serif;"+
            "Arial Black=arial black,avant garde;"+
            "Book Antiqua=book antiqua,palatino;"+
            "Comic Sans MS=comic sans ms,sans-serif;"+
            "Courier New=courier new,courier;"+
            "Georgia=georgia,palatino;"+
            "Helvetica=helvetica;"+
            "Impact=impact,chicago;"+
            "Symbol=symbol;"+
            "Tahoma=tahoma,arial,helvetica,sans-serif;"+
            "Terminal=terminal,monaco;"+
            "Times New Roman=times new roman,times;"+
            "Trebuchet MS=trebuchet ms,geneva;"+
            "Verdana=verdana,geneva;"+
            "Webdings=webdings;"+
            "Wingdings=wingdings,zapf dingbats",

            relative_urls: false,
            //remove_script_host: true,
            image_advtab: true,
            external_filemanager_path: "https://www.sos-kd.uz/admin/assets/js/filemanager/",
            filemanager_title: "Файл менеждер" ,
            external_plugins: { "filemanager" : "https://www.sos-kd.uz/admin/assets/js/filemanager/plugin.min.js" },


            save_enablewhendirty: true,
            save_title: "save",
            theme_advanced_buttons3_add : "save",
            save_onsavecallback: function() {
                $("[type='submit']").trigger("click");
            },

            language : "ru",
            /* Замена тега P на BR при разбивке на абзацы
             force_br_newlines : true,
             force_p_newlines : false,
             forced_root_block : '',
             */
             forced_root_block : '',
        });
    });
    
    
/*
    $(function(){
        tinyMCE.init({
            selector: "textarea.description",
             setup: function (editor) {
                editor.on('change', function () { 
                    tinymce.triggerSave();
                });
            },
            height: 400,
            autoresize_max_height: 300,
            menubar: true,
            schema: "html5",
            language : "ru",
            plugins: [
                "advlist autolink lists link image preview anchor responsivefilemanager",
                "hr visualchars autosave noneditable searchreplace wordcount visualblocks",
                "code textcolor colorpicker charmap nonbreaking",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar_items_size : 'small',
            //menubar:'file edit insert view format table tools',fontselect
            toolbar1: "undo redo  preview code | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink media image | formatselect fontsizeselect fontselect forecolor backcolo | removeformat",
            statusbar: true,
            content_css: ['https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Oswald|Raleway|Roboto&display=swap'],
            font_formats: "Montserrat=Montserrat,sans-serif;Roboto=Roboto, sans-serif;Oswald=Oswald, sans-serif;Raleway=Raleway, sans-serif';Andale Mono=andale mono,times;"+
            "Arial=arial,helvetica,sans-serif;"+
            "Arial Black=arial black,avant garde;"+
            "Book Antiqua=book antiqua,palatino;"+
            "Comic Sans MS=comic sans ms,sans-serif;"+
            "Courier New=courier new,courier;"+
            "Georgia=georgia,palatino;"+
            "Helvetica=helvetica;"+
            "Impact=impact,chicago;"+
            "Symbol=symbol;"+
            "Tahoma=tahoma,arial,helvetica,sans-serif;"+
            "Terminal=terminal,monaco;"+
            "Times New Roman=times new roman,times;"+
            "Trebuchet MS=trebuchet ms,geneva;"+
            "Verdana=verdana,geneva;",
            image_advtab: true,
            relative_urls: false,
            external_filemanager_path:"/admin/assets/js/filemanager/",
            filemanager_title: "Файл менеждер",
            external_plugins: { "filemanager" : "/admin/assets/js/filemanager/plugin.min.js" },
            extended_valid_elements: "span",
            save_enablewhendirty: true,
            save_title: "save",
            theme_advanced_buttons3_add : "save",
            save_onsavecallback: function(){
                $("[type='submit']").trigger("click");
            },


            /* Замена тега P на BR при разбивке на абзацы 
             force_br_newlines : true,
             force_p_newlines : false,
             forced_root_block : '',
             



        });
    });
*/
    
    
    // если сервер не поддерживает ( Responsive filemanager 9 internal server error) 
    /*
    tinymce.init({
        selector: '.description',
        height: 400,
        menubar: true,
        schema: "html5",
        language:"ru",
        plugins: [
            "advlist autolink lists link image preview anchor responsivefilemanager",
            "hr visualchars autosave noneditable searchreplace wordcount visualblocks",
            "code textcolor colorpicker charmap nonbreaking",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar_items_size : 'small',
        toolbar1: "undo redo  preview code | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink media imageupload | formatselect fontsizeselect fontselect forecolor backcolo | removeformat",
        statusbar: true,
        content_css: ['https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Oswald|Raleway|Roboto&display=swap'],
        font_formats: "Montserrat=Montserrat,sans-serif;Roboto=Roboto, sans-serif;Oswald=Oswald, sans-serif;Raleway=Raleway, sans-serif';Andale Mono=andale mono,times;"+
        "Arial=arial,helvetica,sans-serif;"+
        "Arial Black=arial black,avant garde;"+
        "Book Antiqua=book antiqua,palatino;"+
        "Comic Sans MS=comic sans ms,sans-serif;"+
        "Courier New=courier new,courier;"+
        "Georgia=georgia,palatino;"+
        "Helvetica=helvetica;"+
        "Impact=impact,chicago;"+
        "Symbol=symbol;"+
        "Tahoma=tahoma,arial,helvetica,sans-serif;"+
        "Terminal=terminal,monaco;"+
        "Times New Roman=times new roman,times;"+
        "Trebuchet MS=trebuchet ms,geneva;"+
        "Verdana=verdana,geneva;",
        relative_urls: false,
        remove_script_host: false,
        extended_valid_elements: "span",
        save_onsavecallback: function(){
            $("[type='submit']").trigger("click");
        },
        setup: function(editor) {
            initImageUpload(editor);
        }
    });  
    
    function initImageUpload(editor) {
        // создание ввода и вставка в DOM
        var inp = $('<input id="tinymce-uploader" type="file" name="file" accept="image/*" style="display:none">');
        $(editor.getElement()).parent().append(inp);
    
        // добавьте кнопку загрузить изображение на панель инструментов редактора
        editor.addButton('imageupload', {
            text: '',
            icon: 'image',
            onclick: function(e) { // при нажатии кнопки на панели инструментов открыть файл выбрать модель
                inp.trigger('click');
            }
        });
    
        // когда выбрали файл, загрузите его на сервер
        inp.on("change", function(e){ 
            uploadFile($(this), editor);
        });
    }
    
    function uploadFile(inp, editor) {
        var input = inp.get(0);
        var data = new FormData();
        data.append('contentImage', input.files[0]);
      
        $.ajax({
            url: 'functions.php',
            type: 'POST',
            dataType: "json",
            data: data,
            processData: false,
            contentType: false, 
            success: function(data) {
                console.log(data);
                if (data.code == "200"){
                    editor.insertContent('<img class="content-img" src="' + data.url + '">');
                    $('.upload-image').removeClass('alert-danger').addClass('alert-success').html(data.msg).fadeIn(1000).fadeOut(3000);	
                } else {
                    $('.upload-image').removeClass('alert-success').addClass('alert-danger').html(data.error).fadeIn(1000).fadeOut(3000);	
                }
            }
        });
    }  
    */

</script>

<script>
    var articleId = '215';
    
    $(document).ready(function () {
        Dropzone.autoDiscover = false; 
        $("#dZUpload").dropzone({ 
            url: "products.php", 
            addRemoveLinks: false, 
            maxFilesize: 2,
            acceptedFiles: "image/*",
            params: {
                'action':'uploadImage',
                'articleId': articleId
            },
            success: function (file, response) { 
                file.previewElement.classList.add("dz-success"); 
                successImageMessage()
                $('#links').html(response);
                setTimeout(function(){
                    $('.dz-success').fadeOut('slow');
                },2500);
            }, 
            error: function (file, response) { 
                file.previewElement.classList.add("dz-error"); 
            }
        }); 
    });
    
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
        maxFileSize: 2000
    });
    
    $(".edit_image").click(function() {
        var id   = $(this).data('id');
        var link = $(this).data('link');
        var desc = $(this).data('desc');
        $('.save_edit_image').val(id);
        $('#image_description').val(desc);
        $('#image_url').val(link);
    });
    
    $('.save_edit_image').click(function(e){	
        var id = $('.save_edit_image').val();
        var desc = $('#image_description').val();
        var link = $('#image_url').val();
        $.post('products.php', { id: id, desc: desc, link: link, action: 'editimage' }, function(data){
            if (data.update == 1){            
                $('.gallery-item.item-'+id+' .im_desc').text(desc);
                $('.gallery-item.item-'+id+' .im_link').text(link);
            }

        }, 'json');
    });           
</script>


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
  var ip = '185.137.153.78';
  
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

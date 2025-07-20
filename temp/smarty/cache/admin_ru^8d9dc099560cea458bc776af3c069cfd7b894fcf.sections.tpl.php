<?php
/* Smarty version 3.1.33, created on 2025-07-02 01:12:25
  from '/home/soskduz/public_html/admin/templates/sections.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6864412975bd28_78895671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '749daacef7e742fc347bb7110503f9a50011339b' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/sections.tpl',
      1 => 1684390343,
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
function content_6864412975bd28_78895671 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
      <title>Разделы - Life Style CMS</title>
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
                                            <a href="https://www.sos-kd.uz/admin/sections.php">
                                                <span class="flag flag-ru"></span> Русский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/en/sections.php">
                                                <span class="flag flag-en"></span> Английский
                                            </a>
                                        </li>
                                                                                                                                                <li>
                                            <a href="https://www.sos-kd.uz/admin/uz/sections.php">
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
                                                <li class="xn-openable  active">
                            <a href="sections.php"><span class="fa fa-layer-group"></span> <span class="xn-text"> Структура</span></a>
                            <ul>
                                                                <li class="active">
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
        
        function deleteImageError(){ noty({ text: 'Картинка не удалена.', layout: 'topRight', type: 'error', timeout: 1500 } )}
        function deleteImageMessage(){ noty({ text: 'Картинка удалена.', layout: 'topRight', type: 'success', timeout: 1500 } )}
        function successImageMessage(){ noty({ text: 'Картинка успешно загружена', layout: 'topRight', type: 'success', timeout: 1500 } )}
        function moveUpMessage(){ noty({ text: 'Раздел перемещен вверх.', layout: 'topRight', type: 'warning', timeout: 1500 } )}
        function moveDownMessage(){ noty({ text: 'Раздел перемещен вниз.', layout: 'topRight', type: 'warning', timeout: 1500 } )}
        function topMenuMessage(){ noty({ text: 'Раздел добавлен в главное меню.', layout: 'topRight', type: 'warning', timeout: 1500 } )}
        function downMenuMessage(){ noty({ text: 'Раздел удален из главного меню.', layout: 'topRight', type: 'warning', timeout: 1500 } )}    
        function sectionVisibleMessage(){ noty({ text: 'Раздел виден.', layout: 'topRight', type: 'warning', timeout: 1500 } )}
        function sectionHiddenMessage(){ noty({ text: 'Раздел скрыт.', layout: 'topRight', type: 'warning', timeout: 1500 } )}

        function deleteFileMessage(){ noty({ text: 'Файл удален', layout: 'topRight', type: 'success', timeout: 1500 } )}
        
    </script>
    <div class="modal" id="edit_image">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title" id="defModalHead">Добавить описание к картинке</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="field_name">Описание к картинке</label>
                        <input class="form-control" autocomplete="off" id="image_description" type="text" name="image_description" value=""/> 
                    </div>
                    <div class="form-group">
                        <label class="field_name">Переход(ссылка) с картинки</label>
                        <input class="form-control" id="image_url" type="text" name="image_url" value="" /> 
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
                <div class="col-md-3 col-xs-3 nopadding_left"><h2>Разделы</h2></div>
                <div class="col-md-6 col-xs-6 content-frame-body-left"><div id="ajaxStatus" class="alert alert-success col-md-6 info-box-img" role="alert"></div></div>
                <div class="col-md-3 col-xs-3 nopadding_right">                                                  
                    <div class="pull-right"> 
                        <a class="btn btn-danger" href="sections.php?action[edit]=true&parentId=0" data-toggle="tooltip" data-placement="left" data-original-title="Добавить раздел"><i class="fa fa-plus"></i></a>
                                                       
                    </div>   
                </div>                           
            </div>  
        </div>                     
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions table-hover" id="sections">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50">ID</th>
                                    <th class="">Заголовок</th>
                                    <th class="">Альтернативное имя</th>
                                    <th class="">Путь</th>
                                    <th class="" width="150">Тип</th>
                                    <th class="" width="150">Тип контента</th>
                                    <th class="text-center" width="100">Действие</th>
                                </tr>
                            </thead>
                                                        <tbody>   
                                                                  
                            <tr id="section-1" class="">
                                <td class="text-center">1</td>
                                <td  nowrap="nowrap">
                                                                            Главная
                                                                    </td>
                                <td  nowrap="nowrap">Главная</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/" target="_blank">/</a></td>
                                <td class="" nowrap="nowrap">Страница</td>
                                <td class="" nowrap="nowrap"></td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="1" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu1" type="checkbox" id="up_menu-1" checked value="1"/>
                                            <label class="top_menu" id="t1" data-id="1" data-val="0" for="up_menu-1"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=1">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(1, 'Главная')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(1, 'Главная')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-2" class="">
                                <td class="text-center">2</td>
                                <td  nowrap="nowrap">
                                                                            <a href="sections.php?parentId=2" style="border-bottom: 1px dashed;">SOS Детские деревни...</a>
                                                                    </td>
                                <td  nowrap="nowrap">Кто мы</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/kto-my/" target="_blank">/kto-my/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="2" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu2" type="checkbox" id="up_menu-2" checked value="1"/>
                                            <label class="top_menu" id="t2" data-id="2" data-val="0" for="up_menu-2"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=2">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(2, 'SOS Детские деревни Узбекистана')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(2, 'SOS Детские деревни Узбекистана')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=2">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-3" class="">
                                <td class="text-center">3</td>
                                <td  nowrap="nowrap">
                                                                            <a href="sections.php?parentId=3" style="border-bottom: 1px dashed;">Что мы делаем</a>
                                                                    </td>
                                <td  nowrap="nowrap">Что мы делаем</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/chto-my-delaem/" target="_blank">/chto-my-delaem/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="3" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu3" type="checkbox" id="up_menu-3" checked value="1"/>
                                            <label class="top_menu" id="t3" data-id="3" data-val="0" for="up_menu-3"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=3">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(3, 'Что мы делаем')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(3, 'Что мы делаем')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=3">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-4" class="">
                                <td class="text-center">4</td>
                                <td  nowrap="nowrap">
                                                                            <a href="sections.php?parentId=4" style="border-bottom: 1px dashed;">Где мы работаем</a>
                                                                    </td>
                                <td  nowrap="nowrap">Где мы работаем</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/gde-my-rabotaem/" target="_blank">/gde-my-rabotaem/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="4" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu4" type="checkbox" id="up_menu-4" checked value="1"/>
                                            <label class="top_menu" id="t4" data-id="4" data-val="0" for="up_menu-4"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=4">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(4, 'Где мы работаем')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(4, 'Где мы работаем')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=4">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-6" class="">
                                <td class="text-center">6</td>
                                <td  nowrap="nowrap">
                                                                            <a href="sections.php?parentId=6" style="border-bottom: 1px dashed;">Что можете сделать вы</a>
                                                                    </td>
                                <td  nowrap="nowrap">Что можете сделать вы</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/chto-mozhete-sdelat-vy/" target="_blank">/chto-mozhete-sdelat-vy/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="6" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu6" type="checkbox" id="up_menu-6" checked value="1"/>
                                            <label class="top_menu" id="t6" data-id="6" data-val="0" for="up_menu-6"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=6">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(6, 'Что можете сделать вы')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(6, 'Что можете сделать вы')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=6">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-7" class="">
                                <td class="text-center">7</td>
                                <td  nowrap="nowrap">
                                                                            Последние новости и...
                                                                    </td>
                                <td  nowrap="nowrap">Новости</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/novosti-i-meropriyatiya/" target="_blank">/novosti-i-meropriyatiya/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Новости</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="7" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu7" type="checkbox" id="up_menu-7" checked value="1"/>
                                            <label class="top_menu" id="t7" data-id="7" data-val="0" for="up_menu-7"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=7">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(7, 'Последние новости и события')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(7, 'Последние новости и события')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=7">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-9" class="">
                                <td class="text-center">9</td>
                                <td  nowrap="nowrap">
                                                                            Контакты
                                                                    </td>
                                <td  nowrap="nowrap">Контакты</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/kontakty/" target="_blank">/kontakty/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контакты</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="9" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu9" type="checkbox" id="up_menu-9" checked value="1"/>
                                            <label class="top_menu" id="t9" data-id="9" data-val="0" for="up_menu-9"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=9">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(9, 'Контакты')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(9, 'Контакты')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=9">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-8" class="">
                                <td class="text-center">8</td>
                                <td  nowrap="nowrap">
                                                                            Ознакомительный фильм...
                                                                    </td>
                                <td  nowrap="nowrap">https://youtu.be/2K_po...</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/video/" target="_blank">/video/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="8" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu8" type="checkbox" id="up_menu-8"  value="0"/>
                                            <label class="top_menu" id="t8" data-id="8" data-val="1" for="up_menu-8"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=8">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(8, 'Ознакомительный фильм об Ассоциации SOS Детские деревни Узбекистана')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(8, 'Ознакомительный фильм об Ассоциации SOS Детские деревни Узбекистана')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=8">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-25" class="opacity7">
                                <td class="text-center">25</td>
                                <td  nowrap="nowrap">
                                                                            <a href="sections.php?parentId=25" style="border-bottom: 1px dashed;">Что вы получите,...</a>
                                                                    </td>
                                <td  nowrap="nowrap"></td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/chto-vy-poluchite/" target="_blank">/chto-vy-poluchite/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-danger" style="width: 35px" id="25" value="hidden">
                                        <span class="fa fa-eye-slash" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu25" type="checkbox" id="up_menu-25"  value="0"/>
                                            <label class="top_menu" id="t25" data-id="25" data-val="1" for="up_menu-25"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=25">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(25, 'Что вы получите, работая в SOS Детские деревни Узбекистана:')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(25, 'Что вы получите, работая в SOS Детские деревни Узбекистана:')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=25">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-5" class="">
                                <td class="text-center">5</td>
                                <td  nowrap="nowrap">
                                                                            Наши партнеры
                                                                    </td>
                                <td  nowrap="nowrap">Наши партнеры</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/partners/" target="_blank">/partners/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Партнеры</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="5" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu5" type="checkbox" id="up_menu-5"  value="0"/>
                                            <label class="top_menu" id="t5" data-id="5" data-val="1" for="up_menu-5"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=5">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(5, 'Наши партнеры')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(5, 'Наши партнеры')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=5">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-33" class="">
                                <td class="text-center">33</td>
                                <td  nowrap="nowrap">
                                                                            <a href="sections.php?parentId=33" style="border-bottom: 1px dashed;">Магазин</a>
                                                                    </td>
                                <td  nowrap="nowrap">Магазин</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/magazin/" target="_blank">/magazin/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Продукция</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="33" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu33" type="checkbox" id="up_menu-33"  value="0"/>
                                            <label class="top_menu" id="t33" data-id="33" data-val="1" for="up_menu-33"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=33">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(33, 'Магазин')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(33, 'Магазин')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=33">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-37" class="">
                                <td class="text-center">37</td>
                                <td  nowrap="nowrap">
                                                                            Корзина
                                                                    </td>
                                <td  nowrap="nowrap">Корзина</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/basket/" target="_blank">/basket/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="37" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu37" type="checkbox" id="up_menu-37"  value="0"/>
                                            <label class="top_menu" id="t37" data-id="37" data-val="1" for="up_menu-37"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=37">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(37, 'Корзина')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(37, 'Корзина')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=37">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-38" class="">
                                <td class="text-center">38</td>
                                <td  nowrap="nowrap">
                                                                            <a href="sections.php?parentId=38" style="border-bottom: 1px dashed;">Цифры и факты</a>
                                                                    </td>
                                <td  nowrap="nowrap">Цифры и факты</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/number-and-facts/" target="_blank">/number-and-facts/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="38" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu38" type="checkbox" id="up_menu-38"  value="0"/>
                                            <label class="top_menu" id="t38" data-id="38" data-val="1" for="up_menu-38"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=38">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(38, 'Цифры и факты')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(38, 'Цифры и факты')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=38">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-42" class="">
                                <td class="text-center">42</td>
                                <td  nowrap="nowrap">
                                                                            Фотогалерея
                                                                    </td>
                                <td  nowrap="nowrap">Фотогалерея</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/gallery/" target="_blank">/gallery/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Галерея</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="42" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu42" type="checkbox" id="up_menu-42"  value="0"/>
                                            <label class="top_menu" id="t42" data-id="42" data-val="1" for="up_menu-42"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=42">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(42, 'Фотогалерея')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(42, 'Фотогалерея')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=42">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-54" class="">
                                <td class="text-center">54</td>
                                <td  nowrap="nowrap">
                                                                            Публичная оферта
                                                                    </td>
                                <td  nowrap="nowrap">оферты</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/offer/" target="_blank">/offer/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="54" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu54" type="checkbox" id="up_menu-54"  value="0"/>
                                            <label class="top_menu" id="t54" data-id="54" data-val="1" for="up_menu-54"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=54">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(54, 'Публичная оферта')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(54, 'Публичная оферта')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=54">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                                  
                            <tr id="section-14" class="">
                                <td class="text-center">14</td>
                                <td  nowrap="nowrap">
                                                                            <a href="sections.php?parentId=14" style="border-bottom: 1px dashed;">Вакансии</a>
                                                                    </td>
                                <td  nowrap="nowrap">Вакансии</td>
                                <td nowrap="nowrap"><a href="https://www.sos-kd.uz/vakansii/" target="_blank">/vakansii/</a></td>
                                <td class="" nowrap="nowrap">Раздел</td>
                                <td class="" nowrap="nowrap">Контент</td>
                                <td class="btn-link-action" nowrap="nowrap">
                                    <a class="status_selection btn btn-rounded btn-green" style="width: 35px" id="14" value="visible">
                                        <span class="fa fa-eye" style="font-size: 13px;" data-toggle="tooltip" data-placement="top" data-original-title="Поменять статуc"></span>
                                    </a>

                                    <div class="form-group" style="width: 25px">
                                        <div class="checkbox-material inline-block">
                                            <input class="up_menu14" type="checkbox" id="up_menu-14" checked value="1"/>
                                            <label class="top_menu" id="t14" data-id="14" data-val="0" for="up_menu-14"><span class="chk-span" data-toggle="tooltip" data-placement="top" data-original-title="Показать в главном меню" style="margin:0px;"></span></label>
                                        </div>
                                    </div>
                                    <a class="btn btn-rounded" href="sections.php?action[edit]=true&section[sectionId]=14">
                                        <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveUp(14, 'Вакансии')">
                                        <span class="fa fa-arrow-up" data-toggle="tooltip" data-placement="top" data-original-title="Поднять вверх"></span>
                                    </a>
                                    <a class="btn btn-green btn-rounded" onclick="moveDown(14, 'Вакансии')">
                                        <span class="fa fa-arrow-down" data-toggle="tooltip" data-placement="top" data-original-title="Опустить вниз"></span>
                                    </a>
                                     
                                    <a class="btn btn-danger btn-rounded" href="sections.php?action[confirmDelete]=true&section[sectionId]=14">
                                        <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"></span>
                                    </a>
                                                                    </td>
                            </tr>
                                                        </tbody>
                            <tfoot>
                                <tr>
                                    <td class="small" colspan="3">Результаты с <b>1</b> по <b>15</b> из <b>17</b></td>
                                    <td align="right" colspan="4">
                                                                                <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                                                                                                                <li class="active"><a href="sections.php?page=1">1</a></li>
                                                                                                                                                                            <li><a href="sections.php?page=2">2</a></li>
                                                                                                                            </ul>  
                                                                            </td>
                                </tr> 
                            </tfoot>
                               
                        </table>
                    </div>                                
                </div>
            </div>                                                  
        </div>
    
    
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
    var sectionId = '14';

    $(document).ready(function () {
        Dropzone.autoDiscover = false; 
        $("#dZUpload").dropzone({ 
            url: "sections.php", 
            addRemoveLinks: false, 
            uploadMultiple: false,
            maxFilesize: 2,
            parallelUploads: 1,
            acceptedFiles: "image/*",
            params: { 'action':'uploadImage', 'sectionId': sectionId },
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

    $('.top_menu').click(function(){	
        var id = $(this).attr("data-id");
        var ckVal = $(this).attr("data-val");
        $.post('sections.php', { id: id, check: ckVal, action: 'menu' }, function(data){
            console.log(data.check);
            $(".up_menu"+id).val(data.check);
            if (data.check == 1){
                downMenuMessage();
                $('label#t'+id).attr('data-val', data.check);
            }else{
                topMenuMessage();
                $('label#t'+id).attr('data-val', data.check);
            }
        }, 'json');
    });	

    $('.status_selection').click(function(e){	
        var id = $(this).attr("id");
        var choiceVal = $(this).attr('value');
        $.post('sections.php', { id: id, choice: choiceVal, action: 'status' }, function(data){
            //console.log(data.choice);
            if (data.choice == 'visible'){
                sectionVisibleMessage();
                $('.status_selection#'+id).attr('value', data.choice);
                $('.status_selection#'+id).attr('class', 'status_selection btn btn-rounded btn-green');
                $('.status_selection#'+id+' span').attr('class', 'fa fa-eye');
            }else{
                sectionHiddenMessage();
                $('.status_selection#'+id).attr('value', data.choice);
                $('.status_selection#'+id).attr('class', 'status_selection btn btn-rounded btn-danger');
                $('.status_selection#'+id+' span').attr('class', 'fa fa-eye-slash');
            }
        }, 'json');
    });

    $(document).ready(function(){  
        var type = $('#type :selected').val();
        if (type === 'plain') {
            $('#type_content').prop("disabled", true); 
        }
        $('#type').change(function() {
            var type_content = $(this).val();
            $('#type_content').prop("disabled", true); 
            if (type_content === 'tree') {
                //console.log(type_content);
                $('#type_content').prop("disabled", false);
                $('#type_content').selectpicker('refresh');
            } 
        });
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
        $.post('sections.php', { id: id, desc: desc, link: link, action: 'editimage' }, function(data){
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
  var ip = '213.230.102.112';
  
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

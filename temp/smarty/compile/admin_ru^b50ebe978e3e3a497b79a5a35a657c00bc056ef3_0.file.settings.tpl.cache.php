<?php
/* Smarty version 3.1.33, created on 2025-04-15 14:54:31
  from '/home/soskduz/public_html/admin/templates/settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67fe2cd78653e5_27070791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b50ebe978e3e3a497b79a5a35a657c00bc056ef3' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/settings.tpl',
      1 => 1581102464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_67fe2cd78653e5_27070791 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_select_date.php','function'=>'smarty_function_html_select_date',),));
$_smarty_tpl->compiled->nocache_hash = '100182931267fe2cd777c576_75065606';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"settings",'title'=>"Настройки - Управление"), 0, false);
?>
<div class="page-content-wrap">
    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?><span id="savedMessage" onclick="noty({ text: 'Настройки сохранены.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?> 
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['htaccess'])) {?><span id="htaccessError" onclick="noty({ text: 'Невозможно сохранить файл ".htaccess".', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?> 
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['serializations'])) {?><span id="serializationsError" onclick="noty({ text: 'Невозможно сохранить сериализационный файл.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>

    <?php echo '<script'; ?>
>
        $(document).ready(function() { 
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['htaccess'])) {?>$('#htaccessError').click(); <?php }?> 
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['serializations'])) {?>$('#serializationsError').click(); <?php }?> 
            <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?>$('#savedMessage').click(); <?php }?>  
        });
        function deleteStatsMessage() { noty({  text: 'Статистические данные удалены.',  layout: 'topRight',  type: 'success', timeout: 1500 }) }
        function clearCacheMessage() { noty({ text: 'Кэш очищен', layout: 'topRight', type: 'success', timeout: 1500}) } 
    
    <?php echo '</script'; ?>
>

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
                    <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['accessLevel'] == "developer") {?><li class=""><a href="#update_url" data-toggle="tab" aria-expanded="false">Update urls</a></li><?php }?>
                </ul>

                <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="general">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Название сайта</label><p>например: "Моя домашняя страница"</p></div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[website_name]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['website_name'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Шаблон сайта по умолчанию</label><p>Выберите шаблон, который будет использоваться на сайте</p></div>
                                    <div class="col-md-6 nopadding_right"><?php echo smarty_function_html_options(array('name'=>"settings[theme]",'values'=>$_smarty_tpl->tpl_vars['themes']->value,'output'=>$_smarty_tpl->tpl_vars['themes']->value,'selected'=>$_smarty_tpl->tpl_vars['config']->value['theme'],'class'=>"form-control select"),$_smarty_tpl);?>
 </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Используемый язык сайта</label><p>Выберите язык, который будет использоваться, согласно языковой версии сайта</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <?php echo '<script'; ?>
 type="text/javascript">
                                            lang2charset = { <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languageCharsets']->value, 'charset', false, 'lang', 'languageCharsets', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value => $_smarty_tpl->tpl_vars['charset']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_languageCharsets']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_languageCharsets']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_languageCharsets']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_languageCharsets']->value['total'];
?>
                                            "<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
": "<?php echo $_smarty_tpl->tpl_vars['charset']->value;?>
" <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_languageCharsets']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_languageCharsets']->value['last'] : null)) {?>, <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> };
                                        <?php echo '</script'; ?>
>

                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['languageOptions']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['website_language'])===null||$tmp==='' ? '' : $tmp),'name'=>"settings[website_language]",'onChange'=>"webLanguageOptionChange(this)",'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Кодировка сайта</label><p>Кодировка сайта по-умолчанию (Unicode - UTF-8), желательно не менять</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['charsetOptions']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['charset'])===null||$tmp==='' ? '' : $tmp),'name'=>"settings[charset]",'id'=>"charsetOptions",'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Язык интерфейса -->
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Используемый язык</label><p>Выберите язык, который будет использоваться при работе с системой</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['adminLangs']->value,'name'=>"settings[admin_language]",'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['admin_language'])===null||$tmp==='' ? '' : $tmp),'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div> 
                                </div>
                                <div class="form-group">
                                    <!-- Формат ввода времени -->
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Формат времени</label><p>Формат времени по-умолчанию (24-часовой)</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['timeformats']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['use_24_hours'])===null||$tmp==='' ? '' : $tmp),'name'=>"settings[use_24_hours]",'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Часовой пояс </label><p>Выберете часовой пояс, по которому будет работать ваш сайт и сервер.<br /> Текущее время сервера с учетом часового пояса: <?php echo $_smarty_tpl->tpl_vars['adjustedTime']->value;?>
</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['langtimezones']->value,'name'=>"settings[timezone]",'id'=>"timezone",'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['timezone'])===null||$tmp==='' ? '' : $tmp),'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Выключить сайт</label><p>Перевести сайт в состояние offline, для проведения технических работ</p></div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="website_down" name="settings[website_down]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['website_down']) {?>checked<?php }?>><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Сообщение посетителям, если сайт отключен</label><p>Сообщение для отображения в режиме отключенного сайта</p></div>
                                    <div class="col-md-6 nopadding_right"><textarea name="settings[maintenance_message]" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['config']->value['maintenance_message'];?>
</textarea></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Список IP адресов</label>
                                        <p>Список IP адресов разрешенных для просмотра сайта, когда сайт выключен.<br> Ваш IP адрес: <b><?php echo $_smarty_tpl->tpl_vars['ADMINIP']->value;?>
</b></p>
                                    </div>
                                    <div class="col-md-6 nopadding_right"><input type="text" id="listIp" class="form-control" name="settings[listIp]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['listIp'];?>
" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Тестировать сайт на ошибки</label> </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="error_test" name="settings[error_test]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['error_test']) {?>checked<?php }?>><span></span>
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
                                                    <input type="checkbox" name="settings[feedback_captcha_enabled]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['feedback_captcha_enabled']) {?>checked<?php }?>><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Формат ввода времени -->
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Тип кода безопасности (CAPTCHA):</label><p>Укажите тип кода безопасности, который будет использоваться на сайте. Вы можете установить использование стандартную капчу, либо установить код сервиса reCAPTCHA:v3</p></div>
                                    <div class="col-md-6 nopadding_right"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['captchas']->value,'name'=>"settings[allow_recaptcha]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'],'class'=>"form-control select"),$_smarty_tpl);?>
</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Публичный ключ сервиса reCAPTCHA:v3:</label><p>Получить ключ вы можете по ссылке: <a href="http://www.google.com/recaptcha" target="_blank">http://www.google.com/recaptcha</a><br /> Внимание, настоятельно рекомендуется зарегистрироваться на сервисе и сгенерировать для своего сайта уникальную пару ключей, установив разрешение на использование только на своем домене. Использование стандартной пары ключей, не дает должного эффекта по защите от спам роботов.</p></div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[recaptcha_public_key]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_public_key'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Секретный ключ сервиса reCAPTCHA:v3:</label><p>Получить ключ вы можете по ссылке: <a href="http://www.google.com/recaptcha" target="_blank">http://www.google.com/recaptcha</a><br /> Внимание, настоятельно рекомендуется зарегистрироваться на сервисе и сгенерировать для своего сайта уникальную пару ключей, установив разрешение на использование только на своем домене. Использование стандартной пары ключей, не дает должного эффекта по защите от спам роботов.</p></div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[recaptcha_private_key]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_private_key'];?>
"></div>
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
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[company_name]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['company_name'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Режим работы</label><p>Укажите режим работы вашей организации</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[operating_mode]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['operating_mode'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Адрес</label><p>Укажите юридический адрес вашей компании</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[address]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['address'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Информационные почтовые адреса</label><p>Информационные почтовые адреса для вывода на сайт. <br>Можно указать несколько почтовых адресов через запятую </p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[feedback_email]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['feedback_email'];?>
"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Основной телефон</label></div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['phone'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Доп. телефон</label></div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone_two]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['phone_two'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Телефон менеджера</label></div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone_three]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['phone_three'];?>
"></div>
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
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mailTransports']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['mail_transport'])===null||$tmp==='' ? '' : $tmp),'name'=>"settings[mail_transport]",'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Порт (Port)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ports']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['smtp_port'])===null||$tmp==='' ? '' : $tmp),'name'=>"settings[smtp_port]",'id'=>"ports",'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Шифрование (SMTPSecure)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['secures']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['smtp_secure'])===null||$tmp==='' ? '' : $tmp),'name'=>"settings[smtp_secure]",'id'=>"secures",'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Заголовок отправителя писем, при отправке писем</label><p>При отправке писем с сайта вы можете указать заголовок, который будет добавляться к почте отправителя. Например, вы можете там указать краткое название вашего сайта</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_subject]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_subject'];?>
"></div>
                                </div>
                            </div> 
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для info@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Адрес отправителя (to)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['email'];?>
" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Сервер (Host)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()<br> SMTP — smtp.yandex.ru, smtp.gmail.com</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_server'];?>
" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пользователь (Username)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_user'];?>
" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пароль</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_pass'];?>
" id="password"></div>
                                </div>   
                                
                            </div>
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для заказа открыток  charitycards@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Адрес отправителя (to)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email2]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['email2'];?>
" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Сервер (Host)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()<br> SMTP — smtp.yandex.ru, smtp.gmail.com</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server2]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_server2'];?>
" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пользователь (Username)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user2]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_user2'];?>
" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пароль</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass2]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_pass2'];?>
" id="password"></div>
                                </div>   
                                
                            </div>
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для резюме recruitment@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Адрес отправителя (to)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email3]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['email3'];?>
" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Сервер (Host)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()<br> SMTP — smtp.yandex.ru, smtp.gmail.com</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server3]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_server3'];?>
" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пользователь (Username)</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user3]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_user3'];?>
" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">SMTP Пароль</label><p>Не требуется в большинстве случаев, если используется функция PHP mail()</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass3]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smtp_pass3'];?>
" id="password"></div>
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
                                                <label class="switch switch-small"><input type="checkbox" name="settings[telegram_send]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['telegram_send']) {?>checked<?php }?>><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Токен для доступа к HTTP API</label> <p>Сюда нужно вписать токен вашего бота</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[telegram_token]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['telegram_token'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Идентификатор чата</label><p>Сюда нужно вписать ваш внутренний идентификатор</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[telegram_chat_id]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['telegram_chat_id'];?>
"></div>
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
                                    <div class="col-md-6 nopadding" style="padding-top: 30px"><p>Если в настройках бота включен режим приватности (а он включен по умолчанию), то все сообщения, отправляемые ботом конкретному пользователю, не будут видны остальным подписчикам этого бота. Именно это нам и надо, ведь мы же не хотим, чтобы кто-то, случайно подписавшись на нашего бота, перехватывал все наши уведомления. Чтобы бот отправлял сообщения только нам, надо узнать идентификатор нашего чата.</p><p>Для этого подпишитесь на своего бота и отправьте ему любое сообщение. После этого в браузере надо сформировать ссылку следующего вида:<br /><a href="https://api.telegram.org/bot<?php echo $_smarty_tpl->tpl_vars['config']->value['telegram_token'];?>
/getUpdates" target="_blank" style="text-decoration: underline">https://api.telegram.org/bot<?php echo $_smarty_tpl->tpl_vars['config']->value['telegram_token'];?>
/getUpdates</a></p></div>
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
                                                <label class="switch switch-small"><input type="checkbox" name="settings[slider]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['slider']) {?>checked<?php }?>><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Кол-во слайдов на сайте</label> </div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[cont_slide]" value="<?php if (isset($_smarty_tpl->tpl_vars['config']->value['cont_slide'])) {
echo $_smarty_tpl->tpl_vars['config']->value['cont_slide'];
}?>"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Кол-во контента в разделах</label><p>Настройка вывода контента, кол-во статей в разделах</p></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[cont_section]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['cont_section'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Включить счетчик</label><p>Включить счетчик просмотра статьи</p></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[view_enabled]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['view_enabled']) {?>checked<?php }?>><span></span></label>
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
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[small_thumb_width]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['small_thumb_width'];?>
" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[small_thumb_height]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['small_thumb_height'];?>
" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Средняя картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[medium_thumb_width]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['medium_thumb_width'];?>
" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[medium_thumb_height]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['medium_thumb_height'];?>
" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Большая картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[large_thumb_width]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['large_thumb_width'];?>
" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[large_thumb_height]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['large_thumb_height'];?>
" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Качество сжатия</label></div>
                                    <div class="col-md-6 nopadding"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['thumbQualityOptions']->value,'name'=>"settings[thumbnail_quality]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['thumbnail_quality'],'class'=>"form-control select"),$_smarty_tpl);?>
</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Сохранять исходную картинку</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="save_original_image" name="settings[save_original_image]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['save_original_image']) {?>checked<?php }?>><span></span>
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
                                                    <input type="checkbox" id="keep_original_image_name" name="settings[keep_original_image_name]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['keep_original_image_name']) {?>checked<?php }?>><span></span>
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
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[smallX]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smallX'];?>
" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[smallY]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['smallY'];?>
" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Средняя картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[mediumX]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['mediumX'];?>
" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[mediumY]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['mediumY'];?>
" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Большая картинка (длина X ширина)</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[bigX]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['bigX'];?>
" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[bigY]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['bigY'];?>
" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Качество сжатия</label></div>
                                    <div class="col-md-6 nopadding"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['thumbQualityOptions']->value,'name'=>"settings[quality]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['quality'],'class'=>"form-control select"),$_smarty_tpl);?>
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
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_enabled]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_enabled']) {?>checked<?php }?>/><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Редакторы могут одобрять/удалять комментарии</label><p>Только для разрешенных разделов</p></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_editors_may_approve]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_editors_may_approve']) {?>checked<?php }?>/><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Требовать заполнения CAPTCHA</label><p>Предотвращает автоматическую отправку комментариев</p></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_captcha_enabled]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_captcha_enabled']) {?>checked<?php }?> /><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Модерация контента комментариев</label></div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_strip_html]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_strip_html']) {?>checked<?php }?> /><span></span></label>
                                            </div>
                                        </div>
                                        <i>удалять HTML тэги</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_convert_links]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_convert_links']) {?>checked<?php }?> /><span></span></label>
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
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="0" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_email_confirmation_required'] == 0) {?>checked<?php }?> /> 
                                                <i style="padding-left: 58px">Не требуется</i>
                                            </label>
                                        </div>
                                        <div class="check_box" style="margin-bottom:10px;">
                                            <label>
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_email_confirmation_required'] == 1) {?>checked<?php }?> /> 
                                                <i style="padding-left: 58px">Требуется если пользователь оставляет комментарий первый раз</i>
                                            </label>
                                        </div>
                                        <div class="check_box" style="margin-bottom:10px;">
                                            <label>
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_email_confirmation_required'] == 2) {?>checked<?php }?> /> 
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
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_must_be_approved]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_must_be_approved']) {?>checked<?php }?> /><span></span></label>
                                            </div>
                                        </div>
                                        <i>все комментарии одобряются вручную</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_whitelist_enabled]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_whitelist_enabled']) {?>checked<?php }?> /><span></span></label>
                                            </div>
                                        </div>
                                        <i>публиковать комментарий если у пользователя уже были одобренные комментарии</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_blacklist_enabled]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['comments_blacklist_enabled']) {?>checked<?php }?> /><span></span></label>
                                            </div>
                                        </div>
                                        <i>отмечать комментарий как СПАМ, если у пользователя уже были подобные комментарии</i>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Не публиковать комментарий</label><p>Eсли в нем содержится:<br> Одно слово или IP в строке. <br>Проверяется на наличие в тексте комментария, имени автора, email и IP.</p></div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[comments_hold_words]" class="form-control" rows="6"><?php echo $_smarty_tpl->tpl_vars['config']->value['comments_hold_words'];?>
</textarea></div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Пометить комментарий как СПАМ</label><p>Если в нем содержится:<br> Одно слово или IP в строке. <br>Проверяется на наличие в тексте комментария, имени автора, email и IP.</p></div>
                                    <div class="col-md-6 nopadding"> <textarea name="settings[comments_spam_words]" class="form-control" rows="6"><?php echo $_smarty_tpl->tpl_vars['config']->value['comments_spam_words'];?>
</textarea></div>
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
                                                <label class="switch switch-small"><input type="checkbox" id="compress_js_css" name="settings[compress_js_css]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['compress_js_css']) {?>checked<?php }?>><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Расширение файлов</label></div>
                                    <div class="col-md-6 nopadding"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['fileExtension']->value,'name'=>"settings[file_extension]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['file_extension'],'class'=>"form-control select"),$_smarty_tpl);?>
</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Переводить имя файла в строчные</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="convert_filename_to_lowercase" name="settings[convert_filename_to_lowercase]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['convert_filename_to_lowercase']) {?>checked<?php }?>>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Разделитель слов в имени файла</label></div>
                                    <div class="col-md-6 nopadding">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['separators']->value,'name'=>"settings[filename_word_separator]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['filename_word_separator'],'class'=>"form-control select"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Контент</label><p>Вы можете задать интервал в минутах, после которого будет осуществляться принудительная очистка кэша. Например задав 30, кеш будет очищаться каждые 30 минут. Данная настройка будет полезна если вы публикуете новости на будущую дату и включено кеширование на сайте.</p></div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:20px;">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_article]" value="1" id="cache_enabled_article" <?php if ($_smarty_tpl->tpl_vars['config']->value['cache_enabled_article']) {?>checked<?php }?>>
                                                <i> Включить кэширование на</i>
											</label>
                                        </div>

                                        <div class="col-md-1 col-xs-2 nopadding">
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cachingTimeOptions']->value,'name'=>"settings[cache_time_article]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['cache_time_article'],'class'=>"form-control select"),$_smarty_tpl);?>

                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cachingPeriodOptions']->value,'name'=>"settings[cache_period_article]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['cache_period_article'],'class'=>"form-control select"),$_smarty_tpl);?>

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
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_section]" value="1" id="cache_enabled_section" <?php if ($_smarty_tpl->tpl_vars['config']->value['cache_enabled_section']) {?>checked<?php }?>>
                                                <i> Включить кэширование на </i>
                                            </label>
                                        </div>
                                        <div class="col-md-1 col-xs-2 nopadding">
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cachingTimeOptions']->value,'name'=>"settings[cache_time_section]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['cache_time_section'],'class'=>"form-control select"),$_smarty_tpl);?>

                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['cachingPeriodOptions']->value,'name'=>"settings[cache_period_section]",'selected'=>$_smarty_tpl->tpl_vars['config']->value['cache_period_section'],'class'=>"form-control select"),$_smarty_tpl);?>

                                        </div>
                                    </div>
                                </div>
                                <!--/ Разделы -->

                                
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Карта сайта (XML)</label><p>Вы можете задать интервал в минутах, после которого будет осуществляться принудительная очистка кэша. Например задав 30, кеш будет очищаться каждые 30 минут. Данная настройка будет полезна если вы публикуете новости на будущую дату и включено кеширование на сайте.</p></div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:20px;">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_sitemap]" value="1" id="cache_enabled_sitemap" <?php if ($_smarty_tpl->tpl_vars['config']->value['cache_enabled_sitemap']) {?>checked<?php }?>>
                                                <i>Включить кэширование на </i>
                                            </label>
                                        </div>
                                        <div class="col-md-1 col-xs-2 nopadding">
                                            <select name="settings[cache_time_sitemap]" class="form-control select">
                                                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['cachingTimeOptions']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['cache_time_sitemap'])===null||$tmp==='' ? '' : $tmp),'output'=>$_smarty_tpl->tpl_vars['cachingTimeOptions']->value),$_smarty_tpl);?>

                                            </select>
                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            <select name="settings[cache_period_sitemap]" class="form-control select">
                                                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['cachingPeriodOptions']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['config']->value['cache_period_sitemap'])===null||$tmp==='' ? '' : $tmp)),$_smarty_tpl);?>

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
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[yandex_metrika]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['yandex_metrika'];?>
"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Ваш ID в Google Analytics</label></div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[google_analytics]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['google_analytics'];?>
"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Включить статистику</label></div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="statistics_enabled" name="settings[statistics_enabled]" value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['statistics_enabled']) {?>checked<?php }?>><span></span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--Идентификаторы ботов -->
                                    <div class="col-md-6 nopadding"><label class="field_name">Идентификаторы ботов</label></div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[bot_id_strings]" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['config']->value['bot_id_strings'];?>
</textarea></div>
                                </div>
                                <!--/ Идентификаторы ботов -->
                                <div class="form-group">
                                    <!--Идентификаторы ботов -->
                                    <div class="col-md-6 nopadding"><label class="field_name">Идентификаторы поисковых запросов</label></div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[query_fields_strings]" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['config']->value['query_fields_strings'];?>
</textarea></div>
                                </div>
                                <!--/ Идентификаторы ботов -->

                                <div class="form-group">
                                    <!--Удалить статистические данные -->
                                    <div class="col-md-6 nopadding"><label class="field_name">Удалить статистические данные до</label></div>
                                    <div class="col-md-6 nopadding date">
                                        <?php echo smarty_function_html_select_date(array('start_year'=>2006,'month_format'=>"%b",'time'=>$_smarty_tpl->tpl_vars['deleteStatsTime']->value,'field_array'=>"date",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>

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
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[site_url]" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['site_url'];?>
" placeholder="http://domain.uz/"></div>
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

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

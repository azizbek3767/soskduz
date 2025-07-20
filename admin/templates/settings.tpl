{include file="header.tpl" activeItem="settings" title="{settings:title} - {header:administration}"}
<div class="page-content-wrap">
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{settings:messages:0}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if} 
    {if isset($errors.htaccess)}<span id="htaccessError" onclick="noty({ text: '{settings:errors:0}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if} 
    {if isset($errors.serializations)}<span id="serializationsError" onclick="noty({ text: '{settings:errors:1}', layout: 'topRight', type: 'error', timeout: 1500 });"></span>{/if}

    <script>
        $(document).ready(function() { 
            {if isset($errors.htaccess)}$('#htaccessError').click(); {/if} 
            {if isset($errors.serializations)}$('#serializationsError').click(); {/if} 
            {if isset($messages.saved)}$('#savedMessage').click(); {/if}  
        });
        function deleteStatsMessage() { noty({  text: '{settings:statistics:statsDeleted}',  layout: 'topRight',  type: 'success', timeout: 1500 }) }
        function clearCacheMessage() { noty({ text: '{settings:caching:clearedCache}', layout: 'topRight', type: 'success', timeout: 1500}) } 
    
    </script>

    <div class="content-frame" style="margin-bottom:10px;"><div class="content-frame-top"><div class="col-md-12"><h2>{settings:title}</h2></div></div></div>
    <div class="col-md-12">
        <form action="settings.php" method="post" id="settings" autocomplete="off">
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">{settings:tabs:general}</a></li>
                    <li class=""><a href="#security" data-toggle="tab" aria-expanded="false">{settings:tabs:security}</a></li>
                    <li class=""><a href="#contactInfo" data-toggle="tab" aria-expanded="false">{settings:tabs:contactInfomaciya}</a></li>
                    <li class=""><a href="#mail" data-toggle="tab" aria-expanded="false">{settings:tabs:pochta}</a></li>
                    <li class=""><a href="#telegram" data-toggle="tab" aria-expanded="false">{settings:tabs:telegram}</a></li>
                    <li class=""><a href="#content" data-toggle="tab" aria-expanded="false">{settings:tabs:article}</a></li>
                    <li class=""><a href="#comment" data-toggle="tab" aria-expanded="false">{settings:tabs:comments}</a></li>
                    <li class=""><a href="#cache" data-toggle="tab" aria-expanded="false">{settings:tabs:caching}</a></li>
                    <li class=""><a href="#statistic" data-toggle="tab" aria-expanded="false">{settings:tabs:statistics}</a></li>
{*                     <li class=""><a href="#click" data-toggle="tab" aria-expanded="false">Click</a></li> *}
                    {if $adminUser.accessLevel eq "developer"}<li class=""><a href="#update_url" data-toggle="tab" aria-expanded="false">{settings:tabs:updateUrl}</a></li>{/if}
                </ul>

                <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="general">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:general:websiteName}</div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[website_name]" value="{$config.website_name}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:general:websiteTheme}</div>
                                    <div class="col-md-6 nopadding_right">{html_options name="settings[theme]" values=$themes output=$themes selected=$config.theme class="form-control select"} </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:regional:websiteLang}</div>
                                    <div class="col-md-6 nopadding_right">
                                        <script type="text/javascript">
                                            lang2charset = {ldelim} {foreach item = charset key = lang from = $languageCharsets name = languageCharsets}
                                            "{$lang}": "{$charset}" {if !$smarty.foreach.languageCharsets.last}, {/if}{/foreach} {rdelim};
                                        </script>

                                        {html_options options=$languageOptions selected=$config.website_language|default:'' name="settings[website_language]" onChange="webLanguageOptionChange(this)" class="form-control select"}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:regional:charset}</div>
                                    <div class="col-md-6 nopadding_right">
                                        {html_options options=$charsetOptions selected=$config.charset|default:'' name="settings[charset]" id="charsetOptions" class="form-control select"}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Язык интерфейса -->
                                    <div class="col-md-6 nopadding_left">{settings:regional:adminLang}</div>
                                    <div class="col-md-6 nopadding_right">
                                        {html_options options=$adminLangs name="settings[admin_language]" selected=$config.admin_language|default:'' class="form-control select"}
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <!-- Формат ввода времени -->
                                    <div class="col-md-6 nopadding_left">{settings:regional:timeFormat}</div>
                                    <div class="col-md-6 nopadding_right">
                                        {html_options options=$timeformats selected=$config.use_24_hours|default:'' name="settings[use_24_hours]" class="form-control select"}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:regional:adjustHours}</div>
                                    <div class="col-md-6 nopadding_right">
                                        {html_options options=$langtimezones name="settings[timezone]" id="timezone" selected=$config.timezone|default:'' class="form-control select"}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:general:websiteDown}</div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="website_down" name="settings[website_down]" value="1" {if $config.website_down}checked{/if}><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:general:websiteDownMsg}</div>
                                    <div class="col-md-6 nopadding_right"><textarea name="settings[maintenance_message]" class="form-control" rows="5">{$config.maintenance_message}</textarea></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:general:listip}
                                        <p>{settings:general:listipInfo} <b>{$ADMINIP}</b></p>
                                    </div>
                                    <div class="col-md-6 nopadding_right"><input type="text" id="listIp" class="form-control" name="settings[listIp]" value="{$config.listIp}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Тестировать сайт на ошибки</label> </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="error_test" name="settings[error_test]" value="1" {if $config.error_test}checked{/if}><span></span>
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
                                    <div class="col-md-6 nopadding">{settings:general:feedbackCaptcha}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" name="settings[feedback_captcha_enabled]" value="1" {if $config.feedback_captcha_enabled}checked{/if}><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Формат ввода времени -->
                                    <div class="col-md-6 nopadding_left">{settings:general:feedbackTypeCaptcha}</div>
                                    <div class="col-md-6 nopadding_right">{html_options options=$captchas name="settings[allow_recaptcha]" selected=$config.allow_recaptcha class="form-control select"}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:general:recaptchaPublicKey}</div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[recaptcha_public_key]" value="{$config.recaptcha_public_key}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">{settings:general:recaptchaSecretKey}</div>
                                    <div class="col-md-6 nopadding_right"><input class="form-control" type="text" name="settings[recaptcha_private_key]" value="{$config.recaptcha_private_key}"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Контактная инф-ция -->
                    <div class="tab-pane" id="contactInfo">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:general:companyName}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[company_name]" value="{$config.company_name}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:general:operatingMode}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[operating_mode]" value="{$config.operating_mode}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:general:address}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[address]" value="{$config.address}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:general:feedbackEmail}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[feedback_email]" value="{$config.feedback_email}"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:general:phone}</div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone]" value="{$config.phone}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:general:phoneTwo}</div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone_two]" value="{$config.phone_two}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:general:phoneThree}</div>
                                    <div class="col-md-6 nopadding"><input class="mask_phone form-control" type="text" name="settings[phone_three]" value="{$config.phone_three}"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/ Контактная инф-ция -->

                    <div class="tab-pane" id="mail">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_transport}</div>
                                    <div class="col-md-6 nopadding">
                                        {html_options options=$mailTransports selected=$config.mail_transport|default:'' name="settings[mail_transport]" class="form-control select"}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_port}</div>
                                    <div class="col-md-6 nopadding">
                                        {html_options options=$ports selected=$config.smtp_port|default:'' name="settings[smtp_port]" id="ports" class="form-control select"}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_secure}</div>
                                    <div class="col-md-6 nopadding">
                                        {html_options options=$secures selected=$config.smtp_secure|default:'' name="settings[smtp_secure]" id="secures" class="form-control select"}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_subject}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_subject]" value="{$config.smtp_subject}"></div>
                                </div>
                            </div> 
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для info@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_email}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email]" value="{$config.email}" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_server}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server]" value="{$config.smtp_server}" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_user}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user]" value="{$config.smtp_user}" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_pass}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass]" value="{$config.smtp_pass}" id="password"></div>
                                </div>   
                                
                            </div>
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для заказа открыток  charitycards@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_email}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email2]" value="{$config.email2}" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_server}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server2]" value="{$config.smtp_server2}" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_user}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user2]" value="{$config.smtp_user2}" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_pass}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass2]" value="{$config.smtp_pass2}" id="password"></div>
                                </div>   
                                
                            </div>
                        </div>
                        <div class="panel panel-default">    
                            <div class="panel-body"> 
                                <h4 class="panel-title" style="margin-bottom: 20px;">Настройки для резюме recruitment@sos-kd.uz</h4> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_email}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[email3]" value="{$config.email3}" placeholder="noreply@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_server}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_server3]" value="{$config.smtp_server3}" placeholder="smtp.example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_user}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[smtp_user3]" value="{$config.smtp_user3}" placeholder="user@example.com"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:mails:smtp_pass}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" autocomplete="off" type="password" name="settings[smtp_pass3]" value="{$config.smtp_pass3}" id="password"></div>
                                </div>   
                                
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="tab-pane" id="telegram">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:telegrams:enabled}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[telegram_send]" value="1" {if $config.telegram_send}checked{/if}><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:telegrams:token}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[telegram_token]" value="{$config.telegram_token}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:telegrams:chatId}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" autocomplete="off" name="settings[telegram_chat_id]" value="{$config.telegram_chat_id}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding" style="padding-top: 60px">{settings:telegrams:howToConnect}</div>
                                    <div class="col-md-6 nopadding text-center">
                                        <p><img src="/admin/assets/images/telegram/telegram-1.jpg" style="width: 250px;"></p>
                                    </div>
                                    <div class="col-md-6 nopadding" style="padding-top: 60px">{settings:telegrams:connectMessage}</div>
                                    <div class="col-md-6 nopadding text-center">
                                        <p><img src="/admin/assets/images/telegram/telegram-2.jpg" style="width: 250px;"></p>
                                    </div>
                                    <div class="col-md-6 nopadding" style="padding-top: 30px">{settings:telegrams:botEnabled}</div>
                                    <div class="col-md-6 nopadding text-center">
                                        <p><img src="/admin/assets/images/telegram/telegram-3.jpg" style="width: 250px;"></p>
                                    </div>
                                    <div class="col-md-6 nopadding" style="padding-top: 0px">{settings:telegrams:doneRight}</div>
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
                                    <div class="col-md-6 nopadding">{settings:article:slider}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[slider]" value="1" {if $config.slider}checked{/if}><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name">Кол-во слайдов на сайте</label> </div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[cont_slide]" value="{if isset($config.cont_slide)}{$config.cont_slide}{/if}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:countContent}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[cont_section]" value="{$config.cont_section}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:counterViewArticle}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[view_enabled]" value="1" {if $config.view_enabled}checked{/if}><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-heading">
                                <h5 class="panel-title">{settings:article:article}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:smallThumbSize}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[small_thumb_width]" value="{$config.small_thumb_width}" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[small_thumb_height]" value="{$config.small_thumb_height}" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:mediumThumbSize}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[medium_thumb_width]" value="{$config.medium_thumb_width}" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[medium_thumb_height]" value="{$config.medium_thumb_height}" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:largeThumbSize}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[large_thumb_width]" value="{$config.large_thumb_width}" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[large_thumb_height]" value="{$config.large_thumb_height}" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:thumbQuality}</div>
                                    <div class="col-md-6 nopadding">{html_options options=$thumbQualityOptions name="settings[thumbnail_quality]" selected=$config.thumbnail_quality class="form-control select"}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:saveOriginalImage}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="save_original_image" name="settings[save_original_image]" value="1" {if $config.save_original_image}checked{/if}><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:keepImageName}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="keep_original_image_name" name="settings[keep_original_image_name]" value="1" {if $config.keep_original_image_name}checked{/if}><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-heading">
                                <h5 class="panel-title">{settings:article:gallery}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:smallThumbSize}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[smallX]" value="{$config.smallX}" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[smallY]" value="{$config.smallY}" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:mediumThumbSize}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[mediumX]" value="{$config.mediumX}" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[mediumY]" value="{$config.mediumY}" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:largeThumbSize}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[bigX]" value="{$config.bigX}" class="form-control"></div>
                                        <div class="col-md-2 nopadding text-center" style="padding-top:5px;"> X </div>
                                        <div class="col-md-5 nopadding"><input type="text" name="settings[bigY]" value="{$config.bigY}" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:article:thumbQuality}</div>
                                    <div class="col-md-6 nopadding">{html_options options=$thumbQualityOptions name="settings[quality]" selected=$config.quality class="form-control select"}</div>
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
                                    <div class="col-md-6 nopadding">{settings:comments:enabledByDefault}</div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_enabled]" value="1" {if $config.comments_enabled}checked{/if}/><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:comments:editorsApprove}</div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_editors_may_approve]" value="1" {if $config.comments_editors_may_approve}checked{/if}/><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:comments:requireCaptcha}</div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_captcha_enabled]" value="1" {if $config.comments_captcha_enabled}checked{/if} /><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:comments:contentModeration}</div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_strip_html]" value="1" {if $config.comments_strip_html}checked{/if} /><span></span></label>
                                            </div>
                                        </div>
                                        <i>{settings:comments:stripTags}</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_convert_links]" value="1" {if $config.comments_convert_links}checked{/if} /><span></span></label>
                                            </div>
                                        </div>
                                        <i>{settings:comments:convertUrls}</i>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:comments:emailConfirmation}</div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_box" style="margin-bottom:10px;">
                                            <label>
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="0" {if $config.comments_email_confirmation_required == 0}checked{/if} /> 
                                                <i style="padding-left: 58px">{settings:comments:noConfirmation}</i>
                                            </label>
                                        </div>
                                        <div class="check_box" style="margin-bottom:10px;">
                                            <label>
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="1" {if $config.comments_email_confirmation_required == 1}checked{/if} /> 
                                                <i style="padding-left: 58px">{settings:comments:confirmationFirstTime}</i>
                                            </label>
                                        </div>
                                        <div class="check_box" style="margin-bottom:10px;">
                                            <label>
                                                <input class="iradio" type="radio" name="settings[comments_email_confirmation_required]" value="2" {if $config.comments_email_confirmation_required == 2}checked{/if} /> 
                                                <i style="padding-left: 58px">{settings:comments:confirmationEachTime}</i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:comments:commentModeration}</div>
                                    <div class="col-md-6 col-xs-12" style="padding-top:3px;">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_must_be_approved]" value="1" {if $config.comments_must_be_approved}checked{/if} /><span></span></label>
                                            </div>
                                        </div>
                                        <i>{settings:comments:manualApprove}</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_whitelist_enabled]" value="1" {if $config.comments_whitelist_enabled}checked{/if} /><span></span></label>
                                            </div>
                                        </div>
                                        <i>{settings:comments:avoidApprove}</i><br><br>
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[comments_blacklist_enabled]" value="1" {if $config.comments_blacklist_enabled}checked{/if} /><span></span></label>
                                            </div>
                                        </div>
                                        <i>{settings:comments:markAsSpam}</i>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:comments:holdComment}</div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[comments_hold_words]" class="form-control" rows="6">{$config.comments_hold_words}</textarea></div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:comments:markComment}</div>
                                    <div class="col-md-6 nopadding"> <textarea name="settings[comments_spam_words]" class="form-control" rows="6">{$config.comments_spam_words}</textarea></div>
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
                                    <div class="col-md-6 nopadding">{settings:miscellaneous:compress}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" id="compress_js_css" name="settings[compress_js_css]" value="1" {if $config.compress_js_css}checked{/if}><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:miscellaneous:extension}</div>
                                    <div class="col-md-6 nopadding">{html_options options=$fileExtension name="settings[file_extension]" selected=$config.file_extension class="form-control select"}</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:miscellaneous:convert}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="convert_filename_to_lowercase" name="settings[convert_filename_to_lowercase]" value="1" {if $config.convert_filename_to_lowercase}checked{/if}>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:miscellaneous:separator}</div>
                                    <div class="col-md-6 nopadding">
                                        {html_options options=$separators name="settings[filename_word_separator]" selected=$config.filename_word_separator class="form-control select"}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:caching:articles}</div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:20px;">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_article]" value="1" id="cache_enabled_article" {if $config.cache_enabled_article}checked{/if}>
                                                <i> {general:enableCachingFor}</i>
											</label>
                                        </div>

                                        <div class="col-md-1 col-xs-2 nopadding">
                                            {html_options options=$cachingTimeOptions name="settings[cache_time_article]" selected=$config.cache_time_article class="form-control select"}
                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            {html_options options=$cachingPeriodOptions name="settings[cache_period_article]" selected=$config.cache_period_article class="form-control select"}
                                        </div>
                                    </div>
                                </div>
                                <!--/ Статьи -->

                                <div class="form-group">
                                    <!--Разделы -->
                                    <div class="col-md-6 nopadding">{settings:caching:sections}</div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:20px;">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_section]" value="1" id="cache_enabled_section" {if $config.cache_enabled_section}checked{/if}>
                                                <i> {general:enableCachingFor} </i>
                                            </label>
                                        </div>
                                        <div class="col-md-1 col-xs-2 nopadding">
                                            {html_options options=$cachingTimeOptions name="settings[cache_time_section]" selected=$config.cache_time_section class="form-control select"}
                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            {html_options options=$cachingPeriodOptions name="settings[cache_period_section]" selected=$config.cache_period_section class="form-control select"}
                                        </div>
                                    </div>
                                </div>
                                <!--/ Разделы -->

                                {*
                                <div class="form-group">
                                    <!--RSS -->
                                    <div class="col-md-6 nopadding">{settings:caching:rss}</div>
                                    <div class="col-md-6 col-xs-12 nopadding">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_rss]" value="1" id="cache_enabled_rss" {if $config.cache_enabled_rss}checked{/if}>
                                                <i>{general:enableCachingFor} </i>
                                            </label>
                                        </div>
                                        <div class="col-md-1 col-xs-2 nopadding">
                                            {html_options options=$cachingTimeOptions name="settings[cache_time_rss]" selected=$config.cache_time_rss class="form-control select"}
                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            {html_options options=$cachingPeriodOptions name="settings[cache_period_rss]" selected=$config.cache_period_rss class="form-control select"}
                                        </div>
                                    </div>
                                </div>
                                <!--/ RSS -->*}

                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:caching:sitemap}</div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:20px;">
                                        <div class="col-md-5 col-xs-12 nopadding check_box_2" style="padding-top:15px;">
                                            <label>
                                                <input class="icheckbox" type="checkbox" name="settings[cache_enabled_sitemap]" value="1" id="cache_enabled_sitemap" {if $config.cache_enabled_sitemap}checked{/if}>
                                                <i>{general:enableCachingFor} </i>
                                            </label>
                                        </div>
                                        <div class="col-md-1 col-xs-2 nopadding">
                                            <select name="settings[cache_time_sitemap]" class="form-control select">
                                                {html_options values=$cachingTimeOptions selected=$config.cache_time_sitemap|default:'' output=$cachingTimeOptions}
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-xs-2 nopadding">
                                            <select name="settings[cache_period_sitemap]" class="form-control select">
                                                {html_options values=$cachingPeriodOptions selected=$config.cache_period_sitemap|default:''}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!--Карта сайта (XML) -->
                                    <div class="col-md-6 nopadding"><label class="field_name"> {settings:caching:clearCache}</label>
                                        <p>Данная опция позволяет очистить кеш шаблонов.</p>
                                    </div>
                                    <div class="col-md-6 col-xs-12 nopadding" style="padding-top:10px;">
                                        <a class="btn btn-primary control-cache" id="status" onclick="clearCache()">{settings:caching:clearCacheAction}</a>
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
                                    <div class="col-md-6 nopadding">{settings:statistics:yandex}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[yandex_metrika]" value="{$config.yandex_metrika}"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:statistics:google}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[google_analytics]" value="{$config.google_analytics}"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:statistics:enable}</div>
                                    <div class="col-md-6 nopadding">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small">
                                                    <input type="checkbox" id="statistics_enabled" name="settings[statistics_enabled]" value="1" {if $config.statistics_enabled}checked{/if}><span></span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--Идентификаторы ботов -->
                                    <div class="col-md-6 nopadding">{settings:statistics:bot}</div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[bot_id_strings]" class="form-control" rows="5">{$config.bot_id_strings}</textarea></div>
                                </div>
                                <!--/ Идентификаторы ботов -->
                                <div class="form-group">
                                    <!--Идентификаторы ботов -->
                                    <div class="col-md-6 nopadding">{settings:statistics:query}</div>
                                    <div class="col-md-6 nopadding"><textarea name="settings[query_fields_strings]" class="form-control" rows="5">{$config.query_fields_strings}</textarea></div>
                                </div>
                                <!--/ Идентификаторы ботов -->

                                <div class="form-group">
                                    <!--Удалить статистические данные -->
                                    <div class="col-md-6 nopadding">{settings:statistics:deleteStats}</div>
                                    <div class="col-md-6 nopadding date">
                                        {html_select_date start_year=2006 month_format="%b" time=$deleteStatsTime field_array="date" prefix="" class="form-control select"}
                                        <input class="btn btn-primary" type="button" onclick="deleteStats();" value="{general:delete}">
                                    </div>
                                </div>
                                <!--/ Удалить статистические данные -->

                            </div>
                        </div>
                    </div>
                    <!--/ Статистика -->

                    <!-- Разное -->
                    {*
                    <div class="tab-pane" id="miscellaneous">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="col-md-6 nopadding"><label class="field_name"> {settings:miscellaneous:separator}</label></div>
                                    <div class="col-md-6 nopadding">
                                        <select class="form-control select" name="settings[filename_word_separator]">
                                            <option value="-">- ({settings:miscellaneous:dash})</option>
                                            <option value="_" {if $config.filename_word_separator eq "_"}selected{/if}>_ ({settings:miscellaneous:underscore})</option>
										</select>
                                    </div>
                                </div>
                                <!--/ Разделитель слов ф имени файла -->
                            </div>
                        </div>
                    </div>
                    *}
                    <!--/ Разное -->
                    
{*
                    <div class="tab-pane" id="click">
                        <div class="panel panel-default" style="margin-bottom: 0px;">        
							<div class="panel-heading"><h5 class="panel-title">Сюда вводится данные аутентификации полученные от CLICK.</h5></div>
							<div class="panel-body"> 
                                <div class="form-group">
                                    <div class="col-md-6 nopadding_left">Активировать оплату с помощью CLICK</div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="check_block_box">
                                            <div class="check_box">
                                                <label class="switch switch-small"><input type="checkbox" name="settings[click_off]" value="1" {if  isset($config.click_off) and $config.click_off eq '1'}checked{/if}><span></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">   
                                    <div class="col-md-6 nopadding_left"><label class="field_name">ID Поставщика (MERCHANT_ID)</label></div>
                                    <div class="col-md-6 nopadding_right">
                                        <input class="form-control" type="text" name="settings[clickuz_merchant_id]" value="{if isset($config.clickuz_merchant_id)}{$config.clickuz_merchant_id}{/if}">
                                    </div>
                                </div>
                                  
                                <div class="form-group">   
                                    <div class="col-md-6 nopadding_left"><label class="field_name">ID Пользователя Поставщика (MERCHANT_USER_ID)</label></div>
                                    <div class="col-md-6 nopadding_right">
                                        <input class="form-control" type="text" name="settings[clickuz_merchant_user_id]" value="{if isset($config.clickuz_merchant_user_id)}{$config.clickuz_merchant_user_id}{/if}">
                                    </div>
                                </div>

                                <div class="form-group">            
                                    <div class="col-md-6 nopadding_left"><label class="field_name">ID сервиса поставщика (SERVICE_ID)</label></div>
                                    <div class="col-md-6 nopadding_right">
                                        <input class="form-control" type="text" name="settings[clickuz_merchant_service_id]" value="{if isset($config.clickuz_merchant_service_id)}{$config.clickuz_merchant_service_id}{/if}">
                                    </div>
                                </div>
                                  
                                <div class="form-group">       
                                    <div class="col-md-6 nopadding_left"><label class="field_name">Секретный ключ (SECRET_KEY)</label></div>
                                    <div class="col-md-6 nopadding_right">
                                        <input class="form-control" type="text" name="settings[clickuz_secret_key]" value="{if isset($config.clickuz_secret_key)}{$config.clickuz_secret_key}{/if}">
                                    </div>
                                </div>     

								
							</div> 	                
			            </div>
			        </div> 
*}
			    
			    
                    <div class="tab-pane" id="update_url">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:updateUrls:oldDomen}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[old_site_url]" value="" placeholder="http://domain.uz/"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 nopadding">{settings:updateUrls:newDomen}</div>
                                    <div class="col-md-6 nopadding"><input class="form-control" type="text" name="settings[site_url]" value="{$config.site_url}" placeholder="http://domain.uz/"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div align="center" class="col-md-12 main main_buttons"><input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; {general:save} &nbsp;" /></div>
        </form>
    </div>
</div>

{include file="footer.tpl"}
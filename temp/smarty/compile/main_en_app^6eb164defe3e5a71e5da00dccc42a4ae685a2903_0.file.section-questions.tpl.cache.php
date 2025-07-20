<?php
/* Smarty version 3.1.33, created on 2025-07-17 12:33:35
  from '/home/soskduz/public_html/themes/app/templates/section-questions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878a74f62e158_61110703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6eb164defe3e5a71e5da00dccc42a4ae685a2903' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-questions.tpl',
      1 => 1667458363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/you-are-here.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878a74f62e158_61110703 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '14987893016878a74f5f3614_93837750';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="questions-wrapper">
    <div class="container">
        <div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
        </div>
        <div class="questions-accordion panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php echo smarty_function_fetch_articles(array('limit'=>50,'assign'=>'sectionQuestions','section'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'type_content'=>'questions'),$_smarty_tpl);?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionQuestions']->value, 'article', false, NULL, 'sectionQuestions', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a role="button" class="collapser" data-href="#prc-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="collapse" data-parent="#accordion"
                                aria-expanded="false">
                                <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</p><i><span></span><span></span></i>
                            </a>
                        </h4>
                    </div>
                    <div id="prc-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
" class="panel-collapse collapsePanel collapse" role="tabpanel">
                        <div class="panel-body text-left p-v-10 text-item"><?php echo $_smarty_tpl->tpl_vars['article']->value['summary'];?>
</div>
                    </div>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

        <div class="faq-form" style="margin-bottom: 20px;">
            <div class="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_ask_question'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            <div class="success-send"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['successfully'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
            <div class="message-send-wait"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_send_loading'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
            <form id="send_question" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/public/send_questions.php" method="POST" enctype="multipart/form-data">

                <?php echo $_smarty_tpl->tpl_vars['csrf_input']->value;?>

                <div class="faq-form ppl-list">
                    <div class="name"></div>
                    <table width="100%" style="border-collapse: collapse;">
                        <tbody>
                        <tr>
                            <td style="border-image: initial;"></td>
                        </tr>
                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_fio'], ENT_QUOTES, 'UTF-8', true);?>

                                        <font color="red">
                                            <span class="form-required starrequired">*</span>
                                        </font>
                                    </label>
                                    <input type="text" class="inputtext" name="name" value="" size="0">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label>Email
                                        <font color="red">
                                            <span class="form-required starrequired">*</span>
                                        </font>
                                    </label>
                                    <input type="text" class="inputtext" name="email" value="" size="0">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_phone'], ENT_QUOTES, 'UTF-8', true);?>
</label>
                                    <input type="text" class="inputtext" name="phone" value="" size="0">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_city'], ENT_QUOTES, 'UTF-8', true);?>

                                        <font color="red">
                                            <span class="form-required starrequired">*</span>
                                        </font>
                                    </label>
                                    <input type="text" class="inputtext" name="city" value="" size="0"></div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="textarea">
                                    <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_your_message'], ENT_QUOTES, 'UTF-8', true);?>
</label>
                                    <textarea name="message" cols="20" rows="5" class="inputtextarea"></textarea>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div id="send-anti-bot">
                                    <strong>Текущий <span style="display:inline;">ye@r</span> <span style="display:none;">month</span> <span style="display:none;">day</span></strong>
                                    <span class="required">*</span>
                                    <input type="hidden" name="anti-bot-a" id="feedback-anti-bot-a" value="<?php echo htmlspecialchars(smarty_modifier_date_format(time(),'%Y'), ENT_QUOTES, 'UTF-8', true);?>
"/>
                                    <input type="text" name="anti-bot-q" id="feedback-anti-bot-q" value="19"/>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <p><span class="red">*</span> - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_required'], ENT_QUOTES, 'UTF-8', true);?>
 </p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'] == 1) {?>
                                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                                <?php }?>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="button"><input type="submit" name="web_form_submit" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['send'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php echo '<script'; ?>
 type="text/javascript">
                    $('.collapser').click(function () {
                        $('.collapsePanel').collapse('hide')
                        $($(this).data('href')).collapse('toggle')
                    })
                <?php echo '</script'; ?>
>
                <?php if ($_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'] == 1) {?>
                    <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js?render=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['recaptcha_public_key'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 type="text/javascript">
                        grecaptcha.ready(function() {
                            grecaptcha.execute(
                                        '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['recaptcha_public_key'], ENT_QUOTES, 'UTF-8', true);?>
',
                                        {action: 'homepage'}
                            ).then(function(token) {
                                console.log('token: ', token);
                                document.getElementById('g-recaptcha-response').value=token;
                            });
                        });
                    <?php echo '</script'; ?>
>
                <?php }?>
            </form>
            <div id="bxdynamic_4enrz3_end" style="display:none"></div>
        </div>

    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

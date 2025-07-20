<?php
/* Smarty version 3.1.33, created on 2025-03-26 12:45:42
  from '/home/soskduz/public_html/admin/templates/subscribe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67e3b0a69a6791_75608724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6e0740fc1ed50d3724e3658b81096e1ddd80a9c' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/subscribe.tpl',
      1 => 1580431634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:tinymce_init.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_67e3b0a69a6791_75608724 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '13517107267e3b0a6991324_36860582';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"subscribe",'title'=>"Рассылка письма"), 0, false);
?>

<div class="page-content-wrap">
    <?php echo '<script'; ?>
>
        function sendSuccessMessage(){ noty({ text: 'Письма отправлены!', layout: 'topRight', type: 'success', timeout: 1500 }) }
        function sendErrorMessage(){ noty({ text: 'Письма не отправлены!', layout: 'topRight', type: 'error', timeout: 1500 }) }
    <?php echo '</script'; ?>
>
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top"><div class="col-md-12 nopadding"><h2>Рассылка письма</h2></div></div>
    </div>
	
    <div class="col-md-12">
        <div class="panel panel-default tabs ">
            <ul class="nav nav-tabs nav-justified"><li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Написать письмо</a></li></ul>
            <div class="panel-body tab-content nopadding">
                <div class="tab-pane active" id="tab1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h5 class="panel-title">Письма рассылаются только зарегистрированным пользователям</h5></div>
                        <div class="panel-body" id="generalPane">
                            <div class="form-group">
                                <label class="field_name">Тема</label>
                                <input class="form-control" type="text" name="subject" id="subscribe_subject"/>
                            </div>
                            <div class="form-group"><textarea id="subscribe_message" name="message" class="description"></textarea> </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 main main_buttons text-center">
            <button class="btn btn-primary" type="submit" id="subscribe_send" >&nbsp; Разослать &nbsp;</button>
        </div>
	</div>
</div>	
	<?php $_smarty_tpl->_subTemplateRender('file:tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

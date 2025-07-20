<?php
/* Smarty version 3.1.33, created on 2025-06-28 21:26:09
  from '/home/soskduz/public_html/admin/templates/users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_686017a1140908_68006457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdc83d0aba253eea42f6f2a1d18694c3c4d30bf3' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/users.tpl',
      1 => 1571729386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686017a1140908_68006457 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '2135429652686017a104ea11_43703983';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"users",'title'=>"Администраторы - Управление"), 0, false);
?>

    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?><span id="savedMessage" onclick="noty({ text: 'Пользователь сохранен.', layout: 'topRight', type: 'success' });"></span><?php }?>
    
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['login_exists'])) {?><span id="loginExistsError" onclick="noty({ text: 'Указанное имя пользователя уже существует.', layout: 'topRight', type: 'error' });"></span><?php }?> 
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['user_not_found'])) {?><span id="userNotFoundError" onclick="noty({ text: 'Пользователь не найден.', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['loginName'])) {?><span id="loginNameError" onclick="noty({ text: 'Введите логин. (только цифры и латинские буквы)', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullName'])) {?><span id="fullNameError" onclick="noty({ text: 'Введите имя и фамилию пользователя.', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['password'])) {?><span id="passwordError" onclick="noty({ text: 'Введите пароль.', layout: 'topRight', type: 'error' });"></span><?php }?> 
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?><span id="notSavedError" onclick="noty({ text: 'Пользователь НЕ сохранен: <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['errors']->value['not_saved'], ENT_QUOTES, 'UTF-8', true);
}?>', layout: 'topRight', type: 'error' });"></span><?php }?> 
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_more_admins'])) {?><span id="noMoreAdminsError" onclick="noty({ text: 'Невозможно удалить или изменить уровень доступа пользователя, т.к. остался всего один администратор.', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['image_not_saved'])) {?><span id="imageNotSavedError" onclick="noty({ text: 'Картинка не добавлена', layout: 'topRight', type: 'error' });"></span><?php }?> 
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['developer_status'])) {?><span id="developerStatusError" onclick="noty({ text: 'У Вас нет прав получить статус разработчика', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_more_developers'])) {?><span id="noMoreDevelopersError" onclick="noty({ text: 'Невозможно удалить или изменить уровень доступа разработчика, т.к. остался всего один разработчик для техподдержки.', layout: 'topRight', type: 'error' });"></span><?php }?>
  
  <?php echo '<script'; ?>
>
    $(document).ready(function () {
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['login_exists'])) {?> $('#loginExistsError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['user_not_found'])) {?> $('#userNotFoundError').click(); <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['loginName'])) {?> $('#loginNameError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullName'])) {?> $('#fullNameError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['password'])) {?> $('#passwordError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?> $('#notSavedError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_more_admins'])) {?> $('#noMoreAdminsError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['image_not_saved'])) {?> $('#imageNotSavedError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['developer_status'])) {?> $('#developerStatusError').click();<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_more_developers'])) {?> $('#noMoreDevelopersError').click();<?php }?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?> $('#savedMessage').click();<?php }?>
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
    <?php echo '</script'; ?>
>
  
  
<div class="page-content-wrap">
<?php if (isset($_smarty_tpl->tpl_vars['action']->value['edit'])) {?>

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
        <div class="col-md-3 col-xs-3 nopadding"><div class="page-title"><?php if (!isset($_smarty_tpl->tpl_vars['user']->value['userId'])) {?><h2>Добавить пользователя</h2><?php } else { ?><h2>Профайл пользователя</h2><?php }?></div></div> 	
			<div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"> </div> 
            </div>
		</div>
	</div>	
	<form action="users.php" method="post" enctype="multipart/form-data" id="user">
		<input type="hidden" name="user[userId]" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value['userId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);
}?>" />
		<input type="hidden" name="action[save]" value="1" />
		
		<div class="page-content-wrap">
            <div class="row">                        
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <?php if (!isset($_smarty_tpl->tpl_vars['user']->value['userId'])) {?>
                            <div class="panel-body"><h3>Добавить пользователя</h3></div>
                        <?php } else { ?>
                            <div class="panel-body"><h3>Редактирование пользователя</h3></div>
                        <?php }?>
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label for="fullName" class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullName'])) {?>fError<?php }?>">Полное имя</label></div>
                                <div class="col-md-9 nopadding_right">
                                    <input class="form-control" autocomplete="off" id="fullName" type="text" name="user[fullName]" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value['fullName'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['fullName'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label for="loginName" class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['loginName'])) {?>fError<?php }?>">Логин</label></div>
                                <div class="col-md-9 nopadding_right">
                                    <input class="form-control" autocomplete="off" id="loginName" type="text" name="user[loginName]" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value['loginName'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['loginName'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                </div>
                            </div>
              
                            <?php if (!isset($_smarty_tpl->tpl_vars['user']->value['userId'])) {?>
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label for="password" class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['password'])) {?>fError<?php }?>">Пароль</label></div>
                                <div class="col-md-9 nopadding_right"><input class="form-control" id="password" type="password" name="user[password]"/></div>
                            </div>
                            <?php } else { ?>
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label for="password" class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['password'])) {?>fError<?php }?>">Новый пароль</label></div>
                                <div class="col-md-9 nopadding_right"><input class="form-control" id="newPassword" type="password" name="user[newPassword]"/></div>
                            </div>
                            <?php }?>
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left">E-mail</div>
                                <div class="col-md-9 nopadding_right">
                                    <input class="form-control" autocomplete="off" id="email" type="text" name="user[email]" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label class="field_name">Уровень доступа</label></div>
                                <div class="col-md-9 nopadding_right"> 
                                    <?php if (isset($_smarty_tpl->tpl_vars['user']->value['accessLevel']) && $_smarty_tpl->tpl_vars['user']->value['accessLevel'] != '') {?>   
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['accessLevels']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['accessLevel'],'id'=>"accessLevel",'name'=>"user[accessLevel]",'class'=>"form-control select",'onchange'=>"accessLevelChange()"),$_smarty_tpl);?>

                                    <?php } else { ?>
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['accessLevels']->value,'id'=>"accessLevel",'name'=>"user[accessLevel]",'class'=>"form-control select",'onchange'=>"accessLevelChange()"),$_smarty_tpl);?>

                                    <?php }?>                                                          
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label class="field_name">Контроль доступа</label></div>
                                <div class="col-md-9 nopadding_right"> 
                                    <div class="check_box" style="margin-bottom: 5px">
                                        <label class="check" id="labelAllow" class="passive">
                                            <input class="icheckbox" type="radio" name="user[permitAllSections]" value="1" id="allow" <?php if (!isset($_smarty_tpl->tpl_vars['user']->value) || $_smarty_tpl->tpl_vars['user']->value['permitAllSections'] == 1) {?>checked<?php }?> />
                                            <i> Разрешить доступ ко всем разделам</i>
                                        </label>
                                    </div>
                                    <div class="check_box">
                                        <label class="check" id="labelDisallow" class="passive">
                                            <input class="iradio" type="radio" name="user[permitAllSections]" value="0" id="disallow" <?php if (isset($_smarty_tpl->tpl_vars['user']->value) && $_smarty_tpl->tpl_vars['user']->value['permitAllSections'] == 0) {?>checked<?php }?> />
                                            <i> Разрешить доступ только к <span onclick="document.getElementById('disallow').checked='true'; openPane('rights')" id="link2rights">выбранным разделам</span></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
              
                            <div class="form-group">
                                <div class="col-md-3 nopadding_left"><label class="field_name">Доступ к разделам</label></div>
                                <?php if (isset($_smarty_tpl->tpl_vars['SECTIONS']->value)) {?>
                                <div class="col-md-9 nopadding_right"> 
                                    <select multiple class="form-control select" name="user[sectionRights][]">
                                        <option value=""></option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECTIONS']->value, 'section', false, NULL, 'sections', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
?> 
                                            <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['sectionId'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if (isset($_smarty_tpl->tpl_vars['user']->value['sectionRights']) && in_array($_smarty_tpl->tpl_vars['section']->value['sectionId'],$_smarty_tpl->tpl_vars['user']->value['sectionRights'])) {?>selected<?php }?> >
                                                <?php if ($_smarty_tpl->tpl_vars['section']->value['level'] > 1) {?>:: <?php } else { ?> <?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                                            </option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
                                    </select> 
                                </div>
                                <?php }?>
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
                                <?php if (isset($_smarty_tpl->tpl_vars['user']->value['hasImage']) && $_smarty_tpl->tpl_vars['user']->value['hasImage'] == '1') {?> 
                                    Фото  
                                    <div class="file-previewzo-obzor" id="imageOptions">
                                        <div class="close fileinput-remove text-right" onclick="return deleteAdminUserImage(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
)" data-toggle="tooltip" data-placement="left" data-original-title="Удалить картинку">×</div>
                                        <div class="file-preview-thumbnails">
                                            <div class="file-preview-frame" id="imageOptions"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="file-preview-image" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
                                            <div id="ajaxStatus"></div>
                                            <span id="deletingStatus"></span>
                                            <span id="errorBlock"></span>
                                        </div>
  							       </div>
                                <?php }?>
                                    <div class=""><input type="file" name="image" id="file-simple" data-preview-file-type="any"></div>
                                </div> 
                            </div>
                
                            <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>

                        </div>
                        
                        <div class="panel-body form-group-separated">
                            <?php if (isset($_smarty_tpl->tpl_vars['totalArticle']->value)) {?>
                            <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Публикаций</label>
                                <div class="col-md-6 col-xs-7"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totalArticle']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
                            </div>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])) {?>
                            <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">E-mail</label>
                                <div class="col-md-6 col-xs-7"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                            </div>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['addedOn'])) {?>
                            <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Зарегистрирован</label>
                                <div class="col-md-6 col-xs-7"><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['addedOn'],"%d.%m.%Y %H:%M"), ENT_QUOTES, 'UTF-8', true);?>
</div>
                            </div>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['fullName'])) {?>
                            <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Полное имя</label>
                                <div class="col-md-6 col-xs-7"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['fullName'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                            </div>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['status']) && $_smarty_tpl->tpl_vars['user']->value['status'] == 0) {?>
                            <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Последняя активность</label>
                                <div class="col-md-6 col-xs-7"><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['eventOn'],"%d.%m.%Y %H:%M"), ENT_QUOTES, 'UTF-8', true);?>
</div>
                            </div>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['status']) && $_smarty_tpl->tpl_vars['user']->value['status'] == 1) {?>
                            <div class="form-group">
                                <label class="col-md-6 col-xs-5 control-label">Статус</label>
                                <div class="col-md-6 col-xs-7">
                                    <?php if (isset($_smarty_tpl->tpl_vars['user']->value['status']) && $_smarty_tpl->tpl_vars['user']->value['status'] == 1) {?> <span style="color: #009688">online</span><?php } else { ?><span style="color: #f10000">offline</span><?php }?>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>        
            </div>
        </div> 
    </form>

    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>

<?php } else { ?>
	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-3 col-xs-3 nopadding"><h2>Администраторы</h2></div>
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"> </div> 
            </div>
            <div class="col-md-3 col-xs-3 nopadding">                                                  
                <div class="pull-right"> 
                    <a class="btn btn-danger" href="users.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="Добавить пользователя"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
	</div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-striped table-actions table-hover" id="users">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Администраторы</th>
                                <th><label for="email" class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['email'])) {?>fError<?php }?>">Email</label></th>
                                <th>Тип</th>
                                <th>Последняя активность</th>
                                <th>Статус</th>
                                <th class="text-center" width="100">Действие</th>
                            </tr>
                        </thead>
                        <?php if ($_smarty_tpl->tpl_vars['adminUsers']->value) {?>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['adminUsers']->value, 'user', false, NULL, 'adminUsers', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>                                    
                            <tr id="user-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                <td class="text-center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td style="padding: 4px 20px">
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value['hasImage'] == 1) {?>
                                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullName'];?>
" width="34" class="img-circle user-img-photo"> &nbsp;
                                    <?php }?>
                                    <a href="users.php?action[edit]=true&user[userId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['fullName'];?>
</a>
                                </td>
                                <td nowrap="nowrap"><?php if ($_smarty_tpl->tpl_vars['user']->value['email'] != '') {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Email не указан<?php }?></td>
                                <td nowrap="nowrap"><?php echo $_smarty_tpl->tpl_vars['user']->value['accessLevel'];?>
</td> 
                                <td nowrap="nowrap"><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['eventOn'],"%d.%m.%Y %H:%M"), ENT_QUOTES, 'UTF-8', true);?>
</td> 
                                <td nowrap="nowrap"><?php if ($_smarty_tpl->tpl_vars['user']->value['status'] == 1) {?> <span style="color: #009688">online</span><?php } else { ?><span style="color: #f10000">offline</span><?php }?></td> 
                                <td class="btn-link-action text-center">
                                    <a class="btn btn-rounded" href="users.php?action[edit]=true&user[userId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
"><span class="fa fa-pen"></span></a>
                                    <a onclick="deleteUser(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
, '<?php echo $_smarty_tpl->tpl_vars['user']->value['fullName'];?>
')" class="btn btn-danger btn-rounded"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="small" colspan="4">Результаты с <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['startIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> по <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['endIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> из <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['totalItems'], ENT_QUOTES, 'UTF-8', true);?>
</b></td>
                                <td align="right" colspan="3">
                                    <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                    <?php if (isset($_smarty_tpl->tpl_vars['pageNums']->value['pages'])) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageNums']->value['pages'], 'number');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['number']->value) {
?>
                						<?php if ($_smarty_tpl->tpl_vars['number']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
                						    <li class="active"><a href="users.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                						<?php } elseif ($_smarty_tpl->tpl_vars['number']->value == '...') {?>
                						    ...
                						<?php } else { ?>
                						    <li><a href="users.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                						<?php }?>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php }?>
                                    </ul>  
                                </td>
                            </tr> 
                        </tfoot>
                        <?php } else { ?>  
                            <tbody><tr class="odd"><td class="data none" colspan="7" align="center">- Не найдено -</td></tr></tbody>
                        <?php }?>   
                    </table>
                </div>                                
            </div>
        </div>                                                  
    </div>
<?php }?>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

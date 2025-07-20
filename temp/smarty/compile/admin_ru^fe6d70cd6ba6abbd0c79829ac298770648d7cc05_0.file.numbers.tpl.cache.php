<?php
/* Smarty version 3.1.33, created on 2025-06-28 21:26:25
  from '/home/soskduz/public_html/admin/templates/numbers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_686017b15b7bf8_67148221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe6d70cd6ba6abbd0c79829ac298770648d7cc05' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/numbers.tpl',
      1 => 1667458363,
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
function content_686017b15b7bf8_67148221 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '652071368686017b14e0104_74792103';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"numbers",'title'=>"Разделы"), 0, false);
?>
<div class="page-content-wrap">

    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?><span id="savedMessage" onclick="noty({ text: 'Раздел «<?php if (isset($_smarty_tpl->tpl_vars['section']->value['name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?>» сохранен.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['deleted'])) {?><span id="deletedMessage" onclick="noty({ text: 'Раздел «<?php if (isset($_smarty_tpl->tpl_vars['section']->value['name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?>» удален.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['sorted'])) {?><span id="sortedMessage" onclick="noty({ text: 'Разделы отсортированы.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?><span id="notSavedError" onclick="noty({ text: 'Раздел «<?php if (isset($_smarty_tpl->tpl_vars['section']->value['name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?>» НЕ сохранен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['section_not_found'])) {?><span id="sectionNotFoundError" onclick="noty({ text: 'Раздел не найден.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?><span id="nameError" onclick="noty({ text: 'Введите название раздела.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName'])) {?><span id="fileNameError" onclick="noty({ text: 'Введите URL раздела.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists'])) {?><span id="fileNameExistsError" onclick="noty({ text: 'Раздел с таким URL уже существует.', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['htaccess'])) {?><span id="htaccessError" onclick="noty({ text: 'Невозможно сохранить файл .htaccess.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['serializations'])) {?><span id="serializationsError" onclick="noty({ text: 'Невозможно сохранить сериальный файл.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameProhibited'])) {?><span id="fileNameProhibitedError" onclick="noty({ text: 'Такое URL запрещен.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameCharacters'])) {?><span id="fileNameCharactersError" onclick="noty({ text: 'URL может состоять только из следующих символов: A-Z a-z 0-9 . , - _', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['sectionType'])) {?><span id="sectionTypeError" onclick="noty({ text: 'Невозможно поменять тип. За разделом закреплены подразделы или контент.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['error_parent_type_content'])) {?><span id="errorParentTypeContent" onclick="noty({ text: 'Тип контента не соответствует основному разделу.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['error_parent_type'])) {?><span id="errorParentType" onclick="noty({ text: 'Раздел не может быть страницей!', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php echo '<script'; ?>
>

        $(document).ready(function () {

            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?> $('#notSavedError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['section_not_found'])) {?> $('#sectionNotFoundError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?> $('#nameError').click(); <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName'])) {?> $('#fileNameError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists'])) {?> $('#fileNameExistsError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['htaccess'])) {?> $('#htaccessError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['serializations'])) {?> $('#serializationsError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameProhibited'])) {?> $('#fileNameProhibitedError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameCharacters'])) {?> $('#fileNameCharactersError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['error_type_content'])) {?> $('#errorTypeContent').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['error_parent_type_content'])) {?> $('#errorParentTypeContent').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['error_parent_type'])) {?> $('#errorParentType').click();<?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?> $('#savedMessage').click(); <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['deleted'])) {?> $('#deletedMessage').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['sorted'])) {?> $('#sortedMessage').click();<?php }?>

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

    <?php echo '</script'; ?>
>
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

    <?php if (isset($_smarty_tpl->tpl_vars['action']->value['edit'])) {?>
        <div class="content-frame" style="margin-bottom:10px;">
            <div class="content-frame-top">
                <div class="col-md-3 nopadding_left"><h2>Разделы</h2></div>
                <div class="col-md-6 content-frame-body-left">
                    <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                    <div class="upload-image alert message" role="alert"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <?php echo '<script'; ?>
>
                $(function () { function e() { alias_touched || $("#alias").val(a()), meta_title_touched || $("#meta_title").val(m()), keywords_touched || $("#keywords").val(i()), description_touched || $("#description").val(t()), fileName_touched || $("#fileName").val(n()) } function a() { return name = $("#name").val() } function m() { return name = $("#name").val() } function i() { return name = $("#name").val() } function t() { return name = $("#name").val() } function n() { return fileName = $("#name").val(), fileName = fileName.replace(/[\s]+/gi, "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['filename_word_separator'], ENT_QUOTES, 'UTF-8', true);?>
"), fileName = l(fileName), fileName = fileName.replace(/[^0-9a-z_\-]+/gi, "").toLowerCase() } function l(e) { for (var a = "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я".split("-"), i = "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya".split("-"), t = "", n = 0, l = e.length; l > n; n++) {
                    var o = e.charAt(n),c = a.indexOf(o);t += c >= 0 ? i[c] : o
                } return t }
                    alias_touched = !0,
                        meta_title_touched = !0,
                        keywords_touched = !0,
                        description_touched = !0,
                        fileName_touched = !0,
                    ($("#alias").val() == a() || "" == $("#alias").val()) && (alias_touched = !1),
                    ($("#meta_title").val() == i() || "" == $("#meta_title").val()) && (meta_title_touched = !1),
                    ($("#keywords").val() == i() || "" == $("#keywords").val()) && (keywords_touched = !1),
                    ($("#description").val() == t() || "" == $("#description").val()) && (description_touched = !1),
                    ($("#fileName").val() == n() || "" == $("#fileName").val()) && (fileName_touched = !1),
                        $("#alias").change( function () { alias_touched = !0 }),
                        $("#meta_title").change( function () { meta_title_touched = !0 }),
                        $("#keywords").change( function () { keywords_touched = !0 }),
                        $("#description").change( function () { description_touched = !0 }),
                        $("#fileName").change( function () { fileName_touched = !0 }),
                        $("#name").keyup( function () { e() })
                });
            <?php echo '</script'; ?>
>

            <form action="numbers.php" method="post" id="section" enctype="multipart/form-data">
                <input type="hidden" name="section[sectionId]" value="<?php if (isset($_smarty_tpl->tpl_vars['section']->value['sectionId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['sectionId'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                <input type="hidden" name="parentId" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['parentId'], ENT_QUOTES, 'UTF-8', true);?>
" />
                <input type="hidden" name="action[save]" value="1" />
                <div class="panel panel-default tabs">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">Основное</a></li>
                    </ul>

                    <div class="panel-body tab-content nopadding">
                        <div class="tab-pane active" id="general">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-6 col-xs-12 nopadding_left">
                                        <div class="col-md-6 col-xs-12 nopadding_left">
                                            <div class="form-group">
                                                <label class="field_name">Тип</label>
                                                <?php if (isset($_smarty_tpl->tpl_vars['section']->value['type'])) {?>
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['types']->value,'selected'=>$_smarty_tpl->tpl_vars['section']->value['type'],'name'=>"section[type]",'class'=>"form-control select",'id'=>"type"),$_smarty_tpl);?>

                                                <?php } else { ?>
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['types']->value,'name'=>"section[type]",'class'=>"form-control select",'id'=>"type"),$_smarty_tpl);?>

                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12 nopadding_right">
                                            <div class="form-group">
                                                <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['error_parent_type_content']) || isset($_smarty_tpl->tpl_vars['errors']->value['error_type_content'])) {?>fError<?php }?>">Тип контента</label>
                                                <?php if (isset($_smarty_tpl->tpl_vars['section']->value['type_content'])) {?>
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['typeContents']->value,'selected'=>$_smarty_tpl->tpl_vars['section']->value['type_content'],'name'=>"section[type_content]",'class'=>"form-control select",'id'=>"type_content"),$_smarty_tpl);?>

                                                <?php } else { ?>
                                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['typeContents']->value,'name'=>"section[type_content]",'class'=>"form-control select",'id'=>"type_content"),$_smarty_tpl);?>

                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="field_name">Статус</label>
                                            <?php if (isset($_smarty_tpl->tpl_vars['section']->value['status'])) {?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'selected'=>$_smarty_tpl->tpl_vars['section']->value['status'],'name'=>"section[status]",'class'=>"form-control select",'id'=>"status"),$_smarty_tpl);?>

                                            <?php } else { ?>
                                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"section[status]",'class'=>"form-control select",'id'=>"status"),$_smarty_tpl);?>

                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-xs-12 nopadding_left">
                                        <div class="form-group">
                                            <input type="hidden" name="section[parentId]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['parentId'], ENT_QUOTES, 'UTF-8', true);?>
"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?>fError<?php }?>">Имя</label>
                                            <input class="form-control" autocomplete="off" id="name" type="text" name="section[name]" value="<?php if (isset($_smarty_tpl->tpl_vars['section']->value['name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileName']) || isset($_smarty_tpl->tpl_vars['errors']->value['fileNameExists']) || isset($_smarty_tpl->tpl_vars['errors']->value['fileNameProhibited']) || isset($_smarty_tpl->tpl_vars['errors']->value['fileNameCharacters'])) {?>fError<?php }?>">URL</label>
                                            <input class="form-control" id="fileName" type="text" name="section[fileName]" value="<?php if (isset($_smarty_tpl->tpl_vars['section']->value['fileName'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['fileName'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="field_name">Альтернативное имя</label>
                                            <input class="form-control" autocomplete="off" id="alias" type="text" name="section[alias]" value="<?php if (isset($_smarty_tpl->tpl_vars['section']->value['alias'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['alias'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
                                        </div>

                                        <input type="hidden" name="section[oldUrl]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"/>

                                        <div class="form-group">
                                            <label class="field_name">Иконка раздела</label>
                                            <input class="form-control" autocomplete="off" id="section_icon" type="text" name="section[icon]" value="<?php if (isset($_smarty_tpl->tpl_vars['section']->value['icon'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['icon'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div align="center" class="col-md-12 main main_buttons">
                    <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Сохранить &nbsp;" /> &nbsp;
                    <a class="btn btn-primary" href="numbers.php<?php if (isset($_smarty_tpl->tpl_vars['parentId']->value)) {?>?parentId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['parentId']->value, ENT_QUOTES, 'UTF-8', true);
}?>">Отменить</a>
                </div>
            </form>
        </div>
    <?php } else { ?>

        <div class="content-frame" style="margin-bottom:10px;">
            <div class="content-frame-top">
                <div class="col-md-3 col-xs-3 nopadding_left"><h2>Разделы</h2></div>
                <div class="col-md-6 col-xs-6 content-frame-body-left"><div id="ajaxStatus" class="alert alert-success col-md-6 info-box-img" role="alert"></div></div>
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
                            <?php if (isset($_smarty_tpl->tpl_vars['sections']->value)) {?>
                                <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sections']->value, 'section', false, NULL, 'sections', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
?>
                                    <tr id="section-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['sectionId'], ENT_QUOTES, 'UTF-8', true);?>
" class="<?php if ($_smarty_tpl->tpl_vars['section']->value['status'] == 'hidden') {?>opacity7<?php }?>">
                                        <td class="text-center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['sectionId'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                        <td  nowrap="nowrap">
                                            <?php if (isset($_smarty_tpl->tpl_vars['section']->value['hasSubsections'])) {?>
                                                <a href="numbers.php?parentId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['sectionId'], ENT_QUOTES, 'UTF-8', true);?>
" style="border-bottom: 1px dashed;"><?php echo htmlspecialchars(smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['section']->value['name']),25), ENT_QUOTES, 'UTF-8', true);?>
</a>
                                            <?php } else { ?>
                                                <?php echo htmlspecialchars(smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['section']->value['name']),25), ENT_QUOTES, 'UTF-8', true);?>

                                            <?php }?>
                                        </td>
                                        <td  nowrap="nowrap"><?php echo htmlspecialchars(smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['section']->value['alias']),25), ENT_QUOTES, 'UTF-8', true);?>
</td>
                                        <td nowrap="nowrap"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['section']->value['fileName'] == 'index') {?>/<?php } else { ?>/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
/<?php }?></a></td>
                                        <td class="" nowrap="nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['typeName'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                        <td class="" nowrap="nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['typeContentName'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                        <td class="btn-link-action" nowrap="nowrap">
                                            <a class="btn btn-rounded" href="numbers.php?action[edit]=true&section[sectionId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['sectionId'], ENT_QUOTES, 'UTF-8', true);
if ($_smarty_tpl->tpl_vars['parentId']->value) {?>&parentId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['parentId']->value, ENT_QUOTES, 'UTF-8', true);
}?>">
                                                <span class="fa fa-pen" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </tbody>
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
<?php $_smarty_tpl->_subTemplateRender('file:tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
>
    var sectionId = '<?php if (isset($_smarty_tpl->tpl_vars['section']->value['sectionId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['sectionId'], ENT_QUOTES, 'UTF-8', true);
}?>';

    $(document).ready(function () {
        Dropzone.autoDiscover = false;
        $("#dZUpload").dropzone({
            url: "numbers.php",
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
        $.post('numbers.php', { id: id, check: ckVal, action: 'menu' }, function(data){
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
        $.post('numbers.php', { id: id, choice: choiceVal, action: 'status' }, function(data){
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
        $.post('numbers.php', { id: id, desc: desc, link: link, action: 'editimage' }, function(data){
            if (data.update == 1){
                $('.gallery-item.item-'+id+' .im_desc').text(desc);
                $('.gallery-item.item-'+id+' .im_link').text(link);
            }

        }, 'json');
    });

<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

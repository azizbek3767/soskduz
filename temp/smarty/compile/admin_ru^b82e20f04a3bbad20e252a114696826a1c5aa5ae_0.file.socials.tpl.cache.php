<?php
/* Smarty version 3.1.33, created on 2025-06-28 21:26:24
  from '/home/soskduz/public_html/admin/templates/socials.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_686017b0a7de20_07955675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b82e20f04a3bbad20e252a114696826a1c5aa5ae' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/socials.tpl',
      1 => 1580050224,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686017b0a7de20_07955675 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '671120921686017b09fb405_65594945';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"socials",'title'=>"Социальные сети"), 0, false);
?>
<div class="page-content-wrap">

    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['errorName'])) {?><span id="nameError" onclick="noty({ text: 'Введите название Социальной сети.', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameEmpty'])) {?><span id="fileNameEmpty" onclick="noty({ text: 'Псевдоним не должен быть пустым:', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameError'])) {?><span id="fileNameError" onclick="noty({ text: '«<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
» Уже существует:', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?><span id="notSavedError" onclick="noty({ text: '«<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
» НЕ сохранен или не были изменены', layout: 'topRight', type: 'error', timeout: 1500 });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?><span id="savedMessage" onclick="noty({ text: '«<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
» сохранен.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?>
    <?php echo '<script'; ?>
>
        $(document).ready(function() {
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['errorName'])) {?>$('#nameError').click(); <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameEmpty'])) {?>$('#fileNameEmpty').click(); <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameError'])) {?>$('#fileNameError').click(); <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?>$('#notSavedError').click(); <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?>$('#savedMessage').click(); <?php }?>
        });
        function deleteSocialMessage() { noty({ text: 'Соц.сеть удалена.', layout: 'topRight', type: 'success', timeout: 1500 }) } 
    <?php echo '</script'; ?>
>

    <?php if (isset($_smarty_tpl->tpl_vars['action']->value['edit'])) {?>
    <div class="content-frame" style="margin-bottom:10px;"><div class="content-frame-top"><div class="col-md-4 nopadding_left">Социальные сети<h2></h2></div></div></div>
    <div class="col-md-12">
        <?php echo '<script'; ?>
>
            $(function () {
                function e() { fileName_touched || $("#fileName").val(n()) }
                function n() { return fileName = $("#name").val(), fileName = fileName.replace(/[\s]+/gi, "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['filename_word_separator'], ENT_QUOTES, 'UTF-8', true);?>
"), fileName = l(fileName), fileName = fileName.replace(/[^0-9a-z_\-]+/gi, "").toLowerCase() }
                function l(e) { for (var a = "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я".split("-"), i = "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya".split("-"), t = "", n = 0, l = e.length; l > n; n++) { var o = e.charAt(n),c = a.indexOf(o);t += c >= 0 ? i[c] : o } return t }
                fileName_touched = !0, ($("#fileName").val() == n() || "" == $("#fileName").val()) && (fileName_touched = !1), $("#fileName").change( function () { fileName_touched = !0 }), $("#name").keyup( function () { e() })
            });
        <?php echo '</script'; ?>
>
        <form action="socials.php" method="post" id="social">
            <input type="hidden" name="social[socialId]" value="<?php if (isset($_smarty_tpl->tpl_vars['social']->value['socialId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['socialId'], ENT_QUOTES, 'UTF-8', true);
}?>" />
            <div class="panel panel-default tabs ">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#status" data-toggle="tab" aria-expanded="true">Социальные сети</a></li>
                </ul>
                <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="status">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"> Все поля, отмеченные звездочкой (<span class="fError">*</span>), должны быть заполнены.</h5>
                            </div>
                            <div class="panel-body" id="generalPane">
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['errorName'])) {?>fError<?php }?>">Название</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" id="name" type="text" name="social[name]" value="<?php if (isset($_smarty_tpl->tpl_vars['social']->value['name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?>" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fileNameEmpty']) || isset($_smarty_tpl->tpl_vars['errors']->value['fileNameError'])) {?>fError<?php }?>">Псевдоним</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" id="fileName" type="text" name="social[fileName]" value="<?php if (isset($_smarty_tpl->tpl_vars['social']->value['fileName'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['fileName'], ENT_QUOTES, 'UTF-8', true);
}?>" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">Иконка</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" id="icon" type="text" name="social[icon]" value="<?php if (isset($_smarty_tpl->tpl_vars['social']->value['icon'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['icon'], ENT_QUOTES, 'UTF-8', true);
}?>" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">Ссылка</label></div>
                                    <div class="col-md-9 nopadding_right"><input class="form-control" autocomplete="off" id="url" type="text" name="social[url]" value="<?php if (isset($_smarty_tpl->tpl_vars['social']->value['url'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['url'], ENT_QUOTES, 'UTF-8', true);
}?>" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 nopadding_left"><label class="field_name">Статус</label></div>
                                    <div class="col-md-9 nopadding_right">
                                        <?php if (isset($_smarty_tpl->tpl_vars['social']->value['status'])) {?>
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"social[status]",'selected'=>$_smarty_tpl->tpl_vars['social']->value['status'],'class'=>"form-control select"),$_smarty_tpl);?>

                                        <?php } else { ?>
                                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'name'=>"social[status]",'class'=>"form-control select"),$_smarty_tpl);?>

                                        <?php }?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 main main_buttons text-center">
                <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Сохранить &nbsp;" />
                <a class="btn btn-primary" href="socials.php">Отменить</a>
            </div>
        </form>
    </div>

    <?php } else { ?>

    <div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">
            <div class="col-md-4 nopadding_left"><h2>Социальные сети</h2></div>
            <div class="col-md-4 content-frame-body-left"><div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"> </div></div>
            <div class="col-md-4 nopadding_right"><div class="pull-right"> <a class="btn btn-danger" href="socials.php?action[edit]=true" data-original-title="Добавить"><i class="fa fa-plus"></i></a></div></div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-striped table-actions table-hover" id="socials">
                        <thead>
                            <tr>
                                <th>Социальные сети</th>
                                <th>Ссылка</th>
                                <th class="text-center">Статус</th>
                                <th>Действие</th>
                            </tr>
                        </thead>

                        <?php if (isset($_smarty_tpl->tpl_vars['socials']->value)) {?>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['socials']->value, 'social', false, NULL, 'socials', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['social']->value) {
?>
                                    <tr id="social-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['socialId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        <td class="" width="100%"><?php echo $_smarty_tpl->tpl_vars['social']->value['name'];?>
</td>
                                        <td class="" align="left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                        <td style="" class="" align="center"><?php echo $_smarty_tpl->tpl_vars['social']->value['status'];?>
</td>
                                        <td class="btn-link-action text-center">
                                            <a class="btn btn-rounded" href="socials.php?action[edit]=true&social[socialId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['socialId'], ENT_QUOTES, 'UTF-8', true);?>
"><span class="fa fa-pen"></span></a>
                                            <a class="btn btn-danger btn-rounded" onclick="deleteSocial(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social']->value['socialId'], ENT_QUOTES, 'UTF-8', true);?>
, '<?php echo $_smarty_tpl->tpl_vars['social']->value['name'];?>
');"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['pageNums']->value['pages'])) {?>
                                            <div class="pull-left">Результаты с <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['startIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> по <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['endIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> из <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['totalItems'], ENT_QUOTES, 'UTF-8', true);?>
</b></div>
                                            <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageNums']->value['pages'], 'number');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['number']->value) {
?>
                                                    <?php if ($_smarty_tpl->tpl_vars['number']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
                                                        <li class="active"><a href="socials.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['number']->value == '...') {?>
                                                        ...
                                                    <?php } else { ?>
                                                        <li><a href="socials.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                                    <?php }?>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </ul>
                                        <?php }?>
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

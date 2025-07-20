<?php
/* Smarty version 3.1.33, created on 2025-03-24 16:30:12
  from '/home/soskduz/public_html/admin/templates/from_abroad.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67e14244d03b03_33327598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '067ddeedce1858a12e9f2e7a77194235102ec367' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/from_abroad.tpl',
      1 => 1605167972,
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
function content_67e14244d03b03_33327598 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '142829843567e14244c731c9_14449371';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"from_abroad",'title'=>"Реквизиты: Из-за границы"), 0, false);
?>
<div class="page-content-wrap">

    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?><span id="accessDeniedError" onclick = "noty({ text: 'Введите название.', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?><span id="titleError" onclick = "noty({ text: 'Псевдоним не должен быть пустым:', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?><span id="notSavedError" onclick = "noty({ text: '«<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['from_abroad']->value['fullName'], ENT_QUOTES, 'UTF-8', true);?>
» Уже существует:', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['no_sections'])) {?><span id="noSectionsError" onclick = "noty({ text: '«<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['from_abroad']->value['actualAddress'], ENT_QUOTES, 'UTF-8', true);?>
» НЕ сохранен или не были изменены', layout: 'topRight', type: 'error' });"></span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullName'])) {?><span id="fullNameError" onclick = "noty({ text: '«<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['from_abroad']->value['fullName'], ENT_QUOTES, 'UTF-8', true);?>
» Уже существует:', layout: 'topRight', type: 'error' });"></span><?php }?>

    <?php echo '<script'; ?>
>

        $(document).ready(function () {

            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['access_denied'])) {?> $('#accessDeniedError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['name'])) {?> $('#titleError').click(); <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['not_saved'])) {?> $('#notSavedError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['payment_not_found'])) {?> $('#paymentNotFoundError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullName'])) {?> $('#fullNameError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullNameExists'])) {?> $('#fullNameExistsError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullNameProhibited'])) {?> $('#fullNameProhibitedError').click();<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullNameCharacters'])) {?> $('#fullNameCharactersError').click();<?php }?>

        });
        function deletePaymentMessage(){ noty({ text: 'Удалена.',layout: 'topRight',type: 'success' }) }

    <?php echo '</script'; ?>
>
    <?php if (isset($_smarty_tpl->tpl_vars['action']->value['edit'])) {?>
        <?php echo '<script'; ?>
>
            
            $(function () {function e() {
                fullName_touched || $("#fullName").val(n())
            }
                function m() {
                    return name = $("#name").val()
                }
                function n() {
                    return fullName = $("#name").val(),
                        fullName = fullName.replace(/[\s]+/gi, "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['fullName_word_separator'], ENT_QUOTES, 'UTF-8', true);?>
"),
                        fullName = l(fullName), fullName = fullName.replace(/[^0-9a-z_\-]+/gi, "").toLowerCase()
                }
                function l(e) {
                    for (var a = "А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я".split("-"), i = "A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya".split("-"), t = "", n = 0, l = e.length; l > n; n++) {
                        var o = e.charAt(n),c = a.indexOf(o);t += c >= 0 ? i[c] : o

                    }
                    return t
                }
                fullName_touched = !0,

                ($("#fullName").val() == n() || "" == $("#fullName").val()) && (fullName_touched = !1),
                    $("#fullName").change(function () {fullName_touched = !0}),
                    $("#name").keyup(function () {e()})});
            
        <?php echo '</script'; ?>
>
        <div class="content-frame" style="margin-bottom:10px;">
            <div class="content-frame-top">
                <div class="col-md-3 col-xs-3 nopadding_left"><h2>Реквизиты: Из-за границы</h2></div>
                <div class="col-md-6 col-xs-6 content-frame-body-left">
                    <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"></div>
                </div>
            </div>
        </div>

        <form action="from_abroad.php" method="post" id="payment" enctype="multipart/form-data">
            <input type="hidden" name="payment[paymentId]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['paymentId'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
            <input type="hidden" name="action[save]" value="1" />
            <div class="col-md-12">
                <div class="panel panel-default tabs">
                    <div class="panel-body tab-content nopadding">
                        <div class="tab-pane active" id="general">
                            <div class="panel panel-default" style="margin-bottom: 0px;">
                                <div class="panel-body">
                                    <div class="col-md-12">

                                        <div class="col-md-6 nopadding_left">
                                            <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['fullName'])) {?>fError<?php }?>">Полное наименование</label>
                                                <input class="form-control" autocomplete="off" id="fullName" type="text" name="payment[fullName]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['fullName'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['fullName'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
                                            </div>
                                            <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['actualAddress'])) {?>fError<?php }?>">Фактический адрес</label>
                                                <input class="form-control" autocomplete="off" id="actualAddress" type="text" name="payment[actualAddress]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['actualAddress'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['actualAddress'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
                                            </div>
                                            <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['legalAddress'])) {?>fError<?php }?>">Юридический адрес</label>
                                                <input class="form-control" autocomplete="off" id="legalAddress" type="text" name="payment[legalAddress]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['legalAddress'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['legalAddress'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                            </div>
                                            <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['inn'])) {?>fError<?php }?>">Инн</label>
                                                <input class="form-control" autocomplete="off" id="inn" type="text" name="payment[inn]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['inn'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['inn'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                            </div>
                                            <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['bank'])) {?>fError<?php }?>">Банк</label>
                                                <input class="form-control" autocomplete="off" id="bank" type="text" name="payment[bank]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['bank'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['bank'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                            </div>
                                            <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['rs'])) {?>fError<?php }?>">Р/с</label>
                                                <input class="form-control" autocomplete="off" id="rs" type="text" name="payment[rs]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['rs'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['rs'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                            </div>
                                            <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['mfo'])) {?>fError<?php }?>">МФО</label>
                                                <input class="form-control" autocomplete="off" id="mfo" type="text" name="payment[mfo]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['mfo'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['mfo'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                            </div>
                                            <div class="form-group"><label class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['oked'])) {?>fError<?php }?>">ОКЕД</label>
                                                <input class="form-control" autocomplete="off" id="oked" type="text" name="payment[oked]" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['oked'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['oked'], ENT_QUOTES, 'UTF-8', true);
}?>" />
                                            </div>
                                        </div>
                               
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-12 main main_buttons text-center">
                <input class="btn btn-primary" type="submit" name="action[save]" value="&nbsp; Сохранить &nbsp;" onclick="document.getElementById('payment').target='_self'; document.getElementById('payment').action='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value != '') {?>/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>/from_abroad.php?<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}?>'" /> &nbsp;
                <a class="btn btn-primary" href="from_abroad.php?<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}?>">Отменить</a>
            </div>
        </form>

    <?php } else { ?>


        <div class="content-frame" style="margin-bottom:10px;">
            <div class="content-frame-top">
                <div class="col-md-6 col-xs-6 nopadding_left"><h2>Реквизиты: Из-за границы</h2></div>
                <div class="col-md-6 col-xs-6 nopadding_right">
                    <div class="pull-right">
                        <a class="btn btn-danger" href="from_abroad.php?action[edit]=true" data-toggle="tooltip" data-placement="left" data-original-title="Добавить"><i class="fa fa-plus"></i></a>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions table-hover" id="from_abroad">
                            <thead>
                            <tr>
                                <th width="50">Id</th>
                                <th>Название</th>
                                <th width="100">Статус</th>
                                <th width="140">Действие</th>
                            </tr>
                            </thead>

                            <?php if (isset($_smarty_tpl->tpl_vars['abroad_requisits']->value)) {?>
                                <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['abroad_requisits']->value, 'payment', false, NULL, 'from_abroad', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->value) {
?>
                                    <tr id="payment-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        <td style="line-height: 58px;" class="text-center" nowrap="nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);?>
</td>

                                        <td style="line-height: 58px;" width="100%"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></td>

                                        <td style="line-height: 58px;min-width: 120px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['statusName'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                        <td class="btn-link-action text-center">
                                            <a class="btn btn-rounded" href="from_abroad.php?action[edit]=true&payment[paymentId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);?>
&page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);?>
"><span class="fa fa-pen"></span></a>
                                            <a class="btn btn-danger btn-rounded" onclick="deletePayment(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['paymentId'], ENT_QUOTES, 'UTF-8', true);?>
, '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
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
                                        <div class="pull-left">Результаты с <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['startIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> по <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['endIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> из <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['totalItems'], ENT_QUOTES, 'UTF-8', true);?>
</b></div>
                                        <?php if (isset($_smarty_tpl->tpl_vars['pageNums']->value['pages'])) {?>
                                            <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageNums']->value['pages'], 'number');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['number']->value) {
?>
                                                    <?php if ($_smarty_tpl->tpl_vars['number']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
                                                        <li class="active"><a href="from_abroad.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['number']->value == '...') {?>
                                                        ...
                                                    <?php } else { ?>
                                                        <li><a href="from_abroad.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
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
                                <tbody><tr class="odd"><td class="data none" colspan="4" align="center">- Не найдено -</td></tr></tbody>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>




<?php $_smarty_tpl->_subTemplateRender('file:tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

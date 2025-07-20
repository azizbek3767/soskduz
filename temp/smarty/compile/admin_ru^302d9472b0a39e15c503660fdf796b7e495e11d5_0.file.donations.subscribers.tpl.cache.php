<?php
/* Smarty version 3.1.33, created on 2025-04-24 15:20:04
  from '/home/soskduz/public_html/admin/templates/donations.subscribers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_680a1054682853_07749981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '302d9472b0a39e15c503660fdf796b7e495e11d5' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/donations.subscribers.tpl',
      1 => 1684157438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_680a1054682853_07749981 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_select_date.php','function'=>'smarty_function_html_select_date',),));
$_smarty_tpl->compiled->nocache_hash = '681339139680a1054612a45_66976845';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"donationSubscribers",'title'=>"Подписки"), 0, false);
?>
<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>Подписки</h2></div>
    </div>
</div>
<div class="clear"></div>
<div class="row">
    <div class="col-md-2">
        <div class="alert alert-info" style="position: relative">
            <h3>Всего поступлений</h3>
            <div style="font-size: 16px"><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totalProfit']->value, ENT_QUOTES, 'UTF-8', true);?>
 сум</b></div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="alert alert-info" style="position: relative">
            <h3>Поступлений за месяц</h3>
            <div style="font-size: 16px"><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['monthProfit']->value, ENT_QUOTES, 'UTF-8', true);?>
 сум</b></div>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-5 text-right">
        <form method="get">
            <div class="input-group" style="display: flex">
                <input type="text" name="search" class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['search']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value, ENT_QUOTES, 'UTF-8', true);
}?>" placeholder="Поиск" autocomplete="off" aria-describedby="basic-addon2">
                <button type="submit" class="btn btn-primary" id="basic-addon2">Поиск</button>
            </div>
        </form>
    </div>
</div>

<div class="form-group main" style="margin-top: 15px">
    <form method="get">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group" style="display: flex">
                    <select name="status" class="form-control select">
                        <option value="">Статус</option>
                        <option value="active" <?php if (isset($_smarty_tpl->tpl_vars['status']->value) && $_smarty_tpl->tpl_vars['status']->value == 'active') {?>selected<?php }?>>Active</option>
                        <option value="inactive" <?php if (isset($_smarty_tpl->tpl_vars['status']->value) && $_smarty_tpl->tpl_vars['status']->value == 'inactive') {?>selected<?php }?>>Inactive</option>
                    </select>
                    <select name="amount" class="form-control select">
                        <option value="">Сумма</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['filterAmounts']->value, 'amount');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['amount']->value) {
?>
                            <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value['amount'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if (isset($_smarty_tpl->tpl_vars['requestAmount']->value) && $_smarty_tpl->tpl_vars['requestAmount']->value == $_smarty_tpl->tpl_vars['amount']->value['amount']) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value['amount'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 date text-right">
                <?php echo smarty_function_html_select_date(array('start_year'=>2023,'month_format'=>"%b",'time'=>strtotime($_smarty_tpl->tpl_vars['dateStart']->value),'field_array'=>"newDateStart",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>
 &nbsp;-&nbsp;
                <?php echo smarty_function_html_select_date(array('start_year'=>2023,'month_format'=>"%b",'time'=>strtotime($_smarty_tpl->tpl_vars['dateEnd']->value),'field_array'=>"newDateEnd",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>

                <input class="btn btn-warning" type="submit" value="Показать" />
            </div>
        </div>
    </form>
</div>

<div class="clear"></div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body panel-body-table">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-actions">
                        <thead>
                        <tr>
                            <th class="text-center">Дата</th>
                            <th class="text-center">ФИО</th>
                            <th class="text-center">Телефон</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">ID карты</th>
                            <th class="text-center">Сумма</th>
                            <th class="text-center">Статус</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($_smarty_tpl->tpl_vars['subscribers']->value)) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subscribers']->value, 'subscriber');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subscriber']->value) {
?>
                                <tr class="">
                                    <td nowrap="nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subscriber']->value['subscription_date'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subscriber']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subscriber']->value['phone'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subscriber']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subscriber']->value['uzcard_id'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subscriber']->value['amount'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                    <td>
                                        <?php if (($_smarty_tpl->tpl_vars['subscriber']->value['is_active'])) {?>
                                            <span style="color: #009688">active</span>
                                        <?php } else { ?>
                                            <span style="color: #f10000">inactive</span>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php if (($_smarty_tpl->tpl_vars['subscriber']->value['is_active'])) {?>
                                            <form method="POST">
                                                <input type="hidden" name="action" value="stopsubscription">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subscriber']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите отмену подписки!')">Остановить подписку</button>
                                            </form>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <tr>
                                <td colspan="8">
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
                                                    <li class="active"><a
                                                                href="donation.subscribers.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['search']->value)) {?>&search=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['amount']->value)) {?>&amount=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value, ENT_QUOTES, 'UTF-8', true);
}?>"
                                                                class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                                <?php } else { ?>
                                                    <li><a href="donation.subscribers.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['search']->value)) {?>&search=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>&status=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['amount']->value)) {?>&amount=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value, ENT_QUOTES, 'UTF-8', true);
}?>" class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
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
                        <?php } else { ?>
                            <tr class="odd"><td class="data none" colspan="8" align="center">- Не найдено -</td></tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

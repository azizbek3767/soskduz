<?php
/* Smarty version 3.1.33, created on 2025-03-26 12:45:45
  from '/home/soskduz/public_html/admin/templates/subscribers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67e3b0a9bf54f2_21451313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a187f182057fd81f8e2f0d918b2bb702fc5e2def' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/subscribers.tpl',
      1 => 1580397144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_67e3b0a9bf54f2_21451313 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '54546913067e3b0a9bc3343_66384583';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"subscribers",'title'=>"Подписчики - Управление"), 0, false);
echo '<script'; ?>
>
function deleteUserMessage(){ noty({ text: 'Подписчик удален', layout: 'topRight', type: 'success' }) }           
<?php echo '</script'; ?>
>
    
<div class="page-content-wrap">

	<div class="content-frame" style="margin-bottom:10px;">
        <div class="content-frame-top">                        
            <div class="col-md-3 col-xs-3 nopadding"><h2>Подписчики</h2></div>
            <div class="col-md-6 col-xs-6 content-frame-body-left">
                <div id="ajaxStatus" class="alert alert-warning col-md-6 info-box-img" role="alert"> </div> 
            </div>
            <div class="col-md-3 col-xs-3 nopadding">                                                  
                <div class="pull-right"> 
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
                                <th width="40">ID</th>
                                <th><label for="email" class="field_name <?php if (isset($_smarty_tpl->tpl_vars['errors']->value['email'])) {?>fError<?php }?>">Email</label></th>
                                <th width="100">Дата подписки</th>
                                <th class="text-center" width="100">Удалить</th>
                            </tr>
                        </thead>
                        <?php if ($_smarty_tpl->tpl_vars['subscribeUsers']->value) {?>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subscribeUsers']->value, 'user', false, NULL, 'subscribeUsers', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>                                    
                            <tr id="user-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
">
                                <td class="text-center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td nowrap="nowrap"><?php if ($_smarty_tpl->tpl_vars['user']->value['email'] != '') {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Email не указан<?php }?></td>  
                                <td nowrap="nowrap"><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['addedOn'],"%d.%m.%Y %H:%M"), ENT_QUOTES, 'UTF-8', true);?>
</td> 
                                <td class="btn-link-action text-center">
                                    <a onclick="deleteSubscribe(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
, '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
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
                                <td align="right" colspan="4">
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
                						    <li class="active"><a href="subscribers.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                						<?php } elseif ($_smarty_tpl->tpl_vars['number']->value == '...') {?>
                						    ...
                						<?php } else { ?>
                						    <li><a href="subscribers.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
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


</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

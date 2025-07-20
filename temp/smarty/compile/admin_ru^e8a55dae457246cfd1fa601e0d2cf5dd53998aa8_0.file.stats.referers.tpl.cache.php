<?php
/* Smarty version 3.1.33, created on 2025-06-28 21:26:51
  from '/home/soskduz/public_html/admin/templates/stats.referers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_686017cb0bf143_70278613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8a55dae457246cfd1fa601e0d2cf5dd53998aa8' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/stats.referers.tpl',
      1 => 1571729386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:stats.type-selector.tpl' => 1,
    'file:stats.date-selector.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686017cb0bf143_70278613 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.cycle.php','function'=>'smarty_function_cycle',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '868057517686017cb0776c2_01509215';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"referers",'title'=>"Источники - Статистика"), 0, false);
?>
<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>Источники</h2></div>                           
    </div>
</div>
<div class="form-group main">                                        
    <div class="col-md-12">
        <?php $_smarty_tpl->_subTemplateRender("file:stats.type-selector.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('action'=>"stats.visitors.php"), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:stats.date-selector.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
<div class="clear"></div>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body panel-body-table">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-actions">
                    <thead>
                        <tr>
                            <th class="text-center" width="100">Посетители</th>
                            <th class="text-center">Источник</th>
                        </tr>
                    </thead>
                    <tbody>                                            
                    <?php if ($_smarty_tpl->tpl_vars['referers']->value) {?>
                	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['referers']->value, 'referer', false, NULL, 'referers', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['referer']->value) {
?>
                	<?php echo smarty_function_cycle(array('values'=>'odd,even','assign'=>'class'),$_smarty_tpl);?>

                	<tr>
                		<td class="data action" onclick="document.location='stats.visitors.php?domain=<?php echo htmlspecialchars((($tmp = @rawurlencode($_smarty_tpl->tpl_vars['referer']->value['domain']))===null||$tmp==='' ? 'unknown' : $tmp), ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>&filterTypeId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);
}?>'" align="center">
	                		<a href="stats.visitors.php?domain=<?php echo htmlspecialchars((($tmp = @rawurlencode($_smarty_tpl->tpl_vars['referer']->value['domain']))===null||$tmp==='' ? 'unknown' : $tmp), ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>&filterTypeId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);
}?>">
		                		<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['referer']->value['totalVisitors'], ENT_QUOTES, 'UTF-8', true);?>

		                	</a>
		               	</td>
                		<td class="data" width="100%"><?php echo htmlspecialchars((($tmp = @smarty_modifier_truncate($_smarty_tpl->tpl_vars['referer']->value['website'],40))===null||$tmp==='' ? '(неизвестный)' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</td>
                	</tr>
                	<?php if (isset($_smarty_tpl->tpl_vars['referer']->value['isSplit'])) {?>
                		</table></td><td width="2%"></td><td valign="top" width="49%">
                		<table cellpadding="5" cellspacing="0" width="100%">
                		<tr class="header">
                			<th class="data small">Посетители</th>
                			<th class="data small">Источник</th>
                		</tr>
                	<?php }?>
                	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    
                   	<tr>
                    <table cellpadding="0" cellspacing="0" width="100%"><tr>
                 	 <td class="small">Результаты с <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['startIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> по <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['endIteration'], ENT_QUOTES, 'UTF-8', true);?>
</b> из <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNums']->value['totalItems'], ENT_QUOTES, 'UTF-8', true);?>
</b></td>
                     <td align="right">
          		     <?php if (isset($_smarty_tpl->tpl_vars['pageNums']->value['pages'])) {?>             
                        <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                        
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageNums']->value['pages'], 'number');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['number']->value) {
?>
                                <?php if ($_smarty_tpl->tpl_vars['number']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
                                    <li class="active"><a href="stats.referers.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>&filterTypeId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);
}?>" class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                <?php } else { ?>
                				    <li><a href="stats.referers.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>&filterTypeId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);
}?>" class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                <?php }?>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            
                        </ul>  
                    <?php }?>
                    </tr></table>
                   	</td></tr>
                    <?php } else { ?>
                   	<tr class="odd"><td class="data none" colspan="3" align="center">- Не найдено -</td></tr>
                   	<tr><td colspan="3">&nbsp;</td></tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>                                
        </div>
    </div>
</div>





<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

<?php
/* Smarty version 3.1.33, created on 2025-06-28 21:26:49
  from '/home/soskduz/public_html/admin/templates/stats.visitors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_686017c9a2b4c1_94932483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84cf43d9b097699b8fba1620ec0b16b4601cb3fb' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/stats.visitors.tpl',
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
function content_686017c9a2b4c1_94932483 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '180668625686017c99e98b5_04040980';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"visitors",'title'=>"Посетители - Статистика"), 0, false);
?>
<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>Посетители</h2></div>                           
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
                            <th class="text-center">Первый визит</th>
                            <th class="text-center">Источник</th>
                            <th class="text-center">Просмотры</th>
                            <th class="text-center">Просмотреть</th>
                        </tr>
                    </thead>
                    <tbody>                                            
                    <?php if (!empty($_smarty_tpl->tpl_vars['visitors']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['visitors']->value, 'visitor');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['visitor']->value) {
?>
                            <tr class="">
                                <td nowrap="nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['visitor']->value['firstVisitOn'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td class="" width="100%">
                                    <?php if (isset($_smarty_tpl->tpl_vars['visitor']->value['refererWebsite'])) {?>
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['visitor']->value['referer'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['visitor']->value['refererWebsite'],30), ENT_QUOTES, 'UTF-8', true);?>
</a>
                                        <?php if (isset($_smarty_tpl->tpl_vars['visitor']->value['searchPhrase'])) {?> (<?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['visitor']->value['searchPhrase'],50), ENT_QUOTES, 'UTF-8', true);?>
)<?php }?>
                                    <?php } elseif (isset($_smarty_tpl->tpl_vars['visitor']->value['refererUrl'])) {?>
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['visitor']->value['refererUrl'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['visitor']->value['refererUrl'],80), ENT_QUOTES, 'UTF-8', true);?>
</a>
                                    <?php }?>
                                </td>
                                <td class="data action" style="cursor: pointer;" onClick="window.open('stats.visitor.php?visitorId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['visitor']->value['visitorId'], ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>&filterTypeId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);
}?>')" align="center"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['visitor']->value['totalVisits'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                                <td class="data action" style="cursor: pointer;" onClick="window.open('stats.visitor.php?visitorId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['visitor']->value['visitorId'], ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>&filterTypeId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);
}?>')" align="center"><span class="fa fa-eye"></span></td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
                                                <li class="active"><a href="stats.visitors.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>&filterTypeId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['domain']->value)) {?>&domain=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['domain']->value, ENT_QUOTES, 'UTF-8', true);
}?>" class="pageNum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                            <?php } else { ?>
                                                <li><a href="stats.visitors.php?page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['number']->value, ENT_QUOTES, 'UTF-8', true);
if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>&filterTypeId=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);
}
if (isset($_smarty_tpl->tpl_vars['domain']->value)) {?>&domain=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['domain']->value, ENT_QUOTES, 'UTF-8', true);
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
                   	    <tr class="odd"><td class="data none" colspan="4" align="center">- Не найдено -</td></tr>
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

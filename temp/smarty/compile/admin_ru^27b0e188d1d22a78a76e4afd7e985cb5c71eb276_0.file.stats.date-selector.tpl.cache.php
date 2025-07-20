<?php
/* Smarty version 3.1.33, created on 2025-06-28 21:26:52
  from '/home/soskduz/public_html/admin/templates/stats.date-selector.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_686017cc16fe61_16297850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27b0e188d1d22a78a76e4afd7e985cb5c71eb276' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/stats.date-selector.tpl',
      1 => 1571729384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686017cc16fe61_16297850 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_select_date.php','function'=>'smarty_function_html_select_date',),));
$_smarty_tpl->compiled->nocache_hash = '1381943947686017cc15f0e4_17904049';
?>
<div class="col-md-2 text-center">
    <form method="post">
	    <?php if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?><input type="hidden" name="filterTypeId" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);?>
" /><?php }?>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['simplePeriods']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['simplePeriod']->value)===null||$tmp==='' ? "last7days" : $tmp),'name'=>"newSimplePeriod",'onchange'=>"this.form.submit()",'class'=>"form-control select"),$_smarty_tpl);?>

	</form>
</div>
<div class="col-md-8 date text-right">
    <form method="post">
        <?php if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?><input type="hidden" name="filterTypeId" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filterTypeId']->value, ENT_QUOTES, 'UTF-8', true);?>
" /><?php }?>
        <?php echo smarty_function_html_select_date(array('start_year'=>2018,'month_format'=>"%b",'time'=>strtotime($_smarty_tpl->tpl_vars['dateStart']->value),'field_array'=>"newDateStart",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>
 &nbsp;-&nbsp;
        <?php echo smarty_function_html_select_date(array('start_year'=>2018,'month_format'=>"%b",'time'=>strtotime($_smarty_tpl->tpl_vars['dateEnd']->value),'field_array'=>"newDateEnd",'prefix'=>'','class'=>"form-control select"),$_smarty_tpl);?>

        <input class="btn btn-warning" type="submit" value="Показать" />
    </form>
</div>


<?php }
}

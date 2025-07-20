<?php
/* Smarty version 3.1.33, created on 2025-06-28 21:26:52
  from '/home/soskduz/public_html/admin/templates/stats.type-selector.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_686017cc159826_12113723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e99e05053ca767cab4160703291649109824fac' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/stats.type-selector.tpl',
      1 => 1571729386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686017cc159826_12113723 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '1925667692686017cc14e9c6_24149253';
?>
<form method="post" <?php if ($_smarty_tpl->tpl_vars['action']->value) {?>action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>>
    <div class="col-md-2 text-center">
        <?php if (isset($_smarty_tpl->tpl_vars['filterTypeId']->value)) {?>
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['filterTypeOptions']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['filterTypeId']->value)===null||$tmp==='' ? 0 : $tmp),'name'=>"filterTypeId",'onchange'=>"this.form.submit()",'class'=>"form-control select"),$_smarty_tpl);?>

        <?php } else { ?>
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['filterTypeOptions']->value,'name'=>"filterTypeId",'onchange'=>"this.form.submit()",'class'=>"form-control select"),$_smarty_tpl);?>

        <?php }?>

    </div>
</form>
<?php }
}

<?php
/* Smarty version 3.1.33, created on 2025-04-15 14:54:31
  from '/home/soskduz/public_html/admin/templates/serializations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67fe2cd751e595_35668740',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '8961851606719e049be55a27d96e7e762a7e9393' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/serializations.tpl',
      1 => 1571729384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67fe2cd751e595_35668740 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '140839119767fe2cd7516167_31583740';
echo '/*%%SmartyNocache:140839119767fe2cd7516167_31583740%%*/<?php echo \'<?php
\';?>/*/%%SmartyNocache:140839119767fe2cd7516167_31583740%%*/';
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['serializations']->value, 'serialization', false, 'variable');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['variable']->value => $_smarty_tpl->tpl_vars['serialization']->value) {
?>
$<?php echo $_smarty_tpl->tpl_vars['variable']->value;?>
 = <?php echo $_smarty_tpl->tpl_vars['serialization']->value;?>
;
$smarty->assignByRef('<?php echo $_smarty_tpl->tpl_vars['variable']->value;?>
', $<?php echo $_smarty_tpl->tpl_vars['variable']->value;?>
);
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo '/*%%SmartyNocache:140839119767fe2cd7516167_31583740%%*/<?php echo \'?>\';?>/*/%%SmartyNocache:140839119767fe2cd7516167_31583740%%*/';
}
}

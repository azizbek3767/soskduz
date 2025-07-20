<?php
/* Smarty version 3.1.33, created on 2025-04-24 16:44:10
  from '/home/soskduz/public_html/admin/templates/payment_psp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_680a240a59dbe4_56951223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebcba27be29e7bb88fa3edd8e9d7a00693b488e6' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/payment_psp.tpl',
      1 => 1702895073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680a240a59dbe4_56951223 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '134098421680a240a5930a2_71795132';
?>
<div class="col-md-6 nopadding_left">
    <div class="form-group">
	    <label class="field_name">ID Поставщика (VENDOR_ID)</label>
        <input class="form-control" type="text" name="payment[settings][vendor_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['settings']['vendor_id'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>
</div>
<div class="col-md-6 nopadding_right">
    <div class="form-group">
        <label class="field_name">Секретный ключ (SECRET_KEY)</label>
        <input class="form-control" type="text" name="payment[settings][secret_key]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['settings']['secret_key'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>
</div>
<div class="col-md-6 nopadding_left">
    <div class="form-group">
	    <label class="field_name">Callback URL (RETURN_URL)</label>
        <input class="form-control" type="text" name="payment[settings][return_url]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value['settings']['return_url'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>
</div><?php }
}

<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:11:09
  from '/home/soskduz/public_html/themes/app/templates/modules/pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878e85dbb1895_68903484',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb4e8a4056d25ffe8a66d1337ea17df7afc2fb86' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/modules/pagination.tpl',
      1 => 1603439872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6878e85dbb1895_68903484 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17229691816878e85db9dbe5_17579956';
if (isset($_smarty_tpl->tpl_vars['pagination']->value['pages'])) {?>      
	<div class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <ul class="page-numbers-items">
		<?php if (isset($_smarty_tpl->tpl_vars['pagination']->value['previousPage'])) {?>
			<li class="prev-page"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pagination']->value['previousPage']['url'], ENT_QUOTES, 'UTF-8', true);?>
"><i class="icmangle-arrow-down"></i></a></li>
		<?php }?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagination']->value['pages'], 'pageNum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pageNum']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['pageNum']->value['num'] == $_smarty_tpl->tpl_vars['page']->value) {?>
				<li class="active"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNum']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNum']->value['num'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
			<?php } elseif ($_smarty_tpl->tpl_vars['pageNum']->value['num'] == '...') {?>
				<li>...</li>
			<?php } else { ?>
				<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNum']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pageNum']->value['num'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
			<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php if (isset($_smarty_tpl->tpl_vars['pagination']->value['nextPage'])) {?>
			<li class="next-page"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pagination']->value['nextPage']['url'], ENT_QUOTES, 'UTF-8', true);?>
"><i class="icmangle-arrow-down"></i></a></li>
		<?php }?>
		</ul>
	</div>
<?php }
}
}

<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:35:12
  from '/home/soskduz/public_html/themes/app/templates/modules/you-are-here.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878ee009231e9_58780663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '687682cc6c58ee3b27a1bee45fcd729aa99811ba' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/modules/you-are-here.tpl',
      1 => 1580338600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6878ee009231e9_58780663 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '12736265836878ee00910140_76799784';
?>
<div class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8', true);?>
">
	<div class="container">
        <ol class="breadcrumb font-w-6">
        	<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['home'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
        	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionParents']->value, 'navItem', false, NULL, 'navItems', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navItem']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_navItems']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_navItems']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_navItems']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_navItems']->value['total'];
?>
        		<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_navItems']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_navItems']->value['last'] : null)) {?>
        			<?php if (isset($_smarty_tpl->tpl_vars['boldLastItem']->value)) {?>
        				<li class="active"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
        			<?php } elseif (isset($_smarty_tpl->tpl_vars['noLastLink']->value)) {?>
        				<li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</li>
        			<?php } else { ?>
        				<li class="active"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
        			<?php }?>
        		<?php } else { ?>
        			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
        		<?php }?>
        	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
    </div>
</div><?php }
}

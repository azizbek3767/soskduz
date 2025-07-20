<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:34:32
  from '/home/soskduz/public_html/themes/app/templates/modules/product-item-block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878edd80c3852_62195565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99788f2486e9b0646e8dd4eeddf442f1740c9ac4' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/modules/product-item-block.tpl',
      1 => 1581865622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6878edd80c3852_62195565 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.price.php','function'=>'smarty_modifier_price',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '5113071596878edd80a0906_88617938';
?>
<div class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8', true);?>
">
	<div class="charity-item">
		<div class="img-content">
    		<?php if (isset($_smarty_tpl->tpl_vars['postcard']->value['gallery'])) {?>
    		<a href="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['postcard']->value['gallery'], 'gallery', false, NULL, 'gallerys', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration']++;
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration'] : null) == 2) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
big-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value['fileName'], ENT_QUOTES, 'UTF-8', true);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" data-fancybox>
    		    <img src="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['postcard']->value['gallery'], 'gallery', false, NULL, 'gallerys', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration']++;
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration'] : null) == 1) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
medium-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value['fileName'], ENT_QUOTES, 'UTF-8', true);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postcard']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
">
    		</a>
    		<?php }?>
        </div>
		<div class="desc-content">
			<div class="desc">
				<h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postcard']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
				<?php if (isset($_smarty_tpl->tpl_vars['postcard']->value['price'])) {?><h2 style="font-size: 32px;"><?php echo smarty_modifier_price($_smarty_tpl->tpl_vars['postcard']->value['price']);?>
</h2><?php }?> 				<p><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['postcard']->value['summary']),100);?>
</p>
			</div>
		</div>
		<div class="buttons">
			<span class="btn-def-2"><a href="javascript:;" class="btn-addtocart" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postcard']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
" data-action="add_to_cart"><i class="icmshopping-cart-of-checkered-design"></i></a></span>
			<span class="btn-def-3"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postcard']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['more_details'], ENT_QUOTES, 'UTF-8', true);?>
</a></span>
		</div>
	</div>
</div><?php }
}

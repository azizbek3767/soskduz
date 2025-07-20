<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:02:16
  from '/home/soskduz/public_html/themes/app/templates/section.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878e64861fdc0_70829795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '727989783021166e18fecc25efadc5d6899480cd' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section.tpl',
      1 => 1607338361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/you-are-here.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878e64861fdc0_70829795 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '11751059356878e6485fd2a9_22663317';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="waww-article-wrapper waw-page-main">
	<div class="container">
		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
		<?php if (isset($_smarty_tpl->tpl_vars['section']->value['images'])) {?>
			<?php if ($_smarty_tpl->tpl_vars['section']->value['images']['original']['url']) {?>
				<div class="img-content" style="margin-bottom: 40px;"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
" style="max-width: 100%;"></div>
			<?php } elseif ($_smarty_tpl->tpl_vars['section']->value['images']['medium']['url']) {?>
				<div class="img-content" style="margin-bottom: 40px;"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
" style="max-width: 100%;"></div>
			<?php }?>

		<?php }?>
		<div class="desc-content">
    		<?php echo $_smarty_tpl->tpl_vars['section']->value['content'];?>

        </div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

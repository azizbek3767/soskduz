<?php
/* Smarty version 3.1.33, created on 2025-07-16 12:56:07
  from '/home/soskduz/public_html/themes/app/templates/article-boxes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_68775b179ca970_26862348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfee3f220f02b2af635309d699e31e1f1dc77e43' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/article-boxes.tpl',
      1 => 1580513516,
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
function content_68775b179ca970_26862348 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '101526045268775b179c1662_28039432';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['article']->value['title'],'keywords'=>$_smarty_tpl->tpl_vars['article']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['article']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>	
		
<div class="boxes-article-wrapper" style="margin-bottom: 40px">
	<div class="container">
		<div class="desc-content">
			<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
			<?php if (isset($_smarty_tpl->tpl_vars['article']->value['images'])) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
"  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
" style="float: left;margin-right: 20px"><?php }?>
    		<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

		</div>
	</div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

<?php
/* Smarty version 3.1.33, created on 2025-07-17 12:32:36
  from '/home/soskduz/public_html/themes/app/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878a714160a87_34911319',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdf7ab4387e1133d4831054f8e4b508afa010211' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/article.tpl',
      1 => 1580052960,
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
function content_6878a714160a87_34911319 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '8316730876878a71414fb85_12248210';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['article']->value['title'],'keywords'=>$_smarty_tpl->tpl_vars['article']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['article']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="waww-article-wrapper">
	<div class="container">
		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
		<div class="desc-content">
    		<?php if (isset($_smarty_tpl->tpl_vars['article']->value['images'])) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
"  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
" style="float: left;"><?php }?>
    		<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

        </div>
	</div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

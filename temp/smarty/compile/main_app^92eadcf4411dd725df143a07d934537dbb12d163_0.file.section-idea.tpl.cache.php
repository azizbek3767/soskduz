<?php
/* Smarty version 3.1.33, created on 2025-07-17 08:37:50
  from '/home/soskduz/public_html/themes/app/templates/section-idea.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878700e9310c2_57223764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92eadcf4411dd725df143a07d934537dbb12d163' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-idea.tpl',
      1 => 1604229463,
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
function content_6878700e9310c2_57223764 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),1=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),));
$_smarty_tpl->compiled->nocache_hash = '6353828546878700e9155c4_35974700';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="idea-wrapper">
	<div class="container">
		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
		<div class="desc-content"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['section']->value['content'],'/admin/img/','/uploads/files/');?>
</div>
		<div class="idea-statement">
			<?php echo $_smarty_tpl->tpl_vars['section']->value['summary'];?>

			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/1.png" class="quote1">
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/2.png" class="quote2">
		</div>
		<div class="idea-last-desc h1"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['universal_concepts'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
		<div class="idea-carousel owl-carousel ">
    		<?php echo smarty_function_fetch_articles(array('limit'=>20,'assign'=>'concepts','section'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'type_content'=>'articles'),$_smarty_tpl);?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['concepts']->value, 'concept', false, NULL, 'concepts', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['concept']->value) {
?>
			<div class="carousel-item clearfix">
				<div class="icon-content col-md-4"><div class="img"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['concept']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['concept']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div>
				<div class="desc-content col-md-8"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['concept']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2><?php echo $_smarty_tpl->tpl_vars['concept']->value['summary'];?>
</div>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

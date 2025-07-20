<?php
/* Smarty version 3.1.33, created on 2025-07-17 09:49:42
  from '/home/soskduz/public_html/themes/app/templates/section-sos-in-uzbekistan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687880e6b857e6_57765329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1bb22bf6ad3b732075b24b0522504cf349843c1' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-sos-in-uzbekistan.tpl',
      1 => 1580511822,
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
function content_687880e6b857e6_57765329 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.mb_wordwrap.php','function'=>'smarty_modifier_mb_wordwrap',),));
$_smarty_tpl->compiled->nocache_hash = '263068479687880e6b65d69_38404725';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="villages-wrapper">
	<div class="container">
		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
		<div class="main-desc"> <?php echo $_smarty_tpl->tpl_vars['section']->value['content'];?>
</div>
		<div class="villages-items">
			<?php echo smarty_function_fetch_articles(array('limit'=>20,'assign'=>'concepts','section'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'type_content'=>'articles'),$_smarty_tpl);?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['concepts']->value, 'concept', false, NULL, 'concepts', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['concept']->value) {
?>
			<div class="villages-item">
				<div class="date-wrapper"><div class="date" data-aos="fade-up"><span></span><h2><?php echo htmlspecialchars(smarty_modifier_mb_wordwrap($_smarty_tpl->tpl_vars['concept']->value['title'],4," ",true), ENT_QUOTES, 'UTF-8', true);?>
.</h2></div></div>
				<?php if (isset($_smarty_tpl->tpl_vars['concept']->value['images'])) {?><div class="img-content"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['concept']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['concept']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"></div><?php }?>
				<div class="desc-content"><?php echo $_smarty_tpl->tpl_vars['concept']->value['summary'];?>
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

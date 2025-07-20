<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:35:12
  from '/home/soskduz/public_html/themes/app/templates/section-news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878ee00790dd8_54477274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e51a2515061dad96b799c9330c2b444269d3bede' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-news.tpl',
      1 => 1606408873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/you-are-here.tpl' => 1,
    'file:modules/pagination.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878ee00790dd8_54477274 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),2=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '7299635356878ee007666d1_52777974';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>
<div class="news-wrapper m-v-0">
	<div class="container">
		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
		<div class="row">
			<div class="novelties clearfix">
				<?php echo smarty_function_fetch_articles(array('perPage'=>9,'assign'=>'sectionArticles','section'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'assignPagination'=>'pagination','page'=>$_smarty_tpl->tpl_vars['page']->value,'path'=>$_smarty_tpl->tpl_vars['section']->value['path'],'seFriendly'=>true,'type_content'=>'news'),$_smarty_tpl);?>

				                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionArticles']->value, 'article', false, NULL, 'sectionArticles', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
				<div class="novelty-wrapper col-md-4">
					<div class="novelty">
						<div class="img-content"><div class="img"><img src="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['images'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);
}?>" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div>
						<div class="desc-content">
							<span><i class="icmcalendar"></i><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['publishedOn'],"%e.%m.%Y"), ENT_QUOTES, 'UTF-8', true);?>
</span>
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
							<p data-text-limit="150"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['article']->value['summary']),150);?>
</p>
						</div>
					</div>
				</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		<?php $_smarty_tpl->_subTemplateRender("file:modules/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"page-numbers"), 0, false);
?>
	</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

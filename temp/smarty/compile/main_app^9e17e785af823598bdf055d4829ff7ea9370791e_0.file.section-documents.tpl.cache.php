<?php
/* Smarty version 3.1.33, created on 2025-07-17 09:49:37
  from '/home/soskduz/public_html/themes/app/templates/section-documents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687880e1729745_68323796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e17e785af823598bdf055d4829ff7ea9370791e' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-documents.tpl',
      1 => 1603440268,
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
function content_687880e1729745_68323796 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.fsize_format.php','function'=>'smarty_modifier_fsize_format',),2=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '218510655687880e16ffa30_99046141';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>

<!-- Хлебные крошки -->
<noindex>
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>



<div class="documents-wrapper">

	<div class="container">

		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>

		<div class="row">

			<?php echo smarty_function_fetch_articles(array('perPage'=>12,'assign'=>'sectionArticles','section'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'assignPagination'=>'pagination','page'=>$_smarty_tpl->tpl_vars['page']->value,'path'=>$_smarty_tpl->tpl_vars['section']->value['path'],'seFriendly'=>true),$_smarty_tpl);?>


            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionArticles']->value, 'article', false, NULL, 'sectionArticles', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>

			<div class="col-md-4">

				<div class="documents-item">

					<?php if (isset($_smarty_tpl->tpl_vars['article']->value['files'])) {?>

					<div class="documents-top">

						<div class="documents-img">

							<?php if ($_smarty_tpl->tpl_vars['article']->value['files']['ext'] == 'docx' || $_smarty_tpl->tpl_vars['article']->value['files']['ext'] == 'doc') {?>

							<div class="img"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/doc.png"></div>

							<?php } elseif ($_smarty_tpl->tpl_vars['article']->value['files']['ext'] == 'xlsx' || $_smarty_tpl->tpl_vars['article']->value['files']['ext'] == 'xls') {?>

							<div class="img"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/excel.png"></div>

							<?php }?>

						</div>

						<div class="documents-download">

							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['files']['url'], ENT_QUOTES, 'UTF-8', true);?>
" download=""><i class="fa fa-download"></i> <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['download'], ENT_QUOTES, 'UTF-8', true);?>
 | <?php echo htmlspecialchars(smarty_modifier_fsize_format($_smarty_tpl->tpl_vars['article']->value['files']['size']), ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['files']['ext'], ENT_QUOTES, 'UTF-8', true);?>
</p></a>

						</div>

					</div>

					<?php }?>

					<div class="documents-bottom">

						<div class="desc"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2><p data-text-limit="156"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['article']->value['summary']),156);?>
</p></div>

					</div>

				</div>

			</div>

			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		</div>

		<?php $_smarty_tpl->_subTemplateRender("file:modules/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"page-numbers"), 0, false);
?>

	</div>

</div>
</noindex>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

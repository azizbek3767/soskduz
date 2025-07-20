<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:29:24
  from '/home/soskduz/public_html/themes/app/templates/article-news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878eca4800668_92868946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ff9ed900e2501cdd2db4c6650f236869f9140d3' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/article-news.tpl',
      1 => 1684231125,
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
function content_6878eca4800668_92868946 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),2=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),3=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->compiled->nocache_hash = '13400280846878eca47b0ff8_59731413';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['article']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['article']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['article']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="news-article-wrapper hidden-sm hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="other-news">
    				<?php echo smarty_function_fetch_articles(array('assign'=>'sectionArticles','section'=>$_smarty_tpl->tpl_vars['article']->value['section']['sectionId'],'limit'=>4,'type_content'=>"news"),$_smarty_tpl);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sectionArticles']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionArticles']->value, 'content', false, NULL, 'sectionArticles', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['content']->value) {
if ($_smarty_tpl->tpl_vars['article']->value['articleId'] != $_smarty_tpl->tpl_vars['content']->value['articleId']) {?>
					<div class="novelty-item">
						<span><i class="icmcalendar"></i><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['content']->value['publishedOn'],"%e.%m.%Y"), ENT_QUOTES, 'UTF-8', true);?>
</span>
						<h2><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a></h2>
						<p data-text-limit="150"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['content']->value['summary']),150);?>
</p>
					</div>
					<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
				</div>
			</div>
			<div class="col-md-offset-1 col-md-8">
				<div class="main-novelty ">
    				<?php if (isset($_smarty_tpl->tpl_vars['article']->value['images'])) {?>
						<?php if ($_smarty_tpl->tpl_vars['article']->value['images']['original']['url']) {?>
		    				<div class="img-content"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
    					<?php } else { ?>
		    				<div class="img-content"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
    					<?php }?>
    				<?php }?>
					<div class="desc-content">
						<span><i class="icmcalendar"></i><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['publishedOn'],"%e.%m.%Y"), ENT_QUOTES, 'UTF-8', true);?>
</span>
						<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>

						<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['article']->value['content'],'http://old.sos-kd.uz/','/old/');?>

					</div>

					<div class="buttons-content">
						<div class="back-button"><span><a href="javascript:;" onclick="goBack()"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['go_back'], ENT_QUOTES, 'UTF-8', true);?>
</a></span></div>
						<div class="social">
							<p style="margin-right: 10px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['share'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<div class="social-items">
								<div class="sharethis-inline-share-buttons"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="news-article-wrapper hidden-md hidden-lg">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-8">
				<div class="main-novelty ">
    				<?php if (isset($_smarty_tpl->tpl_vars['article']->value['images'])) {?><div class="img-content"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
"></div><?php }?>
					<div class="desc-content">
						<span><i class="icmcalendar"></i><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['publishedOn'],"%e.%m.%Y"), ENT_QUOTES, 'UTF-8', true);?>
</span>
						<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
						<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['article']->value['content'],'http://old.sos-kd.uz/','/old/');?>

					</div>
					<div class="img-content">
					</div>
					<div class="buttons-content">
						<div class="back-button"><span><a href="javascript:;" onclick="goBack()"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['go_back'], ENT_QUOTES, 'UTF-8', true);?>
</a></span></div>
						<div class="social">
							<p style="margin-right: 10px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['share'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<div class="social-items">
								<div class="sharethis-inline-share-buttons"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="other-news">
					<?php echo smarty_function_fetch_articles(array('assign'=>'sectionArticles','section'=>$_smarty_tpl->tpl_vars['article']->value['section']['sectionId'],'limit'=>4,'type_content'=>"news"),$_smarty_tpl);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sectionArticles']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionArticles']->value, 'content', false, NULL, 'sectionArticles', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['content']->value) {
if ($_smarty_tpl->tpl_vars['article']->value['articleId'] != $_smarty_tpl->tpl_vars['content']->value['articleId']) {?>
					<div class="novelty-item">
						<span><i class="icmcalendar"></i><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['publishedOn'],"%e.%m.%Y"), ENT_QUOTES, 'UTF-8', true);?>
</span>
						<h2><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['content']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a></h2>
						<p data-text-limit="150"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['content']->value['summary']),150);?>
</p>
					</div>
					<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
 type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5fab7b414f148e0012a5b837&product=inline-share-buttons' async='async'><?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

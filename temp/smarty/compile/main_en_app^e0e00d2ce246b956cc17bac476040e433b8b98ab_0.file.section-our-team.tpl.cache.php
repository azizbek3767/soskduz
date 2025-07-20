<?php
/* Smarty version 3.1.33, created on 2025-07-17 12:32:35
  from '/home/soskduz/public_html/themes/app/templates/section-our-team.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878a713c4fb47_91696692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0e00d2ce246b956cc17bac476040e433b8b98ab' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-our-team.tpl',
      1 => 1580166106,
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
function content_6878a713c4fb47_91696692 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),));
$_smarty_tpl->compiled->nocache_hash = '17856045126878a713c303f0_13833978';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="team-wrapper">
	<div class="container">
		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
		<div class="team-desc"><?php echo $_smarty_tpl->tpl_vars['section']->value['content'];?>
</div>
		<div class="nav_tabs">
			<?php echo smarty_function_fetch_articles(array('limit'=>20,'assign'=>'sectionArticles','section'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'type_content'=>'articles'),$_smarty_tpl);?>

            <ul class="nav" role="tablist">
    		    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionArticles']->value, 'article', false, NULL, 'sectionArticles', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['index'];
?>
                <li role="presentation" class="<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['first'] : null)) {?>active<?php }?>"><a href="#<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
" role="tab" data-toggle="tab"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		    </ul>
            <div class="tab-content">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionArticles']->value, 'article', false, NULL, 'sectionArticles', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['index'];
?>
                <div role="tabpanel" class="tab-pane fade <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sectionArticles']->value['first'] : null)) {?>in active<?php }?>" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
">
		    	    <div class="tab-image"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
		        </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		    </div>
		</div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

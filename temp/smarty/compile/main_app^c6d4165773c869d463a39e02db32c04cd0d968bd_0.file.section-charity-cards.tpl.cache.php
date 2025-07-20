<?php
/* Smarty version 3.1.33, created on 2025-07-17 08:39:30
  from '/home/soskduz/public_html/themes/app/templates/section-charity-cards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687870721c3df7_29365961',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6d4165773c869d463a39e02db32c04cd0d968bd' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-charity-cards.tpl',
      1 => 1603440182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/you-are-here.tpl' => 1,
    'file:modules/product-item-block.tpl' => 1,
    'file:modules/pagination.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_687870721c3df7_29365961 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_sections.php','function'=>'smarty_function_fetch_sections',),1=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles_count.php','function'=>'smarty_function_fetch_articles_count',),2=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),));
$_smarty_tpl->compiled->nocache_hash = '12911085686878707219d146_61736876';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>

<!-- Хлебные крошки -->
<noindex>
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>



<div class="postcards-wrapper">

	<div class="container">

		<div class="page-name">

			<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>

			<?php echo $_smarty_tpl->tpl_vars['section']->value['content'];?>


		</div>

		<div class="products-links">

    		<?php echo smarty_function_fetch_sections(array('assign'=>'shopSections','from'=>33,'status'=>"visible"),$_smarty_tpl);?>


            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shopSections']->value, 'subshop', false, NULL, 'shopSections', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subshop']->value) {
?>

            <span class="products-button">

                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subshop']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subshop']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 

                    <?php echo smarty_function_fetch_articles_count(array('limit'=>1000,'assign'=>'articlesCount','section'=>$_smarty_tpl->tpl_vars['subshop']->value['sectionId'],'assignCount'=>'num','type_content'=>'products'),$_smarty_tpl);?>


                    <span>(<?php if (isset($_smarty_tpl->tpl_vars['num']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8', true);
} else { ?>0<?php }?>)</span>

                </a>

            </span>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		</div>

		<div class="charity-items">

			<div class="row">

    			<?php if ($_smarty_tpl->tpl_vars['section']->value['sectionId'] == 23) {?>

				    <?php echo smarty_function_fetch_articles(array('perPage'=>12,'assign'=>'sectionArticles','section'=>34,'assignPagination'=>'pagination','page'=>$_smarty_tpl->tpl_vars['page']->value,'path'=>$_smarty_tpl->tpl_vars['section']->value['path'],'seFriendly'=>true,'type_content'=>'products'),$_smarty_tpl);?>


				<?php } else { ?>

                    <?php echo smarty_function_fetch_articles(array('perPage'=>12,'assign'=>'sectionArticles','section'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'assignPagination'=>'pagination','page'=>$_smarty_tpl->tpl_vars['page']->value,'path'=>$_smarty_tpl->tpl_vars['section']->value['path'],'seFriendly'=>true,'type_content'=>'products'),$_smarty_tpl);?>


				<?php }?>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionArticles']->value, 'postcard', false, NULL, 'sectionArticles', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['postcard']->value) {
?>

                    <?php $_smarty_tpl->_subTemplateRender("file:modules/product-item-block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"col-md-3"), 0, true);
?>

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
</noindex>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

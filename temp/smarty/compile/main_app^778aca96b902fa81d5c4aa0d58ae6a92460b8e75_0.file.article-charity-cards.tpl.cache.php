<?php
/* Smarty version 3.1.33, created on 2025-07-17 16:21:27
  from '/home/soskduz/public_html/themes/app/templates/article-charity-cards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878dcb753ae93_69246637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '778aca96b902fa81d5c4aa0d58ae6a92460b8e75' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/article-charity-cards.tpl',
      1 => 1604231041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/you-are-here.tpl' => 1,
    'file:modules/product-item-block.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878dcb753ae93_69246637 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),));
$_smarty_tpl->compiled->nocache_hash = '2409562806878dcb74fac73_06887976';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['article']->value['title'],'keywords'=>$_smarty_tpl->tpl_vars['article']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['article']->value['description']), 0, false);
?>

<!-- Хлебные крошки -->

<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<noindex>

<div class="postcards-article-wrapper">

	<div class="container">

		<div class="product">

			<div class="row">

				<div class="col-md-5">

    				<div class="img-content">

        				<?php if (isset($_smarty_tpl->tpl_vars['article']->value['gallery'])) {?>

        				<a href="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value['gallery'], 'gallery', false, NULL, 'gallerys', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration']++;
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration'] : null) == 2) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
big-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value['fileName'], ENT_QUOTES, 'UTF-8', true);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" data-fancybox>

                		    <img src="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value['gallery'], 'gallery', false, NULL, 'gallerys', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration']++;
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_gallerys']->value['iteration'] : null) == 1) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
medium-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gallery']->value['fileName'], ENT_QUOTES, 'UTF-8', true);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postcard']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
">

                		</a>

                		<?php }?>


                    </div>

                </div>

				<div class="col-md-7">

					<div class="desc-content">

						<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>

						<?php if (isset($_smarty_tpl->tpl_vars['article']->value['price'])) {?><span class="price"> <i class="icmtag"></i> <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['article']->value['price'],0,"."," "), ENT_QUOTES, 'UTF-8', true);?>
 <span><sup>сум</sup></span> </span><?php }?>

						<?php echo $_smarty_tpl->tpl_vars['article']->value['summary'];?>


						<div class="buttons">

							<form>

								<div class="inline-block m-v-10 m-h-30 products-cnt-form" data-counter="1">

                                    <input class="cnt-input" name="amount" value="2" data-counter-input="data-counter-input">

                                    <span class="cnt-btn minus" data-counter-btn="">-</span>

                                    <span class="cnt-btn plus" data-counter-btn="">+</span>

                                </div>

								<a href="javascript:;" class="btn-def-2 btn-addtocart" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['articleId'], ENT_QUOTES, 'UTF-8', true);?>
" data-action="add_to_cart"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['add_to_basket'], ENT_QUOTES, 'UTF-8', true);?>
<i class="icmshopping-cart-of-checkered-design"></i></a>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="extra-desc">

			<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['additional_information'], ENT_QUOTES, 'UTF-8', true);?>
</h2>

			<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>


		</div>

	</div>

	<div class="charity-wrapper">

		<div class="container">	

			<div class="section-name">

				<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['help_us_children'], ENT_QUOTES, 'UTF-8', true);?>
</h2>

				<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['charity_cards'], ENT_QUOTES, 'UTF-8', true);?>
</h1>

				<div class="charity-more-info"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['section']['url'], ENT_QUOTES, 'UTF-8', true);?>
"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['view_all'], ENT_QUOTES, 'UTF-8', true);?>
</h2><i class="icmangle-arrow-down"></i></a></div>

			</div>

			<div class="charity-carousel-wrapper nav-style-1">

				<div class="owl-carousel charity-carousel">

                    <?php echo smarty_function_fetch_articles(array('limit'=>11,'assign'=>'postcards','section'=>34,'type_content'=>'products'),$_smarty_tpl);?>


                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['postcards']->value, 'postcard', false, NULL, 'postcards', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['postcard']->value) {
if ($_smarty_tpl->tpl_vars['postcard']->value['articleId'] != $_smarty_tpl->tpl_vars['article']->value['articleId']) {?>

                        <?php $_smarty_tpl->_subTemplateRender("file:modules/product-item-block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"carousel-item"), 0, true);
?>

					<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

				</div>

			</div>

		</div>	

	</div>

</div>

</noindex>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

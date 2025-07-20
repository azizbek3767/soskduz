<?php
/* Smarty version 3.1.33, created on 2025-07-14 17:04:50
  from '/home/soskduz/public_html/themes/app/templates/basket.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6874f262763873_17914010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3c5c73410d8577e40dc2583def2b3e50eecbf9b' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/basket.tpl',
      1 => 1603439268,
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
function content_6874f262763873_17914010 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_baskets.php','function'=>'smarty_function_fetch_baskets',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.price.php','function'=>'smarty_modifier_price',),2=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '307381536874f262723db6_71481478';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>

<!-- Хлебные крошки -->

<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>


<noindex>
<?php if (isset($_smarty_tpl->tpl_vars['sessionId']->value)) {?>



<?php echo smarty_function_fetch_baskets(array('assign'=>'baskets','userId'=>$_smarty_tpl->tpl_vars['sessionId']->value,'limit'=>40,'image'=>true),$_smarty_tpl);?>

	
<div class="basket-page-wrapper">

	<div class="container">


		<?php if (isset($_smarty_tpl->tpl_vars['baskets']->value)) {?>

		<div class="basket-results">

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['baskets']->value, 'basket', false, NULL, 'baskets', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['basket']->value) {
?>

			<div class="basket-item">

				<div class="row">

					<div class="col-md-3"><div class="img-content"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basket']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basket']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"></div></div>

					<div class="col-md-9">

						<div class="desc-content">

							<div class="special-desc">

								<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basket']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>

								<span class="price"><i class="icmtag"></i><?php echo smarty_modifier_price($_smarty_tpl->tpl_vars['basket']->value['price']);?>
</span>

							</div>

							<?php echo $_smarty_tpl->tpl_vars['basket']->value['summary'];?>


							<div class="buttons">

								<form>

									<div class="inline-block m-v-10 products-cnt-form input-counter">

										<span class="minus">-</span>

										<input class="cnt-input" name="amount" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basket']->value['amount'], ENT_QUOTES, 'UTF-8', true);?>
" size="100000" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basket']->value['basketId'], ENT_QUOTES, 'UTF-8', true);?>
" data-action="amount_input_product">

                                        <span class="plus">+</span>

                                    </div>

									<span class="btn-def-2"><a href="javascript:;" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basket']->value['basketId'], ENT_QUOTES, 'UTF-8', true);?>
" data-action="remove_product" class="btn-remove"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_delete'], ENT_QUOTES, 'UTF-8', true);?>
</a></span>

								</form>

							</div>

						</div>

					</div>

				</div>

			</div>

			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



		</div>

		<div class="total-sum clearfix">

			<div class="buy-all col-md-12">

				<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_total'], ENT_QUOTES, 'UTF-8', true);?>
 <span class="total-price"><?php echo smarty_modifier_price($_smarty_tpl->tpl_vars['totalPrice']->value);?>
</span></h2>

				<form>

					<button class="btn-def-2" href="javascript:;" data-src="#block" data-fancybox><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_checkout'], ENT_QUOTES, 'UTF-8', true);?>
</button>

				</form>

			</div>

			<div class="delete-all col-md-12">

				<a class="remove-all-products" href="javascript:;" data-action="remove_all_products"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_empty_basket'], ENT_QUOTES, 'UTF-8', true);?>
</a>

			</div>

		</div>

		<div class="modal-window-wrapper hide">

			<div class="modal-window" id="block">

				<div class="success-send"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_order_successfully'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>

				<form id="order" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/public/order.php" method="post">

    				<input type="hidden" name="subject" value="Заказ">

    				<?php echo $_smarty_tpl->tpl_vars['csrf_input']->value;?>


    				<input type="hidden" name="lang" value="<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == '') {?>ru<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_LANG']->value, ENT_QUOTES, 'UTF-8', true);
}?>">

					<input type="text" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_your_name'], ENT_QUOTES, 'UTF-8', true);?>
" name="name" class="input-control" data-error="#order_name">

					<input type="text" id="phone" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_your_phone'], ENT_QUOTES, 'UTF-8', true);?>
" name="phone" class="input-control" data-error="#order_phone">

					<input type="text" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_your_email'], ENT_QUOTES, 'UTF-8', true);?>
" name="email" class="input-control" data-error="#order_email">

					<textarea placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_comment_order'], ENT_QUOTES, 'UTF-8', true);?>
" name="message" class="input-control" data-error="#order_message"></textarea>

					<button class="btn-def-2" type="submit" name="action" value="order" data-action="order"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_checkout'], ENT_QUOTES, 'UTF-8', true);?>
</button>

					<?php if ($_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'] == 0) {?>

						<div id="send-anti-bot">

							<strong>Текущий <span style="display:inline;">ye@r</span> <span style="display:none;">month</span> <span style="display:none;">day</span></strong>

							<span class="required">*</span>

							<input type="hidden" name="anti-bot-a" id="feedback-anti-bot-a" value="<?php echo htmlspecialchars(smarty_modifier_date_format(time(),'%Y'), ENT_QUOTES, 'UTF-8', true);?>
" />

							<input type="text" name="anti-bot-q" id="feedback-anti-bot-q" value="19" />

						</div>

						<div class="send-anti-bot-2"><input type="email" name="anti-email" value=""/></div>

					<?php }?>

				</form>

			</div>

		</div>



			<div class="basket-empty text-center hide" style="margin-bottom: 30px">

				<span class="fa fa-shopping-basket" style="font-size: 130px;margin-bottom: 20px;opacity: 0.3;"></span>

				<h1 class="tt-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_empty'], ENT_QUOTES, 'UTF-8', true);?>
</h1>

				<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_items_shopping_cart'], ENT_QUOTES, 'UTF-8', true);?>
</p>

				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/magazin/" class="btn"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_continue_purchase'], ENT_QUOTES, 'UTF-8', true);?>
</a>

			</div>

		<?php } else { ?>

			<div class="basket-empty text-center" style="margin-bottom: 30px">

				<div class="empty-cart">

					<span class="fa fa-shopping-basket" style="font-size: 130px;margin-bottom: 20px;opacity: 0.3;"></span>

					<h1 class="tt-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_empty'], ENT_QUOTES, 'UTF-8', true);?>
</h1>

					<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_items_shopping_cart'], ENT_QUOTES, 'UTF-8', true);?>
</p>

					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/magazin/" class="btn"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_continue_purchase'], ENT_QUOTES, 'UTF-8', true);?>
</a>

				</div>

			</div>

		<?php }?>

	</div>

</div>

<?php }?>
</noindex>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

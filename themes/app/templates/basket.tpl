{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}

<!-- Хлебные крошки -->

{include file="modules/you-are-here.tpl" class="breadcrumb-container"}


<noindex>
{if isset($sessionId)}



{fetch_baskets assign=baskets userId=$sessionId  limit=40 image=true}
	
<div class="basket-page-wrapper">

	<div class="container">

{*     	{if isset($baskets) && $totalPrice gt 0} *}

		{if isset($baskets)}

		<div class="basket-results">

			{foreach item=basket from=$baskets name=baskets}

			<div class="basket-item">

				<div class="row">

					<div class="col-md-3"><div class="img-content"><img src="{$basket.images.medium.url}" alt="{$basket.title}"></div></div>

					<div class="col-md-9">

						<div class="desc-content">

							<div class="special-desc">

								<h2>{$basket.title}</h2>

								<span class="price"><i class="icmtag"></i>{$basket.price|price nofilter}</span>

							</div>

							{$basket.summary nofilter}

							<div class="buttons">

								<form>

									<div class="inline-block m-v-10 products-cnt-form input-counter">

										<span class="minus">-</span>

										<input class="cnt-input" name="amount" value="{$basket.amount}" size="100000" data-id="{$basket.basketId}" data-action="amount_input_product">

                                        <span class="plus">+</span>

                                    </div>

									<span class="btn-def-2"><a href="javascript:;" data-id="{$basket.basketId}" data-action="remove_product" class="btn-remove">{$LANG.basket_delete}</a></span>

								</form>

							</div>

						</div>

					</div>

				</div>

			</div>

			{/foreach}



		</div>

		<div class="total-sum clearfix">

			<div class="buy-all col-md-12">

				<h2>{$LANG.basket_total} <span class="total-price">{$totalPrice|price nofilter}</span></h2>

				<form>

					<button class="btn-def-2" href="javascript:;" data-src="#block" data-fancybox>{$LANG.basket_checkout}</button>

				</form>

			</div>

			<div class="delete-all col-md-12">

				<a class="remove-all-products" href="javascript:;" data-action="remove_all_products">{$LANG.basket_empty_basket}</a>

			</div>

		</div>

		<div class="modal-window-wrapper hide">

			<div class="modal-window" id="block">

				<div class="success-send"><h2>{$LANG.basket_order_successfully}</h2></div>

				<form id="order" action="{$GLOBAL_URL}/public/order.php" method="post">

    				<input type="hidden" name="subject" value="Заказ">

    				{$csrf_input nofilter}

    				<input type="hidden" name="lang" value="{if $SITE_LANG eq ''}ru{else}{$SITE_LANG}{/if}">

					<input type="text" placeholder="{$LANG.basket_your_name}" name="name" class="input-control" data-error="#order_name">

					<input type="text" id="phone" placeholder="{$LANG.basket_your_phone}" name="phone" class="input-control" data-error="#order_phone">

					<input type="text" placeholder="{$LANG.basket_your_email}" name="email" class="input-control" data-error="#order_email">

					<textarea placeholder="{$LANG.basket_comment_order}" name="message" class="input-control" data-error="#order_message"></textarea>

					<button class="btn-def-2" type="submit" name="action" value="order" data-action="order">{$LANG.basket_checkout}</button>

					{if $config.allow_recaptcha eq 0}

						<div id="send-anti-bot">

							<strong>Текущий <span style="display:inline;">ye@r</span> <span style="display:none;">month</span> <span style="display:none;">day</span></strong>

							<span class="required">*</span>

							<input type="hidden" name="anti-bot-a" id="feedback-anti-bot-a" value="{$smarty.now|date_format:'%Y'}" />

							<input type="text" name="anti-bot-q" id="feedback-anti-bot-q" value="19" />

						</div>

						<div class="send-anti-bot-2"><input type="email" name="anti-email" value=""/></div>

					{/if}

				</form>

			</div>

		</div>



			<div class="basket-empty text-center hide" style="margin-bottom: 30px">

				<span class="fa fa-shopping-basket" style="font-size: 130px;margin-bottom: 20px;opacity: 0.3;"></span>

				<h1 class="tt-title">{$LANG.basket_empty}</h1>

				<p>{$LANG.basket_items_shopping_cart}</p>

				<a href="{$SITE_URL}/magazin/" class="btn">{$LANG.basket_continue_purchase}</a>

			</div>

		{else}

			<div class="basket-empty text-center" style="margin-bottom: 30px">

				<div class="empty-cart">

					<span class="fa fa-shopping-basket" style="font-size: 130px;margin-bottom: 20px;opacity: 0.3;"></span>

					<h1 class="tt-title">{$LANG.basket_empty}</h1>

					<p>{$LANG.basket_items_shopping_cart}</p>

					<a href="{$SITE_URL}/magazin/" class="btn">{$LANG.basket_continue_purchase}</a>

				</div>

			</div>

		{/if}

	</div>

</div>

{/if}
</noindex>
{include file="footer.tpl"}
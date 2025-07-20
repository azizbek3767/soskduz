{include file="header.tpl" title=$article.title keywords=$article.keywords description=$article.description}

<!-- Хлебные крошки -->

{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<noindex>

<div class="postcards-article-wrapper">

	<div class="container">

		<div class="product">

			<div class="row">

				<div class="col-md-5">

    				<div class="img-content">

        				{if isset($article.gallery)}

        				<a href="{foreach from=$article.gallery item=gallery name=gallerys}{if $smarty.foreach.gallerys.iteration eq 2}{$gallery.url}big-{$gallery.fileName}{/if}{/foreach}" data-fancybox>

                		    <img src="{foreach from=$article.gallery item=gallery name=gallerys}{if $smarty.foreach.gallerys.iteration eq 1}{$gallery.url}medium-{$gallery.fileName}{/if}{/foreach}" alt="{$postcard.title}">

                		</a>

                		{/if}

{*     				    <img src="{$article.images.original.url}"  alt="{$article.title}"> *}

                    </div>

                </div>

				<div class="col-md-7">

					<div class="desc-content">

						<h2>{$article.title}</h2>

						{if isset($article.price)}<span class="price"> <i class="icmtag"></i> {$article.price|number_format:0:".":" "} <span><sup>сум</sup></span> </span>{/if}

						{$article.summary nofilter}

						<div class="buttons">

							<form>

								<div class="inline-block m-v-10 m-h-30 products-cnt-form" data-counter="1">

                                    <input class="cnt-input" name="amount" value="2" data-counter-input="data-counter-input">

                                    <span class="cnt-btn minus" data-counter-btn="">-</span>

                                    <span class="cnt-btn plus" data-counter-btn="">+</span>

                                </div>

								<a href="javascript:;" class="btn-def-2 btn-addtocart" data-id="{$article.articleId}" data-action="add_to_cart">{$LANG.add_to_basket}<i class="icmshopping-cart-of-checkered-design"></i></a>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="extra-desc">

			<h2>{$LANG.additional_information}</h2>

			{$article.content nofilter}

		</div>

	</div>

	<div class="charity-wrapper">

		<div class="container">	

			<div class="section-name">

				<h2>{$LANG.help_us_children}</h2>

				<h1>{$LANG.charity_cards}</h1>

				<div class="charity-more-info"><a href="{$article.section.url}"><h2>{$LANG.view_all}</h2><i class="icmangle-arrow-down"></i></a></div>

			</div>

			<div class="charity-carousel-wrapper nav-style-1">

				<div class="owl-carousel charity-carousel">

                    {fetch_articles limit=11 assign=postcards section=34 type_content='products'}

                    {foreach item=postcard from=$postcards name=postcards}{if $postcard.articleId ne $article.articleId}

                        {include file="modules/product-item-block.tpl" class="carousel-item"}

					{/if}{/foreach}

				</div>

			</div>

		</div>	

	</div>

</div>

</noindex>

{include file="footer.tpl"}
<div class="{$class}">
	<div class="charity-item">
		<div class="img-content">
    		{if isset($postcard.gallery)}
    		<a href="{foreach from=$postcard.gallery item=gallery name=gallerys}{if $smarty.foreach.gallerys.iteration eq 2}{$gallery.url}big-{$gallery.fileName}{/if}{/foreach}" data-fancybox>
    		    <img src="{foreach from=$postcard.gallery item=gallery name=gallerys}{if $smarty.foreach.gallerys.iteration eq 1}{$gallery.url}medium-{$gallery.fileName}{/if}{/foreach}" alt="{$postcard.title}">
    		</a>
    		{/if}
        </div>
		<div class="desc-content">
			<div class="desc">
				<h3>{$postcard.title}</h3>
				{if isset($postcard.price)}<h2 style="font-size: 32px;">{$postcard.price|price nofilter}</h2>{/if} {* <sup><span>сум</span></sup>*}
				<p>{$postcard.summary|strip_tags|truncate:100 nofilter}</p>
			</div>
		</div>
		<div class="buttons">
			<span class="btn-def-2"><a href="javascript:;" class="btn-addtocart" data-id="{$postcard.articleId}" data-action="add_to_cart"><i class="icmshopping-cart-of-checkered-design"></i></a></span>
			<span class="btn-def-3"><a href="{$postcard.url}">{$LANG.more_details}</a></span>
		</div>
	</div>
</div>
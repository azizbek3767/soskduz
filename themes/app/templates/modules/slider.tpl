{if $config.slider eq '1'}
<section class="main-carousel-wrapper nav-style-1">
	<div class="owl-carousel main-carousel">
		{fetch_sliders assign=sectionSliders section=slider limit=10 orderBy='orderBy'}
        {foreach item=slider from=$sectionSliders name=sectionSliders}
		<div class="carousel-item">
			<div class="main-carousel-img" style="background-image: url('{$slider.images.original.url}');">
				<div class="carousel-desc-wrapper container">{if isset($slider.title)}<div class="carousel-desc"><h2 class="special-h1-class" style="color:white;">{$slider.title nofilter}</h2></div>{/if}</div>
			</div>
		</div>
		{/foreach}
	</div>
</section>
{/if}
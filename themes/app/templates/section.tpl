{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="waww-article-wrapper waw-page-main">
	<div class="container">
		<div class="page-name"><h1>{$section.name}</h1></div>
		{if isset($section.images)}
			{if $section.images.original.url}
				<div class="img-content" style="margin-bottom: 40px;"><img src="{$section.images.original.url}" alt="{$section.alias}" style="max-width: 100%;"></div>
			{elseif $section.images.medium.url}
				<div class="img-content" style="margin-bottom: 40px;"><img src="{$section.images.medium.url}" alt="{$section.alias}" style="max-width: 100%;"></div>
			{/if}

		{/if}
		<div class="desc-content">
    		{$section.content nofilter}
        </div>
	</div>
</div>
{include file="footer.tpl"}
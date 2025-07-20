{include file="header.tpl" title=$article.title keywords=$article.keywords description=$article.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}	
		
<div class="boxes-article-wrapper" style="margin-bottom: 40px">
	<div class="container">
		<div class="desc-content">
			<h1>{$article.title}</h1>
			{if isset($article.images)}<img src="{$article.images.original.url}"  alt="{$article.title}" style="float: left;margin-right: 20px">{/if}
    		{$article.content nofilter}
		</div>
	</div>
</div>


{include file="footer.tpl"}
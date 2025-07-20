{include file="header.tpl" title=$article.title keywords=$article.keywords description=$article.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="waww-article-wrapper">
	<div class="container">
		<div class="page-name"><h1>{$article.title}</h1></div>
		<div class="desc-content">
    		{if isset($article.images)}<img src="{$article.images.original.url}"  alt="{$article.title}" style="float: left;">{/if}
    		{$article.content nofilter}
        </div>
	</div>
</div>


{include file="footer.tpl"}
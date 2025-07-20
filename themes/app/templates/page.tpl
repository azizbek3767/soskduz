{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="waww-article-wrapper">
	<div class="container">
		<div class="page-name"><h1>{$section.name}</h1></div>
		<div class="desc-content">{$section.content nofilter}</div>
	</div>
</div>
		
		
{include file="footer.tpl"}
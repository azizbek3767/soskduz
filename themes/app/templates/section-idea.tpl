{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="idea-wrapper">
	<div class="container">
		<div class="page-name"><h1>{$section.name}</h1></div>
		<div class="desc-content">{$section.content|replace:'/admin/img/':'/uploads/files/' nofilter}</div>
		<div class="idea-statement">
			{$section.summary nofilter}
			<img src="{$THEME_URL}/img/1.png" class="quote1">
			<img src="{$THEME_URL}/img/2.png" class="quote2">
		</div>
		<div class="idea-last-desc h1"><h2>{$LANG.universal_concepts}</h2></div>
		<div class="idea-carousel owl-carousel ">
    		{fetch_articles limit=20 assign=concepts section=$section.sectionId type_content='articles'}
            {foreach item=concept from=$concepts name=concepts}
			<div class="carousel-item clearfix">
				<div class="icon-content col-md-4"><div class="img"><img src="{$concept.images.medium.url}" alt="{$concept.title}"></div></div>
				<div class="desc-content col-md-8"><h2>{$concept.title}</h2>{$concept.summary nofilter}</div>
			</div>
			{/foreach}
		</div>
	</div>
</div>
{include file="footer.tpl"}
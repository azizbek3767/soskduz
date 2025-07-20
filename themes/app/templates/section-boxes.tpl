{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="projects-wrapper">
	<div class="container">
		<div class="page-name"><h1>{$section.name}</h1></div>
		<div class="main-desc">{$section.content nofilter}</div>
		<div class="projects-items">
			{fetch_articles perPage=9 assign=sectionArticles section=$section.sectionId assignPagination=pagination page=$page path=$section.path seFriendly=true type_content="articles"}
            {foreach item=article from=$sectionArticles name=sectionArticles}
			
			<div class="projects-item">
				<div class="row">
					<div class="img-content col-md-4">
						<a href="{$article.images.original.url}" data-fancybox><img src="{$article.images.medium.url}" alt="{$article.title}"></a>
					</div>
					<div class="desc-content col-md-8">
						<div class="desc">
							<h2>{$article.title}</h2>
							<p>{$article.summary|strip_tags|truncate:400 nofilter}</p>
							<span class="boxes-button"><a href="{$article.url}">{$LANG.more_details}</a></span>
						</div>
					</div>
				</div>
			</div>
			{/foreach}
		</div>
	</div>
</div>
{include file="footer.tpl"}
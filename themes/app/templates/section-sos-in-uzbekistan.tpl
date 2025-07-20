{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="villages-wrapper">
	<div class="container">
		<div class="page-name"><h1>{$section.name}</h1></div>
		<div class="main-desc"> {$section.content nofilter}</div>
		<div class="villages-items">
			{fetch_articles limit=20 assign=concepts section=$section.sectionId type_content='articles'}
            {foreach item=concept from=$concepts name=concepts}
			<div class="villages-item">
				<div class="date-wrapper"><div class="date" data-aos="fade-up"><span></span><h2>{$concept.title|wordwrap:4:" ":true}.</h2></div></div>
				{if isset($concept.images)}<div class="img-content"><img src="{$concept.images.medium.url}" alt="{$concept.title}"></div>{/if}
				<div class="desc-content">{$concept.summary nofilter}</div>
			</div>
			{/foreach}
		</div>
	</div>
</div>

				

		
		
		
{include file="footer.tpl"}
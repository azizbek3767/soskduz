{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="team-wrapper">
	<div class="container">
		<div class="page-name"><h1>{$section.name}</h1></div>
		<div class="team-desc">{$section.content nofilter}</div>
		<div class="nav_tabs">
			{fetch_articles limit=20 assign=sectionArticles section=$section.sectionId type_content='articles'}
            <ul class="nav" role="tablist">
    		    {foreach item=article from=$sectionArticles name=sectionArticles}
                <li role="presentation" class="{if $smarty.foreach.sectionArticles.first}active{/if}"><a href="#{$article.fileName}" role="tab" data-toggle="tab">{$article.title}</a></li>
                {/foreach}
		    </ul>
            <div class="tab-content">
                {foreach item=article from=$sectionArticles name=sectionArticles}
                <div role="tabpanel" class="tab-pane fade {if $smarty.foreach.sectionArticles.first}in active{/if}" id="{$article.fileName}">
		    	    <div class="tab-image"><img src="{$article.images.original.url}" alt="{$article.title}"></div>
		        </div>
                {/foreach}
		    </div>
		</div>
	</div>
</div>
{include file="footer.tpl"}
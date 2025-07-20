{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}

<!-- Хлебные крошки -->
<noindex>
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}



<div class="postcards-wrapper">

	<div class="container">

		<div class="page-name">

			<h1>{$section.name}</h1>

			{$section.content nofilter}

		</div>

		<div class="products-links">

    		{fetch_sections assign=shopSections from=33 status="visible"}

            {foreach item=subshop from=$shopSections name=shopSections}

            <span class="products-button">

                <a href="{$subshop.url}" >{$subshop.name} 

                    {fetch_articles_count limit=1000 assign=articlesCount section=$subshop.sectionId assignCount=num type_content='products'}

                    <span>({if isset($num)}{$num}{else}0{/if})</span>

                </a>

            </span>

            {/foreach}

		</div>

		<div class="charity-items">

			<div class="row">

    			{if $section.sectionId eq 23}

				    {fetch_articles perPage=12 assign=sectionArticles section=34 assignPagination=pagination page=$page path=$section.path seFriendly=true type_content='products'}

				{else}

                    {fetch_articles perPage=12 assign=sectionArticles section=$section.sectionId assignPagination=pagination page=$page path=$section.path seFriendly=true type_content='products'}

				{/if}

                {foreach item=postcard from=$sectionArticles name=sectionArticles}

                    {include file="modules/product-item-block.tpl" class="col-md-3"}

				{/foreach}

			</div>

		</div>

		{include file="modules/pagination.tpl" class="page-numbers"}

	</div>

</div>
</noindex>
{include file="footer.tpl"}
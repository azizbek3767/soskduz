{include file="header.tpl" title={$LANG.searching_results} keywords={$LANG.searching_results} description={$LANG.searching_results}}

{fetch_articles query=$query  page=$page perPage=10 assign=searchResults assignPagination=pagination fields='title, url, summary, content, sectionId'}

{fetch_sections_search query=$query  page=$page perPage=10 assign=sectionsSearchResults assignPagination=sectionPagination fields='name, url, summary, content, sectionId'}

<div class="search-page-wrapper">
    <div class="container">

        <div class="page-name">
            <h1>{$LANG.searching_results}:<span>{if isset($query)}{$query}{/if}</span></h1>
            <p>{$LANG.request}
                <span>{if isset($query)}{$query}{/if}</span>{$LANG.found} {if (isset($pagination.totalItems) || isset($sectionPagination.totalItems))}{$pagination.totalItems + $sectionPagination.totalItems}{else}0{/if}
                :</p>
        </div>

        {if $searchResults}
            {foreach item=article from=$searchResults name=searchResults}
                <div class="result">
                    <a href="{$article.url}">
                        <span>{$article.title|replace:$query:"<b>$query</b>" nofilter}</span>
                        <p>{$article.summary|strip_tags|replace:$query:"<b>$query</b>" nofilter}</p>
                    </a>
                </div>
            {/foreach}
        {/if}

        {if $sectionsSearchResults}
            {foreach item=section from=$sectionsSearchResults name=sectionsSearchResults}
                <div class="result">
                    <a href="{$section.url}">
                        <span>{$section.name|replace:$query:"<b>$query</b>" nofilter}</span>
                        <p>{$section.summary|strip_tags|replace:$query:"<b>$query</b>" nofilter}</p>
                    </a>
                </div>
            {/foreach}
        {/if}
        {if $searching_result && $sectionsSearchResults}
            <div class="result text-center"><h4>{$LANG.not_found}</h4></div>
        {/if}
        {include file="modules/pagination.tpl" class="page-numbers"}

    </div>
</div>


{include file="footer.tpl"}

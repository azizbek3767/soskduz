{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}
<div class="news-wrapper m-v-0">
    <div class="container">
        <div class="page-name"><h1>{$section.name}</h1></div>
        <div class="row">
            <div class="novelties clearfix smi-about-us">
                {fetch_articles perPage=9 assign=sectionArticles section=$section.sectionId assignPagination=pagination page=$page path=$section.path seFriendly=true type_content='articles'}
{*                 {$sectionArticles|@print_r}*}
                {foreach item=article from=$sectionArticles name=sectionArticles}
                    <div class="novelty-wrapper col-md-4">
                        <div class="novelty">
                            <div class="img-content"><div class="img"><img src="{if isset($article.images)}{$article.images.original.url}{/if}" alt="{$article.alias}"></div></div>
                            <div class="desc-content">
                                <span><i class="icmcalendar"></i>{$article.publishedOn|date_format:"%e.%m.%Y"}</span>
{*                                <a href="{$article.url}">{$article.title}</a>*}
                                <a href="{$article.link}">{$article.title}</a>
                                <p data-text-limit="150">{$article.summary|strip_tags|truncate:150 nofilter}</p>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
        {include file="modules/pagination.tpl" class="page-numbers"}
    </div>
</div>

{include file="footer.tpl"}

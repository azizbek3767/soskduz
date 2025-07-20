{include file="header.tpl" title=$article.meta_title keywords=$article.keywords description=$article.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="news-article-wrapper hidden-sm hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="other-news">
    				{fetch_articles assign=sectionArticles section=$article.section.sectionId limit=4 type_content="news"}
                    {if isset($sectionArticles)}
                    {foreach item=content from=$sectionArticles name=sectionArticles}{if $article.articleId ne $content.articleId}
					<div class="novelty-item">
						<span><i class="icmcalendar"></i>{$content.publishedOn|date_format:"%e.%m.%Y"}</span>
						<h2><a href="{$content.url}">{$content.title}</a></h2>
						<p data-text-limit="150">{$content.summary|strip_tags|truncate:150 nofilter}</p>
					</div>
					{/if}{/foreach}
                    {/if}
				</div>
			</div>
			<div class="col-md-offset-1 col-md-8">
				<div class="main-novelty ">
    				{if isset($article.images)}
						{if $article.images.original.url}
		    				<div class="img-content"><img src="{$article.images.original.url}" alt="{$article.alias}"></div>
    					{else}
		    				<div class="img-content"><img src="{$article.images.medium.url}" alt="{$article.alias}"></div>
    					{/if}
    				{/if}
					<div class="desc-content">
						<span><i class="icmcalendar"></i>{$article.publishedOn|date_format:"%e.%m.%Y"}</span>
						<h2>{$article.title}</h2>

						{$article.content|replace:'http://old.sos-kd.uz/':'/old/' nofilter}
					</div>

					<div class="buttons-content">
						<div class="back-button"><span><a href="javascript:;" onclick="goBack()">{$LANG.go_back}</a></span></div>
						<div class="social">
							<p style="margin-right: 10px;">{$LANG.share}</p>
							<div class="social-items">
								<div class="sharethis-inline-share-buttons"></div>
{*								<span><a href="tg://msg_url?url={$article.url|escape:'url'}&text={$article.title}" target="_blank" rel='nofollow'><i class="fa fa-telegram" aria-hidden="true"></i></a></span>*}
{*                                <span><a href="https://www.facebook.com/sharer/sharer.php?u={$article.url}&title={$article.title}" title="Поделиться в Facebook" target="_blank" rel='nofollow' style="color: #3a5794"><i class="fa fa-facebook-square"></i></a></span>*}
{*                                <span><a href="https://www.linkedin.com/sharing/share-offsite/?url={$article.url}" title="Поделиться в Linkedin" target="_blank" rel='nofollow' style="color: black"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></span>*}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="news-article-wrapper hidden-md hidden-lg">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-8">
				<div class="main-novelty ">
    				{if isset($article.images)}<div class="img-content"><img src="{$article.images.original.url}" alt="{$article.alias}"></div>{/if}
					<div class="desc-content">
						<span><i class="icmcalendar"></i>{$article.publishedOn|date_format:"%e.%m.%Y"}</span>
						<h2>{$article.title}</h2>
						{$article.content|replace:'http://old.sos-kd.uz/':'/old/' nofilter}
					</div>
					<div class="img-content">
{* 						{if isset($article.images)}<div class="img-content"><img src="{$article.images.original.url}" alt="{$article.title}"></div>{/if} *}
					</div>
					<div class="buttons-content">
						<div class="back-button"><span><a href="javascript:;" onclick="goBack()">{$LANG.go_back}</a></span></div>
						<div class="social">
							<p style="margin-right: 10px;">{$LANG.share}</p>
							<div class="social-items">
								<div class="sharethis-inline-share-buttons"></div>
{*    							<span><a href="tg://msg_url?url={$article.url|escape:'url'}&text={$article.title}" target="_blank" rel='nofollow'><i class="icm icm-telegram"></i></a></span>
                                <span><a href="https://www.facebook.com/sharer/sharer.php?u={$article.url}&title={$article.title}" title="Поделиться в Facebook" target="_blank" rel='nofollow'><i class="fa fa-facebook-square"></i></a></span>*}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="other-news">
					{fetch_articles assign=sectionArticles section=$article.section.sectionId limit=4 type_content="news"}
                    {if isset($sectionArticles)}
                    {foreach item=content from=$sectionArticles name=sectionArticles}{if $article.articleId ne $content.articleId}
					<div class="novelty-item">
						<span><i class="icmcalendar"></i>{$article.publishedOn|date_format:"%e.%m.%Y"}</span>
						<h2><a href="{$content.url}">{$content.title}</a></h2>
						<p data-text-limit="150">{$content.summary|strip_tags|truncate:150 nofilter}</p>
					</div>
					{/if}{/foreach}
                    {/if}
				</div>
			</div>
		</div>
	</div>
</div>

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5fab7b414f148e0012a5b837&product=inline-share-buttons' async='async'></script>
{include file="footer.tpl"}

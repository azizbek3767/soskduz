{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}

<!-- Хлебные крошки -->
<noindex>
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}



<div class="documents-wrapper">

	<div class="container">

		<div class="page-name"><h1>{$section.name}</h1></div>

		<div class="row">

			{fetch_articles perPage=12 assign=sectionArticles section=$section.sectionId assignPagination=pagination page=$page path=$section.path seFriendly=true}

            {foreach item=article from=$sectionArticles name=sectionArticles}

			<div class="col-md-4">

				<div class="documents-item">

					{if isset($article.files)}

					<div class="documents-top">

						<div class="documents-img">

							{if $article.files.ext eq docx || $article.files.ext eq doc}

							<div class="img"><img src="{$THEME_URL}/img/doc.png"></div>

							{elseif $article.files.ext eq xlsx || $article.files.ext eq xls}

							<div class="img"><img src="{$THEME_URL}/img/excel.png"></div>

							{/if}

						</div>

						<div class="documents-download">

							<a href="{$article.files.url}" download=""><i class="fa fa-download"></i> <p>{$LANG.download} | {$article.files.size|fsize_format} {$article.files.ext}</p></a>

						</div>

					</div>

					{/if}

					<div class="documents-bottom">

						<div class="desc"><h2>{$article.title}</h2><p data-text-limit="156">{$article.summary|strip_tags|truncate:156 nofilter}</p></div>

					</div>

				</div>

			</div>

			{/foreach}

		</div>

		{include file="modules/pagination.tpl" class="page-numbers"}

	</div>

</div>
</noindex>
{include file="footer.tpl"}
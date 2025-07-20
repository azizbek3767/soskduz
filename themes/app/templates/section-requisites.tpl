{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}

<!-- Хлебные крошки -->
<noindex>
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}



<div class="requisites-wrapper">

	<div class="container">

		<div class="page-name"><h1>{$section.name}</h1></div>

		<div class="requisites-main">

			<div class="row">

				<div class="desc-content col-md-5">{$section.summary nofilter}</div>

				<div class="table-content col-md-7">{$section.content nofilter}</div>

			</div>

		</div>

	</div>

</div>
</noindex>
{include file="footer.tpl"}
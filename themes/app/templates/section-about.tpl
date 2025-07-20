{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="about">
	<div class="container p-v-30">
		<div class="entry-content text-img-item text-item">
			<img src="{$section.images.original.url}"  alt="{$section.name}" style="float: left;">
			<h1>{$section.name}</h1>
			<br>
			{$section.content nofilter}
		</div>
	</div>
	<br><br>
</div>
{include file="footer.tpl"}
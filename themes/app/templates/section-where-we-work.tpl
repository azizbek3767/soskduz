{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="where-wrapper">
	<div class="container">
		<div class="page-name">
			<h1>{$section.name}</h1>
		</div>




		{fetch_sections assign=regions from=$section.sectionId status="visible" maps=true}
		<div class="traderoutes">
			<div class="container p-v-md">
				<div class="traderoutes-content">
					<div class="traderoutes-items" data-container-country>

						{foreach item=region from=$regions name=regions}
							<div class="item {$region.fileName} {if $region.top_menu eq 0}hiddem-xs hidden-sm{/if}" data-country="{$smarty.foreach.regions.iteration}">
								<a href="{$region.url}">
									{if $region.top_menu eq 1}
										<h5>{$LANG.city}</h5>
									{else}
										{if $region.sectionId ne 44}<h5>{$LANG.region}</h5>{/if}
									{/if}

									<h4>{$region.name}</h4>
									<div class="text-item">{$region.summary nofilter}</div>
								</a>
							</div>
						{/foreach}

					</div>
					<div class="traderoutes-map">
						{foreach item=region from=$regions name=regions}{if $region.top_menu eq 1}
							<img src="{$THEME_URL}/img/spec-marker.png" class="spec-marker-{$region.fileName}">
							{if $region.fileName == 'khorezm' || $region.fileName == 'xorazm' || $region.fileName == 'xorezm'}
								<h4 class="spec-marker-{$region.fileName}" style="left: 13% !important; top: 47% !important;font-weight: bold;">{$region.name}</h4>
							{else}
								<h4 class="spec-marker-{$region.fileName}" style="font-weight: bold;{if $region.fileName == 'samarkand' || $region.fileName == 'samarqand'}top: 63%;left:50%;{else}top: 47%;right:27%;{/if}">{$region.name}</h4>
							{/if}
						{/if}{/foreach}
						<svg width="1100" height="700">
							<g transform="scale(1.8333333333333333) translate(0, 23.636363636363658)">

								{foreach item=region from=$regions name=regions}
									{$region.code_maps nofilter}
								{/foreach}
							</g>
						</svg>
					</div>
					
				</div>
			</div>
				{if isset($section.images)}
			<div class="img-content" style="margin-bottom: 40px;"><img src="{$section.images.original.url}" alt="{$section.name}" style="width: 100%;"></div>{/if}
		<div class="desc-content">{$section.content|replace:'img/':'../uploads/files/' nofilter}</div>
		</div>
	</div>
</div>
{include file="footer.tpl"}

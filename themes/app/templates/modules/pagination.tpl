{if isset($pagination.pages)}      
	<div class="{$class}">
        <ul class="page-numbers-items">
		{if isset($pagination.previousPage)}
			<li class="prev-page"><a href="{$pagination.previousPage.url}"><i class="icmangle-arrow-down"></i></a></li>
		{/if}
		{foreach from=$pagination.pages item=pageNum}
			{if $pageNum.num eq $page}
				<li class="active"><a href="{$pageNum.url}">{$pageNum.num}</a></li>
			{elseif $pageNum.num eq '...'}
				<li>...</li>
			{else}
				<li><a href="{$pageNum.url}">{$pageNum.num}</a></li>
			{/if}
		{/foreach}
		{if isset($pagination.nextPage)}
			<li class="next-page"><a href="{$pagination.nextPage.url}"><i class="icmangle-arrow-down"></i></a></li>
		{/if}
		</ul>
	</div>
{/if}
<div class="{$class}">
	<div class="container">
        <ol class="breadcrumb font-w-6">
        	<li><a href="{$SITE_URL}">{$LANG.home}</a></li>
        	{foreach item=navItem from=$sectionParents name=navItems}
        		{if $smarty.foreach.navItems.last}
        			{if isset($boldLastItem)}
        				<li class="active"><a href="{$navItem.url}">{$navItem.alias}</a></li>
        			{elseif isset($noLastLink)}
        				<li>{$navItem.name}</li>
        			{else}
        				<li class="active"><a href="{$navItem.url}">{$navItem.alias}</a></li>
        			{/if}
        		{else}
        			<li><a href="{$navItem.url}" >{$navItem.alias}</a></li>
        		{/if}
        	{/foreach}
        </ol>
    </div>
</div>
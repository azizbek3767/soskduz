<form method="post" {if $action}action="{$action}"{/if}>
	<div class="col-md-2 text-center">
    	{if isset($filterErrorCode) and $filterErrorCode ne ''}
		    {html_options options=$filterErrorCodeOptions selected=$filterErrorCode name="filterErrorCode" onchange="this.form.submit()" class="form-control select"}
        {else}
            {html_options options=$filterErrorCodeOptions name="filterErrorCode" onchange="this.form.submit()" class="form-control select"}
        {/if}
	</div>
</form>

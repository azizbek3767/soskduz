<form method="post" {if $action}action="{$action}"{/if}>
    <div class="col-md-2 text-center">
        {if isset($filterTypeId)}
            {html_options options=$filterTypeOptions selected=$filterTypeId|default:0 name="filterTypeId" onchange="this.form.submit()" class="form-control select"}
        {else}
            {html_options options=$filterTypeOptions name="filterTypeId" onchange="this.form.submit()" class="form-control select"}
        {/if}

    </div>
</form>

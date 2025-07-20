<div class="col-md-2 text-center">
    <form method="post">
	    {if isset($filterTypeId)}<input type="hidden" name="filterTypeId" value="{$filterTypeId}" />{/if}
        {html_options options=$simplePeriods selected=$simplePeriod|default:"last7days" name="newSimplePeriod" onchange="this.form.submit()" class="form-control select"}
	</form>
</div>
<div class="col-md-8 date text-right">
    <form method="post">
        {if isset($filterTypeId)}<input type="hidden" name="filterTypeId" value="{$filterTypeId}" />{/if}
        {html_select_date start_year=2018 month_format="%b" time=$dateStart|strtotime field_array="newDateStart" prefix="" class="form-control select"} &nbsp;-&nbsp;
        {html_select_date start_year=2018 month_format="%b" time=$dateEnd|strtotime field_array="newDateEnd" prefix="" class="form-control select"}
        <input class="btn btn-warning" type="submit" value="{stats:show}" />
    </form>
</div>



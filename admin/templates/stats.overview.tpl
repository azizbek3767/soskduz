{include file="header.tpl" activeItem="overview" title="{stats:overviewTitle} - {header:statistics}"}
<script type="text/javascript" src="assets/js/raphael-min.js"></script>
<script type="text/javascript" src="assets/js/morris.min.js"></script>

<div class="page-content-wrap">
	<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top"><h2>{header:statistics}</h2></div>
</div>                

<div class="row">                              
    <div class="form-group main">
        <div class="col-md-12">
            <div class="col-md-3 text-left">
                <form method="post">
                    {if isset($filterTypeId)}<input type="hidden" name="filterTypeId" value="{$filterTypeId}" />{/if}
                    {html_options options=$simplePeriods selected=$simplePeriod|default:"last7days" name="newSimplePeriod" onchange="this.form.submit()" class="form-control select"}
                </form>
            </div>
            <div class="col-md-9 text-right date">
                <form method="post">
                    {if isset($filterTypeId)}<input type="hidden" name="filterTypeId" value="{$filterTypeId}" />{/if}
                    <div class="col-md-5"></div>
                    {html_select_date start_year=2015 month_format="%b" time=$dateStart|strtotime field_array="newDateStart" prefix="" class="form-control select"} &nbsp;-&nbsp; 
                    {html_select_date start_year=2015 month_format="%b" time=$dateEnd|strtotime field_array="newDateEnd" prefix="" class="form-control select"}
                    <input class="btn btn-warning" type="submit" value="{stats:show}" />
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

{if isset($days)} 

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><div class="panel-title-box"><h3>{stats:visitors}</h3></div></div>
            <div class="panel-body padding-0" id="total{$smarty.foreach.days.iteration}"><div class="chart-holder" id="visitors" style="height: 300px;"></div></div>
        </div>
        <script>
            Morris.Line({
                element: 'visitors',
                data: [ {foreach item=day from=$days name=days}
                { 
                    y: '{$day.date nofilter}', 
                    a: {$day.newVisitors|number_format:0:",":"."},
                    b: {$day.retVisitors|number_format:0:",":"."},
                    c: {$day.newVisitors+$day.retVisitors|number_format:0:",":"."},
                },
                {/foreach} ],
                xkey: 'y',
                ykeys: ['a','b', 'c'],
                labels: ['{stats:newVisitors}', '{stats:returningVisitors}', '{stats:totalVisitors}'],
                resize: true,
                hideHover: true,
                xLabels: 'day',
                gridTextSize: '10px',
                lineColors: ['#3c5a96','#f10000', '#2ED621'],
                gridLineColor: '#E5E5E5'
		    });             
        </script>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Просмотры за весь период</h3></div>
            <div class="panel-body"><div id="donut" style="height: 268px;"></div></div>
        </div>
    </div>
    <script> 
		Morris.Donut({
			element: 'donut',
			data: [
			    { 
				    label: "Всего просмотров за сегодня", 
                    value: {$day.articleVisits+$day.sectionVisits+$day.searchVisits|number_format:0:",":"."} 
				},
                {
                    label: "{stats:totalVisitors}", 
                    value: {$totals.visitors|number_format:0:",":"."}
                },
                {
                    label: "{stats:totalVisits}", 
                    value: {$totals.visits|number_format:0:",":"."}
                }
            ],
            colors: ['#95B75D', '#3FBAE4', '#FEA223']
	    });            
    </script>
        
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><div class="panel-title-box"><h3>{stats:visits}</h3></div></div>                                
            <div class="panel-body padding-0"><div class="chart-holder" id="views" style="height: 250px;"></div></div>
        </div>
        <script> 	
            Morris.Bar({
                element: 'views',
                data: [{foreach item=day from=$days name=days}
                { 
                    y: '{$day.date nofilter}',
                    a: {$day.sectionVisits|number_format:0:",":"."}, 
                    b: {$day.articleVisits|number_format:0:",":"."}, 
                    c: {$day.articleVisits+$day.sectionVisits+$day.searchVisits|number_format:0:",":"."} 
                },
                {/foreach}],
    	        xkey: 'y',
    	        ykeys: ['a', 'b', 'c'],
    	        labels: ['Просмотр страниц', 'Просмотр статей',  '{stats:totalVisits}'],
    	        barColors: ['#3c5a96', '#D67C10', '#f10000'],
    	        gridTextSize: '10px',
    	        hideHover: true,
    	        resize: true,
    	        gridLineColor: '#E5E5E5'
			 });            
        </script>
    </div>
</div>

{/if}

{include file="footer.tpl"}	
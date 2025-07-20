{include file="header.tpl" activeItem="bots" title="{stats:botsTitle} - {header:statistics}"}
<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>{stats:botsTitle}</h2></div>                           
    </div>
</div>
<div class="form-group main">                                        
    <div class="col-md-12">
        {include file="stats.type-selector.tpl" action="stats.visitors.php"}
        {include file="stats.date-selector.tpl"}
    </div>
</div>
<div class="clear"></div>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body panel-body-table">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-actions">
                    <thead>
                        <tr>
                            <th class="text-center" width="100">{stats:useragent}</th>
                            <th class="text-center">{stats:visits}</th>
                        </tr>
                    </thead>
                    <tbody>
                    {if isset($visitors)}
                	{foreach item=visitor from=$visitors}
                	<tr>
                		<td class="data small" width="100%">{$visitor.botName|default:$visitor.userAgent}</td>
                		<td class="data small action" align="center" onClick="return openWindow('stats.bot.php?visitorId={$visitor.visitorId}{if isset($filterTypeId)}&filterTypeId={$filterTypeId}{/if}', 800, 610)">{$visitor.totalVisits}</td>
                	</tr>
                	{/foreach}
                  	<tr>
                    <table cellpadding="0" cellspacing="0" width="100%"><tr>
                 	 <td class="small">{general:results}</td>
                     <td align="right">
          		     {if isset($pageNums.pages)}             
                        <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                            {if $pageNums.previousPage}
                                <li><a href="stats.bots.php?page={$pageNums.previousPage}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}" class="pageNum">&laquo; {general:prevPage}</a></li>
                            {/if}
                            {foreach from=$pageNums.pages item=number}
                                {if $number eq $page}
                                    <li class="active"><a href="stats.bots.php?page={$number}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}" class="pageNum">{$number}</a></li>
                                {elseif $number eq '...'}
                				    ...
                                {else}
                				    <li><a href="stats.bots.php?page={$number}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}" class="pageNum">{$number}</a></li>
                                {/if}
                            {/foreach}
                            {if $pageNums.nextPage}
                                <li><a href="stats.bots.php?page={$pageNums.nextPage}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}">{general:nextPage} &raquo;</a></li>
                            {/if}
                        </ul>  
                    {/if}
                    </tr></table>
                   	</td></tr>
                    {else}
                   	<tr class="odd">
                  		<td class="data none" colspan="3" align="center">- {general:none} -</td>
                   	</tr>
                   	<tr><td colspan="3">&nbsp;</td></tr>
                    {/if}
                    </tbody>
                </table>
            </div>                                
        </div>
    </div>
</div>


{include file="footer.tpl"}
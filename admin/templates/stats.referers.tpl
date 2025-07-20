{include file="header.tpl" activeItem="referers" title="{stats:referersTitle} - {header:statistics}"}
<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>{stats:referersTitle}</h2></div>                           
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
                            <th class="text-center" width="100">{stats:visitors}</th>
                            <th class="text-center">{stats:referer}</th>
                        </tr>
                    </thead>
                    <tbody>                                            
                    {if $referers}
                	{foreach item=referer from=$referers name=referers}
                	{cycle values='odd,even' assign=class}
                	<tr>
                		<td class="data action" onclick="document.location='stats.visitors.php?domain={$referer.domain|escape:'url'|default:'unknown'}{if isset($filterTypeId)}&filterTypeId={$filterTypeId}{/if}'" align="center">
	                		<a href="stats.visitors.php?domain={$referer.domain|escape:'url'|default:'unknown'}{if isset($filterTypeId)}&filterTypeId={$filterTypeId}{/if}">
		                		{$referer.totalVisitors}
		                	</a>
		               	</td>
                		<td class="data" width="100%">{$referer.website|truncate:40|default:'(неизвестный)'}</td>
                	</tr>
                	{if isset($referer.isSplit)}
                		</table></td><td width="2%"></td><td valign="top" width="49%">
                		<table cellpadding="5" cellspacing="0" width="100%">
                		<tr class="header">
                			<th class="data small">{stats:visitors}</th>
                			<th class="data small">{stats:referer}</th>
                		</tr>
                	{/if}
                	{/foreach}
                    
                   	<tr>
                    <table cellpadding="0" cellspacing="0" width="100%"><tr>
                 	 <td class="small">{general:results}</td>
                     <td align="right">
          		     {if isset($pageNums.pages)}             
                        <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                        
                            {foreach from=$pageNums.pages item=number}
                                {if $number eq $page}
                                    <li class="active"><a href="stats.referers.php?page={$number}{if isset($filterTypeId)}&filterTypeId={$filterTypeId}{/if}" class="pageNum">{$number}</a></li>
                                {else}
                				    <li><a href="stats.referers.php?page={$number}{if isset($filterTypeId)}&filterTypeId={$filterTypeId}{/if}" class="pageNum">{$number}</a></li>
                                {/if}
                            {/foreach}
                            
                        </ul>  
                    {/if}
                    </tr></table>
                   	</td></tr>
                    {else}
                   	<tr class="odd"><td class="data none" colspan="3" align="center">- {general:none} -</td></tr>
                   	<tr><td colspan="3">&nbsp;</td></tr>
                    {/if}
                    </tbody>
                </table>
            </div>                                
        </div>
    </div>
</div>





{include file="footer.tpl"}
{include file="header.tpl" activeItem="errors" title="{stats:visitor}"}
<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>{stats:errorInfo}</h2></div>                           
    </div>
</div>
<div class="form-group main">                                        
    <div class="col-md-12">
        {include file="stats.date-selector.tpl"}
    </div>
</div>
<div class="clear"></div>
<div class="col-md-12">
	<div class="col-md-4 nopadding">
	    <div class="panel panel-default">
	        <div class="panel-body panel-body-table">
	            <div class="table-responsive">
	                <table class="table table-bordered table-striped table-actions">
	                    <thead><tr><th colspan="2" class="data text-center" nowrap="nowrap">{stats:errorInfo}</th></tr></thead>
	                    <tbody>                                            
							<tr class="{cycle values='odd,even'}">
								<td class="data" align="right" width="150">{stats:requestUri}:</td>
								<td class="data">
									<a href="{$requestUri|urldecode|escape}" target="_blank">{$requestUri|urldecode|escape}</a>
								</td>
							</tr>
						</tbody>
	                </table>
	            </div>                                
	        </div>
	    </div>
	</div>
	<div class="col-md-8 nopadding">
	    <div class="panel panel-default">
	        <div class="panel-body panel-body-table">
	            <div class="table-responsive">
	                <table class="table table-bordered table-striped table-actions">
	                    <thead>
	                        <tr>
	                            <th class="text-center" style="min-width:120px;">{stats:referer}</th>
								<th class="text-center" style="min-width:100px;">{general:date}</th>
								<th class="text-center">{stats:visitorId}</th>
	                        </tr>
	                    </thead>
	                    <tbody>                                            
		                    {if $visits}
							{foreach item=visit from=$visits name=visits}
							<tr id="visit-{$visit.visitId}">
		                  		<td class="data small" width="100%">{if $visit.referer}<a href="{$visit.referer}" target="_blank">{$visit.referer|truncate:80}</a>{else}{stats:unknown}{/if}</td>
								<td class="data small" align="right" nowrap="nowrap">{$visit.visitDate}</td>
								<td class="data small action" onclick="document.location='stats.visitor.php?visitorId={$visit.visitorId}'" align="center">{$visit.visitorId}</td>
	
		                   	</tr>
		                   	{/foreach}
						   	<tr>
						   		<td colspan="3" align="right">
									{if isset($pageNums.pages)}
									<table cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td class="small">{general:results}</td>
											<td class="small" align="right">
												<ul class="pagination pagination-sm pull-right push-down-10 push-up-10">	
												{foreach from=$pageNums.pages item=number}
													{if $number eq $page}
													<li class="active"><a href="stats.error.php?requestUri={$requestUri}&page={$number}" class="pageNum">{$number}</a></li>
													{elseif $number eq '...'}
														<li><a>... </a></li>
													{else}
													 <li><a href="stats.error.php?requestUri={$requestUri}&page={$number}" class="pageNum">{$number}</a></li>
													{/if}
												{/foreach}
			                                </ul>  
											</td>
										</tr>
									</table>
									{/if}
								</td>
							</tr>
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
</div>
{include file="footer.tpl"}
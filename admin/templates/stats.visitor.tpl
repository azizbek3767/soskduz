{include file="header.tpl" activeItem="visitor" title="{stats:visitor}"}
<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
        <div class="page-title"><h2>{stats:visitor}</h2></div>                           
    </div>
</div>
<div class="form-group main">                                        
    <div class="col-md-12">
        {include file="stats.type-selector.tpl" action="stats.visitor.php?visitorId=$visitorId"}
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
	                    <thead>
	                        <tr>
	                            <th colspan="2" class="data text-center" nowrap="nowrap">{stats:visitorInfo}</th>
	                        </tr>
	                    </thead>
	                    <tbody>                                            
						
							
							<tr>
								<td class="data" align="right" width="120">{stats:visitorId}:</td>
								<td class="data">
									<form autocomplete="off" method="get" action="stats.visitor.php">
										<div class="col-md-8 nopadding"><input type="text" name="visitorId" value="{$visitorId}" size="5" class="form-control" /></div>
										<div class="col-md-4"><input type="submit" value="Сменить" class="btn btn-warning" /></div>
									</form>
								</td>
							</tr>
							<tr>
								<td class="data" align="right" width="120">{stats:referer}:</td>
								<td class="data">
									{if isset($visitor.refererUrl)}
										<a href="{$visitor.refererUrl}" target="_blank">
											{if isset($visitor.refererWebsite)}
												{$visitor.refererWebsite|truncate:50}
											{else}
												{$visitor.refererUrl|truncate:50}
											{/if}
										</a>
									{else}
										{$visitor.referer|truncate:50}
									{/if}
								</td>
							</tr>
							
							{if isset($visitor.searchPhrase)}
							<tr>
								<td class="data" align="right" nowrap="nowrap">{stats:searchQuery}:</td>
								<td class="data small">{$visitor.searchPhrase|truncate:50}</td>
							</tr>
							{/if}
							<tr class="{cycle values='odd,even'}">
								<td class="data" align="right" nowrap="nowrap">{stats:visitorIp}:</td>
								<td class="data small">{$visitor.visitorIp} (<a href="http://whois.domaintools.com/{$visitor.visitorIp}" target="_blank">{stats:whois}</a>)</td>
							</tr>
							<tr class="{cycle values='odd,even'}">
								<td class="data" align="right">{stats:useragent}:</td>
								<td class="data small" title="{$visitor.userAgent}">{$visitor.userAgent}</td>
							</tr>
	                    </tbody>
	                </table>
	                <table class="table table-bordered table-striped table-actions">
	                    <thead>
	                        <tr>
	                            <th colspan="2" class="data text-center" nowrap="nowrap">{stats:firstVisit}</th>
	                        </tr>
	                    </thead>
	                    <tbody>
							<tr>
								<td class="data" align="right" width="120">{general:date}:</td>
								<td class="data" nowrap="nowrap">{$visitor.firstVisitOn nofilter}</td>
							</tr>
							<tr>
								<td class="data" align="right" nowrap="nowrap" width="120">{stats:type}:</td>
								<td class="data">
								{if $visitor.firstVisit.typeId eq 6}
									<span class="code{$visitor.firstVisit.errorCode}">{stats:error} {$visitor.firstVisit.errorCode}</span>
								{elseif $visitor.firstVisit.typeName}
									{$visitor.firstVisit.typeName nofilter}
								{/if}
								</td>
							</tr>
							<tr>
								<td class="data" align="right" width="120">{stats:page}:</td>
								<td class="data">
								{if isset($visitor.firstVisit.typeId) and $visitor.firstVisit.typeId eq 1}
									<a href="{$SITE_URL}/" target="_blank">{stats:homePage}</a>
								{elseif $visitor.firstVisit.typeId eq 2 && $visitor.firstVisit.name}
									<a href="{$visitor.firstVisit.url}" target="_blank">{$visitor.firstVisit.name|truncate:50}</a>
								{elseif $visitor.firstVisit.typeId eq 3 && $visitor.firstVisit.title}
									<a href="{$visitor.firstVisit.url}" target="_blank">{$visitor.firstVisit.title|truncate:50} </a>
								{elseif $visitor.firstVisit.typeId eq 4}
									<a href="{$SITE_URL}/search.php?query={$visitor.firstVisit.searchQuery|escape:'url'}&page={$visitor.firstVisit.searchPage}" target="_blank">{$visitor.firstVisit.searchQuery|truncate:50}</a>
								{elseif $visitor.firstVisit.typeId eq 6}
									<a href="{$visitor.firstVisit.requestUri}" target="_blank">{$visitor.firstVisit.requestUri|truncate:50}</a>
									{if isset($visitor.firstVisit.refererUrl)}(<a href="{$visitor.firstVisit.refererUrl}" target="_blank">{"{stats:referer}"|strtolower}</a>){/if}
								{elseif $visitor.firstVisit.typeId eq 7}
									{if !isset($visitor.firstVisit.section)}
										<a href="{$SITE_URL}/rss.xml" target="_blank">{stats:genRss}</a>
									{elseif $visitor.firstVisit.section}
										<a href="{$visitor.firstVisit.section.path}/rss.xml" target="_blank">{$visitor.firstVisit.section.name|truncate:35}</a>
									{else}
										{stats:unknown}
									{/if}
								{elseif $visitor.firstVisit.typeId eq 8}
									<a href="{$SITE_URL}/sitemap.{$config.file_extension}" target="_blank">{stats:genSitemap}</a>
								{elseif $visitor.firstVisit.typeId eq 9}
									<a href="{$SITE_URL}/sitemap.xml" target="_blank">{stats:xmlSitemap}</a>
								{elseif $visitor.firstVisit.typeId eq 11}
									<a href="{$visitor.firstVisit.url}" target="_blank">{$visitor.firstVisit.alias|default:$visitor.firstVisit.title|truncate:45}</a>
								{elseif $visitor.firstVisit.typeId eq 12}
									<a href="{$visitor.firstVisit.url}" target="_blank">{$visitor.firstVisit.alias|default:$visitor.firstVisit.title|truncate:45}</a>
								{elseif $visitor.firstVisit.typeId eq 13}
									<a href="{$visitor.firstVisit.url}" target="_blank">{$visitor.firstVisit.alias|default:$visitor.firstVisit.title|truncate:45}</a>
								{else}
									{stats:unknown}
								{/if}
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
	                            <th class="text-center" style="min-width:120px;">{general:date}</th>
								<th class="text-center" style="min-width:100px;">{stats:type}</th>
								<th class="text-center">{stats:visit}</th>
	                        </tr>
	                    </thead>
	                    <tbody>                                            
	                    {if $visits}
						{foreach item=visit from=$visits name=visits}
						
	                   	<tr id="visit-{$visit.visitId}" {if isset($visit.isHidden)}style="display:none"{/if}>
	                  		<td class="data small text-center" align="right" nowrap="nowrap">
		                  		{$visit.visitDate nofilter}
		                  	</td>
	                  		<td>
		                  		{if $visit.typeId eq 6}
									<span class="code{$visit.errorCode}">{stats:error} {$visit.errorCode}</span>
								{else}
									{$visit.typeName nofilter}
								{/if}
		                  	</td>
	                  		<td class="data" width="100%">
		                  		{if isset($visit.typeId) and $visit.typeId eq 1}
									<a href="{$SITE_URL}/" target="_blank">{stats:homePage}</a>
								{elseif $visit.typeId eq 2 && $visit.name}
									<a href="{$visit.url}" target="_blank">{$visit.name|truncate:60}</a>
								{elseif $visit.typeId eq 3 && $visit.title}
									<a href="{$visit.url}" target="_blank">{$visit.title|truncate:60}</a>
								{elseif $visit.typeId eq 4}
									<a href="{$SITE_URL}/search.php?query={$visit.searchQuery|escape:'url'}&page={$visit.searchPage}" target="_blank">{$visit.searchQuery|truncate:60}</a>
								{elseif $visit.typeId eq 6}
									<a href="{$visit.requestUri}" target="_blank">{$visit.requestUri|truncate:60}</a>
									{if isset($visit.refererUrl)}(<a href="{$visit.refererUrl}" target="_blank">{"{stats:referer}"}</a>){/if}
								{elseif $visit.typeId eq 7}
									{if !isset($visit.section)}
										<a href="{$SITE_URL}/rss.xml" target="_blank">{stats:genRss}</a>
									{elseif $visit.section}
										<a href="{$visit.section.path}/rss.xml" target="_blank">{$visit.section.name|truncate:60}</a>
									{else}
										{stats:unknown}
									{/if}
								{elseif $visit.typeId eq 8}
									<a href="{$SITE_URL}/sitemap.{$config.file_extension}" target="_blank">{stats:genSitemap}</a>
								{elseif $visit.typeId eq 9}
									<a href="{$SITE_URL}/sitemap.xml" target="_blank">{stats:xmlSitemap}</a>
								{elseif $visit.typeId eq 10}
									<a href="{$visit.url}" target="_blank">{$visit.alias|default:$visit.title|truncate:60}</a>
								{elseif $visit.typeId eq 11}
									<a href="{$visit.url}" target="_blank">{$visit.alias|default:$visit.title|truncate:60}</a>
								{elseif $visit.typeId eq 12}
									<a href="{$visit.url}" target="_blank">{$visit.alias|default:$visit.title|truncate:60}</a>
								{elseif $visit.typeId eq 13}
									<a href="{$visit.url}" target="_blank">{$visit.alias|default:$visit.title|truncate:60}</a>
								{else}
									{stats:unknown}
								{/if}
	                  		</td>
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
												<li class="active">
													<a href="stats.visitor.php?visitorId={$visitorId}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}&page={$number}" class="pageNum">{$number}</a>
												</li>
												{elseif $number eq '...'}
													...
												{else}
												 <li>
													<a href="stats.visitor.php?visitorId={$visitorId}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}&page={$number}" class="pageNum">{$number}</a>
												 </li>
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
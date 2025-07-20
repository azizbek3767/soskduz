<html>
<head>
	<title>{$visitor.userAgent}</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$config.charset}">
	<link href="style.css" type="text/css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<script type="text/javascript" src="script.js"></script>
</head>
<body style="padding:0; margin:0">

<table cellpadding="0" cellspacing="5" width="100%" align="center">
	<tr><td colspan="2" align="center"><table cellpadding="3" cellspacing="0" width="100%" class="items"><tr><td>
		<table cellpadding="0" cellspacing="0" align="right"><tr>
			<td>{include file="stats.type-selector.tpl" action="stats.bot.php?visitorId=$visitorId"}</td>
			<td>&nbsp; | &nbsp;</td>
			<td>{include file="stats.date-selector.tpl"}</td>
		</tr></table>
	</td></tr></table></td></tr><tr><td valign="top">
		<table cellpadding="3" cellspacing="0" align="center">
			<tr class="header">
				<th colspan="2" class="data small" nowrap="nowrap">{stats:botInfo}</th>
			</tr>
			{cycle values='odd,even' assign=class}
			{if $class ne 'even'}{cycle values='odd,even' assign=class}{/if}
			<tr class="{cycle values='odd,even'}">
				<td class="data small" align="right">{stats:visitorId}:</td>
				<td class="data small"><form autocomplete="off" method="get" action="stats.bot.php"><input type="text" name="visitorId" value="{$visitorId}" size="5" class="data small" /> <input type="submit" value="Switch" class="data small" /></form></td>
			</tr>
			{if $visitor.referer}
			<tr class="{cycle values='odd,even'}">
				<td class="data small" align="right">{stats:referer}:</td>
				<td class="data small">{if $visitor.refererUrl}<a href="{$visitor.refererUrl}" target="_blank">{if $visitor.refererWebsite}{$visitor.refererWebsite|truncate:50}{else}{$visitor.refererUrl|truncate:50}{/if}</a>{else}{$visitor.referer|truncate:50}{/if}</td>
			</tr>
			{/if}
			{if $visitor.searchPhrase}
			<tr class="{cycle values='odd,even'}">
				<td class="data small" align="right" nowrap="nowrap">{stats:searchQuery}:</td>
				<td class="data small">{$visitor.searchPhrase|truncate:50}</td>
			</tr>
			{/if}
			<tr class="{cycle values='odd,even'}">
				<td class="data small" align="right" nowrap="nowrap">{stats:botIp}:</td>
				<td class="data small">{$visitor.visitorIp} (<a href="http://whois.domaintools.com/{$visitor.visitorIp}" target="_blank">{stats:whois}</a>)</td>
			</tr>
			<tr class="{cycle values='odd,even'}">
				<td class="data small" align="right">{stats:useragent}:</td>
				<td class="data small" title="{$visitor.userAgent}">{$visitor.userAgent}</td>
			</tr>

			<tr><td>&nbsp;</td></tr>

			<tr class="header">
				<th colspan="2" class="data small" nowrap="nowrap">{stats:firstVisit}</th>
			</tr>
			<tr class="{cycle values='odd,even'}">
				<td class="data small" align="right">{general:date}:</td>
				<td class="data small" nowrap="nowrap">{$visitor.firstVisitOn|smarty:nodefaults}</td>
			</tr>
			<tr class="{cycle values='odd,even'}">
				<td class="data small" align="right" nowrap="nowrap">{stats:type}:</td>
				<td class="data small">
				{if $visitor.firstVisit.typeId eq 6}
					<span class="code{$visitor.firstVisit.errorCode}">{stats:error} {$visitor.firstVisit.errorCode}</span>
				{elseif $visitor.firstVisit.typeName}
					{$visitor.firstVisit.typeName|smarty:nodefaults}
				{/if}
				</td>
			</tr>
			<tr class="{cycle values='odd,even'}">
				<td class="data small" align="right">{stats:page}:</td>
				<td class="data small">
				{if $visitor.firstVisit.typeId eq 1}
					<a href="{$SITE_URL}/" target="_blank">{stats:homePage}</a>
				{elseif $visitor.firstVisit.typeId eq 2 && $visitor.firstVisit.name}
					<a href="{$visitor.firstVisit.url}" target="_blank">{$visitor.firstVisit.name|truncate:50}</a>
				{elseif $visitor.firstVisit.typeId eq 3 && $visitor.firstVisit.title}
					<a href="{$visitor.firstVisit.url}" target="_blank">{$visitor.firstVisit.title|truncate:50}</a>
				{elseif $visitor.firstVisit.typeId eq 4}
					<a href="{$SITE_URL}/search.php?query={$visitor.firstVisit.searchQuery|smarty:nodefaults|escape:'url'}&page={$visitor.firstVisit.searchPage}" target="_blank">{$visitor.firstVisit.searchQuery|truncate:50}</a>
				{elseif $visitor.firstVisit.typeId eq 6}
					<a href="{$visitor.firstVisit.requestUri}" target="_blank">{$visitor.firstVisit.requestUri|truncate:50}</a>
					{if $visitor.firstVisit.refererUrl}(<a href="{$visitor.firstVisit.refererUrl}" target="_blank">{"{stats:referer}"|strtolower}</a>){/if}
				{elseif $visitor.firstVisit.typeId eq 7}
					{if !$visitor.firstVisit.section}
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
				{elseif $visitor.firstVisit.typeId eq 10}
					<a href="{$visitor.firstVisit.url}" target="_blank">{$visitor.firstVisit.alias|default:$visitor.firstVisit.title|truncate:45}</a>
				{else}
					{stats:unknown}
				{/if}
				</td>
			</tr>
		</table><br />

	</td><td valign="top" width="100%">

		<table cellspacing="0" cellpadding="3" width="100%" class="items" id="visits">
			<tr class="header">
				<th class="data small">{general:date}</th>
				<th class="data small">{stats:type}</th>
				<th class="data small">{stats:visit}</th>
			</tr>
		{if $visits}
			{cycle values='odd,even' assign=class}
			{if $class ne 'even'}{cycle values='odd,even' assign=class}{/if}
			{foreach item=visit from=$visits name=visits}
			<tr id="visit-{$visit.visitId}" class="{cycle values='odd,even' advance=false}" onmouseover="this.oldClassName=this.className; this.className='{cycle values='odd,even'}Hov'" onmouseout="this.className=this.oldClassName; this.oldClassName=''" {if $visit.isHidden}style="display:none"{/if}>
				<td class="data small" align="right" nowrap="nowrap">{$visit.visitDate|smarty:nodefaults}</td>
				<td class="data small" nowrap="nowrap" align="center">
				{if $visit.typeId eq 6}
					<span class="code{$visit.errorCode}">{stats:error} {$visit.errorCode}</span>
				{else}
					{$visit.typeName|smarty:nodefaults}
				{/if}
				</td>
				<td class="data small" nowrap="nowrap" width="100%">
				{if $visit.typeId eq 1}
					<a href="{$SITE_URL}/" target="_blank">{stats:homePage}</a>
				{elseif $visit.typeId eq 2 && $visit.name}
					<a href="{$visit.url}" target="_blank">{$visit.name|truncate:60}</a>
				{elseif $visit.typeId eq 3 && $visit.title}
					<a href="{$visit.url}" target="_blank">{$visit.title|truncate:60}</a>
				{elseif $visit.typeId eq 4}
					<a href="{$SITE_URL}/search.php?query={$visit.searchQuery|smarty:nodefaults|escape:'url'}&page={$visit.searchPage}" target="_blank">{$visit.searchQuery|truncate:60}</a>
				{elseif $visit.typeId eq 6}
					<a href="{$visit.requestUri}" target="_blank">{$visit.requestUri|truncate:60}</a>
					{if $visit.refererUrl}(<a href="{$visit.refererUrl}" target="_blank">{"{stats:referer}"|strtolower}</a>){/if}
				{elseif $visit.typeId eq 7}
					{if !$visit.section}
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
				{else}
					{stats:unknown}
				{/if}
				</td>
			</tr>
			{/foreach}
			<tr><td colspan="3" align="right"><table cellpadding="3" cellspacing="0" width="100%"><tr><td>
				{if $pageNums}
				<table cellpadding="0" cellspacing="0" width="100%"><tr>
					<td class="small">{general:results}</td>
					<td class="small" align="right">
						{if $pageNums.previousPage}
							<a href="stats.bot.php?visitorId={$visitorId}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}&page={$pageNums.previousPage}" class="pageNum">&laquo; {general:prevPage}</a>
						{/if}
						{foreach from=$pageNums.pages item=number}
							{if $number eq $page}
								<b class="pageNum">{$number}</b>
							{elseif $number eq '...'}
								...
							{else}
								<a href="stats.bot.php?visitorId={$visitorId}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}&page={$number}" class="pageNum">{$number}</a>
							{/if}
						{/foreach}
						{if $pageNums.nextPage}
							<a href="stats.bot.php?visitorId={$visitorId}{if $filterTypeId}&filterTypeId={$filterTypeId}{/if}&page={$pageNums.nextPage}">{general:nextPage} &raquo;</a>
						{/if}
					</td>
				</tr></table></td></tr></table>
				{/if}
			</td></tr>
		{else}
			<tr class="odd">
				<td class="data none" colspan="3" align="center">- {general:none} -</td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
		{/if}
		</table>
	</td></tr></table>
</td></tr></table>

</body>
</html>
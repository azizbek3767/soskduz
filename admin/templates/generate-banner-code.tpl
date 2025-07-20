<!--banners  {$banner.bannerId} begin -->
{strip}
{if $banner.bannerType eq 13 or $banner.bannerType eq 4}
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="{$banner.bannerWidth}" height="{$banner.bannerHeight}" title="{$banner.alternativeText|escape}">
  <param name="movie" value="{$SITE_URL}/{$banner.fileUrl}" />
  <param name="quality" value="high" />
  <embed src="{$SITE_URL}/{$banner.fileUrl}" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="{$banner.bannerWidth}" height="{$banner.bannerHeight}"></embed>
</object>
{else}

{if $banner.bannerUrl}
	<a href="{$banner.bannerUrl}" target="blank"><img src="{$SITE_URL}/{$banner.fileUrl}" border="0" width="100%" alt="{$banner.alternativeText|escape}" title="{$banner.alternativeText|escape}" /></a>
{else}
	<img src="{$SITE_URL}/{$banner.fileUrl}" width="100%" alt="{$banner.alternativeText|escape}" title="{$banner.alternativeText|escape}" />
{/if}

{/if}
{/strip}

<!--banners  {$banner.bannerId} end -->
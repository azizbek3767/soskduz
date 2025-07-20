<?xml version='1.0' encoding='UTF-8'?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
  http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{$SITE_URL|utf8_encode}/</loc>
    <changefreq>daily</changefreq>
  </url>
{foreach item=sectionItem from=$SECTIONS}
  <url>
    <loc>{$sectionItem.url|utf8_encode}</loc>
    <changefreq>daily</changefreq>
  </url>
{/foreach}  

{fetch_articles limit=45000 assign=articles fields=url}
{foreach item=articleItem from=$articles}
  <url>
    <loc>{$articleItem.url|utf8_encode}</loc>
    <changefreq>monthly</changefreq>
  </url>
{/foreach}
</urlset>
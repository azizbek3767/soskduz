<IfModule mod_autoindex>
  Options -Indexes
</IfModule>
{if $homePageId}
DirectoryIndex /public/section.php?sectionId={$homePageId}&rewrite={$rewrite}&SITE_LANG={$SITE_LANG}
{/if}
RewriteEngine On
ErrorDocument 404 /public/error-404.php?rewrite={$rewrite}&SITE_LANG={$SITE_LANG}

{literal}
RewriteCond %{HTTP_HOST} !^$
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteCond %{HTTPS}s ^on(s)|
RewriteRule ^ http%1://www.%{HTTP_HOST}%{REQUEST_URI} [R=301,L]

RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L,NE]
{/literal}

#RewriteRule ^rss.xml$ /public/rss.php?rewrite={$rewrite}&SITE_LANG={$SITE_LANG} [L]
RewriteRule ^sitemap.xml$ /public/sitemap.php?rewrite={$rewrite}&SITE_LANG={$SITE_LANG} [L]

{foreach item=section from=$SECTIONS}{if $section.type eq "plain"}
{if $section.fileName eq "index"}
RewriteRule ^{$section.dir|preg_quote}\.{$config.file_extension}$ {$SITE_URL}/ [L,R=301]
{else}
RewriteRule ^{$section.dir|preg_quote}\.{$config.file_extension}$ /public/section.php?sectionId={$section.sectionId}&rewrite={$rewrite}&SITE_LANG={$SITE_LANG} [L]
{/if}
{/if}{/foreach}

{foreach item=section from=$SECTIONS}{if $section.type eq "tree"}
RewriteRule ^{$section.dir|preg_quote}$ {$section.path}/ [L,R=301]
RewriteRule ^{$section.dir|preg_quote}/$ /public/section.php?{literal}%{QUERY_STRING}{/literal}&sectionId={$section.sectionId}&rewrite={$rewrite}&SITE_LANG={$SITE_LANG} [L]
RewriteRule ^{$section.dir|preg_quote}/page([0-9]+)\.{$config.file_extension}$ /public/section.php?{literal}%{QUERY_STRING}{/literal}&sectionId={$section.sectionId}&page=$1&rewrite={$rewrite}&SITE_LANG={$SITE_LANG} [L]
RewriteRule ^{$section.dir|preg_quote}/([^/]+)\.(print|recommend).{$config.file_extension}$ /public/article.php?{literal}%{QUERY_STRING}{/literal}&fileName=$1&sectionId={$section.sectionId}&action=$2&nocache=true&rewrite={$rewrite}&SITE_LANG={$SITE_LANG} [L]
RewriteRule ^{$section.dir|preg_quote}/([^/]+)\.{$config.file_extension}$ /public/article.php?{literal}%{QUERY_STRING}{/literal}&fileName=$1&sectionId={$section.sectionId}&rewrite={$rewrite}&SITE_LANG={$SITE_LANG} [L]
RewriteRule ^{$section.dir|preg_quote}/rss\.xml$ /public/rss.php?sectionId={$section.sectionId}&rewrite={$rewrite}&SITE_LANG={$SITE_LANG} [L]

{/if}{/foreach}

RewriteRule ^(.+\.php)$ {$GLOBAL_URI}/$1?SITE_LANG={$SITE_LANG} [QSA]


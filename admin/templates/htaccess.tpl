<IfModule mod_autoindex>
  Options -Indexes
</IfModule>
{if $homePageId}
DirectoryIndex /public/section.php?sectionId={$homePageId}&rewrite={$rewrite}
{/if}
RewriteEngine On

SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1
#SetEnvIf Content-Type "(.*)" HTTP_CONTENT_TYPE=$1
#SetEnvIf Accept "(.*)" HTTP_ACCEPT=$1

{literal}
RewriteCond %{HTTP_HOST} !^$
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteCond %{HTTPS}s ^on(s)|
RewriteRule ^ http%1://www.%{HTTP_HOST}%{REQUEST_URI} [R=301,L]

RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L,NE]
{/literal}


{if IS_HTTPS}
{literal}
RewriteCond %{HTTPS} =off 
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [QSA,L]

{/literal}
{/if}
ErrorDocument 404 /public/error-404.php?rewrite={$rewrite}

{if $config.compress_js_css}
RewriteCond %{ldelim}REQUEST_FILENAME{rdelim} -f
RewriteRule ^(.+\.(css|js))$ /compress.php?path=$1&rewrite={$rewrite} [L]
{/if}

#RewriteRule ^rss.xml$ /public/rss.php?rewrite={$rewrite} [L]
RewriteRule ^sitemap.xml$ /public/sitemap.php?rewrite={$rewrite} [L]

{foreach item=section from=$SECTIONS}{if $section.type eq "plain"}
{if $section.fileName eq "index"}
RewriteRule ^{$section.dir|preg_quote}\.{$config.file_extension}$ {$SITE_URL}/ [L,R=301]
{else}
RewriteRule ^{$section.dir|preg_quote}\.{$config.file_extension}$ /public/section.php?sectionId={$section.sectionId}&rewrite={$rewrite} [L]
{/if}

{/if}{/foreach}
{foreach item=section from=$SECTIONS}{if $section.type eq "tree"}
RewriteRule ^{$section.dir|preg_quote}$ {$section.path}/ [L,R=301]
RewriteRule ^{$section.dir|preg_quote}/$ /public/section.php?{literal}%{QUERY_STRING}{/literal}&sectionId={$section.sectionId}&rewrite={$rewrite} [L]
RewriteRule ^{$section.dir|preg_quote}/page([0-9]+)\.{$config.file_extension}$ /public/section.php?{literal}%{QUERY_STRING}{/literal}&sectionId={$section.sectionId}&page=$1&rewrite={$rewrite} [L]
RewriteRule ^{$section.dir|preg_quote}/([^/]+)\.{$config.file_extension}$ /public/article.php?{literal}%{QUERY_STRING}{/literal}&fileName=$1&sectionId={$section.sectionId}&rewrite={$rewrite} [L]

{/if}{/foreach}
<?php
/* Smarty version 3.1.33, created on 2025-04-15 14:54:31
  from '/home/soskduz/public_html/admin/templates/htaccess.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67fe2cd7764985_26060395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7a33d79c6f9265f3cb625d44d11e0e741a572ed' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/htaccess.tpl',
      1 => 1604255594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67fe2cd7764985_26060395 (Smarty_Internal_Template $_smarty_tpl) {
?><IfModule mod_autoindex>
  Options -Indexes
</IfModule>
<?php if ($_smarty_tpl->tpl_vars['homePageId']->value) {?>
DirectoryIndex /public/section.php?sectionId=<?php echo $_smarty_tpl->tpl_vars['homePageId']->value;?>
&rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>

<?php }?>
RewriteEngine On

SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1
#SetEnvIf Content-Type "(.*)" HTTP_CONTENT_TYPE=$1
#SetEnvIf Accept "(.*)" HTTP_ACCEPT=$1


RewriteCond %{HTTP_HOST} !^$
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteCond %{HTTPS}s ^on(s)|
RewriteRule ^ http%1://www.%{HTTP_HOST}%{REQUEST_URI} [R=301,L]

RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L,NE]



<?php if (IS_HTTPS) {?>

RewriteCond %{HTTPS} =off 
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [QSA,L]


<?php }?>
ErrorDocument 404 /public/error-404.php?rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>


<?php if ($_smarty_tpl->tpl_vars['config']->value['compress_js_css']) {?>
RewriteCond %{REQUEST_FILENAME} -f
RewriteRule ^(.+\.(css|js))$ /compress.php?path=$1&rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>
 [L]
<?php }?>

#RewriteRule ^rss.xml$ /public/rss.php?rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>
 [L]
RewriteRule ^sitemap.xml$ /public/sitemap.php?rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>
 [L]

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECTIONS']->value, 'section');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
if ($_smarty_tpl->tpl_vars['section']->value['type'] == "plain") {
if ($_smarty_tpl->tpl_vars['section']->value['fileName'] == "index") {?>
RewriteRule ^<?php echo preg_quote($_smarty_tpl->tpl_vars['section']->value['dir']);?>
\.<?php echo $_smarty_tpl->tpl_vars['config']->value['file_extension'];?>
$ <?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/ [L,R=301]
<?php } else { ?>
RewriteRule ^<?php echo preg_quote($_smarty_tpl->tpl_vars['section']->value['dir']);?>
\.<?php echo $_smarty_tpl->tpl_vars['config']->value['file_extension'];?>
$ /public/section.php?sectionId=<?php echo $_smarty_tpl->tpl_vars['section']->value['sectionId'];?>
&rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>
 [L]
<?php }?>

<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECTIONS']->value, 'section');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
if ($_smarty_tpl->tpl_vars['section']->value['type'] == "tree") {?>
RewriteRule ^<?php echo preg_quote($_smarty_tpl->tpl_vars['section']->value['dir']);?>
$ <?php echo $_smarty_tpl->tpl_vars['section']->value['path'];?>
/ [L,R=301]
RewriteRule ^<?php echo preg_quote($_smarty_tpl->tpl_vars['section']->value['dir']);?>
/$ /public/section.php?%{QUERY_STRING}&sectionId=<?php echo $_smarty_tpl->tpl_vars['section']->value['sectionId'];?>
&rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>
 [L]
RewriteRule ^<?php echo preg_quote($_smarty_tpl->tpl_vars['section']->value['dir']);?>
/page([0-9]+)\.<?php echo $_smarty_tpl->tpl_vars['config']->value['file_extension'];?>
$ /public/section.php?%{QUERY_STRING}&sectionId=<?php echo $_smarty_tpl->tpl_vars['section']->value['sectionId'];?>
&page=$1&rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>
 [L]
RewriteRule ^<?php echo preg_quote($_smarty_tpl->tpl_vars['section']->value['dir']);?>
/([^/]+)\.<?php echo $_smarty_tpl->tpl_vars['config']->value['file_extension'];?>
$ /public/article.php?%{QUERY_STRING}&fileName=$1&sectionId=<?php echo $_smarty_tpl->tpl_vars['section']->value['sectionId'];?>
&rewrite=<?php echo $_smarty_tpl->tpl_vars['rewrite']->value;?>
 [L]

<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}

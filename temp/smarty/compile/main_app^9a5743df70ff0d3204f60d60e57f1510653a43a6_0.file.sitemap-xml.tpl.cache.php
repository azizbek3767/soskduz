<?php
/* Smarty version 3.1.33, created on 2025-07-17 16:47:59
  from '/home/soskduz/public_html/themes/app/templates/sitemap-xml.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878e2ef464083_03234882',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '9a5743df70ff0d3204f60d60e57f1510653a43a6' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/sitemap-xml.tpl',
      1 => 1579165896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6878e2ef464083_03234882 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),));
$_smarty_tpl->compiled->nocache_hash = '20426243046878e2ef44f128_25755191';
echo '/*%%SmartyNocache:20426243046878e2ef44f128_25755191%%*/<?php echo \'<?xml \';?>/*/%%SmartyNocache:20426243046878e2ef44f128_25755191%%*/';?>
version='1.0' encoding='UTF-8'<?php echo '/*%%SmartyNocache:20426243046878e2ef44f128_25755191%%*/<?php echo \'?>\';?>/*/%%SmartyNocache:20426243046878e2ef44f128_25755191%%*/';?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
  http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
  xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?php echo htmlspecialchars(utf8_encode($_smarty_tpl->tpl_vars['SITE_URL']->value), ENT_QUOTES, 'UTF-8', true);?>
/</loc>
    <changefreq>daily</changefreq>
  </url>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECTIONS']->value, 'sectionItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sectionItem']->value) {
?>
  <url>
    <loc><?php echo htmlspecialchars(utf8_encode($_smarty_tpl->tpl_vars['sectionItem']->value['url']), ENT_QUOTES, 'UTF-8', true);?>
</loc>
    <changefreq>daily</changefreq>
  </url>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  

<?php echo smarty_function_fetch_articles(array('limit'=>45000,'assign'=>'articles','fields'=>'url'),$_smarty_tpl);?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'articleItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['articleItem']->value) {
?>
  <url>
    <loc><?php echo htmlspecialchars(utf8_encode($_smarty_tpl->tpl_vars['articleItem']->value['url']), ENT_QUOTES, 'UTF-8', true);?>
</loc>
    <changefreq>monthly</changefreq>
  </url>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</urlset><?php }
}

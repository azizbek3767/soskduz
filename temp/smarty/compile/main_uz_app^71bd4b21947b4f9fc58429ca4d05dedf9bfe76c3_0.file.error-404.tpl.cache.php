<?php
/* Smarty version 3.1.33, created on 2025-07-17 16:57:42
  from '/home/soskduz/public_html/themes/app/templates/error-404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878e536e82563_38115001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71bd4b21947b4f9fc58429ca4d05dedf9bfe76c3' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/error-404.tpl',
      1 => 1604605768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878e536e82563_38115001 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '12757371506878e536e7b414_40867433';
//<?
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ($url = dbQuery('articles',DB_VALUE,array('fields'=>'url','where'=>"oldUrl = '$actual_link'"))) {
	header("Location: $url", true, 301);
} elseif($url = dbQuery('sections',DB_VALUE,array('fields'=>'url','where'=>"oldUrl = '$actual_link'"))) {
	header("Location: $url", true, 301);
}
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>"HTTP 404 Not found",'keywords'=>"HTTP 404 Not found",'description'=>"HTTP 404 Not found"), 0, false);
?>

<div class="wrapper-404">

	<div class="container">

		<div class="img-content"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/404.jpg"></div>

		<div class="desc-content"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['page_not_found'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
		<div class="link-back">
			<h2>Вы можете начать с <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
">Главной страницы</a></h2>
		</div>
	</div>

</div>







<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

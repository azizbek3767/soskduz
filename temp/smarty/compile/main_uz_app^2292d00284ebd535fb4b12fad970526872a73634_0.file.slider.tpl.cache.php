<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:27:11
  from '/home/soskduz/public_html/themes/app/templates/modules/slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878ec1fe98987_57962250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2292d00284ebd535fb4b12fad970526872a73634' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/modules/slider.tpl',
      1 => 1604267441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6878ec1fe98987_57962250 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_sliders.php','function'=>'smarty_function_fetch_sliders',),));
$_smarty_tpl->compiled->nocache_hash = '19728950326878ec1fe91372_11165044';
if ($_smarty_tpl->tpl_vars['config']->value['slider'] == '1') {?>
<section class="main-carousel-wrapper nav-style-1">
	<div class="owl-carousel main-carousel">
		<?php echo smarty_function_fetch_sliders(array('assign'=>'sectionSliders','section'=>'slider','limit'=>10,'orderBy'=>'orderBy'),$_smarty_tpl);?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionSliders']->value, 'slider', false, NULL, 'sectionSliders', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slider']->value) {
?>
		<div class="carousel-item">
			<div class="main-carousel-img" style="background-image: url('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
');">
				<div class="carousel-desc-wrapper container"><?php if (isset($_smarty_tpl->tpl_vars['slider']->value['title'])) {?><div class="carousel-desc"><h2 class="special-h1-class" style="color:white;"><?php echo $_smarty_tpl->tpl_vars['slider']->value['title'];?>
</h2></div><?php }?></div>
			</div>
		</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
</section>
<?php }
}
}

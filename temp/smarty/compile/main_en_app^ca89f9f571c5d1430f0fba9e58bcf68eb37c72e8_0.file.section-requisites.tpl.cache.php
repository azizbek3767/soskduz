<?php
/* Smarty version 3.1.33, created on 2025-07-17 13:59:01
  from '/home/soskduz/public_html/themes/app/templates/section-requisites.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878bb55153c97_18643854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca89f9f571c5d1430f0fba9e58bcf68eb37c72e8' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-requisites.tpl',
      1 => 1603440240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/you-are-here.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878bb55153c97_18643854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '7602367316878bb55141736_67250676';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>

<!-- Хлебные крошки -->
<noindex>
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>



<div class="requisites-wrapper">

	<div class="container">

		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>

		<div class="requisites-main">

			<div class="row">

				<div class="desc-content col-md-5"><?php echo $_smarty_tpl->tpl_vars['section']->value['summary'];?>
</div>

				<div class="table-content col-md-7"><?php echo $_smarty_tpl->tpl_vars['section']->value['content'];?>
</div>

			</div>

		</div>

	</div>

</div>
</noindex>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

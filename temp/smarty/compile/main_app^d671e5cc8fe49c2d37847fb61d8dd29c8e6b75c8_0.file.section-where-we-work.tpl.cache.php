<?php
/* Smarty version 3.1.33, created on 2025-07-17 08:39:03
  from '/home/soskduz/public_html/themes/app/templates/section-where-we-work.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_68787057ec59e8_02831863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd671e5cc8fe49c2d37847fb61d8dd29c8e6b75c8' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-where-we-work.tpl',
      1 => 1607448661,
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
function content_68787057ec59e8_02831863 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_sections.php','function'=>'smarty_function_fetch_sections',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->compiled->nocache_hash = '157592700368787057e87d28_60329799';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="where-wrapper">
	<div class="container">
		<div class="page-name">
			<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
		</div>




		<?php echo smarty_function_fetch_sections(array('assign'=>'regions','from'=>$_smarty_tpl->tpl_vars['section']->value['sectionId'],'status'=>"visible",'maps'=>true),$_smarty_tpl);?>

		<div class="traderoutes">
			<div class="container p-v-md">
				<div class="traderoutes-content">
					<div class="traderoutes-items" data-container-country>

						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['regions']->value, 'region', false, NULL, 'regions', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['region']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_regions']->value['iteration']++;
?>
							<div class="item <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['region']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['region']->value['top_menu'] == 0) {?>hiddem-xs hidden-sm<?php }?>" data-country="<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_regions']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_regions']->value['iteration'] : null), ENT_QUOTES, 'UTF-8', true);?>
">
								<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['region']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
">
									<?php if ($_smarty_tpl->tpl_vars['region']->value['top_menu'] == 1) {?>
										<h5><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['city'], ENT_QUOTES, 'UTF-8', true);?>
</h5>
									<?php } else { ?>
										<?php if ($_smarty_tpl->tpl_vars['region']->value['sectionId'] != 44) {?><h5><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['region'], ENT_QUOTES, 'UTF-8', true);?>
</h5><?php }?>
									<?php }?>

									<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['region']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h4>
									<div class="text-item"><?php echo $_smarty_tpl->tpl_vars['region']->value['summary'];?>
</div>
								</a>
							</div>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

					</div>
					<div class="traderoutes-map">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['regions']->value, 'region', false, NULL, 'regions', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['region']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_regions']->value['iteration']++;
if ($_smarty_tpl->tpl_vars['region']->value['top_menu'] == 1) {?>
							<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/spec-marker.png" class="spec-marker-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['region']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
">
							<?php if ($_smarty_tpl->tpl_vars['region']->value['fileName'] == 'khorezm' || $_smarty_tpl->tpl_vars['region']->value['fileName'] == 'xorazm' || $_smarty_tpl->tpl_vars['region']->value['fileName'] == 'xorezm') {?>
								<h4 class="spec-marker-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['region']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
" style="left: 13% !important; top: 47% !important;font-weight: bold;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['region']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h4>
							<?php } else { ?>
								<h4 class="spec-marker-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['region']->value['fileName'], ENT_QUOTES, 'UTF-8', true);?>
" style="font-weight: bold;<?php if ($_smarty_tpl->tpl_vars['region']->value['fileName'] == 'samarkand' || $_smarty_tpl->tpl_vars['region']->value['fileName'] == 'samarqand') {?>top: 63%;left:50%;<?php } else { ?>top: 47%;right:27%;<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['region']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h4>
							<?php }?>
						<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<svg width="1100" height="700">
							<g transform="scale(1.8333333333333333) translate(0, 23.636363636363658)">

								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['regions']->value, 'region', false, NULL, 'regions', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['region']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_regions']->value['iteration']++;
?>
									<?php echo $_smarty_tpl->tpl_vars['region']->value['code_maps'];?>

								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</g>
						</svg>
					</div>
					
				</div>
			</div>
				<?php if (isset($_smarty_tpl->tpl_vars['section']->value['images'])) {?>
			<div class="img-content" style="margin-bottom: 40px;"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['images']['original']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" style="width: 100%;"></div><?php }?>
		<div class="desc-content"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['section']->value['content'],'img/','../uploads/files/');?>
</div>
		</div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

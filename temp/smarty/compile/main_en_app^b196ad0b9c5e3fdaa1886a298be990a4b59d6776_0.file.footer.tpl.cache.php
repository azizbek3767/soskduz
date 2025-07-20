<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:30:47
  from '/home/soskduz/public_html/themes/app/templates/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878ecf7a575a0_92205823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b196ad0b9c5e3fdaa1886a298be990a4b59d6776' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/footer.tpl',
      1 => 1684230560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:init/app-init.tpl' => 1,
    'file:init/request-init.tpl' => 1,
  ),
),false)) {
function content_6878ecf7a575a0_92205823 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.social.php','function'=>'smarty_function_social',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),2=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_section.php','function'=>'smarty_function_fetch_section',),3=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.yandex_metrika.php','function'=>'smarty_function_yandex_metrika',),4=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.google_analytics.php','function'=>'smarty_function_google_analytics',),));
$_smarty_tpl->compiled->nocache_hash = '4455953886878ecf79fb3c3_54671748';
?>
</main>
	<footer>
		<div class="footer-wrapper">
			<div class="container">
				<div class="row">
					<div class="footer-top section-name col-md-12"><h2 class="special-h1-class"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['contacts'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
					<div class="footer-middle clearfix">
						<div class="info-part col-md-8">
							<div class="row">
								<div class="info-desc col-md-4">
									<span><i class="icmplace"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['office_address'], ENT_QUOTES, 'UTF-8', true);?>
</span>
									<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['address'], ENT_QUOTES, 'UTF-8', true);?>
</p>
								</div>
								<div class="info-desc col-md-4">
									<span><i class="icmphone-call"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['phones'], ENT_QUOTES, 'UTF-8', true);?>
</span>
									<?php if (isset($_smarty_tpl->tpl_vars['config']->value['phone'])) {?><p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['phone'], ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
									<?php if (isset($_smarty_tpl->tpl_vars['config']->value['phone_two'])) {?><p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['phone_two'], ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
								</div>
								<div class="info-desc col-md-4">
									<span><i class="icmemail"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['email_address'], ENT_QUOTES, 'UTF-8', true);?>
</span>
									<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</p>
								</div>
							</div>	
						</div>
						<div class="form-part col-md-4">
							<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['newsletter'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
							<form id="newsletter" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/public/newsletter.php">
								<div class="input-content">
									<input type="email" name="email" class="input-control" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['basket_your_email'], ENT_QUOTES, 'UTF-8', true);?>
" data-error="#newsletter_email">
									<span class="btn-def"><button type="submit" class="newsletter-btn"><i class="icmpaper-plane"></i></button></span>
								</div>
								<div class="social-desc"><h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['social_networks'], ENT_QUOTES, 'UTF-8', true);?>
</h3></div>
								<div class="social-buttons"><?php echo smarty_function_social(array(),$_smarty_tpl);?>
</div>
							</form>
						</div>
					</div>
					<div class="footer-bottom">
						<div class="copyright">
							<span>Copyright © <?php echo htmlspecialchars(smarty_modifier_date_format(time(),"%Y"), ENT_QUOTES, 'UTF-8', true);?>
</span>
						</div>
						<div class="footer-links">
							<?php echo smarty_function_fetch_section(array('assign'=>'offer','section'=>54),$_smarty_tpl);?>
 <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
							<?php if ($_smarty_tpl->tpl_vars['SITE_LANG']->value == 'en') {?>
								<?php echo smarty_function_fetch_section(array('assign'=>'policy','section'=>63),$_smarty_tpl);?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['policy']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['policy']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
							<?php } elseif ($_smarty_tpl->tpl_vars['SITE_LANG']->value == 'uz') {?>
								<?php echo smarty_function_fetch_section(array('assign'=>'policy','section'=>60),$_smarty_tpl);?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['policy']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['policy']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
							<?php } else { ?>
								<?php echo smarty_function_fetch_section(array('assign'=>'policy','section'=>56),$_smarty_tpl);?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['policy']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['policy']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
		<!-- Подключение скриптов -->
	<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/scripts.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery.maskedinput.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/validate.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/messages.js"><?php echo '</script'; ?>
>
		
	<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/main.js"><?php echo '</script'; ?>
>
	
	<?php $_smarty_tpl->_subTemplateRender("file:init/app-init.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
	<?php $_smarty_tpl->_subTemplateRender('file:init/request-init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
	<?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/plugins/owl.carousel.min.js"><?php echo '</script'; ?>
>
	
	

	
    <?php echo '<script'; ?>
>
        function goBack() {
            window.history.back();
        }
        window.onload = function(){
			if($(".traderoutes-map path").length > 0){
				var containerCountry = $("[data-container-country]") || null;
				if(!containerCountry)
					return;
				$(".traderoutes-map path").on("mouseenter", function(){
					var itemNum = $(this).attr("data-country");
					containerCountry.map(function(i, el){
						$(el).find(".item").removeClass("is-selected");
						$(el).find(".item").eq(itemNum-1).addClass("is-selected");
					})
					console.log(itemNum);
				});

			}
		}
    <?php echo '</script'; ?>
>
	
	<?php if ($_smarty_tpl->tpl_vars['config']->value['yandex_metrika'] != '') {
echo smarty_function_yandex_metrika(array(),$_smarty_tpl);
}?>
    <?php if ($_smarty_tpl->tpl_vars['config']->value['google_analytics'] != '') {
echo smarty_function_google_analytics(array(),$_smarty_tpl);
}?>
</body>
</html>



<?php }
}

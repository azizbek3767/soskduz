<?php
/* Smarty version 3.1.33, created on 2025-07-12 16:15:47
  from '/home/soskduz/public_html/admin/templates/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687243e35eefd4_85777075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b567440c09fc9deb5ebf6c836e5b385318de2435' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/footer.tpl',
      1 => 1571729382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687243e35eefd4_85777075 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '145804072687243e35e5047_21892703';
?>
		</div>            
	</div>
	
	
  <audio id="audio-alert" src="assets/audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="assets/audio/fail.mp3" preload="auto"></audio>
  
  <?php echo '<script'; ?>
 type="text/javascript" src="assets/js/plugins-footer.js"><?php echo '</script'; ?>
>
   
  <?php echo '<script'; ?>
 type='text/javascript' src='assets/js/noty/jquery.noty.js'><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type='text/javascript' src='assets/js/noty/layouts/topCenter.js'><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type='text/javascript' src='assets/js/noty/layouts/topLeft.js'><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type='text/javascript' src='assets/js/noty/layouts/topRight.js'><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type='text/javascript' src='assets/js/noty/themes/default.js'><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript" src="assets/js/main.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="assets/js/actions.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>

    $(function() { 
        var toc = $("#tocify").tocify({ 
            context: ".tocify-content", 
            showEffect: "fadeIn",
            extendPage:false,
            selectors: "h3, h4, h5" 
        });
    });
  
  var validNavigation = false;
  var noActiveUser = 1; 
  var user =  '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['adminUser']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
'; 
  var login = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['adminUser']->value['loginName'], ENT_QUOTES, 'UTF-8', true);?>
'; 
  var ip = '<?php echo htmlspecialchars($_SERVER['REMOTE_ADDR'], ENT_QUOTES, 'UTF-8', true);?>
';
  
  function timerIncrement() {
    idleTime = idleTime + 1;
    
    if (idleTime > 29) {
      $.ajax({ 
        url: 'functions.php', 
        type: 'POST', 
        data: { noActiveUser:noActiveUser, user:user, login:login, ip:ip }, 
        datatype: 'json', 
        success: function(d){ 
          if (d.code == 1){ 
            location.reload(); 
          } 
        } 
      });
    }
  }; 
  
    
    <?php echo '</script'; ?>
>
  </body>
</html><?php }
}

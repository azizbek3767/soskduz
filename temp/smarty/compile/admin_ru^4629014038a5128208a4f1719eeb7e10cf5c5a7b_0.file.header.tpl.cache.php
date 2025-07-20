<?php
/* Smarty version 3.1.33, created on 2025-07-12 16:15:47
  from '/home/soskduz/public_html/admin/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_687243e359ec31_52872795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4629014038a5128208a4f1719eeb7e10cf5c5a7b' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/header.tpl',
      1 => 1604269700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687243e359ec31_52872795 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->compiled->nocache_hash = '1922724962687243e352a866_86303387';
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title><?php if ($_smarty_tpl->tpl_vars['title']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
 - <?php }?>Life Style CMS</title>
      <meta http-equiv="Content-Type" content="text/html; charset=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['charset'], ENT_QUOTES, 'UTF-8', true);?>
">
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
      <link rel="manifest" href="assets/favicon/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
        <meta name="robots" content="noindex, follow" />    
      <link rel="stylesheet" type="text/css" href="assets/css/admin-theme.min.css"/>
    
      <?php echo '<script'; ?>
 type="text/javascript" src="assets/js/plugins-header.js"><?php echo '</script'; ?>
>

      <link href="assets/js/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />

      <?php echo '<script'; ?>
 src="assets/js/jquery-scrollbar/jquery.scrollbar.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 type="text/javascript" src="assets/js/script.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
>
          lang = new Array();
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['jsLang']->value, 'langVal', false, 'langKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['langKey']->value => $_smarty_tpl->tpl_vars['langVal']->value) {
?>
              lang['<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['langKey']->value, ENT_QUOTES, 'UTF-8', true);?>
'] = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['langVal']->value, ENT_QUOTES, 'UTF-8', true);?>
';
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php echo '</script'; ?>
>
</head>
  
<body class="">
    <div id="page_container" class="page-container page-navigation-top-fixed <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['check_menu'] == 1) {?> page-navigation-toggled page-container-wide<?php }?>">
        <div class="page-header">
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <li class="xn-logo pull-left"><a></a><a href="#" class="x-navigation-control"></a></li>
                <li class="xn-icon-button">
                    <a href="#" id="mini" class="x-navigation-minimize" data-user="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['adminUser']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['check_menu'] == 1) {?>data-val="0"<?php } else { ?> data-val="1"<?php }?>><span class="fa fa-outdent"></span></a>
                </li>

                <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                    <div class="mb-container">
                        <div class="mb-middle">
                            <div class="mb-title"><span class="fa fa-sign-out"></span> Выйти ?</div>
                            <div class="mb-content"><p>Вы действительно хотите выйти?</p><p></p></div>
                            <div class="mb-footer">
                                <div class="pull-right">
                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/login.php?action[logout]=true" class="btn btn-success btn-lg close_yes">Да</a>
                                    <button class="btn btn-default btn-lg mb-control-close close_no">Нет</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <li class="pull-right last">
                    <a id="userbox" class="userbox">
                        <figure class="profile-picture">
                            <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['hasImage'] == '1') {?>
                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['adminUser']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['adminUser']->value['fullName'], ENT_QUOTES, 'UTF-8', true);?>
" class="rounded-circle"/>
                            <?php } else { ?>
                                <img src="avatar/no-image.jpg" class="rounded-circle"/>
                            <?php }?>
                        </figure>
                        <div class="profile-info">
                            <span class="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['adminUser']->value['fullName'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                            <span class="role"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accessLevels']->value, 'accessLevel', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['accessLevel']->value) {
if ($_smarty_tpl->tpl_vars['adminUser']->value['accessLevel'] == $_smarty_tpl->tpl_vars['key']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessLevel']->value, ENT_QUOTES, 'UTF-8', true);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></span>
                        </div>
                        <i class="fa fa-angle-down"></i>
                    </a>
  
                    <div class="userbox_info animated zoomIn">
                        <ul class="list-unstyled mb-2">
                            <li class="divider"></li>
                            <li><a href="users.php?action[edit]=true&user[userId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['adminUser']->value['userId'], ENT_QUOTES, 'UTF-8', true);?>
"><i class="fa fa-user"></i>Профиль</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><i class="fa fa-power-off"></i> Выход</a></li>
                        </ul>
                    </div>

                </li>
  
                <li class="xn-icon-button pull-right">
                    <a target="blank" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/">
                        <span class="fa fa-desktop" data-toggle="tooltip" data-placement="left" data-original-title="Перейти на сайт"></span>
                    </a>
                </li>
          

                <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['accessLevel'] == "administrator" || $_smarty_tpl->tpl_vars['adminUser']->value['accessLevel'] == "developer") {?>

                        <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
                            <li class="xn-icon-button pull-right">
                                <a href="#"><span class="fa fa-comments"></span></a>
                                <?php if ($_smarty_tpl->tpl_vars['totalPendingComments']->value > 0) {?><div class="informer informer-danger"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totalPendingComments']->value, ENT_QUOTES, 'UTF-8', true);?>
</div><?php } else {
}?>
                                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="line-height: 30px;"><span class="fa fa-comments"></span> Новые коментарии</h3>
                                        <div class="pull-right">
                                            <?php if ($_smarty_tpl->tpl_vars['totalPendingComments']->value > 0) {?><span class="label label-danger"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totalPendingComments']->value, ENT_QUOTES, 'UTF-8', true);?>
</span><?php } else {
}?>
                                        </div>
                                    </div>
              
                                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                        <?php if ($_smarty_tpl->tpl_vars['totalPendingComments']->value > 0) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment', false, NULL, 'comments', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
if ($_smarty_tpl->tpl_vars['comment']->value['status'] == "pending") {?>
                                                <a href="comments.php?action[edit]=true&comment[commentId]=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['commentId'], ENT_QUOTES, 'UTF-8', true);?>
&page=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="list-group-item" >
                                                    <span class="fa fa-comments" <?php if ($_smarty_tpl->tpl_vars['comment']->value['status'] == "pending") {?>style="color: #a00;"<?php }?>></span>
                                                    <?php if (strlen($_smarty_tpl->tpl_vars['comment']->value['authorUrl']) > 10) {?>
                                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['authorUrl'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['comment']->value['authorName'],20), ENT_QUOTES, 'UTF-8', true);?>
</a>
                                                    <?php } else { ?>
                                                        <?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['comment']->value['authorName'],20), ENT_QUOTES, 'UTF-8', true);?>

                                                    <?php }?>
                                                    <span class="contacts-title"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['comment']->value['authorEmail'],20), ENT_QUOTES, 'UTF-8', true);?>
</span><p><?php echo htmlspecialchars(smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['comment']->value['content']),200), ENT_QUOTES, 'UTF-8', true);?>
</p>
                                                </a>
                                            <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php } else { ?>
                                            <a class="list-group-item"><h5 class="text-center">Новых комментарий нет</h5></a>
                                        <?php }?>
                                    </div>
                                    <div class="panel-footer text-center"><a href="comments.php">Все комментарии</a></div>
                                </div>
                            </li>
                        <?php }?>

  
                    <li class="xn-icon-button pull-right hidden-xs">
                        <a href="#" style="width: 40px;" data-toggle="tooltip" data-placement="left" title data-original-title="<?php if ($_smarty_tpl->tpl_vars['config']->value['compress_js_css'] == '1') {?>Компрессия включена<?php } else { ?>Компрессия выключена<?php }?>">
                            <span class="icon-markup">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M6.01 14.707l5.812-8c.16-.223.14-.668-.285-.668H9.234c-.27 0-.393-.2-.262-.448l2.046-3.875c.147-.24.143-.717-.3-.717H6.514c-.266 0-.552.213-.618.477L4.12 8.527c-.066.262.105.477.383.477h2.04c.283 0 .422.21.324.472 0 0-1.866 4.93-1.866 5.025 0 .276.224.5.5.5.144 0 .275-.06.366-.16.053-.03.102-.074.145-.133z" class="<?php if ($_smarty_tpl->tpl_vars['config']->value['compress_js_css'] == '1') {?>icon-color-green<?php } else { ?>icon-color-yellow<?php }?>"></path>
                                </svg>
                            </span>
                        </a>
                    </li>

                    <?php if (count($_smarty_tpl->tpl_vars['LANGUAGES']->value) > 1) {?>
                        <li class="xn-icon-button pull-right">
                            <a href="#">
                                <span class="flag fa fa-flag" style="font-size: 16px;"></span>
                                <div class="informer informer-warning"><?php echo htmlspecialchars(strtolower((($tmp = @$_smarty_tpl->tpl_vars['SITE_LANG']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['DEFAULT_LANG']->value : $tmp)), ENT_QUOTES, 'UTF-8', true);?>
</div>
                            </a>
                            <ul class="xn-drop-left animated zoomIn">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LANGUAGES']->value, 'navLang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navLang']->value) {
?>
                                    <?php if (($_smarty_tpl->tpl_vars['SITE_LANG']->value == $_smarty_tpl->tpl_vars['navLang']->value['codename']) || (!$_smarty_tpl->tpl_vars['SITE_LANG']->value && $_smarty_tpl->tpl_vars['navLang']->value['isDefault'])) {?>
                                        <li class="active">
                                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/<?php if (!$_smarty_tpl->tpl_vars['navLang']->value['isDefault']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
/<?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['LOCATION']->value['FILE'], ENT_QUOTES, 'UTF-8', true);?>
">
                                                <span class="flag flag-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
"></span> <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['navLang']->value['languageTransName'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['navLang']->value['languageName'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>

                                            </a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/admin/<?php if (!$_smarty_tpl->tpl_vars['navLang']->value['isDefault']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
/<?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['LOCATION']->value['FILE'], ENT_QUOTES, 'UTF-8', true);?>
">
                                                <span class="flag flag-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
"></span> <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['navLang']->value['languageTransName'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['navLang']->value['languageName'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>

                                            </a>
                                        </li>
                                    <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </li>
                    <?php }?>

                <?php }?>

             
            </ul>
        </div>

        <nav class="page-sidebar page-sidebar-fixed" data-pages="sidebar">
            <div class="sidebar-menu">
                <div id="page_sidebar" class="page-sidebar <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['check_menu'] == 1) {?>mCS_disabled<?php }?>">
                    <ul id="navigation_sidebar" class="menu-items x-navigation x-navigation-custom <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['check_menu'] == 1) {?>x-navigation-minimized<?php }?>">
        
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'itemMenu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemMenu']->value) {
?>
                        <li class="xn-openable <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemMenu']->value['activeItem'], 'active');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['active']->value) {
if ($_smarty_tpl->tpl_vars['activeItem']->value == $_smarty_tpl->tpl_vars['active']->value) {?> <?php if ($_smarty_tpl->tpl_vars['adminUser']->value['check_menu'] == 0) {?>active<?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['itemMenu']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"><span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['itemMenu']->value['icon'], ENT_QUOTES, 'UTF-8', true);?>
"></span> <span class="xn-text"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['itemMenu']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span></a>
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemMenu']->value['children'], 'subItemMenu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subItemMenu']->value) {
?>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['activeItem']->value == $_smarty_tpl->tpl_vars['subItemMenu']->value['activeItem']) {?>active<?php }?>">
                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subItemMenu']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"><span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subItemMenu']->value['icon'], ENT_QUOTES, 'UTF-8', true);?>
"></span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subItemMenu']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                                </li>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            </div>
        </nav>
     
        <div class="page-content">
       


<?php }
}

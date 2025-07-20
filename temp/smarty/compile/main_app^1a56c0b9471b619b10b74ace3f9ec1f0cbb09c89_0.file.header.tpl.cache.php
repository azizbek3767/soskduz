<?php
/* Smarty version 3.1.33, created on 2025-07-17 17:35:12
  from '/home/soskduz/public_html/themes/app/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878ee008d39c9_38634871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a56c0b9471b619b10b74ace3f9ec1f0cbb09c89' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/header.tpl',
      1 => 1684412405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6878ee008d39c9_38634871 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.social.php','function'=>'smarty_function_social',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),2=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_section.php','function'=>'smarty_function_fetch_section',),));
$_smarty_tpl->compiled->nocache_hash = '17550704506878ee00799fb7_11086082';
?>
<!DOCTYPE html>
<html lang="ru">
<!--[if IE 9]>
<html class="ie9" lang="ru"> <![endif]-->

<head>

    <title>
        <?php if ($_smarty_tpl->tpl_vars['article']->value) {?>
            <?php if ($_smarty_tpl->tpl_vars['article']->value['meta_title']) {?>
                <?php echo $_smarty_tpl->tpl_vars['article']->value['meta_title'];?>
 - <?php if (isset($_smarty_tpl->tpl_vars['config']->value['website_name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);
}?>
            <?php } else { ?>
                <?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {
echo $_smarty_tpl->tpl_vars['title']->value;?>
 - <?php }
if (isset($_smarty_tpl->tpl_vars['config']->value['website_name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);
}?>
            <?php }?>
        <?php } elseif ($_smarty_tpl->tpl_vars['section']->value) {?>
            <?php if ($_smarty_tpl->tpl_vars['section']->value['meta_title']) {?>
                <?php echo $_smarty_tpl->tpl_vars['section']->value['meta_title'];?>
 - <?php if (isset($_smarty_tpl->tpl_vars['config']->value['website_name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);
}?>
            <?php } else { ?>
                <?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {
echo $_smarty_tpl->tpl_vars['title']->value;?>
 - <?php }
if (isset($_smarty_tpl->tpl_vars['config']->value['website_name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);
}?>
            <?php }?>
        <?php } else { ?>
            <?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {
echo $_smarty_tpl->tpl_vars['title']->value;?>
 - <?php }
if (isset($_smarty_tpl->tpl_vars['config']->value['website_name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);
}?>
        <?php }?>
    </title>

    <meta name="yandex-verification" content="3597182b950b0996"/>
    <meta charset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['charset'], ENT_QUOTES, 'UTF-8', true);?>
">
    <?php if (isset($_smarty_tpl->tpl_vars['description']->value)) {?>
        <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;
if ($_smarty_tpl->tpl_vars['page']->value > 1) {?> | Страница <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);
}?>"><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['keywords']->value)) {?>
        <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"><?php }?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="e3zP3Zz6WB30XzaMvYJIHbO-5dfNHUo7p3uXJprCFxw"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <?php if ($_smarty_tpl->tpl_vars['section']->value['sectionId'] == 37 || $_smarty_tpl->tpl_vars['section']->value['sectionId'] == 31 || $_smarty_tpl->tpl_vars['section']->value['sectionId'] == 23 || $_smarty_tpl->tpl_vars['section']->value['sectionId'] == 13) {?>
        <meta name="robots" content="noindex, follow"/>
    <?php }?>
    
    <meta name="robots" content="index,follow">

    <?php if (isset($_smarty_tpl->tpl_vars['article']->value['articleId'])) {?>
        <meta property="og:url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
">
        <meta property="og:site_name" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);?>
">
        <meta property="og:title" content="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['title'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);
}?>">
        <meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['article']->value['description'];?>
">
        <meta property="og:type" content="site">
        <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <link rel="image_src" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
">
    <?php } else { ?>
        <meta property="og:url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <meta property="og:site_name" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);?>
">
        <meta property="og:title" content="<?php if (isset($_smarty_tpl->tpl_vars['config']->value['website_name'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);
}?>">
        <meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
        <meta property="og:type" content="site">
        <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/uploads/og_image.jpg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <link rel="image_src" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/uploads/og_image.jpg">
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['article']->value['articleId'])) {?>
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:description" content="<?php echo $_smarty_tpl->tpl_vars['article']->value['description'];?>
"/>
        <meta name="twitter:title" content="<?php if (isset($_smarty_tpl->tpl_vars['article']->value['title'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);
}?>"/>
        <meta name="twitter:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
"/>
    <?php } else { ?>
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
        <meta name="twitter:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);?>
"/>
        <meta name="twitter:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/uploads/og_image.jpg"/>
    <?php }?>

    

    <?php if (isset($_smarty_tpl->tpl_vars['article']->value['articleId'])) {?>
        <?php echo '<script'; ?>
 type="application/ld+json">
        {
          "@context": "http://schema.org/",
          "@type": "Organization",
          "headline": "<?php if (isset($_smarty_tpl->tpl_vars['article']->value['title'])) {
echo htmlspecialchars(substr($_smarty_tpl->tpl_vars['article']->value['title'],0,109), ENT_QUOTES, 'UTF-8', true);
}?>",
                "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
",
                "description": "<?php echo $_smarty_tpl->tpl_vars['article']->value['description'];?>
",
                "image":{
                    "@type": "ImageObject",
                    "height": "630",
                    "width": "1200",
                    "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['images']['medium']['url'], ENT_QUOTES, 'UTF-8', true);?>
"
                },
                "author": {
                    "@type": "Person",
                    "name": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);?>
"
                },
                "publisher": {
                "@type": "Organization",
                "name": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);?>
",
                "logo": {
                  "@type": "ImageObject",
                  "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/logo.png",
                  "width": "",
                  "height": ""
                }
                },
              "datePublished": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['publishedOn'], ENT_QUOTES, 'UTF-8', true);?>
",
               "dateModified": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['modifiedOn'], ENT_QUOTES, 'UTF-8', true);?>
",
               "mainEntityOfPage": "<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"
         }


















































        <?php echo '</script'; ?>
>
    <?php } else { ?>
        <?php echo '<script'; ?>
 type="application/ld+json">
        {
          "@context": "http://schema.org/",
          "@type": "Organization",
          
             "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
",
                "description": "<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
",
                "image":{
                    "@type": "ImageObject",
                    "height": "630",
                    "width": "1200",
                    "url": "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/uploads/og_image.jpg"
                },
                
                
              
              
         }



















































        <?php echo '</script'; ?>
>
    <?php }?>


    <link rel="alternate" hreflang="ru" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
"/>
    <link rel="alternate" hreflang="en" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/en/"/>
    <link rel="alternate" hreflang="uz" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/uz/"/>


    <!-- favicons -->

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/css/plugins.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/css/main.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/css/additional.css">
    <!--owl-carousel-->
    <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/css/owl.theme.default.min.css">
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="media/js/html5.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="media/js/respond.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <?php echo '<script'; ?>
 src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/scripts.min.js"><?php echo '</script'; ?>
>
</head>

<body>

<header>
    <div class="special-div hidden-sm hidden-xs"></div>
    <div class="header-wrapper hidden-xs hidden-sm">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="info-desc col-md-6">
                                                                    </div>
                    <div class="main-social col-md-6">
                        <div class="messages"><a href=""><i class="icmemail"></i> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</span></a></div>
                        <?php if (count($_smarty_tpl->tpl_vars['LANGUAGES']->value) > 1) {?>
                            <div class="language">
                                <div class="lang">
                                    <input type="checkbox" class="hide" id="langlist">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LANGUAGES']->value, 'navLang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navLang']->value) {
if (($_smarty_tpl->tpl_vars['SITE_LANG']->value == $_smarty_tpl->tpl_vars['navLang']->value['codename']) || (!$_smarty_tpl->tpl_vars['SITE_LANG']->value && $_smarty_tpl->tpl_vars['navLang']->value['isDefault'])) {?>
                                        <label for="langlist" role="button">
                                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
"> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                        </label>
                                    <?php }?> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <ul class="hide-list">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LANGUAGES']->value, 'navLang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navLang']->value) {
?>
                                            <li <?php if (($_smarty_tpl->tpl_vars['SITE_LANG']->value == $_smarty_tpl->tpl_vars['navLang']->value['codename']) || (!$_smarty_tpl->tpl_vars['SITE_LANG']->value && $_smarty_tpl->tpl_vars['navLang']->value['isDefault'])) {?> class="hide"<?php }?>>
                                                <a rel="alternate" hreflang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
.jpg"
                                                                                                                             alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
"> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span></a>
                                            </li>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                </div>
                            </div>
                        <?php }?>
                        <div class="social-buttons"><?php echo smarty_function_social(array(),$_smarty_tpl);?>
</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-middle">
                <div class="row">
                    <div class="logo col-md-5">
                        <div class="img"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/logo.png" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['website_name'], ENT_QUOTES, 'UTF-8', true);?>
"></a></div>
                    </div>
                    <div class="actions col-md-7">
                        <input type="checkbox" class="hide" id="numberlist">
                        <div class="phonedrop">
                            <div class="numbers">
                                <div class="icon-content"><span><a href=""><i class="icmphone-call"></i></a></span></div>
                                <div class="desc-content">
                                    <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['tel_tashkent'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                    <div class="number">
                                        <a href="tel:<?php echo htmlspecialchars(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['config']->value['phone'],'(',''),')',''),'-',''),' ',''), ENT_QUOTES, 'UTF-8', true);?>
"><p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['phone'], ENT_QUOTES, 'UTF-8', true);?>
</p></a>
                                        <label for="numberlist" role="button"><i class="icmangle-arrow-down"></i></label>
                                    </div>
                                </div>
                            </div>
                            <ul class="hide-list">
                                <li>
                                    <div class="desc-content">
                                                                                <div class="number"><a href="tel:<?php echo htmlspecialchars(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['config']->value['phone_two'],'(',''),')',''),'-',''),' ',''), ENT_QUOTES, 'UTF-8', true);?>
"><p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['phone_two'], ENT_QUOTES, 'UTF-8', true);?>
</p></a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="desc-content">
                                                                                <div class="number"><a href="tel:<?php echo htmlspecialchars(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['config']->value['phone_three'],'(',''),')',''),'-',''),' ',''), ENT_QUOTES, 'UTF-8', true);?>
"><p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['phone_three'], ENT_QUOTES, 'UTF-8', true);?>
</p></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="help">
                            <?php if (getLastPartOfUrl($_smarty_tpl->tpl_vars['section']->value['url']) == 'charity-postcards') {?>
                                <div class="basket">
                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/basket/">
                                        <i class="icmshopping-cart-of-checkered-design"></i>
                                        <div class="quantity badge-cart"><span>0</span></div>
                                    </a>
                                </div>
                            <?php }?>
                            <span class="btn-def"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['help_now'], ENT_QUOTES, 'UTF-8', true);?>
</a></span>
                        </div>
                    </div>
                    <div class="float-right" style="padding-right: 20px;">
                        <div class="info-desc">
                            <?php echo smarty_function_fetch_section(array('assign'=>'requisites','section'=>31),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['requisites']->value['status'] == 'visible') {?><span><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['requisites']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['requisites']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></span><?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <ul class="navigation">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TREE']->value, 'navItem1', false, NULL, 'navItems1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navItem1']->value) {
if ($_smarty_tpl->tpl_vars['navItem1']->value['top_menu'] == 1) {
if ($_smarty_tpl->tpl_vars['navItem1']->value['status'] == 'visible') {?>
                        <li>
                                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem1']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem1']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                            <?php if ($_smarty_tpl->tpl_vars['navItem1']->value['sectionId'] == 9) {?>
                                                                                                                                                                                                                                                            <?php } else { ?>
                                <?php if (isset($_smarty_tpl->tpl_vars['navItem1']->value['subsections']) && !empty($_smarty_tpl->tpl_vars['navItem1']->value['subsections']) && array_search('visible',array_column($_smarty_tpl->tpl_vars['navItem1']->value['subsections'],'status')) !== false) {?>
                                    <ul class="sub-menu">
                                        <div class="sub-menu-body">
                                            <div class="rectangle"></div>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navItem1']->value['subsections'], 'navItem2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navItem2']->value) {
if ($_smarty_tpl->tpl_vars['navItem2']->value['top_menu'] == 1) {
if ($_smarty_tpl->tpl_vars['navItem2']->value['status'] == 'visible') {?>
                                                <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem2']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem2']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                            <?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </div>
                                    </ul>
                                <?php }?>
                            <?php }?>
                        </li>
                    <?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <li>
                        <div class="search">
                            <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/<?php if ($_smarty_tpl->tpl_vars['LANG']->value['codename'] != 'ru') {
echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
/<?php }?>search.php" method="post">
                                <div class="input-content">
                                    <input type="checkbox" class="hide" id="search">
                                    <div class="search_place">
                                        <label for="search" role="button"><span class="icmSeatch"></span></label>
                                        <input type="search" name="query" value="<?php if (isset($_smarty_tpl->tpl_vars['query']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}?>" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['search'], ENT_QUOTES, 'UTF-8', true);?>
" id="search_input"
                                               current_lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
"
                                               global_url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/search_ajax.php" section_id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['sectionId'], ENT_QUOTES, 'UTF-8', true);?>
" page="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                                    </div>
                                    <ul class="search_dropdown">
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="hidden-div  hidden-md hidden-lg">

    </div>
    <nav class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg " id="myNavBar">
        <div class="mob_menu_button_wrapper hidden-md hidden-lg">
            <div class="container">
                <div class="flex-1">
                    <div class="mob-logo-wrapper">
                        <div class="mob-logo" style="background-image: url('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/logo.png');"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
"></a></div>
                    </div>
                    <div class="mob-number">
                        <input type="checkbox" class="hide" id="numberlist-mob">
                        <div class="phonedrop-mob">
                            <div class="numbers">
                                <div class="icon-content"><span><a href=""><i class="icmphone-call"></i></a></span></div>
                                <div class="desc-content">
                                    <div class="number"><a href="tel:<?php echo htmlspecialchars(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['config']->value['phone'],'(',''),')',''),'-',''),' ',''), ENT_QUOTES, 'UTF-8', true);?>
"><p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['phone'], ENT_QUOTES, 'UTF-8', true);?>
</p></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-btn">
                        <button type="button" class="navbar-toggle collapse_menu" data-toggle="collapse" >
                            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                    </div>

                    <?php echo '<script'; ?>
 type="text/javascript">
                        $('.collapse_menu').click(function () {
                            console.log('qwe')
                            $('.navbar-collapse').collapse('toggle')
                        })
                    <?php echo '</script'; ?>
>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <div class="container">
                    <div class="menu-wrapper">
                        <div class="menu-actions clearfix">
                            <div class="search">
                                <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/search.php" method="post">
                                    <div class="input-content">
                                        <input type="checkbox" class="hide" id="search-mob" checked="true">
                                        <div class="search_place">
                                            <label for="search-mob" role="button"><span class="icmSeatch"></span></label>
                                            <input type="search" name="query" value="<?php if (isset($_smarty_tpl->tpl_vars['query']->value)) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['query']->value, ENT_QUOTES, 'UTF-8', true);
}?>" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['search'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <?php if (count($_smarty_tpl->tpl_vars['LANGUAGES']->value) > 1) {?>
                                <div class="language">
                                    <input type="checkbox" class="hide" id="langlist-mob">
                                    <div class="lang">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LANGUAGES']->value, 'navLang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navLang']->value) {
if (($_smarty_tpl->tpl_vars['SITE_LANG']->value == $_smarty_tpl->tpl_vars['navLang']->value['codename']) || (!$_smarty_tpl->tpl_vars['SITE_LANG']->value && $_smarty_tpl->tpl_vars['navLang']->value['isDefault'])) {?>
                                            <label for="langlist-mob" role="button"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
"><span></span></label>
                                        <?php }?> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <ul class="hide-list">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LANGUAGES']->value, 'navLang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navLang']->value) {
?>
                                                <li <?php if (($_smarty_tpl->tpl_vars['SITE_LANG']->value == $_smarty_tpl->tpl_vars['navLang']->value['codename']) || (!$_smarty_tpl->tpl_vars['SITE_LANG']->value && $_smarty_tpl->tpl_vars['navLang']->value['isDefault'])) {?> class="hide"<?php }?>>
                                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navLang']->value['codename'], ENT_QUOTES, 'UTF-8', true);?>
"> <span></span></a>
                                                </li>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </ul>
                                    </div>
                                </div>
                            <?php }?>
                            <div class="help" style="margin-top:10px;">
                                <?php if (getLastPartOfUrl($_smarty_tpl->tpl_vars['section']->value['url']) == 'charity-postcards') {?>
                                    <div class="basket">
                                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/basket/">
                                            <i class="icmshopping-cart-of-checkered-design"></i>
                                            <div class="quantity badge-cart"><span>0</span></div>
                                        </a>
                                    </div>
                                <?php }?>
                                <span class="btn-def"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SITE_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['donation_url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['help_now'], ENT_QUOTES, 'UTF-8', true);?>
</a></span>
                            </div>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"></li>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TREE']->value, 'navItem1', false, NULL, 'navItems1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navItem1']->value) {
if ($_smarty_tpl->tpl_vars['navItem1']->value['top_menu'] == 1) {
if ($_smarty_tpl->tpl_vars['navItem1']->value['status'] == 'visible') {?>
                                <li class="dropdown">
                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem1']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem1']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                                                                        <?php if ($_smarty_tpl->tpl_vars['navItem1']->value['sectionId'] == 9) {?>
                                        <a href="javascript:;" data-toggle="dropdown" class="btn-open-close">+</a>
                                                                                                                                                                                                    <?php } else { ?>
                                        <?php if (isset($_smarty_tpl->tpl_vars['navItem1']->value['subsections']) && !empty($_smarty_tpl->tpl_vars['navItem1']->value['subsections']) && array_search('visible',array_column($_smarty_tpl->tpl_vars['navItem1']->value['subsections'],'status')) !== false) {?>
                                            <a href="javascript:;" data-toggle="dropdown" class="btn-open-close ul_menu_open_btn">+</a>
                                            <ul class="dropdown-menu">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navItem1']->value['subsections'], 'navItem2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['navItem2']->value) {
if ($_smarty_tpl->tpl_vars['navItem2']->value['top_menu'] == 1) {
if ($_smarty_tpl->tpl_vars['navItem2']->value['status'] == 'visible') {?>
                                                    <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem2']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['navItem2']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
                                                <?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </ul>
                                        <?php }?>
                                    <?php }?>
                                </li>
                            <?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<?php echo '<script'; ?>
 type="text/javascript">
    $(function () {
        let searchField = $('#search_input');
        let globalUrl = searchField.attr('global_url');
        let sectionId = searchField.attr('section_id');
        let page = searchField.attr('page');
        let lang = searchField.attr('current_lang');
        let data = {
            sectionId: sectionId,
            page: page,
            lang: lang
        };
        searchField.on('keyup', function () {
            let query = searchField.val();
            if (query.length >= 4) {
                data.query = query;
                searchAjax(globalUrl, data);
            } else {
                $('.search_dropdown').css('display', 'none');
            }
        })

        function searchAjax(url, data) {
            console.log(data, ' im data')
            $.ajax({
                url: url,
                data: data,
                dataType: 'json',
                success: function (response) {
                    if (response.result && response.result.length > 0) {
                        $('.search_dropdown').css('display', 'block');
                        $('.search_dropdown').html(createList(response.result));
                    }
                }
            })
        }

        function createList(data) {
            let html = '';
            data.forEach(item => {
                let url = item.url;
                let title = item.title;
                html = html + "<li><a href='" + url + "'>" + title + "</li>"
            })
            return html;
        }

        $('.ul_menu_open_btn').click(function (e) {
            e.preventDefault();
            console.log($(this));
            if ($(this).parent('.dropdown').hasClass('open')) {
                $(this).parent('.dropdown').removeClass('open');
            } else {
                $('.dropdown').removeClass('open');
                $(this).parent('.dropdown').addClass('open');
            }
        })
    })
<?php echo '</script'; ?>
>

<main>

<?php }
}

<!DOCTYPE html>
<html lang="en">
<!--[if IE 9]>
<html class="ie9" lang="en"> <![endif]-->

<head>

    <title>
        {if $article}
            {if $article.meta_title}
                {$article.meta_title nofilter} - {if isset($config.website_name)}{$config.website_name}{/if}
            {else}
                {if isset($title)}{$title nofilter} - {/if}{if isset($config.website_name)}{$config.website_name}{/if}
            {/if}
        {elseif $section}
            {if $section.meta_title}
                {$section.meta_title nofilter} - {if isset($config.website_name)}{$config.website_name}{/if}
            {else}
                {if isset($title)}{$title nofilter} - {/if}{if isset($config.website_name)}{$config.website_name}{/if}
            {/if}
        {else}
            {if isset($title)}{$title nofilter} - {/if}{if isset($config.website_name)}{$config.website_name}{/if}
        {/if}
    </title>
    <meta name="yandex-verification" content="3597182b950b0996" />
    <meta charset="{$config.charset}">
    {if isset($description)}
        <meta name="description" content="{$description nofilter}{if $page > 1} | Страница {$page}{/if}">{/if}
    {if isset($keywords)}
        <meta name="keywords" content="{$keywords nofilter}">{/if}

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="e3zP3Zz6WB30XzaMvYJIHbO-5dfNHUo7p3uXJprCFxw" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="apple-mobile-web-app-capable" content="yes"/>
    {if $section.sectionId eq 37 || $section.sectionId eq 31 || $section.sectionId eq 23 || $section.sectionId eq 13}
        <meta name="robots" content="noindex, follow"/>
    {/if}
    {* <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" /> *}

    <meta name="robots" content="index,follow">

    {if isset($article.articleId)}
        <meta property="og:url" content="{$article.url}">
        <meta property="og:site_name" content="{$config.website_name}">
        <meta property="og:title" content="{if isset($article.title)}{$article.title}{/if}">
        <meta property="og:description" content="{$article.description nofilter}">
        <meta property="og:type" content="site">
        <meta property="og:image" content="{$article.images.medium.url}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <link rel="image_src" href="{$article.images.medium.url}">
    {else}
        <meta property="og:url" content="{$SITE_URL}">
        <meta property="og:site_name" content="{$config.website_name}">
        <meta property="og:title" content="{if isset($config.website_name)}{$config.website_name}{/if}">
        <meta property="og:description" content="{$description nofilter}">
        <meta property="og:type" content="site">
        <meta property="og:image" content="{$SITE_URL}/uploads/og_image.jpg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <link rel="image_src" href="{$SITE_URL}/uploads/og_image.jpg">
    {/if}

    {if isset($article.articleId)}
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:description" content="{$article.description nofilter}"/>
        <meta name="twitter:title" content="{if isset($article.title)}{$article.title}{/if}"/>
        <meta name="twitter:image" content="{$article.images.medium.url}"/>
    {else}
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:description" content="{$description nofilter}"/>
        <meta name="twitter:title" content="{$config.website_name}"/>
        <meta name="twitter:image" content="{$SITE_URL}/uploads/og_image.jpg"/>
    {/if}

    <link rel="alternate" hreflang="ru" href="{$GLOBAL_URL}"/>
    <link rel="alternate" hreflang="en" href="http://mine.local/en/"/>
    <link rel="alternate" hreflang="uz" href="http://mine.local/uz/"/>
    <link rel="canonical" href="">

    <!-- favicons -->

    <link rel="apple-touch-icon" sizes="57x57" href="{$THEME_URL}/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{$THEME_URL}/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{$THEME_URL}/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{$THEME_URL}/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{$THEME_URL}/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{$THEME_URL}/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{$THEME_URL}/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{$THEME_URL}/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{$THEME_URL}/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{$THEME_URL}/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$THEME_URL}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{$THEME_URL}/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$THEME_URL}/favicon/favicon-16x16.png">
    <link rel="manifest" href="{$THEME_URL}/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{$THEME_URL}/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="{$THEME_URL}/css/plugins.css">
    <link rel="stylesheet" href="{$THEME_URL}/css/main.css">
    <link rel="stylesheet" href="{$THEME_URL}/css/additional.css">
    <!--owl-carousel-->
    <link rel="stylesheet" href="{$THEME_URL}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{$THEME_URL}/css/owl.theme.default.min.css">
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5fab7b414f148e0012a5b837&product=inline-share-buttons' async='async'></script>	<!--[if lt IE 9]>
    <script src="media/js/html5.js"></script>
    <script src="media/js/respond.js"></script>
    <![endif]-->
</head>

<body>
<header>
    <div class="special-div hidden-sm hidden-xs"></div>
    <div class="header-wrapper hidden-xs hidden-sm">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="info-desc col-md-6">
                        {*							{fetch_section assign=questions section=32}{if $questions.status eq 'visible'}<span><a href="{$questions.url}">{$questions.name}</a></span>{/if}*}
                        {*                        {fetch_section assign=requisites section=31}{if $requisites.status eq 'visible'}<span><a href="{$requisites.url}">{$requisites.name}</a></span>{/if}*}
                    </div>
                    <div class="main-social col-md-6">
                        <div class="messages"><a href=""><i class="icmemail"></i> <span>{$config.email}</span></a></div>
                        {if $LANGUAGES|count > 1}
                            <div class="language">
                                <div class="lang">
                                    <input type="checkbox" class="hide" id="langlist">
                                    {foreach item=navLang from=$LANGUAGES}{if ($SITE_LANG eq $navLang.codename) || (!$SITE_LANG && $navLang.isDefault)}
                                        <label for="langlist" role="button">
                                            <img src="{$THEME_URL}/img/{$navLang.codename}.jpg" alt="{$navLang.codename}"> <span>{$navLang.name}</span>
                                        </label>
                                    {/if} {/foreach}
                                    <ul class="hide-list">
                                        {foreach item=navLang from=$LANGUAGES}
                                            <li {if ($SITE_LANG eq $navLang.codename) || (!$SITE_LANG && $navLang.isDefault)} class="hide"{/if}>
                                                <a href="{$navLang.url}"><img src="{$THEME_URL}/img/{$navLang.codename}.jpg" alt="{$navLang.codename}"> <span>{$navLang.name}</span></a>
                                            </li>
                                        {/foreach}
                                    </ul>
                                </div>
                            </div>
                        {/if}
                        <div class="social-buttons">{social}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-middle">
                <div class="row">
                    <div class="logo col-md-5">
                        <div class="img"><a href="{$SITE_URL}"><img src="{$THEME_URL}/img/logo.png" alt="{$config.website_name}"></a></div>
                    </div>
                    <div class="actions col-md-7">
                        <input type="checkbox" class="hide" id="numberlist">
                        <div class="phonedrop">
                            <div class="numbers">
                                <div class="icon-content"><span><a href=""><i class="icmphone-call"></i></a></span></div>
                                <div class="desc-content">
                                    <span>{$LANG.tel_tashkent}</span>
                                    <div class="number">
                                        <a href="tel:{$config.phone|replace:'(':''|replace:')':''|replace:'-':''|replace:' ':''}"><p>{$config.phone}</p></a>
                                        <label for="numberlist" role="button"><i class="icmangle-arrow-down"></i></label>
                                    </div>
                                </div>
                            </div>
                            <ul class="hide-list">
                                <li>
                                    <div class="desc-content">
                                        {*<span>{$LANG.tel_samarkand}</span>*}
                                        <div class="number"><a href="tel:{$config.phone_two|replace:'(':''|replace:')':''|replace:'-':''|replace:' ':''}"><p>{$config.phone_two}</p></a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="desc-content">
                                        {*<span>{$LANG.tel_urgench} </span>*}
                                        <div class="number"><a href="tel:{$config.phone_three|replace:'(':''|replace:')':''|replace:'-':''|replace:' ':''}"><p>{$config.phone_three}</p></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="help">
                            {if getLastPartOfUrl($section.url) == 'charity-postcards'}
                                <div class="basket">
                                    <a href="{$SITE_URL}/basket/">
                                        <i class="icmshopping-cart-of-checkered-design"></i>
                                        <div class="quantity badge-cart"><span>0</span></div>
                                    </a>
                                </div>
                            {/if}
                            <span class="btn-def"><a href="{$SITE_URL}/{$LANG.donation_url}">{$LANG.help_now}</a></span>
                        </div>
                    </div>
                    <div class="float-right" style="padding-right: 20px;">
                        <div class="info-desc">
                            {fetch_section assign=requisites section=31}{if $requisites.status eq 'visible'}<span><a href="{$requisites.url}">{$requisites.name}</a></span>{/if}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <ul class="navigation">
                    {foreach item=navItem1 from=$TREE name=navItems1}{if $navItem1.top_menu eq 1}{if $navItem1.status eq 'visible'}
                        <li>
                            <a href="{if $navItem1.sectionId eq 6}javacsript:;{else}{$navItem1.url}{/if}">{$navItem1.alias}</a>
                            {if $navItem1.sectionId eq 9}
                                {*        				    <ul class="sub-menu">*}
                                {*            					<div class="sub-menu-body">*}
                                {*                					<div class="rectangle"></div>*}
                                {*                					{fetch_section assign=requisites section=31}{if $requisites.status eq 'visible'}<li><a href="{$requisites.url}">{$requisites.name}</a></li>{/if}*}
                                {*                					{fetch_section assign=questions section=32}{if $questions.status eq 'visible'}<li><a href="{$questions.url}">{$questions.name}</a></li>{/if}*}
                                {*                				</div>*}
                                {*        					</ul>*}
                            {else}
                                {if isset($navItem1.subsections) && !empty($navItem1.subsections)}
                                    <ul class="sub-menu">
                                        <div class="sub-menu-body">
                                            <div class="rectangle"></div>
                                            {foreach item=navItem2 from=$navItem1.subsections}{if $navItem2.top_menu eq 1}{if $navItem2.status eq 'visible'}
                                                <li><a href="{$navItem2.url}">{$navItem2.alias}</a></li>
                                            {/if}{/if}{/foreach}
                                            {if $navItem1.fileName == 'chto-my-delaem' || $navItem1.fileName == 'what-we-do' || $navItem1.fileName == 'biz-nima-qilamiz'}
                                                {fetch_section assign=questions section=32}{if $questions.status eq 'visible'}
                                                <li><a href="{$questions.url}">{$questions.name}</a></li>{/if}
                                            {/if}
                                        </div>
                                    </ul>
                                {/if}
                            {/if}
                        </li>
                    {/if}{/if}{/foreach}

                    <li>
                        <div class="search">
                            <form action="{$GLOBAL_URL}/search.php" method="post">
                                <div class="input-content">
                                    <input type="checkbox" class="hide" id="search">
                                    <div class="search_place">
                                        <label for="search" role="button"><span class="icmSeatch"></span></label>
                                        <input type="search" name="query" value="{if isset($query)}{$query}{/if}" placeholder="{$LANG.search}" id="search_input">
                                    </div>
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
                        <div class="mob-logo" style="background-image: url('{$THEME_URL}/img/logo.png');"><a href="{$SITE_URL}"></a></div>
                    </div>
                    <div class="mob-number">
                        <input type="checkbox" class="hide" id="numberlist-mob">
                        <div class="phonedrop-mob">
                            <div class="numbers">
                                <div class="icon-content"><span><a href=""><i class="icmphone-call"></i></a></span></div>
                                <div class="desc-content">
                                    <div class="number"><a href="tel:{$config.phone|replace:'(':''|replace:')':''|replace:'-':''|replace:' ':''}"><p>{$config.phone}</p></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-btn">
                        <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <div class="container">
                    <div class="menu-wrapper">
                        <div class="menu-actions clearfix">
                            <div class="search">
                                <form action="{$GLOBAL_URL}/search.php" method="post">
                                    <div class="input-content">
                                        <input type="checkbox" class="hide" id="search-mob" checked="true">
                                        <div class="search_place">
                                            <label for="search-mob" role="button"><span class="icmSeatch"></span></label>
                                            <input type="search" name="query" value="{if isset($query)}{$query}{/if}" placeholder="{$LANG.search}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="basket">
                                <a href="{$SITE_URL}/basket/"> <i class="icmshopping-cart-of-checkered-design"></i>
                                    <div class="quantity badge-cart"><span>0</span></div>
                                </a>
                            </div>
                            {if $LANGUAGES|count > 1}
                                <div class="language">
                                    <input type="checkbox" class="hide" id="langlist-mob">
                                    <div class="lang">
                                        {foreach item=navLang from=$LANGUAGES}{if ($SITE_LANG eq $navLang.codename) || (!$SITE_LANG && $navLang.isDefault)}
                                            <label for="langlist-mob" role="button"><img src="{$THEME_URL}/img/{$navLang.codename}.jpg" alt="{$navLang.codename}"><span></span></label>
                                        {/if} {/foreach}
                                        <ul class="hide-list">
                                            {foreach item=navLang from=$LANGUAGES}
                                                <li {if ($SITE_LANG eq $navLang.codename) || (!$SITE_LANG && $navLang.isDefault)} class="hide"{/if}>
                                                    <a href="{$navLang.url}"><img src="{$THEME_URL}/img/{$navLang.codename}.jpg" alt="{$navLang.codename}"> <span></span></a>
                                                </li>
                                            {/foreach}
                                        </ul>
                                    </div>
                                </div>
                            {/if}
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"></li>
                            {foreach item=navItem1 from=$TREE name=navItems1}{if $navItem1.top_menu eq 1}{if $navItem1.status eq 'visible'}
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{if $navItem1.sectionId eq 6}javacsript:;{else}{$navItem1.url}{/if}">{$navItem1.alias}</a>
                                    {if $navItem1.sectionId eq 9}
                                        <a href="javascript:;" data-toggle="dropdown" class="btn-open-close">+</a>
                                        {*                    				    <ul class="dropdown-menu">*}
                                        {*                            				{fetch_section assign=requisites section=31}{if $requisites.status eq 'visible'}<li><a href="{$requisites.url}">{$requisites.name}</a></li>{/if}*}
                                        {*                            				{fetch_section assign=questions section=32}{if $questions.status eq 'visible'}<li><a href="{$questions.url}">{$questions.name}</a></li>{/if}*}
                                        {*                    					</ul>*}
                                    {else}
                                        {if isset($navItem1.subsections) && !empty($navItem1.subsections)}
                                            <a href="javascript:;" data-toggle="dropdown" class="btn-open-close">+</a>
                                            <ul class="dropdown-menu">
                                                {foreach item=navItem2 from=$navItem1.subsections}{if $navItem2.top_menu eq 1}{if $navItem2.status eq 'visible'}
                                                    <li><a href="{$navItem2.url}">{$navItem2.alias}</a></li>
                                                {/if}{/if}{/foreach}
                                            </ul>
                                        {/if}
                                    {/if}
                                </li>
                            {/if}{/if}{/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<main>

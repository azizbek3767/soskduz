<!DOCTYPE html>
<html lang="en">
<head>
      <title>{if $title}{$title} - {/if}{productName}</title>
      <meta http-equiv="Content-Type" content="text/html; charset={$config.charset}">
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
    
      <script type="text/javascript" src="assets/js/plugins-header.js"></script>
{*       <script type="text/javascript" src="assets/js/superredactor/sredactor.min.js"></script> *}

      <link href="assets/js/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />

      <script src="assets/js/jquery-scrollbar/jquery.scrollbar.min.js"></script>
      <script type="text/javascript" src="assets/js/script.js"></script>
      <script>
          lang = new Array();
          {foreach key=langKey item=langVal from=$jsLang}
              lang['{$langKey}'] = '{$langVal}';
          {/foreach}
      </script>
</head>
  
<body class="">
    <div id="page_container" class="page-container page-navigation-top-fixed {if $adminUser.check_menu eq 1} page-navigation-toggled page-container-wide{/if}">
        <div class="page-header">
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <li class="xn-logo pull-left"><a></a><a href="#" class="x-navigation-control"></a></li>
                <li class="xn-icon-button">
                    <a href="#" id="mini" class="x-navigation-minimize" data-user="{$adminUser.userId}" {if $adminUser.check_menu eq 1}data-val="0"{else} data-val="1"{/if}><span class="fa fa-outdent"></span></a>
                </li>

                <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                    <div class="mb-container">
                        <div class="mb-middle">
                            <div class="mb-title"><span class="fa fa-sign-out"></span> {header:signOut}</div>
                            <div class="mb-content"><p>{header:signOutLeave}</p><p></p></div>
                            <div class="mb-footer">
                                <div class="pull-right">
                                    <a href="{$GLOBAL_URL}/admin/login.php?action[logout]=true" class="btn btn-success btn-lg close_yes">{header:signOutYes}</a>
                                    <button class="btn btn-default btn-lg mb-control-close close_no">{header:signOutNo}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <li class="pull-right last">
                    <a id="userbox" class="userbox">
                        <figure class="profile-picture">
                            {if $adminUser.hasImage eq '1'}
                                <img src="{$adminUser.images.medium.url}" alt="{$adminUser.fullName}" class="rounded-circle"/>
                            {else}
                                <img src="avatar/no-image.jpg" class="rounded-circle"/>
                            {/if}
                        </figure>
                        <div class="profile-info">
                            <span class="name">{$adminUser.fullName}</span>
                            <span class="role">{foreach from=$accessLevels item=accessLevel key=key}{if $adminUser.accessLevel eq $key} {$accessLevel}{/if}{/foreach}</span>
                        </div>
                        <i class="fa fa-angle-down"></i>
                    </a>
  
                    <div class="userbox_info animated zoomIn">
                        <ul class="list-unstyled mb-2">
                            <li class="divider"></li>
                            <li><a href="users.php?action[edit]=true&user[userId]={$adminUser.userId}"><i class="fa fa-user"></i>Профиль</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><i class="fa fa-power-off"></i> Выход</a></li>
                        </ul>
                    </div>

                </li>
  
                <li class="xn-icon-button pull-right">
                    <a target="blank" href="{$SITE_URL}/">
                        <span class="fa fa-desktop" data-toggle="tooltip" data-placement="left" data-original-title="{header:viewWebsite}"></span>
                    </a>
                </li>
          

                {if $adminUser.accessLevel eq "administrator" or $adminUser.accessLevel eq "developer"}

                        {if $comments}
                            <li class="xn-icon-button pull-right">
                                <a href="#"><span class="fa fa-comments"></span></a>
                                {if $totalPendingComments > 0}<div class="informer informer-danger">{$totalPendingComments}</div>{else}{/if}
                                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="line-height: 30px;"><span class="fa fa-comments"></span> {comments:news}</h3>
                                        <div class="pull-right">
                                            {if $totalPendingComments > 0}<span class="label label-danger"> {$totalPendingComments}</span>{else}{/if}
                                        </div>
                                    </div>
              
                                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                        {if $totalPendingComments > 0}
                                            {foreach item=comment from=$comments name=comments}{if $comment.status eq "pending"}
                                                <a href="comments.php?action[edit]=true&comment[commentId]={$comment.commentId}&page={$page}" class="list-group-item" >
                                                    <span class="fa fa-comments" {if $comment.status eq "pending"}style="color: #a00;"{/if}></span>
                                                    {if $comment.authorUrl|strlen > 10}
                                                        <a href="{$comment.authorUrl}">{$comment.authorName|truncate:20}</a>
                                                    {else}
                                                        {$comment.authorName|truncate:20}
                                                    {/if}
                                                    <span class="contacts-title">{$comment.authorEmail|truncate:20}</span><p>{$comment.content|strip_tags|truncate:200}</p>
                                                </a>
                                            {/if}{/foreach}
                                        {else}
                                            <a class="list-group-item"><h5 class="text-center">Новых комментарий нет</h5></a>
                                        {/if}
                                    </div>
                                    <div class="panel-footer text-center"><a href="comments.php">Все комментарии</a></div>
                                </div>
                            </li>
                        {/if}

  
                    <li class="xn-icon-button pull-right hidden-xs">
                        <a href="#" style="width: 40px;" data-toggle="tooltip" data-placement="left" title data-original-title="{if $config.compress_js_css eq '1'}Компрессия включена{else}Компрессия выключена{/if}">
                            <span class="icon-markup">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path d="M6.01 14.707l5.812-8c.16-.223.14-.668-.285-.668H9.234c-.27 0-.393-.2-.262-.448l2.046-3.875c.147-.24.143-.717-.3-.717H6.514c-.266 0-.552.213-.618.477L4.12 8.527c-.066.262.105.477.383.477h2.04c.283 0 .422.21.324.472 0 0-1.866 4.93-1.866 5.025 0 .276.224.5.5.5.144 0 .275-.06.366-.16.053-.03.102-.074.145-.133z" class="{if $config.compress_js_css eq '1'}icon-color-green{else}icon-color-yellow{/if}"></path>
                                </svg>
                            </span>
                        </a>
                    </li>

                    {if $LANGUAGES|@count > 1}
                        <li class="xn-icon-button pull-right">
                            <a href="#">
                                <span class="flag fa fa-flag" style="font-size: 16px;"></span>
                                <div class="informer informer-warning">{$SITE_LANG|default:$DEFAULT_LANG|strtolower}</div>
                            </a>
                            <ul class="xn-drop-left animated zoomIn">
                                {foreach item=navLang from=$LANGUAGES}
                                    {if ($SITE_LANG eq $navLang.codename) || (!$SITE_LANG && $navLang.isDefault)}
                                        <li class="active">
                                            <a href="{$GLOBAL_URL}/admin/{if !$navLang.isDefault}{$navLang.codename}/{/if}{$LOCATION.FILE}">
                                                <span class="flag flag-{$navLang.codename}"></span> {$navLang.languageTransName|default:$navLang.languageName}
                                            </a>
                                        </li>
                                    {else}
                                        <li>
                                            <a href="{$GLOBAL_URL}/admin/{if !$navLang.isDefault}{$navLang.codename}/{/if}{$LOCATION.FILE}">
                                                <span class="flag flag-{$navLang.codename}"></span> {$navLang.languageTransName|default:$navLang.languageName}
                                            </a>
                                        </li>
                                    {/if}
                                {/foreach}
                            </ul>
                        </li>
                    {/if}

                {/if}

             
            </ul>
        </div>

        <nav class="page-sidebar page-sidebar-fixed" data-pages="sidebar">
            <div class="sidebar-menu">
                <div id="page_sidebar" class="page-sidebar {if $adminUser.check_menu eq 1}mCS_disabled{/if}">
                    <ul id="navigation_sidebar" class="menu-items x-navigation x-navigation-custom {if $adminUser.check_menu eq 1}x-navigation-minimized{/if}">
        
                        {foreach from=$menu item=itemMenu}
                        <li class="xn-openable {foreach from=$itemMenu.activeItem item=active}{if $activeItem eq $active} {if $adminUser.check_menu eq 0}active{/if}{/if}{/foreach}">
                            <a href="{$itemMenu.link}"><span class="{$itemMenu.icon}"></span> <span class="xn-text"> {$itemMenu.name}</span></a>
                            <ul>
                                {foreach from=$itemMenu.children item=subItemMenu}
                                <li class="{if $activeItem eq $subItemMenu.activeItem}active{/if}">
                                    <a href="{$subItemMenu.link}"><span class="{$subItemMenu.icon}"></span> {$subItemMenu.name}</a>
                                </li>
                                {/foreach}
                            </ul>
                        </li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </nav>
     
        <div class="page-content">
       



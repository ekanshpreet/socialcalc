<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{if $controller_title}{$controller_title} | {/if}{$app_title}</title>
  <link rel="shortcut icon" type="image/x-icon" href="{$site_root_path}assets/img/favicon.png">
  <link type="text/css" rel="stylesheet" href="{$site_root_path}assets/css/base.css">
  <link type="text/css" rel="stylesheet" href="{$site_root_path}assets/css/style.css">
  <link type="text/css" rel="stylesheet" href="{$site_root_path}_lib/extlib/jquery-chat/css/chat.css">
  
  <!-- jquery -->
  <script type="text/javascript" src="{$site_root_path}_lib/extlib/jquery/jquery-1.4.4.min.js"></script>
  <script type="text/javascript">var site_root_path = '{$site_root_path}';</script>
  {foreach from=$header_scripts item=script}
    <script type="text/javascript" src="{$site_root_path}assets/js/{$script}"></script>
  {/foreach}
</head>
<body>
    <div id="main">
        <div id="headerBar">
            <div class="left">
                <a href="{$site_root_path}">
                    <img src="{$site_root_path}assets/img/sc.png">
                </a>
            </div>
            <div class="right vertical-align">
                <a href="http://www.seeta.in" target="_blank">
                    <!-- style used inline because it will not be repeated elsewhere in the webapp -->
                    <img style="margin-top:10px" src="{$site_root_path}assets/img/seeta.png">
                </a>
            </div>
        </div>
        <div class="bl"><div class="br"><div class="tl"><div class="tr">
            <div id="content">
                <!-- Main Menu -->
                <div id="menuHeader"> 
                    <ul id="mainMenu">
                        {foreach from=$main_menu item=foo}                        
                        {if $foo['title']=='Login'}
                        <li>
                            {if isset($is_logged_in)}<div style="float:right">{include file="status.tpl"}</div>
                            {else} <a href="{$site_root_path}session/login.php">Login</a>{/if}
                        </li>
                        {else}<li><a href="{$site_root_path}{$foo['url']|urlencode}">{$foo['title']}</a></li>{/if}
                        {/foreach}
                    </ul>
                </div><br>
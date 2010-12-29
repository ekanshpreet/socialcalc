{if isset($smarty.session.username)}
<div id="main_container" class="bigger">
{if isset($online_users) && $is_available_to_chat}
<div class="left"><b>Users Online:</b></div>
<div class="right"><a class="pointer" id="signOut">Sign Out</a></div>
<br>
<ul id="chat_list">
{foreach from=$online_users item=u}
<li><a href="javascript:void(0)" onclick="javascript:chatWith('{$u}')">{$u}</a></li>
{/foreach}
</ul>
{elseif isset($is_available_to_chat) && !$is_available_to_chat}
<div class="text_center">
    You are not signed into chat. <a class="pointer" id="signIn">Sign in</a> now.
</div>
{else}
{/if}
</div>
<script>
    $("#signIn").click(function(){
        var url = site_root_path+"common/chatlist.php";
        $("#main_container").load(url,"chat_status=1");
    });
    $("#signOut").click(function(){
        var url = site_root_path+"common/chatlist.php";
        $("#main_container").load(url,"chat_status=0");
    });
</script>
{/if}
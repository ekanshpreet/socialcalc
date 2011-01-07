/* Script to update last_seen field in sc_users*/
function updateLastSeen()
{
    last_seen_url = site_root_path+"session/lastseen.php";
    $.ajax({
            type: "POST",
            url: last_seen_url,
	    success: function() {
                setTimeout("updateLastSeen()",1000);
            }
    });
}
/* Script to display list of online users */
function updateChatList()
{
    var chat_list_url = site_root_path+"common/chatlist.php";
    $("#main_container").load(chat_list_url);
    setTimeout("updateChatList()",5000);
}
$(document).ready(function() {
    updateLastSeen();
    updateChatList();
});
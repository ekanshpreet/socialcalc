{include file="_header.tpl"}
<div id="mainTable">
    <div class="columns" id="c1">
	{include file="_notification.tpl"}
    {include file="_calendar.tpl"}
    </div>
	<div>
		<div class="columns" id="c2">
        {include file="session.login.tpl"}
		</div>
		<div class="columns" id="c3">
			{if isset($smarty.session.username)}{include file="_onlineusers.tpl"}{/if}
		</div>
		{include file="_imagegallery.tpl"}
	</div>
</div>
{include file="_footer.tpl"}
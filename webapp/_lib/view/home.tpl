{include file="_header.tpl"}
{if !isset($is_logged_in)}{include file="test.tpl"}{/if}
<div id="mainTable">
    <div class="columns" id="c1">
        {include file="_calendar.tpl"}
    </div>
    <div class="columns" id="c2">
        {include file="session.login.tpl"}
    </div>
    <div class="columns" id="c3">
        {if isset($smarty.session.username)}{include file="_onlineusers.tpl"}
        {else}<h3 class="topper">column 3</h3>
        <p>Lorem ipsum dolor</p>
        {/if}
    </div>
</div>
{include file="_footer.tpl"}
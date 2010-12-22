{if isset($generate_view)}
{include file="_header.tpl"}
{/if}
<div class="middle_column">
  <div>
    {include file="_usermessage.tpl"}
  </div>
  <form name="form1" method="post" action="{$site_root_path}session/login.php" class="login">
    <div>
      <div class="left">
        <label for="username">
          Username:
        </label>
      </div>
      <div class="right">
        <input type="text" name="username" id="username"{if isset($username)} value="{$username}"{/if}>
      </div>
    </div><br><br>
    <div>
      <div class="left">
        <label for="pwd">
          Password:
        </label>
      </div>
      <div class="right">
        <input type="password" name="pwd" id="pwd">
      </div>
    </div><br><br>
    <div>
      <input type="submit" id="login-save" name="Submit" value="Log In">
    </div>
  </form><br>
  <div class="center prepend_20 append_20">
    <a href="{$site_root_path}session/register.php">Register</a> |
    <a href="{$site_root_path}session/forgot.php">Forgot password</a>
  </div>
</div>

{if isset($generate_view)}
{include file="_footer.tpl"}
{/if}

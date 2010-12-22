{include file="_header.tpl"}

<div class="middle_column">
  <div>
    {include file="_usermessage.tpl"}
  </div>
    <form name="form1" method="post" action="" class="login">
        <div class="left">
          <label for="username">
            Username:
          </label>
        </div>
        <div class="right">
          <input name="username" type="text" id="username">
        </div><br><br>
      <div>
        <input type="submit" id="login-save" name="Submit" value="Send">
      </div>
    </form>
    <div class="center prepend_20 append_20">
      <a href="register.php">Register</a> |
      <a href="login.php">Log In</a>
    </div>
</div>

{include file="_footer.tpl"}

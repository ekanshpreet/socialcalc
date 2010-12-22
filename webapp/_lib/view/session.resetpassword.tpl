{include file="_header.tpl"}

<div class="middle_column">
  <div>
    <h3>Reset Password</h3>
  </div>
  <div>
    {include file="_usermessage.tpl"}
  </div>
  <form method="post" action="" class="reset_password">
      <div class="left">
        <label for="password">
          New password:
        </label>
      </div>
      <div class="right">
        <input type="password" name="password" id="password">
      </div><br><br>
      <div class="left">
        <label for="password_confirm">
          Retype password:
        </label>
      </div>
      <div class="right">
        <input type="password" name="password_confirm" id="password_confirm">
      </div><br><br>
      <div>
        <input type="submit" id="login-save" name="Submit" value="Submit">
      </div>
  </form>
</div>

{include file="_footer.tpl"}

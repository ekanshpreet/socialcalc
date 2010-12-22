{include file="_header.tpl"}
  <div class="middle_column">
  <div>
    {include file="_usermessage.tpl"}<br>
  </div>
      <form name="form1" method="post" action="register.php" class="login append_20">
      <div class="left">
        <label for="full_name">
          Name:
        </label>
      </div>
      <div class="right">
        <input name="full_name" size="30" type="text" id="full_name"{if  isset($name)} value="{$name}"{/if}>
      </div>
      <small>
        <br>
        Example: Abc Xyz
      </small><br><br>
      <div class="left">
        <label for="username">
          Username:
        </label>
      </div>
      <div class="right">
        <input name="username" size="30" type="text" id="email"{if  isset($username)} value="{$username}"{/if}>
      </div>
      <small>
        <br>
        Example: abc.xyz
      </small><br><br>
      <div class="left">
        <label for="email">
          Email:
        </label>
      </div>
      <div class="right">
        <input name="email" size="30" type="text" id="email"{if  isset($mail)} value="{$mail}"{/if}>
      </div>
      <small>
        <br>
        Example: abc@example.com
      </small><br><br>
      <div class="left">
        <label for="pass1">
          Password:
        </label>
      </div>
      <div class="right">
        <input size="30" name="pass1" type="password" id="pass1">
      </div>
      <small>
        <br>
        At least 5 characters
      </small><br><br>
      <div class="left">
        <label for="pass2">
          Retype password:
        </label>
      </div>
      <div class="right">
        <input size="30" name="pass2" type="password" id="pass2">
      </div>
      <small>
        <br>
      </small><br><br>
      <input type="submit" name="Submit" id="login-save" value="Register">
    </form>
  </div>
{include file="_footer.tpl"}
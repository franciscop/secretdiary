<?php
// If someone accesses a door without password
if (empty($_POST['password']))
  {
  ?>
  <h1>The Door</h1>
  <p id = "poem">
    Someone is trying to tell you a secret;<br>
    but this secret isn't shared with just anyone.<br>
    Write the watchword that once you were trusted<br>
    to discover the wonders behind this lines.<br>
  </p>
  <form method = "POST" id = 'doorform'>
    <input type = "password" name = "password" placeholder = "Secret key" autofocus>
    <input type = "submit"   name = "submit"   value = "Knock">
  </form>
  <?
  }

// If someone tries to decrypt a door
else {
  $Decrypt = new Decrypt ($DB, $SiteKey);
  $Decrypt->setpassword($_POST['password']);
  $Text = $Decrypt->retrieve($Door);
  if ($Decrypt->decrypted) { ?>
    <h1>The Secret</h1>
    <?= $Text; ?>
    <?
    }
  else { ?>
    <h1>You shall not pass</h1>
    <p>The door stays rock solid against your futile penetration attempts.</p>
    <?
    }
  }

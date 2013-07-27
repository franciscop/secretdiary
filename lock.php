<h1>The Doorway</h1>
<?php
$Encrypt = new Encrypt ($DB, $SiteKey);
// This is first since the password is needed to encrypt
$Encrypt->setpassword($_POST['password']);

$Encrypt->settext($_POST['text']);
$Encrypt->setfilename($_POST['filename']);
$Encrypt->save();
?>

This is your locked door:
<input readonly value = "<?= $BaseUrl . $Encrypt->get('Id') . "/"; ?>"><br><br>

<? if (empty($_POST['password'])) { ?>
  And this is your generated key, don't forget it:
  <input readonly value = "<?= $Encrypt->get('Key'); ?>"><br><br><br>
<? } else { ?>
  And the key only you know. Don't forget it.
<? } ?>

<h1>
  <?
  $Verbs = array("Write down",
                 "Whisper",
                 "Mumble",
                 "Hide",
                 "Save");
  echo $Verbs [array_rand ( $Verbs )] . ' a secret';
  ?>
</h1>

<form action = "/lock/" method = 'POST' id = 'secret'>
  <textarea name = 'text' id = 'ckeditor'></textarea><br>
  
  <div id = 'settings'>
    &raquo; Extra settings: set the filename or password.<br><br>
  </div>
  <div id = 'extra'>
    Note: Leave filename and password empty to securely autogenerate. <a href = '/about/' target="_blank">How does it work?.</a><br><br>
    <input type = 'text'     name = 'filename' autocomplete="off" placeholder = 'Filename. This will be in the url as http://secretdiary.org/filename/ and cannot be "about" nor "lock"'>
    <input type = 'password' name = 'password' autocomplete="off" placeholder = 'Password. Choose a secure one to properly encrypt your data.'>
  </div>
  
  <input class = "clickable" type = 'submit' value = 'Submit'>
</form>
<script>
  /* Function to be trigged when settings is clicked */
  function settings() {
    document.getElementById('extra').style.display = 'block';
    document.getElementById('settings').style.display = 'none';
    }
  /* Replaces onClick = "settings();" for unobtrusive javascript */
  document.getElementById("settings").addEventListener("click", settings, false);
  /* Convert textareas to CKEditor instances */
  window.onload = function() { CKEDITOR.replace( 'ckeditor' ); };
</script>

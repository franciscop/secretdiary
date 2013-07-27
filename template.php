<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your secrets are safe here</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" >

  <meta name="description" content="Securely store messages with the best encryption at hand. Share only with whom you want to share.">
  <meta name="keywords" content="encrypt, message, private">

  <link rel="icon" type="image/png" href="/favicon.png" >
  
  <!-- CSS -->
  <link rel="stylesheet" href="/style.css" type="text/css" media="screen" >

  <!-- CKeditor -->
  <?php if ($Page == 'write') echo '<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.0.1/ckeditor.js"></script>'; ?>
</head>

<body>
  <div id="centerpaper">
    <div id = "menu">
      <a href = "/">
        <img src = "/write.png" alt = "Write" title = "Go home to write a new secret"/>
      </a> 
      <a href = "/about/">
        <img src = "/about.png" alt = "About" title = "Information about us, the page and encryption methods."/>
      </a>
    </div>
    <? include './' . $Page . '.php'; ?>
  </div>
</body>

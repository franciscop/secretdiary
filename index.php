<?php
// Redirect if there's no trailing slash
if (!empty($_GET['url']) && substr($_GET['url'], -1) != "/")
  {
  header ('HTTP/1.1 301 Moved Permanently');
  header ("Location: http://secretdiary.org/" . htmlspecialchars($_GET['url']) . "/");
  }

// Allow only for this script to access 'config.php'
$ConfigSet = TRUE;
include './config.php';

// Connects to mysql and database.
$DB = new PDO ("mysql:host=" . $MysqlServer . ";dbname=" . $MysqlDB . ";charset=utf8", $MysqlUser, $MysqlPass);

// Get the clean page that will be included in the Template
// Explanation: if it's empty, say it's 'write'. If it's not, delete trailing slash if any.
$Page = (empty($_GET['url'])) ? 'write' : rtrim($_GET['url'], '/');

if (!in_array($Page, array('about', 'lock', 'write')))
  {
  $Door = $Page;
  $Page = 'door';
  }

// Include the encryption engine in the encryption and decryption pages
if (in_array($Page, array('lock', 'door')))
  {
  include $Public . 'class.cipher.php';
  include $Public . 'class.encrypt.php';
  include $Public . 'class.decrypt.php';
  }

// There's still nothing displayed here
include $Public . 'template.php';

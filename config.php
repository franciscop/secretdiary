<?php
if ($ConfigSet == TRUE)
  {
  /* The database to store the data. */
  $MysqlServer = '';
  $MysqlDB = '';
  $MysqlUser = '';
  $MysqlPass = '';
  
  /* A long random string for added security. The so-called "Pepper" */
  $SiteKey = '';
  }
else
  echo "Trying to get our private data, eh? Bad luck.";

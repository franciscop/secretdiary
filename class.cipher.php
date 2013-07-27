<?php
class Cipher
  {
  // From http://stackoverflow.com/q/3422759/
  
  function encrypt($Text, $Key)
    {
    // The key for mcrypt has to be of 256 bits
    $FinalKey = $this->standardkey($Key);
    // Finally encrypt the text
    return urlencode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $FinalKey, $Text, MCRYPT_MODE_ECB, mcrypt_create_iv(32)));
    }
  
  function decrypt($Text, $Key)
    {
    $FinalKey = $this->standardkey($Key);
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $FinalKey, urldecode($Text), MCRYPT_MODE_ECB, mcrypt_create_iv(32)));
    }
  
  // The key of mcrypt has to be of 256 bits
  function standardkey($Key)
    {
    return hash('sha256', $Key, TRUE);
    }
  
  // Provide a way to obtain a hash uniformely
  function phash($password)
    {
    return hash_hmac('sha1', $password, $this -> SiteKey);
    }
  
  function randompassword()
    {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++)
      {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
      }
    return $this->phash(implode($pass));
    }
  }

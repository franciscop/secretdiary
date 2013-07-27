<?php
class Encrypt extends Cipher
  {
  protected $DB;
  protected $SiteKey;
  protected $Cipher;

  protected $Id;
  protected $EncryptedText;

  protected $Key;
  protected $HashedKey;
  
  public function __construct($DB, $SiteKey = null)
    {
    $this->DB = $DB;
    $this->SiteKey = $SiteKey;
    
    // Set the random database index
    $this->Id = $this->phash($this->randompassword());
    }
  
  // The text is 
  public function settext($Text = null)
    {
    // This provides a way of validating whether the text is decrypted or not.
    // The rtrim will delete any extra whitespace (as it's done in the decryption)
    $CheckDecrypt = $this->phash(rtrim ($Text));
    // Call the function that will encrypt the text
    $this->EncryptedText = $this->encrypt($CheckDecrypt . $Text, $this->SiteKey . $this->HashedKey);
    }
  
  public function setpassword($Password = null)
    {
    // We need the key as it will be displayed on the Lock door. We cannot store secretdiary.org/about/ or /lock/ as a filename
    $this->Key = ($Password) ? $Password : $this->randompassword();
    $this->HashedKey = $this->phash($this->Key);
    }
  
  function setfilename($Input = null)
    {
    if ($Input && !in_array($Input, array('lock', 'about')))
      $this->Id = $Input;
    }
  
  function save ()
    {
    // Insert the data in the database
    $STH = $this->DB->prepare('INSERT INTO secrets (id, encrypted) VALUES (?, ?)');
    $STH->execute(array($this->Id, $this->EncryptedText));
    }
  
  function get($Value)
    {
    if (isset($this->$Value) && in_array($Value, array('Id', 'Key', 'HashedKey')))
      {
      return $this->$Value;
      }
    }
  }

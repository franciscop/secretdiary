<?php
class Decrypt extends cipher
  {
  protected $DB;
  protected $SiteKey;
  
  protected $Password;

  public $decrypted = FALSE;
  
  function __construct($DB, $SiteKey = null)
    {
    $this->DB = $DB;
    $this->SiteKey = $SiteKey;
    }
    
  public function setpassword($Posted)
    {
    $this->Password = $this->phash($Posted);
    }
  
  public function retrieve ($HashedText)
    {
    /* Retrieve the encrypted text from the url */
    $STH = $this->DB->prepare('SELECT * FROM secrets WHERE id = ?');
    $STH->execute(array($HashedText));
    
    // Allow for multiple instances of the same id (also allows for decoys)
    foreach ($STH->fetchAll() as $row)
      {
      if ($this->decrypted == FALSE)
        {
        $Text = $this->decrypt($row['encrypted'], $this->SiteKey . $this->Password);

        if (substr($Text, 0, 40) == $this->phash(substr($Text, 40)))
          $this->decrypted = TRUE;
        }
      }

    return substr($Text, 40);
    }

  function isdecrypted()
    {
    return $this->decrypted;
    }
  }

<?php


namespace Core\Session;


class Session
{

  // start session:
  // set session:
  // unset session:
  // distroy all session:


  public static function startSession()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }


  public static function setSession($sessionKey, $sessionValue)
  { 
    $_SESSION[$sessionKey] = $sessionValue;
  }

  public static function unsetSession($sessionKey)
  { 
    unset($_SESSION[$sessionKey]);
  }


  public static function distroySession()
  { 
    session_unset();
    session_destroy();
  }




}



<?php 
  class SessionManager 
  {
    public function __construct() 
    {
      if (session_status() == PHP_SESSION_NONE) 
      {
        session_start();
      }
    }

    public function setValue($key, $value) 
    {
      $_SESSION[$key] = $value;
    }

    public function getValue($key) 
    {
      return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function remove($key) 
    {
      unset($_SESSION[$key]);
    }

    public function destroySession() 
    {
      session_destroy();
    }
  }

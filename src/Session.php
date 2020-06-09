<?php

namespace Framework
{
  abstract class SessionLoginType
  {
    const Anonymous = 0;
    const Personal = 1;
    const Admin = 2;
  };

  class Session
  {
    var $s_PersonalID = null;
    var $s_LoggedInType = null;
    
    public function __construct($s_PersonalID = null, $s_LoggedInType = null)
    {
      $this->s_PersonalID = $s_PersonalID;
      $this->s_LoggedInType = $s_LoggedInType;
    }

    public function start()
    {
      session_start();
    }

    public function read()
    {
      $this->s_PersonalID = $_SESSION['personal_id'];
      $this->s_LoggedInType = $_SESSION['logged_in_type'];

      if (!$this->s_LoggedInType) $this->s_LoggedInType = SessionLoginType::Anonymous;
    }

    public function write()
    {
      $_SESSION['personal_id'] = $this->s_PersonalID;
      $_SESSION['logged_in_type'] = $this->s_LoggedInType;
    }

    public function close()
    {
      session_write_close();
    }
  };
}
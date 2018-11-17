<?php

namespace App\Service;

Class SessionService{
	
	public function __construct(){	
		if(session_status() === PHP_SESSION_NONE)
		{
			session_start();	
		}			
	}
	
	public function Set(String $key, $value):void
	{
		$_SESSION[$key] = $value;
	}
	
	public function Get(String $key)
	{
		return $_SESSION[$key];
	}
	
	public function Delete(String $key):void
	{
		unset($_SESSION[$key]);
	}
	
	public function KillSession():void
	{
		session_destroy();
		echo 'SESSION HAS BEEN REKT';
	}
}


?>
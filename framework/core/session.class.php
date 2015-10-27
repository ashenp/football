<?php 
class Session{

	public static function setSession($sessionName, $sessionValue) {
		if(!isset($_SESSION)) {
			session_start();
		}
		$_SESSION[$sessionName] = $sessionValue;
	}

	public static function getSession($sessionName) {
		if(!isset($_SESSION)) {
			return false;
		}
		if(!isset($_SESSION[$sessionName])) {
			return false;
		}
		return $_SESSION[$sessionName];
	}

	public static function stopSession() {
		session_destroy();
	}

	public static function unsetSession($sessionName) {
		unset($_SESSION[$sessionName]);
	}

}














 ?>
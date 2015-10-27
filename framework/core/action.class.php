<?php 
class Action{
	public static function check() {
		$uid = Session::getSession('uid');
		if(!$uid || $uid <= 0) {
			$redirect = $_SERVER['REQUEST_URI'];
			header("Location:".SITE_URL.'/user/login?redirect='.$redirect);
			exit;
		}
	}
}
 ?>
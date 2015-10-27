<?php 
class WebApi_User_Introduction extends WebApi{
	//singleton
	public static $instance__;
	public static function &instance() {
		if(!isset(self::$instance__)) {
			$className = __CLASS__;
			self::$instance__ = new $className();
		}
		return self::$instance__;
	}

	public function getUserIntroductionByUid($uid) {
		if(!isset($uid) || $uid <= 0) {
			return false;
		}
		return CoreApi_User_Introduction::instance()->row($uid,'*');
	}
}













 ?>
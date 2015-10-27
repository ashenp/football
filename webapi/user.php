<?php 
class WebApi_User extends WebApi{

	public static $instance__;
	public static function &instance() {
		if(!isset(self::$instance__)) {
			$className = __CLASS__;
			self::$instance__ = new $className();
		}
		return self::$instance__;
	}

	public function getUserByUid($uid) {
		if(!isset($uid) || $uid <= 0) {
			return false;
		}
		return CoreApi_User::instance()->row($uid, '*');
	}
	//get user record from user by email
	public function getUserByEmail($email) {
		if(!isset($email) || $email == '') {
			return false;
		}
		return CoreApi_User::instance()->getUserByEmail($email);
	}

	public function getAllUserByEmail($email) {
		if(!isset($email) || $email == '') {
			return false;
		}
		return CoreApi_User::instance()->getAllUserByEmail($email);
	}

	//add a new user
	public function addUserByParams($params){
		if(!isset($params['email'])){
			return false;
		}
		if(!isset($params['username'])) {
			return false;
		}
		if(!isset($params['password'])) {
			return false;
		}
		return CoreApi_User::instance()->addUserByParams($params);


	}

	public function activateUserByUid($uid) {
		if($uid <= 0) {
			return false;
		}
		return CoreApi_User::instance()->activateUserByUid($uid);
	}






}
?>
<?php 
class tool{
	public static function checkIsEmail($email) {
		$emailReg = '/^([a-zA-Z0-9_-])+@[a-zA-Z0-9_-]+(.[a-zA-Z0-9_-]+)+$/';
		if(preg_match($emailReg, $email)) {
			return true;
		}else {
			return false;
		}
	}
	// 信用卡有效期正则表达式  留存    ^((1[012])|(0[1-9]))\/([0-9][0-9])$
	public static function checkPassword($password) {
		//6-22 number letter and _
		$passwordReg = '/[a-zA-Z0-9_]{6,22}/';
		if(preg_match($passwordReg, $password)) {
			return true;
		}else {
			return false;
		}
	}

	public static function checkUsername($username) {
		//3-15 consisting of letter number - _ Chinese character
		$usernameReg = '/[\x{4e00}-\x{9fa5}a-zA-Z0-9_]{3,15}/u';
		if(preg_match($usernameReg, $username)) {
			return true;
		}else {
			return false;
		}
	}



}
 ?>
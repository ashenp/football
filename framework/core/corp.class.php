<?php
/**
 * 网站核心工作类
 *
 */
class Corp {
 	public static function getUid() {
 		return http::SESSION('corp_uid');
 	}
	
	public static function getUsername() {
 		return http::SESSION('corp_user_username');
 	}
 	
 	public static function getName() {
 		return http::SESSION('corp_user_name');
 	}
 	
 	public static  function getEmail() {
 		return http::SESSION('corp_user_email');
 	}
 	
 	//获取当前用户信息
 	static function getInfo() {
 		return http::SESSION('corp_user_info') ;
 	}
 	
 	/**
 	 * 检测登录
 	 *
 	 */
 	static  function checkLogin() {
 		$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		$uid = self::getUid();
		if($uid){
			return true;
		}
		$uid = intval(http::COOKIE('corp_uid'));
		$remember = intval(http::COOKIE('corp_staff_remember'));
		$localKey = http::COOKIE('corp_user_access_key');
		$key = self::makeKey($uid);
		$user = WebApi_User::instance()->getUserByUid($uid, 'Model_User');

		if($key != $localKey || !$uid || !$remember || $user->isEmpty()) {
			$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : 'corp/login';
			if($url) {
				$url = substr($url,1);
				$url = url::make('corp/login', array('url' => urlencode($url)));
			} else {
				$url = url::make('corp/login');;
			}
			http::go($url); exit;
		}
		
		
		self::setLogin($user, $remember);//默认不永久登录
		return true;
 	}
 	
	//设置成登录状态 	
 	static function setLogin($user, $remember) {
		
 		http::setSession('corp_uid', $user->uid);
		http::setSession('corp_user_username', $user->username);
		http::setSession('corp_user_email', $user->email);
		http::setSession('corp_user_name', $user->name);
		http::setSession('corp_user_info', $user);
		// 设置存有sessionid的cookie的作用于，因为企业统一登录入口是www域名下，先要跳转到corp域名下。
		// http::setCookie(session_name(), session_id(), 0, '/', DOMAIN);
		
		if($remember) {
			$expire = time()+COOKIE_EXPIRE_TIME;//默认一天
			http::setCookie('corp_uid', $user->uid, $expire);
			http::setCookie('corp_user_username', $user->username, $expire);
			http::setCookie('corp_user_name', $user->name, $expire);
			$key = self::makeKey($user->uid);
			http::setCookie('corp_user_access_key', $key, $expire);
			http::setCookie('corp_user_remember', $remember, $expire);
		} else {
			http::setCookie('corp_uid', $user->uid);
			http::setCookie('corp_user_username', $user->username);
			http::setCookie('corp_user_name', $user->name);
			$key = self::makeKey($user->uid);
			http::setCookie('corp_user_access_key', $key);
			http::delCookie('corp_user_remember');
		}
		return true;
 	}
 	
 	public static function makeKey($uid) {
 		return md5(SYSTEM_ACCESS_KEY.$uid);
 	}
 	

 	static function setLogout() {
 		http::delSession('corp_uid');
		http::delSession('corp_user_username');
		http::delSession('corp_user_email');
		http::delSession('corp_user_name');
		http::delSession('corp_user_info');
		
		http::delCookie('corp_uid');
		http::delCookie('corp_user_username');
		http::delCookie('corp_user_name');
		http::delCookie('corp_user_access_key');
		http::delCookie('corp_user_remember');
 	}
 	
 	/**
 	 * 统一给密码加密,注册的时候,先密码为空,创建用户成功后, 重新生成密码进行更新操作.
 	 * 根据用户的创建日期生成salt
 	 */
 	public static function makePassword($password, $createTime) {
 		if($password == '') {
 			return false;
 		}
 		$salt = strtotime($createTime);
 		if(!$salt) {
 			return false;
 		}
 		return md5(substr(md5(date('Y-m-d', $salt).'thisisabigproblem'), 3, 23).$password);
 	}
 	
 	/**
 	 * 随机生成用户密码,明文,加密需要使用 user::makePassword();
 	 *
 	 */
 	public static  function randPassword($length = 8) {
 		$randSource = array('0','1','2','3','4','5','6','7','8','9');
		$randSourceCount = count($randSource);
		$randStr = '';
		for($i=0;$i<$length;++$i) {
			$randIndex = mt_rand(0,$randSourceCount-1);
			$randStr .= $randSource[$randIndex];
		}
		return $randStr;
 	}
 	
}

?>
<?php
/**
 * 网站后台员工公用类
 *
 */
class Staff {
 	
 	public static function getStaffId() {
 		return intval(http::SESSION('sid'));
 	}
 	
 	public static function getStaffUsername() {
 		return http::SESSION('staff_username');
 	}
 	
 	public static  function getStaffName() {
 		return http::SESSION('staff_name');
 	}
 	
 	public static function getEmail() {
 		return http::SESSION('staff_email');
 	}
 	
 	
 	
 	//判断用户是否是部门领导
 	public static function isLeader() {
 		http::delSession('is_leader');
 		if(isset($_SESSION['is_leader'])) {
 			return http::SESSION('is_leader');
 		} 		
 		$staff = self::getInfo();
 		if(!empty($staff)) {
 			http::setSession('is_leader', $staff['is_leader']);
 			http::setSession('staff_department', $staff['department_id']);
 			return $staff['is_leader'];
 		}
 		return false;
 		
 	}
 	
 	//获取员工所在部门
 	public static function getDepartmentId() {
 		$staff = self::getInfo() ;
 		return isset($staff['department_id']) ? $staff['department_id'] : 0 ;
 		
 		
 	}
 	//获得员工基本信息
 	public static function getInfo() {
 		if(isset($_SESSION['staff_info'])) {
 			return http::SESSION('staff_info');
 		}
 		return  WebApi_Staff::instance()->getStaffBySid(self::getStaffId());
 	}
 	
 	
 	
 	/**
 	 * 检测登录
 	 *
 	 */
 	static  function checkLogin() {
// 		$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''
		$staffId = self::getStaffId();
		if($staffId){
			return true;
		}
		
		$staffId = intval(http::COOKIE('sid'));
		$remember = intval(http::COOKIE('staff_remember'));
		$localKey = http::COOKIE('staff_access_key');
		$username = http::COOKIE('staff_username');
		$email = http::COOKIE('staff_email');
		$name = http::COOKIE('staff_name');
		$key = self::makeKey($staffId, $username, $email);
		if($key != $localKey || !$staffId || !$remember) {
			$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
			if($url == '/') {
				$url = '';
			}
			if($url) {
				$url = url::makemgr('admin/login', array('url' => urlencode($url)));
			} else {
				$url = url::makemgr('admin/login');
			}
			http::go($url);exit;
		}
		self::setLogin($staffId, $username, $name, $email, $remember);
		return true;
 	}
 	
	//设置成登录状态 	
 	static function setLogin($sid, $username, $name, $email, $remember) {
 		http::setSession('sid', $sid);
		http::setSession('staff_username', $username);
		http::setSession('staff_email', $email);
		http::setSession('staff_name', $name);
 		
		if($remember) {
			$expire = time() + 24*3600;//COOKIE_EXPIRE_TIME;//默认一天
			http::setCookie('sid', $sid, $expire);
			http::setCookie('staff_username', $username, $expire);
			http::setCookie('staff_email', $email, $expire);
			http::setCookie('staff_name', $name, $expire);
			$key = self::makeKey($sid, $username, $email);
			http::setCookie('staff_access_key', $key, $expire);
			http::setCookie('staff_remember', $remember, $expire);
		} else {
			http::delCookie('sid');
			http::delCookie('staff_username');
			http::delCookie('staff_email');
			http::delCookie('staff_name');
			http::delCookie('staff_remember');
			http::delCookie('staff_access_key');
		}
		self::initRole();
		$staff = WebApi_Staff::instance()->getStaffBySid($sid);
		http::setSession('staff_info', $staff);
		Log::instance()->addSid($sid);
 		Log::instance()->addStaffName($name);
		return true;
 	}
 	
 	//设置加密字符
 	static function makeKey($sid, $username, $email) {
 		return md5(SYSTEM_ACCESS_KEY.'-'.$sid.'-'.$username.'-'.$email);
 	}
 	
 	//清理退出信息
 	static function setLogout() {
 		//session_destroy();
 		$_COOKIE = array();
 		http::delSession('sid');
		http::delSession('staff_username');
		http::delSession('staff_email');
		http::delSession('staff_name');
		
		http::delCookie('sid');
		http::delCookie('staff_username');
		http::delCookie('staff_email');
		http::delCookie('staff_name');
		http::delCookie('staff_remember');
		http::delCookie('staff_access_key');
		self::destroyRole();
 	}
 	
 	//检查权限
 	static function checkRight($resourceName) {
 		Log::instance()->addSid(Staff::getStaffId());
 		Log::instance()->addStaffName(Staff::getStaffName());
 		Log::instance()->addUri($resourceName);
 		Log::instance()->addData($_REQUEST);
 		
 		$rs = http::SESSION('staff_rs');
 		$resourceName = strtolower($resourceName);
  
 		if(isset($rs[$resourceName])) {
 			Log::instance()->addResName($rs[$resourceName]);
 			if(isset($_POST) && !empty($_POST)) {
 				Log::instance()->addLog('POST');
 			} else {
 				//Log::instance()->addLog('访问');
 			}
 			return true;
 		} else {
 			var_dump(2);
 			Log::instance()->addLog('非法访问');
 			if(!ROLE_CHECK) return true;
 			return false;
 		}
 	}
 	
 	//初始角色
 	static function initRole(){
 		$sid = self::getStaffId();
 		if(!$sid) {
 			return false;
 		}
 		//获取用户所有的角色
 		$roles = WebApi_Role_Staff::instance()->getRolesBySid($sid);
 		//获取用户所有的资源ID
 		$rs = WebApi_Role::instance()->getResourcesByRids($roles);
 		//获取所有的资源URI
 		$uris = WebApi_Resource::instance()->getResourcesByIds($rs);
 		$result = array();
 		if(is_array($uris) && !empty($uris)) {
 			foreach ($uris as $v) {
 				if(!empty($v['uri']))
 				$result[strtolower($v['uri'])] = $v['name'];
 			}
 		}
 		http::setSession('staff_rs', $result);
 	}
 	
 	
 	static  function destroyRole() {
 		http::delSession('staff_rs');
 	}
}

?>
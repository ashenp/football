<?php
/**
 * 对前台请求的接收,框架级处理服务, 再转交给controller层
 *
 */

class Request_Mgr extends Request {
	
	//默认首页
	protected $_default_module = 'admin';
	
	//默认执行的方法
	protected $_default_function = 'index';
	
	/**
	 * 这是控制层controller 不带action前缀的操作
	 *  
	 */
	final function publicService(){
		return true;
	}
	
	/**
	 * 处理服务处理,如登录验证,安全检测等系统检测,未来可以配置ICE服务client端
	 */
	final function systemService(){
		return true;
	}
	
	/**
	 * 这是控制层controller 带action前缀的操作
	 */
	final function actionService() {
		//这个部分暂时不启用，先注释
//	    //统一权限控制
//        $sessionId = isset($_COOKIE['PHPSESSID']) ? $_COOKIE['PHPSESSID'] : '';
//        if($sessionId == '') {
//            http::go('http://m.res.bpms.com');
//        }
//
//        $uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//        $remote = new Remote(ZY_SERVICE_ID);
//		$result = $remote->post('staff/checkRight',array('session_id'=>$sessionId, 'uri' => $uri));
//		if($result['code'] == 200) {
//            return true;
//        } elseif($result['code'] == 500) {
//            http::go('http://m.res.bpms.com');
//        } elseif($result['code'] == 501) {
//            return Response::displayError(1001);
//        } else {
//            return Response::displayError(10001);
//        }
        return true;
		$this->checkLogin();
		$this->checkRight();//检测权限
		return true;
	}
	
	/**
	 * 后台登录检测,记录日志
	 *
	 * @return bool
	 */
	public function checkLogin() {
		Log::instance()->addLog('登录日志填写');
		return Staff::checkLogin();
	}
	
	/**
	 * 检查权限,记录日志
	 *
	 * @return bool
	 */
 	public function checkRight() {
 		$resourceName = ltrim($_SERVER['REQUEST_URI'], '/');
 		$resourceName = explode('?', $resourceName);
 		$resourceName = $resourceName[0];
 		if(empty($resourceName)) {
 			return true;
 		}
 		if(!Staff::checkRight($resourceName)) {
// 			echo '系统提示:'.$resourceName.' 没有操作权限或者系统没有添加该资源.';
 			//开发专用,跳转到权限增加专用页面
 			if(Staff::getStaffId() == 100)
 			http::go(url::makemgr('resource/refresh?action='.$resourceName));
 			
 			if(staff::getStaffId() == 98) {
 				$rs = http::SESSION('staff_rs');
 				print_r($rs);
 				var_dump($resourceName);
 			}
 			
 			return Response::displayError(1001);
 		}
 		return true;
 	}
}

?>
<?php
/**
 * 对前台请求的接收,框架级处理服务, 再转交给controller层
 *
 */
class Request_Api extends Request {
	
	//默认首页
	protected $_default_module = 'index';
	
	//默认执行的方法
	protected $_default_function = 'index';
	
	//默认版本号
	protected $_default_version = '0.0.1';
 
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
		$this->checkLogin();
		return true;
	}
	
	/**
	 * 检查登录
	 *
	 */
	public function checkLogin() {
		return true;
		$uid = isset($_REQUEST['uid']) ? intval($_REQUEST['uid']) : 0;
		$accessKey = isset($_REQUEST['access_key']) ? trim($_REQUEST['access_key']) : '';
		$result = array();
		if(!$uid || strlen($accessKey) != 32) {
			$result = array(
				'status' => 401,
				'data' => '尚未登录,不允许操作'
			);
			echo json_encode($result);exit;
		}
		$key = User::makeKey($uid);
		if($key == $accessKey) {
			return true;
		}
		$result = array(
			'status' => 402,
			'data' => '登录信息校验错误'
		);
		echo json_encode($result);exit;
	}
	
	
}

?>
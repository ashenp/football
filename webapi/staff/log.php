<?php
/**
 * 公司员工管理
 *@author liu
 */
class WebApi_Staff_Log extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}
	

	
	//批量记录日志
	public function BatchAdd($uri, $resName, $sid, $sname, $logs, $data) {
		if(!$sid || empty($logs)) {
			return false;
		}
		$log = array();
		$log['uri'] = $uri;
		$log['res_name'] = $resName;
		$log['sid'] = $sid;
		$log['staff_name'] = $sname;
		$log['request_data'] = is_array($data) ? serialize($data) : $data ;
		$log['create_time'] = date('Y-m-d H:i:s', time());
		$log['create_ip'] = http::clientIP();
		foreach ($logs as $v) {
			$log['operation'] = $v;
			CoreApi_Staff_Log::instance()->insert($log);
		}
		 return true;
	}
	
	/**
	 * 获取用户的所有操作日志
	 *
	 * @param unknown_type $sid
	 */
	public function getLogsBySid($sid, $page =1, $pagesize=10) {
		if(!$sid) {
			return array();
		}
		
		return CoreApi_Staff_Log::instance()->search(array('staff_log_id', 'uri', 'res_name', 'sid', 'staff_name', 'operation', 'request_data', 'create_time', 'create_ip'), array('sid' => $sid), $page, $pagesize, 'staff_log_id', 'DESC');
	}
	
}
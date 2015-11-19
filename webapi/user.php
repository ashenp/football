<?php
/**
 *用户管理
 */
class WebApi_User extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}

	public function getUserInfoByUid($uid) {
		if (!$uid) {
			return array();
		}
		
// 		$remote = new Remote(RC_SERVICE_ID);
//         $returnData = $remote->post('user/getUserInfo', array('uid' => $uid));
        
		$remote = new Remote(USER_SERVICE_ID);
		$returnData = $remote->post('uccore/v1/api/account/findUserInfo', array('uid' => $uid));
        if ($returnData['code'] != 200) {
        	return array();
        }
        if (empty($returnData['data'])) {
        	return array();
        }
        
        return $returnData['data'];
	}
	
	/**
	 * 通过城市名称获取城市id
	 *
	 * @param string $name
	 * @return int id
	 */
	public function getRegionIdByName($name) {
		if (!$name) {
			return false;
		}
		
		$result = CoreApi_Region::instance()->search(array('region_id'), array('name' => $name), 1,1);
		if (empty($result)) {
			return false;
		}
		
		return $result[0]['region_id'];
	}
	
	/**
	 * 通过id获取省市区名称
	 *
	 * @param int $id
	 * @return array
	 */
	public function getRegionNameById($id) {
		if (!$id) {
			return false;
		}
		
		$result = CoreApi_Region::instance()->row(array('name'), $id);
		if (empty($result)) {
			return false;
		}
		
		return $result['name'];
	}
}
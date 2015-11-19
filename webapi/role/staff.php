<?php
/**
 * 公司员工管理
 *@author liu
 */
class WebApi_Role_Staff extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}
	
	/**
	 * 获取员工的所有角色
	 *
	 * @param integer $sid 员工ID
	 */
	public function getRolesBySid($sid) {
		if(!$sid) {
			return array();
		}
		$roles = CoreApi_Role_Staff::instance()->getRolesBySid($sid);
		$tmp = array();
		foreach ($roles as $role) {
			$tmp[$role['role_id']] = $role['role_id'];
		}
		 return $tmp;
	}
	
	/**
	 * 添加员工与角色的纪录
	 *
	 * @param array $row 数组
	 * @return integer ID
	 */
	public function add($row) {
		if(is_array($row) && !empty($row)) {
			return CoreApi_Role_Staff::instance()->insert($row);
		}
		return false;
	}
	
	public function deleteRole($sid, $rid) {
		if($rid) {
			return CoreApi_Role_Staff::instance()->deleteRole($sid, $rid);
		}
		return false;
	}
	
	/**
	 * 删除角色和员工绑定关系
	 *
	 * @param int $rid 角色id
	 * @return bool
	 */
	public function deleteRelationByRid($rid) {
		if (!$rid) {
			return false;
		}
		return CoreApi_Role_Staff::instance()->deleteRelationByRid($rid);
	}
	
	/**
	 * 通过rid获取一条数据
	 *
	 * @param intger $rid
	 */
	public function getRelationByRid($rid) {
		if (!$rid) {
			return false;
		}
		
		return CoreApi_Role_Staff::instance()->getRelationByRid($rid);
	}
	
	/**
	 * 获取角色和管理员的映射
	 * @param array $staffIds
	 * @return array
	 * @author zy 
	 */
	public function getRoleStaffMappingByStaffIds($staffIds) {
		if(!is_array($staffIds) || empty($staffIds)) {
			return array();
		}
		
		return CoreApi_Role_Staff::instance()->getRoleStaffMappingByStaffIds($staffIds);
	}
}
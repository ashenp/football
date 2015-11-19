<?php
/**
 * 公司角色管理
 *@author liu
 */
class WebApi_Role extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}
 
   
 
	/**
	 * 添加角色
	 *
	 * @param array $role
	 * @return integer 角色ID
	 */
	public function add($role) {
		if(!is_array($role) || empty($role)) {
			return false;
		}
	
		unset($role['role_id']);
		return CoreApi_Role::instance()->insert($role);
	}
	
	/**
	 * 修改角色信息
	 *
	 * @param array $staff 角色信息
	 * @param integer $sid 角色ID
	 * @return integer 影响行数
	 */
	public function modify($role, $sid) {
		if(!is_array($role) || empty($role) || !$sid) {
			return false;
		}
		unset($role['role_id']);
		return CoreApi_Role::instance()->update($role, $sid);
	}
	/**
	 * 获取所有的角色
	 *
	 * @return array 所有角色
	 */
	public function getAllRoles($returnType = 'array') {
		$roles = CoreApi_Role::instance()->getAllRoles($returnType);
		if($returnType == 'array') {
			$tmp = array();
			foreach ($roles as $role) {
				$tmp[$role['role_id']] = $role;
			}
			return $tmp;
		}
		return $roles;
	}
	
	public function getRoleByRoleId($roleid) {
		if($roleid) {
			return CoreApi_Role::instance()->row('*', $roleid);
		}
		return array();
	}
	
	
	public function delete($sid) {
		$staff['status'] = -1;
		$staff['update_time'] = time();
		return CoreApi_Role::instance()->delete($sid);
		
	}
	/**
	 * 批量保存角色的资源
	 *
	 * @param integer $roleid
	 * @param array $resources
	 * @return bool
	 */
	public function batchAddResource($roleid, $resources) {
		if(!$roleid || empty($resources)) {
			return false;
		}
		//删除所有
		CoreApi_Role::instance()->deleteResources($roleid);
		
		//添加所有
		$result = array();
		foreach ($resources as $r) {
			$result[] = CoreApi_Role::instance()->addResource($roleid, $r);
		}
		return $result;
	}
	
	
	public function getResourceByRoleId($roleid) {
		if($roleid) {
			$rs = CoreApi_Role::instance()->getResourceByRoleId($roleid);
			if(!empty($rs)) {
				$tmp = array();
				foreach ($rs as $v) {
					$tmp[$v['resource_id']] = $v['resource_id'];
				}
				return $tmp;
			}
		}
		return array();
	}
	
	/**
	 * 获取多个角色的所有资源
	 *
	 * @param array $rids
	 */
	public function getResourcesByRids($rids) {
		if(empty($rids)) {
			return array();
		}
		$rs = CoreApi_Role::instance()->getResourcesByRids($rids);
		if(!empty($rs)) {
			$tmp = array();
			foreach ($rs as $v) {
				$tmp[$v['resource_id']] = $v['resource_id'];
			}
			return $tmp;
		}
		return $rs;
	}
	
	/**
	 * 检查角色的名称是否重复
	 *
	 * @param string $name
	 * @return int
	 */
	public function checkNameExist($name) {
		if (!$name) {
			return false;
		}
		return CoreApi_Role::instance()->checkNameExist($name);
	}
	
	/**
	 * 删除角色和资源绑定关系 没有写role_resource的操作类 放到这里面了
	 *
	 * @param int $rid 角色id
	 * @return bool
	 */
	public function deleteResourceByRid($rid) {
		if (!$rid) {
			return false;
		}
		return CoreApi_Role::instance()->deleteResourceByRid($rid);
	}
	
	/**
	 * 获取角色通过角色IDS
	 * @param array $roleIds 角色IDS
	 * @return array
	 * @author zy 
	 */
	public function getRolesByRoleIds($roleIds) {
		if(!is_array($roleIds) || empty($roleIds)) {
			return array();
		}
		
		return CoreApi_Role::instance()->rows('*', $roleIds, 'array');
	}
}
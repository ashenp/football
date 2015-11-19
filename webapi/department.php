<?php
/**
 * 公司员工管理
 *@author liu
 */
class WebApi_Department extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}
	

	public function add($department) {
		if(is_array($department) && !empty($department)) {
			$department['count'] = 0;
			unset($department['department_id']);
			return CoreApi_Department::instance()->insert($department);
		}
		return false;
	}
	
	public function modify($department, $department_id) {
		if(is_array($department) && !empty($department) && $department_id) {
			return CoreApi_Department::instance()->update($department, $department_id);
		}
		return false;
	}
	
	public function delete($departmentId) {
		if($departmentId) {
			$ds = $this->getDepartmentsByParent($departmentId);
			if(!empty($ds)) {
				foreach ($ds as $v) {
					CoreApi_Department::instance()->delete($v['department_id']);
				}
			}
	 		CoreApi_Department::instance()->delete($departmentId);
	 		return true;
		}
		return false;
	}
	
	public function getAllDepartments() {
		$departments = CoreApi_Department::instance()->getAllDepartments();
		$departments = $this->rebuiltDepartments($departments);
		return $departments;
	}
	
	
	
	
	/**
	 * 重新构造数组
	 *
	 * @param array $departments 组织架构
	 * @return array
	 * @author zhang
	 */
	private function rebuiltDepartments($departments) {
		if(!is_array($departments) || empty($departments)) {
			return array();
		}
		$tmp = array();
		foreach ($departments as $department) {
			$tmp[$department['department_id']] = $department;
		}
 
		$departments = array();
		foreach ($tmp as $k => $department) {
			$tmp[$k]['path'] = '';
			$tmp[$k]['depth'] = 0;
			$parent = $department['parent'];
			
			$tmp[$k]['path'] .= $department['department_id'].',';
			$tmp[$k]['depth'] = 0;
			while ($parent != 0) {
				$parentcategory = $tmp[$parent];
				$tmp[$k]['path'] = $parentcategory['department_id'].','.$tmp[$k]['path'];
				$tmp[$k]['depth'] += 1;
				$parent = $parentcategory['parent'];
			}
		}
		//重新排序
		usort($tmp, 'my_sort');
		return $tmp;
	}
	
	/**
	 * 获取一个部门的详细信息
	 *
	 * @param integer $departmentId
	 * @return array 部门信息
	 */
	public function getDepartmentById($departmentId) {
		if($departmentId) {
			return CoreApi_Department::instance()->row('*', $departmentId);
		}
		return array();
	}
	
	/**
	 * 获取子部门
	 *
	 * @param integer $parent 父ID
	 * @return array 子分类数组
	 */
	public function getDepartmentsByParent($parent, $name=true) {
		$departments = $this->getAllDepartments();
		
		if(!is_array($departments) || empty($departments)) {
			return array();
		}
		$tmp = array();
		foreach ($departments as $department) {
			if($parent <= $department['parent']) {
				$path = ','.$department['path'];
				if(str_replace(','.$parent.',', '', $path) != $path) {
					if($name) {
						$tmp[$department['department_id']] = $department;
					} else{
						$tmp[$department['department_id']] = $department['department_id'];
					}
				} else {
					//var_dump($path, $parent);
					//break;
				}
			}
		}
		return $tmp;
	}
	
	//根据部门ids获取多个部门信息
	public function getDepartmentsByDepartmentIds($departmentIds) {
		if (empty($departmentIds)) {
			return array();
		}
		return CoreApi_Department::instance()->getDepartmentsByDepartmentIds($departmentIds);
	}
	
}
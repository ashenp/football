<?php
/**
 * 公司员工管理
 *@author liu
 */
class WebApi_Staff extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}
	
	/**
	 * 用户登录
	 *
	 * @param string $username 员工用户名或者邮箱
	 * @param string $password 员工密码
	 * @param integer $remember 是否记住用户
	 * @return bool 成功与否
	 */
	public function login($username, $password, $remember = 0) {
		return true;
		if($username == '' || $password == '') {
			return false;
		}

		//判断是否邮箱
		if(filter_var($username, FILTER_VALIDATE_EMAIL)) {//邮箱登录
			$user = CoreApi_Staff::instance()->getStaffByEmail($username);
			
		} else {//普通登录
			$user = CoreApi_Staff::instance()->getStaffByUsername($username);
		}
		if($user->password != md5($password)) {
			return false;
		}
		
		if ($user->status ==-1) {
			return false;
		}

		//登录成功,添加session, cookie的处理
		Staff::setLogin($user->sid, $user->username, $user->name, $user->email, $remember);
		return true;
	}
	
	
	public function logout() {
		Staff::setLogout();
		return true;
	}
	
	/**
	 * 返回一个部门的所有工作人员
	 * 24 表示销售 DEPARTMENT_SELLER
	 * @param integer $departmentId
	 * @return array 工作人员
	 */
	public function getStaffsByDepartmentId($departmentId) {
		if(!$departmentId) {
			return array();
		}
		//检查子部门
		$ds = WebApi_Department::instance()->getDepartmentsByParent($departmentId, false);
		$ds[] = $departmentId;//加入自身
		$staffs = CoreApi_Staff::instance()->getStaffsByDepartmentIds($ds);
		return $staffs;
	}
	 
	public function getAllSellers() {
		return $this->getStaffsByDepartmentId(DEPARTMENT_SELLER);
	}
	
	/**
	 * 返回一个部门的所有工作人员总数
	 *
	 * @param integer $departmentId
	 * @return integer 工作人员总数
	 */
	public function getStaffCountByDepartmentId($departmentId) {
		if(!$departmentId) {
			return array();
		}
		//检查子部门
		$ds = WebApi_Department::instance()->getDepartmentsByParent($departmentId, false);
		$ds[] = $departmentId;
		
		$staffs = CoreApi_Staff::instance()->getStaffCountByDepartmentIds($ds);
		return $staffs;
	}
 
	/**
	 * 添加工作人员
	 *
	 * @param array $staff
	 * @return integer 员工ID
	 */
	public function add($staff) {
		if(!is_array($staff) || empty($staff)) {
			return false;
		}
		$staff['password'] = md5($staff['password']);
		$staff['mobile'] = '';
		$staff['sex'] = 1;
		$staff['status'] = 1;
		$staff['credit'] = 0;
		$staff['create_time'] = $staff['update_time'] = time();
		$staff['last_login'] = '0000-00-00';
		$staff['last_login_ip'] = '';
		unset($staff['sid']);
		return CoreApi_Staff::instance()->insert($staff);
	}
	
	/**
	 * 修改员工信息
	 *
	 * @param array $staff 员工信息
	 * @param integer $sid 员工ID
	 * @return integer 影响行数
	 */
	public function modify($staff, $sid) {
		if(!is_array($staff) || empty($staff) || !$sid) {
			return false;
		}
		$staff['update_time'] = time();
		unset($staff['sid']);
		return CoreApi_Staff::instance()->update($staff, $sid);
	}
	/**
	 * 获取所有的员工
	 *
	 * @return array 所有员工
	 */
	public function getAllStaffs($returnType = 'array') {
		return CoreApi_Staff::instance()->getAllStaffs($returnType);
	}
	
	
	public function delete($sid) {
		$staff['status'] = -1;
		$staff['update_time'] = time();
		return CoreApi_Staff::instance()->update($staff, $sid);
		
	}
	
	/**
	 * 返回一个员工的信息
	 *
	 * @param integer $sid
	 * @return 员工信息
	 */
        public function getStaffBySid($sid, $name=false) {
		if($sid) {
			$staff = CoreApi_Staff::instance()->row('*', $sid);
			if($name) {
				return isset($staff['name']) ? $staff['name'] : '';
			}
			return $staff;
		}
		if($name) {
			return '';
		}
		return array();
	}
	
	/**
	 * 获取用户可用的信用额度
	 *
	 * @param integer $sid
	 * @return integer 信用额度
	 */
	public function getStaffCredit($sid) {
		$staff = $this->getStaffBySid($sid);
		return isset($staff['credit']) ? $staff['credit'] : 0;
	}
	
	
	/**
	 * 一次性获取多个销售 的信息
	 *
	 * @param array $sids
	 * @return array 员工数组
	 */
	public function getStaffsBySids($sids, $name=false) {
		if(is_array($sids) && !empty($sids)) {
			$staffs =  CoreApi_Staff::instance()->rows('*', $sids);
			$s = array();
			if(!empty($staffs)) {
				foreach ($staffs as $staff) {
					if($name) {
						$s[$staff['sid']] = $staff['name'];
					}else
					$s[$staff['sid']] = $staff;
				}
			}
			return $s;
		}
		return array();
	}
	
	
	/**
	 * 根据名称获取员工信息
	 *
	 * @param string $username
	 * @return array
	 */
	public function getStaffByUsername($username) {
		if($username == '') {
			return array();
		}
		return CoreApi_Staff::instance()->getStaffByUsername($username);
	}
	
	public function getStaffByEmail($username) {
		if($username == '') {
			return array();
		}
		return CoreApi_Staff::instance()->getStaffByEmail($username);
	}
	
	/**
	 * 通过销售名字获取销售信息
	 * @param string $name 销售名称
	 * @return array 销售信息数组
	 */
	public function getStaffByName($name) {
		if (!$name) {
			return false;
		}
		return CoreApi_Staff::instance()->getStaffByName($name);
	}
	
	/**
	 * 用于用户查询
	 *
	 * @param string $keyword
	 */
	public function getStaffByNameOrSid($keyword) {
		if ($keyword == '') {
			return array();
		}
		return CoreApi_Staff::instance()->getStaffByNameOrSid($keyword);
	}
	
	/**
	 * 更新员工的信用额度
	 * @param $credit --信用度
	 */
	public function updateCreditBySid($credit, $sid) {
		if (!$credit || !$sid) {
			return false;
		}
		return CoreApi_Staff::instance()->updateCreditBySid($credit, $sid);
	}
	
	/**
	 * 获取多个信息 通过id
	 * @return object;
	 * @author ysy
	 */
	public function getStaffBySidByparams($operateStaffIds, $returnType = 'array') {
		
		if(!is_array($operateStaffIds) || empty($operateStaffIds)) {
			return $returnType == 'array'?array():new $returnType();
		}
		$userStaffInfo = CoreApi_Staff::instance()->rows("*",$operateStaffIds,$returnType);
		return $userStaffInfo;
	}


	
}
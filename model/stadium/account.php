<?php
class Model_Stadium_Account extends Model {
	public static $titleArray = array(
				'1' => '前台',
				'2' => '客户经理',
				'3' => '球场经理',
			);
	
	public static $createPersonTypeArray = array(
		'1' => '平台操作者',
		'2' => '场馆管理员',
	);
	
	public static $statusArray = array(
		'1'		=> '已审核',
		'0'		=> '未审核',
		'-1'	=> '已禁用',
		'-2'	=> '已删除',
	);
	
	public static $isAdminArray = array('0' => '否','1' => '是');
	
	//审核状态
	public static $_STATUS_APPROVE = 1;//审核通过
	public static $_STATUS_NOT_APPROVE = 0;//未审核
	public static $_STATUS_FORBIDDEN = -1;//禁用
	public static $_STATUS_DELETE = -2;//删除
	
	/**
	 * 获取职称
	 * @param array $titleArray
	 * @return string
	 * @author zy 
	 */
	public function getTitleName() {
		if(isset(self::$titleArray[$this->title])) {
			return self::$titleArray[$this->title];
		}
		
		return '';
	}
	
	/**
	 * 获取是否是管理员
	 * @param array $isAdminArray
	 * @return string
	 * @author zy 
	 */
	public function getIsAdmin() {
		if(isset(self::$isAdminArray[$this->is_admin])) {
			return self::$isAdminArray[$this->is_admin];
		}
		return '';
	}
	
	/**
	 * 获取创建人
	 * @param array $staffs
	 * @param array $stadiumAccounts
	 * @param array $createPersonTypeArray
	 * @return string
	 * @author zy 
	 */
	public function getCreatePerson($staffs, $stadiumAccounts) {
		$typeName = '';
		if(isset(self::$createPersonTypeArray[$this->create_person_type])) {
			$typeName = self::$createPersonTypeArray[$this->create_person_type];
		}
		if($this->create_person_type == 1) {
			if(isset($staffs[$this->create_person_id])) {
				return $staffs[$this->create_person_id]['name'].'('.$typeName.')';
			}
			
			return '';
		} else {
			if(isset($stadiumAccounts[$this->create_person_id])) {
				return $stadiumAccounts[$this->create_person_id]['name'].'('.$typeName.')';
			}
			return '';
		}
	}

	/**
	 * 获取状态名称
	 * @param array $statusArray
	 * @return string
	 * @author zy 
	 */
	public function getStatusName() {
		if(isset(self::$statusArray[$this->status])) {
			return self::$statusArray[$this->status];
		}
		
		return '';
	}
	
	/**
	 * 获取关联场馆个数
	 * @param array $relationStadiumCountList
	 * @return int
	 * @author zy 
	 */
	public function getRelationStadiumCount($relationStadiumCountList) {
		if(isset($relationStadiumCountList[$this->stadium_account_id])) {
			return $relationStadiumCountList[$this->stadium_account_id];
		}
		
		return 0;
	}
	
}
?>
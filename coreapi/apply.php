<?php
class CoreApi_Apply extends CoreApi {
	protected $_tableName = 'apply';
	protected $_primaryKey = 'uid';
	protected $_fields = array(
		'apply_id' => 'int',
		'uid' => 'int',
		'activity_id' => 'int'
	);
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__) || empty(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}

	public function findApply($uid, $activityId) {
		$sql = 'select * from '.$this->_tableName.' where 1';
		$sql .= ' and uid=:uid';
		$sql .= ' and activity_id=:activity_id';
		$binds = array();
		$binds[':uid'] = $uid;
		$binds[':activity_id'] = $activityId;
		return $this->db->select($sql, $binds);
	}

	public function findActivityApply($activityId) {
		$sql = 'select * from '.$this->_tableName.' where 1';
		$sql .= ' and activity_id=:activity_id';
		$binds = array('activity_id'=>$activityId);
		return $this->db->select($sql, $binds);
	}

	public function addApply($uid, $activityId) {
		$sql  = 'insert into '.$this->_tableName.'(uid, activity_id)'.' values ('.$uid.','.$activityId.')';
		return $this->db->insert($sql);
	}


}



<?php 

class CoreApi_User extends CoreApi {

	protected static $instance__;
	protected $_tableName = 'user';
	protected $_primaryKey = 'uid';


	public static function instance() {
		if(!isset(self::$instance__)) {
			$className = __CLASS__;
			self::$instance__ = new $className();
		}
		return self::$instance__;
	}

	//get one user by
	public function getUserByEmail($email) {
		$sql = 'select * from '.$this->_tableName;
		$sql .= ' where email=:email';
		$sql .= ' and status<>-1';
		$binds = array();
		$binds[':email'] = $email;
		return $this->db->select_one($sql, $binds); 
	}

	public function getAllUserByEmail($email) {
		$sql = 'select * from '.$this->_tableName;
		$sql .= ' where email=:email';
		$sql .= ' and status<>-1';
		$binds = array();
		$binds[':email'] = $email;
		return $this->db->select($sql, $binds);
	}

	public function addUserByParams($params) {
		$createTime = date('Y-m-d H:i:s', time());
		$sql = 'insert into '.$this->_tableName;
		$sql .= ' (username,password,email,create_time,status) ';
		$sql .= ' values (:name,:password,:email,:create_time,:status)';
		$binds = array();
		$binds[':name'] = $params['username'];
		$binds[':password'] = $params['password'];
		$binds[':email'] = $params['email'];
		$binds[':create_time'] = $createTime;
		$binds[':status'] = 0;//at first set status=0  havn't been activated
		return $this->db->insert($sql, $binds);
	}

	public function activateUserByUid($uid) {
		$sql = 'update '.$this->_tableName.' set status=:status';
		$sql .= ' where uid=:uid';
		$binds = array();
		$binds[':uid'] = $uid;
		$binds[':status'] = 1;
		return $this->db->update($sql, $binds);
	}


}



 ?>
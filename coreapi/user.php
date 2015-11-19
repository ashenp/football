<?php
class CoreApi_User extends CoreApi {
	protected $_tableName = 'user';
	protected $_primaryKey = 'uid';
	protected $_fields = array(
		'uid' => 'int',
		'username' => 'string',
		'password' => 'string',
		'question' => 'string',
		'answer' => 'string',
		'realname' => 'string',
		'sex' => 'int',
		'address' => 'string',
		'mobile' => 'string',
		'email' => 'string'
	);
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__) || empty(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}

	public function getUser($params) {
		$sql = 'select * from '.$this->_tableName.' where 1';
		$binds = array();
		foreach ($params as $key => $value) {
			$sql .= ' and '.$key.'=:'.$key;
			$binds[':'.$key] = $value; 
		}
		return $this->db->select_one($sql, $binds);
	}
	
	

	public function addUser($params) {
		$sql = 'insert into '.$this->_tableName.'(username, password, realname, sex, email, mobile, address, question, answer) values (';
		$sql .= "'".$params['username']."',";
		$sql .= "'".$params['password']."',";
		$sql .= "'".$params['realname']."',";
		$sql .= $params['sex'].',';
		$sql .= "'".$params['email']."',";
		$sql .= "'".$params['mobile']."',";
		$sql .= "'".$params['address']."',";
		$sql .= "'".$params['question']."',";
		$sql .= "'".$params['answer']."')";
		return $this->db->insert($sql);
	}



}



<?php 

class CoreApi {

	protected $db;
	protected $_tableName;
	protected $_primaryKey;

	public function __construct() {
		$this->db = db::instance();
	}


	//field is '*' or a array
	public function row($value, $field = '*') {
		if(!isset($field) || !isset($value)) {
			return false;
		}
		$selectField = '';
		if($field == '*') {
			$selectField = $field;
		}else if(is_array($field)){
			$selectField = implode(',', $field);
		}else {
			return false;
		}
		$sql = 'select '.$selectField.' from '.$this->_tableName.' where '.$this->_primaryKey.'=:primaryKey';
		$binds = array();
		$binds[':primaryKey'] = $value;
		return $this->db->select_one($sql, $binds);
	}

}



 ?>
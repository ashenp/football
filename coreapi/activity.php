<?php 

class CoreApi_Activity extends CoreApi {
	protected $_tableName = 'activity';
	protected $_primaryKey = 'activity_id';
	protected $_fields = array(
		'activity_id' => 'int',
		'title' => 'string',
		'content' => 'string',
		'date' => 'string',
		'status' => 'int'
	);
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__) || empty(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}


	public function getActivities($params) {
		$sql = 'select * from '.$this->_tableName.' where 1';
		$binds = array();
		foreach ($params as $key => $value) {
			$sql .= ' and '.$key.'=:'.$key;
			$binds[':'.$key] = $value; 
		}
		$sql .= ' order by '.'activity_id'.' DESC ';
		return $this->db->select($sql, $binds);
	}

	public function pageActivities($params, $page = 1, $pagesize = 10) {
		$sql = 'select * from '.$this->_tableName.' where 1';
		$binds = array();
		foreach ($params as $key => $value) {
			$sql .= ' and '.$key.'=:'.$key;
			$binds[':'.$key] = $value; 
		}
		$sql .= ' order by '.'activity_id'.' DESC ';
		return $this->db->page($sql, $binds ,$page, $pagesize);
	}

	public function addActivity($title, $content) {
		$sql = 'insert into '.$this->_tableName.'(title,content,date,status)'.' values (';
		$sql .= "'".$title."',";
		$sql .= "'".$content."',";
		$sql .= "'".date('Y-m-d')."',";
		$sql .= '1)';
		return $this->db->insert($sql);
	}

	public function deleteActivity($activityId) {
		$sql = 'update '.$this->_tableName.' set status=0';
		$sql .= ' where activity_id='.$activityId;
		return  $this->db->update($sql);
	}
}
















 ?>
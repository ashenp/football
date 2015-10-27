<?php 
	//singleton pattern pdo class
class db {
	
	private static $db;
	private static $linkstatus = false;

	private static $instance__;
	//instance
	public static function &instance($module = 'default') {
		if(!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__  = new $class(); 
			global $dbArray;
			self::$db = null;
			self::$db = new PDO($dbArray[$module]['dsn'], $dbArray[$module]['name'], $dbArray[$module]['password']);
			self::$db->exec('SET NAMES UTF8');
		}
		return self::$instance__;
	}

	public static function begintrans($module = 'default') {
		if(!isset(self::$instance)){
			$class = __CLASS__;
			self::$instance__  = new $class(); 
			global $dbArray;
			self::$db = null;
			self::$db = new PDO($dbArray[$module]['dsn'], $dbArray[$module]['name'], $dbArray[$module]['password']);
			self::$db->exec('SET NAMES UTF8');
		}
		self::$db->beginTransaction();
	}

	public static function commit() {
		self::$db->commit();
	}

	public static function rollback() {
		self::$db->rollback();
	}

	//query the select sql and return a assoc array or flase
	public function select($sql, $binds = array()) {
		$sth = self::$db->prepare($sql);
		
		$flag = $sth->execute($binds);
		if($flag) {
			return $sth->fetchAll(PDO::FETCH_ASSOC);//return array when success
		}else {
			return false;//return false when sql is wrong
		}
	}

	//query the select sql and return a assoc array or flase
	public function select_one($sql, $binds = array()) {
		$sth = self::$db->prepare($sql);
		$flag = $sth->execute($binds);
		if($flag) {
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);//return array when success
			if(!empty($result)) {
				return $result[0];
			}else {
				return $result;
			}
		}else {
			return false;//return false when sql is wrong
		}
		
	}

	//return last insert id
	public function insert($sql, $binds = array()) {
		$sth = self::$db->prepare($sql);
		$flag = $sth->execute($binds);
		if($flag) {
			return self::$db->lastInsertId();//return the rows count the have been modified
		} else {
			// var_dump($sth->errorInfo());
			return false;
		}
		
	}

	public function update($sql, $binds = array()) {
		$sth = self::$db->prepare($sql);
		$flag = $sth->execute($binds);
		if($flag) {
			return $sth->rowCount();//return the rows count the have been modified
		} else {
			return false;
		}
	}

	public function delete($sql, $binds = array()) {
		$sth = self::$db->prepare($sql);
		$flag = $sth->execute($binds);
		if($flag) {
			return $sth->rowCount();//return the rows count the have been modified
		} else {
			return false;
		}
	}
}

?>
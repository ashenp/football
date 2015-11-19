<?php
/**
 * @package     liu
 * @copyright   liu
 * @author      liu
 * @version     $ $
 */
class db {
	
	public static $writeConn = null; //支持事务,所以静态化
	public static $readConn = null;
	
 	private $writeSTMT = null;
	private $readSTMT = null;
	
	private $writeArray = array();
	private $readArray = array();
	
	private $mode = 'read';//操作数据库的方式

	private $readFromWrite = false;
	
	public static $transTimes = 0;
	
	public static  $lastSQL = '';
	public static  $line;
	
	public static $_mod = 'Default';
	
	
	/**
	 * 初始化DB,并且要找到相应的静态数据库连接
	 *
	 * @param string $mod 配置模块
	 * @param string $connChar 编码集
	 */
	public function __construct($mod = "Default",  $connChar = 'utf8') {
	    $dbMod = self::$_mod;
		if($dbMod != $mod) {
		    db::$writeConn = null;
		    self::$_mod = $mod;
		}

		if (config("dbs", $mod) == ""){
			$mod = 'Default';
		}
		$m = config("dbs", $mod);
		if(empty($m)) {
			$m = config("dbs", 'Default');
		}
 
		$dsn = $m["write"];
		$dsn = explode('|', $dsn, 3);
		$dsn0 = isset($dsn[0]) ? $dsn[0] : "";
		$dsn1 = isset($dsn[1]) ? $dsn[1] : "";
		$dsn2 = isset($dsn[2]) ? $dsn[2] : "";
		$this->writeArray = array($dsn0, $dsn1, $dsn2);
		$this->readArray = array();
		$i = count($m["reads"]);
		if ($i == 1){
			$this->readArray = explode('|', (string)$m["reads"], 3);
		} else {
			while ($i) {
				$i--;
				$dsn = (string) $m["reads"][$i];
				$dsn = explode('|', $dsn, 3);
				array_push($this->readArray, $dsn[0], $dsn[1], $dsn[2]);
			}
		}
	}
	
	//初始化数据库的连接
	public function initConn() {
		if($this->mode == 'read') {
			$this->initReadConn();
		} else {
			$this->initWriteConn();
		}
	}
	
	//初始化读的数据库连接
	private function initReadConn() {
		if($this->readFromWrite === true){
			self::$readConn = $this->get_connection($this->writeArray[0], $this->writeArray[1], $this->writeArray[2]);
			return true;
		}
		if(count($this->readArray)%3 == 0 && count($this->readArray) >=3) {
			$conn_count = count($this->readArray)/3;
			$used_conn = rand(0, $conn_count-1);
			$url = $this->readArray[$used_conn*3];
			$user = $this->readArray[$used_conn*3 + 1];
			$passwd = $this->readArray[$used_conn*3 + 2];
			self::$readConn = $this->get_connection($url, $user, $passwd);
		} else {
			self::log("db connection set is error!");
		}
	}
	
	//初始化写的数据库连接
	private function initWriteConn() {
		if(self::$writeConn === null) {
			self::$writeConn = $this->get_connection($this->writeArray[0], $this->writeArray[1], $this->writeArray[2]);
		}
		if(self::$transTimes == 1) {
			self::$writeConn->beginTransaction();
			self::$transTimes = 2;
		} 
//		else {
//			self::$writeConn = $this->get_connection($this->writeArray[0], $this->writeArray[1], $this->writeArray[2]);
//		}
	}
	
		/**
     *    create connection
     *    $url connect to db url
     *    $user connect to db user
     *    $passwd connect to db password
     *  OK
     */
	private function get_connection($url, $user, $passwd) {
		$conn = null;
		try{
			$attr = array();
			$attr[PDO::ATTR_PERSISTENT] = FALSE;
			$attr[PDO::ATTR_TIMEOUT]    = 5;
			$attr[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'utf8'";
			$conn = new PDO($url, $user, $passwd, $attr);
		}catch(PDOException $e){
			self::log('[WARN!!!] CLIENT='.http::getClientIP().' URI= '.$_SERVER['REQUEST_URI'].' DB='.$url.' ERRCODE= '.$e->getCode()."\n ERRMSG=".$e->getMessage()." Referer: ".(isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"None"));
		}
		if( $conn ){
			$db_info = $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($db_info == "MySQL server has gone away") {
				$conn = new PDO($url, $user, $passwd, $attr);
			}
		}
		return $conn;
	}
	
	
		/**
     * prepare write sql
     * OK
     */
	private function write_prepare($sql) {
		if($sql == '') {
			return false;
		}
		$this->initConn();
		if(null == self::$writeConn ) {
			return false;
		}

		self::$lastSQL = $sql;
		$this->writeSTMT = self::$writeConn->prepare($sql);
	}

	/**
     * prepare read sql
     * OK
     */
	private function read_prepare($sql) {
		if($sql == '') {
			return false;
		}
		
		$this->initConn();
		self::$lastSQL = $sql;
		if( null == self::$readConn )
			return false;;
		$this->readSTMT = self::$readConn->prepare($sql);
		return true;
	}

	/**
     * bind write params
     * OK
     */
	private function write_bind($param, $var) {
		if( !isset($param)){
			return;
		}
		if( null == $param){
			return;
		}
		if( !isset( $this->writeSTMT)){
			return;
		}
		if( null == $this->writeSTMT ){
			return;
		}
		$this->writeSTMT->bindParam($param, $var);
	}

	/**
     * bind read params
     * OK
     */
	private function read_bind($param, $var) {
		if($this->readFromWrite) {
			return $this->write_bind($param, $var);
		}
		if(!isset($param))
			return;
		if( null == $param)
			return;
		if( !isset($this->readSTMT))
			return;
		if( null == $this->readSTMT )
			return;
		$this->readSTMT->bindParam($param, $var);
	}
	
	public function page($sql, $binds, $page, $pageSize, $returnFormat = 'Array') {
		$limitSQL = '';
		if($pageSize > 0) {
			$limitSQL = " limit ".(($page - 1) * $pageSize).", ".$pageSize;
		}
		return  $this->select($sql.$limitSQL, $binds, $returnFormat);
		 
	}
	
	public function select($sql, $binds = array(), $returnFormat = 'Array', $close = true){
		$this->mode = 'read';
		if(self::$transTimes) {
			$this->mode = 'write';
			$bool = $this->write_prepare($sql);
		} else {
			$bool = $this->read_prepare($sql);
		}
		$results = array();

		if(is_array($binds) && !empty($binds)){
			$i=0;
			foreach($binds as $param => $var){
				$i++;
				if(!$param || is_numeric($param)){
					$param = $i;
				}else if($param[0]!=':'){
					$param = ':'.$param;
				}
				
				if($this->mode == 'write') {
					$this->write_bind($param, $var);
				} else {
					$this->read_bind($param, $var);
				}
			}
		}

		if ($this->mode == 'write' && self::$transTimes) {
			$this->writeSTMT->execute();
			$results = $this->writeSTMT->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$this->readSTMT->execute();
			$results = $this->readSTMT->fetchAll(PDO::FETCH_ASSOC);
		}
		
		
		
		if ($close !== false) {
			$this->readSTMT_close();;
			$this->read_close();
			$this->writeSTMT_close();
//			$this->write_close();
		}
		
		if(strtolower($returnFormat) == 'array') {
			return $results;
		}
		
		//对象化数据
		$object = new ArrayObject();
		if(!empty($results)) {
			$model = new $returnFormat;
			foreach($results as $row) {
				$model = clone $model;
				$model->setRow($row);
				$object->append($model);
			}
		}
		return $object;
	}
	
	public function select_one($sql, $binds = array(), $returnFormat = 'Array', $close = false){
		$results = $this->select($sql, $binds, 'Array', $close);
		if(strtolower($returnFormat) == 'array') {
			return isset($results[0])&&is_array($results[0]) ? $results[0] : array();
		} else {
			$model = new $returnFormat;
			if (isset($results[0])&&is_array($results[0])&&!empty($results[0])) {
				$model->setRow($results[0]);
			}
			return $model;
		}
	}
	
	public function update($sql, $binds = array(), $close = false){
		$this->mode = 'write';
		return $this->execute($sql, $binds, $close, "update");
	}
	
	public function delete($sql, $binds = array(), $close = false){
		$this->mode = 'write';
		return $this->execute($sql, $binds, $close, "delete");
	}
	
	public function insert($sql, $binds = array(), $close = false){
		$this->mode = 'write';
		return $this->execute($sql, $binds, $close, "insert");
	}
	
	public function emptyPage(){
		$r = new stdClass();
		$r->total        = 0;
		$r->totalPage    = 0;
		$r->page         = 1;
		$r->pageSize     = 20;
		$r->offset       = 0;
		$r->records      = array();
		$r->recordFormat = "array";
		$r->querytime    = 0;
		return $r;
	}
	
	public function execute($sql, $binds = array(), $close = false, $type="other"){
		$this->write_prepare($sql);
		if (!$this->writeSTMT)
			return false;
		try{
			if(is_array($binds) && !empty($binds)){
				$i=0;
				foreach($binds as $param => $var){
					$i++;
					if(!$param || is_numeric($param)){
						$param = $i;
					}else if($param[0] != ':'){
						$param = ':'.$param;
					}
					$this->write_bind($param, $var);
				}
			}

			$result = $this->writeSTMT->execute();
			if($result == false) {
				var_dump($this->writeSTMT->errorInfo());
				return false;
			}
			if ($close !== false) {
				$this->writeSTMT_close();
				$this->write_close();
			}
			
		} catch (Exception $e){
			echo  'SQL:'.self::$lastSQL;
			ECHO '<HR>错误原因:'.$e->getMessage();
			return false;
		}
		switch ($type){
			case "insert":
				return (integer)$this->lastInsertID() ? (integer)$this->lastInsertID() : true;
			case "delete":
			case "update":
				return (integer)$this->getRowCount();
		}
		
		return $result;
	}
	
	/**
     * close write stmt
     * OK
     */
	public function writeSTMT_close() {
		$this->writeSTMT = null;
	}

	/**
     * close read stmt
     * OK
     */
	public function readSTMT_close() {
		$this->readSTMT = null;
	}

	/**
     * close all
     * OK
     */
	public function write_close() {
		$this->writeSTMT = null;
		self::$writeConn = null;
	}

	/**
     * close all
     * OK
     */
	public function read_close() {
		$this->readSTMT = null;
		self::$readConn = null;
	}
	
		/**
     * get last insert primary key
     * OK
     */
	public function lastInsertID() {
		if( !isset( self::$writeConn ) )
			return -1;
		if( null == self::$writeConn )
			return -1;
		return self::$writeConn->lastInsertId();
	}

	/**
     * get last update/delete affect row num
     * OK
     */
	public function getRowCount() {
		if(!isset($this->writeSTMT))
			return -1;
		if( null == $this->writeSTMT )
			return -1;
		return $this->writeSTMT->rowCount();
	}

	/**
     * log
     * OK
     */
	static private function log($info) {
		error_log('[db]'.$info);
	}
	
	
	/**
     * destruct
     * OK
     */
	function __destruct(){
		$this->readSTMT_close();
		$this->writeSTMT_close();
		$this->read_close();
		//$this->write_close();
	}
	
	
	/**
     * begin transaction
     * OK
     */
	public static  function begintrans() {
		//数据rollback 支持
		if(self::$transTimes == 0) {
			self::$transTimes = 1;
		}
		return true;
		
	}

/**
     * commit
     * OK
     */
	public static function commit(){
		if (self::$transTimes > 0 && !is_null(self::$writeConn)) {
			$result = self::$writeConn->commit();
			self::$transTimes = 0;
			if(!$result){
				//throw_exception(self::$error());
				return false;
			}
		}
		self::$writeConn = null;
		self::$readConn = null;
		self::$transTimes = 0;
		return true;
		
	}

	/**
     * rollback
     * OK
     */
	public static function rollback(){
		if (self::$transTimes > 0 && !is_null(self::$writeConn)) {
			$result = self::$writeConn->rollback();
			self::$transTimes = 0;
			if(!$result){
				//throw_exception(self::$error());
				return false;
			}
		}
		self::$writeConn = null;
		self::$readConn = null;
		self::$transTimes = 0;
		return true;
	}
	
	
	
	
}
?>

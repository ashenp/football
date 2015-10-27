<?php 
class CoreApi_User_Introduction extends CoreApi{
	protected static $instance__;
	protected $_tableName = 'user_introduction';
	protected $_primaryKey = 'uid';

	public static function instance() {
		if(!isset(self::$instance__)) {
			$className = __CLASS__;
			self::$instance__ = new $className();
		}
		return self::$instance__;
	}

}







 ?>
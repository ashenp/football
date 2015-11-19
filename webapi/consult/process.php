<?php
/**
 * 咨询投诉信息
 *@author mengxs
 */
class WebApi_Consult_Process extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}

	/**
	 * 添加投诉咨询信息
	 * @param  [array] $params
	 * @author mengxs
	 */
	public function add($params) {
		if(!is_array($params) || empty($params)) {
			return false;
		}
		return CoreApi_Consult_Process::instance()->insert($params);
	}

	/**
	 * 查询所有数据
	 * @author mengxs
	 */
	public function listConsult() {
		return CoreApi_Consult_Process::instance()->listConsult();
	}
}
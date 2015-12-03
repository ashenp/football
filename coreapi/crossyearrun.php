<?php 

class CoreApi_Crossyearrun extends CoreApi {
    protected $_tableName = 'crossyearrun';
    protected $_primaryKey = 'apply_id';
    protected $_fields = array(
        'apply_id' => 'int',
        'uid' => 'int',
        'timezone' => 'int',
        'if_file' => 'int',
        'file' => 'string',
        'time' => 'int'
    );
    
    static public $instance__;
    
    static public function &instance (){
        if (!isset(self::$instance__) || empty(self::$instance__)) {
            $class = __CLASS__;
            self::$instance__ = new $class;
        }
        return self::$instance__;
    }


    public function getAppliers($params = array()) {
        $sql = 'select * from '.$this->_tableName.' where 1';
        $binds = array();
        foreach ($params as $key => $value) {
            $sql .= ' and '.$key.'=:'.$key;
            $binds[':'.$key] = $value;
        }
        return $this->db->select($sql, $binds);
    }
}
















 ?>
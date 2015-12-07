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


    //添加一条报名记录
    public function applyCrossYearRun($params = array()) {
        if(isset($params['uid']) && isset($params['timezone'])) {
            $sql = 'insert into '.$this->_tableName.' (uid, timezone, if_file, file, time)';
            
            if(isset($params['if_file']) && $params['if_file'] && $params['file'] != '') {
                $sql .= " values(".$params['uid'].",".$params['timezone'].","."1".",".$params['file'].",".time().")";
            }else {
                $sql .= " values(".$params['uid'].",".$params['timezone'].","."0". ","."''".",".time().")";
            }
            return $this->db->insert($sql);
        }

        return false;
    }

    public function getApplyInfo() {
        $sql = 'select crossyearrun.uid,crossyearrun.timezone,user.username from '.$this->_tableName.' ,user'.' where 1 and user.uid=crossyearrun.uid';
         // $sql = 'select message.message_id,message.content,message.date,message.uid,user.username from '.$this->_tableName.' ,user '.' where 1 ';
        return $this->db->select($sql, array());
    }
}
















 ?>
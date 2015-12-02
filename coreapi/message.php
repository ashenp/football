<?php
/**
 * @Author: anchen
 * @Date:   2015-12-01 17:18:34
 * @Last Modified by:   anchen
 * @Last Modified time: 2015-12-02 16:25:44
 */
class CoreApi_Message extends CoreApi {
    protected $_tableName = 'message';
    protected $_primaryKey = 'message_id';
    protected $_fields = array(
        'message_id' => 'int',
        'content' => 'string',
        'date' => 'string',
        'uid' => 'int'
    );
    
    static public $instance__;
    
    static public function &instance (){
        if (!isset(self::$instance__) || empty(self::$instance__)) {
            $class = __CLASS__;
            self::$instance__ = new $class;
        }
        return self::$instance__;
    }

    public function pageMessage($params = array(), $page = 1, $pagesize = 20) {
        $sql = 'select message.message_id,message.content,message.date,message.uid,user.username from '.$this->_tableName.' ,user '.' where 1 ';
        $binds = array();
        foreach ($params as $key => $value) {
            $sql .= ' and '.$key.'=:'.$key;
            $binds[':'.$key] = $value;
        }
        $sql .= ' and user.uid = message.uid ';
        $sql .= ' order by message_id desc';
        $result = $this->db->page($sql, $binds, $page, $pagesize);
        return $result;
    }

    public function countMessage($params = array()) {
        $sql = 'select counr(*) as count from '.$this->_tableName.' where 1';
        $binds = array();
        foreach ($params as $key => $value) {
            $sql .= ' and '.$key.'=:'.$key;
            $binds[':'.$key] = $value;
        }
        $result = $this->db->select_one($sql, $binds);
    }

    public function insertMessage($content, $uid) {
        $sql = 'insert into '. $this->_tableName . '(content, date, uid)';
        $sql .= ' values (';
        $sql .= "'".$content."',";
        $sql .= "'".date('Y-m-d')."',";
        $sql .= $uid.")";

        $result = $this->db->insert($sql);
        return $result;
    }

    public function selectMessage($params = array()) {
        $sql = 'select message.message_id,message.content,message.date,message.uid,user.username from '.$this->_tableName.' ,user '.' where 1 ';
        $binds = array();
        foreach ($params as $key => $value) {
            $sql .= ' and '.$key.'=:'.$key;
            $binds[':'.$key] = $value;
        }
        $sql .= ' and user.uid = message.uid ';
        $sql .= ' order by message_id desc';
        $result = $this->db->select($sql, $binds);
        return $result;
    }
}
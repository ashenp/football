<?php
class RedisQueue{
    protected static $host;
    protected static $port;
    protected static $db;
    protected static $password;
    public function __construct($config) {
        self::$host = $config['host'];
        self::$port = $config['port'];
        self::$db = $config['db'];
        self::$password = $config['password'];
    }
    //连接redis
    public static function connect() {
        if(!isset(self::$host) || !isset(self::$port) || !isset(self::$password)) {
            die('redis配置参数缺失');
        }    
        $server = new Redis();
        $bool = $server->connect(self::$host, self::$port);
        if($bool) {
            $result = $server->auth(self::$password);
            if($result == 'OK') {
                return $server;
            }
            die('授权密码错误');
        }
        die('连接失败');
    }
    
    /**
     * 存储到redis
     * @param array $params 请求参数
     * @return bool
     */
    public static function set($params) {
        if(!isset($params['key']) || empty($params['key']) || !isset($params['value'])) {
            return false;
        }
        $redis = self::connect();
        if($redis === false) {
            return false;
        }
        return $redis->set($params['key'], json_encode(array($params['value'])));
    }
    
    /**
     * 存储到redis如果已存在则覆盖
     * @param array $params 请求参数
     * @return bool
     */
    public static function mset($params) {
        if(!isset($params['key']) || empty($params['key']) || !isset($params['value'])) {
            return false;
        }
        $redis = self::connect();
        if($redis === false) {
            return false;
        }
        return $redis->mset($params['key'], json_encode(array($params['value'])));
    }
    
    /**
     * 获取redis中的一个键的数据
     * @param string $key 请求参数
     * @return string
     */
    public static function get($key) {
        if($key == '') {
            return false;
        }
        $redis = self::connect();
        if($redis === false) {
            return false;
        }
        $result = $redis->get($key);
        if($result == '') {
            return '';
        }
        $result = json_decode($result, true);
        return is_array($result) ? current($result) : array();
    }
    
    /**
     * 删除一个键值
     * @param string $key
     * @return boolean
     */
    public static function delete($key) {
        $redis = self::connect();
        if($redis === false) {
            return false;
        }
        return $redis->del($key);
    }
    
    
    /**
     * 判断一个键值是否存在
     * @param string $key
     * @return boolean
     */
    public static function exist($key) {
        $redis = self::connect();
        if($redis === false) {
            return false;
        }
        return $redis->exists($key);
    }
    
    //查找所有符合给定模式 pattern 的 key
    public static function keys($key) {
        $redis = self::connect();
        if($redis === false) {
            return false;
        }
        return $redis->keys($key);
    }
    
    /**
     * 入指定的队列操作
     * @param array $params 请求参数
     * 参数示例$params=Array
            (
                [pushName] => Queue:GLOBLE_SMS_QUEUE
                [value] => Array
                    (
                        [mobile] => ''
                        [mark] => ''
                        [mark_param] => Array()
            
                    )
            )
     * @return bool
     */
    public function push($params) {
        if(!isset($params['pushName']) || empty($params['pushName']) || !is_string($params['pushName'])) {
            return false;
        }
        if(!isset($params['value']) || !is_array($params['value'])) {
            return false;
        }

        $redis = self::connect();
        if($redis === false) {
            return false;
        }
        $data = json_encode($params['value']);
        return $redis->rPush($params['pushName'], $data);
    }
    
    /**
     * @note 获取hash数据
     * @params string $queue
     * @param string $key
     */
    public function hGet($queue, $key) {
        if($queue == '' || $key == '') {
            return array();
        }
        $redis = self::connect();
        $data = $redis->hGet($queue, $key);
        $data = json_decode($data, true);
        return $data;
    }
    
    /**
     * @note 设置hash数据
     * @params string $queue
     * @param string $key
     * @param string $value
     */
    public function hSet($queue, $key, $value) {
        if($queue == '' || $key == '' || $value == '') {
            return false;
        }
        $redis = self::connect();
        return $redis->hSet($queue, $key, json_encode($value));
    }
}
?>
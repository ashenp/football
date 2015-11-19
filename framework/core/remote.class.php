<?php 
/**
 * 通信类
 * @author wqy
 *
 */
class Remote {
    //http请求超时时间
    const TIME_OUT = 30;
    //请求方式是来还是去
    public static $service_type = '';
    //请求服务servic_id
    public static $service_id = '';
    //请求服务地址
    public static $service_url = '';
    //请求服务加密key
    public static $service_key = '';
    //各服务之间的关系
    public static $service_keys = array();
    //各服务的信息
    public static $service_infos = array();
    //本服务控制层
    public static $service_controller = '';
    //本服务serviceId
    public static $local_service_id = '';
    //本服务版本
    public static $local_service_version = '';
    //本服务服务类型
    public static $local_service_type = '';
    //本服务keys缓存的键名
    public static $local_redis_key = '';
    //本服务infos缓存的键名
    public static $local_redis_info = '';
    //本服务与基础配置服务通信key
    public static $base_service_key = '';
    //日志目录
    public static $log_dir = '/logs/remote/';
     
    public function __construct($serviceId, $type = 'goal') {
        if(empty($serviceId)) {
            die('serviceId不能为空！');
        }
        $adapterRequest = config("domainArray", $_SERVER['HTTP_HOST']);
        $controller = strtoupper($adapterRequest['controller']);
        if(!defined($controller.'_LOCAL_SERVICE_ID')) {
            die('本服务serviceId未定义');
        }
        if(!defined($controller.'_LOCAL_SERVICE_VERSION')) {
            die('本服务serviceVersion未定义');
        }
        if(!defined($controller.'_LOCAL_SERVICE_TYPE')) {
            die('本服务serviceType未定义');
        }
        if(!defined($controller.'_SERVICE_KEY_CACHE_KEY')){
            die('未定义redis存储key的键名');
        }
        if(!defined($controller.'_BASIC_SERVICE_KEY')) {
            die('与基础服务通信key未定义');
        }
        if(!defined($controller.'_SERVICE_INFO_CACHE_KEY')){
            die('未定义redis存储info的键名');
        }
        self::$service_controller = $controller;
        self::$local_service_id = constant($controller.'_LOCAL_SERVICE_ID');
        self::$local_service_version = constant($controller.'_LOCAL_SERVICE_VERSION');
        self::$local_service_type = constant($controller.'_LOCAL_SERVICE_TYPE');
        self::$local_redis_key = constant($controller.'_SERVICE_KEY_CACHE_KEY');
        self::$local_redis_info = constant($controller.'_SERVICE_INFO_CACHE_KEY');
        self::$base_service_key = constant($controller.'_BASIC_SERVICE_KEY');
        self::$service_type = $type;
        self::$service_id = $serviceId;
        $this->getServiceKey();
    }

    /**
     * POST方式调用
     *
     * @param string $uri
     * @param array $arguments
     * @return array
     */
    public function post($uri, $arguments = array(), $anthor = array()) {
        $this->getServiceInfo();
        $keys = self::$service_keys;
        if(!empty($keys)) {
            foreach ($keys as $value) {
                if(isset($value['goalServiceId']) && $value['goalServiceId'] == self::$service_id) {
                    self::$service_key = $value['sercertKey'];
                    break;
                }
            }
        }
        $infos = self::$service_infos;
        if(!empty($infos)) {
            foreach ($infos as $value) {
                if(isset($value['serviceId']) && $value['serviceId'] == self::$service_id ) {
                    //0java 1php
                    self::$service_url = isset($value['lang']) && $value['lang'] == '1' ? ADAPTER_SERVICE_URL.'/api/'.$value['serviceName'].'/'.$value['serviceVersion'].'/' : trim($value['serviceUrl'], '/').'/';
                    break;
                }
            }
        }
        if(self::$service_key == '') {
            return Response::output('', 1053, '本服务'.self::$local_service_id.'与服务'.self::$service_id.'通信key为空，请去基础配置服务配置');
        }
        if(self::$service_url == '') {
            return Response::output('', 1053, '服务'.self::$service_id.'的地址为空，请去基础配置服务配置');
        }
        return $this->sendCurlRequest($uri, $arguments, $anthor);
    }
    
    /**
     * 获取请求来源服务器的key
     */
    public function getFromKey() {
        $keys = self::$service_keys;
        if(!empty($keys)) {
            foreach ($keys as $value) {
                if(isset($value['fromServiceId']) && $value['fromServiceId'] == self::$service_id) {
                    self::$service_key = $value['sercertKey'];
                    self::$service_url = trim($value['goalServiceUrl'], '/').'/';
                    break;
                }
            }
        }
        if(self::$service_key == '') {
            return Response::output('', 1053, '本服务'.self::$local_service_id.'与服务'.self::$service_id.'通信key为空，请去基础配置服务配置');
        }
        if(self::$service_url == '') {
            return Response::output('', 1053, '服务'.self::$service_id.'的地址为空，请去基础配置服务配置');
        }
        
        return self::$service_key;
    }
    
    /**
     * 获取请求来源服务器的key
     */
    public function getGoalKey() {
        $keys = self::$service_keys;
        if(!empty($keys)) {
            foreach ($keys as $value) {
                if(isset($value['goalServiceId']) && $value['goalServiceId'] == self::$service_id) {
                    self::$service_key = $value['sercertKey'];
                    self::$service_url = trim($value['goalServiceUrl'], '/').'/';
                    break;
                }
            }
        }
        if(self::$service_key == '') {
            return Response::output('', 1053, '本服务'.self::$local_service_id.'与服务'.self::$service_id.'通信key为空，请去基础配置服务配置');
        }
        if(self::$service_url == '') {
            return Response::output('', 1053, '服务'.self::$service_id.'的地址为空，请去基础配置服务配置');
        }
    
        return array('key' => self::$service_key, 'service_url' => self::$service_url);
    }
    
    /**
     * 获取被请求服务器的域名
     */
    public function getGoalServiceDomain() {
        $keys = self::$service_keys;
        if(!empty($keys)) {
            foreach ($keys as $value) {
                if(isset($value['goalServiceId']) && $value['goalServiceId'] == self::$service_id) {
                    self::$service_url = $value['goalServiceUrl'];
                    break;
                }
            }
        }
        if(self::$service_url == '') {
            die('本服务'.self::$local_service_id.'与服务ID'.self::$service_id.'不存在关系，请去基础服务配置');
        }
        return self::$service_url;
    }
    /**
     * 获取通信密钥
     */
    final function getServiceKey() {
        global $redisConfig;
        $redis = new Cache($redisConfig);
        $keys = $redis->get(self::$local_redis_key);
        $isExist = false;
        if(!empty($keys)) {
            foreach ($keys as $value) {
                if((self::$service_type == 'goal' && isset($value['goalServiceId']) && $value['goalServiceId'] == self::$service_id ) || (self::$service_type == 'from'  && isset($value['fromServiceId']) && $value['fromServiceId'] == self::$service_id )) {
                    $isExist = true;
                    break;
                }
            }
        }
        //缓存中不存在配置,去配置服务器请求
        if(!$isExist) {
            self::$service_key = self::$base_service_key;
            self::$service_url = BASIC_SERVICE_URL;
            //内网IP （必填）
            $arguments['internalIp'] = INTERNAL_IP;
            //内网端口（必填）
            $arguments['internalPort'] = INTERNAL_PORT;
            //外方访问IP或者域名（必填）
            $arguments['externalIp'] = EXTERNAL_IP;
            //外网访问端口（必填）
            $arguments['externalPort'] = EXTERNAL_PORT;
            //服务节点的出口ip
            $arguments['accessIp'] = '';
            $serviceConfig = $this->sendCurlRequest(BASIC_SERVICE_KEY_FUNC, $arguments, '');
            if($serviceConfig['code'] != 200) {
                //@todo 日志、报错
                return Response::output(array(), 400, '基础配置服务返回信息：'.$serviceConfig['msg']);
            }
            if(empty($serviceConfig['data'])) {
                return Response::output(array(), 400, '本服务未在基础服务注册');
            }
            //存入cache
            $keys = isset($serviceConfig['data']['list']) ? $serviceConfig['data']['list'] : array();
            
            $redis->set(self::$local_redis_key, $keys);
        }
        self::$service_keys = $keys;
        self::$service_key = '';
        self::$service_url = '';
    }
    
    /**
     * 获取服务信息
     */
    final function getServiceInfo() {
        global $redisConfig;
        $redis = new Cache($redisConfig);
        $infos = $redis->get(self::$local_redis_info);
        $isExist = false;
        //判断缓存内是否存在
        if(!empty($infos)) {
            foreach ($infos as $value) {
                if(isset($value['serviceId']) && $value['serviceId'] == self::$service_id ) {
                    $isExist = true;
                    break;
                }
            }
        }
        //缓存中不存在配置,去配置服务器请求
        if(!$isExist) {
            $arguments['goalServiceIds'] = '';
            if(!empty(self::$service_keys)) {
                foreach(self::$service_keys as $value) {
                    if(isset($value['goalServiceId']) && !empty($value['goalServiceId'])) {
                        $arguments['goalServiceIds'] .= $value['goalServiceId'].',';
                    }
                }
            }
            if(!empty($arguments['goalServiceIds'])) {
        
                self::$service_key = self::$base_service_key;
                self::$service_url = BASIC_SERVICE_URL;
        
                $serviceConfig = $this->sendCurlRequest(BASIC_SERVICE_INFO_FUNC, $arguments, '');
                if($serviceConfig['code'] != 200) {
                    //@todo 日志、报错
                    return Response::output(array(), 400, '基础配置服务返回信息：'.$serviceConfig['msg']);
                }
                if(empty($serviceConfig['data'])) {
                    return Response::output(array(), 400, '本服务未在基础服务注册');
                }
                //存入cache
                $infos = isset($serviceConfig['data']['list']) ? $serviceConfig['data']['list'] : array();
                $redis->set(self::$local_redis_info, $infos);
            }
        }
        self::$service_infos = $infos;
        self::$service_key = '';
        self::$service_url = '';
    }
    /**
     * 获取服务返回地址
     */
    final function getServiceBackUrl() {
        $this->getServiceInfo();
        $serviceNotifyUrl = '';
        $infos = self::$service_infos;
        if(!empty($infos)) {
            foreach ($infos as $value) {
                if(isset($value['serviceId']) && $value['serviceId'] == self::$service_id && isset($value['notifyUrl'])) {
                    $serviceNotifyUrl = $value['notifyUrl'];
                    break;
                }
            }
        }        
        
        return $serviceNotifyUrl;
    }
    
    
    /**
     * 通过CURL访问的处理请求
     * @param $uri api方法
     * @param $arguments 业务请求参数
     * @param $anthor 其他参数
     */
    public function sendCurlRequest($uri, $arguments, $anthor = array()) {
        //请求地址
        $url = self::$service_url.$uri.'?';
        $serviceId = self::$local_service_id;
        $serviceVersion = self::$local_service_version;
        $serviceType = self::$local_service_type;
        //业务线ID 来源基础服务 必须
        $params['serviceId'] = $serviceId;
        //业务线版本 统一版本管理 必须
        $params['serviceVersion'] = $serviceVersion;
        //业务线类型 0 Web端,1 移动端， 2 Wap端 必须
        $params['serviceType'] = $serviceType;
        //回溯信息
        $params['state'] = isset($anthor['state']) ? $anthor['state'] : '';
        //默认当前版本号（对方服务版本）
        $params['version'] = isset($anthor['version']) ? $anthor['version'] : '';
        //
        $params['proxy'] = isset($anthor['proxy']) ? $anthor['proxy'] : '';
        //设备信息
        $params['device'] = isset($anthor['device']) ? $anthor['device'] : '';
        //业务数据 3des加密        
        $encrypt = new Encrypt(self::$service_key, ENCRYPT_IV);
        $params['data'] = $encrypt->encrypt($arguments);
        $start = microtime(true);
        $result = self::curl($url, $params);
        $time = microtime(true) - $start;
        Logs::api('服务id'.$serviceId.'请求地址'.$url.'请求参数：', $arguments);
        Logs::api('服务id'.$serviceId.'请求地址'.$url.'请求结果'.$result);
        Logs::perf('请求地址'.$url.'，耗时'.$time);
        if(is_array($result)) {
            return $result;
        }
        return JsonProtocol::decode($result);
    }
    //curl通信
    public static function curl($url, $post) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded; charest=UTF-8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::TIME_OUT);
        $strReturn = curl_exec($ch);
        if(curl_errno($ch)) {
            $msg = '服务id'.$post['serviceId'].'  CURL请求'.$url.'超时,错误信息：'.curl_error($ch);
            Logs::api($msg);
            curl_close($ch);
            return Response::output(array(), 10010, $msg);
        }
        curl_close($ch);
        return trim($strReturn, "\xEF\xBB\xBF");
    }
}
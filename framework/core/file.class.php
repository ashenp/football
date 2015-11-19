<?php
class File {
    //http请求超时时间
    const TIME_OUT = 10;
    //允许上传文件扩展名
    private static $allow_type = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png', 'image/bmp', 'image/x-icon', 'text/plain', 'application/vnd.ms-excel', 'application/msword');
    //水印切图允许的图片类型
    private static $image_allow_type = array('image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png', 'image/bmp');
    //允许上传文件大小单位M
    private static $allow_size = 3;
    //一次上传大小单位M
    private static $file_once_size = 3;
    //上传地址
    private static $file_host = '';
    //上传接口方法
    private static $file_func = '';
    //文件临时地址
    private static $file_tmp_dir = '/tmp_upload/';
    //文件名
    private static $file_name = '';
    //本地临时文件绝对路径
    private static $file_tmp_address = '';
    //通信参数
    private static $params = '';
    //文件关联编号
    private static $relation_id = '';
    //是否打水印
    private static $is_watermark = 0;
    //文件分类
    private static $tag = '';
    
    private static $instance__;
    static public function &instance(){
        if(!isset(self::$instance__)) {
            $class = __CLASS__;
            self::$instance__ = new $class;
        }
        return self::$instance__;
    }
    /**
     * 接收文件并检查
     * @param string $relationId 关联编号 场馆图片就是stadiumId场地图片就是venueId等等没有用时间戳代替也可
     * @param string $tag 文件分类
     * @param string $fileAdress 文件地址
     * @param bool $isWaterMark
     */
    public function upload($tag = 'album', $isWaterMark = 0, $relationId = '', $another = array()) {
        if(!isset($_FILES['file']) || empty($_FILES['file'])) {
            die('调用错误');
        }
        if($_FILES["file"]["error"] > 0) {
            $msg = '';
            switch ($_FILES["file"]["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                    $msg = '上传的文件大小超过了服务器限制';
                break;
                case UPLOAD_ERR_FORM_SIZE:
                    $msg = '上传文件大小超过了表单限制';
                break;
                case UPLOAD_ERR_PARTIAL:
                    $msg = '文件只有部分被上传请重试';
                break;
                case UPLOAD_ERR_NO_FILE:
                    $msg = '没有文件被上传';
                break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $msg = '找不到临时文件夹';
                break;
                case UPLOAD_ERR_CANT_WRITE:
                    $msg = '文件写入失败';
                break;
            }
            return array('code' => '400', 'msg' => $msg);
        }
        if(!in_array($_FILES["file"]['type'], self::$allow_type)) {
            return array('code' => '400', 'msg' => '文件格式不允许上传');
        }
        $filesize =  $_FILES["file"]["size"] / (1024 * 1024);
        if($filesize > self::$allow_size) {
            return array('code' => '400', 'msg' => '文件过大不允许上传');
        }
        
        self::$file_name = $_FILES["file"]["name"];
        self::$relation_id = empty($relationId) ? time() : $relationId;
        self::$is_watermark = intval($isWaterMark);
        self::$tag = $tag;
        $result = $this->tmpSave();
        if(is_array($result)) {
            return array('code' => '400', 'msg' =>  $result['msg']);
        }
        //@todo
        $data['tag'] = self::$tag;
        $data['suffix'] = pathinfo(self::$file_tmp_address, PATHINFO_EXTENSION);
        $data['watermark'] = self::$is_watermark;
        $data['fileName'] = pathinfo(self::$file_name, PATHINFO_FILENAME);
        $data['relationId'] = self::$relation_id;
        
        if(in_array($_FILES["file"]['type'], self::$image_allow_type)) {
            self::$file_func = FILE_SERVICE_UPLOAD_PHOTO_FUNC;
        } else {
            self::$file_func = FILE_SERVICE_UPLOAD_FUNC;
        }
        //组装通信参数
        $this->assemblyParams($data, $another);
        //判断断点上传还是一次上传
        if($filesize > self::$file_once_size) {
            return $this->breakpoint();
        }
        $fileData = file_get_contents(self::$file_tmp_address);
        $result = $this->send($fileData);
        $result = JsonProtocol::decode($result);
        //删除临时文件
        $this->deleteTmp();
        return $result ;
    }
    
    /**
     * 断点拆分上传
     */
    final function breakpoint() {
        
    }
    
    /**
     * 上传至服务器
     */
    final function send($fileData) {
        //文件服务器接口地址
        $url  = trim(self::$file_host,'/').'/'.self::$file_func;
        $headerArr['UPLOAD-JSON'] = self::$params;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER , array('content-type: application/x-www-form-urlencoded; charset=utf-8', 'UPLOAD-JSON:'.self::$params));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fileData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::TIME_OUT);
        curl_exec($ch);
        $strReturn = curl_exec($ch);
        if(curl_errno($ch)) {
            $msg = '  CURL请求'.$url.'超时,错误信息：'.curl_error($ch);
            curl_close($ch);
            return Response::output(array(), 10010, $msg);
        }
        curl_close($ch);
        return trim($strReturn, "\xEF\xBB\xBF");
    }
    
    /**
     * 组装参数
     * @param array $another 预留参数
     */
    final function assemblyParams($data, $another) {
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
        $remote = new Remote(FILE_SERVICE_ID);
        $service = $remote->getGoalKey();
        self::$file_host = $service['service_url'];
        //业务线ID 来源基础服务 必须
        $params['serviceId'] = constant($controller.'_LOCAL_SERVICE_ID');
        //业务线版本 统一版本管理 必须
        $params['serviceVersion'] = constant($controller.'_LOCAL_SERVICE_VERSION');
        //业务线类型 0 Web端,1 移动端， 2 Wap端 必须
        $params['serviceType'] = constant($controller.'_LOCAL_SERVICE_TYPE');
        //回溯信息
        $params['state'] = isset($another['state']) ? $another['state'] : '';
        //默认当前版本号（对方服务版本）
        $params['version'] = isset($another['version']) ? $another['version'] : '';
        //
        $params['proxy'] = isset($another['proxy']) ? $another['proxy'] : '';
        //设备信息
        $params['device'] = isset($another['device']) ? $another['device'] : '';
        
        //业务数据 3des加密
        $encrypt = new Encrypt($service['key'], ENCRYPT_IV);
        $params['data'] = $encrypt->encrypt($data);
        self::$params = json_encode($params);
    }
    
    /**
     * 临时保存本地服务器
     */
    final function tmpSave() {
        if(!is_dir(WWW_ROOT.self::$file_tmp_dir)) {
            mkdir(WWW_ROOT.self::$file_tmp_dir);
        }
        $file = explode('.', self::$file_name);
        $newFileName = time().'.'.end($file);
        if(file_exists(WWW_ROOT.self::$file_tmp_dir.$newFileName)) {
            return array('code' => 400, 'msg' => '文件已存在');
        }  
        $result = move_uploaded_file($_FILES["file"]["tmp_name"], WWW_ROOT.self::$file_tmp_dir.$newFileName);
        if(!$result) {
            return array('code' => 400, 'msg' => '文件临时保存失败');
        } 
        self::$file_tmp_address = WWW_ROOT.self::$file_tmp_dir.$newFileName;
        return true;
    }
    
    /**
     * 删除临时文件
     */
    final function deleteTmp() {
        @unlink(self::$file_tmp_address);
        self::$file_tmp_address = '';
    }
}

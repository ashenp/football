<?php
/**
 * 本文件存放线上与线下配置一样，上线时不需修改的配置
 */
/********************常量start****************************/
//URL分割符
define('URL_SEPARATOR', '/');
//参数分割符
define('PARAMS_SEPARATOR', '?');
//smarty缓存文件夹
define('TPLCACHE_PATH', WWW_ROOT.'/tmp_file/');
//网站操作错误日志输出目录
define('ERROR_LOG_ADDR', WWW_ROOT.'/logs/');
//静态文件目录
define('STATIC_URL', FW_PATH.'/static');
//controller前缀
define('CONTROLLER', 'Controller_');
//controller中方法访问方式(框架目前只支持添加action前缀)
define('PREFIX_ACTION', 'action');
//用户默认登录时间COOKIE时间
define('DEFAULT_USER_LOGIN_TIME', 1*24*3600);
//调试开关
define('DEBUG', true);
//编码
define('CHARSET', 'utf-8');

//日志目录
/********************常量end****************************/

/********************变量start*************************/
//系统配置数组加载
$defaultConfigMapping = array(
    'dbs' => 'dbServerArray',
    'errorCodes' => 'errorCodes',
    'domainArray' => 'domainArray',
    'apps' => 'webAppsModules',
    'searchIndex' => 'searchIndex'
);
//错误编码
$errorCodes = array(
    1000 => '用户尚未登录,不允许此操作',
    1001 => '用户权限不足,不允许此操作',
    1025 => '不存在所访问资源',
    1026 => '未找到执行方法,请检查URL',
    1027 => '系统不允许接入该域名',
    1028 => '加载类错误',
    1029 => '没有找到模板',
    10001 => '系统错误',
    10002 => '服务暂停',
    10003 => '远程服务错误',
    10004 => 'IP限制不能请求该资源',
    10005 => '该资源需要appkey拥有授权',
    10006 => '缺少source (appkey) 参数',
    10007 => '不支持的MediaType',
    10008 => '参数错误，请参考API文档',
    10009 => '任务过多，系统繁忙',
    10010 => '任务超时',
    10011 => 'RPC错误',
    10012 => '非法请求',
    10013 => '不合法的用户',
    10014 => '应用的接口访问权限受限',
    10015 => '未配置该资源',
    10016 => '缺失必选参数，请参考API文档',
    10017 => '参数值非法，请参考API文档',
    10018 => '请求长度超过限制',
    10019 => '接口不完整',
    10020 => '接口不存在',
    10021 => '请求的HTTP方法不支持',
    10022 => 'IP请求频次超过上限',
    10023 => '用户请求频次超过上限',
    10024 => '用户请求特殊接口频次超过上限',
    30000 => '系统不能使用该域名',
);
/********************变量end*************************/
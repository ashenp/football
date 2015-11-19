<?php
header('Content-type:text/html;charset=utf-8');
header("Content-type:text/html;charset=utf-8"); 
error_reporting(E_ALL);
//时区设置
date_default_timezone_set('Asia/Shanghai');
define('WWW_ROOT', dirname(__FILE__));
//框架文件目录 
define('FW_PATH', WWW_ROOT.'/framework');
//模板目录
define('TEMPLATE_DIR', WWW_ROOT.'/views/');
//配置文件地址
define('CONFIG_ROOT', FW_PATH.'/conf');

//文件地址
define('FILE_ROOT', WWW_ROOT.'/files');
//入口文件
require(FW_PATH.'/common.inc.php');

//记录全局开始时间
global $_start; 
$_start = microtime(true);
//开始执行
Request::factory()->execute();
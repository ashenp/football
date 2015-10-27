<?php
header("Content-type:text/html;charset=utf-8"); 
header("Cache-Control: no-cache");
ini_set('display_errors',1);
error_reporting(E_ALL);
function loadCore($className) {
	$corePath = CORE_DIR.'/'.strtolower($className).'.class.php';
	if(file_exists($corePath)) {
		require_once $corePath;
	}else {
		$apiPath = SITE_ROOT;
		$pathArray = explode('_', strtolower($className));
		foreach ($pathArray as $value) {
			$apiPath .= '/'.$value;
		}
		$apiPath .= '.php';
		if(file_exists($apiPath)) {
			require_once $apiPath;
		}
	}
}
spl_autoload_register('loadCore');
//site url
define('SITE_URL','http://www.ashenp.com');
//site root
define('SITE_ROOT', dirname(__file__));//Users/pianweiwan/Desktop/mysite
//frame rootdir
define('FW_DIR', SITE_ROOT.'/framework');
define('CONF_DIR', FW_DIR.'/conf');
define('CORE_DIR', FW_DIR.'/core');
define('PLUGIN_DIR', FW_DIR.'/plugin');

//require config.php in the framework forder
require_once CONF_DIR.'/config.php';
require_once CONF_DIR.'/db.conf.php';

//get the request url
$request = $_SERVER["REQUEST_URI"];
$requestArray = explode('?', ltrim($request, '/'));

// figure the class name and the method by url
$url = explode('/',$requestArray[0]);

$path = CONTROLLER_DIR;
$className = 'Controller';
for ($i=0; $i < (count($url)-1); $i++) { 
	$path .= '/'.strtolower($url[$i]);
	$className .= '_'.ucwords(strtolower($url[$i]));
}
if(count($url) == 1) {
	$path .= '/user.php';
	$method = 'index';
	$className .= '_'.'User';
}else {
	$path .= '.php';
	$method = strtolower($url[count($url)-1]);
}
if(file_exists($path)) {
	require_once $path;
	if(!method_exists($className, $method)) {
		if(!method_exists($className, 'action'.ucfirst($method))) {
			echo '你好像来到了没有知识的荒原。。。';exit;
		}else {
			Action::check();
			eval('$obj = new '.$className.'();'.'$obj->'.'action'.ucfirst($method).'();');
		}
	}else {
		if(substr($method,0,6) == 'action') {
			Action::check();
		}
		eval('$obj = new '.$className.'();'.'$obj->'.$method.'();');
	}	
}else {
	echo '你好像来到了没有知识的荒原。。。';
}

?>
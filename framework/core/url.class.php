<?php
/**
 * @package     Framework
 * @copyright   bestdo.com
 * @author      liu
 * @version    	2013-5-27
 */

/**
 * url Class
 *
 */
class url{
	
	static  function image($image) {
		return STATIC_URL.'images/'.$image;
	}
	
	static  function js($js) {
		return STATIC_URL.'js/'.$js;
	}
	
	static  function css($css) {
		return STATIC_URL.'css/'.$css;
	}
 
	/**
	 * 框架自动生成URL方法
	 * smarty 插件也会调用此方法
	 * @param string $entity 模块名
	 * @param array $params 业务参数数据
	 * @param string $serviceId 请求服务id
	 * @param string $redirectUri 返回地址
	 * @param string $anthor 其他请求参数
	 */
	public static function make($entity, $params = array(), $serviceId = '', $redirectUri = '', $anthor = array()) {
	    $adapterRequest = config("domainArray", $_SERVER['HTTP_HOST']);
	    $controller = strtoupper($adapterRequest['controller']);
	    $url = '';
		if($serviceId == '' || $serviceId == constant($controller.'_LOCAL_SERVICE_ID')) {
			$url = '/'.$entity;
		} else {
			$arguments['serviceId'] = constant($controller.'_LOCAL_SERVICE_ID');
    		$arguments['serviceVersion'] = constant($controller.'_LOCAL_SERVICE_VERSION');
    		$arguments['serviceType'] = constant($controller.'_LOCAL_SERVICE_TYPE');
    		$arguments['version'] = isset($anthor['version']) ? $anthor['version'] : '';
    		$arguments['state'] = isset($anthor['state']) ? $anthor['state'] : '';
    		$arguments['redirectUri'] = $redirectUri;
    		$remote = new Remote($serviceId);
    		if($arguments['redirectUri'] == '') {
        		$arguments['redirectUri'] = $remote->getServiceBackUrl();
    		}
    		$arguments['data'] = $params;
    		$params = $arguments;
    		$domain= $remote->getGoalServiceDomain();
    		$url .= trim($domain, '/').'/'.$entity;
		}
		if(!empty($params)) {
            $url .= PARAMS_SEPARATOR.http_build_query($params);
		}
		return $url;
	}
	
	/**
	 * 框架后台统一URL生成路径
	 *
	 * @param string $entity 模块
	 * @param array $params 参数
	 * @return string url
	 */
	public static function makemgr($entity, $params = array()) {
		return self::make($entity, $params);
	}
}
?>
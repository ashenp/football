<?php
/**
 * smarty插件自动生成URL
 * 使用方法{url action="docs/list" params=$array  prefix="www" domain="baidu.com"}
 * 生成的格式如:http://www.phpff.com/docs/list?uid=2&type=category
 *
 */
function smarty_function_url($params){
	$domain = isset($params['domain']) ? $params['domain'] : '';
	$prefix = isset($params['prefix']) ? $params['prefix'] : '';
	$data = isset($params['params']) ? $params['params'] : array();
	$action = isset($params['action']) ? $params['action'] : '';
	$url = url::make($action, $data, $prefix, $domain);
	return $url;
}

?>
<?php
/**
 * smarty插件自动生成后台URL
 * 使用方法{mgrurl action="docs/list" params=$array}
 * 生成的格式如: http://mgr.phpff.com/docs/list?uid=2&type=category
 *
 */
function smarty_function_mgrurl($params){
	$data = isset($params['params']) ? $params['params'] : array();
	$action = isset($params['action']) ? $params['action'] : '';
	$url = url::make($action, $data);
	return $url;
}

?>
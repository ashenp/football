<?php
/**
 * 
 * {url url='docs/text'}
 *
 */
function smarty_function_staticurl($params){
	$url = "/static/";
	$type = isset($params['type']) ? $params['type'] : '';
	$action = isset($params['action']) ? $params['action'] : '';
	if($action == '') {
		return $url;
	}
	if($type == '') {
		$tmp = explode('.', $action);
		$type = end($tmp);
	}
	
	if($type == 'js' || $type == 'script') {
		$url .= 'js';
	} elseif ($type == 'css') {
		$url .= 'css';
	} elseif ($type == 'image' || $type == 'img') {
		$url .= 'images';
	}else {
		$url .= 'images';
	}
	$url .= '/'.$action;
	return $url;
}

?>
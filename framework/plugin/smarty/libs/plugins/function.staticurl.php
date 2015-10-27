<?php 
function smarty_function_staticurl($params){
	$path = '/static';
	$path .= isset($params['path']) ? $params['path'] : '';
	return $path;
}
?>
<?php
/**
 * 网站资源API
 *
 */
class WebApi_Resource extends WebApi{
	
	static private $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}
	/**
	 * 添加网站资源
	 *
	 * @param array $resource 资源数组
	 * @return integer 资源ID
	 */
	public function add($resource) {
		if(is_array($resource) && !empty($resource)) {
			return CoreApi_Resource::instance()->insert($resource);
		}
		return false;
	}
	
	/**
	 * 修改网站资源
	 *
	 * @param array $resource 被修改的资源属性数组
	 * @param integer $resourceId 资源ID
	 * @return integer 影响行数
	 */
	public function edit($resource, $resourceId) {
		if(is_array($resource) && !empty($resource) && $resourceId) {
			return CoreApi_Resource::instance()->update($resource, $resourceId);
		}
		return false;
	}
	
	/**
	 * 删除资源, 删除之前请执行isExistSonResource操作
	 *
	 * @param integer $resourceId 资源ID
	 * @return integer 影响行数
	 */
	public function remove($resourceId) {
		if(!$resourceId) {
			return false;
		}
		return CoreApi_Resource::instance()->delete($resourceId);
	}
	
	
	
	/**
	 * 获取一条资源信息
	 *
	 * @param integer $resourceId
	 * @return array 资源数组
	 */
	public function getResourceById($resourceId) {
		if($resourceId) {
			return CoreApi_Resource::instance()->row('*', $resourceId);
		}
		return array();
	}
	
	/**
	 * 获取多条资源信息
	 *
	 * @param array $resourceIds 资源ID数组
	 * @return array 返回一组资源
	 */
	public function getResourcesByIds($resourceIds) {
		if(!is_array($resourceIds) || empty($resourceIds)) {
			return array();
		}
		return CoreApi_Resource::instance()->rows('*', $resourceIds);
	}
	
	/**
	 * 返回所有资源信息
	 * @return array 所有资源
	 */
	public function getAllResources(){
		$resources = CoreApi_Resource::instance()->getResources();
		$result = array();

		if(is_array($resources) && !empty($resources)) {
			$result = $this->rebuildResources($resources);
		}
		return $result;
	}
	
	
	/**
	 * 资源递归排序,效率过低
	 * @return array
	 */
	private function recursiveResource($resourceId = 0, $resources = array()) {
		static $needle = null;
		static $return = array();
		if($needle === null) {
			$needle = $resources;
		}
		if(!$needle) {
			return array();
		}
		foreach($needle as $item) {
			$keyId = $item['resource_id'];
			$parentId = $item['parent'];
			if($parentId == $resourceId) {
				$return[$keyId] = $item;
				$return[$keyId]['path'] = isset($return[$parentId]) ? $return[$parentId]['path'] .','. $keyId : '0,'. $keyId;
				$return[$keyId]['depth'] = substr_count($return[$keyId]['path'], ',') - 1;
				$this->recursiveResource($keyId);
			}
		}
		return $return;
	}
	
	/**
	 * 重新排序分类
	 *
	 * @param array $resources 资源
	 * @return array 资源
	 */
	private function rebuildResources($resources = array()) {
		if(!is_array($resources) || empty($resources)) {
			return array();
		}
		
		$tmp = array();
		foreach ($resources as $resource) {
			$tmp[$resource['resource_id']] = $resource;
		}

		$resources = array();
		foreach ($tmp as $k=>$resource) {
			$tmp[$k]['path'] = array();
			$tmp[$k]['depth'] = 0;
			$parent = $resource['parent'];

			$i = 0;
			$tmp[$k]['path'][$i] = $resource['resource_id'];
			$tmp[$k]['depth'] = 0;
			while ($parent != 0) {
				$i++;
				$parentResource = $tmp[$parent];
				$tmp[$k]['path'][$i] = $parentResource['resource_id'];
				$tmp[$k]['depth'] += 1;
				$parent = $parentResource['parent'];
			}
			//krsort($tmp[$k]['path']);
		}
		
		return $tmp;
	}
	
	
	/**
	 * 得到顶部资源,类似一级分类
	 * 
	 */
	public function getTopResources() {
		
	}
	
	/**
	 * 检查资源名称是否重复
	 * @param string $resourceName 资源名称
	 * @return true/false
	 */
	public function checkResourceNameExist($resourceName = '') {
		if($resourceName == '') {
			return false;
		}
		return CoreApi_Resource::instance()->checkResourceNameExist($resourceName);
	}
	
	/**
	 * 检查资源别名是否重复
	 * @param string $alias 资源别名
	 * @return true/false
	 */
	public function checkResourceAliasExist($alias = '') {
		if($alias == '') {
			return false;
		}
		return CoreApi_Resource::instance()->checkResourceAliasExist($alias);
	}
	
	/**
	 * 检查URI是否重复
	 *
	 * @param string $uri URI
	 * @return true/false
	 */
	public function checkResourceUriExist($uri = '') {
		if($uri == '') {
			return false;
		}
		return CoreApi_Resource::instance()->checkResourceUriExist($uri);
	}
	
	/**
	 * 判断是否存在子资源
	 *
	 * @param integer $parent 资源ID
	 * @return integer 影响行数
	 */
	public function checkResourceSonExist($resourceId) {
		return CoreApi_Resource::instance()->checkResourceSonExist($resourceId);
	}
	
}
	
?>
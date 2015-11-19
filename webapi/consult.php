<?php
/**
 * 咨询信息
 *@author mengxs
 */
class WebApi_Consult extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}

	/**
	 * 添加投诉咨询信息
	 * @param  [array] $params
	 * @author mengxs
	 */
	public function add($params) {
		if(!is_array($params) || empty($params)) {
			return false;
		}
		return CoreApi_Consult::instance()->insert($params);
	}

	/**
	 * 获取信息列表数据
	 * @author mengxs
	 */
	public function getDataByParams($params, $page, $pageSize) {
		if(!is_array($params) || !$page || !$pageSize) {
			return false;
		}
		return CoreApi_Consult::instance()->search('*', $params, $page, $pageSize, 'consult_id', 'DESC');
	}

	/**
	 * 获取咨询信息数据
	 * @param  [type] $params	 [数据]
	 * @param  [type] $page	   [页数]
	 * @param  [type] $pagesize   [每个页面显示数量]
	 * @param  [type] $returnType [返回类型]
	 * @param  string $order	  [查询KEY]
	 * @param  string $desc	   [排序规则]
	 * @author mengxs
	 */
	public function getConsultsByParams($params, $page, $pagesize, $returnType, $order="consult_id", $desc="desc") {
		if(!is_array($params) || !$page || !$pagesize || !$returnType) {
			return false;
		}
		return CoreApi_Consult::instance()->getConsultsByParams($params, $page, $pagesize, $returnType, $order="consult_id", $desc="desc");
	}

	/**
	 * 查询用户信息数据总数
	 */
	public function count($data = array()) {
		if (!is_array($data) || empty($data)) {
			return false;
		}
		return CoreApi_Consult::instance()->count(array());
	}

	/**
	 * 获取分页数据总数
	 */
	public function getConsultCountByParams($params) {
		if (!is_array($params)) {
			return false;
		}
		return CoreApi_Consult::instance()->getConsultCountByParams($params);
	}

	/**
	 * 获取数据带分页
	 */
	public function editComplainData($consultId, $type) {
		if (!$consultId || !$type) {
			return false;
		}
		return CoreApi_Consult::instance()->editComplainData($consultId, $type);
	}

	/**
	 * 数据导出
	 */
	public function putCsv($head, $headerArr, $fileName = '') {
		if(!is_array($head) || !is_array($headerArr)) {
			return FALSE;
		}

		ini_set('output_buffering','On');
		ini_set('set_time_limit', 0);
		//如果没有传入文件名，自动生产
		if(empty($fileName)) {
			$fileName   = time();
		} else {
			$name  = mb_detect_encoding($fileName,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
			if($name != 'GBK') {
				$names = mb_convert_encoding($fileName,'GBK',$name);
			}else {
				$names = $fileName;
			}
			$fileName = $names;
		}

		//输出heaher头
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$fileName.'.csv"');
		header('Cache-Control: max-age=0');
		//文件句柄
		//直接输出文件流，生成数据发送给浏览器
		//不在服务器中生产文件
		
		ob_clean();//清楚缓存区
		
		$fp = fopen('php://output', 'a');
		
		if(!empty($head)) {
			//内容头，例如select中的字段名一样
			foreach ($head as $i => $v) {
				//必须转成gbk，否则乱码
				$code = mb_detect_encoding($v,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
				$head[$i] = $v;
				if($code != 'GBK') {
					$head[$i] = mb_convert_encoding($v,'GBK',$code);
				}
			}
		}
		
		//先将内容头输出

		fputcsv($fp, $head);

		if(!empty($headerArr)) {
			//防止数据过多出现错误，每$limit行刷新一下
			foreach ($headerArr as $keys => $values) {
				if (isset($values) && is_array($values)) {
					foreach ($values as $key => $value) {
						if (isset($value['consult_id'])) {
							$csvData = array($value['consult_id'],$value['info_type'],$value['consult_project'],$value['consult_sport_type'],$value['consult_question_type'],$value['complain_type'],$value['complain_kind'],$value['realName'],$value['telephone'],$value['content'],$value['select_type'],$value['staff_id'],$value['create_time']);
							$info = array();
							foreach ($csvData as $i => $v) {
								//必须转成gbk，否则乱码
								$code = mb_detect_encoding($v,array('UTF-8','ASCII','GB2312','GBK','BIG5'));
								$info[$i] = $v;
								if($code != 'GBK') {
									$info[$i] = mb_convert_encoding($v,'GBK',$code);
								}
							}
							fputcsv($fp, $info);
						}
					}
				}
			}
		}
		return TRUE;
	}
}
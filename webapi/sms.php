<?php
/**
 * 短信
 * @author mengxs
 */
class WebApi_Sms extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}

	/**
	 * 短信导出
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

		if (!empty($headerArr)) {
			foreach ($headerArr as $keys => $values) {
				if (isset($values)) {
					$csvData = array($values['id'],$values['mobile'],$values['content'],$values['create_time']);
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
		return TRUE;
	}
}
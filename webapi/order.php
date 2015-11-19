<?php
/**
 * 短信
 * @author mengxs
 */
class WebApi_Order extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}

	/**
	 * 短信导出--无用
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
					$csvData = array($values['oid'],$values['username'],$values['content'],$values['project'],$values['start_time'],$values['book_day'],$values['order_money'],$values['phone'],$values['order_state'],$values['process_state'],$values['certificate_status'],$values['create_info']);
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
	
	/**
	 * @note 订单列表导出excel
	 * @param array $orders 订单信息
	 * @return File
	 * @author fangcz
	 */
	public function export($orders) {
		$header = array('订单ID', '用户名', '订单内容', '所属项目', '开始时间', '预订时间', '实付金额', '预订电话', '订单状态', '处理状态', '凭证状态', '创建信息');
		if(empty($orders)) {
			return WebApi_Csv::instance()->putCsv($header, array());
		}
		
		//订单状态
		$remote = new Remote(ORDER_SERVICE_ID);
		$getOrderState = $remote->post('order/getOrderStatusArray');
		if($getOrderState['code'] != 200) {
			return $this->error('获取订单状态失败');
		}

		//订单流程状态
		$getOrderProcessState = $remote->post('order/getOrderProcessStatusArray');
		if($getOrderProcessState['code'] != 200) {
			return $this->error('获取订单流程状态失败');
		}
		//订单凭证状态
		$getCertificateStatus = $remote->post('order/getCertificateStatus');
		if($getCertificateStatus['code'] != 200) {
			return $this->error('获取订单凭证状态失败');
		}
		//运动类型
		$remote = new Remote(API_COMMON_SERVICE_ID);
		$sportType = $remote->post('sportcategory/api/getSportCategories');
		if ($sportType['code'] != 200) {
			return $this->error('获取运动类型失败');
		}
		//项目名称
		$projectIds = array();
		foreach ($orders as $order) {
			$projectIds[] = $order['project_id'];
		}
		$remote = new Remote(RC_SERVICE_ID);
		$getProject = $remote->post('project/getProjectByProjectIds', array('project_ids' => implode(',', $projectIds)));
		if ($getProject['code'] != 200) {
			return $this->error('获取项目信息失败');
		}
		
		$headerArr = array();
		foreach($orders as $order) {
            //订单到款状态
            $moneyStatus = $order['money_status'] == 1 ? '已到款' : '未到款';
			$tempOrder = array();
			$tempOrder[] = $order['oid'];
			$tempOrder[] = $order['username'];
			$tempOrder[] = $order['stadium_name']."\r\n".$order['mer_item_name']."\r\n".$order['book_day']."\r\n";
			$tempOrder[] = $getProject['data'][$order['project_id']]['name'];
			$playTime = '';
			$startHour = '';
			foreach ($order['items'] as $item) {
				//开始时间计算
				$playTime .= $item['play_time']."\r\n";
				//预定时间计算
				$startHour .= $item['start_hour'].':00—'.$item['end_hour'].':00'."\r\n";
			}
			$tempOrder[] = $playTime;
			$tempOrder[] = $startHour;
			$tempOrder[] = ($order['pay_money']/100).'元';
			$tempOrder[] = $order['book_phone'];
			$tempOrder[] = $getOrderState['data'][$order['status']]."\r\n".'('.$moneyStatus.')';
			$tempOrder[] = $getOrderProcessState['data'][$order['process_status']];
			$tempOrder[] = $getCertificateStatus['data'][$order['certificate_status']];
			$tempOrder[] = date('Y-m-d', $order['create_time']);
			$headerArr[] = $tempOrder;
		}
		
		return WebApi_Csv::instance()->putCsv($header, $headerArr);
	}
}
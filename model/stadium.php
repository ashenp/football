<?php
/**
 * @note 场馆model
 * @author huwl
 *
 */
class Model_Stadium extends Model {
	//场馆来源
	public static $stadiumSourceArray = array(
		'1' => '自建',
		'2' => '爬虫',
		'3' => '第三方'
	);
	
	//场馆等级
	public static $stadiumLevelArray = array(
		'1' => '1级', 
		'2' => '2级', 
		'3' => '3级', 
		'4' => '4级', 
		'5' => '5级',
	);
	
	//场馆状态
	public static $statusArray = array(
		'1' => '已审核',
		'0' => '未审核',
		'-1' => '禁用',
		'-2' => '删除',
	);
	
	//场馆审核状态
	public static $_STADIUM_STATUS_APPROVE = 1;//审核通过
	public static $_STADIUM_STATUS_NOT_APPROVE = 0;//未审核
	public static $_STADIUM_STATUS_FORBIDDEN = -1;//禁用
	public static $_STADIUM_STATUS_DELETE = -2;//删除

	/**
	 * 获取场馆来源名称
	 * @return string
	 * @author zy 
	 */
	public function getStadiumSourceName() {
		if(isset(self::$stadiumSourceArray[$this->stadium_source])) {
			return self::$stadiumSourceArray[$this->stadium_source];
		}
		
		return '';
	}
		 
	/**
	 * @note 场馆状态
	 *
	 * @return string
	 */
	public function getStatus() {
		if (isset(self::$statusArray[$this->status])) {
		   return self::$statusArray[$this->status];
		} else {
			return '';
		}
	}
	
	/**
	 * 获取场馆等级名称
	 * @return string
	 * @author huwl
	 */
	public function getStadiumLevelName() {
		if(isset(self::$stadiumLevelArray[$this->level])) {
			return self::$stadiumLevelArray[$this->level];
		}
		
		return '';
	}
	
	/**
	 * 生成01、02、03、04数字
	 * 
	 * @param int $num
	 * @return array
	 * @author huwl
	 */
	public function getNumber($num) {
		$data = array();
		for($i = 0; $i <= $num; $i++) {
			$data[] = $i < 10 ? '0'.$i : $i;
		}
		
		return $data;
	}
	
	/**
	 * @note 转换营业时间的格式
	 *
	 * @param int $onlineTime
	 * @return array
	 * 
	 * @author huwl
	 */
	public function stadiumOnlineTime($onlineTime) {
		if($onlineTime == '') {
			return array();
		}
		
        $onlineTimeData['weekday_start_h'] = isset($onlineTime['weekday']) ? substr($onlineTime['weekday'], 0, 2) : '00';
        $onlineTimeData['weekday_start_m'] = isset($onlineTime['weekday']) ? substr($onlineTime['weekday'], 3, 2) : '00';
        $onlineTimeData['weekday_end_h'] = isset($onlineTime['weekday']) ? substr($onlineTime['weekday'], 6, 2) : '00';
        $onlineTimeData['weekday_end_m'] = isset($onlineTime['weekday']) ? substr($onlineTime['weekday'], 9) : '00';
        
        
        $onlineTimeData['holiday_start_h'] = isset($onlineTime['holiday']) ? substr($onlineTime['holiday'], 0, 2) : '00';
        $onlineTimeData['holiday_start_m'] = isset($onlineTime['holiday']) ? substr($onlineTime['holiday'], 3, 2) : '00';
        $onlineTimeData['holiday_end_h'] = isset($onlineTime['holiday']) ? substr($onlineTime['holiday'], 6, 2) : '00';
        $onlineTimeData['holiday_end_m'] = isset($onlineTime['holiday']) ? substr($onlineTime['holiday'], 9) : '00';
        return $onlineTimeData;
	}
}
?>
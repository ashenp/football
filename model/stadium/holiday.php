<?php
/**
 * @note 场馆节假日model
 * @author huwl
 *
 */
class Model_Stadium_Holiday extends Model {
	
	//类型
	public static $typeArray = array(
								'1' => '平日',
								'2' => '假日',
								'3' => '节日',
							);
	//节日
	public static $festivalArray = array(
								'2015-01-01' => '3',
								'2015-01-02' => '3',
								'2015-01-03' => '3',
								'2015-02-18' => '3',
								'2015-02-19' => '3',
								'2015-02-20' => '3',
								'2015-02-21' => '3',
								'2015-02-22' => '3',
								'2015-02-23' => '3',
								'2015-02-24' => '3',
								'2015-04-04' => '3',
								'2015-04-05' => '3',
								'2015-04-06' => '3',
								'2015-05-01' => '3',
								'2015-05-02' => '3',
								'2015-05-03' => '3',
								'2015-06-20' => '3',
								'2015-06-21' => '3',
								'2015-06-22' => '3',
								'2015-09-26' => '3',
								'2015-09-27' => '3',
								'2015-10-01' => '3',
								'2015-10-02' => '3',
								'2015-10-03' => '3',
								'2015-10-04' => '3',
								'2015-10-05' => '3',
								'2015-10-06' => '3',
								'2015-10-07' => '3',
							);
	//平日
	public static $weekdayArray = array(
								'2015-01-04' => '1',
								'2015-02-15' => '1',
								'2015-02-28' => '1',
								'2015-10-10' => '1',
						);
	//假日
	public static $holidayArray = array(
             
                        );
						
	//生成01、02、03、04数字
	public function getNumber($num) {
		$data = array();
		for($i = 1; $i <= $num; $i++) {
			$data[] = $i < 10 ? '0'.$i : $i;
		}
		
		return $data;
	}
	
	/**
	 * @note 检测平假日
	 *
	 * @param int $stadiumId
	 * @param array $day
	 * 
	 * @return int
	 * @author huwl
	 */
	public function getStadiumHolidaiesByStadiumIdAndDay($stadiumId, $daies) {
		if(!is_numeric($stadiumId) || $stadiumId <= 0 || !is_array($daies) || empty($daies)) {
			return array();
		}
		
		$stadiumHoliday = WebApi_Stadium_Holiday::instance()->getStadiumHolidaiesByStadiumId($stadiumId);
		$stadiumHolidayData = array();
		foreach ($stadiumHoliday as $value) {
			$stadiumHolidayData[$value['day']] = $value['type'];
		}
		
		$festivals = self::$festivalArray;
		$weekdaies = self::$weekdayArray;
		
		$result = array();
		foreach ($daies as $day) {
   			if(isset($stadiumHolidayData[$day])) {
   				$result[$day] = intval($stadiumHolidayData[$day]);
   			} elseif (array_key_exists($day, $festivals)) {
   				$result[$day] = 3;
   			} elseif (array_key_exists($day, $weekdaies)) {
   				$result[$day] = 1;
   			} elseif (date('w', strtotime($day)) == 6 || date('w', strtotime($day)) == 0) {
   				$result[$day] = 2;
   			} else {
   				$result[$day] = 1;
   			}
   		}
   		
   		return $result;
	}
}
?>
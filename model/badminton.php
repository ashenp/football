<?php
class Model_Badminton extends Model {
	public static $status = array(
        '-2' => '删除',
        '-1' => '禁用',
        '0' => '未审核',
        '1' => '已审核'
        );
	public static $positionArr = array(1=>'室内', 2=>'室外');

	//是否自营
	public static $isBuyout = array('否', '是');

	//是否人工处理
	public static $processType = array('否', '是');

	//是否有场地管理系统
	public static $clientStatus = array('否', '是');

	//初始化库存状态
	public static $inventoryInitStatus = array('否', '是');

	//预定状态
	public static $bookStatus = array('不可预订', '可预订');

	//场地材质
	public static $venueMaterial = array('1'=>'普通地板', '2'=>'木质地板', '3'=>'塑胶地板', '4'=>'专业地板');

	//场地类型
	public static $venueType = array('1'=>'普通', '2'=>'品牌', '3'=>'高校');

	//灯光效果
	public static $light = array('1'=>'顶灯','2'=>'侧灯');

	//是否允许退订
	public static $isAllowedRefund = array('否', '是');

	//场地审核状态
	public static $_VENUE_STATUS_APPROVE = 1;//审核通过
	public static $_VENUE_STATUS_NOT_APPROVE = 0;//未审核
	public static $_VENUE_STATUS_FORBIDDEN = -1;//禁用
	public static $_VENUE_STATUS_DELETE = -2;//删除

	public static $refund_rule = array(
		'time' => '',	//12 or 24 or 48 or 72
		'type' => '',	// unit: 1 元，2 百分比
		'price' => '', //定额or定比的内容，￥10定额 or 10%定比
		);

	public static $refundRuleTime = array(12, 24, 48, 72);

	public static $refundRuleType = array(1=>'定额', 2=>'定比');

	public function getCreateStaff() {
		return '';
	}

	public function getBookStatus() {
		return isset(self::$bookStatus[$this->book_status]) ? self::$bookStatus[$this->book_status] : '未知';
	}
	
	/**
	 * 创建日期
	 */
	public function getCreateTime() {
	    return $this->create_time > 0 ? date('Y-m-d', $this->create_time) : '';
	}

	/**
	 * 室内室外
	 */
	public function getPosition() {
		return isset(self::$positionArr[$this->position]) ? self::$positionArr[$this->position] :'未知位置';
	}

	/**
	 * @note 是否自营
	 * @author xuef
	 */
	public function getIsBuyout() {
		if($this->is_buyout == 1) {
			return '是 自营起止时间: '.$this->buyout_start_date.' - '. $this->buyout_end_date;
		}
		return self::$isBuyout[$this->is_buyout];
	}

	/**
	 * @note 是否人工管理
	 * @author xuef
	 */
	public function getProcessType() {
		return self::$processType[$this->process_type];
	}

	/**
	 * @note 是否有场馆管理系统
	 * @author xuef
	 */
	public function getClientStatus() {
		return self::$clientStatus[$this->client_status];
	}

	/**
	 * @note 初始化库存状态
	 * @author xuef
	 */
	public function getInventoryInitStatus() {
		return self::$inventoryInitStatus[$this->inventory_init_status];
	}
	
	
	/**
	 * @note 场地材质
	 * @author xuef
	 */
	public function getVenueMaterial() {
		return self::$venueMaterial[$this->venue_material];
	}

	/**
	 * @note 灯光效果
	 * @author xuef
	 */
	public function getLight() {
		return isset(self::$light[$this->light]) ? self::$light[$this->light] :'未知';
	}

	/**
	 * @note 是否允许退订效果
	 * @author xuef
	 */
	public function isAllowedRefund() {
		return isset(self::$isAllowedRefund[$this->is_allowed_refund]) ? self::$isAllowedRefund[$this->is_allowed_refund] :'未知';
	}

	/**
	 * @note 场地状态
	 * @author xuef
	 */
	public function getStatus() {
		return isset(self::$status[$this->status]) ? self::$status[$this->status] : '未知的状态';
	}

	/**
	 * @note 场地类型
	 * @author xuef
	 */
	public function getVenueType() {
		return isset(self::$venueType[$this->venue_type]) ? self::$venueType[$this->venue_type] : '未知的类型';
	}

	/**
	 * @note 库存类型
	 * @author xuef
	 */
	public function getInventoryType() {
		return '时段';
	}

	/**
     * @note 对场地的配置字段进行解释
     * @return array $newVenue
     * @author xuef
     */
    public function attrMapper() {

        $newVenue = $this->toArray();
        if(isset($this->light)) {
            $newVenue['light_name'] = $this->getLight();
        }
        if(isset($this->position)) {
            $newVenue['position_name'] = $this->getPosition();
        }
        if(isset($this->venue_material)) {
            $newVenue['venue_material_name'] = $this->getVenueMaterial();
        }
        if(isset($this->venue_type)) {
            $newVenue['venue_type_name'] = $this->getVenueType();
        }

        return $newVenue;
	} 
}

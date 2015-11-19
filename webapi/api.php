<?php
/**
 *接口处理
 */
class WebApi_Api extends WebApi{
	
	static public $instance__;
	
	static public function &instance (){
		if (!isset(self::$instance__)) {
			$class = __CLASS__;
			self::$instance__ = new $class;
		}
		return self::$instance__;
	}

	/**
	 * 获取订单列表 走预定中心
	 * @param  [array] $params [where]
	 * @return [array] [订单数据]
	 * @author mengxs
	 */
	public function getOrderListByParams($params) {
		if (!is_array($params)) {
			return false;
		}
//        var_dump($params);exit;
//        $remote = new Remote(ORDER_SERVICE_ID);
//        $result =  $remote->post('order/getOrdersList', $params);
//        echo '<pre>';
//        print_r($result);exit;
		$remote = new Remote(RC_SERVICE_ID);
		$returnData = $remote->post('order/wiring/lists', array('params' => $params));
//        echo '<pre>';
//        print_r($returnData);exit;
		if ($returnData['code'] != 200) {
			return false;
		}
		return $returnData;
	}

	/**
	 * 获取运动类型
	 * @return [array]         [运动类型]
	 * @author mengxs
	 */
	public function getSportTypeByParams() {
		$remote = new Remote(API_COMMON_SERVICE_ID);
		$returnData = $remote->post('sportcategory/api/getSportCategories');
		if ($returnData['code'] != 200) {
			return $this->error($returnData['msg']);
		}
		return $returnData;
	}

	/**
	 * 获取企业信息
	 * @param  [array] $params [where]
	 * @return [array]         [企业信息]
	 * @author mengxs
	 */
	public function getEnterpriseByParams($params) {
		if (!is_array($params)) {
			return false;
		}
		$remote = new Remote(COMPANY_SERVICE_ID);
		$returnData = $remote->post('company/lists',$params);
		if ($returnData['code'] != 200) {
			return $this->error($returnData['msg']);
		}
		return $returnData;
	}

	/**
	 * 获取项目信息
	 * @param  [array] $params [where]
	 * @return [array]         [项目信息]
	 * @author mengxs
	 */
	public function getProjectByParams($params) {
		if (!is_array($params)) {
			return false;
		}
		$remote = new Remote(COMPANY_SERVICE_ID);
		$returnData = $remote->post('project/getListByCompanyId',$params);
		if ($returnData['code'] != 200) {
			return false;
		}
		return $returnData;
	}

	/**
	 * 获取订单状态
	 * @param  [array] $params [where]
	 * @return [array] [订单状态]
	 * @author mengxs
	 */
	public function getOrderStateByParams($params) {
		if (!is_array($params)) {
			return array();
		}
        $remote = new Remote(RC_SERVICE_ID);
        $returnData = $remote->post('order/base/getStatus');
		if ($returnData['code'] != 200) {
			return array();
		}

		return $returnData;
	}

	/**
	 * 获取订单处理状态
	 * @param  [array] $params [where]
	 * @return [array]         [处理状态]
	 * @author mengxs
	 */
	public function getOrderProcessStateByParams($params) {
		if (!is_array($params)) {
			return array();
		}
		$remote = new Remote(RC_SERVICE_ID);
		$returnData = $remote->post('order/base/getProcessStatus');
		if ($returnData['code'] != 200) {
			return array();
		}

		return $returnData;
	}

	/**
	 * 获取用户信息
	 * @param  [array] $params [where]
	 * @return [array]         [用户信息]
	 */
	public function getUserInfoByParams($params) {
		if (!is_array($params)) {
			return false;
		}
		$remote = new Remote(USER_SERVICE_ID);
        $returnData = $remote->post('uccore/v1/api/account/findUserInfo',$params);
        if ($returnData['code'] != 200) {
        	return false;
        }
        return $returnData;
	}

	/**
	 * 获取用户卡种
	 * @param  [array] $params [where]
	 * @return [array]         [用户卡种]
	 */
	public function getUserCardByParams($params) {
		if (!is_array($params)) {
			return false;
		}
		$remote = new Remote(USER_SERVICE_ID);
		$returnData = $remote->post('uccore/v1/api/card/getCardList',$params);
		if ($returnData['code'] != 200) {
			return false;
		}
		return $returnData;
	}

	/**
	 * 获取凭证状态
	 * @param  [array] $params [where]
	 * @return [array]         [凭证状态]
	 */
	public function getCertificateStatusByParams($params) {
		if (!is_array($params)) {
			return false;
		}
		$remote = new Remote(ORDER_SERVICE_ID);
		$returnData = $remote->post('order/getCertificateStatus',$params);
		if ($returnData['code'] != 200) {
			return false;
		}
		return $returnData;
	}

	/**
	 * 获取订单详情
	 * @param  [array] $params [where]
	 * @return [array]         [订单详情]
	 */
	public function getOrderDetailByParams($params) {
		if (!is_array($params)) {
			return false;
		}
		$remote = new Remote(ORDER_SERVICE_ID);
		$returnData = $remote->post('order/getOrderDetail',$params);
		if ($returnData['code'] != 200) {
			return false;
		}
		return $returnData;
	}

	/**
	 * 获取卡种信息
	 * @param  [array] $params [where]
	 * @return [array]         [卡种信息]
	 */
	public function getInfoByIdsByParams($params) {
		if (!is_array($params)) {
			return false;
		}
		$remote = new Remote(COMPANY_SERVICE_ID);
		$returnData = $remote->post('cardtype/getInfoByIds',$params);
		if ($returnData['code'] != 200) {
			return false;
		}
		return $returnData;
	}
	
	/**
	 * 获取卡信息
	 * @param  [array] $cardId [array]
	 * @return [array]         [卡信息]
	 */
	public function getCardInfoByCardId($params) {
	    if (!is_array($params)) {
	        return false;
	    }
	    $remote = new Remote(USER_SERVICE_ID);
	    $returnData = $remote->post('uccore/v1/api/card/getCardInfo',$params);
	    if ($returnData['code'] != 200) {
	        return false;
	    }
	    return $returnData;
	}
}
<?php
class Model_Staff extends Model {
	
	public function getEmail() {
		return !empty($this->email) ? $this->email : '-';
	}
	
	public function getDepartmentName($departments) {
			foreach ($departments as $v) {
				if($v['department_id'] == $this->department_id) {
					return $v['name'];
				}
			}
			return '-';
	}
	
	
	public function getUsername() {
		return !empty($this->username) ? $this->username : '-';
	}
	
	public function isLeader() {
		return $this->is_leader? '是' : '-';
	}
	
	public function getCreateTime($format = 'Y-m-d H:i:s') {
		$a = $this->create_time? date($format, $this->create_time) : 'e';
		return $a;
	}
	
	public function getStaffName($staffs) {
		if (!is_array($staffs) || empty($staffs)) {
			return '';
		}
		return isset($staffs[$this->sid]) ? $staffs[$this->sid]['name'] : '';
	}
	
	public function getAmount($totleAmount, $amount) {
		if (!$totleAmount || !$amount) {
			return '';
		}
		$result = $totleAmount - $amount;
		return $result;
	}
	
	public function getUser($users) {
		if (!is_array($users) || empty($users)) {
			return '';
		}
		return isset($users[$this->uid]) ? $users[$this->uid]['name'] : '';
	}
	
	//获取信用消费的消费状态
	public function getRecharge($payid) {
		if (!$payid) {
			return '';
		}
		
		$pay = WebApi_Staff_Credit_Pay::instance()->getOne($payid);
		
		$params = array();
		$params['oid'] = $pay['oid'];
		$params['status'] = 1;
		$result = WebApi_Staff_Credit_Recharge::instance()->getRechargesByParams($params, 1, 1);
		
		$params['status'] = 3;
		$resultTem = WebApi_Staff_Credit_Recharge::instance()->getRechargesByParams($params, 1, 1);
		
		if (!empty($result)) {
			return '已返还(自动)';
		}
		
		if (!empty($resultTem)) {
			return '已返还(申请)';
		}
		
		return '已消费';
	}
	
	//获取信用消费的审核状态
	public function getConfirmStatus($payid) {
		if (!$payid) {
			return '';
		}
		
		$return = WebApi_Staff_Credit_Return::instance()->getReturnByPayId($payid);
		if (empty($return)) {
			return '';
		} else {
			if ($return['status'] == 0) {
				return '未审核';
			} elseif ($return['status'] == 1) {
				return '审核成功';
			} elseif ($return['status'] == -1) {
				return '审核失败';
			}
		}
		
	}
}
?>
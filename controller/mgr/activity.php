<?php
class Controller_Mgr_Activity extends Controller_Mgr_Base {
	
	public function activityDetailForUser() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['uid'])) {
			header('admin/login');
		}
		$activityId = isset($_REQUEST['activity_id']) ? $_REQUEST['activity_id'] : 0;
		if($activityId <= 0) {
			return $this->error('链接已失效');
		}
		$activity = CoreApi_Activity::instance()->row('*', $activityId);
		if(empty($activity)) {
			return $this->error('未找到该活动');
		}
		if($activity['status'] != 1) {
			return $this->error('活动已被删除');
		}

		$params = array();
		$params['activity'] = $activity;
		return $this->display('activity_detail',$params);
	}
	
	

 
}

?>
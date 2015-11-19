<?php
class Controller_Mgr_Manager extends Controller_Mgr_Base {
	
	public function index() {

		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['manager'])) {
			header('Location: /admin/index');
		}
		$activities = CoreApi_Activity::instance()->getActivities(array('status'=>1));
		$params['activities'] = $activities;
		return $this->display('index', $params);
	}
	public function logout() {
		if(!isset($_SESSION)) {
			session_start();
		}
		unset($_SESSION['manager']);
		header('Location: /admin/index');
	}

	public function ajaxDeleteActivity() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['manager'])) {
			return $this->ajaxError('您还未登录或登录已过期');
		}
		$activityId = isset($_REQUEST['activity_id']) ? $_REQUEST['activity_id'] : 0;
		if($activityId <= 0) {
			return $this->ajaxError('未找到该活动');
		}

		$deleteResult = CoreApi_Activity::instance()->deleteActivity($activityId);
		if($deleteResult === false || $deleteResult == 0) {
			return $this->ajaxError('删除失败');
		}
		return $this->ajaxSuccess('删除成功');
	}


	public function activityDetailForManager() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['manager'])) {
			header('Location: /admin/index');
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

		//查询当前活动报名列表
		$applies = CoreApi_Apply::instance()->findActivityApply($activityId);
		$uids = array();
		foreach ($applies as $key => $value) {
			$uids[] = $value['uid'];
		}
		$appliers = CoreApi_User::instance()->rows('*', $uids);
		$params = array();
		$params['activity'] = $activity;
		$params['appliers'] = $appliers;
		return $this->display('activity_detail',$params);
	}

	public function newActivity() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['manager'])) {
			return $this->error('请登录后操作');
		}
		return $this->display('new_activity');
	}

	public function ajaxAddActivity() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['manager'])) {
			return $this->ajaxError('请登录后发布');
		}
		$title = isset($_REQUEST['title']) ? $_REQUEST['title'] : '';
		$content = isset($_REQUEST['content']) ? $_REQUEST['content'] : '';
		if($title == '' || $content == '') {
			return $this->ajaxError('标题或者内容不能为空');
		}
		$addResult = CoreApi_Activity::instance()->addActivity($title, $content);
		if($addResult === false || $addResult == 0) {
			return $this->ajaxError('发布失败');
		}
		return $this->ajaxSuccess('发布成功');
	}
 
}

?>
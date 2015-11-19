	<?php
class Controller_Mgr_Admin extends Controller_Mgr_Base {
	
	public function index() {
		if(!isset($_SESSION)) {
			session_start();
		}
		$smartyParams = array();
		if(!isset($_SESSION['uid']) && !isset($_SESSION['manager'])) {
			$smartyParams['if_log'] = 0;
		}
		if(isset($_SESSION['uid'])) {
			$smartyParams['if_log'] = 1;
		}else if(isset($_SESSION['manager'])){
			$smartyParams['if_log'] = 2;
		}
		$page = 1;
		$pagesize = 12;
		$activities = CoreApi_Activity::instance()->pageActivities(array('status'=>1),$page,$pagesize);
		$smartyParams['activities'] = $activities;
		// var_dump($activities);exit;
		if($smartyParams['if_log'] == 0) {
			return $this->display('index',$smartyParams);
		}else if($smartyParams['if_log'] == 1) {
			$params = array();
			$params['uid'] = $_SESSION['uid'];
			$user = CoreApi_User::instance()->getUser($params);
			$smartyParams['user'] = $user;
			return $this->display('index',$smartyParams);
		}else if($smartyParams['if_log'] == 2) {
			header('Location: /manager/index');
		}
		
	}

	public function loginPage() {
		return $this->display('login');
		
	}

	public function ajaxCheckLogin() {
		$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
		$password = isset($_REQUEST['password']) ?  $_REQUEST['password'] :'';

		if($email == '' || $password == '') {
			return $this->ajaxError('邮箱和密码不能为空');
		}
		if($email == 'manager') {
			if(md5($password) == PASSWORD) {
				if(!isset($_SESSION)) {
					session_start();
				}
				$_SESSION['manager'] = 'manager';
				return $this->ajaxSuccess('管理员登录成功');
			}else {
				return $this->ajaxError('管理员密码错误');
			}
		}

		$params = array();
		$params['email'] = $email;
		$user = CoreApi_User::instance()->getUser($params);
		if(empty($user)) {
			return $this->ajaxError('登录邮箱不存在，请检查');
		}
		if(md5($password) != $user['password']) {
			return $this->ajaxError('密码错误');
		}
		if(!isset($_SESSION)) {
			session_start();
		}
		$_SESSION['uid'] = $user['uid'];
		return $this->ajaxSuccess('登录成功');
	}

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

	//注销登录
	public function logout() {
		if(!isset($_SESSION)) {
			session_start();
		}
		unset($_SESSION['uid']);
		header('Location: /admin/index');
	}
	//活动报名
	public function ajaxApply() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['uid'])) {
			return $this->ajaxError('请登录后操作');
		}
		$uid = $_SESSION['uid'];
		$activityId = isset($_REQUEST['activity_id']) ? $_REQUEST['activity_id'] : 0;
		if($activityId <= 0) {
			return $this->ajaxError('报名失败');
		}

		$activity = CoreApi_Activity::instance()->row('*', $activityId);
		if(empty($activity) ||$activity['status'] == 0) {
			return $this->ajaxError('该活动不存在');
		} 

		$findApply = CoreApi_Apply::instance()->findApply($uid, $activityId);
		if(!empty($findApply)) {
			return $this->ajaxError('您已报名过该活动');
		}
		$applyResult = CoreApi_Apply::instance()->addApply($uid, $activityId);
		if($applyResult === false || $applyResult == 0) {
			return $this->ajaxError('报名失败');
		}
		return $this->ajaxSuccess('报名成功');
	}

	public function ajaxDownload() {
		if(!isset($_SESSION)) {
			session_start();
		}
		$activityId = isset($_REQUEST['activity_id']) ? $_REQUEST['activity_id'] : 0;
		if($activityId <= 0) {
			return $this->ajaxError('未找到该活动');
		}
		if(!isset($_SESSION['uid'])) {
			return $this->ajaxError('请登录后下载');
		}
		$activity = CoreApi_Activity::instance()->row('*', $activityId);
		if(empty($activity) || $activity['status'] == 0) {
			return $this->ajaxError('该活动不存在');
		}
		$filePath = $activity['file'];
		return $this->ajaxSuccess($filePath);
	}

	public function download() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['uid'])) {
			echo '您未登录，请登录后操作';exit;
		}
		
		$file = isset($_REQUEST['file']) ? $_REQUEST['file'] : '';
		$file=iconv("utf-8","gb2312",$file);
		if($file == '') {
			echo '文件名错误';exit;
		}
		$tmp = explode('.', $file);
		$ext = array_pop($tmp);

		$filePath = FILE_ROOT.'/appendix/'.$file;
		echo $filePath;
		if(!file_exists($filePath)) {
			echo '文件不存在';exit;
		}
		header("Content-type: application/octet-stream");
		header("Accept-Ranges: bytes");
		header("Content-Disposition: attachment; filename=".$file);
		header("Accept-Length: ".filesize($filePath));
		ob_clean();
  		flush();
		readfile($filePath);
	}

	public function regPage() {
		return $this->display('reg');
	}

	public function addUser() {
		$email = $_POST['email'];
		$user = CoreApi_User::instance()->getUser(array('email'=>$email));
		if(!empty($user)) {
			return $this->error('该邮箱已经注册');
		}
		$params = array();
		$params['username'] = $_POST['username'];
		$params['password'] = md5($_POST['password']);
		$params['realname']	= $_POST['realname'];
		$params['sex'] = $_POST['sex'];
		$params['email'] = $_POST['email'];
		$params['mobile'] = $_POST['mobile'];
		$params['address'] = $_POST['address'];
		$params['question'] = $_POST['question'];
		$params['answer'] = $_POST['answer'];

		$addResult = CoreApi_User::instance()->addUser($params);
		if($addResult === false || $addResult <= 0) {
			return $this->error('注册失败');
		}
		return $this->success('注册成功');

	}
	
	

 
}

?>
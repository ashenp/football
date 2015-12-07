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
		return $this->success('注册成功',HOME_URL.'admin/index');
	}

	public function message() {
		$page = isset($_REQUEST['page']) ?  $_REQUEST['page'] : 1;
        $pagesize = isset($_REQUEST['pagesize']) ? $_REQUEST['pagesize'] : 20;
        $messages = CoreApi_Message::instance()->pageMessage(array(), $page, $pagesize);
        $count = CoreApi_Message::instance()->countMessage(array());
        // var_dump($messages);exit;
        $smartyParams = array();
        $smartyParams['page'] = $page;
        $smartyParams['pagesize'] = $pagesize;
        $smartyParams['count'] = $count;
        $smartyParams['messages'] = $messages;
        return $this->display('messages', $smartyParams);
	}


	public function ajaxLeaveMessage() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['uid'])) {
			return $this->ajaxError('您未登录，请登录后操作');
		}
		$uid = $_SESSION['uid'];
		$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';
		if($message == '') {
			return $this->ajaxError('留言不能为空');
		}
		if(strlen($message) > 255) {
			return $this->ajaxError('留言不能超过255个字符');
		}

		$result = CoreApi_Message::instance()->insertMessage($message, $uid);

		if($result === false || $result <= 0) {
			return $this->ajaxError('发布留言失败');
		}
		return $this->ajaxSuccess('发布留言成功');
	}

	public function crossYearRun() {
		$applyInfo = CoreApi_Crossyearrun::instance()->getApplyInfo();
		$count = array();
		foreach ($applyInfo as $key => $value) {
			isset($count[$value['timezone']]) ? $count[$value['timezone']] += 1 : $count[$value['timezone']] = 1;
		}
		// var_dump($count);exit;
		$applyInfoTemp = array();
		foreach ($applyInfo as $key => $value) {
			$applyInfoTemp[Model_Timezone::$timezoneArray[$value['timezone']]][]    = $value['username'];
		}

		foreach ($applyInfoTemp as $key => &$value) {
			$value = implode(',',$value);
		}

		// var_dump($applyInfoTemp);exit;
		$applyInfo = $applyInfoTemp;
		$smartyParams = array();
		$smartyParams['applyInfo'] = $applyInfo;
		$smartyParams['count'] = $count;
		return $this->display('crossyearrun', $smartyParams);
	}



	public function applyYearRun() {
		if(!isset($_SESSION)) {
			session_start();
		}

		if(!isset($_SESSION['uid'])) {
			return $this->error('您未登录，请登录后操作','/admin/index');
		}

		
		$params = array();
		$params['uid'] = $_SESSION['uid'];

		$apply = CoreApi_Crossyearrun::instance()->getAppliers($params);
		if(!empty($apply)) {
			return $this->error('您已报名过跨年跑,请勿重复报名');
		}


		if(!isset($_POST['timezone'])) {
			return $this->error('请选择时区再报名');
		}else {
			if($_POST['timezone'] == 'null') {
				return $this->error('请选择时区再报名');
			}
			$params['timezone'] = $_POST['timezone'];
		}
		if(empty($_FILES['file'])) {
			$addResult = CoreApi_Crossyearrun::instance()->applyCrossYearRun($params);
			if($addResult === false || $addResult <= 0) {
				return $this->error('报名失败');
			}else {
				return $this->success('报名成功',HOME_URL.'/admin/crossYearRun');
			}
		}else {
			if($_FILES['file']['name'] != '') {
				if ($_FILES["file"]["error"] > 0){
					return $this->error('文件上传失败'.$_FILES["file"]["error"]);
				}
				$fileUrl = FILE_ROOT.'/crossyearrun/'.mb_convert_encoding($_FILES['file']['name'], "gbk","utf-8");
				// echo $fileUrl;exit;
				if(file_exists($fileUrl)) {
					return $this->error('该文件名已存在，请修改文件名后重试');
				}
				if($_FILES["file"]["tmp_name"] == '') {
					return $this->error('上传失败');
				}
				$params['if_file'] = 1;
				$params['file'] = "'".$_FILES['file']['name']."'";
				db::begintrans();
				$addResult = CoreApi_Crossyearrun::instance()->applyCrossYearRun($params);
				if($addResult === false || $addResult <= 0) {
					return $this->error('报名失败');
					db::rollback();
				}else {
					if(move_uploaded_file($_FILES["file"]["tmp_name"], $fileUrl)) {
						db::commit();
						return $this->success('报名成功',HOME_URL.'/admin/crossYearRun');
					}else {
						db::rollback();
						return $this->error('文件上传失败，报名失败');
					}
			}
		}else {
			$addResult = CoreApi_Crossyearrun::instance()->applyCrossYearRun($params);
			if($addResult === false || $addResult <= 0) {
				return $this->error('报名失败');
			}
			return $this->success('报名成功');
			}
		}



		// var_dump($_POST);
		// var_dump($_FILES);exit;

	}
	
	

 
}

?>
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
		header('Location: /manager/index');
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

	public function messages() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['manager'])) {
			return $this->error('请登录后查看');
		}
		$messages = CoreApi_Message::instance()->selectMessage(array());
		$smartyParams = array();
		$smartyParams['messages'] = $messages;
		return $this->display('messages', $smartyParams);
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

	public function newActivitySubmit() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['manager'])) {
			return $this->error('请登录后操作');
		}
		isset($_POST['title']) && $title = $_POST['title'];
		isset($_POST['content']) && $content = $_POST['content'];
		if(!isset($title)) {
			return $this->error('活动标题不能为空');
		}
		if(!isset($content)) {
			return $this->error('活动内容不能为空');
		}
		if(empty($_FILES)) {
			$addResult = CoreApi_Activity::instance()->addActivityWithoutFile($title, $content);
			if($addResult === false || $addResult <= 0) {
				return $this->error('发布活动失败');
			}
		}else {
			if($_FILES['file']['name'] != '') {
				if ($_FILES["file"]["error"] > 0){
					return $this->error('文件上传失败'.$_FILES["file"]["error"]);
				}

				$fileUrl = FILE_ROOT.'/appendix/'.mb_convert_encoding($_FILES['file']['name'], "gbk","utf-8");
				if(file_exists($fileUrl)) {
					return $this->error('该文件名已存在，请修改文件名后重试');
				}
				if($_FILES["file"]["tmp_name"] == '') {
					return $this->error('上传失败');
				}
				db::begintrans();
				$addResult = CoreApi_Activity::instance()->addActivityWithFile($title, $content, $_FILES['file']['name']);
				if($addResult === false || $addResult <= 0) {
					return $this->error('发布活动失败');
					db::rollback();
				}else {
					if(move_uploaded_file($_FILES["file"]["tmp_name"], $fileUrl)) {
						db::commit();
						return $this->success('发布活动成功');
					}else {
						db::rollback();
					}
				}
			}else {
				$addResult = CoreApi_Activity::instance()->addActivityWithoutFile($title, $content);
				if($addResult === false || $addResult <= 0) {
					return $this->error('发布活动失败');
				}
				return $this->success('发布活动成功');
			}
		}
		
	}

	public function ajaxDeleteMessage() {
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['manager'])) {
			return $this->error('请登录后操作');
		}
		$messageId = isset($_REQUEST['message_id']) ? $_REQUEST['message_id'] : '';
		$message = CoreApi_Message::instance()->row('*',$messageId);
		// var_dump($message);exit;
		if(empty($message)) {
			return $this->ajaxError('未找到此活动，可能已被删除');
		}
		$result = CoreApi_Message::instance()->delete($messageId);
		if($result === false || $result == 0) {
			return $this->ajaxError('删除失败');
		}else {
			return $this->ajaxSuccess('删除成功');
		}
	}


	public function ajaxDownload() {
		if(!isset($_SESSION)) {
			session_start();
		}
		$activityId = isset($_REQUEST['activity_id']) ? $_REQUEST['activity_id'] : 0;
		if($activityId <= 0) {
			return $this->ajaxError('未找到该活动');
		}
		if(!isset($_SESSION['manager'])) {
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
		if(!isset($_SESSION['manager'])) {
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
 
}

?>
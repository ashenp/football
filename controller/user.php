<?php 
class Controller_User extends Controller {
	public function actionIndex() {
			$uid = Session::getSession('uid');
			$params = array();
			//get username
			$user = WebApi_User::instance()->getUserByUid($uid);
			if(!$user || empty($user)) {
				return $this->error('用户不存在');
			}
			$params['username'] = $user['username'];
			//get user homepage background

			//get user introduction
			$userIntroduction = WebApi_User_Introduction::instance()->getUserIntroductionByUid($uid);
			
			$params['introduction'] = array();
			if(empty($userIntroduction || !$userIntroduction)) {
				$params['introduction']['subject'] = '';
				$params['introduction']['content'] = '';
			}else {
				$params['introduction']['subject'] = $userIntroduction['subject'];
				$params['introduction']['content'] = $userIntroduction['content'];
			}
			return $this->display('index',$params);
	}

	public function actionSetting() {
		$uid = Session::getSession('uid');
		//获取基础信息
		$user = WebApi_User::instance()->getUserByUid($uid);
		if(!$user || empty($user)) {
			return $this->error('未找到用户信息');
		}


		$params = array();
		$params['basic'] = array();
		$params['basic']['username'] = $user['username'];
		$params['basic']['email'] = $user['email'];
		$params['basic']['mobile'] = $user['mobile'];
		$params['basic']['create_time'] = $user['create_time'];
		return $this->display('setting', $params);
	}

	
	public function mobileBinding(){

	}

	public function login() {
		$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '/user/index';
		$params = array();
		$params['redirect'] = $redirect;
		return $this->display('login',$params);
	}

	public function logout() {
		Session::unsetSession('uid');
		header('Location: '.SITE_URL);
		exit;
	}

	public function ajaxCheckLogin() {
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		// return $this->ajaxError($username);
		if($username == '') {
			return $this->ajaxError('用户名不能为空');
		}
		if($password == '') {
			return $this->ajaxError('密码不能为空');
		}
		$result = WebApi_User::instance()->getUserByEmail($username);
		if(empty($result)){
			return $this->ajaxError('未找到此用户');
		} 
		if(md5($password) != $result['password']) {
			return $this->ajaxError('密码错误');
		}

		//get uid
		$uid = $result['uid'];
		Session::setSession('uid',$uid);
		return $this->ajaxSuccess();
	}


	public function register() {
		return $this->display('register');
	}

	public function ajaxCheckRegister() {
		$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
		$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
		$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';

		if($email == '') {
			return $this->ajaxError('邮箱不能为空');
		}
		if($password == ''){
			return $this->ajaxError('密码不能为空');
		}
		if($username == '') {
			return $this->ajaxError('用户名不能为空');
		}
		if(!tool::checkIsEmail($email)) {
			return $this->ajaxError('邮箱格式不正确');
		}
		if(!tool::checkPassword($password)) {
			return $this->ajaxError('密码格式不正确');
		}
		if(!tool::checkUsername($username)) {
			return $this->ajaxError('用户名格式不正确');
		}
		$ifEmailRegistered = $this->checkIfEmailRegistered($email);
		if($ifEmailRegistered){
			return $this->ajaxError('该邮箱已被注册');
		}

		$params = array();
		$params['username'] = $username;
		$params['email'] = $email;
		$params['password'] = md5($password);
		db::begintrans();
		$result = WebApi_User::instance()->addUserByParams($params);
		// var_dump($result);exit;
		if(!$result || $result == 0) {
			db::rollback();
			return $this->ajaxError('创建用户失败');
		}

		$uid = $result;
		$expireTime = time()+24*3600;
		$activateLink = SITE_URL.'/user/activate?uid='.$uid.'&expire_time='.$expireTime;
		// send email
		$subject = '注册成功-偏未晚的blog';
		$tpl = 'register_success';
		$to = $email;
		$binds = array('activate_link'=>$activateLink);
		$mail = new Mail();
		$sendResult = $mail->sendTPLMail($subject, $tpl, $to, $binds);
		if(!$sendResult){
			db::rollback();
			return $this->ajaxError('注册失败,发送激活邮件错误');
		}
		db::commit();
		return $this->ajaxSuccess();
	}

	//check if email address has been registered
	private function checkIfEmailRegistered($email) {
		$result = WebApi_User::instance()->getAllUserByEmail($email);
		if(!empty($result)) {
			return true; //already registered
		}else {
			return false; // havn't registered
		}
	}

	public function ifRegistered() {
		$email = isset($_GET['email']) ? $_GET['email'] : '';
		if($email == '') {
			echo 'empty email';exit;
		}
		$ifRegistered = $this->checkIfEmailRegistered($email);
		if($ifRegistered){
			echo 'have registered';exit;
		}else {
			echo 'havn\'t registered';exit;
		}
	}

	public function registerSuccess() {
		$email = isset($_GET['email']) ?  $_GET['email'] : '';
		if($email == '') {
			return $this->error('邮箱错误');
		}else {
			return $this->display('register_success', array('email'=>$email));
		}
	}


	//activate user account
	public function activate() {
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$expireTime = isset($_GET['expire_time']) ? $_GET['expire_time'] : 0;
		if($uid <= 0) {
			return $this->error('用户信息传入错误');
		}
		if($expireTime <= 0){
			return $this->error('激活信息传入错误');
		}
		if($expireTime < time()) {
			return $this->error('激活链接已过期');
		}

		$user = WebApi_User::instance()->getUserByUid($uid);
		if(empty($user)) {
			return $this->error('未找到用户信息');
		}
		if($user['status'] == 1) {
			return $this->error('该用户已激活');
		}
		$email = $user['email'];
		$username = $user['username'];
		return $this->display('activate', array('uid'=>$uid, 'email'=>$email, 'username'=>$username));
	}
	

	//activate user by uid and password
	public function ajaxActivateUser() {
		$uid = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : 0;
		$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
		//check variable
		if($uid == 0){
			return $this->ajaxError('用户信息有误');
		}
		if($password == '') {
			return $this->ajaxError('密码输入错误');
		}

		//check  user status
		$user = WebApi_User::instance()->getUserByUid($uid);
		if(empty($user)){
			return $this->ajaxError('未找到该用户');
		}
		if($user['status'] == 1){
			return $this->ajaxError('该用户已激活');
		}
		
		if(md5($password) != $user['password']) {
			return $this->ajaxError('密码错误');
		}

		//activate 
		$activate = WebApi_User::instance()->activateUserByUid($uid);
		if(!$activate || $activate == 0) {
			return $this->ajaxError('激活失败');
		}
		return $this->ajaxSuccess('激活成功');
	}

	public function activateSuccessJump() {
		return $this->success('激活成功!将为您跳转至登录页面。。。','/user/login', 2);
	}

	
}









 ?>
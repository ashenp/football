<?php 
class Controller{
	//uniform the error template
	public function error($msg = '', $url = '' ,$delay = 2) {
		if($url == ''){
			$redirect = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $url;
		}else {
			$redirect = $url;
		}
		
		$smarty = new Smarty();
		$smarty->setTemplateDir(VIEWS_DIR.'/remind');
		$smarty->setCompileDir(TMP_DIR);
		$smarty->assign('msg', $msg);
		$smarty->assign('redirect', $redirect);
		$smarty->assign('delay', $delay);
		$smarty->display('error.tpl');
	}

	public function success($msg = '', $url = '', $delay = 2) {
		if($url == ''){
			$redirect = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $url;
		}else {
			$redirect = $url;
		}
		
		$smarty = new Smarty();
		$smarty->setTemplateDir(VIEWS_DIR.'/remind');
		$smarty->setCompileDir(TMP_DIR);
		$smarty->assign('msg', $msg);
		$smarty->assign('redirect', $redirect);
		$smarty->assign('delay', $delay);
		$smarty->display('success.tpl');
	}

	public function display($tpl,$params = array()) {
		$className = get_class($this);
		$strArray = explode('_',ltrim($className, 'Controller_'));
		$str = '';
		foreach ($strArray as $value) {
			$str .= '/'.lcfirst($value);
		}

		$smarty = new Smarty();
		$smarty->setTemplateDir(VIEWS_DIR.$str);
		$smarty->setCompileDir(TMP_DIR);
		foreach ($params as $key => $value) {
			$smarty->assign($key,$value);
		}
		$smarty->display($tpl.'.tpl');
	}


	//unified the json error output
	public function ajaxError($msg = '', $data = '', $status = 400) {
		echo json_encode(array('status'=>$status,'msg'=>$msg, 'data'=>$data));
	}

	//unified the json success output
	public function ajaxSuccess($msg = '', $data = '', $status = 200) {
		echo json_encode(array('status'=>$status, 'msg'=>$msg, 'data'=>$data));
	}


	//unified the error
	public function unifiedError() {
		$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
		return $this->error($msg);
	}

	//unified the success
	public function unifiedSuccess() {
		$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
		return $this->success($msg);
	}

}


















 ?>
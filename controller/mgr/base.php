<?php
class Controller_Mgr_Base extends Controller {

	/**
	 * 成功提示
	 *
	 * @param string $msg 提示信息
	 * @param string $url 跳转URL
	 * @param integer $delay 跳转URL延时
	 * 
	 */
	 public function success($msg, $url = '', $delay = 3){
    	if($url == '') {
			$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		} else{
			if(strpos($url, 'http') === false) {
				$url = url::makemgr($url);
			}
		}
		$params = array();
		$params['msg'] = $msg;
		$params['delay'] = $delay*1000;
		$params['url'] = $url;
		$toUrl = url::makemgr('base/showSuccess?'.http_build_query($params));
		
		header('location:'.$toUrl); 
		
    }
    //防止重复提交进行了head重定向
    public function showSuccess() {
    	if(empty($_GET)) {
    		return $this->error('不允许操作!');
    	}
    	return $this->display('layouts/mgr/success', $_GET);
    }
    
    
    /**
     * 错误提示
     *
     * @param string $msg 提示信息
	 * @param string $url 跳转URL
	 * @param integer $delay 跳转URL延时
	 * 
     */
    public function error($msg, $url = '', $delay = 3){
		if($url != '') {
			$url = url::makemgr($url);
		}
		$params = array();
		$params['msg'] = $msg;
		$params['delay'] = $delay*1000;
		$params['url'] = $url;
		return $this->display('layouts/mgr/error', $params);
    }
    
    /**
     * 警告提示
     *
     * @param string $msg 提示信息
	 * @param string $url 跳转URL
	 * @param integer $delay 跳转URL延时
	 * 
     */
    public function warning($msg, $url = '', $delay = 3){
		if($url != '') {
			$url = url::makemgr($url);
		}
		
		$params = array();
		$params['msg'] = $msg;
		$params['delay'] = $delay*1000;
		$params['url'] = $url;
		return $this->display('layouts/mgr/warning', $params);
    }
    
    
	public function exportExsel($header, $data) {
		return Excel::download($header, $data, '', 'xls');
	}
    
}


?>
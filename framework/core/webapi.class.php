<?php 

class WebApi {
	//unified error post
	public function error($msg = '', $data = array(), $status = 400) {
		$info = array();
		$info['msg'] = $msg;
		$info['data'] = $data;
		$info['status'] = $status;
		
		return $info;
	}

	//unified success post
	public function output($msg = '', $data = array(), $status = 200) {
		$info = array();
		$info['msg'] = $msg;
		$info['data'] = $data;
		$info['status'] = $status;

		return $info;
	}
}





 ?>
<?php 
class Controller_Test extends Controller {
	public function test() {
		ob_start();
		echo 1;
		ob_get_clean();
		// var_dump(ob_get_clean());
	}

	public function testMail() {
		$subject = '测试';
		$content = '测试';
		$to = 'pianweiwan0413@163.com';
		$mail = new Mail();
		$sendResult = $mail->sendNormalMail($subject, $content, $to);
		if($sendResult) {
			echo '发送成功';
		}else {
			echo '发送失败';
		}
	}

	public function testHTMLMail() {
		$subject = '测试';
		$content = '<a>www.ashenp.com<a>';
		$to = 'pianweiwan0413@163.com';
		$mail = new Mail();
		$sendResult = $mail->sendHTMLMail($subject, $content, $to);
		if($sendResult) {
			echo '发送成功';
		}else {
			echo '发送失败';
		}
	}

	public function testTPLMail() {
		$subject = '注册成功';
		$tpl = 'register_success';
		$to = 'pianweiwan0413@163.com';
		$binds = array();
		$binds['mail'] = 'pianweiwan0413@163.com';
		$mail = new Mail();
		$sendResult = $mail->sendTPLMail($subject, $tpl, $to, $binds);
		if($sendResult) {
			echo '发送成功';
		}else {
			echo '发送失败';
		}
	}
}


 ?>
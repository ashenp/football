<?php 
require_once(PLUGIN_DIR.'/phpmailer/phpmailer.class.php');
require_once(CONF_DIR.'/mail.conf.php');
// global $mailArray;
//actually it repackage the PHPMailer class
class Mail {
	private $mailer;
	public function __construct($module = 'default') {
		$this->mailer = new PHPMailer(true);
		global $mailArray;
		$this->mailer->CharSet = 'UTF-8';
		$this->mailer->IsSMTP();
		$this->mailer->SMTPAuth = true;
		$this->mailer->setLanguage('zh_cn');  
		$this->mailer->Host = $mailArray[$module]['host'];
		$this->mailer->Port = $mailArray[$module]['port'];
		$this->mailer->Username = $mailArray[$module]['username'];
		$this->mailer->Password = $mailArray[$module]['password'];
		
		$this->mailer->addReplyTo($mailArray[$module]['replyAddress'], $mailArray[$module]['replyName']);
		$this->mailer->From = $mailArray[$module]['fromAddress'];
		$this->mailer->FromName = $mailArray[$module]['fromName'];
	}

	public function setSMTPSecure($module = 'ssl') {
		$this->mailer->SMTPSecure = $module;
	}

	public function addAddress($address) {
		$this->mailer->AddAddress($address);
	}

	//add copy(抄送)
	public function addCC($address) {
		$this->mailer->AddCC($addAddress);
	}

	//add secert copy(密送)
	public function addBCC($address) {
		$this->mailer->AddBCC($address);
	}

	public function setBody($body) {
		$this->mailer->Body = $body;
	}

	public function setHtml($module = true) {
		$this->mailer->IsHTML($module);
	}

	//when client doesn't support html, the email will show this
	public function setAltBody($altBody) {
		$this->mailer->AltBody = $altBody;
	}

	//set the string length per line
	public function setWordWrap($length) {
		$this->mailer->WordWrap = $length;
	}

	public function setErrorLanguage($language = 'zh_cn') {
		$this->mailer->SetLanguage($language);
	}

	public function addAttachment($filePath,$name = '') {
		if($name == ''){
			$this->mailer->AddAttachment($filePath);
		}else {
			$this->mailer->AddAttachment($filePath, $name);		
		}
	}

	public function setSubject($subject) {
		$this->mailer->Subject = $subject;
	}

	public function setCharSet($charset = 'UTF-8') {
		$this->mailer->CharSet = $charset;
	}

	public function sendHTMLMail($subject, $body, $to) {
		$this->setHtml(true);
		$this->setSubject($subject);
		$this->setBody($body);
		$this->addAddress($to);
		return $this->mailer->Send();
	}

	public function sendNormalMail($subject, $body, $to) {
		$this->setHtml(false);
		$this->setSubject($subject);
		$this->setBody($body);
		$this->addAddress($to);
		return $this->mailer->Send();
	}


	//send html mail, the content has been defined already in the source folder
	public function sendTPLMail($subject, $tpl, $to, $binds = array()) {
		$this->setHtml(true);
		$this->setSubject($subject);
		//get tpl content and replace the variable
		$tplPath = SOURCE_DIR.'/mail/tpl/'.$tpl.'.tpl';
		if(!file_exists($tplPath)) {
			echo 'the mail template doesn\'t exists';
		}
		$body = file_get_contents($tplPath);
		// echo $body;exit;
		$temp = '';
		foreach ($binds as $key => $value) {
			// echo $key;
			$temp = str_replace('{##'.$key.'##}', $value, $body);
		}
		$this->setBody($temp);
		$this->addAddress($to);
		return $this->mailer->Send();
	}


}




 ?>
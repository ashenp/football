<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
	<title>用户注册</title>
</head>
<style type="text/css">
	body{
		background: #F3F3F3;
	}
	.banner{
		margin: 20px auto;
		background: #EEEEEE;
		height: 100px;
		width: 1050px;
	}
	.register_container{
		margin: 10px auto;
		padding-top: 20px;
		height: 500px;
		width: 1050px;
		background: #FFFFFF;
	}
	.input_container{
		margin-top: 10px;
		margin-left: 30px;
	}
	.input_container input{
		height: 38px;
		font-size: 14px;
		border-radius: 2px;
		outline: 0px none;
		border: 1px solid #CCC;
		padding: 0px 10px;
		width: 350px;
		margin-bottom: 15px;
	}
	.input_container span {
		margin-left: 5px;
	}
	.button{
		border-radius: 4px;
		padding-top: 0.8125em;
		padding-bottom: 0.75em;
		border-style: solid;
		border-width: 0px;
		cursor: pointer;
		font-family: inherit;
		font-weight: bold;
		line-height: normal;
		margin: 10px 30px 1.25em;
		width: 325px;
		position: relative;
		text-decoration: none;
		text-align: center;
		display: inline-block;
		padding: 0.75em 1.5em 0.8125em;
		font-size: 1em;
		background-color: #2DAEBF;
		border-color: #238896;
		color: #FFF;
	}
	.notetxt{
		border-radius: 5px;
		margin-top: 00px;
		padding-top: 13px;
		text-align: center;
		margin-left: 30px;
		/*position: absolute;*/
		height: 30px;
		width: 370px;
		background: #CCCCCC;
		color: #C4573C;
		display: none;
	}
</style>
<script type="text/javascript" src="/static/JS/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	{literal}
	$(document).ready(function() {
		$('#register_button').click(function() {
			var email = $('#email_input').val();
			var password = $('#password_input').val();
			var confirm_password = $('#confirm_password_input').val();
			var username = $('#username_input').val();
			if(!checkEmail(email)){
				notetxtShow('邮箱格式不正确');
			}else if(!checkPassword(password)){
				notetxtShow('密码格式不正确');
			}else if(!checkPassword(confirm_password)){
				notetxtShow('确认密码格式不正确');
			}else if(!checkUsername(username)){
				notetxtShow('用户名格式不正确');
			}else if(password != confirm_password){
				notetxtShow('两次输入的密码不一致');
			}else {
				$('.notetxt').hide();
				$.post('/user/ajaxCheckRegister',{email:email,username:username,password:password},function(jdata) {
					if(jdata['status'] != 200) {
						notetxtShow(jdata['msg']);
					}else {
						window.location.href = '/user/registerSuccess?email='+email;
						// notetxtShow('注册成功');
					}
				},'json');
			}
			
		});
	});
	function notetxtShow(content) {
		$('.notetxt').html(content);
		setTimeout("$('.notetxt').show();",500);
	}
	function checkEmail(email) {
		var emailReg = /^([a-zA-Z0-9_-])+@[a-zA-Z0-9_-]+(.[a-zA-Z0-9_-]+)+$/;
		if(emailReg.test(email)) {
			return true;
		}else {
			return false;
		}
	}

	function checkPassword(password) {
		var passwordReg = /[a-zA-Z0-9_]{6,22}/;
		if(passwordReg.test(password)) {
			return true;
		}else {
			return false;
		}
	}

	function checkUsername(username) {
		var usernameReg = /[\u4e00-\u9fa5a-zA-Z0-9_]{3,15}/;
		if(usernameReg.test(username)) {
			return true;
		}else {
			return false;
		}
	}
	{/literal}
</script>
<!-- <link rel="stylesheet" type="text/css" href=""> -->
<body>
	<div class='banner'></div>
	<div class='register_container'>
		<div class='input_container'>
			<input id='email_input' type="text" placeholder='请输入正确的邮箱地址' maxlength="30">
			<br/>
			<input id='password_input' type="password" placeholder='请输入6-22位由字母，数字和下划线组成的密码' maxlength="16">
			<br/>
			<input id='confirm_password_input' type="password" placeholder='请在此输入密码' maxlength="16">
			<br/>
			<input id='username_input' type="text" placeholder='请输入3-15位由汉字，数字，字母，下划线组成的用户名' maxlength="16">
			<br/>
		</div>
		<div class="notetxt">notetxt</div>
		<div class='button_container'>
			<a id='register_button' class="button">注册</a>
		</div>
	</div>
</body>
</html>
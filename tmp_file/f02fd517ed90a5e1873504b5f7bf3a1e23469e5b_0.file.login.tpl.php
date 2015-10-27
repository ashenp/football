<?php /* Smarty version 3.1.27, created on 2015-09-17 16:40:45
         compiled from "/Users/pianweiwan/Desktop/ashenp/views/user/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:212430493855fa7c8de29526_62582389%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f02fd517ed90a5e1873504b5f7bf3a1e23469e5b' => 
    array (
      0 => '/Users/pianweiwan/Desktop/ashenp/views/user/login.tpl',
      1 => 1442479130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212430493855fa7c8de29526_62582389',
  'variables' => 
  array (
    'redirect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55fa7c8de98543_21411648',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55fa7c8de98543_21411648')) {
function content_55fa7c8de98543_21411648 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '212430493855fa7c8de29526_62582389';
?>
<!DOCTYPE html>
<html>
<meta charset='utf-8'>
<head>
	<title>登录</title>
<style type="text/css">
body{
	/*text-align: center;*/
	margin: 0;
}
.site_background{
	position: absolute;
	width: 100%;
	height: 100%;
	z-index: -1;
}
.login_center{
	position: absolute;
	width: 300px;
	height: 420px;
	background-color: white;
	-moz-opacity:0.8;
	opacity: 0.8;
	margin-top: 8%;
	margin-left: 70%;
	border-radius: 15px;
}
.input_bar{
	width: 230px;
	margin-top: 40%;
	margin-left: 9%;
	/*margin-right: auto;*/
}
#username_input{
	height: 38px;
	font-size: 14px;
	border-radius: 2px;
	outline: 0px none;
	border: 1px solid #CCC;
	padding: 0px 10px;
	width: 220px;
	margin-bottom: 15px;
}
#password_input{
	height: 38px;
	font-size: 14px;
	border-radius: 2px;
	outline: 0px none;
	border: 1px solid #CCC;
	padding: 0px 10px;
	width: 220px;
	margin-bottom: 15px;
}
a .green .button{
	-webkit-animation-name: greenPulse;
  	-webkit-animation-duration: 2s;
  	-webkit-animation-iteration-count: infinite;
}

@-webkit-keyframes greenPulse {
  from { background-color: #749a02; -webkit-box-shadow: 0 0 9px #333; }
  50% { background-color: #91bd09; -webkit-box-shadow: 0 0 18px #91bd09; }
  to { background-color: #749a02; -webkit-box-shadow: 0 0 9px #333; }
}
.buttons{
	margin-top: 15px;
	margin-left: 38px;
}

.button{
	margin-right: 0.5em;
	border-radius: 4px;
	padding-top: 0.8125em;
	padding-bottom: 0.75em;
	border-style: solid;
	border-width: 0px;
	cursor: pointer;
	font-family: inherit;
	font-weight: bold;
	line-height: normal;
	margin: 0px 14px 1.25em;
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

.button, .button:hover, .button:active {
    box-shadow: none;
}

.notetxt{
	border-radius: 5px;
	margin-top: -100px;
	padding-top: 22px;
	text-align: center;
	margin-left: 10px;
	position: absolute;
	height: 40px;
	width: 280px;
	background: #CCCCCC;
	display: none;
}

</style>
</head>

<body>
<div class='site_background'>
<img src="/static/IMAGE/login/login-background.jpg" alt='图片无法显示' height="100%" width="100%">
</div>
<div class='login_center'>
	<div class='input_bar'>
			<input id='username_input' placeholder="邮箱" type="text" name="username">
			<br/>
			<br/>
	 		<input id='password_input' type="password" placeholder="密码" name="password">
	</div>
	<div class="notetxt">账号不存在</div>
	<div class="buttons">
		<a id="sign_in" class="green button">登&nbsp&nbsp录</a>
		<a id="register" class="green button" href="/user/register">注&nbsp&nbsp册</a>
	</div>
	<div id='redirect' style="display: none"><?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
</div>
</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="/static/JS/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	
	$(document).ready(function() {
		$('#sign_in').click(function() {
			var username = $('#username_input').val();
			var password = $('#password_input').val();
			$.post('/user/ajaxCheckLogin',{username:username,password:password},function(jdata) {
				if(jdata['status'] != 200) {
					$('.notetxt').html(jdata['msg']);
					$('.notetxt').show();
					setTimeout("$('.notetxt').hide()",2000);
				}else {
					var location = $('#redirect').html();
					if(location != '') {
						window.location.href = location;
					}else {
						window.location.href = '/user/index';
					}
				}
			},'json');
		});
	});
	
<?php echo '</script'; ?>
>
</html><?php }
}
?>
<?php /* Smarty version 3.1.27, created on 2015-08-12 21:40:22
         compiled from "/Users/pianweiwan/Desktop/mysite/views/user/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:179519742455cb4cc632a227_91359337%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '584d5f7b4563a5046a5e3fce3e49a00080cb3cac' => 
    array (
      0 => '/Users/pianweiwan/Desktop/mysite/views/user/login.tpl',
      1 => 1439386817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179519742455cb4cc632a227_91359337',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cb4cc636bb46_44104138',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cb4cc636bb46_44104138')) {
function content_55cb4cc636bb46_44104138 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '179519742455cb4cc632a227_91359337';
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
	padding: 0.5em 0.4em;
	width: 100%;
	background: transparent none repeat scroll 0% 0%;
	color: #AFB5BB;
	font-size: 1.1em;
	border : medium none;
	/*height: 30px;
	width: 100%;
	font-size: 15px;
	font-family: verdana;
	border-radius: 3px;
	margin-bottom: 10px;*/
	/*padding-left:10px;
	line-height:22px;
	text-align:left;
	font-size:1.2em;
	color:#999;*/
}
#password_input{
	padding: 0.5em 0.4em;
	width: 100%;
	background: transparent none repeat scroll 0% 0%;
	color: #AFB5BB;
	font-size: 1.1em;
	border : medium none;
	/*height: 30px;
	width: 100%;
	font-size: 15px;
	font-family: verdana;
	border-radius: 3px;*/
	/*padding-left:10px;
	line-height:22px;
	text-align:left;
	font-size:1.2em;
	color:#999;*/
}

</style>
</head>

<body>
<div class='site_background'>
<img src="/static/IMAGE/login/login-background.jpg" alt='图片无法显示' height="100%" width="100%">
</div>
<div class='login_center'>
	<div class='input_bar'>
			
			<input id='username_input' type="text" value="请输入用户名">
		
	 	
	 		
	 		<input id='password_input' type="text" value="请输入密码">
	 		
	 
	</div>
	<div class="buttons"></div>
</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="/static/JS/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() {

	});
	
<?php echo '</script'; ?>
>
</html><?php }
}
?>
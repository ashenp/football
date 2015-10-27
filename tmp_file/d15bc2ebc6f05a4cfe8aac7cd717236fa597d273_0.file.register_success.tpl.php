<?php /* Smarty version 3.1.27, created on 2015-09-11 20:29:58
         compiled from "/Users/pianweiwan/Desktop/ashenp/views/user/register_success.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5725773655f2c9465ba670_82571254%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd15bc2ebc6f05a4cfe8aac7cd717236fa597d273' => 
    array (
      0 => '/Users/pianweiwan/Desktop/ashenp/views/user/register_success.tpl',
      1 => 1441953627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5725773655f2c9465ba670_82571254',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55f2c946607394_41157271',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f2c946607394_41157271')) {
function content_55f2c946607394_41157271 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5725773655f2c9465ba670_82571254';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
body{
	background:#808080;
}
.banner{
	border-radius:10px;
	margin:10px auto;
	width:800px;
	height:150px;
}
.banner img{
	width:100%;
	height:100%;
}
.note{
	width:800px;
	margin:10px auto;
}
.hr{
	width:1000px;
	height:1px;
	background:#999;
	margin:10px auto;
}
</style>
<title>注册成功</title>
</head>


<body>
<div class='banner'>
<img src="http://www.ashenp.com/source/mail/image/banner.jpg" alt="banner">
</div>
<div class='hr'></div>
<div class='note'>
感谢注册blog，我们已经发送了一封激活邮件到您的注册邮箱<a href="<?php echo $_smarty_tpl->getConfigVariable( $_smarty_tpl->getConfigVariable( 'mail'));?>
"><?php echo $_smarty_tpl->getConfigVariable( $_smarty_tpl->getConfigVariable( 'mail'));?>
</a>
，请收到邮件后点击邮件的激活链接完成账号激活。 
</div>


</body>
</html>
<?php }
}
?>
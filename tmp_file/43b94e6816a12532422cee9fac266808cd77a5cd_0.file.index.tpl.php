<?php /* Smarty version 3.1.27, created on 2015-09-14 20:45:48
         compiled from "/Users/pianweiwan/Desktop/ashenp/views/user/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:48249575755f6c17cac2276_77333552%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b94e6816a12532422cee9fac266808cd77a5cd' => 
    array (
      0 => '/Users/pianweiwan/Desktop/ashenp/views/user/index.tpl',
      1 => 1442234747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48249575755f6c17cac2276_77333552',
  'variables' => 
  array (
    'username' => 0,
    'introduction' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55f6c17cb3e134_54858006',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f6c17cb3e134_54858006')) {
function content_55f6c17cb3e134_54858006 ($_smarty_tpl) {
if (!is_callable('smarty_function_staticurl')) require_once '/Users/pianweiwan/Desktop/ashenp/framework/plugin/smarty/libs/plugins/function.staticurl.php';

$_smarty_tpl->properties['nocache_hash'] = '48249575755f6c17cac2276_77333552';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='UTF-8'>
	<title><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
的主页</title>
	<link rel="stylesheet" type="text/css" href="/static/CSS/normalize.css">
	<link rel="stylesheet" type="text/css" href="/static/CSS/main.css">
	<style type="text/css">
		.main-wrapper{
			/*background: #444 url(/static/IMAGE/blog/banner_x.jpg);*/
			background: #444 url(<?php echo smarty_function_staticurl(array('path'=>"/IMAGE/blog/banner_x.jpg"),$_smarty_tpl);?>
);
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
		}
	</style>
</head>
<body>
	<div class="main-wrapper">
		<header>
			<nav>
				<div class="logo"><a href="#"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a></div>
				<ul>
					<li><a class="active" href="">文章</a></li>
					<li><a href="">心情</a></li>
					<li><a href="">相册</a></li>
					<li><a href="/user/actionSetting">设置</a></li>	
					<li><a href="/user/logout">退出</a></li>
				</ul>
			</nav>
			<div id="banner">
				<div class="inner">
					<h1><?php echo $_smarty_tpl->tpl_vars['introduction']->value['subject'];?>
</h1>
					<p class="sub-heading"><?php echo $_smarty_tpl->tpl_vars['introduction']->value['content'];?>

					</p>
					<button>了解我</button>
					<div class="more">
						更多
					</div>
				</div>
			</div>
		</header>
	<footer></footer>
	</div>
</body>
</html><?php }
}
?>
<?php /* Smarty version 3.1.27, created on 2015-09-12 10:40:19
         compiled from "/Users/pianweiwan/Desktop/ashenp/views/remind/error.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:54466770455f390932873e6_36415454%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55548cfd855fc95e817b02f0e7129f3f3d202916' => 
    array (
      0 => '/Users/pianweiwan/Desktop/ashenp/views/remind/error.tpl',
      1 => 1442025525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54466770455f390932873e6_36415454',
  'variables' => 
  array (
    'redirect' => 0,
    'delay' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55f390932be055_83867492',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f390932be055_83867492')) {
function content_55f390932be055_83867492 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '54466770455f390932873e6_36415454';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>错误提示</title>
<style type="text/css">
	.notetxt{
		border-radius: 5px;
		margin: 0px auto;
		padding-top: 13px;
		text-align: center;
		/*position: absolute;*/
		height: 30px;
		width: 370px;
		background: #CCCCCC;
		color: #C4573C;
		display: none;
		}
	body{
		background: #003366;
		color: #FFFFFF; 
	}
	.container{
		margin: 10px auto;
		width:700px;
	}
	.note{
		background: #336699;
		margin: 50px auto;
		border-radius: 20px;
		padding: 20px;
		width: 600px;
		height: 300px;
		text-align: center;
		font-size: 18px;
	}
	.input{
		width: 800px;
		margin: 10px auto;
		text-align: center;
		background: #000000;
	}
	.note input{
		margin-top: 10px;
		margin-left: 15px;
		height: 40px;
		font-size: 14px;
		border-radius: 2px;
		outline: 0px none;
		border: 1px solid #CCC;
		padding: 0px 10px;
		width: 180px;
		margin-bottom: 15px;
	}
	.button{
		border-radius: 4px;
		padding-top: 0.6em;
		padding-bottom: 0.6em;
		padding-left: 0.5em;
		padding-right: 0.5em; 
		border-style: solid;
		border-width: 0px;
		cursor: pointer;
		font-family: inherit;
		font-weight: bold;
		line-height: normal;
		margin: 10px 15px 1.25em;
		width: 80px;
		position: relative;
		text-decoration: none;
		text-align: center;
		display: inline-block;
		/*padding: 0.75em 1.5em 0.8125em;*/
		font-size: 1em;
		background-color: #2DAEBF;
		border-color: #238896;
		color: #FFF;
	}
	.icon{
		margin: 40px auto;
		width: 125px;
		height: 125px;
	}
	.icon img{
		width: 100%;
		height: 100%;
	}
</style>
<?php echo '<script'; ?>
 type="text/javascript" src="/static/JS/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() {
		var delay =$('#delay').html();
		if(delay != 0) {
			delay *= 1000;
			setTimeout("actionRedirect()", delay);
		}
	});
	function actionRedirect() {
		var redirectUrl = $('#redirect').html();
		if(redirectUrl != ''){
			window.location.href = redirectUrl;
		}
	}
<?php echo '</script'; ?>
>
</head>

<body>
	<div id='redirect' style="display: none"><?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
</div>
	<div id='delay' style="display: none"><?php echo $_smarty_tpl->tpl_vars['delay']->value;?>
</div>
	<div class="container">
		<div class='note'>
			<div class='icon'>
				<img src="/static/IMAGE/remind/error.png">
			</div>
			<h2>提示信息: <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h2>	
		</div>
	</div>
	
</body>
</html><?php }
}
?>
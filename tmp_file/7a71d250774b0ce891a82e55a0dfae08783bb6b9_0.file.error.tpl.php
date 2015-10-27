<?php /* Smarty version 3.1.27, created on 2015-08-07 16:10:09
         compiled from "/Users/pianweiwan/Desktop/mysite/views/remind/error.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:138359765855c467e1261b55_48095956%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a71d250774b0ce891a82e55a0dfae08783bb6b9' => 
    array (
      0 => '/Users/pianweiwan/Desktop/mysite/views/remind/error.tpl',
      1 => 1438935007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138359765855c467e1261b55_48095956',
  'variables' => 
  array (
    'msg' => 0,
    'redirect' => 0,
    'delay' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55c467e1284157_51865183',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55c467e1284157_51865183')) {
function content_55c467e1284157_51865183 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '138359765855c467e1261b55_48095956';
?>
<!DOCTYPE html>
<html>
<meta charset='utf-8'>
<head>
	<title>error</title>
</head>
<body>
	<div style="width: 500px;height: 200px;border: 1px dashed #000;position:absolute; top:25%; left:30%;text-align: center">
		<p style="line-height:  150px;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
	</div>
	<div style="display: none" id='redirect'><?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
</div>
	<div style="display: none" id='delay'><?php echo $_smarty_tpl->tpl_vars['delay']->value;?>
</div>
	
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="/static/JS/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	
		$(document).ready(function() {
			var redirect = $('#redirect').html();
			var delay = $('#delay').html();
			console.log(redirect);
			window.setTimeout("window.location='"+redirect+"'", delay*1000);
		});
	
<?php echo '</script'; ?>
>
</html><?php }
}
?>
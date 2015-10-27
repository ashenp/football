<?php /* Smarty version 3.1.27, created on 2015-08-14 23:59:17
         compiled from "/Users/pianweiwan/Desktop/mysite/views/imooc/star_girl.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:160467437155ce10559a4e03_69179909%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '394d668ddda28e5d1bd4e866d13b7093b3023dcf' => 
    array (
      0 => '/Users/pianweiwan/Desktop/mysite/views/imooc/star_girl.tpl',
      1 => 1439567778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160467437155ce10559a4e03_69179909',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55ce1055a24846_13380376',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55ce1055a24846_13380376')) {
function content_55ce1055a24846_13380376 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '160467437155ce10559a4e03_69179909';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = 'utf-8'>
	<title>star girl</title>
</head>
<body>
	<div>
		<canvas id='canvas' width='800' height='600'></canvas>
	</div>
	<?php echo '<script'; ?>
 type="text/javascript" src="/static/JS/starGirl/commonFunctions.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="/static/JS/starGirl/main.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="/static/JS/starGirl/stars.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>
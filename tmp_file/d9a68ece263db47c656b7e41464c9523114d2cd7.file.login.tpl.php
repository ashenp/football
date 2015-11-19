<?php /* Smarty version Smarty-3.1.7, created on 2015-10-02 15:49:38
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32741560e3712bb3780-85300911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9a68ece263db47c656b7e41464c9523114d2cd7' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\admin\\login.tpl',
      1 => 1443681187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32741560e3712bb3780-85300911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560e3712cd184',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e3712cd184')) {function content_560e3712cd184($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>百动场地资源管理系统</title>
 
<script language="javascript" src="<?php echo smarty_function_staticurl(array('action'=>"jquery.js",'type'=>"js"),$_smarty_tpl);?>
"></script>
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/common.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/login.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
</head>

<body onload="$('#username').focus();">
<form action="" method="POST">
<div class="login">
<div class="balogo"></div>
<div class="boginbox">
<dl><dt>用户名</dt><dd><input class="inpw130" id="username" name="set[username]" type="text" maxlength="30"  style="height:18px;line-height: 18px;"/></dd></dl>
<dl><dt>密&nbsp;&nbsp;码</dt><dd><input class="inpw130"  name="set[password]" type="password" maxlength="30" style="height:18px;line-height: 18px;"/></dd></dl>
<!--<dl><dt>验证码</dt><dd><input class="inpw60" style="_width:60px;" name="" type="text" /></dd><dd><span><img src="<?php echo smarty_function_staticurl(array('action'=>"admin/j_08.gif"),$_smarty_tpl);?>
" /></span></dd></dl>-->
<div class="loginbnt"><div class="lbng">
<input   value=" 登 录 " type="submit" style="float:left;width:60px;margin-right:10px;"  />
 <div style="  float:left;color:#fff;width:60px;margin-top:4px;height:20px;line-height:17px"><input type="checkbox" name="set[remember]" checked="checked" value="1" style="vertical-align:bottom" >记住我</div>

</div></div>
</div>
</div></form>
</body>
</html>
<?php }} ?>
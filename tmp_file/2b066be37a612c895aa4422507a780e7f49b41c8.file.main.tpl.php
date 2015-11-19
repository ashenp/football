<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 10:06:38
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\admin\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21615560e3b0ac73f30-45507642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b066be37a612c895aa4422507a780e7f49b41c8' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\admin\\main.tpl',
      1 => 1444269981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21615560e3b0ac73f30-45507642',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560e3b0b1528f',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e3b0b1528f')) {function content_560e3b0b1528f($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bestdo</title>
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/wrap.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/common.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />

<script language="javascript" src="<?php echo smarty_function_staticurl(array('action'=>"admin/jquery-1.5.2.min.js"),$_smarty_tpl);?>
"></script>
<script language="javascript" src="<?php echo smarty_function_staticurl(array('action'=>"admin/common.js"),$_smarty_tpl);?>
"></script>

</head>
<body style="leftmargin="0" topmargin="0";">
<div>
	<div style="margin:10px 20px 10px 0;float:left;">
		<img src="<?php echo smarty_function_staticurl(array('action'=>"logo.png"),$_smarty_tpl);?>
">
	</div>
	<div style="margin:10px auto;float:left;">
		 <span style="font-size:14px">
			 <span class="tbold">百动网</span> 欢迎登录百动网信息管理平台!<br /><br />
			 <span style="font-size:14px"><input type="button" value="修改密码" onclick="window.location.href='<?php echo smarty_function_mgrurl(array('action'=>"user/modifyPassword"),$_smarty_tpl);?>
'"  /></span>
		 </span>
	</div>
</div>

<form action="/user/checkUser" method="get" id="myform">
<div class="indexMain" >
    <p>
      <input placeholder="请输入手机号" type="text" name="mobile" onkeydown="onlyNum();" maxlength="15" id="mobile" style="height: 30px;line-height: 30px;">
      <input type="button" onclick="formSubmit(0);" value="百动一下" style="width:100px;height:40px;font-size:14px;text-align:center;line-height:30px;margin-top:-3px;background-color: #0066FF "/>
    </p>
</div>
<input type="hidden" name="cid" value="" id="cid">
</form>
<!-----------------------内容 结束----------------------->
 
</body>
</html>

<script language=javascript>
function onlyNum() {
  if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))
    event.returnValue=false;
}

function formSubmit(cid) {
	var mobile = $("#mobile").val();
	var telReg = !!mobile.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8,12}$/)
	if(mobile == '' || telReg == false) {
		alert('请输入正确格式的手机号');return false;
	}
	
	$("#cid").val(cid);
	$("#myform").submit(); 
}

</script>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.7, created on 2015-10-29 17:15:27
         compiled from "C:\Users\Administrator\Desktop\football\views\layouts\mgr\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116725631e3af1c2085-26907353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4223e2afb7dddb010da5f101f4f348f4dcb73c6b' => 
    array (
      0 => 'C:\\Users\\Administrator\\Desktop\\football\\views\\layouts\\mgr\\error.tpl',
      1 => 1443681187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116725631e3af1c2085-26907353',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'url' => 0,
    'delay' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5631e3af2df34',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5631e3af2df34')) {function content_5631e3af2df34($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\Administrator\\Desktop\\football\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>操作错误 - 百动网管理平台</title>
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/wrap.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/common.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
</head>

<body>
<div class="pwis">
<div class="error ">
<div class="x" style="display:none"></div>
<h4>操作提示</h4>
<div class="msg_box">
<p class="msg_title"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
<p><a href="<?php if ($_smarty_tpl->tpl_vars['url']->value==''){?>javascript:history.go(-1)<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php }?>" style="color:#4f6b72; text-decoration:none">正在跳转,请稍后...</a></p>

</div>



 
</div>
<?php if ($_smarty_tpl->tpl_vars['url']->value==''){?>
		<script language="javascript">setTimeout('history.go(-1)', <?php echo $_smarty_tpl->tpl_vars['delay']->value;?>
);</script>
        <?php }else{ ?>
        <script language="javascript">setTimeout('window.location.href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"', <?php echo $_smarty_tpl->tpl_vars['delay']->value;?>
);</script>
        <?php }?>
        
</body>
</html>

		
 <?php }} ?>
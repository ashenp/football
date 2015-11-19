<?php /* Smarty version Smarty-3.1.7, created on 2015-10-06 11:58:25
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com/views\mgr\user\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32608560e3b3c6424e9-46829514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e700604bc01c9c0fb2799ecdbebfb02eeee5779' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com/views\\mgr\\user\\menu.tpl',
      1 => 1444103290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32608560e3b3c6424e9-46829514',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560e3b3c70ad4',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e3b3c70ad4')) {function content_560e3b3c70ad4($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
?><div class="account_header">
	<ul>
	  <li> <a href="<?php echo smarty_function_mgrurl(array('action'=>"user/info?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="_self">基本信息</a> </li>
	  <li> <a href="<?php echo smarty_function_mgrurl(array('action'=>"consult/add?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="_self">咨询投诉</a> </li>
	  <li> <a href="<?php echo smarty_function_mgrurl(array('action'=>"card/list?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="_self">卡信息</a> </li>
	  <li> <a href="<?php echo smarty_function_mgrurl(array('action'=>"orderlist/list?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="_self">订单信息</a> </li>
	  <li> <a href="<?php echo smarty_function_mgrurl(array('action'=>"consult/userlist?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="_self">信息列表</a> </li>
	  <li> <a href="<?php echo smarty_function_mgrurl(array('action'=>"license/list?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="_self">license账户</a> </li>
	  <li> <a href="<?php echo smarty_function_mgrurl(array('action'=>"credit/list?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="_self">信用卡信息</a> </li>
	</ul>
</div>
<script type="text/javascript">
var $div_li_a =$("div.account_header  a");
	$div_li_a.each(function(i){
	    var links = $div_li_a[i].getAttribute("href");
			var myURL = document.location.href;
			if(myURL.indexOf(links) != -1)
			{
			$div_li_a[i].className="active";
	}}
)
</script><?php }} ?>
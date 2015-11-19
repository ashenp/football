<?php /* Smarty version Smarty-3.1.7, created on 2015-10-02 15:49:37
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\admin\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13142560e371186f7c2-49577405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c4df02ac3a66eef4b51513e50d9f6bfff6d35ac' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\admin\\index.tpl',
      1 => 1443681187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13142560e371186f7c2-49577405',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'staff_name' => 0,
    'time' => 0,
    'resources' => 0,
    'resource' => 0,
    'rid1' => 0,
    'res' => 0,
    'rid2' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560e371221c93',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e371221c93')) {function content_560e371221c93($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
?><!DOCTYPE HTML>
<html>
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>百动网管理平台</title>
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/wrap.css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
 
 

<script src="<?php echo smarty_function_staticurl(array('action'=>"jquery.js",'type'=>"js"),$_smarty_tpl);?>
"></script>

<style type="text/css">
.snavcom_div{ display:none}
*{margin:0; padding:0}
body, html{ height:100%; width:100%; overflow:hidden;} /*这个高度很重要*/
#mainTable{padding:0px;margin:0px;}
#mainTable td,#mainTable th{padding:0px;margin:0px;}
</style>


</head>
<body style="padding:0px;margin:0px;">
 


<table class="mains" id="mainTable" width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="overflow:hidden;margin:0px; ">
<tr>
<td  height="108"  colspan="2" style="  padding:0px;">
 <div class="top">
    <div class="header">
      <div class="logo" ><img src="<?php echo smarty_function_staticurl(array('action'=>"admin/logo.gif"),$_smarty_tpl);?>
" style="cursor:pointer;" onclick="window.location.href='<?php echo smarty_function_mgrurl(array('action'=>"admin/index"),$_smarty_tpl);?>
'"  /></div>
   
        <div class="user">
          <p>当前登录：<span><?php echo $_smarty_tpl->tpl_vars['staff_name']->value;?>
</span> |<span> 账户管理</span> | <span onclick="if(confirm('确实要退出系统?'))window.location.href='<?php echo smarty_function_mgrurl(array('action'=>"admin/logout"),$_smarty_tpl);?>
'">退出</span></p>
          <p><?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</p>
      </div>
          <!-----------------------主导航 开始----------------------->

    <div class="nav">
      <ul id="topMenu">
        <!--<li menu="index" class="current"><a href="/">首页</a></li>-->
        <?php  $_smarty_tpl->tpl_vars['resource'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['resource']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resources']->value['top1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->key => $_smarty_tpl->tpl_vars['resource']->value){
$_smarty_tpl->tpl_vars['resource']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['resource']->value['is_show']=="1"){?>
      	  <li menu="<?php echo $_smarty_tpl->tpl_vars['resource']->value['alias'];?>
"><a href="javascript:void(0)"  target="main"  title="<?php echo $_smarty_tpl->tpl_vars['resource']->value['name'];?>
" ><?php echo $_smarty_tpl->tpl_vars['resource']->value['name'];?>
</a></li>
 			<?php }?>
    		<?php } ?>
      </ul>
    </div> 
   <!-- <div style="width:184px;position:absolute;right:60px;bottom:4px;color:#fff;font-size:14px;font-family:Microsoft Yahei">
    	<marquee width="184"><a href="/orders/list?status=-2" id="num" style="color:red;"></a></marquee>
    </div>-->
      <!-----------------------主导航 开始----------------------->
  </div>
  <div class="clear"></div>
  </div>
 </td>
</tr>



<tr>
<td width="182"  height="100%" valign="top" style="padding:0px;width:182px;_width:185px; background-color:#f2f2f2;border-right:3px solid #003a73;">
<!-----------------------侧导航 开始----------------------->

 
<div class="snavcom" id="_left" style="overflow-y:auto;">

<div class="sub_index snavcom_div" style="display:block">

<div class="snavbox">
<div class="snavt">

<div class="snavtminus">&nbsp;</div>常用操作</div>
<div class="snavn">
<ul>
<li class="current"><a href="<?php echo smarty_function_mgrurl(array('action'=>"staff/editPassword"),$_smarty_tpl);?>
" target="main">修改密码</a></li>

 
</ul>
</div>
</div>

</div>

 <?php  $_smarty_tpl->tpl_vars['resource'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['resource']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resources']->value['top1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['resource']->key => $_smarty_tpl->tpl_vars['resource']->value){
$_smarty_tpl->tpl_vars['resource']->_loop = true;
?>

<div class="sub_<?php echo $_smarty_tpl->tpl_vars['resource']->value['alias'];?>
 snavcom_div"  >

 <?php $_smarty_tpl->tpl_vars['rid1'] = new Smarty_variable($_smarty_tpl->tpl_vars['resource']->value['resource_id'], null, 0);?>
	<?php if (isset($_smarty_tpl->tpl_vars['resources']->value['top2'][$_smarty_tpl->tpl_vars['rid1']->value])){?>
	<?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resources']->value['top2'][$_smarty_tpl->tpl_vars['rid1']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['res']->value['is_show']=="1"){?>
	<?php $_smarty_tpl->tpl_vars['rid2'] = new Smarty_variable($_smarty_tpl->tpl_vars['res']->value['resource_id'], null, 0);?>
<div class="snavbox">
<div class="snavt"><div class="snavtminus">&nbsp;</div>

<a target="main" <?php if (isset($_smarty_tpl->tpl_vars['resources']->value['top3'][$_smarty_tpl->tpl_vars['rid2']->value])){?>class="have" href="javascript:void(0)"<?php }else{ ?><?php $_smarty_tpl->tpl_vars['uri'] = new Smarty_variable($_smarty_tpl->tpl_vars['res']->value['uri'], null, 0);?>href="<?php echo smarty_function_mgrurl(array('action'=>($_smarty_tpl->tpl_vars['uri']->value)),$_smarty_tpl);?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['res']->value['name'];?>
</a>

</div>
<div class="snavn">
<ul>
<?php if (isset($_smarty_tpl->tpl_vars['resources']->value['top3'][$_smarty_tpl->tpl_vars['rid2']->value])){?>
<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resources']->value['top3'][$_smarty_tpl->tpl_vars['rid2']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['r']->value['is_show']=="1"){?>
<?php $_smarty_tpl->tpl_vars['uri'] = new Smarty_variable($_smarty_tpl->tpl_vars['r']->value['uri'], null, 0);?>
<li><a target="main" href="<?php echo smarty_function_mgrurl(array('action'=>($_smarty_tpl->tpl_vars['uri']->value)),$_smarty_tpl);?>
" ><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
</a></li>
 <?php }?>
 <?php } ?>
 <?php }?>
</ul>
</div>
</div>
<?php }?>
	<?php } ?>
	<?php }?>


</div>
  <?php } ?>
  
 



</div>
 


<div class="clear"></div>




</div>
 






<!-----------------------侧导航 结束----------------------->
</td>
<td  style="padding:0px" height="100%"><!-----------------------内容 开始----------------------->
<iframe src="<?php echo smarty_function_mgrurl(array('action'=>"admin/main"),$_smarty_tpl);?>
" id="main" name="main" width="100%" height="100%"  frameborder="0"   scrolling="auto"></iframe>
 
 </td>
</tr>

  
</table>

<script type="text/javascript">
	self.setInterval("timing()", 60000);
	function timing() {
		 $.get('/orders/getOrdersCount',{}, function(jdata) {
			if(jdata != 0) {
				$('#num').text('未确认的订单 '+jdata+' 笔订单');
			}else {
				$('#num').text('');
			}
		 });
	　　 }
</script>
 <script  language="javascript">
 $(document).ready(function(){

	 $("#topMenu li a").each(function(){
		 $(this).click(function(){
		 		$('#topMenu li').removeClass('current');
				$(this).parent().addClass('current');
			 	$('.snavcom_div').hide();
				var menu=$(this).parent().attr('menu');
				menu = "sub_"+menu;
				$('.'+menu).show();
 
			 });
		 });
		 
		 $('.snavt').click(function(){
			 var dom=$(this).find('div');
			 var c=dom.attr('class');
			 if(c=="snavtadd") {
				/* $('.snavcom').find('.snavn').each(function(){
					 $(this).hide();
					 var d = $(this).prev('.snavt').find('div');
					 d.removeClass('snavtminus');
					 d.addClass('snavtadd');
					 });*/
				 $(this).next('.snavn').slideDown(100);
				  $(dom).removeClass('snavtadd');
				 $(dom).addClass('snavtminus');
				 
			 } else {
				 $(this).next('.snavn').slideUp(100);
				$(dom).removeClass('snavtminus');
				 $(dom).addClass('snavtadd'); 
			 }
			return false;	  
			  
		});
 		
		$('.snavn').find('a').each(function(){
			$(this).click(function(){
				$('.snavn a').removeClass('current');
				$(this).addClass('current');
				
			});
			
		});

		
		 
	 });
 $("#main").load(function(){   //一定要有.load等载入完成
	 	h=$(window).height();
	 	h=h-109;
	 	$(this).css('height', h);
	 	
	 	iframe=$(this).contents().find('html');
	 	w=iframe.width();
	 	if(w<1100) {
	 		w=1100;
	 		iframe.css('width', w);
	 	}
	 	
	 	
    });
 　
　　

 </script>
 
</body>
</html>
<?php }} ?>
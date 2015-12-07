<?php /* Smarty version Smarty-3.1.7, created on 2015-12-02 17:11:11
         compiled from "C:\Users\ziqingli\Desktop\football\views\mgr\manager\messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5370565eabaa32aae8-80036086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd917c77df31bdecfe73c2c91430a23b8ae694dcf' => 
    array (
      0 => 'C:\\Users\\ziqingli\\Desktop\\football\\views\\mgr\\manager\\messages.tpl',
      1 => 1449047454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5370565eabaa32aae8-80036086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_565eabaa39426',
  'variables' => 
  array (
    'messages' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565eabaa39426')) {function content_565eabaa39426($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动详情</title>
<link href="/static/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/css/css.css" type="text/css" rel="stylesheet" />
<script src="/static/js/jquery.js" type="text/javascript"></script>
<style>
div .center{
  margin-left:auto;
  margin-right:auto;
}

h1,h2,h3.center{
  text-align: center;
}

.message {
  padding: 10px;
  min-height: 50px;
  width: 100%;
  border: 1px solid #666666;
  margin-bottom: 10px;
  font-family: verdana;
  font-size: 120%;
}

</style>
</head>
<body>
<div class="banner" >
    <img style="width:100%;height:100%" src="/static/images/banner.jpg">
</div>

<div class="b-daohang">
  <ul class="b-menu" style="margin-left: 50px;">
    <li class="b-nav">
    <a href="/admin/index" class="b-a1">首页</a>
  </li>
  <li class="b-nav">
    <a href="/manager/messages" class="b-a1">留言板</a>
  </li>
      <li class="b-nav">
    <a href="" class="b-a1">跨年跑</a>
  </li>
  <li class="b-nav">
    <a href="" class="b-a1">联系我们</a>
  </li>      
  
  <div style="clear:both"></div>
  </ul>
</div>

<div class="activity" style="padding-left:100px;padding-right:100px;padding-top:20px;padding-bottom:100px;width: 500px;background: #ffffff;margin-left:auto;margin-right:auto;border:1px solid #000">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
      <div class="message center">
            <?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>

          <br>
          <br>
          <div style="float: right;margin: -14px;font-size: 130%">
            <?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
 &nbsp&nbsp <?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
 &nbsp
          </div>
      <button class="delete_message" message_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['message_id'];?>
" style="cursor:pointer;margin-top: 20px;width:120px;height:30px;background-color: #D3D3D3">删除留言</button>
      </div>
    <?php } ?>
  

</div>

<script type="text/javascript">

$(document).ready(function() {
  $('.delete_message').click(function() {
    var message_id = $(this).attr('message_id');
    $.get('/manager/ajaxDeleteMessage',{message_id:message_id}, function(jdata) {
      if(jdata['status'] != 200) {
        alert(jdata['data']);
      }else {
        alert(jdata['data']);
        window.location.reload();
      }
    },'json');
  });


});

</script>
</body>
</html><?php }} ?>
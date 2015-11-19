<?php /* Smarty version Smarty-3.1.7, created on 2015-11-16 10:06:03
         compiled from "C:\Users\Administrator\Desktop\football\views\mgr\admin\activity_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180345631e4524095b4-73276017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a460cf5548abf762164345a4838b8f6987df8e1a' => 
    array (
      0 => 'C:\\Users\\Administrator\\Desktop\\football\\views\\mgr\\admin\\activity_detail.tpl',
      1 => 1447495309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180345631e4524095b4-73276017',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5631e452614d3',
  'variables' => 
  array (
    'activity' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5631e452614d3')) {function content_5631e452614d3($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <a href="" class="b-a1">新闻动态</a>
  </li>
  <li class="b-nav">
    <a href="" class="b-a1">留言板</a>
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
    <h1  class="center">公告:<?php echo $_smarty_tpl->tpl_vars['activity']->value['title'];?>
</h1>
    <br>
    <h3 class="center">发布时间: <?php echo $_smarty_tpl->tpl_vars['activity']->value['date'];?>
</h3>
    <br>
    <div style="border:1px solid #000;padding-top:20px;padding-left:50px;padding-bottom:50px;padding-right:50px">
        <span style="font-family:黑体;color:#000;letter-spacing:3px;font-size:18px;font-weight:700"><?php echo $_smarty_tpl->tpl_vars['activity']->value['content'];?>

        </span>
        <br>
        <br>
        <?php if ($_smarty_tpl->tpl_vars['activity']->value['if_file']==1){?>
          <button style="width:150px;height:30px">
            <a class="download" activity_id="<?php echo $_smarty_tpl->tpl_vars['activity']->value['activity_id'];?>
" href="/admin/download?file=<?php echo $_smarty_tpl->tpl_vars['activity']->value['file'];?>
" target="_blank">下载附件</a>
          </button>
        <?php }else{ ?>
          
        <?php }?>
        <div style="clear:both"></div>
        <br>
        <button style="width:150px;height:30px;cursor:pointer" id="apply" activity_id="<?php echo $_smarty_tpl->tpl_vars['activity']->value['activity_id'];?>
">报名</button>
    </div>
</div>

<script type="text/javascript">


$(document).ready(function() {
  $('#apply').click(function() {
    var activity_id = $(this).attr('activity_id');
    $.get('/admin/ajaxApply',{activity_id:activity_id}, function(jdata) {
      if(jdata['status'] != 200) {
        alert(jdata['data']);
        return;
      }else {
        alert(jdata['data']);  
      }
    },'json');
  });
});

$(document).ready(function() {
  $('.download').live('click',function() {
    var activity_id = $(this).attr('activity_id');
    $.get('/admin/ajaxDownload',{activity_id:activity_id},function(jdata) {
      if(jdata['status'] != 200) {
        alert(jdata['data']);
        return;
      }else {
        var file = jdata['data'];
        // alert(file);return;
        window.open('/admin/download?file='+file);
      }
    },'json');
  });
});

</script>
</body>
</html><?php }} ?>
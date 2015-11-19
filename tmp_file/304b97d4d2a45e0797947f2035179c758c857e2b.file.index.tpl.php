<?php /* Smarty version Smarty-3.1.7, created on 2015-11-18 18:01:07
         compiled from "C:\Users\Administrator\Desktop\football\views\mgr\manager\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210156307856d4c380-64766434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '304b97d4d2a45e0797947f2035179c758c857e2b' => 
    array (
      0 => 'C:\\Users\\Administrator\\Desktop\\football\\views\\mgr\\manager\\index.tpl',
      1 => 1447840866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210156307856d4c380-64766434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_56307856e5dac',
  'variables' => 
  array (
    'activities' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56307856e5dac')) {function content_56307856e5dac($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动详情</title>
<link href="/static/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/css/css.css" type="text/css" rel="stylesheet" />
<script src="/static/js/jquery.js" type="text/javascript"></script>
<style>
div.center{
  margin-left:auto;
  margin-right:auto;
}
h1,h2,h3.center{
  text-align: center;
}

.notice{
  float:left;
  border:1px solid #000;
  padding-left:20px;
  padding-top: 20px;
  width: 20%;
  height: 280px;
}

.activities{
  float:left;
  border:1px solid #000;
  margin-left: 30px;
  width: 70%;
  padding-left: 20px;
  padding-top:20px;
  height: 280px;
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

<div class="center" style="max-width:50%;min-height:300px;background:#fff">
    <div class="notice">
      <h3 class="new_activity" style="cursor:pointer">新增活动</h3>
      <h3 class="">活动报名批量上传<h3>
    </div>
    <div class="activities">
      <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
      <h3><span class="activity" style="cursor:pointer" href="/manager/activityDetailForManager?activity_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['activity_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</span> <span class="delete" style="cursor:pointer" activity_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['activity_id'];?>
">删除</span></h3>
      <?php } ?>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('.activity').click(function() {
    window.location = $(this).attr('href');
  });

  $('.delete').click(function() {
    var activity_id = $(this).attr('activity_id');

    if(confirm('确认删除？')) {
      $.post('/manager/ajaxDeleteActivity',{activity_id:activity_id},function(jdata) {
        if(jdata['status'] != 200) {
          alert('删除失败');
        }else {
          alert('删除成功');
          location.reload();
        }
      },'json');
    }
  });

  $('.new_activity').click(function() {
    window.location = '/manager/newActivity';
  });



});

</script>
</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.7, created on 2015-11-18 20:48:54
         compiled from "C:\Users\Administrator\Desktop\football\views\mgr\manager\new_activity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:977656307860733dd1-68078854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9743167c31edf04edca5ff0119d9c74fad0194f8' => 
    array (
      0 => 'C:\\Users\\Administrator\\Desktop\\football\\views\\mgr\\manager\\new_activity.tpl',
      1 => 1447850933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '977656307860733dd1-68078854',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_563078607b8af',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563078607b8af')) {function content_563078607b8af($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发布活动</title>
<link href="/static/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/css/css.css" type="text/css" rel="stylesheet" />
<script src="/static/js/jquery.js" type="text/javascript"></script>
<style>
div.center{
  margin-left:auto;
  margin-right:auto;
  padding: 50px;
  text-align: center;
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
    <input type="text" class="title" placeholder="请输入标题"  style="border:1px solid #000;font-size:20px;width:500px" />
    <br>
    <textarea cols=50 rows=10 class="content" placeholder="请输入内容" style="margin-top:30px;border:1px solid #000;width:500px;overflow-y:visible;font-size:20px"></textarea>
    <br>
    <input type="file" class="upload_file" style="width:200px" />
</div>
<script type="text/javascript">

</script>
</body>
</html><?php }} ?>
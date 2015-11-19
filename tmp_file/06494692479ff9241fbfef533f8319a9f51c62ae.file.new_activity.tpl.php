<?php /* Smarty version Smarty-3.1.7, created on 2015-10-09 12:14:00
         compiled from "C:\Users\pianweiwan\Desktop\football\views\mgr\manager\new_activity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1578756173bc741f067-32590911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06494692479ff9241fbfef533f8319a9f51c62ae' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\football\\views\\mgr\\manager\\new_activity.tpl',
      1 => 1444364024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1578756173bc741f067-32590911',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_56173bc746487',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56173bc746487')) {function content_56173bc746487($_smarty_tpl) {?><!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主页</title>
<link href="/static/css/style.css" rel="stylesheet" type="text/css" />
<script src="/static/js/swfobject_modified.js" type="text/javascript"></script>
<script src="/static/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<div id="bg">
  <div id="box">
    <div id="top"></div>
    <div id="left">
      <div id="left-menu"><img src="/static/images/index24.gif" width="84" height="14" /><br />
        <!-- <a href="login_admin.php" class="link01"></a><br /> -->
        <a href="reg.php" class="link01">新用户注册</a></div>
      <div id="left-pic"><img src="/static/images/index25.gif" width="130" height="163" /></div>
    </div>
    <div id="main">
      <div id="banner"><img src="/static/images/index26.gif" width="429" height="15" /><br />
        <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="804" height="72">
          <param name="movie" value="/static/images/top_img.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="8.0.35.0" />
          <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
          <param name="expressinstall" value="/static/js/expressInstall.swf" />
          <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="/static/images/top_img.swf" width="804" height="72">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="8.0.35.0" />
            <param name="expressinstall" value="/static/js/expressInstall.swf" />
            <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
            <div>
              <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
              <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
        </object>
        <img src="/static/images/index27.gif" width="169" height="21" /></div>
      <div id="main-border">
        <div id="title1">发布新活动</div>
        <div id="reg-bg">
          <div id="reg">
              <input id="title" style="height:30px" placeholder="活动标题"/>
              </br>
              </br>
              <textarea id="content" style="width:400px;height:200px;"placeholder="活动内容"></textarea>
              </br>
              </br>
              <button id="release" style="width:100px;height:30px;">发布</button>
          
          </div>
        </div>
      </div>
    </div>
    <div id="bottom-link">网站首页&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
      社区资源&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
      社区博客&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
      活动相册&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
  </div>
</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");

$(document).ready(function() {
  $('#release').click(function() {
    var title = $('#title').val();
    var content = $('#content').val();
    $.get('/manager/ajaxAddActivity',{title:title, content:content}, function(jdata) {
      if(jdata['status'] != 200) {
        alert(jdata['data']);
        return;
      }else {
        alert(jdata['data']);  
      }
    },'json');
  });
});

</script>
</body>
</html><?php }} ?>
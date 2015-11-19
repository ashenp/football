<?php /* Smarty version Smarty-3.1.7, created on 2015-10-14 14:48:12
         compiled from "C:\Users\pianweiwan\Desktop\football\views\mgr\admin\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30934561710f766b3d3-91408304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5b46afe328b559770bc206233b64150ab3e35b' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\football\\views\\mgr\\admin\\login.tpl',
      1 => 1444805291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30934561710f766b3d3-91408304',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_561710f76945a',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561710f76945a')) {function content_561710f76945a($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<link href="/static/css/style.css" rel="stylesheet" type="text/css" />
<script src="/static/js/swfobject_modified.js" type="text/javascript"></script>
<script src="/static/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<div id="bg">
  <div id="box">
    <div id="top">
      
    </div>
    <div id="left">
      <div id="left-menu"><img src="/static/images/index24.gif" width="84" height="14" /><br />
        <a href="reg.php" class="link01"></a></div>
        <a href="/admin/regPage" class="link01">&nbsp新用户注册</a>
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
        <div id="title1">用户登录</div>
        <div id="login-bg">
          <div id="login">
            
             <input type="image" name="button1" id="button1" src="/static/images/index35.gif" />
              用户名：
              <input type="text" name="uname" id="uname" />
              <br />
              密　码：
              <input type="password" name="upass" id="upass" />
              <br />
              <br />
              <a id='login'><img src="/static/images/index36.gif" width="263" height="22" /></a> <br />
              <a href="reg.php"><img src="/static/images/index37.gif" width="263" height="22" />
              </a>
          </div>
          <div id="login-right">
            <object id="FlashID3" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="300" height="250">
              <param name="movie" value="/static/images/banner.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="8.0.35.0" />
              <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
              <param name="expressinstall" value="/static/js/expressInstall.swf" />
              <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="/static/images/banner.swf" width="300" height="250">
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
swfobject.registerObject("FlashID3");


$(document).ready(function() {
	$('#button1').click(function() {
		var email = $('#uname').val();
		var password = $('#upass').val();
		$.get('/admin/ajaxCheckLogin',{email:email,password:password}, function(jdata) {
		  if(jdata['status'] != 200) {
        alert(jdata['data']);
      }else {
        window.location.href = '/admin/index';
      }
		},'json');
	});
});

</script>
</body>
</html>
<?php }} ?>
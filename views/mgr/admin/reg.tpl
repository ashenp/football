<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新用户注册</title>
<link href="/static/css/style.css" rel="stylesheet" type="text/css" />
<script src="/static/js/swfobject_modified.js" type="text/javascript"></script>
<script src="/static/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function checkReg() {
	if($('#uname1').val() == '') {
		alert('用户名不能为空');
		return false;
	}
	if($('#upass1').val() == '') {
		alert('密码不能为空');
		return false;
	}
	if($('#upass2').val() == '') {
		alert('密码不能为空');
		return false;
	}
	if($('#upass1').val() != $('#upass2').val()) {
		alert('两次输入的密码不一致');
		return false;
	}
	if($('#email').val() == '') {
		alert('邮箱不能为空');
		return false;
	}
	if($('#answer').val() == '') {
		alert('密码答案不能为空');
		return false;
	}
}
</script>
</head>
<body>
<div id="bg">
  <div id="box">
    <div id="top">
      
    </div>
    <div id="left">
      <div id="left-menu"><img src="/static/images/index24.gif" width="84" height="14" /><br />
        </div>
      <div id="left-pic"><img src="/static/images/index25.gif" width="130" height="163" /></div>
    </div>
    <div id="main">
      <div id="banner"><img src="/static/images/index26.gif" width="429" height="15" /><br />
        <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="804" height="72">
          <param name="movie" value="images/top_img.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="8.0.35.0" />
          <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
          <param name="expressinstall" value="/static/js/expressInstall.swf" />
          <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="images/top_img.swf" width="804" height="72">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="8.0.35.0" />
            <param name="expressinstall" value="../Scripts/expressInstall.swf" />
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
        <!-- <div id="title1">新用户注册</div> -->
        <div id="reg-bg">
          <div id="reg">
            <form action="/admin/addUser" method="POST" name="form1" id="form1" onsubmit="return checkReg()">
              <ul>
                <li>用户名称：
                  <input type="text" name="username" id="uname1" />
                  <span class="font01">*</span>必填，可以是中文、英文或数字的任意组合</li>
                <li>密　　码：
                  <input type="password" name="password" id="upass1" />
                <span class="font01">*</span>必填，最少6个字符</li>
                <li>确认密码：
                  <input type="password" name="password" id="upass2" />
                  <span class="font01">*</span>必填，再次输出用户密码，两次输入需要一致</li>
                <li>真实姓名：
                  <input type="text" name="realname" id="truename" />
                </li>
                <li>姓　　别：
                <input name="sex" type="radio" id="radio" value="1" checked />
                男
                <input type="radio" name="sex" id="radio" value="0" />
                女</li>
                <li>电子邮箱：
                  <input type="text" name="email" id="email" />
                <span class="font01">*</span>必填,使用邮箱登录</li>
                <li>联系电话：
                  <input type="text" name="mobile" id="phone" />
                </li>
                <li>联系地址：
                  <input type="text" name="address" id="adress" />
                </li>
                <li>密码问题：
                  <select name="question" id="question">
                    <option value="你小学的学校名">你小学的学校名</option>
                    <option value="你中学的学校名">你中学的学校名</option>
                    <option value="你大学的学校名">你大学的学校名</option>
                  </select>
                  <span class="font01">*</span>必填，找回密码用
                  </li>
                <li>问题答案：
                <input type="text" name="answer" id="daan" />
                <span class="font01">*</span>必填，找回密码用
                </li>
              </ul>
              <input type="image" name="button2" id="button2" src="/static/images/index39.gif" /><input type="image" name="button3" id="button3" src="/static/images/index40.gif" onclick="javascript:document.form1.reset();return false" />
            </form>
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
</script>
</body>
</html>
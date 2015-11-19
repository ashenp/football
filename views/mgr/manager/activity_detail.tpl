<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
        <div id="title1">活动详情</div>
        <div id="reg-bg">
          <div id="reg">
            <h2>{$activity['title']}</h2>
            </br>
            </br>
            <span><b>活动内容:</b></span><p>{$activity['content']}</p>
            </br>
            </br>
            <h3>报名用户列表</h3>
            <tr>
              <th>用户名</th>
              <th>真实姓名</th>
              <th>性别</th>
              <th>邮箱</th>
              <th>手机号</th>
            </tr>
            {foreach from=$appliers item=applier}
              </br>
              <tr>
                <td>{$applier['username']}</td>
                <td>{$applier['realname']}</td>
                <td>{if $applier['sex'] == '1'}男{else}女{/if}</td>
                <td>{$applier['email']}</td>
                <td>{$applier['mobile']}</td>
              </tr>

            {/foreach}
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
{literal}
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
{/literal}
</script>
</body>
</html>
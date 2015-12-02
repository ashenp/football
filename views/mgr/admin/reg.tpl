<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <a href="/admin/message" class="b-a1">留言板</a>
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
    <div class="center">
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
              <input type="text" name="answer" class="answer" id="adress" />
              <span class="font01">*</span>必填，找回密码用
              </li>
            </ul>
            <input type="image" name="button2" id="button2" src="/static/images/index39.gif" /><input type="image" name="button3" id="button3" src="/static/images/index40.gif" onclick="javascript:document.form1.reset();return false" />
          </form>
    </div>
</div>

<script type="text/javascript">
{literal}
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
    alert('确认密码不能为空');
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
  if($('.answer').val() == '') {
    alert('密码答案不能为空');
    return false;
  }
}
{/literal}
</script>
</body>
</html>


           

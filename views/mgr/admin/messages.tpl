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
    {foreach from=$messages item=item}
      <div class="message center">
            {$item['content']}
          <br>
          <br>
          <div style="float: right;margin: -14px;font-size: 130%">
            {$item['username']} &nbsp&nbsp {$item['date']} &nbsp
          </div>
      </div>
    {/foreach}
  

    <div class="leave_message center">
      <textarea id="message_content" name="content" cols=50 rows=10 class="content" placeholder="请输入内容,最多255个字符" style="margin-top:30px;border:1px solid #000;width:520px;overflow-y:visible;font-size:20px"></textarea>
      <br>
      <button class="submit_message" type="button" style="margin-left: 180px;margin-top: 20px;width:120px;height:30px;background-color: #D3D3D3">发布留言</button>
    </div>
</div>

<script type="text/javascript">
{literal}
$(".submit_message").click(function() {
  var message = $('#message_content').val();
  if(message == '') {
    alert('留言不能为空');
    return false;
  }
  if(message.length > 255) {
    alert('留言不能超过255个字符');
    return false;
  }

  $.get('/admin/ajaxLeaveMessage',{message:message}, function(jdata) {
    if(jdata['status'] != 200) {
      alert(jdata['data']);
    }else {
      alert(jdata['data']);
      window.location.reload();
    }
  },'json ');


});
{/literal}
</script>
</body>
</html>
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
    {foreach from=$messages item=item}
      <div class="message center">
            {$item['content']}
          <br>
          <br>
          <div style="float: right;margin: -14px;font-size: 130%">
            {$item['username']} &nbsp&nbsp {$item['date']} &nbsp
          </div>
      <button class="delete_message" message_id="{$item['message_id']}" style="cursor:pointer;margin-top: 20px;width:120px;height:30px;background-color: #D3D3D3">删除留言</button>
      </div>
    {/foreach}
  

</div>

<script type="text/javascript">
{literal}
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
{/literal}
</script>
</body>
</html>
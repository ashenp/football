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
    <h1  class="center">公告:{$activity['title']}</h1>
    <br>
    <h3 class="center">发布时间: {$activity['date']}</h3>
    <br>
    <div style="border:1px solid #000;padding-top:20px;padding-left:50px;padding-bottom:50px;padding-right:50px">
        <span style="font-family:黑体;color:#000;letter-spacing:3px;font-size:18px;font-weight:700">{$activity['content']}
        </span>
        <br>
        <br>
        {if $activity['if_file'] == 1}
          <button style="width:150px;height:30px">
            <a class="download" activity_id="{$activity['activity_id']}" href="/admin/download?file={$activity['file']}" target="_blank">下载附件</a>
          </button>
        {else}
          
        {/if}
        <div style="clear:both"></div>
        <br>
        <button style="width:150px;height:30px;cursor:pointer" id="apply" activity_id="{$activity['activity_id']}">报名</button>
    </div>
</div>

<script type="text/javascript">

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
{/literal}
</script>
</body>
</html>
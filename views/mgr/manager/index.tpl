<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动列表</title>
<link href="/static/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/css/css.css" type="text/css" rel="stylesheet" />
<script src="/static/js/jquery.js" type="text/javascript"></script>
<style>

div.center{
  margin-left:auto;
  margin-right:auto;

  max-width:50%;
 /* min-height:300px;
  height:auto!important; 
  height:300px;*/
  background-color: #fff;
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
  background-color: #fff;
}

.activities{
  float:left;
  border:1px solid #000;
  margin-left: 30px;
  width: 70%;
  padding-left: 20px;
  padding-top:20px;
  background-color: #fff;
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

<div class="center">
    <div class="notice">
      <h3 class="new_activity" style="cursor:pointer">新增活动</h3>
      <h3 class="">活动报名批量上传<h3>
      <h3><a href="/manager/logout">管理员退出登录</a></h3>
    </div>
    <div class="activities">
      {foreach from=$activities item=item}
      <h3><span class="activity" style="cursor:pointer" href="/manager/activityDetailForManager?activity_id={$item['activity_id']}">{$item['title']}</span> <span class="delete" style="cursor:pointer" activity_id="{$item['activity_id']}">删除</span></h3>
      {/foreach}
    </div>
</div>
{literal}
<script type="text/javascript">
$(document).ready(function() {
    var height = $('.activities').css('height');
    $('.notice').css('height',height);
  });

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
{/literal}
</script>
</body>
</html>
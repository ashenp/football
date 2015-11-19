<?php /* Smarty version Smarty-3.1.7, created on 2015-10-09 11:59:13
         compiled from "C:\Users\pianweiwan\Desktop\football\views\mgr\manager\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28603561732f4ed44c4-92143362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df67bcb1e187fea01b25ef93f1da144ab1e3188a' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\football\\views\\mgr\\manager\\index.tpl',
      1 => 1444362988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28603561732f4ed44c4-92143362',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_561732f505281',
  'variables' => 
  array (
    'activities' => 0,
    'activity' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561732f505281')) {function content_561732f505281($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
        <a href="/manager/newActivity" class="link01">发布新活动</a><br />
        <!-- <a href="login_admin.php" class="link01">管理员登陆</a><br /> -->
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
        <div id="title1">活动列表</div>
        <div id="reg-bg">
          <div id="reg">
            <table border=200>
            <tr><th style="padding-right:280px">活动</th>&nbsp&nbsp<th style="padding-right:300px">时间</th><th>操作</th></tr>
              <?php  $_smarty_tpl->tpl_vars['activity'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['activity']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['activity']->key => $_smarty_tpl->tpl_vars['activity']->value){
$_smarty_tpl->tpl_vars['activity']->_loop = true;
?>
                <tr><td><a href="/manager/activityDetailForManager?activity_id=<?php echo $_smarty_tpl->tpl_vars['activity']->value['activity_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['activity']->value['title'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['activity']->value['date'];?>
</td>
                <td><a class="delete" activity_id="<?php echo $_smarty_tpl->tpl_vars['activity']->value['activity_id'];?>
" style="cursor:pointer">删除</a></td>
                </tr>
              <?php } ?>
            </table>          
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
      $('.delete').click(function() {
         var activity_id = $(this).attr('activity_id');
         $.get('/manager/ajaxDeleteActivity',{activity_id:activity_id},function(jdata) {
            if(jdata['status'] != 200) {
              alert(jdata['data']);
            }else {
              alert(jdata['data']);
              location.reload(true);   
            }
         },'json');
      });
  });

</script>
</body>
</html><?php }} ?>
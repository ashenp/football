<?php /* Smarty version Smarty-3.1.7, created on 2015-10-29 17:18:05
         compiled from "C:\Users\Administrator\Desktop\football\views\mgr\admin\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32290562ef6736a9543-32123392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c94ea873666ddd4e2fef5caff19cbf1fbc5b0b7a' => 
    array (
      0 => 'C:\\Users\\Administrator\\Desktop\\football\\views\\mgr\\admin\\index.tpl',
      1 => 1446110277,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32290562ef6736a9543-32123392',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_562ef6736ebbd',
  'variables' => 
  array (
    'activities' => 0,
    'i' => 0,
    'if_log' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562ef6736ebbd')) {function content_562ef6736ebbd($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Running Man</title>
<link href="/static/css/css.css" type="text/css" rel="stylesheet" />
<script src="/static/js/jquery.js"></script>
</head>
<script type="text/javascript">

//获取ID
var $ = function (id) {return typeof id === "string" ? document.getElementById(id) : id};
//获取tagName
var $$ = function (tagName, oParent) {return (oParent || document).getElementsByTagName(tagName)};
//自动播放对象
var AutoPlay = function (id) {this.initialize(id)};
AutoPlay.prototype = {
  initialize: function (id)
  {
    var oThis = this;
    this.oBox = $(id);
    this.oUl = $$("ul", this.oBox)[0];
    this.aImg = $$("img", this.oBox);
    this.timer = null;
    this.autoTimer = null;
    this.iNow = 0;
    this.creatBtn();
    this.aBtn = $$("li", this.oCount);
    this.toggle();
    this.autoTimer = setInterval(function ()
    {
      oThis.next()
    }, 3000);
    this.oBox.onmouseover = function ()
    {
      clearInterval(oThis.autoTimer)
    };
    this.oBox.onmouseout = function ()
    {
      oThis.autoTimer = setInterval(function ()
      {
        oThis.next()
      }, 3000)
    };
    for (var i = 0; i < this.aBtn.length; i++)
    {
      this.aBtn[i].index = i;
      this.aBtn[i].onmouseover = function ()
      {
        oThis.iNow = this.index;
        oThis.toggle()
      }
    }
  },
  creatBtn: function ()
  {
    this.oCount = document.createElement("ul");
    this.oFrag = document.createDocumentFragment();
    this.oCount.className = "count";
    for (var i = 0; i < this.aImg.length; i++)
    {
      var oLi = document.createElement("li");
      oLi.innerHTML = i + 1;
      this.oFrag.appendChild(oLi)
    }
    this.oCount.appendChild(this.oFrag);
    this.oBox.appendChild(this.oCount)
  },
  toggle: function ()
  {
    for (var i = 0; i < this.aBtn.length; i++) this.aBtn[i].className = "";
    this.aBtn[this.iNow].className = "current";
    this.doMove(-(this.iNow * this.aImg[0].offsetHeight))
  },
  next: function ()
  {
    this.iNow++;
    this.iNow == this.aBtn.length && (this.iNow = 0);
    this.toggle()
  },
  doMove: function (iTarget)
  {
    var oThis = this;
    clearInterval(oThis.timer);
    oThis.timer = setInterval(function ()
    {
      var iSpeed = (iTarget - oThis.oUl.offsetTop) / 5;
      iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);
      oThis.oUl.offsetTop == iTarget ? clearInterval(oThis.timer) : (oThis.oUl.style.top = oThis.oUl.offsetTop + iSpeed + "px")
    }, 30)
  }
};
window.onload = function ()
{
  new AutoPlay("box_wwwzzjsnet");
};

// 登录按钮事件
jQuery.noConflict();
jQuery(document).ready(function() {
    jQuery('#login_button').click(function() {
        var email = jQuery('#email_input').val();
        var password = jQuery('#password_input').val();
        jQuery.post('/admin/ajaxCheckLogin',{email:email,password:password},function(jdata) {
            // console.log(jdata);
            if(jdata['status'] != 200) {
              alert(jdata['data']);
            }else {
              window.location.href = '/admin/index';
            }
        },'json');
    });
});


</script>

<body>
<div class="banner">
  <img src="/static/images/banner.jpg" class="banner-top">
</div>
<div style="width:auto;margin:0px auto;background:#f8f8f8;height:42px;margin-top:0px;">
<div class="b-daohang">
  <ul class="b-menu" style="margin-left: 50px;">
    <li class="b-nav">
    <a href="" class="b-a1">首页</a>
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
  </pc>
  <div style="clear:both"></div>
  </ul>
</div>
</div>

<div class="b-banner">
  <div id="box_wwwzzjsnet">
  <div class="list">  
  <ul>
 
     <li><img src="/static/images/1.jpg" height="385px" width="960px"></li>
     <li><img src="/static/images/2.jpg" height="385px" width="960px"></li>
     <li><img src="/static/images/3.jpg" height="385px" width="960px"></li>
     <li><img src="/static/images/4.jpg" height="385px" width="960px"></li>
     <li><img src="/static/images/5.jpg" height="385px" width="960px"></li>
</ul>
</div>
  </div>
</div>

<div class="bj-bj">
  <div class="b-shang">
    <div class="b-biao">  
      <a href="" class="b-a1"> &nbsp 大赛公告</a>
    </div>
    <div id="b-img" >
    <div class="list">
    <ul>
    <li><img src="/static/images/4paomadeng1.jpg" height="200px" width="350px"></li>
    </ul>
    </div>
    </div>
    <div class="b-size" style="width: 350px;">
    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
       <a href="/admin/activityDetailForUser?activity_id=<?php echo $_smarty_tpl->tpl_vars['i']->value['activity_id'];?>
" class="b-a2" style="margin-left:0px"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a>
    <?php } ?>
    </div>  
  </div>
  <div class="b-login">
  
  <center>
  <br/>
  <?php if ($_smarty_tpl->tpl_vars['if_log']->value==0){?>
  <span class="b-a1" style="float:left" >用户名</span>
  <input id="email_input" type="text">
  <br/>
  <span class="b-a1" style="float:left" >
  密码
  </span>
  <input id="password_input" type="password">
  <br/> 
  <button id='login_button'style="width:110px;margin-top:10px;">登录</button>
  <br/><a href="/admin/regPage" class="b-a1">还没有账号？马上去注册</a>
  <?php }elseif($_smarty_tpl->tpl_vars['if_log']->value==1){?>
  <span class="b-a1" style="float:left;margin-top:90px" ><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
,欢迎登录</span>
  <a href="/admin/logout" class="b-a1">退出登录</a>
  <?php }?>
  
  </center>
  </div>
</div>  

<div class="bj-zan">
 <a href="" class="b-a1" > &nbsp 主办单位</a>
</div>



</body>
</html>
<?php }} ?>
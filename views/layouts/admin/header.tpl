<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>PHP FF框架管理中心</title>
	
	<link rel="stylesheet" href="{staticurl action="admin/layout.css" type="css"}" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="{staticurl type="css" action="admin/ie.css"}" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="{staticurl type="js" action ="admin/jquery-1.5.2.min.js"}" type="text/javascript"></script>
	<script src="{staticurl type="js" action ="admin/hideshow.js"}" type="text/javascript"></script>
	<script src="{staticurl type="js" action ="admin/jquery.tablesorter.min.js"}" type="text/javascript"></script>
	<script type="text/javascript" src="{staticurl type="js" action ="admin/jquery.equalHeight.js"}"></script>
	
	
	
	{literal}
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
{/literal}
</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="{mgrurl action="admin/index"}">PHP FF框架管理中心</a></h1>
			<h2 class="section_title">version 1.0</h2><div class="btn_view_site"><a href="http://www.ff.com">查看前台</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin ! 欢迎您登录本系统</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="{mgrurl action="admin/index"}">管理中心</a> <div class="breadcrumb_divider"></div> <a class="current">管理面板</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
		{literal}
			<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
			{/literal}
		</form>
		<hr/>
		<h3>文章管理</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="{mgrurl action="article/add"}">发布新文章</a></li>
			<li class="icn_edit_article"><a href="{mgrurl action="article/list"}">文章列表</a></li>
			<li class="icn_categories"><a href="{mgrurl action="article/category/add"}">文章分类</a></li>
			<li class="icn_tags"><a href="#">文章标签</a></li>
		</ul>
		<h3>网站用户</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">新增用户</a></li>
			<li class="icn_view_users"><a href="#">查看用户</a></li>
			<li class="icn_profile"><a href="#">我的档案</a></li>
		</ul>
		<h3>工具管理</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">文件管理</a></li>
			<li class="icn_photo"><a href="#">相册管理</a></li>
			<li class="icn_audio"><a href="#">我的音乐</a></li>
			<li class="icn_video"><a href="#">我的视频</a></li>
		</ul>
		<h3>系统设置</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">网站设置</a></li>
			<li class="icn_security"><a href="#">安全设置</a></li>
			<li class="icn_jump_back"><a href="#">退出系统</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2012 PHP FF 快速开发框架</strong></p>
			<p>Author: <a href="#">Genobili</a> </p>
		</footer>
	</aside><!-- end of sidebar -->
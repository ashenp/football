<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='UTF-8'>
	<title>{$username}的主页</title>
	<link rel="stylesheet" type="text/css" href="/static/CSS/normalize.css">
	<link rel="stylesheet" type="text/css" href="/static/CSS/main.css">
	<style type="text/css">
		.main-wrapper{
			/*background: #444 url(/static/IMAGE/blog/banner_x.jpg);*/
			background: #444 url({staticurl path="/IMAGE/blog/banner_x.jpg"});
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
		}
	</style>
</head>
<body>
	<div class="main-wrapper">
		<header>
			<nav>
				<div class="logo"><a href="#">{$username}</a></div>
				<ul>
					<li><a class="active" href="">文章</a></li>
					<li><a href="">心情</a></li>
					<li><a href="">相册</a></li>
					<li><a href="/user/actionSetting">设置</a></li>	
					<li><a href="/user/logout">退出</a></li>
				</ul>
			</nav>
			<div id="banner">
				<div class="inner">
					<h1>{$introduction['subject']}</h1>
					<p class="sub-heading">{$introduction['content']}
					</p>
					<button>了解我</button>
					<div class="more">
						更多
					</div>
				</div>
			</div>
		</header>
	<footer></footer>
	</div>
</body>
</html>
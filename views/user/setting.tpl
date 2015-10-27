<!DOCTYPE html>
<html>
<head>
	<title>个人设置</title>
	<link rel="stylesheet" type="text/css" href="/static/CSS/normalize.css">
	<style type="text/css">
		body{
			margin: 0;
		}
		.selection{
			float: left;
			background: #333;
			padding-top: 200px;
			width: 200px;
			height: 800px;
			color: #fff;
		}
		.choice{
			width: 100%;
			height: 40px;
			background: #333;
			text-align: center;
			line-height: 40px;
			font-size: 19px;
			border-bottom: 1px solid #333;
			cursor: pointer;
		}
		.choice.active{
			background: #A4A4A4;
		}
	    .entry-trangle{
	    	margin-top: 7px;
	        position:absolute;
	        margin-left: 193px;
	        width:0;
	        height:0;
	        border-top:7px solid transparent;
	        border-bottom:7px solid transparent;
	        border-right:7px solid #333;
	    }
	    .content{
	    	width: 800px;
	    	min-height: 500px;
			float: left;
			border: 2px solid red;
			margin: 100px;
	    }
	
		.basic_info{
			color: #666;
			padding-top: 100px;
			/*display: none;*/
		}

		.line{
			min-height: 50px;
			padding-left: 20px;
			font-size: 15px;	
		}

		.line .name{
			min-height: 50px;
			min-width: 15%;
			float: left;
			padding-right: 20px;
			line-height: 50px;
			text-align: right;			
		}

		.line .value{
			min-height: 50px;
			width: 70%;
			float: left;
			padding-left: 20px;
			line-height: 50px;
		}

		.hr{
			height: 1px;
			width: 100%;
			background: #333;
		}

		.extra_info{
			color: #666;
			padding-top: 100px;
			display: none;
		}
	</style>
</head>
<body>
	<div class='wrapper'>
		<div class='selection'>
			<div class="choice active" action='basic_info' >
				<div class='entry-trangle'></div>
				基本信息
			</div>
			<div class="choice" action='extra_info'>
				<div class='entry-trangle'></div>
				扩展信息
			</div>
			<div class="choice" action='main_subject'>
				<div class='entry-trangle'></div>
				首页主题
			</div>
			<div class="choice" action='social_network'>
				<div class='entry-trangle'></div>
				社交网络
			</div>
		</div>
		<div class="content">
			<div class="basic_info tab">
				<div class="hr"></div>
				<div class='line'>
					<div class="name">
						用户名
					</div>
					<div class='value'>
						{$basic['username']}
					</div>
				</div>
				<div class="hr"></div>
				<div class='line'>
					<div class="name">
						邮箱
					</div>
					<div class='value'>
						{$basic['email']}
					</div>
				</div>
				<div class="hr"></div>
				<div class='line'>
					<div class="name">
						手机号
					</div>
					<div class='value'>
						{if $basic['mobile'] == ''}
						您还未绑定手机 &nbsp&nbsp&nbsp<a> 绑定手机 </a>
						{else}
						{$basic['mobile']}
						{/if}
					</div>
				</div>
				<div class="hr"></div>
				<div class='line'>
					<div class="name">
						注册时间
					</div>
					<div class='value'>
						{$basic['create_time']}
					</div>
				</div>
				<div class="hr"></div>
			</div>
			<div class='extra_info tab'>
				<div class="hr"></div>
				<div class='line'>
					<div class="name">
						性别
					</div>
					<div class='value sex_choice'>
						<input type="radio" name='sex' value="1"/>男
						&nbsp&nbsp
						<input type="radio" name='sex' value="0"/>女
					</div>
				</div><div class="hr"></div>
				<div class='line'>
					<div class="name">
						生日
					</div>
					<div class='value'>
						{$basic['username']}
					</div>
				</div><div class="hr"></div>
				<div class='line'>
					<div class="name">
						用户名
					</div>
					<div class='value'>
						{$basic['username']}
					</div>
				</div>
			</div>
		</div>
	</div>
	

	
</body>
<script type="text/javascript" src="/static/JS/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.choice').click(function() {
			$('.choice').removeClass('active');
			$(this).addClass('active');
			$('.tab').hide();
			var tab = $(this).attr('action');
			$('.'+tab).show();
		});
	});
</script>
</html>









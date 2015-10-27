<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>激活您的账户</title>
<style type="text/css">
	.notetxt{
		border-radius: 5px;
		margin: 0px auto;
		padding-top: 13px;
		text-align: center;
		/*position: absolute;*/
		height: 30px;
		width: 370px;
		background: #CCCCCC;
		color: #C4573C;
		display: none;
		}
	body{
		background: #003366;
		color: #FFFFFF; 
	}
	.container{
		margin: 10px auto;
		width:700px;
	}
	.note{
		background: #336699;
		margin: 50px auto;
		border-radius: 20px;
		padding: 20px;
		width: 600px;
		height: 300px;
		text-align: center;
		font-size: 18px;
	}
	.input{
		width: 800px;
		margin: 10px auto;
		text-align: center;
		background: #000000;
	}
	.note input{
		margin-top: 10px;
		margin-left: 15px;
		height: 40px;
		font-size: 14px;
		border-radius: 2px;
		outline: 0px none;
		border: 1px solid #CCC;
		padding: 0px 10px;
		width: 180px;
		margin-bottom: 15px;
	}
	.button{
		border-radius: 4px;
		padding-top: 0.6em;
		padding-bottom: 0.6em;
		padding-left: 0.5em;
		padding-right: 0.5em; 
		border-style: solid;
		border-width: 0px;
		cursor: pointer;
		font-family: inherit;
		font-weight: bold;
		line-height: normal;
		margin: 10px 15px 1.25em;
		width: 80px;
		position: relative;
		text-decoration: none;
		text-align: center;
		display: inline-block;
		/*padding: 0.75em 1.5em 0.8125em;*/
		font-size: 1em;
		background-color: #2DAEBF;
		border-color: #238896;
		color: #FFF;
	}
</style>
<script type="text/javascript" src="/static/JS/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
{literal}
	$(document).ready(function(){
		$('#confirm_activate').click(function() {
			var uid = $('#uid').html();
			var password = $('#password_input').val();
			$.post('/user/ajaxActivateUser',{uid:uid,password:password},function(jdata) {
				if(jdata['status'] != 200){
					$('.notetxt').html(jdata['msg']);
					setTimeout("$('.notetxt').show()", 1000);
				}else {
					window.location.href = '/user/activateSuccessJump';
				}
			},'json');
		});
	});
{/literal}
</script>
</head>

<body>
	<div id='uid' style="display: none">{$uid}</div>
	<div class="container">
		<div class='note'>
			<h2>{$username} , 您好 , 欢迎注册!</h2>
			<h3>您的注册邮箱是: {$email}</h3>
			<h4>请在下方输入您的登录密码，完成注册过程</h4>
			<div class="notetxt">错误信息展示</div>
			<input id='password_input' type="password" placeholder='在此输入您的密码'>
			<a id='confirm_activate' class="button">确认激活</a>
		</div>
	</div>
	
</body>
</html>
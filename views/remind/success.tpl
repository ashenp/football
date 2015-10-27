<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>成功提示</title>
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
	.icon{
		margin: 40px auto;
		width: 125px;
		height: 125px;
	}
	.icon img{
		width: 100%;
		height: 100%;
	}
</style>
<script type="text/javascript" src="/static/JS/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var delay =$('#delay').html();
		if(delay != 0) {
			delay *= 1000;
			setTimeout("actionRedirect()", delay);
		}
	});
	function actionRedirect() {
		var redirectUrl = $('#redirect').html();
		if(redirectUrl != ''){
			window.location.href = redirectUrl;
		}
	}
</script>
</head>

<body>
	<div id='redirect' style="display: none">{$redirect}</div>
	<div id='delay' style="display: none">{$delay}</div>
	<div class="container">
		<div class='note'>
			<div class='icon'>
				<img src="/static/IMAGE/remind/success.png">
			</div>
			<h2>提示信息: {$msg}</h2>	
		</div>
	</div>
	
</body>
</html>
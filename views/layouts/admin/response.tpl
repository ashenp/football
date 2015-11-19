<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>错误提示 -- EPMS</title>
</head>
<body>
{literal}
<style type="text/css">
#messageBox{width:430px;color: #4f6b72; background-color:#FFF; margin:140px auto; height:170px;border:7px solid #C1DAD7; font-size:12px; overflow:hidden;}
#messageBox .messageTitle{height:28px; border-bottom:1px solid #C1DAD7; line-height:28px; text-indent:20px; font-weight:bold}
#messageBox .messageContent{background:url(/static/images/error.gif) no-repeat 40px 35px; height:150px;}
#messageBox .messageInfo{margin-left:120px; margin-top:40px; float:left; font-size:14px;  height:80px;}
</style>
{/literal}
		<div id="messageBox">
		<div class="messageTitle">错误提示</div>
		<div class="messageContent">
		<div class="messageInfo">{$msg}<p>
		<a href="{if $url == ''}javascript:history.go(-1){else}{$url}{/if}" style="color:#4f6b72; text-decoration:none">正在跳转,请稍后...</a>
		</p>
		</div>
		</div>
		</div>
		{if $url == ''}
		<script language="javascript">setTimeout('history.go(-1)', {$delay});</script>
        {else}
        <script language="javascript">setTimeout('window.location.href="{$url}"', {$delay});</script>
        {/if}
    </body>
    </html>
		
		
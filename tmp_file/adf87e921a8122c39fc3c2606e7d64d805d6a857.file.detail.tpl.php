<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 20:53:53
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\card\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190225616676155c446-16200556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adf87e921a8122c39fc3c2606e7d64d805d6a857' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\card\\detail.tpl',
      1 => 1444103289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190225616676155c446-16200556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'card' => 0,
    'value' => 0,
    'data' => 0,
    'type' => 0,
    'district_id' => 0,
    'province_id' => 0,
    'city_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_56166761c1b4e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56166761c1b4e')) {function content_56166761c1b4e($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
if (!is_callable('smarty_function_uploadurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.uploadurl.php';
?><?php echo $_smarty_tpl->getSubTemplate ('mgr/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="<?php echo smarty_function_staticurl(array('action'=>"my97/skin/WdatePicker.css",'type'=>"js"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<script src="<?php echo smarty_function_staticurl(array('action'=>"my97/WdatePicker.js"),$_smarty_tpl);?>
"></script>
<div class="main_right" >
<form method="POST" action="<?php echo smarty_function_mgrurl(array('action'=>"user/account"),$_smarty_tpl);?>
" onsubmit="return checkUser();" >
    <table>
        <tr class="thead">
            <th colspan="2">卡详情</th>
        </tr>
        <tr>
            <td class="w100">卡号</td>
            <?php if (isset($_smarty_tpl->tpl_vars['card']->value['data']['cardNo'])){?>
            <td><?php echo $_smarty_tpl->tpl_vars['card']->value['data']['cardNo'];?>
</td>
            <?php }?>
        </tr>
		<tr>
			<td class="w100">所属企业</td>
			<?php if (isset($_smarty_tpl->tpl_vars['card']->value['data']['companyName'])){?>
			<td><?php echo $_smarty_tpl->tpl_vars['card']->value['data']['companyName'];?>
</td>
			<?php }?>
		</tr>
		
		<tr>
			<td class="w100">所属项目</td>
			<?php if (isset($_smarty_tpl->tpl_vars['card']->value['data']['projectName'])){?>
			<td><?php echo $_smarty_tpl->tpl_vars['card']->value['data']['projectName'];?>
</td>
			<?php }?>
		</tr>
		<tr>
			<td class="w100">所属卡种</td>
			<?php if (isset($_smarty_tpl->tpl_vars['card']->value['data']['cardTypeName'])){?>
			<td><?php echo $_smarty_tpl->tpl_vars['card']->value['data']['cardTypeName'];?>
</td>
			<?php }?>
		</tr>
        <tr>
			<td class="w100">账户明细</td>
			<td>
				<table>
					<tr>
						<td>账户</td>
						<td>账户名称</td>
						<td>账户类别</td>
						<td>使用方式</td>
						<td>面额</td>
						<td>余额</td>
						<td>使用周期</td>
						<td>可充值</td>
						<td>每次可购买数</td>
						<td>上次消费后可订场</td>
						<td>状态</td>
						<td>充值次数</td>
						<td>使用次数</td>
						<td>操作</td>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['card']->value['data']['cardAccount']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                    <tr>
                      <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
</td>
                      <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['accountName'];?>
</td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['accountType']=='TIMES'){?><?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('次', null, 0);?>次<?php }else{ ?>现金<?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('元', null, 0);?><?php }?></td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['useMode']=='REMISSION'){?>减免<?php }?></td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['accountType']=='TIMES'){?><?php if ($_smarty_tpl->tpl_vars['value']->value['amount']==-1){?>无限<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['value']->value['amount'];?>
<?php }?>次<?php }else{ ?> <?php if ($_smarty_tpl->tpl_vars['value']->value['amount']==-1){?>无限<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['value']->value['amount']/100;?>
<?php }?>元<?php }?></td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['accountType']=='TIMES'){?><?php if ($_smarty_tpl->tpl_vars['value']->value['amount']==-1){?>无限<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['value']->value['balance'];?>
<?php }?>次<?php }else{ ?> <?php if ($_smarty_tpl->tpl_vars['value']->value['balance']==-1){?>无限<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['value']->value['balance']/100;?>
<?php }?>元<?php }?></td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['accountLifeCycle']==-1){?>不限制<?php }else{ ?><?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable(json_decode($_smarty_tpl->tpl_vars['value']->value['accountLifeCycle'],true), null, 0);?><?php if ($_smarty_tpl->tpl_vars['data']->value['cycle']==1){?>每天<?php }elseif($_smarty_tpl->tpl_vars['data']->value['cycle']==2){?>每周<?php }elseif($_smarty_tpl->tpl_vars['data']->value['cycle']==3){?>每月<?php }elseif($_smarty_tpl->tpl_vars['data']->value['cycle']==4){?>每年<?php }?><?php echo $_smarty_tpl->tpl_vars['data']->value['number'];?>
<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
<?php }?></td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['isRecharge']==1){?>是<?php }else{ ?>否<?php }?></td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['accountBuyNumber']==-1){?>无限<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['value']->value['accountBuyNumber'];?>
<?php }?>条</td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['accountLastConsumeRule']==0){?>否<?php }else{ ?>是<?php }?></td>
                      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['status']=='DISABLE'){?>冻结<?php }else{ ?>启用<?php }?></td>
                      <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['rechargeCount'];?>
</td>
                      <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['consumeCount'];?>
</td>
                      <td class="w100 center">
                        <?php if ($_smarty_tpl->tpl_vars['value']->value['status']!='NOTDISABLE'){?><a href="javascript:enable('<?php echo $_smarty_tpl->tpl_vars['value']->value['accountNo'];?>
');">启用</a><?php }else{ ?><a href="javascript:disable('<?php echo $_smarty_tpl->tpl_vars['value']->value['accountNo'];?>
');">冻结</a><?php }?>
                      </td>
                    </tr>
                    <?php } ?>
				</table>
			</td>
		</tr>
		<tr>
			<td class="w100">使用期限</td>
			<?php if (isset($_smarty_tpl->tpl_vars['card']->value['data']['useStartTime'])&&isset($_smarty_tpl->tpl_vars['card']->value['data']['useEndTime'])){?>
			<td><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['card']->value['data']['useStartTime']);?>
-----<?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['card']->value['data']['useEndTime']);?>
</td>
			<?php }?>
		</tr>
		<tr>
			<td class="w100">状态</td>
			<?php if (isset($_smarty_tpl->tpl_vars['card']->value['code'])&&$_smarty_tpl->tpl_vars['card']->value['code']==200){?>
			<td>已激活</td>
			<?php }else{ ?>
			<td>未激活</td>
			<?php }?>
			
		</tr>
		<tr>
			<td class="w100">激活时间</td>
			<?php if (isset($_smarty_tpl->tpl_vars['card']->value['data']['activeTime'])){?>
			<td><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['card']->value['data']['activeTime']);?>
</td>
			<?php }?>
		</tr>
        <tr>
            <td class="w100"></td>
            <td><a href="<?php echo smarty_function_mgrurl(array('action'=>"card/list?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['card']->value['data']['uid'];?>
" target="main" >返回上一页</a></td>
        </tr>

    </table>

</form>
</div>

<input type="hidden" id="uploadFileUrl" value="<?php echo smarty_function_uploadurl(array('module'=>'mgr','sort'=>'image'),$_smarty_tpl);?>
" />
<script src="<?php echo smarty_function_staticurl(array('action'=>"common/region.js"),$_smarty_tpl);?>
"></script>
<script src="<?php echo smarty_function_staticurl(array('action'=>"common/messenger.js"),$_smarty_tpl);?>
"></script>
<script src="<?php echo smarty_function_staticurl(array('action'=>"common/utils.js"),$_smarty_tpl);?>
"></script>

<script>

    $(document).ready(function () {
    	
    	<?php if (isset($_smarty_tpl->tpl_vars['district_id']->value)&&$_smarty_tpl->tpl_vars['district_id']->value>0){?>
    	 Region.init(<?php echo $_smarty_tpl->tpl_vars['province_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['city_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['district_id']->value;?>
);
    	 <?php }else{ ?>
	    	 <?php if (isset($_smarty_tpl->tpl_vars['city_id']->value)&&$_smarty_tpl->tpl_vars['city_id']->value>0){?>
			    	 Region.init(<?php echo $_smarty_tpl->tpl_vars['province_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['city_id']->value;?>
, 0);
			    	 <?php }else{ ?>
			    	 <?php if (isset($_smarty_tpl->tpl_vars['province_id']->value)&&$_smarty_tpl->tpl_vars['province_id']->value>0){?>
				    	 Region.init(<?php echo $_smarty_tpl->tpl_vars['province_id']->value;?>
, 0, 0);
				    <?php }?>
			    <?php }?>
    	<?php }?>
   
    
    
        Region.show();
           $('#region').find('.province').change(function() {
            Region.reset();
            Region.getCity($(this).val());
        });

        $("#region").find('.city').change(function() {
            Region.reset();
            Region.getCounty($(this).val());
        });
        
      $("#checkAll").click(function() {
        if($(this).attr("checked")=='checked') {
            $("input[class='stadium']").each(function() {
                $(this).attr("checked",true);
                checkVenue($(this).val());
            });
        } else {
            $("input[class='stadium']").each(function() {
                $(this).attr("checked",false);
                noCheck($(this).val());
            });
        }
    });
        
    });
		
	function showUserInfo() {
		var userInfoTr = $("#userInfoTr");
		if(userInfoTr.is(':visible')) {
			userInfoTr.hide();
			$('#info').html('+展开');
		}else {
			userInfoTr.show();
			$('#info').html('-展开');
		}
	}
	var userMobileConflict = false;
	var userPhoneConflict = false;
	var userEmailConflict = false;
	var userMobileConflictPrompt = '';
	var userPhoneConflictPrompt = '';
	var userEmailConflictPrompt = '';
	function checkUser() {
		var name = $("#name").val();
		var sex = $("#sex").val();
		var mobile = $("#mobile").val();
		var phone = $("#phone").val();
		var email = $("#email").val();
			
		if(name == '') {
			alert('请填写用户姓名');
			return false;
		}
		if(sex !=1 && sex!=2) {
			alert('请选择正确的性别');
			return false;
		}
		if(mobile =='' && phone =='' && email=='') {
			alert('手机号/固话/Email至少填写一种');
			return false;
		}
		if(userMobileConflict) {
			alert(userMobileConflictPrompt);
			return false;
		}
		if(userPhoneConflict) {
			alert(userPhoneConflictPrompt);
			return false;
		}
		if(userEmailConflict) {
			alert(userEmailConflictPrompt);
			return false;
		}
		if(mobile!='') {
			if(!mobile.match(regex.mobile)) {
				alert('请填写正确的手机格式');
				return false;
			}
		}
		if(email!='') {
			if(!email.match(regex.email)) {
				alert('请填写正确的Email格式');
				return false;
			}
		}
		return true;
	}
//	var uploadFileUrl = $("#uploadFileUrl").val();
//		uploadFileUrl = 'http://file.bestdo.net/file/upload?i=1';
//	uploadFile('upload-file', 'thumb-file', singleImageUpload, uploadFileUrl);
	var messenger = Messenger.initInParent(document.getElementById('uploadIframe'));
        messenger.onmessage = function (data) {
            data = eval('(' + data + ')');
            if (typeof data.status != 'undefined') {
                singleImageUpload(data);
            }
        };
	// 检查用户手机是否冲突，保持手机唯一
	function checkUserMobileConflict() {
		var mobile = $("#mobile").val();
		var uid = $("#uid").val();
		var url = $("#mobile").attr("url");
		if(mobile != '') {
			$.ajax({
				'type':'post',
				'data':{'mobile':mobile,'uid':uid},
				'url' :url,
				'dataType':'json',
				'async' : true,
				success:function(msg) {
					if(msg.status == 400) {
						userMobileConflict = true;
						userMobileConflictPrompt = msg.data;
						$("#mobileShowPrompt").html(userMobileConflictPrompt);
					}else if(msg.status == 200) {
						userMobileConflict = false;
						userMobileConflictPrompt = msg.data
						$("#mobileShowPrompt").html(userMobileConflictPrompt);
					}
				}
			});
		}
	}
	// 检查用户固话是否冲突，保持固话唯一
	function checkUserPhoneConflict() {
		var phone = $("#phone").val();
		var uid = $("#uid").val();
		var url = $("#phone").attr("url");
		if(phone != '') {
			$.ajax({
				'type':'post',
				'data':{'phone':phone,'uid':uid},
				'url' :url,
				'dataType':'json',
				'async' : true,
				success:function(msg) {
					if(msg.status == 400) {
						userPhoneConflict = true;
						userPhoneConflictPrompt = msg.data;
						$("#phoneShowPrompt").html(userPhoneConflictPrompt);
					}else if(msg.status == 200) {
						userPhoneConflict = false;
						userPhoneConflictPrompt = msg.data
						$("#phoneShowPrompt").html(userPhoneConflictPrompt);
					}
				}
			});
		}
	}
	// 检查用户Email是否冲突，保持Email唯一
	function checkUserEmailConflict() {
		var email = $("#email").val();
		var uid = $("#uid").val();
		var url = $("#email").attr("url");
		if(email != '') {
			$.ajax({
				'type':'post',
				'data':{'email':email,'uid':uid},
				'url' :url,
				'dataType':'json',
				'async' : true,
				success:function(msg) {
					if(msg.status == 400) {
						userEmailConflict = true;
						userEmailConflictPrompt = msg.data;
						$("#emailShowPrompt").html(userEmailConflictPrompt);
					}else if(msg.status == 200) {
						userEmailConflict = false;
						userEmailConflictPrompt = msg.data
						$("#emailShowPrompt").html(userEmailConflictPrompt);
					}
				}
			});
		}
	}

	//账户冻结启用
	function disable(accountNo) {
        if(confirm('确定要冻结吗？')) {
            
            window.location.href="<?php echo smarty_function_mgrurl(array('action'=>'card/accountDisable'),$_smarty_tpl);?>
?accountNo="+accountNo;
            
        }
    }
    function enable(accountNo) {
        if(confirm('确定要启用吗？')) {
            
            window.location.href="<?php echo smarty_function_mgrurl(array('action'=>'card/accountEnable'),$_smarty_tpl);?>
?accountNo="+accountNo;
            
        }
    }
	
</script>


<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
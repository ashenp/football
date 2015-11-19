<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 10:18:16
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\order\sportBook\badminton.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65065615cfbf905361-27420725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c7aacb6849608531fa557875d88fc23aa915efd' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\order\\sportBook\\badminton.tpl',
      1 => 1444270692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65065615cfbf905361-27420725',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5615cfbfef4e5',
  'variables' => 
  array (
    'staidum_note' => 0,
    'prices' => 0,
    'mer_item_id' => 0,
    'card_type_id' => 0,
    'uid' => 0,
    'card_type_is_limit_use' => 0,
    'card_id' => 0,
    'key' => 0,
    'day' => 0,
    'date' => 0,
    'inventories' => 0,
    'inventory' => 0,
    'time' => 0,
    'accounts' => 0,
    'account' => 0,
    'source' => 0,
    'cid' => 0,
    'inventory_date' => 0,
    'mer_price_id' => 0,
    'dateTemp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5615cfbfef4e5')) {function content_5615cfbfef4e5($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>预定详情</title>
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/wrap.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo smarty_function_staticurl(array('action'=>"admin/common.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<script language="javascript" src="<?php echo smarty_function_staticurl(array('action'=>"admin/jquery-1.5.2.min.js"),$_smarty_tpl);?>
"></script>
<script language="javascript" src="<?php echo smarty_function_staticurl(array('action'=>"admin/common.js"),$_smarty_tpl);?>
"></script>
</head>
<script src="<?php echo smarty_function_staticurl(array('action'=>"order/book.js"),$_smarty_tpl);?>
"></script>
<link href="<?php echo smarty_function_staticurl(array('action'=>"jquery.suggest.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo smarty_function_staticurl(array('action'=>"badminton/style.css",'type'=>"css"),$_smarty_tpl);?>
"  />
<body style="margin:0">
<div class="main_right" >
  <form action="/orders/createBadmintonOrder" method="POST" onsubmit="return book.checkSubmit(this);">
    <table class="marginTop complaint">
	      <tr>
	        <td class="w80 center ">备注</td>
	        <td><span><?php echo $_smarty_tpl->tpl_vars['staidum_note']->value;?>
</span></td>
	      </tr>
	      
	      
	      
		<tr class="orderTime">
			<td class="w80 center">预订日期</td>
			<td>
				 
				 <div id="wrapper">
				 
				 
				 	<!-- 日期开始 -->
					<div class="wrapper">
						<div class="itemTime">
							<a href="#" class="goL" id="goL"></a>
								<div class="itemTimeCont">
									<div class="itemTimeList">
										<?php  $_smarty_tpl->tpl_vars['date'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['date']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['prices']->value['weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['date']->key => $_smarty_tpl->tpl_vars['date']->value){
$_smarty_tpl->tpl_vars['date']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['date']->key;
?>
											<a href="/orders/GetCreateOrderInfo?mer_item_id=<?php echo $_smarty_tpl->tpl_vars['mer_item_id']->value;?>
&card_type_id=<?php echo $_smarty_tpl->tpl_vars['card_type_id']->value;?>
&uid=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
&card_type_is_limit_use=<?php echo $_smarty_tpl->tpl_vars['card_type_is_limit_use']->value;?>
&card_id=<?php echo $_smarty_tpl->tpl_vars['card_id']->value;?>
&date=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" isWeekend="" selfDay="" class="<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['day']->value){?>on<?php }?>">
												<i class="i1"><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</i>
												<i class="i2"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['key']->value,"%m-%d");?>
</i>
											</a>
										<?php } ?>	
									</div>
								</div>
							<a href="#" class="goR" id="goR"></a>
						</div>
						<div class="clearfloat"></div>
					</div>
					<!-- 日期结束 -->
					
					
					<a href="" class="goR" id="goR"></a>
					
					<!-- 格子开始 -->
					<div class='choose' align='center'>
						<table class="oneDayStocksClass" cellspacing="0" cellpadding="0"  style="display:block;">
							
							<!-- 场片 -->
									<tr class="chooseTit">
										<td class="ltit">
											<div style="width:60px;"></div>
										</td>
										<?php if (!empty($_smarty_tpl->tpl_vars['inventories']->value)){?>
											<?php  $_smarty_tpl->tpl_vars['inventory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['inventory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inventories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['inventory']->key => $_smarty_tpl->tpl_vars['inventory']->value){
$_smarty_tpl->tpl_vars['inventory']->_loop = true;
?>
												<td class="ltit">
													<div style="width:60px;"><?php echo $_smarty_tpl->tpl_vars['inventory']->value['name'];?>
</div>
												</td>
											<?php } ?>
										<?php }?>
										
									</tr>
							
											<?php if (!empty($_smarty_tpl->tpl_vars['prices']->value['times'])){?>
												<?php  $_smarty_tpl->tpl_vars['time'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['time']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prices']->value['times']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['time']->key => $_smarty_tpl->tpl_vars['time']->value){
$_smarty_tpl->tpl_vars['time']->_loop = true;
?>
													<tr class="chooseTit">
														<!--时间段-->
														<td class="ltit">
															<span class='piece_name' data-piece_id='' data-piece_name=''><p style="line-height:15px;margin-left: -10px;"><?php if ($_smarty_tpl->tpl_vars['time']->value['start_hour']>9){?><?php echo $_smarty_tpl->tpl_vars['time']->value['start_hour'];?>
<?php }else{ ?>0<?php echo $_smarty_tpl->tpl_vars['time']->value['start_hour'];?>
<?php }?>:00</p><?php if ($_smarty_tpl->tpl_vars['time']->value['end_hour']>9){?><?php echo $_smarty_tpl->tpl_vars['time']->value['end_hour'];?>
<?php }else{ ?>0<?php echo $_smarty_tpl->tpl_vars['time']->value['end_hour'];?>
<?php }?>:00</span>
														</td>
														
														<?php if (!empty($_smarty_tpl->tpl_vars['inventories']->value)){?>
															<?php  $_smarty_tpl->tpl_vars['inventory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['inventory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inventories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['inventory']->key => $_smarty_tpl->tpl_vars['inventory']->value){
$_smarty_tpl->tpl_vars['inventory']->_loop = true;
?>
																<?php if (isset($_smarty_tpl->tpl_vars['inventory']->value['hour'][$_smarty_tpl->tpl_vars['time']->value['start_hour']])&&$_smarty_tpl->tpl_vars['inventory']->value['hour'][$_smarty_tpl->tpl_vars['time']->value['start_hour']]['status']==1){?>
																	<td class='price_item' class='no_sold' onclick='book.addOrderItem(this);'  style="background:#7fb80e;" mer_item_price_time_id="<?php echo $_smarty_tpl->tpl_vars['time']->value['mer_item_price_time_id'];?>
" date=<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
 mer_price_id="<?php echo $_smarty_tpl->tpl_vars['time']->value['mer_price_id'];?>
" mer_item_id="<?php echo $_smarty_tpl->tpl_vars['time']->value['mer_item_id'];?>
" start_hour="<?php echo $_smarty_tpl->tpl_vars['time']->value['start_hour'];?>
" end_hour="<?php echo $_smarty_tpl->tpl_vars['time']->value['end_hour'];?>
" prepay_price="<?php echo $_smarty_tpl->tpl_vars['time']->value['prepay_price'];?>
" piece_id=<?php echo $_smarty_tpl->tpl_vars['inventory']->value['piece_id'];?>
 status=<?php echo $_smarty_tpl->tpl_vars['inventory']->value['hour'][$_smarty_tpl->tpl_vars['time']->value['start_hour']]['status'];?>
>
																		<span class='sub_data'><font style="color: white;">￥<?php echo $_smarty_tpl->tpl_vars['time']->value['prepay_price']/100;?>
</font></span>
																	</td>
																<?php }else{ ?>
																	<td class='no_sold' style="">
																		<span class='sub_data' data-status=0><font style="color: white;">￥<?php echo $_smarty_tpl->tpl_vars['time']->value['prepay_price']/100;?>
</font></span>
																	</td>
																<?php }?>
															<?php } ?>
														<?php }?>
													</tr>
												<?php } ?>
											<?php }?>
							
							
						</table>
						
						<!-- 提示开始 -->
						<div class="chooseNote">
							<span class="s2"><i></i>未预订</span>
							<span class="s3"><i></i>已预订</span>
						</div>
						<!-- 提示结束-->
						
					</div>
					<!-- 格子结束 -->
						
				</div>
                
			</td>
		</tr>
	      
	      
	      <tr>
	        <td class="w80 center">使用账户</td>
	        <td >
	          <span>
	            <select id="account_select" name='account_no' onchange="book.changeAccount();">
	              <option value="-1">请选择</option>
	              <?php  $_smarty_tpl->tpl_vars['account'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['account']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['accounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['account']->key => $_smarty_tpl->tpl_vars['account']->value){
$_smarty_tpl->tpl_vars['account']->_loop = true;
?>
	              <option value="<?php echo $_smarty_tpl->tpl_vars['account']->value['accountNo'];?>
" account_type="<?php echo $_smarty_tpl->tpl_vars['account']->value['accountType'];?>
" is_reduced="<?php echo $_smarty_tpl->tpl_vars['account']->value['isReduced'];?>
" reduce_after_price="<?php echo $_smarty_tpl->tpl_vars['account']->value['reducedAfterprice'];?>
" usable_balance="<?php echo $_smarty_tpl->tpl_vars['account']->value['usableBalance'];?>
" balance="<?php echo $_smarty_tpl->tpl_vars['account']->value['balance'];?>
" balance_price_id="<?php echo $_smarty_tpl->tpl_vars['account']->value['balancePriceId'];?>
" no_balance_price_id="<?php echo $_smarty_tpl->tpl_vars['account']->value['noBalancePriceId'];?>
" amount_type="<?php echo $_smarty_tpl->tpl_vars['account']->value['amountType'];?>
" times='<?php echo $_smarty_tpl->tpl_vars['account']->value['accountBuyNumber'];?>
'><?php echo $_smarty_tpl->tpl_vars['account']->value['accountName'];?>
</option>
	              <?php } ?>
	            </select>
	          </span>
	          <span id="current_account" style="display:none">
	          <span>余额:<span id="current_balance"></span></span>
	          <span>可使用余额:<span id="current_usable_balance"></span></span>
	          <span>可使用权益的明细个数:<span id="current_usable_times"></span></span>
	          </span>
	        </td>
	      </tr>
	      
	      
	      
	      <tr>
	        <td class="w80 center">选中日期</td>
	        <td class="checkTime">
	        
	        </td>
	      </tr>
	      
	      
	      <tr>
	        <td class="w80 center">其他费用</td>
	        <td >
	          <span>
	            费用名称：<input type="text" name="other_money_name" value="" id="other_money_name">
	          </span>
	          <span>
	            费用金额：<input type="text" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')"  name="other_money" value="" id="other_money"  maxlength="5" onblur="book.checkMoney()"> 元
	          </span>
	        </td>
	      </tr>
	      
	      
	      <tr>
	        <td class="w80 center">结算信息</td>
	        <td >
	          <p>预订总额：<span id="show_order_money">0</span>元</p><input type="hidden" name="order_money" value=0>
	          <p>其他费用：<span id="show_other_money">0</span>元</p>
	          <p>抵扣金额：<span id="show_reduce_money">0</span>元</p><input type="hidden" name="reduce_money" value=0>
	          <p>支付金额：<span id="show_pay_money">0</span>元</p><input type="hidden" name="pay_money" value=0>
	        </td>
	      </tr>
	      
	      
	      <tr>
	        <td class="w80 center">客户手机</td>
	        <td >
	            <input type="text" name="book_phone" id="book_phone"/>
	        </td>
	      </tr>
	      
	      
	      <tr>
	        <td class="w80 center">订单备注</td>
	        <td >
	          <textarea class="w500" name="note" id="note"></textarea>
	        </td>
	      </tr>
	      
	      
	      <tr>
			  <td colspan="20">
			  	<input name="uid" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" />
			  	<input name="source" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
" />
			  	<input name="cid" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" />
			  	<input name="card_type_id" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['card_type_id']->value;?>
" />
			  	<input name="card_id" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['card_id']->value;?>
" />
			  	<input name="mer_item_id" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['mer_item_id']->value;?>
" />
			  	<input name="book_day" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['inventory_date']->value;?>
" />
			  </td>
		  </tr>
		  
		  
	      <tr><td colspan="20"><input style="width:200px;margin-left:108px" type="submit" id="submit" value="提交订单"/></td></tr>
	      
	      <div id='default_price_id' style="display:none"><?php echo $_smarty_tpl->tpl_vars['mer_price_id']->value;?>
</div>
	      <div id='mer_item_id' style="display:none"><?php echo $_smarty_tpl->tpl_vars['mer_item_id']->value;?>
</div>
	      <div id='date_hidden' style="display:none"><?php echo $_smarty_tpl->tpl_vars['dateTemp']->value;?>
</div>
  </table>
  </form>
</div>
<script type="text/javascript" >
$(document).ready(function() {
	$('.close').live('click',function() {
		var parent = $(this).parent();
		var pid = $(parent).attr('id');
	
		var p = document.getElementById(pid);
		p.remove();
		book.countTotalFee();
		book.updateAccount();
	});
});

$(document).ready(function() {
	$('.if_use_right').live('click', function() {
		book.ifUseRight(this);
	});
});
$(function(){
	//初始化是否强制使用权益
	book.card_type_is_limit_use = parseInt('<?php echo $_smarty_tpl->tpl_vars['card_type_is_limit_use']->value;?>
');
	book.cid = <?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
;
})

function clickNoSold(obj) {
	var piece_id = $(obj).find('span').data('piece_id');
	var hour = $(obj).find('span').data('hour_key');
	
	if(piece_id <= 0) {
		return false;
	}
	if(hour < 0) {
		return false;
	}
	
	html = '';
	inventory_id = 'inventory_'+piece_id+'_'+hour;
	inventory_name = 'inventory['+piece_id+']['+hour+']';
	if($('#'+inventory_id).length <= 0) {
			if(status == 1) {
				html = '<input type="hidden" id="'+inventory_id+'" class="sub_inventory_data" name="'+inventory_name+'" value=0 />';
				$(obj).find('span').attr('data-status','0');
				$(obj).css('background','');
				$(obj).append(html);
			} else {
				html = '<input type="hidden" id="'+inventory_id+'" class="sub_inventory_data" name="'+inventory_name+'" value=1 />';
				$(obj).find('span').attr('data-status','1');
				$(obj).css('background','#7fb80e');
				$(obj).append(html);
			}
	} else {
		var new_status = $('#'+inventory_id).val();
		if(new_status == 0) {
			$(obj).css('background','#7fb80e');
			$(obj).find('span').attr('data-status','1');
		} else {
			$(obj).css('background','');
			$(obj).find('span').attr('data-status','0');
		}
		$('#'+inventory_id).remove();
	}
}
</script>
<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>
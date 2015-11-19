<?php /* Smarty version Smarty-3.1.7, created on 2015-10-07 11:00:54
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\order\sportBook\swim.tpl" */ ?>
<?php /*%%SmartyHeaderCode:239195613382d56f607-19873964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6a887b4a98fe8f758c7fae6e65f792b2a4f59da' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\order\\sportBook\\swim.tpl',
      1 => 1444186828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239195613382d56f607-19873964',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5613382e2d412',
  'variables' => 
  array (
    'staidum_note' => 0,
    'prices' => 0,
    'key' => 0,
    'price_info' => 0,
    'date' => 0,
    'time' => 0,
    'mydate' => 0,
    'inventory_count' => 0,
    'accounts' => 0,
    'account' => 0,
    'uid' => 0,
    'source' => 0,
    'cid' => 0,
    'card_type_id' => 0,
    'card_id' => 0,
    'mer_item_id' => 0,
    'inventory_date' => 0,
    'mer_price_id' => 0,
    'card_type_is_limit_use' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5613382e2d412')) {function content_5613382e2d412($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
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
<body style="margin:0">
<div class="main_right" >
  <form action="/orders/createSwimOrder" method="POST" onsubmit="return book.checkSubmit(this);">
    <table class="marginTop complaint">
	      <tr>
	        <td class="w100 center ">备注:</td>
	        <td><span><?php echo $_smarty_tpl->tpl_vars['staidum_note']->value;?>
</span></td>
	      </tr>
	      <tr class="orderTime">
	        <td class="w100 center">预订日期:</td>
	        <td >
	                <div class="tab_order">
	                  <ul class="date">
	                  <?php  $_smarty_tpl->tpl_vars['date'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['date']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['prices']->value['weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['date']->key => $_smarty_tpl->tpl_vars['date']->value){
$_smarty_tpl->tpl_vars['date']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['date']->key;
?>
	                    <li <?php if (!empty($_smarty_tpl->tpl_vars['price_info']->value[$_smarty_tpl->tpl_vars['key']->value])){?> class="selected" <?php $_smarty_tpl->tpl_vars['mydate'] = new Smarty_variable($_smarty_tpl->tpl_vars['key']->value, null, 0);?><?php }?> onclick="toUrl('<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
');">
	                      <p><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</p>
	                      <p id="selectDate" date="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	                    </li>
						<!--	    下单明细了的显示时间用                -->
	                 <!--    <input type="hidden" id="selectDate" value="<?php if (!empty($_smarty_tpl->tpl_vars['price_info']->value[$_smarty_tpl->tpl_vars['key']->value])){?><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
<?php }?>">  -->
	                   <?php } ?>
	                  </ul>
	                </div>
	                <div class="tab_order_box"> 
	                   <div class="tab_order_box_first">
	                     <table>
	                       <tr class="time_top">
	                         <td class="w100 center">时段</td>
	                         <td>库存</td>
	                       </tr>
	                       <?php  $_smarty_tpl->tpl_vars['time'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['time']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prices']->value['times']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['time']->key => $_smarty_tpl->tpl_vars['time']->value){
$_smarty_tpl->tpl_vars['time']->_loop = true;
?>
	                       <tr class="time">
	                         <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['time']->value['start_hour'];?>
:00-<?php echo $_smarty_tpl->tpl_vars['time']->value['end_hour'];?>
:00</td>
	                         <td class="price_item" mer_item_price_time_id="<?php echo $_smarty_tpl->tpl_vars['time']->value['mer_item_price_time_id'];?>
" mer_price_id="<?php echo $_smarty_tpl->tpl_vars['time']->value['mer_price_id'];?>
" mer_item_id="<?php echo $_smarty_tpl->tpl_vars['time']->value['mer_item_id'];?>
" start_hour="<?php echo $_smarty_tpl->tpl_vars['time']->value['start_hour'];?>
" end_hour="<?php echo $_smarty_tpl->tpl_vars['time']->value['end_hour'];?>
" prepay_price="<?php echo $_smarty_tpl->tpl_vars['time']->value['prepay_price'];?>
" date="<?php echo $_smarty_tpl->tpl_vars['mydate']->value;?>
" onclick="book.addOrderItem(this);">
	                         <?php if ($_smarty_tpl->tpl_vars['inventory_count']->value>0){?>
	                         <?php echo $_smarty_tpl->tpl_vars['time']->value['prepay_price']/100;?>
 元
	                         <?php }else{ ?>
	                         不可预订
	                         <?php }?>
	                         </td>
	                       </tr>
	                  		
	                       <?php }
if (!$_smarty_tpl->tpl_vars['time']->_loop) {
?>
	                       <tr class="time">
	                         <td colspan="20">暂无报价</td>
	                       </tr>
	                       <?php } ?>
	                     </table>
	
	                   </div>
	                   <div class="hide">3</div>
	                </div>
	        </td>
	      </tr>
	      <tr>
	        <td class="w100 center">使用账户:</td>
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
	      <tr >
	        <td class="w100 center">选中日期:</td>
	        <td class="checkTime">
	        
	        </td>
	      </tr>
	      <tr>
	        <td class="w100 center">其他费用:</td>
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
	        <td class="w100 center">结算信息:</td>
	        <td >
	          <p>预订总额：<span id="show_order_money">0</span>元</p><input type="hidden" name="order_money" value=0>
	          <p>其他费用：<span id="show_other_money">0</span>元</p>
	          <p>抵扣金额：<span id="show_reduce_money">0</span>元</p><input type="hidden" name="reduce_money" value=0>
	          <p>支付金额：<span id="show_pay_money">0</span>元</p><input type="hidden" name="pay_money" value=0>
	        </td>
	      </tr>
	      <tr>
	        <td class="w100 center">客户手机:</td>
	        <td >
	            <input type="text" name="book_phone" id="book_phone"/>
	        </td>
	      </tr>
	      <tr>
	        <td class="w100 center">订单备注:</td>
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
	      <div id='date_hidden' style="display:none"><?php echo $_smarty_tpl->tpl_vars['inventory_date']->value;?>
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

function toUrl(date) {
	var mer_item_id = "<?php echo $_smarty_tpl->tpl_vars['mer_item_id']->value;?>
";
	var card_type_id = "<?php echo $_smarty_tpl->tpl_vars['card_type_id']->value;?>
";
	var uid = "<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
";
	var card_id = "<?php echo $_smarty_tpl->tpl_vars['card_id']->value;?>
";
	var card_type_is_limit_use = "<?php echo $_smarty_tpl->tpl_vars['card_type_is_limit_use']->value;?>
";
	window.location.href = "/orders/getCreateOrderInfo?mer_item_id="+mer_item_id+'&card_type_id='+card_type_id+'&uid='+uid+'&card_id='+card_id+'&card_type_is_limit_use='+card_type_is_limit_use+'&date='+date;
}
</script>
<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>
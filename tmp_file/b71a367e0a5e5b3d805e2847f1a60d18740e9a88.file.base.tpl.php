<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 09:57:07
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com/views\mgr\user\base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1891560e3b3c137302-62740696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b71a367e0a5e5b3d805e2847f1a60d18740e9a88' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com/views\\mgr\\user\\base.tpl',
      1 => 1444190178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1891560e3b3c137302-62740696',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560e3b3c3ff53',
  'variables' => 
  array (
    'user' => 0,
    'userCardData' => 0,
    'value' => 0,
    'acount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e3b3c3ff53')) {function content_560e3b3c3ff53($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
?><table >
  <tr class="thead">
    <th colspan="7">用户信息</th>
  </tr>
  <tr class="thead">
    <th class="w100 center">姓名</th>
    <th class="w100 center">性别</th>
    <th class="w100 center">手机</th>
    <th class="w100 center">Email</th>
    <th class="w100 center">所在地区</th>
    <th class="w100 center">状态</th>
    <th class="w100 center">操作</th>
  </tr>
  <tr>
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['user']->value['realName'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['realName'];?>
<?php }?></td>
    <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['user']->value['sex']=='MALE'){?>男<?php }else{ ?>女<?php }?></td>
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['user']->value['telephone'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['telephone'];?>
<?php }?></td>
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
<?php }?></td>
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['user']->value['province'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['province'];?>
<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['user']->value['city'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['city'];?>
<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['user']->value['district'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['district'];?>
<?php }?></td>
    <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['user']->value['status']=='ACTIVED'){?><span class="green">启用</span><?php }else{ ?><span class="red">禁用</span><?php }?></td>
    <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['user']->value['status']=='ACTIVED'){?><a href="<?php echo smarty_function_mgrurl(array('action'=>"card/add?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
&flag=1" target="_self">新增卡</a><?php }?></td>
  </tr>
</table>
<table >
  <tr class="thead">
    <th class="w100 center">卡号</th>
    <th class="w100 center">所属卡种</th>
    <th class="w100 center">账户内容</th>
    <th class="w100 center">使用期限</th>
    <th class="w100 center">激活时间</th>
    <th class="w100 center">状态</th>
    <th class="w100 center">操作</th>
  </tr>
  <?php if (isset($_smarty_tpl->tpl_vars['userCardData']->value['data']['list'])){?>
  <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userCardData']->value['data']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
  
  <tr>
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['value']->value['cardNo'])){?><?php echo $_smarty_tpl->tpl_vars['value']->value['cardNo'];?>
<?php }?></td>
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['value']->value['cardTypeName'])){?><?php echo $_smarty_tpl->tpl_vars['value']->value['cardTypeName'];?>
<?php }?></td>

    
    <td class="w100 center">
    <?php  $_smarty_tpl->tpl_vars['acount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['acount']->_loop = false;
 $_smarty_tpl->tpl_vars['ak'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['value']->value['cardAccount']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['acount']->key => $_smarty_tpl->tpl_vars['acount']->value){
$_smarty_tpl->tpl_vars['acount']->_loop = true;
 $_smarty_tpl->tpl_vars['ak']->value = $_smarty_tpl->tpl_vars['acount']->key;
?>
    <p><?php echo $_smarty_tpl->tpl_vars['acount']->value['accountNo'];?>
(<?php echo $_smarty_tpl->tpl_vars['acount']->value['accountName'];?>
)</p>
    <?php if ($_smarty_tpl->tpl_vars['acount']->value['amountType']=='NOLIMIT'){?><span>面额：无限 余额：无限</span><?php }elseif(($_smarty_tpl->tpl_vars['acount']->value['accountType']=='CASH')){?>面额：<?php echo $_smarty_tpl->tpl_vars['acount']->value['amount']/100;?>
元 余额：<?php echo $_smarty_tpl->tpl_vars['acount']->value['balance']/100;?>
元<?php }else{ ?>面额：<?php echo $_smarty_tpl->tpl_vars['acount']->value['amount'];?>
次 余额：<?php echo $_smarty_tpl->tpl_vars['acount']->value['balance'];?>
次<?php }?>
    <?php } ?>
    </td>
    
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['value']->value['useStartTime'])&&isset($_smarty_tpl->tpl_vars['value']->value['useEndTime'])){?><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['value']->value['useStartTime']);?>
---<?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['value']->value['useEndTime']);?>
<?php }?></td>
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['value']->value['activeTime'])){?><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['value']->value['activeTime']);?>
<?php }?></td>
    <td class="w100 center"><?php if (isset($_smarty_tpl->tpl_vars['value']->value['status'])){?><?php if ($_smarty_tpl->tpl_vars['value']->value['status']){?>可用<?php }else{ ?>冻结<?php }?><?php }?></td>
    <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['user']->value['isCompanyUser']&&$_smarty_tpl->tpl_vars['user']->value['status']=='ACTIVED'){?><a href="<?php echo smarty_function_mgrurl(array('action'=>"orders/book?uid="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
&card_type_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['cardTypeId'];?>
&card_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['cardId'];?>
" target="main">预订下单</a><?php }?></td>
  </tr>
  
  <?php } ?>
  <?php }else{ ?>
  <tr>
    <td colspan="7">暂无数据</td>
  </tr>
  <?php }?>
</table><?php }} ?>
<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 20:46:46
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\card\account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6421561665b6634330-35258318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '659a8c2e897a6de46c1ee648273492fffe4921ba' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\card\\account.tpl',
      1 => 1444103289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6421561665b6634330-35258318',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'accountInfo' => 0,
    'value' => 0,
    'data' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_561665b6a35f6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561665b6a35f6')) {function content_561665b6a35f6($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
?><?php echo $_smarty_tpl->getSubTemplate ('mgr/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main_right" >
  <table>
    <tr class="thead">
      <th class="w100 center">序号</th>
      <th class="w100 center">账户名称</th>
      <th class="w100 center">账户类别</th>
      <th class="w100 center">使用方式</th>
      <th class="w100 center">面额</th>
      <th class="w100 center">余额</th>
      <th class="w100 center">使用周期</th>
      <th class="w100 center">可充值</th>
      <th class="w100 center">每次可购买数</th>
      <th class="w100 center">上次消费后可订场</th>
      <th class="w100 center">状态</th>
      <th class="w100 center">充值次数</th>
      <th class="w100 center">使用次数</th>
      <th class="w100 center">操作</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['accountInfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
      <td class="w100 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['status']=='DISABLE'){?>禁用<?php }else{ ?>启用<?php }?></td>
      <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['rechargeCount'];?>
</td>
      <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['consumeCount'];?>
</td>
      <!-- <td class="w100 center"><a href="<?php echo smarty_function_mgrurl(array('action'=>"card/accountDisable?accountNo="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['value']->value['accountNo'];?>
&status=<?php echo $_smarty_tpl->tpl_vars['value']->value['status'];?>
"><?php if ($_smarty_tpl->tpl_vars['value']->value['status']=='DISABLE'){?>启用<?php }else{ ?>禁用<?php }?></a></td> -->
      <td>
      <?php if ($_smarty_tpl->tpl_vars['value']->value['status']!='NOTDISABLE'){?><a href="javascript:enable('<?php echo $_smarty_tpl->tpl_vars['value']->value['accountNo'];?>
');">启用</a><?php }else{ ?><a href="javascript:disable('<?php echo $_smarty_tpl->tpl_vars['value']->value['accountNo'];?>
');">冻结</a><?php }?>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>

 
<script>
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
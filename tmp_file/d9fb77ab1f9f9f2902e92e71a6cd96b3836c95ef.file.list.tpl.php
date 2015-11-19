<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 20:46:27
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\card\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5375561665a37dc805-64641828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9fb77ab1f9f9f2902e92e71a6cd96b3836c95ef' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\card\\list.tpl',
      1 => 1444137925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5375561665a37dc805-64641828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userCardData' => 0,
    'value' => 0,
    'user' => 0,
    'acount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_561665a3b9186',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561665a3b9186')) {function content_561665a3b9186($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
?><?php echo $_smarty_tpl->getSubTemplate ('mgr/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main_right" > 
<?php echo $_smarty_tpl->getSubTemplate ('mgr/user/base.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('mgr/user/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <table class="marginTop">
    <tr class="thead">
      <th class="w100 center">卡号</th>
      <th class="w100 center">所属卡种</th>
      <th class="w100 center">账户内容</th>
      <th class="w200 center">使用期限</th>
      <th class="w100 center">激活时间</th>
      <th class="w50 center">状态</th>
      <th class="w50 center">是否过期</th>
      <th class="w200 center">操作</th>
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
      <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['cardNo'];?>
</td>
      <td class="w100 center"><a href="<?php echo smarty_function_mgrurl(array('action'=>"card/detail?cardId="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['value']->value['cardId'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="main"><?php echo $_smarty_tpl->tpl_vars['value']->value['cardTypeName'];?>
</a></td>
      
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
      
      <td class="w200 center"><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['value']->value['useStartTime']);?>
—<?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['value']->value['useEndTime']);?>
</td>
      <td class="w100 center"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['value']->value['activeTime']);?>
</br></td>
      <td class="w50 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['status']=='NOTDISABLE'){?>启用<?php }else{ ?>禁用<?php }?></td>
      <td class="w50 center"><?php if ($_smarty_tpl->tpl_vars['value']->value['useEndTime']<time()){?>已过期<?php }else{ ?>未过期<?php }?></td>
      <td class="w200 center">
        <a href="<?php echo smarty_function_mgrurl(array('action'=>"card/detail?cardId="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['value']->value['cardId'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" target="_self">详情</a>
        <span>|</span>
        <a href="<?php echo smarty_function_mgrurl(array('action'=>"card/account?cardId="),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['value']->value['cardId'];?>
" target="_self">已关联账户</a> 
        <span>|</span>
        <?php if ($_smarty_tpl->tpl_vars['value']->value['status']=='NOTDISABLE'){?><a href="javascript:disable('<?php echo $_smarty_tpl->tpl_vars['value']->value['cardId'];?>
','<?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
');" target="_self">禁用</a><?php }else{ ?><a href="javascript:enable('<?php echo $_smarty_tpl->tpl_vars['value']->value['cardId'];?>
','<?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
');" target="_self">启用</a><?php }?>
      </td>
    </tr>
    <?php } ?>
    <?php }else{ ?>
    <tr>
      <td colspan="8">暂无数据</td>
    </tr>
    <?php }?>
  </table>
</div>
 
<script>
    function disable(cardId,uid) {
        if(confirm('确定要禁用卡吗？')) {
            
            window.location.href="<?php echo smarty_function_mgrurl(array('action'=>'card/cardDisable'),$_smarty_tpl);?>
?cardId="+cardId+'&uid='+uid;
            
        }
    }
    function enable(cardId,uid) {
        if(confirm('确定要启用卡吗？')) {
            
            window.location.href="<?php echo smarty_function_mgrurl(array('action'=>'card/cardEnable'),$_smarty_tpl);?>
?cardId="+cardId+'&uid='+uid;
            
        }
    }
</script> 

<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>
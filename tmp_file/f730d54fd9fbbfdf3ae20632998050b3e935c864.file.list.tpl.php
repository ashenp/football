<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 10:34:30
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\user\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184555615d636eba575-50921520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f730d54fd9fbbfdf3ae20632998050b3e935c864' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\user\\list.tpl',
      1 => 1444269981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184555615d636eba575-50921520',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'amount' => 0,
    'k' => 0,
    'keyword' => 0,
    'status' => 0,
    'users' => 0,
    'user' => 0,
    'u' => 0,
    'total' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5615d63725e67',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5615d63725e67')) {function content_5615d63725e67($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
?><?php echo $_smarty_tpl->getSubTemplate ('mgr/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main_right" >
  <table>
    <tr class="thead">
      <th colspan="4">概览</th>
    </tr>
    <tr class="thead">
      <th class="w180 center">用户总数</th>
      <th class="w180 center">本日新增</th>
      <th class="w180 center">本周新增</th>
      <th class="w180 center">本月新增</th>
    </tr>
    <tr>
      <td class="w180 center"><?php echo $_smarty_tpl->tpl_vars['amount']->value['amount'];?>
</td>
      <td class="w180 center"><?php echo $_smarty_tpl->tpl_vars['amount']->value['todayIncrement'];?>
</td>
      <td class="w180 center"><?php echo $_smarty_tpl->tpl_vars['amount']->value['thisWeekIncrement'];?>
</td>
      <td class="w180 center"><?php echo $_smarty_tpl->tpl_vars['amount']->value['thisMonthIncrement'];?>
</td>
    </tr>
  </table>
  <form method="GET" action="<?php echo smarty_function_mgrurl(array('action'=>"user/list"),$_smarty_tpl);?>
">
    <table>
      <tr>
        <td class="w500">筛选条件:
          <select name="k">
          	<option value="">请选择</option>
            <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['k']->value)&&$_smarty_tpl->tpl_vars['k']->value=="1"){?>selected<?php }?>>用户姓名</option>
            <option value="2" <?php if (isset($_smarty_tpl->tpl_vars['k']->value)&&$_smarty_tpl->tpl_vars['k']->value=="2"){?>selected<?php }?>>用户手机</option>
            <option value="3" <?php if (isset($_smarty_tpl->tpl_vars['k']->value)&&$_smarty_tpl->tpl_vars['k']->value=="3"){?>selected<?php }?>>用户Email</option>
          </select>
          <input type="text" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">
        状态:
        <select name="status">
        	<option value="">请选择</option>
        	<option value="ACTIVED" <?php if ($_smarty_tpl->tpl_vars['status']->value=='ACTIVED'){?>selected<?php }?>>启用</option>
        	<option value="FREEZED" <?php if ($_smarty_tpl->tpl_vars['status']->value=='FREEZED'){?>selected<?php }?>>禁用</option>
        </select>
         <input type="submit" class="button" value="搜 索" >
        </td>
      </tr>
    </table>
  </form>
  <table>
    <tr>
      <th class="w40 center">用户ID</th>
      <th class="w100 center">姓名</th>
      <th class="w150 center">卡号</th>
      <th class="w80 center">手机</th>
      <th class="w100 center">Email</th>
      <th class="w40 center">状态</th>
      <th class="w80 center">创建时间</th>
      <th class="">操作</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
    <tr  >
      <td class="w40 center"><?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
</td>
      <td class="w100"><a href="<?php echo smarty_function_mgrurl(array('action'=>'user/info'),$_smarty_tpl);?>
?uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
"><?php if (isset($_smarty_tpl->tpl_vars['user']->value['realName'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['realName'];?>
<?php }?></a></td>
      <td class="w150">
      <?php if (isset($_smarty_tpl->tpl_vars['user']->value['cardInfoList'])&&!empty($_smarty_tpl->tpl_vars['user']->value['cardInfoList'])){?>
      <?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['u']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['cardInfoList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
$_smarty_tpl->tpl_vars['u']->_loop = true;
?>
      <p><?php echo $_smarty_tpl->tpl_vars['u']->value['cardNo'];?>
</p>
      <?php } ?>
      <?php }?>
      </td>
      <td class="w80"><?php if (isset($_smarty_tpl->tpl_vars['user']->value['telephone'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['telephone'];?>
<?php }?></td>
      <td class="w100"><?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
<?php }?></td>
      <td class="w40 center"><?php if ($_smarty_tpl->tpl_vars['user']->value['status']=='ACTIVED'){?>启用<?php }else{ ?>禁用<?php }?></td>
      <td class="w60 center"><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['user']->value['createTime']);?>
</td>
      <td class="">
      <a href="<?php echo smarty_function_mgrurl(array('action'=>'user/info?uid='),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
">详情</a>&nbsp;|&nbsp;
      <a href="<?php echo smarty_function_mgrurl(array('action'=>'card/add?uid='),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
">激活</a>
      &nbsp;|&nbsp;<a href="<?php echo smarty_function_mgrurl(array('action'=>'user/edit'),$_smarty_tpl);?>
?uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
">编辑</a>&nbsp;| <?php if ($_smarty_tpl->tpl_vars['user']->value['status']!='ACTIVED'){?><a href="javascript:enable('<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
');">启用</a><?php }else{ ?><a href="javascript:del('<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
');">禁用</a><?php }?></td>
    </tr>
    <?php }
if (!$_smarty_tpl->tpl_vars['user']->_loop) {
?>
    <tr>
        <td colspan="20">没有符合该搜索条件的用户信息</td>
    </tr>
    <?php } ?>
  </table>
  <div class="pager">共有用户 <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 个 <?php echo $_smarty_tpl->tpl_vars['pager']->value->toHTML();?>
</div>
</div>
 
<script>
    function del(uid) {
        if(confirm('确定要禁用吗？')) {
            
            window.location.href="<?php echo smarty_function_mgrurl(array('action'=>'user/delete'),$_smarty_tpl);?>
?uid="+uid;
            
        }
    }
    function enable(uid) {
        if(confirm('确定要启用吗？')) {
            
            window.location.href="<?php echo smarty_function_mgrurl(array('action'=>'user/enabled'),$_smarty_tpl);?>
?uid="+uid;
            
        }
    }
</script> 

<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>
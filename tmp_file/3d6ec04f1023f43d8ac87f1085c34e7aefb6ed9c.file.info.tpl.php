<?php /* Smarty version Smarty-3.1.7, created on 2015-10-02 16:07:23
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\user\info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29074560e3b3bdc53c7-34658142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d6ec04f1023f43d8ac87f1085c34e7aefb6ed9c' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\user\\info.tpl',
      1 => 1443681187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29074560e3b3bdc53c7-34658142',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560e3b3bf2d1b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e3b3bf2d1b')) {function content_560e3b3bf2d1b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('mgr/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main_right" > 
<?php echo $_smarty_tpl->getSubTemplate ('mgr/user/base.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('mgr/user/menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <table class="marginTop marginTop">
    <tr>
      <td class="w100 center">姓名</td>
      <td class=""><?php if (isset($_smarty_tpl->tpl_vars['user']->value['realName'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['realName'];?>
<?php }?></td>
    </tr>
    <tr>
      <td class="w100 center">手机</td>
      <td class=""><?php if (isset($_smarty_tpl->tpl_vars['user']->value['telephone'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['telephone'];?>
<?php }?></td>
    </tr>
    <tr>
      <td class="w100 center">性别</td>
      <td class=""><?php if ($_smarty_tpl->tpl_vars['user']->value['sex']=='MALE'){?>男<?php }else{ ?>女<?php }?></td>
    </tr>
    <tr>
      <td class="w100 center">出生日期</td>
      <td class=""><?php if (isset($_smarty_tpl->tpl_vars['user']->value['birthday'])){?><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['user']->value['birthday']);?>
<?php }?></td>
    </tr>
    <tr>
      <td class="w100 center">所在地区</td>
      <td class=""><?php if (isset($_smarty_tpl->tpl_vars['user']->value['province'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['province'];?>
<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['user']->value['city'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['city'];?>
<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['user']->value['district'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['district'];?>
<?php }?></td>
    </tr>
    <tr>
      <td class="w100 center">Email</td>
      <td class=""><?php if (isset($_smarty_tpl->tpl_vars['user']->value['email'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
<?php }?></td>
    </tr>
    <tr>
      <td class="w100 center">备注</td>
      <td class=""><?php if (isset($_smarty_tpl->tpl_vars['user']->value['memo'])){?><?php echo $_smarty_tpl->tpl_vars['user']->value['memo'];?>
<?php }?></td>
    </tr>
  </table>
  <div class="pager"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>
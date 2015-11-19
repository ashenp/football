<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 21:55:17
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\order\orderlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23585561675c59376b0-13926201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '337b108d9127c7109c85122b18cd9d20cb61d1bb' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\order\\orderlist.tpl',
      1 => 1444269981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23585561675c59376b0-13926201',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orderProcess' => 0,
    'key' => 0,
    'process_status' => 0,
    'value' => 0,
    'create_start_time' => 0,
    'create_end_time' => 0,
    'orderState' => 0,
    'status' => 0,
    'book_start_day' => 0,
    'book_end_day' => 0,
    'enterprise' => 0,
    'company_id' => 0,
    'project' => 0,
    'project_id' => 0,
    'sportType' => 0,
    'cid' => 0,
    'html_where' => 0,
    'html_value' => 0,
    'orderList' => 0,
    'total' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_561675c636dd3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561675c636dd3')) {function content_561675c636dd3($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
?><?php echo $_smarty_tpl->getSubTemplate ('mgr/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="<?php echo smarty_function_staticurl(array('action'=>"my97/WdatePicker.js"),$_smarty_tpl);?>
"></script>
<script language="javascript" src="<?php echo smarty_function_staticurl(array('action'=>"admin/common.js",'type'=>"js"),$_smarty_tpl);?>
?<?php echo date('Y-m-d H:i:s');?>
"></script>
<div class="main_right" >
    <form action="" method="get" onsubmit="return checkForm();">
<table class="marginTop complaint">
  <tr class="thead">
      <th class="w100p">订单列表</th>
  </tr>
  <tr>
    <td>处理状态：
      <span>
        <select name="orderProcess">
          <option value="">请选择</option>
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderProcess']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['process_status']->value)&&$_smarty_tpl->tpl_vars['process_status']->value==$_smarty_tpl->tpl_vars['key']->value){?>selected = "selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option>
        <?php } ?>
        </select>
      </span>
      <span>
        创建时间：
        <input type="text" id="ctime" name="ctime" value="<?php if (isset($_smarty_tpl->tpl_vars['create_start_time']->value)){?><?php echo $_smarty_tpl->tpl_vars['create_start_time']->value;?>
<?php }?>" class="shortBlank"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"  />
      </span>
      <span>至&nbsp;&nbsp; <input type="text" id="ctime_end" name="ctime_end" value="<?php if (isset($_smarty_tpl->tpl_vars['create_end_time']->value)){?><?php echo $_smarty_tpl->tpl_vars['create_end_time']->value;?>
<?php }?>" class="shortBlank"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"  />
      </span>
    </td>
  </tr>
  <tr>
    <td>
    <span>
      订单状态：
      <select name="orderState">
        <option value="">请选择</option>
      <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderState']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['status']->value)&&$_smarty_tpl->tpl_vars['status']->value==$_smarty_tpl->tpl_vars['key']->value){?>selected = "selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option>
      <?php } ?>
      </select>
    </span>
    <span>
      预订日期：
      <input type="text"  id="btime" name="btime" value="<?php if (isset($_smarty_tpl->tpl_vars['book_start_day']->value)){?><?php echo $_smarty_tpl->tpl_vars['book_start_day']->value;?>
<?php }?>" class="shortBlank"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"  />
    </span>
    <span>
      至 &nbsp;&nbsp;
      <input type="text" id="btime_end" name="btime_end" value="<?php if (isset($_smarty_tpl->tpl_vars['book_end_day']->value)){?><?php echo $_smarty_tpl->tpl_vars['book_end_day']->value;?>
<?php }?>" class="shortBlank"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"  />
    </span>
    </td>
  </tr>
  <tr>
    <td>
      <span>
        所属企业：
        <select name="enterprise" id="company_id">
          <option value="0">请选择</option>
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['enterprise']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['company_id']->value)&&$_smarty_tpl->tpl_vars['company_id']->value==$_smarty_tpl->tpl_vars['key']->value){?>selected = "selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</option>
        <?php } ?>
        </select>
      </span>
      <span id="project" <?php if (!isset($_smarty_tpl->tpl_vars['project']->value)){?>style="display:none"<?php }?>>
        所属项目：
        <select name="project" id="project_id">
          <?php if (isset($_smarty_tpl->tpl_vars['project']->value)){?>
            <option value="0"> 请选择 </option>
          <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['project']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['project_id']->value)&&$_smarty_tpl->tpl_vars['project_id']->value==$_smarty_tpl->tpl_vars['key']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</option>
          <?php } ?>
          <?php }else{ ?>
            <option value="0"> 请选择 </option>
          <?php }?>
        </select>
      </span>
      <span>运动类型：
        <select name="sportType">
          <option value="0">请选择</option>
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sportType']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['cid']->value)&&$_smarty_tpl->tpl_vars['cid']->value==$_smarty_tpl->tpl_vars['key']->value){?>selected = "selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
</option>
        <?php } ?>
        </select>
      </span>
    </td>
  </tr>
  <tr>
    <td class="w100p">
      <span>筛选条件:</span>
      <select name="where">
        <option value="0">请选择</option>
        <option value="uid" <?php if (isset($_smarty_tpl->tpl_vars['html_where']->value)&&$_smarty_tpl->tpl_vars['html_where']->value=="uid"){?>selected = "selected"<?php }?>>用户名称</option>
        <option value="phone" <?php if (isset($_smarty_tpl->tpl_vars['html_where']->value)&&$_smarty_tpl->tpl_vars['html_where']->value=="phone"){?>selected = "selected"<?php }?>>手机</option>
        <option value="oid" <?php if (isset($_smarty_tpl->tpl_vars['html_where']->value)&&$_smarty_tpl->tpl_vars['html_where']->value=="oid"){?>selected = "selected"<?php }?>>订单ID</option>
        <option value="name" <?php if (isset($_smarty_tpl->tpl_vars['html_where']->value)&&$_smarty_tpl->tpl_vars['html_where']->value=="name"){?>selected = "selected"<?php }?>>场馆名称</option>
      </select>
      <input name="where_value" type="text" value="<?php echo $_smarty_tpl->tpl_vars['html_value']->value;?>
"/>
    </td>
  </tr>
  <tr class="thead">
    <td class="w100p">
      <span><input name="submit" type="submit" class="button" value="搜索" /></span>
      <span><input name="submit" type="submit" class="button" value="导出" /></span>
    </td>
  </tr>
</table>
  </form>
  <table class="marginTop">
    <tr class="thead">
      <th class="w50 center">订单ID</th>
      <th class="w80 center">用户名</th>
      <th class="w100 center">订单内容</th>
      <th class="w80 center">所属项目</th>
      <th class="w60 center">开始时间</th>
      <th class="w80 center">预订时段</th>
      <th class="w50 center">实付金额</th>
      <th class="w80 center">预订电话</th>
      <th class="w60 center">订单状态</th>
      <th class="w50 center">处理状态</th>
      <th class="w50 center">凭证状态</th>
      <th class="w80 center">创建信息</th>
      <th class="center">操作</th>
    </tr>
    <?php if (!empty($_smarty_tpl->tpl_vars['orderList']->value)){?>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
    <tr>
      <td class="w50 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['oid'];?>
</td>
      <td class="w80 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['username'];?>
</td>
      <td class="w100 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>
</td>
      <td class="w80 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['project'];?>
</td>
      <td class="w60 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['start_time'];?>
</td>
      <td class="w80 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['book_day'];?>
</td>
      <td class="w50 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['pay_money'];?>
元</td>
      <td class="w80 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['phone'];?>
</td>
      <td class="w60 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['order_state'];?>
<br>(<?php echo $_smarty_tpl->tpl_vars['value']->value['money_status'];?>
)</td>
      <td class="w50 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['process_state'];?>
</td>
      <td class="w50 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['certificate_status'];?>
</td>
      <td class="w80 center"><?php echo $_smarty_tpl->tpl_vars['value']->value['create_info'];?>
</td>
      <td class="center">
          <a href="<?php echo smarty_function_mgrurl(array('action'=>"orderlist/info?oid=".($_smarty_tpl->tpl_vars['value']->value['oid'])."&type=1"),$_smarty_tpl);?>
" target="main">详情</a>
          <span style="margin: 0 5px;">|</span>
          <a href="javascript:showProcess('<?php echo $_smarty_tpl->tpl_vars['value']->value['oid'];?>
')">流程处理</a>
      </td>
    </tr>
    <?php } ?>
    <?php }else{ ?>
      <td colspan="13">没有符合该搜索条件的订单信息</td>
    <?php }?>
  </table>
</div>
<div class="pager">共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
条 <?php echo $_smarty_tpl->tpl_vars['pager']->value->toHTML();?>
</div>


<script type="text/javascript">
$("#company_id").change(function(){
  var company_id = $("#company_id").val();
  if (company_id != 0) {
    $.post('/orderlist/getProgectAjax', {company_id : company_id}, function(data) {
      if (data == '1') {
        alert("数据加载出错！");
        return false;
      }
      $("#project_id").html(data);
      $("#project").attr('style', '');
    })
  } else {
    $("#project").attr('style', 'display:none');
  }
});

function checkForm() {
    // 创建时间和预定时间
    var ctime = $("#ctime").val();
    var ctimeEnd = $('#ctime_end').val();
    var btime = $("#btime").val();
    var btimeEnd = $('#btime_end').val();
    if((ctime != '' && ctimeEnd == '') || (ctime == '' && ctimeEnd != '')) {
        alert('请补全创建时间搜索');
        return false;
    }
    if((btime != '' && btimeEnd == '') || (btime == '' && btimeEnd != '')) {
        alert('请补全预定日期搜索');
        return false;
    }

    return true;
}

    //展示处理流程谈层
    function showProcess(oid) {
        if(oid == '') {
            alert('订单号错误');
            return false;
        }

        $.ajax( {
            url:'/orders/showWiringProcess',
            data:{
            oid : oid
            },
            type:'post',
            cache:false,
            dataType:'html',
            success:function(data) {
//                alert(data);
                $('#showProcess').html(data);
                common.showPopById('订单处理流程', 'showProcess');

            },
            error : function() {
                alert("异常！");
                return false;
            }
        });

}
</script>


<div id="showProcess" style="width:800px;height:500px;overflow:auto;display: none"></div>
<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>
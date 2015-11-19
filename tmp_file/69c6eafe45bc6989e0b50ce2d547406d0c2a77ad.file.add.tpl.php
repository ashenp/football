<?php /* Smarty version Smarty-3.1.7, created on 2015-10-08 20:37:25
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\user\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21959560e3b34ac87a8-69398398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69c6eafe45bc6989e0b50ce2d547406d0c2a77ad' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\user\\add.tpl',
      1 => 1444269981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21959560e3b34ac87a8-69398398',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560e3b34f04f9',
  'variables' => 
  array (
    'mobile' => 0,
    'cid' => 0,
    'companys' => 0,
    'company' => 0,
    'district_id' => 0,
    'province_id' => 0,
    'city_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e3b34f04f9')) {function content_560e3b34f04f9($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
if (!is_callable('smarty_function_mgrurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.mgrurl.php';
if (!is_callable('smarty_function_uploadurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.uploadurl.php';
?><?php echo $_smarty_tpl->getSubTemplate ('mgr/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="<?php echo smarty_function_staticurl(array('action'=>"my97/skin/WdatePicker.css",'type'=>"js"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<script src="<?php echo smarty_function_staticurl(array('action'=>"my97/WdatePicker.js"),$_smarty_tpl);?>
"></script>
<div class="main_right" >
  <form method="POST" action="" onsubmit="return checkUser();" >
    <table>
      <tr class="thead">
        <th colspan="2">新增用户</th>
      </tr>
      <tr>
        <td>姓名&nbsp;<em>*</em></td>
        <td><input type="text" id="name" name="name" value="" class="shortBlank" maxlength="30" /></td>
      </tr>
      <tr>
        <td>手机&nbsp;<em>*</em></td>
        <td><input type="text" id="mobile" name="mobile" class="shortBlank" maxlength="15" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
"/>
          <span id="mobileShowPrompt" style="color:red;"></span></td>
      </tr>
      <!-- <?php if (!$_smarty_tpl->tpl_vars['cid']->value){?>
      <tr>
        <td>企业</td>
        <td>
        	<select name="cid">
        		<option value="">请选择</option>
        		<?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['company']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['companys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
$_smarty_tpl->tpl_vars['company']->_loop = true;
?>
        		<option value="<?php echo $_smarty_tpl->tpl_vars['company']->value['company_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
</option>
        		<?php } ?>
        	</select>
        </td>
      </tr>
      <?php }?> -->
      <tr>
        <td>性别</td>
        <td><input type="radio" id="sex" name="sex" value="1" checked/>
          男&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="sex" value="2" />
          女</td>
      </tr>
      <tr>
        <td>出生日期</td>
        <td><input type="text" name="birthday" value="" class="shortBlank"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"  /></td>
      </tr>
      <tr>
        <td>所在地区</td>
        <td><span id="region">
          <select id="province" class="shortSelect province" name="province_id">
            <option value="0">请选择</option>
          </select>
          <select id="city" class="shortSelect city" name="city_id">
            <option value="0">请选择</option>
          </select>
          <select id="district" class="shortSelect district" name="district_id">
            <option value="0">请选择</option>
          </select>
          </span></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" id="email" name="email" value="" class="shortBlank" maxlength="30" onblur="return checkUserEmailConflict()" url="<?php echo smarty_function_mgrurl(array('action'=>'user/checkEmail'),$_smarty_tpl);?>
" />
          <span id="emailShowPrompt" style="color:red;"></span></td>
      </tr>
      <tr>
        <td>备注</td>
        <td><textarea cols="40" name="note"></textarea>
          <span id="emailShowPrompt" style="color:red;"></span></td>
      </tr>
      <tr>
        <td></td>
        <td>
         <input type="submit" value="新增用户并新增卡" name="card">&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="submit" value="新增用户并创建咨询" name="consult">
        </td>
        <!-- <?php if ($_smarty_tpl->tpl_vars['cid']->value){?>
		<input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" />
		<?php }?> -->
      </tr>
    </table>
  </form>
</div>
<input type="hidden" id="uploadFileUrl" value="<?php echo smarty_function_uploadurl(array('module'=>'mgr','sort'=>'image'),$_smarty_tpl);?>
" />
<script src="<?php echo smarty_function_staticurl(array('action'=>"common/region.js"),$_smarty_tpl);?>
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
    });
		
	function checkUser() {
		var name = $("#name").val();
		var sex = $("#sex").val();
		var mobile = $("#mobile").val();
        var email = $("#email").val();
			
		if(name == '') {
			alert('请填写用户姓名');
			return false;
		}
		if(sex !=1 && sex!=2) {
			alert('请选择正确的性别');
			return false;
		}
        var mobileReg = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8,12}$/;
		if(!mobileReg.test(mobile)) {
			alert('请填写正确的手机号！');
			return false;
		}
    if (email) {
      //验证邮箱的正则表达式
      var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
      if(!reg.test(email))
      {
          alert("请输入格式正确的邮箱地址");
          return false;
      }
    };
		return true;
	}
function onlyNum() {
  if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))
    event.returnValue=false;
}
</script> 

<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.7, created on 2015-10-02 16:07:30
         compiled from "C:\Users\pianweiwan\Desktop\customer.cc.bestdo.com\views\mgr\order\book.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11289560e3b424b4544-36567787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33ad9d247dc301382d7686c29e13fb30ee436981' => 
    array (
      0 => 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\views\\mgr\\order\\book.tpl',
      1 => 1443681187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11289560e3b424b4544-36567787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'card_type_id' => 0,
    'card_type_is_limit_use' => 0,
    'card_id' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560e3b4259b12',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e3b4259b12')) {function content_560e3b4259b12($_smarty_tpl) {?><?php if (!is_callable('smarty_function_staticurl')) include 'C:\\Users\\pianweiwan\\Desktop\\customer.cc.bestdo.com\\framework\\plugins\\smarty\\plugins\\function.staticurl.php';
?><?php echo $_smarty_tpl->getSubTemplate ('mgr/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="<?php echo smarty_function_staticurl(array('action'=>"common/jquery.suggest.js"),$_smarty_tpl);?>
"></script>
<link href="<?php echo smarty_function_staticurl(array('action'=>"jquery.suggest.css",'type'=>"css"),$_smarty_tpl);?>
" type="text/css" rel="stylesheet" />
<?php echo $_smarty_tpl->getSubTemplate ('mgr/user/base.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main_right" > 
    <table class="marginTop complaint">
      <tr class="thead">
        <th class="" colspan="2">场地预订</th>
      </tr>
      <tr>
        <td class="w100 center">预订场地:</td>
        <td >
          <input type="text" name="goodsName" value="" id="searchgoods" class="w400"/>
          <input type="hidden" name="mer_item_id" id="mer_item_id" value="">
          <input type="hidden" name="card_type_id" id="card_type_id" value="<?php echo $_smarty_tpl->tpl_vars['card_type_id']->value;?>
">
          <input type="hidden" name="card_type_is_limit_use" id="card_type_is_limit_use" value="<?php echo $_smarty_tpl->tpl_vars['card_type_is_limit_use']->value;?>
">
          <input type="hidden" name="card_id" id="card_id" value="<?php echo $_smarty_tpl->tpl_vars['card_id']->value;?>
">
          <input type="button" class="button subscribeButton" value="预订" onclick="toBook();"/>
        </td>
      </tr>
  </table>
</div>
<iframe src="" id="main" name="main" width="100%" height="100%"  frameborder="0" scrolling="auto"></iframe>
<script type="text/javascript" >
//模糊匹配商品名称
 $("#searchgoods").focus(function() {
        url = '/orders/ajaxGetGoods?card_type_id='+<?php echo $_smarty_tpl->tpl_vars['card_type_id']->value;?>
;
        $(this).suggest(url,{
            onSelect: function() {
                var mer_item_id = this.id;
                $("#mer_item_id").val(mer_item_id);
            }
        });
    });
  $("#main").load(function(){   //一定要有.load等载入完成
	 	h=$(window).height();
	 	h=h-109;
	 	$(this).css('height', h);
	 	
	 	iframe=$(this).contents().find('html');
	 	w=iframe.width();
	 	if(w<1100) {
	 		w=1100;
	 		iframe.css('width', w);
	 	}
});
    
 function toBook() {
 	var mer_item_id = $("#mer_item_id").val(); 
	var card_type_id = $("#card_type_id").val(); 
	var uid = '<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
';
	var card_id = $("#card_id").val();
	var card_type_is_limit_use = $("#card_type_is_limit_use").val();
	if(!mer_item_id) {
		alert('请选择商品');return false;
	}
	if(!card_type_id) {
		alert('缺少卡种ID');return false;
	}
	
	var url = '/orders/getCreateOrderInfo?mer_item_id='+mer_item_id+'&card_type_id='+card_type_id+'&uid='+uid+'&card_id='+card_id+'&card_type_is_limit_use='+card_type_is_limit_use;
	$("#main").attr("src",url);
 }
</script>
<?php echo $_smarty_tpl->getSubTemplate ('mgr/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 <?php }} ?>
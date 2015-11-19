<?php
/**
 * smarty插件--标签调取
 * 使用方法{label assign="datas" labelid=""}
 * 数组返回
 *
 */
function smarty_function_label($params, &$smarty){
	$assign = isset($params['assign']) ? $params['assign'] : '';	
	$labelId = isset($params['labelid']) ? $params['labelid'] : 0;
	$num = isset($params['num']) ? $params['num'] : 0;
	//城市id、运动类型id--在推荐位标签的时候用，其他的不起作用
	$cityId = isset($params['cityId']) ? $params['cityId'] : 0;
	$cid = isset($params['cid']) ? $params['cid'] : 0;
	
	

	//city="auto"
	
	if (!$assign || !$labelId) {
		$res = array();
		$smarty->assign($assign, $res);//自赋值
		
	}
	
	$label = WebApi_Cms_Label::instance()->getLabelByLabelId($labelId);
	
	if (empty($label)) {
		$res = array();
		$smarty->assign($assign, $res);//自赋值
		
	}
	
	$method = $label['method'];//1模型(文档/产品)2SQL 3碎片 4推荐位
	$num = $num > 0 ? $num : $label['num'];//调去数量
	$sequence = $label['sequence'] == 1 ? 'desc' : 'asc';
	$params = array();//置空前台传入的值
	
	if ($method == 1) {//模型
		$model = $label['model'];
		
		$fields = $label['fields'];//筛选字段
		$is_thumb = $label['is_thumb'];//是否缩略图
		$doc_order = $label['doc_order'];//排序字段
		$sequence = $label['sequence'];//排序
		$sequence = $sequence == 1 ? 'desc' : 'asc';
		$is_page = $label['is_page'];//是否分页 ？
		
		
		
		if ($model == 1) {//新闻模型- 得去翻译cid
			$params['cid'] = $label['cid'];//新闻模型的有频道id选项
			$res = WebApi_Cms_Doc::instance()->getCmsDocs($params, $num, $label['fields'], $label['doc_order'], $sequence);
		} elseif ($model == 2) {//场馆
			$res = WebApi_Stadium::instance()->getCmsStadiums($params, $num, $label['fields'], $label['doc_order'], $sequence);
		} elseif ($model == 3) {//教练
			$res = WebApi_Coach::instance()->getCmsCoachs($params, $num, $label['fields'], $label['doc_order'], $sequence);
		}
		
	} elseif ($method == 2) {//sql
		$sql = isset($label['content']) ? $label['content'] : '';
		$sql = strtolower($sql);
		$replace = array(
			'insert' => '',
			'update' => '',
			'delete' => '',
			'drop' => '',
			'create' => '',
			'modify' => '',
			'rename'=>'',
			'alter' => '',
			'cas' => ''
		);
		$sql  = strtr($sql, $replace);//过滤
		
		$res = WebApi_Cms_Label::instance()->query($sql);
		
	} elseif ($method == 3) {//碎片
		$res = isset($label['content']) ? $label['content'] : '';
	} elseif ($method == 4) {//推荐位标签
		$pos = WebApi_Cms_Position::instance()->getPosByPosId($label['pos_id']);
		
		if (empty($pos)) {
			$res = array();
			$smarty->assign($assign, $res);//自赋值
			
		}
		
		/*
		判断该推荐位下有没有cityid 和cid 
		没有：说明这个推荐位不限定城市和运动类型 按照传过来的cityid 和cid 去推荐位和模型关联表中去调取符合条件的模型id 
		有：直接调去推荐位和模型关联表中去调取符合条件的模型id 
		*/
		if ($cityId == 'auto') {
			$cityId = http::COOKIE('cityid') > 0 ? http::COOKIE('cityid') : 76;
		}
		
		$cityId = $pos['city_id'] > 0 ? $pos['city_id'] : $cityId;//城市id
		$cid = $pos['cid'] > 0 ? $pos['cid'] : $cid;//运动类型id
		
		if ($cityId) {//有城市限制的时候 在传参数限制城市
			$params['city_id'] = $cityId;
		}
		
		if ($cid) {//有运动类型限制的时候 在传参数限制运动类型
			$params['cid'] = $cid;
		}
		
		
		$params['model'] = $label['model'];//模型 这个是标签优先于推荐位
		$params['pos_id'] = $pos['pos_id'];//推荐位id
		
		$res = WebApi_Cms_Position_Model::instance()->getCmsPosModelsByParams($params, $num, $label['fields']);
	} else {
		$res = array();
	}
	
	//var_dump($smarty);
	$smarty->assign($assign, $res);//自赋值
	
}

?>
<?php
/**
 * smarty插件--推荐位调取
 * 使用方法{pos assign="datas" posid=""}
 * 数组返回
 *
 */
function smarty_function_pos($params, &$smarty){
	$assign = isset($params['assign']) ? $params['assign'] : '';	
	$posId = isset($params['posid']) ? $params['posid'] : 0;
		
	if (!$assign || !$posId) {
		$docs = array();
	}
	
	$pos = WebApi_Cms_Position::instance()->getPosByPosId($posId);
	if (empty($pos)) {
		$docs = array();
	}
	
	//根据推荐文获取推荐位的新闻/场馆/教练
	$posModels = WebApi_Cms_Position_Model::instance()->getPosModelByPosId($posId);
	$modelIds = array();
	if (!empty($posModels)) {
		foreach ($posModels as $v) {
			$modelIds[] = $v['model_id'];
		}
	}
	
	
	if ($pos['model'] == 1) {//新闻
		$docs = WebApi_Cms_Doc::instance()->getDocsByDocIds($modelIds);
	} elseif ($pos['model'] == 2) {//场馆
		$docs = WebApi_Stadium::instance()->getStadiumInfosByStadiumIds($modelIds);
	} elseif ($pos['model'] == 3) {//教练
		$docs = WebApi_Coach::instance()->getCoachsByCoachIds($modelIds);
	} else {
		$docs = array();
	}
	
	//var_dump($smarty);
	$smarty->assign($assign, $docs);//自赋值
	
}

?>
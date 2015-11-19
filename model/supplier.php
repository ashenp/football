<?php
/**
 * @note 供应商model
 * @author  xuef
 */
class Model_Supplier extends Model {
	public static $type = array(
        '1' => '企业',
        '2' => '个人'
        );
	
	public static $status = array(
        '0' => '未审核',
        '1' => '审核通过',
        '-1' => '禁用',
        '-2' => '删除'
        );

	public function getType() {
		return isset(self::$type[$this->type]) ? self::$type[$this->type] : '未知的性质';
	}

	public function getStatus() {
		return isset(self::$status[$this->status]) ? self::$status[$this->status] : '未知状态';
	}

	public function getArea() {
        $regionIds = array($this->province, $this->city, $this->district);
        $regions = WebApi_Region::instance()->getRegionsByRegionIds($regionIds);
        return $regions[$this->province]['name'] . '-'
               . $regions[$this->city]['name'] . '-'
               . $regions[$this->district]['name'];

	}
}
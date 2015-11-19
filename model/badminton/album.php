<?php
/**
 * 羽毛球场地相册
 * @author xuef
 */
class Model_Badminton_Album extends Model {
	public static $isCover = array(
				0 => '是',
				1 => '否',
			);
	
	public function getCreateTime() {
		return date('Y-m-d H:i:s', $this->create_time);
	}
	public function getUpdateTime() {
		return date('Y-m-d H:i:s', $this->update_time);
	}
	
	
}

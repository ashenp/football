<?php
class Model_Venue_Album extends Model {
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

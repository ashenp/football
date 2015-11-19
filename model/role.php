<?php
/**
 * role对象
 *
 */
class Model_Role extends Model {
	
	public function getNote() {
		return !empty($this->note) ? $this->note : '-';
	}
}
?>
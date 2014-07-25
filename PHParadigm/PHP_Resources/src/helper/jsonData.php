<?php
class jsonData{
	protected $data = array();
	
	public function addData($param=array()) {
		$this->data = array_merge_recursive($this->data, $param);
	}
	
	public function getArray() {
		return $this->data;
	}
	
	function getJson() {
		header("Content-type: application/json; charset=utf-8");
		return json_encode($this->data);
	}
}
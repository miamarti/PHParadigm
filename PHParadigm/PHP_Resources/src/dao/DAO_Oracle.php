<?php
class DAO_Oracle{
	private $connect = false;
	protected $query_success = false;
	
	function __construct() {
		$this->connect = oci_connect("db", "psswd", "schema");
	}
	
	function query_exec($sql){
		$sql = oci_parse($this->connect, $sql);
		if(oci_execute($sql)){
			$this->query_success = true;
		}
		return $sql;
	}
	
	function __destruct(){
		oci_close($this->connect);
	}
}
?>
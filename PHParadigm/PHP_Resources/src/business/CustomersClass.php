<?php
include('../helper/jsonData.php');
class CustomersClass extends DAO_ActiveRecord{
	function __construct(){
		parent::__construct();
	}
	
	function getJson() {
		$array = new jsonData();
		$data = Customers::all();
		foreach ($data as $value) {
			$array->addData(array(array('customer_id'=>$value->customer_id,
								  		'customer_name'=>$value->customer_name,
								  		'customer_fone'=>$value->customer_fone)));
		}
		echo $array->getJson();
	}
	
	function setCustomers($customer_name, $customer_fone=null) {
		$customers = new Customers();
		$customers->customer_name = $customer_name;
		$customers->customer_fone = $customer_fone;
		$customers->save();
	}
}
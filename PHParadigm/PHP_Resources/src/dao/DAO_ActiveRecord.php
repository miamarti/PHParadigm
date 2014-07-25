<?php
use ActiveRecord\ActiveRecordException;
class DAO_ActiveRecord{
	function __construct(){
		require_once 'lib/ActiveRecord.php';
		
		$status = 'production';
		$connections = array('production'=>'mysql://test:E6D0AD7CAA8R@server356/test',
							 'development'=>'mysql://root:12345@localhost/test');
		
		$cfg = ActiveRecord\Config::instance();
	    $cfg->set_model_directory('../model');
	    $cfg->set_connections($connections);
	    $cfg->set_default_connection($status);
	}
}
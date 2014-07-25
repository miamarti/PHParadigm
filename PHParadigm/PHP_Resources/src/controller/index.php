<?php
session_start();
ini_set('zlib.output_compression_level', 9);
ob_start("ob_gzhandler");
header('Content-Encoding: gzip');
	include('../helper/Requirements.php');
	include('FrontController.php');
	include('../helper/httpResponse.php');
	new filter();
	
	$frontController = new FrontController('PHParadigm/PHP_Resources/src/controller/index.php/');
	$frontController->setForbidden(array('DAO_ActiveRecord','DAO_Oracle','Authentication','m2brimagem'));
	$frontController->run();
	
ob_end_flush();
?>
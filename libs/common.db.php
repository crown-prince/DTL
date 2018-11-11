<?php
require_once  'medoo.php';
use Medoo\Medoo;
$database = new Medoo([
	'database_type' => 'mysql',
 	'database_name' => 'dtl',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '123456',
	'charset' => 'utf8',
	//'port' => '',
	'logging' => true,
	
]);
?>
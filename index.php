<?php

if(!file_exists(dirname(__FILE__).'/libs/install.lock')){
  header('Location:install/index.php');
  exit();
}
/*
require 'conf/inc.php';
require PATH.'Libs/Class/page.class.php';
require PATH.'Libs/Function/fun.php';
$b_id=intval(trim($_GET['id']));
if($b_id==0||$b_id==''){
	$sqltype='';
}else{
	$sqltype="and type_id=$b_id";
}
*/
if(!empty($_GET["go"]) && $_GET["go"] =='master'){
	require 'view/master/index.php';
}else{
require 'libs/function.php';
require 'view/home/index.php';
}
?>


<?php

header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
$id=date('YmdHis', time());
$database->insert("replay", array( 
	"id" => $id,
	"bid" => $_GET["sid"] ,
	"name" => $_COOKIE['u_name'],
	"content" => $_POST["content"],
	"time" => time() 
));  

$database->insert("log", array(
 "id" => date('YmdHis', time()),
 "data" => date("Y-m-d"),
 "info" => date('Y-m-d H:i:s',time()).$_COOKIE['u_name']."回复留言,ID:". $_GET["sid"]
));

echo "OK";


?>
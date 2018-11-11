<?php

header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
$database->update("book", array(  
	"type" => $_POST["type"],
	"title" => $_POST["title"],
	"content" => $_POST["content"],
	"name" => $_POST["name"],
	"phone" => $_POST["phone"],
	"email" => $_POST["email"],
	"view" => $_POST["view"]
), array(  
    "id[=]" => $_GET["sid"]  
));  

$database->insert("log", array(
 "id" => date('YmdHis', time()),
 "data" => date("Y-m-d"),
 "info" => date('Y-m-d H:i:s',time()).$_COOKIE['username']."修改情报,ID:". $_GET["sid"]
));

echo "OK";


?>
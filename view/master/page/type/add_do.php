<?php
header("Content-type: text/html; charset=utf-8");

include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";

 $count = $database->count("type", ["id[>]"=>"0"]);
$thisid=$count+1;
$database->insert("type", array(  
    "id" => $thisid,
	"name" => $_POST["name"],
));  


$database->insert("log", array(
 "id" => date('YmdHis', time()),
 "data" => date("Y-m-d"),
 "info" => date('Y-m-d H:i:s',time()).$_COOKIE['username']."新增类型,名称:".$_POST["name"]
)); 
echo "OK";


?>
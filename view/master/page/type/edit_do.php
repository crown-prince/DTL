<?php
header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
 $database->update("type", array(  
   "name" => $_POST["name"]
), array(  
    "id[=]" => $_GET["sid"]  
));  
$database->insert("log", array(
 "id" => date('YmdHis', time()),
 "data" => date("Y-m-d"),
 "info" => date('Y-m-d H:i:s',time()).$_COOKIE['username']."修改分类,名称:".$_POST["name"]
)); 
echo "OK";


?>
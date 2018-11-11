<?php

header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
//echo $_POST["sid"];

$database->delete("book",array("id[=]" => $_POST["sid"])); 

$database->insert("log", array(
 "id" => date('YmdHis', time()),
 "data" => date("Y-m-d"),
 "info" => date('Y-m-d H:i:s',time()).$_COOKIE['username']."删除情报草稿,ID:". $_POST["sid"]
)); 	
  echo "OK";
?>
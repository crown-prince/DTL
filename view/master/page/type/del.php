<?php
header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
$sitename= $database->select("type","name",array("id[=]" => $_POST["sid"]));
$database->insert("log", array(
 "id" => date('YmdHis', time()),
 "data" => date("Y-m-d"),
 "info" => date('Y-m-d H:i:s',time()).$_COOKIE['username']."删除分类:".$sitename[0]
)); 


$database->delete("type",array("id[=]" => $_POST["sid"]));
  echo "OK";
?>
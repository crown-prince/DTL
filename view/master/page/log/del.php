<?php

header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";				
$database->delete("log",array("id[=]" => $_POST["sid"]));
  echo "OK";
?>
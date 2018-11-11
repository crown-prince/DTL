<?php
header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
$database->update("system", array(  
	"sitename" => $_POST["sitename"],
	"domain" => $_POST["domain"],
	"version" => $_POST["version"],
	"keywords" => $_POST["keywords"],
	"description" => $_POST["description"],
	"logourl" => $_POST["logourl"]
), array(  
    "id[=]" => "1" 
));  

$database->insert("log", array(
 "id" => date('YmdHis', time()),
 "data" => date("Y-m-d"),
 "info" => date('Y-m-d H:i:s',time()).$_COOKIE['username']."修改系统配置参数"
));

echo "OK";


?>
<?php

include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";

if(!isset($_POST["uname"])){ 
    exit('非法访问!'); 
}

$uname = htmlspecialchars($_POST["uname"]); 


$database->update("admin", array(  
    "name" => $_POST["name"],
	"phone" => $_POST["phone"],
	"mail" => $_POST["mail"]
 
), array(  
    "uname[=]" => $uname  
));  
 // print_r($datas);


$database->insert("log", array(
 "id" => date('YmdHis', time()),
 "data" => date("Y-m-d"),
 "info" => date('Y-m-d H:i:s',time()).$_COOKIE['username']."修改个人资料"
)); 

 echo "OK";

?>
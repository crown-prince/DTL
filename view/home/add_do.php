<?php
 include "../../libs/function.php";
$id=date('YmdHis', time());
$database->insert("book", array(  
    "id" => $id,
	"type" => $_POST["type"],
	"title" => $_POST["title"],
	"content" => $_POST["content"],
	"name" => $_POST["name"],
	"phone" => $_POST["phone"],
	"email" => $_POST["email"],
	"date" => time() 
	
));
echo "OK";
?>
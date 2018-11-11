<?php
header("Content-type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
session();

 $list = $database->select("type","*");
/*
//替换站点ID为name
for($i=0;$i<count($list);$i++){
	//print_r($list[$i]['site']);
	
	//echo "<br/><hr>";
	$sitename = $database->select("site", ["name"], ["id[=]" => $list[$i]['site']]);
	//print_r($sitename[0]['name']);
	$list[$i]['site']=$sitename[0]['name'];//重新赋值

}
*/
 //print_r($list);
echo json_encode($list);
?>
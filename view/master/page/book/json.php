<?php
header("Content-type: text/html; charset=utf-8");

include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
session();
 $list = $database->select("book","*");
//替换站点ID为name
for($i=0;$i<count($list);$i++){

	$sitename = $database->select("type", "name", ["id[=]" =>"1"]);

	//print_r($sitename[0]["name"]);
	//echo "<hr/>";
	//$list[$i]['type']=$sitename[0]["name"];//重新赋值
	$list[$i]['date']=date('Y-m-d',$list[$i]['date']);

}

 //print_r($list);
echo json_encode($list);
?>
<?php
header("Content-type: text/html; charset=utf-8");

include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
session();
 $list = $database->select("replay","*",["bid[=]" =>$_GET["sid"]]);
//替换站点ID为name
for($i=0;$i<count($list);$i++){


	$list[$i]['time']=date('Y-m-d H:i:s',$list[$i]['time']);

}

 //print_r($list);
echo json_encode($list);
?>
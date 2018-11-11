<?php
 include "../../libs/function.php";
 $list = $database->select("book","*",["view" => "1"]);

//替换数组
for($i=0;$i<count($list);$i++){
	$list[$i]['date']=date('Y-m-d',$list[$i]['date']);
}

echo json_encode($list);
?>
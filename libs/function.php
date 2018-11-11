<?php
header("Content-type: text/html; charset=utf-8");
require_once 'common.db.php';
//获取系统设置参数
$system = $database->select("system","*");
	foreach($system[0] as $key => $value){ 
		$$key=$value; 
		${'system_'.$key}=$value;
	};


//权限控制
function session(){
	if(empty($_COOKIE['username'])){
		header("location:./view/master/page/login/");
		exit;
	};
};
/*
//非登录页执行跳转
if(strstr($_SERVER['PHP_SELF'], 'login') == false){
	session();
};
*/
//获取分类列表
function gettypelist(){
	global $database;
	$typelist= $database->select("type","*",["ORDER" => ["id" => "DESC"]]);
	return $typelist;

}
function typelist(){
	global $database;
	$typelist= $database->select("type","*",["ORDER" => ["id" => "DESC"]]);
	if(count($typelist)>0){
		foreach($typelist as $value){ 
		echo '<dd><a href="?type='.$value["id"].'">'.$value["name"].'</a></dd>'; 
		};
	}else{
		echo "暂无分类";
	}
}
function getIp() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}

function getclassname($cid){
	global $database;
	$msginfo = $database->select("type", "name", ["id[=]" =>$cid]);
	return $msginfo[0];
}
/*

use:
<?php
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
?>
*/

?>
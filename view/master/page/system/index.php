<?php
 include $_SERVER['DOCUMENT_ROOT'].'/libs/function.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>系统基本参数设置</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/src/layui/css/layui.css" media="all" />
	<style type="text/css">
		.layui-table td, .layui-table th{ text-align: center; }
		.layui-table td{ padding:5px; }
	</style>
</head>
<body class="childrenBody">
	<form class="layui-form" id="editchickform">
		<table class="layui-table">
			<colgroup>
				<col width="20%">
				<col width="45%">
				<col>
		    </colgroup>
		    <thead>
		    	<tr>
		    		<th>参数说明</th>
		    		<th>参数值</th>
		    		<th>变量名</th>
		    		<th>说明</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<tr>
		    		<td>系统名称</td>
		    		<td><input type="text" name="sitename" class="layui-input cmsName" lay-verify="required" placeholder="请输入系统名称" value="<?php echo $system_sitename;?>"></td>
		    		<td>sitename</td>
		    		<td></td>
		    	</tr>
		    	<tr>
		    		<td>网站首页</td>
		    		<td><input type="text" name="domain" class="layui-input version" placeholder="请输入网站首页" value="<?php echo $system_domain;?>"></td>
		    		<td>domain</td>
		    	</tr>
		    	<tr>
		    		<td>系统版本</td>
		    		<td><input type="text" name="version" class="layui-input author" placeholder="请输入系统版本" value="<?php echo $system_version;?>"></td>
		    		<td>version</td>
		    		<td></td>
		    	</tr>
		    	<tr>
		    		<td>站点关键字</td>
		    		<td><input type="text" name="keywords" class="layui-input author" placeholder="请输入站点关键字" value="<?php echo $system_keywords;?>"></td>
		    		<td>keywords</td>
		    		<td>使用逗号分隔</td>
		    	</tr>
		    	<tr>
		    		<td>站点描述</td>
		    		<td>
 					<textarea placeholder="请输入站点描述" name="description" class="layui-textarea linksDesc" lay-verify="required"><?php echo $system_description;?></textarea>
		    		</td>
		    		<td>description</td>
		    		<td></td>
		    	</tr>
		    	<tr>
		    		<td>logo网址</td>
		    		<td><input type="text" name="logourl" class="layui-input record" placeholder="请输入logo url" value="<?php echo $system_logourl;?>"></td>
		    		<td>logourl</td>
		    		<td></td>
		    	</tr>
		    </tbody>
		</table>
		<div class="layui-form-item" style="text-align:center;">
			<div class="layui-input-block">
				<a class="layui-btn" lay-submit="" lay-filter="editchick">立即提交</a>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form>
	<blockquote class="layui-elem-quote">说明：<br>
		前台调用方法：<br>
		例如调用站点名称：<br>
		echo $system_sitename;<br>
		即可
	</blockquote>
	<script type="text/javascript" src="/src/layui/layui.js"></script>
	<script type="text/javascript" src="system.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="<?php echo $system_keywords?>" />
  <meta name="description" content="<?php echo $system_description?>"/>
  <title><?php echo $system_sitename?></title>
  <link rel="stylesheet" href="src/layui/css/layui.css">
  <link rel="stylesheet" href="src/css/index.css">
</head>
<body>
<nav>
<ul class="layui-nav layui-bg-black tr" lay-filter="">
	<div class="fl logo" style="padding-top: 10px;">
    <a class="fly-logo" href="<?php echo $system_domain?>" > <img src="<?php echo $system_logourl?>" alt="<?php echo $system_sitename ?>"> </a>
  </div>	    
  <li class="layui-nav-item">
    <a href="javascript:;">控制中心</a>
    <dl class="layui-nav-child"> <!-- 二级菜单 -->
     <?php typelist();?>
    </dl>
  </li>
  <div class="layui-inline search">
  	<div class="layui-input-inline">
		<input type="text" value="" placeholder="IP、域名、文件Hash" class="layui-input search_input">
	</div>
		    <a class="layui-btn layui-btn-normal search_btn">鉴别</a>
	</div>
  <a href="javascript:" class="layui-btn layui-btn-warm add_btn">提交情报</a> 
</ul>
</nav>
<div class="layui-container">
	<div class="layui-row content"></div>
  <div class="layui-row ">
    <div id="page"></div>
  </div>
</div>
<footer>
<p>Copyright &copy; 2018.<a target="_blank" href="http://windsec.net.cn">御风维安</a> All rights reserved.</p>
</footer>
<script src="src/layui/layui.js"></script>
<script src="src/js/index.js"></script>
</body>
</html>
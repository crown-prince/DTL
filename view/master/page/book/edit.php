<?php
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
session();
$msginfo = $database->select("book", "*", ["id[=]" =>$_GET['sid']]);
extract($msginfo[0]); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>编辑情报</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/src/layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="message.css" media="all" />
</head>
<body class="childrenBody">
	<div class="layui-tab">
  <ul class="layui-tab-title">
    <li class="layui-this">情报编辑</li>
    <li>查看回复</li>

  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">
    	<!--情报区域-->
    	<form class="layui-form" style="width:80%;" id="editchickform">
		<br/>
		<div class="layui-form-item">
      <div class="layui-inline" style="width: 40%">   
        <label class="layui-form-label">标题</label>
        <div class="layui-input-block" >
          <input type="text" name="title" class="layui-input linksTime " autocomplete="off" lay-verify="required" value="<?php echo $title;?>" >
        </div>
      </div>
      <div class="layui-inline">
        <label class="layui-form-label">情报分类</label>
        <div class="layui-input-inline">
          <select name="type" class="newsLook" lay-filter="browseLook" lay-verify="required" lay-filter="type">
            <option value="">请选择类型</option>
            <?php 
            foreach(gettypelist() as $value){ 
            echo '<option value="'.$value["id"].'" ';
			echo ($type==$value["id"]) ? "selected" : ""; 
			echo '>'.$value["name"].'</option>';
            } 
            ?>
            </select>
        </div>
      </div>
      
    </div>
    <div class="layui-form-item">
      <div class="layui-form-item">
        <label class="layui-form-label">情报内容</label>
        <div class="layui-input-block">
          <textarea placeholder="请输入情报的正文" name="content" class="layui-textarea linksDesc" lay-verify="required"><?php echo $content;?></textarea>
        </div>
      </div>
    </div>
    <div class="layui-form-item">
      <div class="layui-inline" >   
        <label class="layui-form-label">提交者</label>
        <div class="layui-input-block" >
          <input type="text" name="name" class="layui-input linksTime " lay-verify="required" autocomplete="off" value="<?php echo $name?>"  >
        </div>
      </div>
      <div class="layui-inline" >   
        <label class="layui-form-label">备注信息</label>
        <div class="layui-input-block" >
          <input type="text" name="phone" class="layui-input linksTime "  autocomplete="off" value="<?php echo $phone?>">
        </div>
      </div>
     </div> 
    <div class="layui-form-item">
       <div class="layui-inline" id="email">    
        <label class="layui-form-label">邮件地址</label>
        <div class="layui-input-inline">
          <input type="text" name="email" id="emailinput" class="layui-input linksTime" autocomplete="off" value="<?php echo $email?>">
        </div>
      </div>
      <div class="layui-inline">
        <label class="layui-form-label">首页显示</label>
        <div class="layui-input-inline">
          <select name="view" class="newsLook" lay-filter="browseLook" lay-verify="required" lay-filter="type">
            <option value="1" <?php  echo ($view==1) ? "selected" : ""; ?> >显示</option>
            <option value="0" <?php  echo ($view==0) ? "selected" : ""; ?> >不显示</option>
            </select>
        </div>
      </div>
    </div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<a class="layui-btn" lay-submit="" lay-filter="editchick">审阅完成</a>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form>

    </div>
    <div class="layui-tab-item ">
    	<!--回复区域-->
<div class="layui-fluid layadmin-message-fluid">
    <div class="layui-row">
        <div class="layui-col-md12">
            <form class="layui-form" id="messageform">
                <div class="layui-form-item layui-form-text">
                    <div class="layui-input-block">
                        <textarea name="content" placeholder="请输入内容" class="layui-textarea"></textarea>
                    </div>
                </div>

                <div class="layui-form-item" style="overflow: hidden;">
                    <div class="layui-input-block layui-input-right">
                        <a class="layui-btn" lay-submit="" lay-submit="" lay-filter="message">发表</a>
                    </div>
                    <div class="layadmin-messag-icon">
                        <a href="javascript:;"><i class="layui-icon layui-icon-face-smile-b"></i></a>
                        <a href="javascript:;"><i class="layui-icon layui-icon-picture"></i></a>
                        <a href="javascript:;"><i class="layui-icon layui-icon-link"></i></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-col-md12  message-content" id="flow-manual">
            

        </div>

    </div>
</div>

    </div>
  </div>
</div>

	
	<script type="text/javascript" src="/src/layui/layui.js"></script>
	<script type="text/javascript" src="edit.js"></script>
</body>
</html>
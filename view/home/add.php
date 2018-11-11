<?php
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $sitename;?></title>
  <link rel="stylesheet" href="/src/layui/css/layui.css" media="all" />
</head>
<body>
	<form class="layui-form" id="addmsg">
    <br/>
    <div class="layui-form-item">
      <div class="layui-inline" style="width: 40%">   
        <label class="layui-form-label">标题</label>
        <div class="layui-input-block" >
          <input type="text" name="title" class="layui-input linksTime " autocomplete="off" lay-verify="required" >
        </div>
      </div>
      <div class="layui-inline">
        <label class="layui-form-label">情报分类</label>
        <div class="layui-input-inline">
          <select name="type" class="newsLook" lay-filter="browseLook" lay-verify="required" lay-filter="type">
            <option value="">请选择类型</option>
            <?php 
            foreach(gettypelist() as $value){ 
            echo '<option value="'.$value["id"].'">'.$value["name"].'</option>'; 
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
          <textarea placeholder="请输入情报的正文" name="content" class="layui-textarea linksDesc" lay-verify="required"></textarea>
        </div>
      </div>
    </div>
    <div class="layui-form-item">
      <div class="layui-inline" >   
        <label class="layui-form-label">提交者</label>
        <div class="layui-input-block" >
          <input type="text" name="name" class="layui-input linksTime " lay-verify="required" autocomplete="off"  >
        </div>
      </div>
      <div class="layui-inline" >   
        <label class="layui-form-label">备注信息</label>
        <div class="layui-input-block" >
          <input type="text" name="phone" class="layui-input linksTime "  autocomplete="off" >
        </div>
      </div>
     </div> 
    <div class="layui-form-item">
      <div class="layui-inline">
      <label class="layui-form-label">邮件回复</label>
          <div class="layui-input-block">
            <input type="checkbox" name="closed" class="homePage" lay-filter="closed"  title="开启"  >
          </div>
       </div>
       <div class="layui-inline" id="email" style="display: none;">    
        <label class="layui-form-label">邮件地址</label>
        <div class="layui-input-inline">
          <input type="text" name="email" id="emailinput" class="layui-input linksTime" autocomplete="off">
        </div>
      </div>
    </div>
    <div class="layui-form-item">
      <div class="layui-input-block">
        <a class="layui-btn" lay-submit="" lay-filter="addmsg">提交情报</a>
        <button type="reset" class="layui-btn layui-btn-primary">重新填写</button>
        </div>
    </div>
    <blockquote class="layui-elem-quote">
D天：集普天白帽之力，缔造无贼天下</blockquote>
  </form>
 

<script type="text/javascript" src="/src/layui/layui.js"></script>	
<script type="text/javascript" src="/src/js/add.js"></script>  
</body>
</html>
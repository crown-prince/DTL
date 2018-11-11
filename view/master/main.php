  <?php
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
  $countnum = $database->count("book", ["id[>]"=>"0"]);
  $unview = $database->count("book", ["view"=>"0"]);
  ?>
  <!DOCTYPE html>
  <html lang="zh-cn">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/src/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css" media="all">
    <style>
    .info-box {
        height: 85px;
        background-color: white;
        background-color: #ecf0f5;
    }
    .info-box .info-box-icon {
        border-top-left-radius: 2px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 2px;
        display: block;
        float: left;
        height: 85px;
        width: 85px;
        text-align: center;
        font-size: 45px;
        line-height: 85px;
        background: rgba(0, 0, 0, 0.2);
    }

    .info-box .info-box-content {
        padding: 5px 10px;
        margin-left: 85px;
    }

    .info-box .info-box-content .info-box-text {
        display: block;
        font-size: 14px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-transform: uppercase;
    }

    .info-box .info-box-content .info-box-number {
        
        font-weight: bold;
        font-size: 18px;
    }

    .major {
        font-weight: 10px;
        color: #01AAED;
    }

    .main {
        margin-top: 25px;
    }

    .main .layui-row {
        margin: 10px 0;
    }
</style>
</head>
<body>
    <div class="layui-fluid main">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md3">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color:#00c0ef !important;color:white;"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><h3>情报管理</h3></span>
                        <p>情报总数：<span class="info-box-number"><?php  echo $countnum; ?></span></p>
                        <p>未审阅：<span class="info-box-number"><?php  echo $unview; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-md12">
                <ul class="layui-timeline">
                    <blockquote class="layui-elem-quote explain">
                        <h3>
                            当前版本：V1.5
                        </h3>
                    </blockquote>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                        <div class="layui-timeline-content layui-text">
                            <h3 class="layui-timeline-title">更新日志</h3>
                            <pre class="layui-code">
                                <h3>2018年10月3日</h3>
                                <p>V1.5 Beta版本正式上线</p>
                                
                            </pre>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="/src/layui/layui.js"></script>
    <script>
        layui.use('jquery', function() {
            var $ = layui.jquery;
            $('#test').on('click', function() {
                parent.message.show({
                    skin: 'cyan'
                });
            });
        });
    </script>
</body>
</html>
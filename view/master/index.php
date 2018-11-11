<?php
include $_SERVER['DOCUMENT_ROOT']."/libs/function.php";
session();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $system_sitename;?></title>
  <link rel="stylesheet" href="src/layui/css/layui.css" media="all" />
  <link rel="stylesheet" href="./plugins/font-awesome/css/font-awesome.min.css" media="all" />
  <link rel="stylesheet" href="./src/css/app.css" media="all" />
  <link rel="stylesheet" href="./src/css/themes/red.css" media="all" id="skin" kit-skin />
</head>
<body class="kit-theme">
  <div class="layui-layout layui-layout-admin kit-layout-admin">
    <div class="layui-header">
    <a class="fly-logo" href="<?php echo $system_domain?>" > <img src="http://127.0.0.1/view/master/DTL.png" alt="<?php echo $system_sitename ?>"> </a>
      <ul class="layui-nav layui-layout-left kit-nav">
        <li class="layui-nav-item">
            <a href="/" target="_blank">转到前端</a>
        </li>
        <li class="layui-nav-item">
          <a class="admin-side-full" title="全屏"><i class="fa fa-desktop" aria-hidden="true"></i></a>
        </li>
      </ul>
      <ul class="layui-nav layui-layout-right kit-nav">
        <li class="layui-nav-item">
          <a href="javascript:;">
            <!--img src="" class="layui-nav-img"--> <?php echo $_COOKIE['u_name']?>
          </a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;" kit-target data-options="{url:'<?php echo $system_domain ?>view/master/page/user/userInfo.php',icon:'&#xe658;',title:'基本资料',id:'966'}"><span><i class="layui-icon">&#xe62a;</i> 基本资料</span></a></dd>
            <dd><a href="javascript:;" kit-target data-options="{url:'<?php echo $system_domain ?>view/master/page/user/changePwd.php',icon:'&#xe658;',title:'修改密码',id:'967'}"><span><i class="layui-icon layui-icon-auz"></i> 修改密码</span></a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="javascript:;" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a></li>
      </ul>
    </div>
    <div class="layui-side layui-bg-black kit-side">
      <div class="layui-side-scroll">
        <div class="kit-side-fold"><i class="fa fa-navicon" aria-hidden="true"></i></div>
        <!-- 左侧导航区域-->
        <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
          <li class="layui-nav-item layui-nav-itemed">
            <a class="" href="javascript:;"><i class="fa fa-vimeo-square" aria-hidden="true"></i><span> 信息面板</span></a>
            <dl class="layui-nav-child">
              <dd>
                <a href="javascript:;" kit-target data-options="{url:'<?php echo $system_domain ?>view/master/page/book/',icon:'&#xe62a;',title:'情报管理',id:'1'}">
                  <i class="layui-icon">&#xe62a;</i><span> 情报管理</span></a>
              </dd>
              <dd>
                <a href="javascript:;" kit-target data-options="{url:'<?php echo $system_domain ?>view/master/page/type/',icon:'&#xe62a;',title:'栏目管理',id:'2'}">
                  <i class="layui-icon">&#xe62a;</i><span> 栏目管理</span></a>
              </dd>
              
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;"><i class="fa fa-cog" aria-hidden="true"></i><span> 系统设置</span></a>
            <dl class="layui-nav-child">
              <dd>
              	<a href="javascript:;" kit-target data-options="{url:'<?php echo $system_domain ?>view/master/page/system/',icon:'&#xe631;',title:'系统设置',id:'11'}"><i class="layui-icon">&#xe631;</i><span> 参数设置</span></a>
              </dd>
              <dd>
              	<a href="javascript:;" kit-target data-options="{url:'<?php echo $system_domain ?>view/master/page/log',icon:'&#xe658;',title:'日志记录',id:'12'}"><i class="fa fa-book" aria-hidden="true"></i><span> 日志记录</span></a>
              </dd>
            </dl>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="layui-body" id="container">
      <!-- 内容主体区域 -->
      <div style="padding: 15px;"><i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop">&#xe63e;</i> 加载中，请稍后...</div>
    </div>
    <div class="layui-footer">
      <!-- 底部固定区域 -->
     <p>Copyright 2018.<a target="_blank" href="http://windsec.net.cn">御风维安</a> All rights reserved.</p>
    </div>
  </div>
  <script src="/src/layui/layui.js"></script>
  <script>
    var message;
    layui.config({
      base: 'src/js/',
      version: '1.0.1',
    }).use(['app', 'message'], function() {
      var app = layui.app,
        $ = layui.jquery,
        layer = layui.layer;
      //将message设置为全局以便子页面调用
      message = layui.message;
      //主入口
      app.set({
        minurl:'/view/master/main.php',//主页面
        type: 'iframe'//页面加载方式
      }).init();
      $('.logout').on('click', function() {
        layer.open({
			title: '注销？',
			closeBtn : false,
			content: '确定注销当前账号？'
			,btn: ['注销','取消']
			,btn1: function(){
        $.ajax({            
          url:"/view/master/logout.php",
          success: function(data){
                  if(data.trim()=="OK")//要加上去空格，防止内容里面有空格引起错误。
                  {
                    layui.use('layer', function(){
					layer.msg('已注销，请重新登陆',{shade:0.8});
					});
					//刷新当前页
					setTimeout(function(){  //使用  setTimeout（）方法设定定时2000毫秒
					window.location.href="/";//页面刷新
					},2000);
                  }
                  else
                  {
                      alert(data.trim());
                  }
              }
        });
			},btn2: function(index, layero){  
			    layer.close(index)
			  return false; 
			}    
			});
      });
      $('dl.skin > dd').on('click', function() {
        var $that = $(this);
        var skin = $that.children('a').data('skin');
        switchSkin(skin);
      });
      var setSkin = function(value) {
          layui.data('kit_skin', {
            key: 'skin',
            value: value
          });
        },
        getSkinName = function() {
          return layui.data('kit_skin').skin;
        },
        switchSkin = function(value) {
          var _target = $('link[kit-skin]')[0];
          _target.href = _target.href.substring(0, _target.href.lastIndexOf('/') + 1) + value + _target.href.substring(_target.href.lastIndexOf('.'));
          setSkin(value);
        },
        initSkin = function() {
          var skin = getSkinName();
          switchSkin(skin === undefined ? 'black' : skin);
        }();
        //全屏
         $('.admin-side-full').on('click', function () {
	        var docElm = document.documentElement;
	        //W3C  
	        if (docElm.requestFullscreen) {
	            docElm.requestFullscreen();
	        }
	        //FireFox  
	        else if (docElm.mozRequestFullScreen) {
	            docElm.mozRequestFullScreen();
	        }
	        //Chrome  
	        else if (docElm.webkitRequestFullScreen) {
	            docElm.webkitRequestFullScreen();
	        }
	        //IE11
	        else if (elem.msRequestFullscreen) {
	            elem.msRequestFullscreen();
	        }
	        layer.msg('按Esc即可退出全屏');
	    });
    });
  </script>
</body>
</html>
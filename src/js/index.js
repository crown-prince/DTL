layui.use(['layer', 'form','element', 'laypage'], function(){
  var layer = layui.layer,
  form = layui.form,
  element = layui.element,
  laypage = layui.laypage,
  $ = layui.jquery;

	//加载页面数据
	var linksData = '';
	$.ajax({
		url : "src/json/json.php",
		type : "get",
		dataType : "json",
		success : function(data){
			linksData = data;
			//执行加载数据的方法
			linksList();
		}
	})
//回车键查询
	$(".search_input").bind("keydown",function(e){
	　　// 兼容FF和IE和Opera
	　　var theEvent = e || window.event;
	　　var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
	　　 if (code == 13) {
	　　//回车执行查询
	　　$(".search_btn").click();
	　　}
	});
	//查询
	$(".search_btn").click(function(){
		var newArray = [];
		if($(".search_input").val() != ''){
			var index = layer.msg('查询中，请稍候',{icon: 16,time:false,shade:0.8});
            setTimeout(function(){
            	$.ajax({
					url : "src/json/json.php",
					type : "get",
					dataType : "json",
					success : function(data){
							linksData = data;
						for(var i=0;i<linksData.length;i++){
							var linksStr = linksData[i];
							var selectStr = $(".search_input").val();
		            		function changeStr(data){
		            			var dataStr = '';
		            			var showNum = data.split(eval("/"+selectStr+"/ig")).length - 1;
		            			if(showNum > 1){
									for (var j=0;j<showNum;j++) {
		            					dataStr += data.split(eval("/"+selectStr+"/ig"))[j] + "<i style='color:#03c339;font-weight:bold;'>" + selectStr + "</i>";
		            				}
		            				dataStr += data.split(eval("/"+selectStr+"/ig"))[showNum];
		            				return dataStr;
		            			}else{
		            				dataStr = data.split(eval("/"+selectStr+"/ig"))[0] + "<i style='color:#03c339;font-weight:bold;'>" + selectStr + "</i>" + data.split(eval("/"+selectStr+"/ig"))[1];
		            				return dataStr;
		            			}
		            		}
		            		//IP
		            		if(linksStr.name.indexOf(selectStr) > -1){
			            		linksStr["name"] = changeStr(linksStr.name);
		            		}
		            		
		            		if(linksStr.name.indexOf(selectStr) >-1 ){
		            			newArray.push(linksStr);
		            		}
		            	}
		            	linksData = newArray;
		            	linksList(linksData);
					}
				})
            	
                layer.close(index);
            },2000);
		}else{
			layer.msg("请输入需要查询的内容");
		}
	})

	//添加
	$(".add_btn").click(function(){
		var index = layui.layer.open({
			title : "提交情报",
			type : 2,
			content : "/view/home/add.php",
			success : function(layero, index){
				setTimeout(function(){
					layui.layer.tips('点击此处返回首页', '.layui-layer-setwin .layui-layer-close', {
						tips: 3
					});
				},500)
			}
		})
		//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
		$(window).resize(function(){
			layui.layer.full(index);
		})
		layui.layer.full(index);
	})

  	//修改
	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
$("body").on("click",".chick",function(){ 
			var sid=$(this).attr("data-id");
			var index = layui.layer.open({
				title : "修改联系人",
				type : 2,
				content : "edit.php?sid="+sid,
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回任务列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);

	})


	function linksList(that){
		//渲染数据
		function renderDate(data,curr,limit){
			var dataHtml = '';
			if(!that){
				currData = linksData.concat().splice(curr*limit-limit, limit);
			}else{
				currData = that.concat().splice(curr*limit-limit, limit);
			}
			if(currData.length != 0){
				for(var i=0;i<currData.length;i++){
					dataHtml += '<div class="layui-col-xs9 layui-col-sm6 layui-col-md3 box">'
			    	+'<h2 class="title">'+currData[i].title+'</h2>'
			    	+'<div class="cont">'+currData[i].content+'</div>'
			    	+'<div class="info">'+currData[i].date+'</div>'
			    	+'</div>';
				}
			}else{
				dataHtml = '<tr><td colspan="7">暂无数据</td></tr></div>';
			}
		    return dataHtml;
		}

		//分页
		if(that){
			linksData = that;
		}
		laypage.render({
			elem : "page",
			count : Math.ceil(linksData.length),
			limits:[1,5,10, 20,50, 100],
			layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip'],
			jump : function(obj){
				$(".content").html(renderDate(linksData,obj.curr,obj.limit));
				$('.links_list thead input[type="checkbox"]').prop("checked",false);
		    	form.render();
			}
		})
	}

});
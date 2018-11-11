layui.config({
	base : "js/"
}).use(['form','layer','jquery','laypage'],function(){
	var form = layui.form,
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
		$ = layui.jquery;
  
	//加载页面数据
	var linksData = '';
	$.ajax({
		url : "json.php",
		type : "get",
		dataType : "json",
		success : function(data){
			linksData = data;
			if(window.sessionStorage.getItem("addLinks")){
				var addLinks = window.sessionStorage.getItem("addLinks");
				linksData = JSON.parse(addLinks).concat(linksData);
			}
			//执行加载数据的方法
			linksList();
		}
	})

	//查询
	$(".search_btn").click(function(){
		var newArray = [];
		if($(".search_input").val() != ''){
			var index = layer.msg('查询中，请稍候',{icon: 16,time:false,shade:0.8});
            setTimeout(function(){
            	$.ajax({
					url : "json.php",
					type : "get",
					dataType : "json",
					success : function(data){
						if(window.sessionStorage.getItem("addLinks")){
							var addLinks = window.sessionStorage.getItem("addLinks");
							linksData = JSON.parse(addLinks).concat(data);
						}else{
							linksData = data;
						}
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
		            		//网站名称
		            		if(linksStr.linksName.indexOf(selectStr) > -1){
			            		linksStr["linksName"] = changeStr(linksStr.linksName);
		            		}
		            		//网站地址
		            		if(linksStr.linksUrl.indexOf(selectStr) > -1){
			            		linksStr["linksUrl"] = changeStr(linksStr.linksUrl);
		            		}
		            		//
		            		if(linksStr.showAddress.indexOf(selectStr) > -1){
			            		linksStr["showAddress"] = changeStr(linksStr.showAddress);
		            		}
		            		if(linksStr.linksName.indexOf(selectStr)>-1 || linksStr.linksUrl.indexOf(selectStr)>-1 || linksStr.showAddress.indexOf(selectStr)>-1){
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
	$(".Add_btn").click(function(){
		var index = layui.layer.open({
			title : "添加巡检记录",
			type : 2,
			content : "add.php",
			success : function(layero, index){
				setTimeout(function(){
					layui.layer.tips('点击此处返回友链列表', '.layui-layer-setwin .layui-layer-close', {
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

	//批量删除
	$(".batchDel").click(function(){
		var $checkbox = $('.links_list tbody input[type="checkbox"][name="checked"]');
		var $checked = $('.links_list tbody input[type="checkbox"][name="checked"]:checked');
		if($checkbox.is(":checked")){
			layer.confirm('确定删除选中的信息？',{icon:3, title:'提示信息'},function(index){
				var index = layer.msg('删除中，请稍候',{icon: 16,time:false,shade:0.8});
	            setTimeout(function(){
	            	//删除数据
	            	for(var j=0;j<$checked.length;j++){
	            		for(var i=0;i<linksData.length;i++){
							if(linksData[i].linksId == $checked.eq(j).parents("tr").find(".links_del").attr("data-id")){
								linksData.splice(i,1);
								linksList(linksData);
							}
						}
	            	}
	            	$('.links_list thead input[type="checkbox"]').prop("checked",false);
	            	form.render();
	                layer.close(index);
					layer.msg("删除成功");
	            },2000);
	        })
		}else{
			layer.msg("请选择需要删除的内容");
		}
	})

	//全选
	form.on('checkbox(allChoose)', function(data){
		var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"])');
		child.each(function(index, item){
			item.checked = data.elem.checked;
		});
		form.render('checkbox');
	});

	//通过判断文章是否全部选中来确定全选按钮是否选中
	form.on("checkbox(choose)",function(data){
		var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"])');
		var childChecked = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"]):checked')
		data.elem.checked;
		if(childChecked.length == child.length){
			$(data.elem).parents('table').find('thead input#allChoose').get(0).checked = true;
		}else{
			$(data.elem).parents('table').find('thead input#allChoose').get(0).checked = false;
		}
		form.render('checkbox');
	})
 

  	//修改
	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
$("body").on("click",".chick_edit",function(){ 
			var sid=$(this).attr("data-id");
			var index = layui.layer.open({
				title : "情报审阅",
				type : 2,
				content : "edit.php?sid="+sid,
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回提交列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);

	})


 	//删除
	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
$("body").on("click",".chick_del",function(){ 
			var sid=$(this).attr("data-id");
			layer.open({
			title: '警告！',
			closeBtn : false,
			content: '<div style="text-align:center;color:#F7B824"><i class="layui-icon" style="font-size: 30px; color: #FF5722;">&#x1007;</i> <br/>确定删除此条信息？删除后不可恢复，谨慎操作！！！<br/>'
			,btn: ['确定删除','取消']
			,btn1: function(){
				 
			$.ajax({            
				url:"del.php",
				data:{sid:sid},
				type:"POST",
				dataType:"TEXT",
				success: function(data){
						if(data.trim()=="OK")//要加上去空格，防止内容里面有空格引起错误。
						{
						  layui.use('layer', function(){
						layer.msg('信息已被删除！',{shade:0.8,icon:6});
						});
						//刷新当前页
						setTimeout(function(){  //使用  setTimeout（）方法设定定时2000毫秒
						window.location.reload();//页面刷新
						},2000);
						}
						else
						{
							layui.use('layer', function(){
						layer.msg('删除错误，错误信息：'+data.trim(),{time:5000,shade:0.8,icon:5});
						});
						   
							
						}
				
					}
				
				});
				},btn2: function(index, layero){  
					layer.close(index)
				  return false; 
				}    
			});
		})
  //删除END



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
					dataHtml += '<tr>'
			    	//+'<td><input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose" value="'+currData[i].id+'"></td>'
			    	+'<td>'+currData[i].date+'</td>'
			    	+'<td>'+currData[i].title+'</td>'
			    	+'<td>'+currData[i].type+'</td>';
			    	if(currData[i].view == "1"){
			    		dataHtml +='<td>已审核</td>';
			    	}else{
			    	dataHtml +='<td>未审核</td>';
			    	}
			    	dataHtml +='<td>'
					+  '<a class="layui-btn layui-btn-xs chick_edit "  data-id="'+currData[i].id+'"><i class="layui-icon">&#xe642;</i></a>'
					+  '<a class="layui-btn layui-btn-danger layui-btn-xs chick_del" data-id="'+currData[i].id+'"><i class="layui-icon">&#xe640;</i> </a>'
			        +'</td>'
			    	+'</tr>';
				}
			}else{
				dataHtml = '<tr><td colspan="7">暂无数据</td></tr>';
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
				$(".chick_content").html(renderDate(linksData,obj.curr,obj.limit));
				$('.links_list thead input[type="checkbox"]').prop("checked",false);
		    	form.render();
			}
		})
	}
})

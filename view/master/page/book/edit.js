layui.config({
	base : "js/"
}).use(['form','layer','jquery','layedit','element','flow','laypage'],function(){
	var form = layui.form,
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		layedit = layui.layedit,
		element = layui.element,
		flow = layui.flow,
		laypage = layui.laypage,
		$ = layui.jquery;
			function getQueryVariable(variable)//获取sid
			{
			   var query = window.location.search.substring(1);
			   var vars = query.split("&");
			   for (var i=0;i<vars.length;i++) {
					var pair = vars[i].split("=");
					if(pair[0] == variable){return pair[1];}
			   }
			   return(false);
			}
	var sid=getQueryVariable("sid");
	form.on("submit(editchick)",function(data){
		var formData = new FormData(editchickform) ;//
	var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
			 $.ajax({            
						url:"edit_do.php?sid="+sid,
						type : 'POST', 
						data : formData, 
						// 告诉jQuery不要去处理发送的数据
						processData : false, 
						// 告诉jQuery不要去设置Content-Type请求头
						contentType : false,
						success: function(data){
								if(data.trim()=="OK")
								{
								   setTimeout(function(){
									top.layer.msg("提交成功，信息已修改！");
									top.layer.close(index);
									
									layer.closeAll("iframe");
									//刷新父页面
									parent.location.reload();
								},2000);
								return false;
								}
								else
								{
									setTimeout(function(){
									top.layer.close(index);
									top.layer.msg("提交数据失败，请重新提交，错误信息："+data.trim());
									//刷新父页面
								},2000);
								return false;
									
								}
						
							}
						});
						//end ajax			
 	})
	//end function
	form.on("submit(message)",function(data){
		var formData = new FormData(messageform) ;//
	var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
			 $.ajax({            
						url:"addmessage.php?sid="+sid,
						type : 'POST', 
						data : formData, 
						// 告诉jQuery不要去处理发送的数据
						processData : false, 
						// 告诉jQuery不要去设置Content-Type请求头
						contentType : false,
						success: function(data){
								if(data.trim()=="OK")
								{
								   setTimeout(function(){
									top.layer.msg("提交成功，信息已修改！");
									top.layer.close(index);
									
									layer.closeAll("iframe");
									//刷新父页面
									parent.location.reload();
								},2000);
								return false;
								}
								else
								{
									setTimeout(function(){
									top.layer.close(index);
									top.layer.msg("提交数据失败，请重新提交，错误信息："+data.trim());
									//刷新父页面
								},2000);
								return false;
									
								}
						
							}
						});
						//end ajax			
 	})
	//end function
	//加载页面数据
	//加载页面数据
	var linksData = '';
	$.ajax({
		url : "js.php?sid="+sid,
		type : "get",
		dataType : "json",
		success : function(data){
			linksData = data;
			//执行加载数据的方法
			List();
			
		}
	})

	function List(that){
		flow.load({
            elem: '#flow-manual' //流加载容器
            , isAuto: false
            , isLazyimg: true
            ,end :"<hr/>我是有底线的"
            , done: function (page, next) { //加载下一页
                    var lis = [];
                    for (var i = 0; i < linksData.length; i++) {
                         lis.push('<div class="media-body"><div class="message-title"><h2>'+linksData[i].name+'</h2>'+linksData[i].time+'</div><div class="message-text">'+linksData[i].content+'</div></div>');
                    
                    }
                    console.log(page)
                    next(lis.join(''), page < linksData.length); //假设总页数为 6
            }
        });

	}
			    
	
})
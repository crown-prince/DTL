layui.use(['layer', 'form'], function(){
  var layer = layui.layer,
  form = layui.form;
  $ = layui.jquery;
    //邮箱开关
    form.on('checkbox(closed)', function(data){
      if(data.elem.checked == true){
        $('#email').css('display','inline-block'); 
         $("#emailinput").attr("lay-verify", "required|email");
      }else{
        $('#email').css('display','none'); 
       $("#emailinput").attr("lay-verify", "");
      };
    });    
  form.on("submit(addmsg)",function(data){
  var formData = new FormData(addmsg) ;//
  var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
  $.ajax({            
      url:"add_do.php",
      type : 'POST', 
      data : formData, 
         processData : false, 
         contentType : false,
         success: function(data){
               if(data.trim()=="OK")
               {
                setTimeout(function(){
                  top.layer.msg("提交成功，敬请期待！");
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
                  top.layer.msg("数据提交失败，请重新提交，错误信息：<red>"+data.trim()+"</red>");
          },2000);
              return false; 
          }
      }
      });
//end ajax

      })
//end function

})
//end ui
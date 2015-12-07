<?php
View::tplInclude('Frame/header', ['title' => 'Welcome']);
?>

<link href="/A/CSS/font.css" rel="stylesheet">

<body class="page-body">
<div class="page-loading-overlay"><div class="loader-2"></div></div>
	<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/setting', $data);
?>

	
		<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/headbar', $data);
?>

	
	
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/sitebar', $data);
?>
		

		
		<div class="main-content">
        
        
        
<!-- path nav -->
<div class="page-title">
    <div class="title-env">
        <h1 class="title">用户管理</h1>
        <p class="description">用户增删改查</p>
    </div>

    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
        <li>
            <a href="dashboard-1.html">
            <i class="fa-home"></i>
            Home
            </a>
        </li>
        <li>
            <a href="tables-basic.html">Tables</a>
        </li>
        <li class="active">
            <strong>Data Tables</strong>
        </li>
        </ol>
    </div>
</div>        
<!-- path nav end -->
        
        
<!-- row -->
<div class="row">




<div class="col-sm-12">
<div class="panel panel-default collapsed">
    <div class="panel-heading">
    <h3 class="panel-title"><a data-toggle="panel" href="#">
    <span class="expand-icon">添加</span>
    </a></h3>
        <div class="panel-options">
            <!-- a href="#">
            <i class="linecons-cog"></i>
            </a -->
            <a data-toggle="panel" href="#">
            <span class="collapse-icon">–</span>
            <span class="expand-icon">+</span>
            </a>
            <!-- a data-toggle="reload" href="#">
            <i class="fa-rotate-right"></i>
            </a -->
            <a data-toggle="remove" href="#"> × </a>
        </div>
    </div>

    <div class="panel-body">







<table class="table table-hover table-condensed" >
    <tr>
        <td valign="top"><table class="table table-hover table-condensed" >
                <tr>
                    <td>接口映射</td>
                </tr>
                <tr>
                  <td>排序 ： 
                  <input name="sort" type="text" value="9" /></td>
                </tr>
                <tr>
                    <td>版本 :
                        <input name="v" type="text" value="v6" /></td>
                </tr>
                <tr>
                    <td>接口 :<input type="text" name="api" />
                        </td>
                </tr>
                <tr>
                    <td>名称 :
                        <input name="name" type="text" size="50" /></td>
                </tr>
                <tr>
                    <td>映射 :
                        <input name="ys" type="text" value="r/s" />
                        后台填写</td>
                </tr>
                <tr>
                    <td>调试 :
                        <input name="debug" type="radio" value="0" />
                        关闭
                        <input name="debug" type="radio" value="1" checked="checked"/>
                        开启</td>
                </tr>
                <tr>
                  <td>关闭 :
                    <input name="enable" type="radio" value="1" checked="checked"/>
有效
<input type="radio" name="enable" value="0"/>
无效</td>
                </tr>
                <tr>
                    <td>类型 ： 
                      <br />
                      <input name="type" type="radio" value="GET" checked="checked"/> 
                      GET
<br />
<input type="radio" name="type" value="POST"/> 
POST
<br />
<input type="radio" name="type" value="PUT"/> 
PUT
<br />
<input type="radio" name="type" value="DELETE"/> 
DELETE
<br />
<input type="radio" name="type" value="OTHER"/> 
OTHER</td>
                </tr>
            </table></td>
        <td><table class="table table-hover table-condensed" >
                <tr>
                    <td>模拟提交<br />
                      <textarea class="request" name="request" cols="60" rows="6"></textarea></td>
                </tr>
                <tr>
                    <td>模拟回复<br />
                      <textarea class="response" name="response" cols="60" rows="6"></textarea></td>
                </tr>
                <tr>
                    <td>说明<br />
          <textarea class="dis" name="dis" cols="60" rows="6">模块 :
说明 :
参数 :
成功 :
失败 :</textarea></td>
                </tr>
            </table></td>
    </tr>
</table>
<script type="text/dialog">

this.opt = {				//确定按钮的点击
	ok:function(){
			var res = $.ajax({
			url : '/man/home.apiadd',
			type: 'post',
			data: {
				name 	: $("input[name='name']").val(),
				v 		: $("input[name='v']").val(),
				api 	: $("input[name='api']").val(),
				ys 		: $("input[name='ys']").val(),

				dis 	: $(".dis").val(),
				request : $(".request").val(),
				response: $(".response").val(),
				sort 	: $("input[name='sort']").val(),
				
				
				type 	: $("input[name='type']:checked").val(),
				debug 	: $("input[name='debug']:checked").val(),
				enable 	: $("input[name='enable']:checked").val(),
				},
			dataType: "json",
			async:false,
			cache:false
		}).responseJSON;
		//console.log(res);
		//==========================1
		if(res.code<0){
			alert(res.msg);
			return false;
		}else{
			//location.reload();
			return true;
		}
		return true;
	},
	cancel:function(){},						//点击cancel按钮
	close:function(){},							//关闭对话框 不是回调
}

</script>









    </div>
</div>
</div>




<div class="col-sm-12">

<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">用户列表</h3>
        <div class="panel-options">
            <a  onclick="showAjaxModal();" href="javascript:;">
            <i class="linecons-cog"></i>
            </a>
            <a data-toggle="panel" href="#">
            <span class="collapse-icon">–</span>
            <span class="expand-icon">+</span>
            </a>
            <a data-toggle="reload" href="#">
            <i class="fa-rotate-right"></i>
            </a>
            <a data-toggle="remove" href="#"> × </a>
        </div>
    </div>

    <div class="panel-body">
   <table class="table table-model-2 table-hover" >
	  <tr>
	    <td width="40">
        
<!-- GET -->
<!--a aria-controls="collapseExample" aria-expanded="false" href="#collapseExample31" data-toggle="collapse" class="collapsed"> GET [获取]</a -->
<a aria-controls="collapseExample" aria-expanded="false" href="/man/get"  class="collapsed"> GET [获取]</a>
<div id="collapseExample31" class="collapse in" style=""><br>
    <table class="table table-model-2 table-hover table-condensed table-striped" >
    
        <tr>
        <td>v6 <a class="apiview" sid="1">friend.search</a></td>
        <td>查找好友</td>
        <td>9</td>
        <td>

          <a class="apiviewlog" sid="1" rid=55><span class="glyphicon glyphicon-barcode"></span></a>


          |            <a class="apicenable" sid="1" debug=1><span class="glyphicon glyphicon-ok red"></span></a>
          
                      | <a class="apicenable" sid="1" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>
          
          |  <a class="apiedit" sid="1" rel="55"><span class="glyphicon glyphicon-wrench yellow"></span></a>

        </td>
        </tr>
        <tr>
        <td>v6 <a class="apiview" sid="2">friend.add</a></td>
        <td>添加好友</td>
        <td>9</td>
        <td>

          <a class="apiviewlog" sid="2" rid=55><span class="glyphicon glyphicon-barcode"></span></a>


                      | <a class="apicenable" sid="2" debug=0><span class="glyphicon glyphicon-remove green"></span></a>
          
                      | <a class="apicenable" sid="2" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>
          
          |  <a class="apiedit" sid="2" rel="55"><span class="glyphicon glyphicon-wrench yellow"></span></a>

        </td>
        </tr>
        <tr>
        <td>v6 <a class="apiview" sid="3">friend.getfriends</a></td>
        <td>获取好友列表</td>
        <td>9</td>
        <td>

          <a class="apiviewlog" sid="3" rid=55><span class="glyphicon glyphicon-barcode"></span></a>


                      | <a class="apicenable" sid="3" debug=0><span class="glyphicon glyphicon-remove green"></span></a>
          
                      | <a class="apicenable" sid="3" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>
          
          |  <a class="apiedit" sid="3" rel="55"><span class="glyphicon glyphicon-wrench yellow"></span></a>

        </td>
        </tr>
        <tr>
        <td>v6 <a class="apiview" sid="4">user.gettoken</a></td>
        <td>获取用户token值</td>
        <td>9</td>
        <td>

          <a class="apiviewlog" sid="4" rid=55><span class="glyphicon glyphicon-barcode"></span></a>


          |            <a class="apicenable" sid="4" debug=1><span class="glyphicon glyphicon-ok red"></span></a>
          
                      | <a class="apicenable" sid="4" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>
          
          |  <a class="apiedit" sid="4" rel="55"><span class="glyphicon glyphicon-wrench yellow"></span></a>

        </td>
        </tr>
        <tr>
        <td>v6 <a class="apiview" sid="5">user.getmessage</a></td>
        <td>用户获取消息队列</td>
        <td>9</td>
        <td>

          <a class="apiviewlog" sid="5" rid=55><span class="glyphicon glyphicon-barcode"></span></a>


                      | <a class="apicenable" sid="5" debug=0><span class="glyphicon glyphicon-remove green"></span></a>
          
                      | <a class="apicenable" sid="5" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>
          
          |  <a class="apiedit" sid="5" rel="55"><span class="glyphicon glyphicon-wrench yellow"></span></a>

        </td>
        </tr>
        <tr>
        <td>v6 <a class="apiview" sid="6">friend.test</a></td>
        <td>friend.test</td>
        <td>9</td>
        <td>

          <a class="apiviewlog" sid="6" rid=55><span class="glyphicon glyphicon-barcode"></span></a>


          |            <a class="apicenable" sid="6" debug=1><span class="glyphicon glyphicon-ok red"></span></a>
          
                      | <a class="apicenable" sid="6" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>
          
          |  <a class="apiedit" sid="6" rel="55"><span class="glyphicon glyphicon-wrench yellow"></span></a>

        </td>
        </tr>


    </table>

</div>         
<!-- GET END -->

        
        
        </td>
      </tr>
	  <tr>
	    <td>
        
<!-- POST -->
<!--a aria-controls="collapseExample" aria-expanded="false" href="#collapseExample32" data-toggle="collapse" class="collapsed"> POST [新加]</a-->
            <a aria-controls="collapseExample" aria-expanded="false" href="/man/post"  class="collapsed"> POST [新加]</a>
<div id="collapseExample32" class="collapse " style=""><br>
    <table class="table table-hover table-condensed table-striped table-bordered" >
 
 
 
    </table>

</div>
<!-- POST END -->
        
        
        
        </td>
      </tr>
      
      
      
<tr>
<td>
        
<!-- put -->
<!--a aria-controls="collapseExample" aria-expanded="false" href="#collapseExample33" data-toggle="collapse" class="collapsed"> PUT [更新]</a -->
    <a aria-controls="collapseExample" aria-expanded="false" href="/man/put"  class="collapsed"> PUT [更新]</a>

    <div id="collapseExample33" class="collapse " style=""><br>
    <table class="table table-hover table-condensed table-striped table-bordered" >
      
      
 
      
      
      
      
    </table>

</div>
<!-- PUT END -->
        
        
        
        </td>
      </tr>
      
<tr>
<td>
        
<!-- DELETE -->
<!--a aria-controls="collapseExample" aria-expanded="false" href="#collapseExample34" data-toggle="collapse" class="collapsed"> DELETE [删除]</a-->
    <a aria-controls="collapseExample" aria-expanded="false" href="/man/delete"  class="collapsed"> DELETE [删除]</a>
<div id="collapseExample34" class="collapse " style=""><br>
    <table class="table table-hover table-condensed table-striped table-bordered" >
        

    </table>

</div>
<!-- DELETE END -->
        
        
        
        </td>
      </tr>      
      
<tr>
<td>
        
<!-- OTHER -->
<!--a aria-controls="collapseExample" aria-expanded="false" href="#collapseExample35" data-toggle="collapse" class="collapsed"> OTHER [其他]</a-->
    <a aria-controls="collapseExample" aria-expanded="false" href="/man/other"  class="collapsed"> OTHER [其他]</a>
<div id="collapseExample35" class="collapse " style=""><br>
    <table class="table table-hover table-condensed table-striped table-bordered" >
        

    </table>

</div>
<!-- GET END -->
        
        
        
        </td>
      </tr>
  <tr>
    <td>

      <a class="changedebug" rel=0 rid=55><span class="glyphicon glyphicon-barcode"></span></a> 日志

      <a class="changedebug" rel=0 rid=55><span class="glyphicon glyphicon-ok red"></span></a> 调试
      <a class="changedebug" rel=0 rid=55><span class="glyphicon glyphicon-remove green"></span></a> 非调试

      <a class="changedebug" rel=0 rid=55><span class="glyphicon glyphicon-ok-sign green"></span></a> 有效
      <a class="changedebug" rel=0 rid=55><span class="glyphicon glyphicon-remove-sign red"></span></a> 无效

    </td>
  </tr>
</table>


   
   
   
    </div>
</div>
</div>



</div>
<!-- -->        
        
					

			
			<div class="jumbotron">
				<h1>首页</h1>
				
<p>
<pre>
404
login
logout
</pre>
菜单设置
<pre>
用户管理
接口管理

--针对个人的临时设置
1  ： 显示帮助信息
2 ： 
Notifications

Messages
Events
Updates
SeverUptims



--我的

message
notifications


设置
修改信息
修改密码
退出登陆
锁定
</pre>

                
                
                    
                    </p>
				
			</div>
			

			

		  <?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/footer', $data);
?>
	  </div>
		
			

		
	</div>
	
	
	<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/footerjs', $data);
?>



    
<script language="javascript"> 
function showAjaxModal()
{
	jQuery('#modal-7').modal('show', {backdrop: 'static'});
	
	jQuery.ajax({
		url: "/test.html",
		success: function(response)
		{
			jQuery('#modal-7 .modal-body').html(response);
		}
	});
}

$(document).ready(function(){


}) 
</script> 
    
    	<!-- Modal 7 (Ajax Modal)-->
	<div class="modal fade" id="modal-7">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Dynamic Content</h4>
				</div>
				
				<div class="modal-body">
				
					Content is loading...
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-info">Save changes</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

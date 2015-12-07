<?php
View::tplInclude('Frame/header', ['title' => 'Welcome']);
?>

<link href="/A/CSS/font.css" rel="stylesheet">

<body class="page-body">
<!-- div class="page-loading-overlay"><div class="loader-2"></div></div -->

	
	
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		

		
		<div class="main-content">
        
        
        
<!-- path nav -->
<div class="page-title">
    <div class="title-env">
        <h1 class="title">接口管理</h1>
        <p class="description">接口管理</p>
    </div>

    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
        <li>
            <a href="http://m.so/s">
            <i class="fa-home"></i>
            Home
            </a>
        </li>
        <li>接口</li>
        </ol>
    </div>
</div>        
<!-- path nav end -->
        
        
<!-- row -->
<div class="row">




<div class="col-sm-12">
<div class="panel panel-default collapsed">
    <div class="panel-heading">
    <h3 class="panel-title"><a class="btn btn-info btn-lg btn-icon icon-left" data-toggle="panel" href="#">
    <span class=" expand-icon">添加新接口</span></a></h3>
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






<form role="form" class="form-horizontal">

<table>
    <tr>
        <td valign="top"><table class="table table-model-2 table-hover">
                <tr>
                  <td>排序 ： 
                    <input name="sort" type="text" value="9" /></td>
                </tr>
                <tr>
                    <td>版本 :
                        <input name="v" type="text" value="v" /></td>
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


<div class="form-group-separator"></div>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <div class="input-group input-group-lg input-group-minimal">
            <div class="form-group">
            <a class="btn btn-success form_submit" type="submit">确定</a>
            <button class="btn btn-white" type="reset">重置</button>
            </div>

        </div>
    </div>
</div>
</form>

<script type="text/dialog">

		
</script>









    </div>
</div>
</div>




<div class="col-sm-8">

<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">接口列表 </h3>

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
    
<!--  sham begin -->
<div class="search-results">
						
							<div class="tabs-vertical-env">
							
								<ul class="nav tabs-vertical">
									<li class="active">
										<a href="#GET" data-toggle="tab">
											<i class="fa-globe visible-xs"></i>
											<span class="hidden-xs">GET</span>
										</a>
									</li>
									<li>
										<a href="#POST" data-toggle="tab">
											<i class="fa-picture visible-xs"></i>
											<span class="hidden-xs">POST</span>
										</a>
									</li>
									<li>
										<a href="#PUT" data-toggle="tab">
											<i class="fa-docs visible-xs"></i>
											<span class="hidden-xs">PUT</span>
										</a>
									</li>
									<li>
										<a href="#DELETE" data-toggle="tab">
											<i class="fa-video visible-xs"></i>
											<span class="hidden-xs">DELETE</span>
										</a>
									</li>
									<li>
										<a href="#OTHER" data-toggle="tab">
											<i class="fa-users visible-xs"></i>
											<span class="hidden-xs">OTHER</span>
										</a>
									</li>
								</ul>
								
								<div class="tab-content">
									
									<!-- Sample Search Results Tab -->
									<div class="tab-pane active" id="GET">
  
                                    
<table class="table table-model-2 table-hover table-striped" >
<?php
foreach($rc as $key=>$value){
if($value['type'] === 'GET'){
?>
        <tr>
        <td><?=$value['v']?> : <a href="javascript:;" class="apiview" relid="<?=$value['id']?>"><?=$value['api']?></a></td>
        <td><?=$value['name']?></td>
        <td><?=$value['sort']?></td>
        <td>
<a href="javascript:;" class="apiviewlog" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-barcode"></span></a>
<?php
if($value['debug']){
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-ok red"></span></a>
<?php
}else{
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-remove green"></span></a>
<?php
}
?>
|  <a href="javascript:;" class="apiedit" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-wrench yellow"></span></a>
<!--  | <a class="apicenable" sid="1" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>-->
        </td>
        </tr>
<?php
}
}
?>        
</table>                                    
                                    
									</div>
									
									<!-- Search Results Tab -->
									<div class="tab-pane" id="POST">
<table class="table table-model-2 table-hover table-condensed table-striped" >
<?php
foreach($rc as $key=>$value){
if($value['type'] === 'POST'){
?>
        <tr>
        <td><?=$value['v']?> <a href="javascript:;" class="apiview" relid="<?=$value['id']?>"><?=$value['api']?></a></td>
        <td><?=$value['name']?></td>
        <td>9</td>
        <td>
<a href="javascript:;" class="apiviewlog" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-barcode"></span></a>
<?php
if($value['enable']){
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-ok red"></span></a>
<?php
}else{
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-remove green"></span></a>
<?php
}
?>
|  <a href="javascript:;" class="apiedit" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-wrench yellow"></span></a>
<!--  | <a class="apicenable" sid="1" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>-->
        </td>
        </tr>
<?php
}
}
?>        
</table>             
									</div>
									
									<!-- Search Results Tab -->
									<div class="tab-pane" id="PUT">
<table class="table table-model-2 table-hover table-condensed table-striped" >
<?php
foreach($rc as $key=>$value){
if($value['type'] === 'PUT'){
?>
        <tr>
        <td><?=$value['v']?> <a href="javascript:;" class="apiview" relid="<?=$value['id']?>"><?=$value['api']?></a></td>
        <td><?=$value['name']?></td>
        <td>9</td>
        <td>
<a href="javascript:;" class="apiviewlog" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-barcode"></span></a>
<?php
if($value['enable']){
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-ok red"></span></a>
<?php
}else{
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-remove green"></span></a>
<?php
}
?>
|  <a href="javascript:;" class="apiedit" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-wrench yellow"></span></a>
<!--  | <a class="apicenable" sid="1" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>-->
        </td>
        </tr>
<?php
}
}
?>        
</table> 
									</div>
									
									<!-- Search Results Tab -->
									<div class="tab-pane" id="DELETE">
<table class="table table-model-2 table-hover table-condensed table-striped" >
<?php
foreach($rc as $key=>$value){
if($value['type'] === 'DELETE'){
?>
        <tr>
        <td><?=$value['v']?> <a href="javascript:;" class="apiview" relid="<?=$value['id']?>"><?=$value['api']?></a></td>
        <td><?=$value['name']?></td>
        <td>9</td>
        <td>
<a href="javascript:;" class="apiviewlog" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-barcode"></span></a>
<?php
if($value['enable']){
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-ok red"></span></a>
<?php
}else{
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-remove green"></span></a>
<?php
}
?>
|  <a href="javascript:;" class="apiedit" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-wrench yellow"></span></a>
<!--  | <a class="apicenable" sid="1" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>-->
        </td>
        </tr>
<?php
}
}
?>        
</table> 
									</div>
									
									<!-- Search Results Tab -->
									<div class="tab-pane" id="OTHER">
<table class="table table-model-2 table-hover table-condensed table-striped" >
<?php
foreach($rc as $key=>$value){
if($value['type'] === 'OTHER'){
?>
        <tr>
        <td><?=$value['v']?> <a href="javascript:;" class="apiview" relid="<?=$value['id']?>"><?=$value['api']?></a></td>
        <td><?=$value['name']?></td>
        <td>9</td>
        <td>
<a href="javascript:;" class="apiviewlog" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-barcode"></span></a>
<?php
if($value['enable']){
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-ok red"></span></a>
<?php
}else{
?>
|  <a href="javascript:;" class="apicenable" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-remove green"></span></a>
<?php
}
?>
|  <a href="javascript:;" class="apiedit" relid="<?=$value['id']?>"><span class="glyphicon glyphicon-wrench yellow"></span></a>
<!--  | <a class="apicenable" sid="1" enable=1><span class="glyphicon glyphicon-ok-sign green"></span></a>-->
        </td>
        </tr>
<?php
}
}
?>        
</table>
									</div>
								</div>
								
							</div>
							
						</div>
<!--  sham end -->
    
    
    
    
    <table>
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




<div class="col-sm-4">

<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">接口列表 </h3>

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
    
<!--  sham begin -->
<div class="search-results">
						
							<div class="tabs-vertical-env">
							
								23123
							
								
							  <div class="tab-content">
									
									<!-- Sample Search Results Tab -->
								  <div class="tab-pane active" id="GET"></div>
</div>
								
			  </div>
							
						</div>
<!--  sham end --></div>
</div>
</div>





<div class="col-sm-12">

<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title"> 校验工具  </h3>

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
    
<!--  sham begin -->
<div class="search-results">
						
							<div class="tabs-vertical-env">
							   <a href="http://www.sojson.com/" target="_blank">http://www.sojson.com/</a>
								
							</div>
							
						</div>
<!--  sham end -->
    
    
    
    
    										

    
    
   

  
   
   
    </div>
</div>
</div>


</div>
<!-- -->        
        
					

			
			

			

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


function showAjaxModal(url,title)
{
	//console.log(url);
	jQuery('#modal-7').modal('show', {backdrop: 'static'});
	jQuery.ajax({
		url: url,
		success: function(response)
		{
			console.log(url);
			jQuery('#modal-7 .modal-title').html(title);
			jQuery('#modal-7 .modal-body').html(response);
			var JS = $("script[type='text/dialog']").html();
			eval(JS);												//sytle
		}
	});
}

function showAjaxModal2(url,title)
{
	//console.log(url);
	jQuery('#modal-2').modal('show', {backdrop: 'static'});
	jQuery.ajax({
		url: url,
		success: function(response)
		{
			console.log(url);
			jQuery('#modal-2 .modal-title').html(title);
			jQuery('#modal-2 .modal-body').html(response);
			var JS = $("script[type='text/dialoglist_edit']").html();
			//console.log(JS);
			eval(JS);												//sytle
		}
	});
}

$(document).ready(function(){

//apiviewlog
//apicenable
//apiedit

		$('.apiviewlog').click(function(){
			
			
			showAjaxModal('/s/api/list/json/'+$(this).attr("relid"),'查看日志');
		});
		
		
		$('.apicenable').click(function(){
			
			
			
			var res = $.ajax({
				url : '/s/api/list/de/'+$(this).attr("relid"),
				type: 'post',
				data: {
					groupid : $(this).attr("relid"),
					enable 	: $(this).attr("cenable"),
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
				location.reload();
				return true;
			}			
		});
		
		
		$('.apiedit').click(function(){
			
			showAjaxModal2('/s/api/list/ed/'+$(this).attr("relid"),'编辑');
			event.stopPropagation();
		});
		
		
		$('.apiview').click(function(){
			
			
			showAjaxModal2('/s/api/list/vf/'+$(this).attr("relid"),'模拟');
event.stopPropagation();		});


		//添加新数据
		$('.form_submit').click(function(){
			var res = $.ajax({
				url : '/s/api/list',
				type: 'post',
				data: {
					name 	: $("input[name='name']").val(),
					v 		: $("input[name='v']").val(),
					api 	: $("input[name='api']").val(),
	
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
				location.reload();
				return true;
			}
		});




}) 
</script> 
    
	<!-- Modal 2 (Custom Width)-->
	<div class="modal fade custom-width" id="modal-2">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Custom Width Modal</h4>
				</div>
				
				<div class="modal-body">
					Any type of width can be applied.
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white " data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-info modal_ok">Save changes</button>
				</div>
			</div>
		</div>
	</div>    
    
    
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

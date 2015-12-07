<?php
View::tplInclude('Frame/header', ['title' => 'Welcome']);
?>



<body class="page-body">
<!--div class="page-loading-overlay"><div class="loader-2"></div></div -->
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
        <h1 class="title">用户组管理</h1>
        <p class="description">用户组增删改查</p>
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
    <h3 class="panel-title"><a class="btn btn-info btn-lg btn-icon icon-left" data-toggle="panel" href="#">
    <span class=" expand-icon">添加用户组</span></a></h3>
    
    
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
								
								<div class="form-group">
									<label class="col-sm-2 control-label">组名</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="groupname" class="form-control no-right-border" placeholder="组名">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">标识</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="groupchr" class="form-control no-right-border" placeholder="标识">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">排序</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="sort" class="form-control no-right-border" placeholder="排序">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
								
								
								
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
   

<table class="table table-model-2 table-hover">
<thead>
<tr>
<th width=50>id</th>
<th>用户组名称</th>
<th>标识</th>
<th>排序</th>
<th width=70>有效？</th>
<th width=150>操作</th>
</tr>
</thead>
<tbody>

<?php
foreach($rc as $key=>$value){
?>

<tr>
<td><?=$value['groupid']?></td>
<td><?=$value['groupname']?></td>
<td><?=$value['groupchr']?></td>
<td><?=$value['sort']?></td>
<td><input type="checkbox" class="iswitch iswitch-red changeenableflag" cenable="<?=$value['enable']?>" relid="<?=$value['groupid']?>" <?=$value['enable']?'checked="CHECKED"':''?>></td>
<td>
<a class="btn btn-secondary btn-sm btn-icon icon-left" onClick="showAjaxModal('/s/user/grouplist/ed/<?=$value['groupid']?>','修改用户组');" href="javascript:;"> 修改 </a>
<a class="btn btn-info btn-sm btn-icon icon-left confirm" ref="/s/user/grouplist/de/<?=$value['groupid']?>">删除</a>
</td>
</tr>
<?php
}
?>


</tbody>
</table>
   
   
   
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

$(document).ready(function(){
	
		$('.confirm').click(function(){
			 var r=confirm("删除这条记录？")
			if (r==true)
			{
				window.location.href = $(this).attr("ref");
			}
			else
			{
				return false;
			}
		});

		$('.changeenableflag').click(function(){
			var res = $.ajax({
				url : '/home/groupenablechange',
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
			
        })
				
	//提交添加组
		$('.form_submit').click(function(){
			var res = $.ajax({
				url : '/s/user/grouplist',
				type: 'post',
				data: {
					groupname 	: $("input[name='groupname']").val(),
					groupchr 	: $("input[name='groupchr']").val(),
					sort 		: $("input[name='sort']").val(),
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
			
        })

}) 
</script> 
    
    	<!-- Modal 7 (Ajax Modal)-->
	<div class="modal fade" id="modal-7">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">title</h4>
				</div>
				
				<div class="modal-body">
				
					Content is loading...
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white modal_close" data-dismiss="modal">关闭</button>
					<button type="button" class="btn btn-info modal_ok">确定</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

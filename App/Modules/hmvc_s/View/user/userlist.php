<?php
View::tplInclude('Frame/header', $data);
?>



<body class="page-body">
<div class="page-loading-overlay"><div class="loader-2"></div></div>
<?php

View::tplInclude('Frame/setting', $data);
?>


<?php

View::tplInclude('Frame/headbar', $data);
?>

	
	
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
<?php
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
    <h3 class="panel-title"><a class="btn btn-info btn-lg btn-icon icon-left" data-toggle="panel" href="#">
    <span class=" expand-icon">添加新用户</span></a></h3>
    
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
									<label class="col-sm-2 control-label">登陆名</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="uname" class="form-control no-right-border" placeholder="登陆名">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">密码</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="pwd" class="form-control no-right-border" placeholder="密码">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">确认密码</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="pwdre" class="form-control no-right-border" placeholder="确认密码">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">真实姓名</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="tname" class="form-control no-right-border" placeholder="真实姓名">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
                                
                                
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">用户组</label>
									<div class="col-sm-10">
                                    
<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#sboxit-1").selectBoxIt().on('open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
											});
										});
									</script>
									
									<select name="groupid" class="form-control" id="sboxit-1">
                                    <?php
                                    foreach($grouplist as $key=>$value){
									?>
										<option value="<?=$value['groupid']?>"><?=$value['groupname']?></option>
                                    <?php
										}
									?>
									</select>

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
<th>id</th>
<th>登陆名</th>
<th>真实姓名</th>
<th>用户组</th>
<th>注册时间</th>
<th>登陆时间</th>
<th>登陆ip</th>
<th width=70>有效？</th>
<th width=250>操作</th>
</tr>
</thead>
<tbody>

<?php
foreach($list as $key=>$value){
?>
<tr>
<td><?=$value['uid']?></td>
<td><?=$value['uname']?></td>
<td><?=$value['tname']?></td>
<td><?=$value['groupid']?></td>
<td><?=date('Y-m-d:His',$value['regtime'])?></td>
<td><?=date('Y-m-d:His',$value['logtime'])?></td>
<td><?=$value['logip']?></td>
<td><input type="checkbox" class="iswitch iswitch-red changeenableflag" cenable="<?=$value['enable']?>" relid="<?=$value['uid']?>" <?=$value['enable']?'checked="CHECKED"':''?>></td>
<td>
<a class="btn btn-secondary btn-sm btn-icon icon-left" onClick="showAjaxModal('/s/user/userlist/vf/<?=$value['uid']?>','显示日志');" href="javascript:;"> 显示日志 </a>
<a class="btn btn-secondary btn-sm btn-icon icon-left" onClick="showAjaxModal('/s/user/userlist/ed/<?=$value['uid']?>','修改用户');" href="javascript:;"> 修改 </a>
<a class="btn btn-info btn-sm btn-icon icon-left confirm" relid="<?=$value['uid']?>">删除</a>


</td>
</tr>
<?php }?>


<tr>
  <td colspan="9" align="right">
 <!-- 
  <div id="example-1_paginate" class="dataTables_paginate paging_simple_numbers">
<ul class="pagination">
<li id="example-1_previous" class="paginate_button previous disabled" aria-controls="example-1" tabindex="0">
<a href="#">Previous</a>
</li>
<li class="paginate_button active" aria-controls="example-1" tabindex="0">
<a href="#">1</a>
</li>
<li class="paginate_button " aria-controls="example-1" tabindex="0">
<a href="#">2</a>
</li>
<li class="paginate_button " aria-controls="example-1" tabindex="0">
<a href="#">3</a>
</li>
<li class="paginate_button " aria-controls="example-1" tabindex="0">
<a href="#">4</a>
</li>
<li class="paginate_button " aria-controls="example-1" tabindex="0">
<a href="#">5</a>
</li>
<li class="paginate_button " aria-controls="example-1" tabindex="0">
<a href="#">6</a>
</li>
<li id="example-1_next" class="paginate_button next" aria-controls="example-1" tabindex="0">
<a href="#">Next</a>
</li>
</ul>
</div>
-->  
  </td>
  </tr>

</tbody>
</table>
   
   
   
    </div>
</div>
</div>



</div>
<!-- -->        
        
			

			

<?php
View::tplInclude('Frame/footer', $data);
?>
	  </div>
		
			

		
	</div>
	
	
<?php
View::tplInclude('Frame/footerjs', $data);
?>

<!-- Imported styles on this page -->
	<link rel="stylesheet" href="/assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="/assets/js/select2/select2.css">
	<link rel="stylesheet" href="/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="/assets/js/multiselect/css/multi-select.css">

	<!-- Imported scripts on this page -->
	<script src="/assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="/assets/js/datepicker/bootstrap-datepicker.js"></script>
	<script src="/assets/js/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="/assets/js/colorpicker/bootstrap-colorpicker.min.js"></script>
	<script src="/assets/js/select2/select2.min.js"></script>
	<script src="/assets/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<script src="/assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="/assets/js/typeahead.bundle.js"></script>
	<script src="/assets/js/handlebars.min.js"></script>
	<script src="/assets/js/multiselect/js/jquery.multi-select.js"></script>

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
			var uid = $(this).attr("relid");
			 var r=confirm("删除这条记录？")
			if (r==true)
			{
				//删除操作
				var res = $.ajax({
					url : '/s/user/userlist/de/'+uid,
					type: 'post',
					data: {
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
			}
			else
			{
				return false;
			}
		});




		//更改用户状态
		$('.changeenableflag').click(function(){
			var res = $.ajax({
				url : '/s/user/userlist/cf/'+$(this).attr("relid"),
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
				//location.reload();
				return true;
			}
			
        })

	
		//提交添加组
		$('.form_submit').click(function(){
			if($("input[name='pwd']").val() != $("input[name='pwdre']").val()){
				alert('两次密码不一致');
				return false;
			}

			if($("input[name='pwd']").val().length < 6){
				alert('长度太短');
				return false;
			}
			
			
			var res = $.ajax({
				url : '/s/user/userlist',
				type: 'post',
				data: {
					uname 	: $("input[name='uname']").val(),
					pwd 	: $("input[name='pwd']").val(),
					tname 	: $("input[name='tname']").val(),
					groupid : $("select[name='groupid']").val(),
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
					<h4 class="modal-title">Dynamic Content</h4>
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

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
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title"><a data-toggle="panel" href="#">
    <span class="expand-icon">修改用户资料</span>
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


<form role="form" class="form-horizontal">
								
								<div class="form-group">
									<label class="col-sm-2 control-label">登陆名</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="uname" class="form-control no-right-border" placeholder="登陆名" disabled value="<?=$user['uname']?>">
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
											<input type="password" name="pwd" class="form-control no-right-border" placeholder="密码">
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
											<input type="password" name="pwdre" class="form-control no-right-border" placeholder="确认密码">
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
											<input name="tname" class="form-control no-right-border" placeholder="真实姓名" value="<?=$user['tname']?>">
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



    
<script language="javascript"> 
$(document).ready(function(){
	
        $('.form_submit').click(function(){
			if(	$("input[name='pwd']").val() != $("input[name='pwdre']").val()){
				alert('两次密码不一样');
			}
			var res = $.ajax({
				url : '/s/user/usereditprofile',
				type: 'post',
				data: {
					uname 	: $("input[name='uname']").val(),
					pwd 	: $("input[name='pwd']").val(),
					pwdre 	: $("input[name='pwdre']").val(),
					tname 	: $("input[name='tname']").val(),
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
    
    
</body>
</html>

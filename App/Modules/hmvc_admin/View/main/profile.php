<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>AdminLTE | General UI</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<link href="http://cdn.bootcss.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- font Awesome -->
	<link href="http://cdn.bootcss.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="/assets/LTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<!-- jQuery 2.0.2 -->
	<script src="http://cdn.bootcss.com/jquery/2.0.2/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>

	<![endif]-->
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<?php W('head');?>

<div class="wrapper row-offcanvas row-offcanvas-left">
	  <!-- Left side column. contains the logo and sidebar -->
	  <?php W('left',[]);?>

	  <!-- Right side column. Contains the navbar and content of the page -->
	  <aside class="right-side">
			<!-- Content Header (Page header) -->
			<?php W('right_content_head',[]);?>
			<?php W('right_content_info',[]);?>

			<!--#include virtual = "/box/Usergroupadd" -->




			<!-- Main content -->
			<section class="content">
				  <!-- h2 class="page-header">Alerts and Callouts</h2 -->

				  <!-- END ALERTS AND CALLOUTS -->
 				  <div class="row">
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>

						<div class="col-xs-6">
							  <div class="box box-primary">
									<div class="box-header">
										  <h3 class="box-title">内容</h3>
										
									</div><!-- /.box-header -->
									<div class="box-body table-responsive">
                                    
                                    
                                   
                    <div class="row">
                      <form action="" method="post">
                           
							  <div class="col-md-2">
									
                                    <div class=" pull-right">昵称 :</div>
							  </div>
							  <div class="col-md-9">
								  <div class="form-group">
									 <input type="email" class="form-control dialoggroupname" name="nickName" value="<?=$res['nickName']?>">
								  </div>
							  </div>



							<div class="col-md-2">
								<div class=" pull-right">真实姓名 :</div>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input type="email" class="form-control dialoggroupname" name="nickName" value="<?=$res['trueName']?>">
								</div>
							</div>


								<div class="col-md-2">
									<div class=" pull-right">原密码 :</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<input type="email" class="form-control pwd" name="password">
									</div>
								</div>


                              <div class="col-md-2"> 
                                    <div class=" pull-right">新密码 :</div>
                              </div>
							<div class="col-md-9">
								<div class="form-group">
									<input type="email" class="form-control pwdre" name="passwordre">
								</div>
							</div>
					      <div class="col-md-2"> 
                                   <div class=" pull-right"> 确认新密码 :</div>
                              </div>
							<div class="col-md-9">
								<div class="form-group">
									<input type="email" class="form-control pwdre2" name="passwordre2">
								</div>
							</div>
    						<div class="col-md-12"> 
                            
									<center><button type="submit" class="btn btn-primary" id="exampleInputEmail1">提交</button></center>
									
								
							</div>

                
                      </form>
                </div>

                                
                     
									</div><!-- /.box-body -->


							  </div><!-- /.box -->
						</div>
                        
<div class="col-xs-6">
<!-- /.box -->
</div>
                                  
                        
                        
                        
                        
				  </div>

				  <!-- END TYPOGRAPHY -->
			</section><!-- /.content -->

			<!-- 页脚 -->
			<!--#include virtual = "../sp/right_content_footer.shtml" -->
			<?php W('right_content_footer',[]);?>
	  </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- Bootstrap -->
<script src="http://cdn.bootcss.com/bootstrap/3.0.3/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="/assets/LTE/js/AdminLTE/app.js" type="text/javascript"></script>

<script type="text/javascript">
	  $(document).ready(function(){
		  //调用
		  $('.shamedit').click(function(){

			  var relid = $(this).attr("relid");
			  showAjaxModal('/admin/user/group/dialog/'+relid,'编辑用户组')
		  });

		  $('.shamdelete').click(function(){
			  if (confirm("确认要删除？")) {
				  var relid = $(this).attr("relid");
				  var res = $.ajax({
					  url : '/admin/user/group/delete/'+relid,
					  type: 'get',
					  data: {},
					  dataType: "json",
					  async:false,
					  cache:false
				  }).responseJSON;
				  //console.log(res);
				  //==========================

				  if(res.code<0){
					  alert(res.msg);
					  return false;
				  }else{
					  //location.href = "/admin/main/index/";
					  location.reload();
					  return true;
				  }
			  }
		  });

		  $('.changestate').click(function(){

			  var relid = $(this).attr("relid");

			  var res = $.ajax({
				  url : '/admin/user/group/states/'+relid,
				  type: 'get',
				  data: {},
				  dataType: "json",
				  async:false,
				  cache:false
			  }).responseJSON;
			  //console.log(res);
			  //==========================

			  if(res.code<0){
				  alert(res.msg);
				  return false;
			  }else{
				  //location.href = "/admin/main/index/";
				  location.reload();
				  return true;
			  }
		  });

		  $(".trigercookie").on('ifClicked', function(event){
			  var rel = event.currentTarget.attributes.rel.nodeValue;
			  setc(rel);
			  location.reload();
		  });


	  })
</script>

</body>
</html>
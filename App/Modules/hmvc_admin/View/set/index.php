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
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	  <![endif]-->
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<?php W('head');?>

<div class="wrapper row-offcanvas row-offcanvas-left">
	  <!-- Left side column. contains the logo and sidebar -->
	  <?php
	  $username = bus('user')['nickname'];
	  if(!$username)$username = bus('user')['truename'];
	  $pic = bus('user')['pic'];
	  ?>
	  <!-- Left side column. contains the logo and sidebar -->
	  <aside class="left-side sidebar-offcanvas">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				  <!-- Sidebar user panel -->
				  <div class="user-panel">
						<div class="pull-left image">
							  <img src="<?php echo $pic;?>" class="img-circle" alt="User Image" />
						</div>
						<div class="pull-left info">
							  <p>Hello,<?php echo $username;?></p>

							  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
				  </div>

				  <!-- search form -
                  ->
                  <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                              <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                  <span class="input-group-btn">
                                      <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                  </span>
                        </div>
                  </form>
                  <!-- /.search form -->
				  <!-- sidebar menu: : style can be found in sidebar.less -->
				  <ul class="sidebar-menu">

						<!-- 系统设置 -->
						<li class="treeview active">
							  <a href="javascript:void(0)">
									<i class="fa fa-table"></i> <span>Set</span>
									<i class="fa fa-angle-left pull-right"></i>
							  </a>
							  <ul class="treeview-menu">
									<li><a href="/admin/set/geter/"><i class="fa fa-angle-double-right"></i> Geter </a></li>
									<li><a href="/admin/set/mcae/"><i class="fa fa-angle-double-right"></i> Mcae </a></li>
									<li><a href="/admin/set/mcae_menu/"><i class="fa fa-angle-double-right"></i> Mcae_menu </a></li>
									<li><a href="/admin/set/middleware/"><i class="fa fa-angle-double-right"></i> Middleware </a></li>
									<li><a href="/admin/set/widget/"><i class="fa fa-angle-double-right"></i> Widget </a></li>
							  </ul>
						</li>
						<!-- 系统设置 -->

				  </ul>
			</section>
			<!-- /.sidebar -->
	  </aside>

	  <!-- Right side column. Contains the navbar and content of the page -->
	  <aside class="right-side">
			<!-- Content Header (Page header) -->
			<?php W('right_content_head',[]);?>

			<!--#include virtual = "/box/Usergroupadd" -->

			<!-- Main content -->
			<section class="content">
				  <!-- h2 class="page-header">Alerts and Callouts</h2 -->

				  <!-- END ALERTS AND CALLOUTS -->

				  <div class="row">


						<div class="col-xs-12">
							  <div class="box box-primary">
									<div class="box-header">
										  <h3 class="box-title">RULE管理</h3>
										  <div class="box-tools">
												<div class="input-group">
													  <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
													  <div class="input-group-btn">
															<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
													  </div>
												</div>
										  </div>
									</div><!-- /.box-header -->
									<div class="box-body table-responsive no-padding">

									</div><!-- /.box-body -->


							  </div><!-- /.box -->
						</div>
				  </div>

				  <!-- END TYPOGRAPHY -->
			</section><!-- /.content -->

			<!-- 页脚 -->
			<!--#include virtual = "../sp/right_content_footer.shtml" -->
	  </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="http://cdn.bootcss.com/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="http://cdn.bootcss.com/bootstrap/3.0.3/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="/assets/LTE/js/AdminLTE/app.js" type="text/javascript"></script>

<script type="text/javascript">
	  $(document).ready(function(){
			//调用
			$('.shamtest').click(function(){
				  showAjaxModal('/test2.html','ceshiyi2')
			})

	  })
</script>

</body>
</html>
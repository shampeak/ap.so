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
        <!-- Ionicons -->
        <link href="/assets/LTE/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="/assets/LTE/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="/assets/LTE/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="/assets/LTE/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="/assets/LTE/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="/assets/LTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
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

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        150
                                    </h3>
                                    <p>
                                        New Orders
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        53<sup style="font-size: 20px">%</sup>
                                    </h3>
                                    <p>
                                        Bounce Rate
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        44
                                    </h3>
                                    <p>
                                        User Registrations
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        65
                                    </h3>
                                    <p>
                                        Unique Visitors
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable"> 
                            <!-- Box (with bar chart) -->
                            <div class="box box-danger" id="loading-example">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-cloud"></i>

                                    <h3 class="box-title">Server Load</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <!-- bar chart -->
                                            <div class="chart" id="bar-chart" style="height: 250px;"></div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="pad">
                                                <!-- Progress bars -->
                                                <div class="clearfix">
                                                    <span class="pull-left">Bandwidth</span>
                                                    <small class="pull-right">10/200 GB</small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                                </div>

                                                <div class="clearfix">
                                                    <span class="pull-left">Transfered</span>
                                                    <small class="pull-right">10 GB</small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 70%;"></div>
                                                </div>

                                                <div class="clearfix">
                                                    <span class="pull-left">Activity</span>
                                                    <small class="pull-right">73%</small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-light-blue" style="width: 70%;"></div>
                                                </div>

                                                <div class="clearfix">
                                                    <span class="pull-left">FTP</span>
                                                    <small class="pull-right">30 GB</small>
                                                </div>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 70%;"></div>
                                                </div>
                                                <!-- Buttons -->
                                                <p>
                                                    <button class="btn btn-default btn-sm"><i class="fa fa-cloud-download"></i> Generate PDF</button>
                                                </p>
                                            </div><!-- /.pad -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row - inside box -->
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                            <input type="text" class="knob" data-readonly="true" value="80" data-width="60" data-height="60" data-fgColor="#f56954"/>
                                            <div class="knob-label">CPU</div>
                                        </div><!-- ./col -->
                                        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                            <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                                            <div class="knob-label">Disk</div>
                                        </div><!-- ./col -->
                                        <div class="col-xs-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                                            <div class="knob-label">RAM</div>
                                        </div><!-- ./col -->
                                    </div><!-- /.row -->
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->        
                            
           


                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">

                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                    <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                    <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                                </div>
                            </div><!-- /.nav-tabs-custom -->
                                     


                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->                  
                  
                  

				  <!-- END TYPOGRAPHY -->
			</section><!-- /.content -->

			<!-- 页脚 -->
			<!--#include virtual = "../sp/right_content_footer.shtml" -->
			<?php W('right_content_footer',[]);?>
	  </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script -->
        <script src="http://cdn.bootcss.com/jquery/2.0.2/jquery.min.js"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="http://cdn.bootcss.com/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="http://cdn.bootcss.com/bootstrap/3.0.3/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <!-- script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script -->
        <script src="http://cdn.bootcss.com/raphael/2.1.0/raphael-min.js"></script>
      
        
        <script src="/assets/LTE/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <!-- script src="/assets/LTE/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script -->
        <script src="http://cdn.bootcss.com/jquery-sparklines/2.1.2/jquery.sparkline.min.js" type="text/javascript"></script>

        <!-- jvectormap -->
        <script src="/assets/LTE/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="/assets/LTE/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="/assets/LTE/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="/assets/LTE/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="/assets/LTE/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="/assets/LTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="/assets/LTE/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="/assets/LTE/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/assets/LTE/js/AdminLTE/dashboard.js" type="text/javascript"></script>        

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
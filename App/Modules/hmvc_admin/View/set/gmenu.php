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

	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	  <![endif]-->
      

        <!-- Ionicons -->
        <link href="/assets/LTE/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="/assets/LTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="/assets/LTE/css/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/assets/LTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />      
      
      
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<?php W('head');?>

<div class="wrapper row-offcanvas row-offcanvas-left">
	  <!-- Left side column. contains the logo and sidebar -->
	<?php W('left');?>


	  <!-- Right side column. Contains the navbar and content of the page -->
	  <aside class="right-side">
			<!-- Content Header (Page header) -->
			<?php W('right_content_head',[]);?>

			<!--#include virtual = "/box/Usergroupadd" -->

			<!-- Main content -->
			<section class="content">
				  <!-- h2 class="page-header">Alerts and Callouts</h2 -->
				<section class="content">
					<!-- MAILBOX BEGIN -->
					<div class="mailbox row">
						<div class="col-xs-12">
							<div class="box box-solid">
                            <form action="" method="post">
								<div class="box-body">
									<div class="row">
										<div class="col-md-3 col-sm-4">
											<!-- BOXES are complex enough to move the .box-header around.
                                                 This is an example of having the box header within the box body -->
											
											<!-- Navigation - folders-->
											<div style="margin-top: 15px;">
												<ul class="nav nav-pills nav-stacked">
													<li class="header">用户组列表</li>
													
                                                    <?php
                                                    foreach($grouplist as $key=>$value){
													?>
													<li <?php if($value['groupId'] == $groupid){?>class="active"<?php }?>>
                                                    <a href="/admin/set/gmenu/<?=$value['groupId']?>"><i class="fa fa-pencil-square-o"></i> <?=$value['groupName']?></a>
                                                    </li>
													<?php
													}
													?>
												</ul>
											</div>
										</div><!-- /.col (LEFT) -->
										<div class="col-md-9 col-sm-8">
											<div class="row pad">
												<div class="col-sm-6">
													<label style="margin-right: 10px;">
														<input type="checkbox" id="check-all"/>
													</label>
													<!-- Action button -->
													全选

												</div>
												<div class="col-sm-6 search-form">
													
												</div>
											</div><!-- /.row -->

											<div class="table-responsive">
                                            
                                            	<table class="table table-mailbox">
                                                    <?php
                                                    foreach($menulist as $key=>$value){
														if($value['preid'] == 0){
													?>
														<tr class="unread">
														<td class="small-col"><input name="menuid[]" type="checkbox" value="<?=$value['id']?>" <?php if(in_array($value['id'],$groupmenu)){?>checked<?php }?>/></td>
														<td class="small-col"><i class="<?=$value['icon']?>"></i></td>
														<td class="name"><?=$value['title']?></td>
														<td class="subject"><?=$value['subtitle']?></td>
														<td><?=$value['url']?></td>
														<td><?=$value['mca']?></td>
														</tr>
                                                        
															<?php
                                                            foreach($menulist as $k=>$v){
                                                                if($v['preid'] == $value['id']){
                                                            ?>
                                                            <tr>
                                                                <td class="small-col"><input type="checkbox" name="menuid[]" value="<?=$v['id']?>" <?php if(in_array($v['id'],$groupmenu)){?>checked<?php }?>/></td>
                                                                <td class="small-col"> ┃━━  <i class="<?=$v['icon']?>"></i></td>
                                                                <td class="name"><?=$v['title']?></td>
                                                                <td class="subject"><?=$v['subtitle']?></td>
                                                                <td><?=$v['url']?></td>
                                                                <td><?=$v['mca']?></td>
                                                            </tr>
                                                            <?php
                                                            }}
                                                    }}
													?>
                                            	</table>
                                            
											</div><!-- /.table-responsive -->
										</div><!-- /.col (RIGHT) -->
									</div><!-- /.row -->
								</div><!-- /.box-body -->
								<div class="box-footer clearfix">
									<div class="pull-right">
										
										<input type="hidden" class="" value="<?=$groupid?>"/>
                                        <button class="btn btn-sm btn-primary" type="submit"> <i class="fa fa-pencil"></i> 确 定 </button>
									</div>
								</div><!-- box-footer -->
                            </form>
							</div><!-- /.box -->
						</div><!-- /.col (MAIN) -->
					</div>
					<!-- MAILBOX END -->

				</section>
				  <!-- END ALERTS AND CALLOUTS -->

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
			$('.shamedit').click(function(){

				  var relid = $(this).attr("relid");
				  showAjaxModal('/admin/set/menu/box/'+relid,'编辑geter')
			});

			$('.shamdelete').click(function(){
				  if (confirm("确认要删除？")) {
						var relid = $(this).attr("relid");
						var res = $.ajax({
							  url : '/admin/set/menu/de/'+relid,
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



		  $('.ismenu').click(function(){

			  var relid = $(this).attr("relid");

			  var res = $.ajax({
				  url : '/admin/set/menu/ext/'+relid,
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
				  location.reload();
				  return true;
			  }
		  });



			$('.changestate').click(function(){

				  var relid = $(this).attr("relid");

				  var res = $.ajax({
						url : '/admin/set/menu/ed/'+relid,
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




			$("input[type='checkbox'], input[type='radio']").on('ifClicked', function(event){
				  var rel = event.currentTarget.attributes.rel.nodeValue;
				  setc(rel);
				  location.reload();
			});
			
			//iCheck for checkbox and radio inputs
			$('input[type="checkbox"]').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			});

			//When unchecking the checkbox
			$("#check-all").on('ifUnchecked', function(event) {
				//Uncheck all checkboxes
				$("input[type='checkbox']", ".table-mailbox").iCheck("uncheck");
			});
			//When checking the checkbox
			$("#check-all").on('ifChecked', function(event) {
				//Check all checkboxes
				$("input[type='checkbox']", ".table-mailbox").iCheck("check");
			});

	  })
</script>

</body>
</html>
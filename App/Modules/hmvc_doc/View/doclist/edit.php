<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>book列表 - Seter文档</title>

	<link rel="stylesheet" href="http://fonts.useso.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/xenon-core.css">
	<link rel="stylesheet" href="/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="/assets/css/xenon-components.css">
	<link rel="stylesheet" href="/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="/assets/css/custom.css">

	<script src="/assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body">
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
  <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
  <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
  <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->

  <div class="main-content">
					
	  <!-- User Info, Notifications and Menu Bar -->
	  <div class="page-title">
				
		  <div class="title-env">
					<h1 class="title">文档资料管理</h1>
					<p class="description"> -> book请手动在数据库中添加</p>
		</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="/doc/"><i class="fa-home"></i>Home</a>
						</li>
								<li>
						
										<a href="/doc/doclist/edit/">列表</a>
								</li>
								</ol>
								
				</div>
					
	</div>
			<!-- Table Styles -->
			<div class="row">
				<div class="col-md-12">
				
					<div class="panel panel-default">
					  <div class="panel-heading">
							<h3 class="panel-title">BOOK管理</h3>
							
							<div class="panel-options">
								
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
								
								<a href="#" data-toggle="remove">
									&times;
								</a>
							</div>
						</div>
					  <div class="panel-body panel-border">
						
						  <div class="row">
								<div class="col-sm-4">
								<?php if($GET['bookid']){?>
                                <h4>[<a href="/doc/edit/?bookid=<?=$GET['bookid']?>" target="_blank">添加新数据</a>] [<a href="/doc/doclist/index/?bookid=<?=$GET['bookid']?>">原始模式</a>]</h4>
								<?php }?>
                                	<!-- Table Model 2 -->
									<strong>book列表 ： </strong>
                                    <?php
                                    foreach($booklist as $key=>$value){
										if($value['bookid'] == $GET['bookid']){
											echo "<a href='/doc/doclist/edit?bookid={$value['bookid']}'><span style=background-color:red>{$value['bookname']}</span></a> | ";
										}else{
											echo "<a href='/doc/doclist/edit?bookid={$value['bookid']}'>{$value['bookname']}</a> | ";
										}
										?>
									<?php
                                    }
									?>
									<br><br>

									<table class="table table-model-2 table-hover">
										<thead>
											<tr>
												<th width="80">#id</th>
												<th>title</th>
												<th width="50">sort</th>
												<th width="50">enable</th>
											</tr>
										</thead>
										
										<tbody>
                                        <?php
                                        foreach($node as $key=>$value){
											?>
                                            
                                            <tr>
												<td><?=$value['bookid']?>.<?=$value['nodeid']?></td>
												<td><a class="suedit" ref="/doc/doclist/show/?bookid=<?=$value['bookid']?>&nodeid=<?=$value['nodeid']?>"><?=$value['title']?></a></td>
												<td><?=$value['sort']?></td>
												<td><?=$value['enable']?></td>
											</tr>
                                            
                                            <!-- child -->
											<?php
                                            if($value['child']){
                                            foreach($value['child'] as $k=>$v){
                                            ?>
                                            
                                            <tr>
												<td>&nbsp;&nbsp;- <?=$v['bookid']?>.<?=$v['nodeid']?></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;└──<a class="suedit" ref="/doc/doclist/show/?bookid=<?=$v['bookid']?>&nodeid=<?=$v['nodeid']?>"><font color="#666666"><?=$v['title']?></font></a></td>
												<td><?=$v['sort']?></td>
												<td><?=$v['enable']?></td>
											</tr>
                                            
                                            
                                            <?php
											}
                                            }

											?>
      
                                            <!-- /child -->
                                            
                                            
											<?
											}
                                        ?>
                                        
										
										</tbody>
									</table>
								</div>
                            <div class="col-sm-8">
								<?php if($GET['bookid']){?>
                                <h4><a href="/doc/edit/?bookid=<?=$GET['bookid']?>">添加新数据</a></h4>
								<?php }?>
                                	<!-- Table Model 2 -->
									<strong></strong>
                                    
									<br><br>

									<table class="table table-model-2 table-hover">
										<thead>
											<tr>
												<th>内容</th>
											</tr>
										</thead>
										
										<tbody>
                                      
                                        
										
										</tbody>
									</table>
                                    <div id="ckshow">asdfasdfsadf</div>
                            </div>
                                
						</div>
						
					  </div>
						
					</div>
					
				</div>
			</div>
			
			<!-- Tables and Panels -->
			<div class="row">
				<div class="col-md-7"></div>
				<div class="col-md-5"></div>
			</div>
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<div class="footer-text">
						&copy; 2014 
						<strong>Xenon</strong> 
						-</div>
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
  </div>
		
			
		<!-- start: Chat Section -->
		<div id="chat" class="fixed"><!-- conversation template --></div>
		<!-- end: Chat Section -->
		
		
</div>
	
	
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="/assets/js/wysihtml5/src/bootstrap-wysihtml5.css">
	<link rel="stylesheet" href="/assets/js/uikit/vendor/codemirror/codemirror.css">
	<link rel="stylesheet" href="/assets/js/uikit/uikit.css">
	<link rel="stylesheet" href="/assets/js/uikit/css/addons/uikit.almost-flat.addons.min.css">

	<!-- Bottom Scripts -->
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/TweenMax.min.js"></script>
	<script src="/assets/js/resizeable.js"></script>
	<script src="/assets/js/joinable.js"></script>
	<script src="/assets/js/xenon-api.js"></script>
	<script src="/assets/js/xenon-toggles.js"></script>
	<script src="/assets/js/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>


	<!-- Imported scripts on this page -->
	<script src="/assets/js/wysihtml5/src/bootstrap-wysihtml5.js"></script>
	<script src="/assets/js/uikit/vendor/codemirror/codemirror.js"></script>
	<script src="/assets/js/uikit/vendor/marked.js"></script>
	<script src="/assets/js/uikit/js/uikit.min.js"></script>
	<script src="/assets/js/uikit/js/addons/htmleditor.min.js"></script>
	<script src="/assets/js/ckeditor/ckeditor.js"></script>
	<script src="/assets/js/ckeditor/adapters/jquery.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/assets/js/xenon-custom.js"></script>
	<script src="/A/CK_fill_bootstrap.js"></script>
    
				<script type="text/javascript">
$(document).ready(function() {
// put all your jQuery goodness in here.

	$(".suedit").click(function(){
		var ref = $(this).attr('ref');
		//alert(ref);
		$.CKfill({
			rel:ref,
			tid:'ckshow'
			//width:'96%',
		});
	
	});
});  
</script>  


</body>
</html>
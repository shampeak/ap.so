<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>Xenon - Editors</title>

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
					<h1 class="title">编辑</h1>
					<p class="description">编辑 用markdown语法编写 有nodeID 则修改，没有nodeID则添加 </p>
		  </div>
          
<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="SeterDefault.php"><i class="fa-home"></i>Home</a>
						</li>
								<li>
						
										<a href="SeterDoclist.php?bookid=<?=$_GET['bookid']?>">列表</a>
								</li>
								</ol>
								
				</div>          
          
	  </div>
			
			<h3 class="text-gray">
				添加还是编辑 <br />
				<small class="text-muted">有ID编辑，没有ID添加</small>
	  </h3>
			

			
			<form role="form" method="post">
				<div class="form-group">
                    <h3>book ： </h3>
                    <?=$booklist[$node['bookid']]?>
                    <input name="bookid" id="field-1" class="form-control" type="hidden" value="<?=$_GET['bookid']?>">

                     <h3>pre ： </h3>
                    <select name="preid" class="form-control" id="sboxit-1">
                        <option value="0" <?php if(0 == $node['preid']) echo ' selected="selected" '?>>基础 pre=0</option>
                        <?php
                        foreach($prelist as $key=>$value){
                        ?>
                            <option value="<?=$value['nodeid']?>" <?php if($value['nodeid'] == $node['preid']) echo ' selected="selected" '?>><?=$value['title']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    
                     <h3>类型 ： </h3>
                    <select name="type" class="form-control" id="sboxit-1">
                    <option value="con" <?php if('con' == $node['type']) echo 'selected="selected" '?>>markdown </option>
                    <option value="fun" <?php if('fun' == $node['type']) echo ' selected="selected" '?>>函数 </option>
                    <option value="cla" <?php if('cla' == $node['type']) echo ' selected="selected" '?>>类 </option>
                    <option value="tes" <?php if('tes' == $node['type']) echo ' selected="selected" '?>>测试 </option>
                    </select>
                    
                    
                    
                    
                    <h3>node <?=$node['nodeid']?> ： </h3>
                    <input name="title" id="field-1" class="form-control" type="text" value="<?=$node['title']?>">
                    <h3>sort ： </h3>
                    <input name="sort" id="field-1" class="form-control" type="text" value="<?=$node['sort']?>">

                    <h3>说明文字</h3>
                    <textarea name="nr" class="form-control ckeditor" rows="5" ><?=$node['nr']?></textarea>
                    <h3>代码示例2</h3>
                    <textarea name="nrcode" class="form-control" rows="5" data-uk-htmleditor="{markdown:true}"><?=$node['nrcode']?></textarea>
                    
                    <h3>参数【json】</h3>
                    <textarea name="params" class="form-control" rows="10"><?=$node['params']?></textarea>
                    <input type="hidden" name="nodeid" value="<?=$node['nodeid']?>">
                    <input type="submit" name="button" id="button" value="提交">
				</div>
			</form>
			
			
			<br />
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
						==
					</div>
					
					
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

</body>
</html>
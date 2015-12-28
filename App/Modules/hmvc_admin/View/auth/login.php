<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="utf-8">
        <title>AdminLTE | Log in</title>
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
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="userlogin" class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="button" class="btn bg-olive btn-block confirm">Sign me in</button>  
                    
                    <!-- p><a href="#">I forgot my password</a></p>
                    <a href="register.html" class="text-center">Register a new membership</a -->
                </div>
            </form>

            <div class="margin text-center">
                <!-- span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button -->

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://cdn.bootcss.com/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="http://cdn.bootcss.com/bootstrap/3.0.3/js/bootstrap.min.js" type="text/javascript"></script>        
<script type="text/javascript">
$(document).ready(function(){
	//调用
	$('.confirm').click(function(){
		if($("input[name='userlogin']").val() == '') return false;
		if($("input[name='password']").val() == '') return false;
		var res = $.ajax({
			url : '/admin/auth/login/',
			type: 'post',
			data: {
			userlogin 	: $("input[name='userlogin']").val(),
			password 	: $("input[name='password']").val(),
			},
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
			location.href = "/admin/main/index/";
			//location.reload();
			return true;
		}
	
			  
		  
		  
	})

})
</script>
    </body>
</html>
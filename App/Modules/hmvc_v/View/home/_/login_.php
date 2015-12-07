<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>::::<?=$title?>::::</title>

    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <link href="/A/CSS/font.css" rel="stylesheet">

</head>

<body>
<!-- Body begin ================================================== -->

    <div class="container" style="padding-top:150px;width:300px">


        <h2 class="form-signin-heading">管理系统</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="uname" type="text" id="inputEmail" class="form-control username" placeholder="用户名" required autofocus>
        <div class="checkbox">
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="pwd" type="password" id="inputPassword" class="form-control password" placeholder="密码" required>
        <div class="checkbox">
            </div>
        <button class="btn btn-lg btn-primary btn-block login_submit" type="submit">登陆</button>


    </div> <!-- /container -->




<!-- Bootstrap core JavaScript================================================== -->
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Bootstrap core JavaScript================================================== -->
<script language="javascript">
    $(document).ready(function(){

        $(".login_submit").click(function(){
            var res = $.ajax({
                url : '',
                type: 'post',
                data: {
                    uname 	: $("input[name='uname']").val(),
                    pwd 	: $("input[name='pwd']").val(),
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
               window.location.href="<?=$GET['r']?:C('usermain');?>";
               return true;
            }
        });
    })
</script>
</body>
</html>

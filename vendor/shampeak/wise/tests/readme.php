<?php
/**
 * wise
 */
$projectname = 'projectname';
$title      = 'title';
$dis        = '描述';
$githuburl  = 'https://github.com/shampeak/wise';
$githubreadme= 'https://github.com/shampeak/wise/blob/master/README.md';

$gf = [
      '需要 PHP 5.4+',
      '符合 PSR-2 及 PSR-4 编码标准',
      '简单的 API 接口 和 调用',
      '单例调用',
];
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在�???前面，任何其他内容都*必须*跟随其后�??? -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
	<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js" ></script>
    <script type="text/javascript" src="http://cdn.bootcss.com/SyntaxHighlighter/3.0.83/scripts/shCore.min.js"></script>
    <script type="text/javascript" src="http://cdn.bootcss.com/SyntaxHighlighter/3.0.83/scripts/shBrushPhp.min.js"></script>
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://cdn.bootcss.com/SyntaxHighlighter/3.0.83/styles/shCoreDefault.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
/* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-right: 15px;
  padding-left: 15px;
}

/* Custom page header */
.header {
  padding-bottom: 20px;
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}

/* Custom page footer */
.footer {
  padding-top: 19px;
  color: #777;
  border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-right: 0;
    padding-left: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 30px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}
    </style>
<script type="text/javascript">SyntaxHighlighter.defaults['toolbar'] = false;</script>
<script>
$(document).ready(function(){
	SyntaxHighlighter.config.clipboardSwf = 'http://static.oschina.net/js/syntax-highlighter-2.1.382/scripts/clipboard.swf';
	SyntaxHighlighter.all('code');
});
</script>
  </head>

  <body>

    <div class="container">
    
    
    
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Project name</h3>
      </div>

      <div class="jumbotron">
        <h1>Jumbotron heading</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Go to Github</a></p>
      </div>


      <div class="row marketing">
      
        <div class="col-lg-12">
        
<h3>要点 : </h3>
        <ul>
        <li>1
        <li>2
        <li> 3   
        <li> 4   </ul>
        </div>
        <div class="col-lg-12">
            <pre class="brush: php;">
            include("../vendor/autoload.php");
            
            $wise = wise\wise::getInstance([
            'ini' => [
                'username'    => '',
                'dbhost'        => '125.0.0.1',
            ],
            'file'=>[
                'Config'    => 'Config/Config.php',
                'db'        => 'Config/db.php',
            ],
            ]);
            
            $wise->load('db2','Config/Config.php');
            
            $wise->C('myinfo',[]);
            $wise->C('myinfo','123123123123');
            
            $md = $wise('myinfo');
            
            print_r($md);
            
            print_r($wise->C());
            exit;
            </pre>
	    </div>
    </div>






      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="col-lg-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; Company 2014  Site design by Sham rain. </p>
      </footer>

    </div> <!-- /container -->


  </body>
</html>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Shampeak">
    <title><?php echo $title;?></title>
    <meta name="description" content="GracePHP" />
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://v3.bootcss.com/assets/css/docs.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/highlight.js/7.3/styles/github.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
</head>
<body <?php if(isset($body_class)){echo "class='{$body_class}'";}?>>
    <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a href="/?m=super" class="navbar-brand">GracePHP</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
          <li>
              <a href='/?m=super&c=home&a=dis'>简介</a>
          </li>
          <li>
              <a href='/?m=super&c=home&a=fun'>说明</a>
          </li>
          <li>
              <a href='/?m=super&c=home&a=obj'>对象</a>
          </li>


          <!-- li>
              <a href='super/?a=Url'>路由1</a>
          </li>
          <li>
              <a href='super/?m=home.Url'>路由2</a>
          </li>
          <li>
              <a href='super/home/Url'>路由3</a>
          </li>
         <li>
            <a href='?a=Redirect'>重定向</a>
         </li>
         <li>
            <a href='?a=Ajax'>Ajax返回</a>
         </li>
         <li>
            <a href='?a=AutoLoad'>类自动加载</a>
         </li>
         <li>
            <a href='?a=Widget'>Widget</a>
         </li>
          <li>
              <a href='?a=Log'>日志</a>
          </li>
          <li>
              <a href='?a=fetch'>缓冲区</a>
          </li -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a target='_blank' href="https://github.com/shampeak/GracePhp">GracePHP官网</a>
        </li>
      </ul>
    </nav>
  </div>
</header>

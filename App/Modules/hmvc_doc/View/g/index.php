<!doctype html>
<html>
<head>
	  <meta charset="utf-8">
	  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	  <title></title>
	  <meta name="description" content="">
	  <meta name="viewport" content="width = device-width, initial-scale = 1.0" />
	  <script src="/A/U/U2/marked.js" type="text/javascript"></script>

	  <link href="/assets/as_doc/style-api-v2-cbb8772a.css" rel="stylesheet" type="text/css" />
	  <link href="/assets/as_doc/pikabu-22255a87.css" rel="stylesheet" type="text/css" />
	  <link href="/assets/as_doc/mobile-menu-be990f4f.css" rel="stylesheet" type="text/css" />
	  <link type="image/ico" href="/assets/images/favicon.ico" rel="icon" />


	  <!-- script type="text/javascript" src="//use.typekit.net/njm7orv.js"></script>
      <script type="text/javascript">try{Typekit.load();}catch(e){}</script -->

</head>
<body class="documentation documentation_v2 documentation_v2_index ">


<div class="mobile-nav">
	  <div class="m-pikabu-sidebar m-pikabu-left">
			<a href="/doc/doclist/" class="close-panel icon-close"></a>
			<nav id="mobile">
				  <h4>Menu</h4>
				  <ul>
							 
					

				  </ul>
			</nav>
	  </div>
</div>

<div class="m-pikabu-container">

	  <header>
			<div class="wrapper-full">
				  <a href="/doc/doclist/" class="logo"></a>
				  <ul>
						

				  </ul>
				  <a class="m-pikabu-nav-toggle icon-navicon" data-role="left">
						<span></span>
				  </a>
			</div>
	  </header>




	  <!-- 左侧索引 -->
	  <a href="#" class="navicon"></a>
	  <nav class="sidebar">
			<ul id="spyMe" class="nav">

				  <?php foreach($list as $key=>$value){ ?>
						<li>
							  <a href="#s<?=$key?>"><?=$key?></a>
							  <ul class="nav">
									<!-- li><a href="#s<?=$key?>"><?=$key?></a></li -->
									<?php
									if($value){
										  foreach($value as $k=>$v){?>
												<li><a href="#s<?=$key?><?=$k?>"><?=$key.'.'.$k?></a></li>
								  <?php }
									}
									?>
							  </ul>
						</li>
				  <?php	}?>
			</ul>
	  </nav>
	  <!-- 左侧索引fin -->


	  <div id="big-wrap">
			<div id="inner-wrap">






				  <!-- New Section:  -->
				  <?php foreach($list as $key=>$value){ ?>

						<div class="set category-head" >   <!-- or <div class="set "> -->
							  <div class="inner-set" id="s<?=$key?>">
									<div class="set-description">
										  <h3><?=$key?></h3>
										  <div class="markdown"><?=$key?></div>
									</div>

									<div class="set-curl">
										  <h3><?=$key?></h3>
										  <div class="markdown"><?=$key?></div>
									</div>
							  </div>
						</div>



						<?php
						if($value){
							  foreach($value as $k=>$v){?>
									<div class="set" >   <!-- or <div class="set "> -->
										  <div class="inner-set" id="s<?=$key.$k?>">
												<div class="set-description">
													  <h3><?=$key.'.'.$k?></h3>
													  <div class="markdown"><?php
													  D(\G\Geter::getInstance()->get($key.'.'.$k));
													  ?></div>
												</div>

												<div class="set-curl">
													  <h3><?=$key.'.'.$k?></h3>
													  <div class="markdown">
                                                      $this->G('<?=$key.'.'.$k?>');
                                                      <br>
                                                      \G\Geter::getInstance()->get(<?=$key.'.'.$k?>);
                                                      <br>
                                                      <?=$v?>

                                                      </div>
												</div>
										  </div>
									</div>
									<?php
							  }
						}
						?>

				  <?php	}?>




			</div>
	  </div>
      
   
	  <script src="/assets/as_doc/jquery-1.10.2.min-21daab25.js" type="text/javascript"></script>
	  <script src="/assets/as_doc/scrollspy.min-2f1c4f84.js" type="text/javascript"></script>
	  <script src="/assets/as_doc/ZeroClipboard.min-b40acf8f.js" type="text/javascript"></script>
	  <script src="/assets/as_doc/tooltips.min-30a5b6c6.js" type="text/javascript"></script>
	  <script src="/assets/as_doc/highlight.pack-3cec78af.js" type="text/javascript"></script>
	  <script src="/assets/as_doc/docs-14162e9e.js" type="text/javascript"></script>
	  <script src="/assets/as_doc/pikabu-ddd39532.js" type="text/javascript"></script>
	  <script src="/assets/as_doc/mobile-menu-b2824345.js" type="text/javascript"></script>


</div>


</body>
</html>

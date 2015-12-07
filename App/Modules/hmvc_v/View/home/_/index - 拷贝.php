<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/header', $data);
?>



<body class="page-body">
<div class="page-loading-overlay"><div class="loader-2"></div></div>
	<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/setting', $data);
?>

	
		<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/headbar', $data);
?>

	
	
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/sitebar', $data);
?>
		

		
		<div class="main-content">
					
			<script>
			jQuery(document).ready(function($)
			{
				$('a[href="#layout-variants"]').on('click', function(ev)
				{
					ev.preventDefault();
					
					var win = {top: $(window).scrollTop(), toTop: $("#layout-variants").offset().top - 15};
					
					TweenLite.to(win, .3, {top: win.toTop, roundProps: ["top"], ease: Sine.easeInOut, onUpdate: function()
						{
							$(window).scrollTop(win.top);
						}
					});
				});
			});
			</script>
			
			<div class="jumbotron">
				<h1>Layout API</h1>
				
				<p>
					Xenon Theme layout can be combined in many variants with sidebar and horizontal menu and offers a set of toggles (links) to manipulate with the theme layout. These features are enabled if you import <code>js/xenon-toggles.js</code> script in the document.				</p>
				
				<br />
				<a class="btn btn-primary btn-lg" href="#layout-variants" role="button">See Layout Variants</a>
			</div>
			
			<h3 id="layout-toggles">
				Layout Toggles
				<br />
				<small>Links that will automatically collapse or expand side panels, chat or user settings pane.</small>
			</h3>
           
			<br />
			
			
			<div class="row">
				
				<div class="col-xs-3 text-muted">Link</div>
				<div class="col-xs-9 text-muted">Code</div>
				
				<div class="vspacer v3"></div>
			
				<div class="col-sm-3">
					<a href="#" class="btn btn-secondary btn-block btn-icon btn-icon-standalone text-left" data-toggle="sidebar">
						<i class="fa-bars"></i>
						<span>Toggle Sidebar</span>
					</a>
				</div>
				<div class="col-sm-9">
					<pre>&lt;a href=&quot;#&quot; data-toggle=&quot;sidebar&quot;&gt;Toggle Sidebar&lt;/a&gt;</pre>
				</div>
				
				<div class="clearfix"></div>
				<div class="vspacer v4"></div>
			
				<div class="col-sm-3">
					<a href="#" class="btn btn-secondary btn-block btn-icon btn-icon-standalone text-left" data-toggle="chat">
						<i class="fa-comment-o"></i>
						<span>Toggle Chat</span>
					</a>
				</div>
				<div class="col-sm-9">
					<pre>&lt;a href=&quot;#&quot; data-toggle=&quot;chat&quot;&gt;Toggle Chat&lt;/a&gt;</pre>
				</div>
				
				<div class="clearfix"></div>
				<div class="vspacer v4"></div>
			
				<div class="col-sm-3">
					<a href="#" class="btn btn-secondary btn-block btn-icon btn-icon-standalone text-left" data-toggle="settings-pane">
						<i class="linecons-user"></i>
						<span>Toggle Settings Pane</span>
					</a>
				</div>
				<div class="col-sm-9">
					<pre>&lt;a href=&quot;#&quot; data-toggle=&quot;chat&quot;&gt;Toggle Settings Pane&lt;/a&gt;</pre>
				</div>
			
				
				<div class="clearfix"></div>
				<div class="vspacer v4"></div>
			
				<div class="col-sm-3">
					<a href="#" class="btn btn-secondary btn-block btn-icon btn-icon-standalone text-left" data-toggle="settings-pane" data-animate="true">
						<i class="linecons-cog"></i>
						<span>Settings Pane /w Animation</span>
					</a>
				</div>
				<div class="col-sm-9">
					<pre>&lt;a href=&quot;#&quot; data-toggle=&quot;chat&quot; data-animate=&quot;true&quot;&gt;Toggle Settings Pane&lt;/a&gt;</pre>
				</div>
			
				
				<div class="clearfix"></div>
				<div class="vspacer v4"></div>
			
				<div class="col-sm-3">
					<a href="#" class="btn btn-secondary btn-block btn-icon btn-icon-standalone text-left" rel="go-top">
						<i class="fa-arrow-up"></i>
						<span>Go to Top</span>
					</a>
				</div>
				<div class="col-sm-9">
					<pre>&lt;a href=&quot;#&quot; rel=&quot;go-top&quot;&gt;Go to Top&lt;/a&gt;</pre>
				</div>
			
			</div>
			
			
			<br />
			<br />
			
			<h3 id="layout-variants">
				Layout Variants
				<br />
				<small>9 different layout types with fixed or static scrolling panels</small>
			</h3>
			
			<div class="panel panel-default panel-headerless">
				
				<div class="panel-body layout-variants">
				
					<div class="row">
						<div class="col-sm-4">
							
							<div class="layout-variant">
								<div class="layout-img">
									<a href="layout-variants.html">
										<img src="/assets/images/layouts/layout-sidebar.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-variants.html">Left Sidebar</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-variants.html" class="">Fixed Sidebar</a>
									</li>
									<li>
										<a href="layout-static-sidebar.html" class="">Static Sidebar</a>
									</li>
									<li>
										<a href="layout-without-submenu-toggle.html" class="">Other Submenus Toggle Off</a>
									</li>
								</ul>
							</div>
							
						</div>
						<div class="col-sm-4">
							
							<div class="layout-variant">
								<div class="layout-img">
									<a href="layout-right-sidebar.html">
										<img src="/assets/images/layouts/layout-sidebar-right.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-right-sidebar.html">Right Sidebar</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-right-sidebar.html" class="">Fixed Sidebar</a>
									</li>
									<li>
										<a href="layout-right-sidebar-static.html" class="">Static Sidebar</a>
									</li>
									<li>
										<a href="layout-without-submenu-toggle-right.html" class="">Other Submenus Toggle Off</a>
									</li>
								</ul>
							</div>
							
						</div>
						<div class="col-sm-4">
							
							<div class="layout-variant">
								<div class="layout-img">
									<a href="layout-collapsed-sidebar.html">
										<img src="/assets/images/layouts/layout-sidebar-collapsed.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-collapsed-sidebar.html">Collapsed Sidebar</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-collapsed-sidebar.html" class="disabled">
											<del>Fixed Sidebar</del>
										</a>
									</li>
									<li>
										<a href="layout-collapsed-sidebar.html" class="">Static Sidebar</a>
									</li>
									<li>
										<a href="layout-chat-open.html" class="">Static Sidebar &amp; Chat Open</a>
									</li>
								</ul>
							</div>
							
						</div>
						
						<div class="clearfix"></div>
						
						<div class="col-sm-4">
							
							<div class="layout-variant">
								<div class="layout-img">
									<a href="layout-right-collapsed-sidebar.html">
										<img src="/assets/images/layouts/layout-sidebar-right-collapsed.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-right-collapsed-sidebar.html">Collapsed Right Sidebar</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-right-collapsed-sidebar.html" class="disabled">
											<del>Fixed Sidebar</del>
										</a>
									</li>
									<li>
										<a href="layout-right-collapsed-sidebar.html" class="">Static Sidebar</a>
									</li>
									<li>
										<a href="layout-right-collapsed-sidebar-chat-open.html" class="">Static Sidebar &amp; Chat Open</a>
									</li>
								</ul>
							</div>
							
						</div>
						
						<div class="col-sm-4">
							
							<div class="layout-variant">
								<div class="layout-img">
									<a href="layout-horizontal-menu.html">
										<img src="/assets/images/layouts/layout-horizontal.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-horizontal-menu.html">Horizontal Menu</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-horizontal-menu.html" class="">Fixed to Top</a>
									</li>
									<li>
										<a href="layout-horizontal-menu-static.html" class="">Static on Top</a>
									</li>
									<li>
										<a href="layout-horizontal-menu-boxed.html" class="">Boxed Content with Horizontal Menu</a>
									</li>
									<li>
										<a href="layout-horizontal-menu-click-to-open-subs.html" class="">Click to Open Submenus</a>
									</li>
									<li>
										<a href="layout-horizontal-menu-min.html" class="">Minimal Horizontal Menu</a>
									</li>
								</ul>
							</div>
							
						</div>
						<div class="col-sm-4">
							
							<div class="layout-variant layout-current">
								<div class="layout-img">
									<a href="layout-horizontal-plus-sidebar.html">
										<img src="/assets/images/layouts/layout-sidebar-horizontal.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-horizontal-plus-sidebar.html">Sidebar &amp; Horizontal Menu</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-horizontal-plus-sidebar.html" class="layout-mode-current">Fixed Sidebar &amp; Horizontal Menu</a>
									</li>
									<li>
										<a href="layout-horizontal-sidebar-menu-static.html" class="">Static Sidebar &amp; Horizontal Menu</a>
									</li>
									<li>
										<a href="layout-horizontal-fixed-sidebar-menu-static.html" class="">Static Sidebar, Fixed Horizontal Menu</a>
									</li>
								</ul>
							</div>
							
						</div>
						
						<div class="clearfix"></div>
						
						<div class="col-sm-4">
							
							<div class="layout-variant">
								<div class="layout-img">
									<a href="layout-horizontal-right-sidebar-menu.html">
										<img src="/assets/images/layouts/layout-horizontal-right-sidebar.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-horizontal-right-sidebar-menu.html">Right Sidebar &amp; Horizontal Menu</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-horizontal-right-sidebar-menu.html" class="">Fixed Sidebar &amp; Horizontal Menu</a>
									</li>
									<li>
										<a href="layout-horizontal-right-sidebar-menu-static.html" class="">Static Sidebar &amp; Horizontal Menu</a>
									</li>
									<li>
										<a href="layout-horizontal-right-fixed-sidebar-menu-static.html" class="">Static Sidebar, Fixed Horizontal Menu</a>
									</li>
								</ul>
							</div>
							
						</div>
						<div class="col-sm-4">
							
							<div class="layout-variant">
								<div class="layout-img">
									<a href="layout-horizontal-sidebar-menu-collapsed.html">
										<img src="/assets/images/layouts/layout-sidebar-collapsed-horizontal.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-horizontal-sidebar-menu-collapsed.html">Collapsed Sidebar &amp; Horizontal Menu</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-horizontal-sidebar-menu-collapsed.html" class="">Static Sidebar &amp; Fixed Horizontal Menu</a>
									</li>
									<li>
										<a href="layout-horizontal-static-sidebar-menu-collapsed.html" class="">Static Sidebar &amp; Horizontal Menu</a>
									</li>
								</ul>
							</div>
							
						</div>
						
						
						<div class="col-sm-4">
							
							<div class="layout-variant">
								<div class="layout-img">
									<a href="layout-horizontal-sidebar-menu-collapsed-right.html">
										<img src="/assets/images/layouts/layout-horizontal-right-sidebar-collapsed.png" />
									</a>
								</div>
								<div class="layout-name">
									<a href="layout-horizontal-sidebar-menu-collapsed-right.html">Right Collapsed Sidebar &amp; Horizontal Menu</a>
								</div>
								<ul class="layout-links">
									<li>
										<a href="layout-horizontal-sidebar-menu-collapsed-right.html" class="">Static Sidebar &amp; Fixed Horizontal Menu</a>
									</li>
									<li>
										<a href="layout-horizontal-static-sidebar-menu-collapsed-right.html" class="">Static Sidebar &amp; Horizontal Menu</a>
									</li>
								</ul>
							</div>
							
						</div>
						
					</div>
				
				</div>
			
			</div>
<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/footer', $data);
?>
	  </div>
		
			

		
	</div>
	
	
	<?php
$data = array(
'title' => 'Welcome',  //设置title变量为Welcome
);
View::tplInclude('Frame/footerjs', $data);
?>



    
<script language="javascript"> 
$(document).ready(function(){


}) 
</script> 
    
    

</body>
</html>
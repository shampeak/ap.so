<?php View::tplInclude('Frame/header', $data); ?>
<body class="page-body">
<div class="page-loading-overlay"><div class="loader-2"></div></div>
<?php View::tplInclude('Frame/setting',  $data); ?>
<?php View::tplInclude('Frame/headbar',  $data); ?>
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
<?php View::tplInclude('Frame/sitebar',$data); ?>
		<div class="main-content">
        
<!-- path nav -->
<div class="page-title">
    <div class="title-env">
        <h1 class="title">仪表盘</h1>
        <p class="description">显示系统的运行情况，和数据情况</p>
    </div>

    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
        <li>
            <a href="/">
            <i class="fa-home"></i>
            Home
            </a>
        </li>
        <li class="active">
            <a>仪表盘</a>
        </li>
        </ol>
    </div>
</div>        
<!-- path nav end -->
        
        <script>
				var xenonPalette = ['#68b828','#7c38bc','#0e62c7','#fcd036','#4fcdfc','#00b19d','#ff6264','#f7aa47'];
			</script>
<!-- row -->


			<div class="row">
				<div class="col-sm-12">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">数据库数据情况</h3>
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
						<div class="panel-body">	
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									function getjson(url){
										options = {
											url : url,
											dataType: "json",
											async:false,
											cache:true
										}
										return $.ajax(options).responseJSON;
									}
									$("#bar-1").dxChart({
										dataSource:getjson('/home/Getdbused'),
										series: {
											argumentField: "table",
											valueField: "val",
											name: "Sales",
											type: "bar",
											color: '#68b828'
										},
										tooltip: {
											enabled: false,
											customizeText: function() { 
												return this.argumentText + "<br/>" + this.valueText;
											}
										},
										pointClick: function(point) {
											point.showTooltip();
											clearTimeout(timer);
										},										
										
									});
									
								});
							</script>
							<div id="bar-1" style="height: 440px; width: 100%;"></div>
							<br />
							
						</div>
					</div>
						
				</div>
			</div>
			
		
			
			
			
			<div class="row">
				<div class="col-sm-12">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">数据</h3>
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
						<div class="panel-body">	
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{


//var dataSource = [
//	{region: "Asia", val: 4119626293},
//	{region: "Africa", val: 1012956064},
//	{region: "Northern America", val: 344124520},
//	{region: "Latin America and the Caribbean", val: 590946440},
//	{region: "Europe", val: 727082222},
//	{region: "Oceania", val: 35104756}
//], timer;


									function getjson(url){
										options = {
											url : url,
											dataType: "json",
											async:false,
											cache:true
										}
										return $.ajax(options).responseJSON;
									}
									var dataSource = getjson('/home/Getdbused'), timer;
//									console.log(dataSource);
									$("#bar-10").dxPieChart({
										dataSource: dataSource,
										title: "表分布",
										tooltip: {
											enabled: false,
										  	//format:"millions",
											customizeText: function() { 
											//console.log( this.argumentText + "<br/>" + this.valueText);
												return this.argumentText + "<br/>" + this.valueText;
											}
										},
										size: {
											height: 420
										},
										pointClick: function(point) {
											point.showTooltip();
											clearTimeout(timer);
											//timer = setTimeout(function() { point.hideTooltip(); }, 2000);
											//$("select option:contains(" + point.argument + ")").prop("selected", true);
										},
										legend: {
											visible: false
										},
										series: [{
											argumentField	: "table",
											//valueField		: "val",
											type: "doughnut",
										}],
										palette: xenonPalette
									});
									
								});
							</script>
							<div id="bar-10" style="height: 450px; width: 100%;"></div>
						</div>
					</div>
						
				</div>
			</div>


<!-- -->        
        
					

			
			
			

			

<?php
View::tplInclude('Frame/footer',$data);
?>
	  </div>
		
			

		
	</div>
	
	
<?php
View::tplInclude('Frame/footerjs',$data);
?>



    
<script language="javascript"> 
function showAjaxModal()
{
	jQuery('#modal-7').modal('show', {backdrop: 'static'});
	
	jQuery.ajax({
		url: "/test.html",
		success: function(response)
		{
			jQuery('#modal-7 .modal-body').html(response);
		}
	});
}

$(document).ready(function(){


}) 
</script> 
    
    	<!-- Modal 7 (Ajax Modal)-->
	<div class="modal fade" id="modal-7">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Dynamic Content</h4>
				</div>
				
				<div class="modal-body">
				
					Content is loading...
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-info">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Imported scripts on this page -->
	<script src="/assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
	<script src="/assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>

</body>
</html>

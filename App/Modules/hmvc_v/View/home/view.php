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
        <h1 class="title"><?=$title?></h1>
        <p class="description"><?=$dis?></p>
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
            <a><?=$title?></a>
        </li>
        </ol>
    </div>
</div>        
<!-- path nav end -->

<!-- row -->


			<div class="row">
				<?=D($data)?>
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

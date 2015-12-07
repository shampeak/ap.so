

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
	<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
	<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
	<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->

	<div class="main-content">
					
		<!-- User Info, Notifications and Menu Bar -->
		<div class="page-title">
				
			<div class="title-env">
					<h1 class="title">编辑</h1>
		  </div>
	  </div>
	
				<div class="form-group">
                   
                    <input name="sm_bookid" id="field-1" class="form-control sm_bookid" type="hidden" value="<?=$GET['bookid']?>">

                     <h3>pre ： </h3>
                    <select name="sm_preid" class="form-control sm_preid" id="sboxit-1">
                        <option value="0" <?php if(0 == $node['preid']) echo ' selected="selected" '?>>基础 pre=0</option>
                        <?php
                        foreach($prelist as $key=>$value){
                        ?>
                            <option value="<?=$value['nodeid']?>" <?php if($value['nodeid'] == $node['preid']) echo ' selected="selected" '?>><?=$value['title']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    
                     <!-- h3>类型 ： </h3>
                    <select name="sm_type" class="form-control sm_type" id="sboxit-1">
                    <option value="con" <?php if('con' == $node['type']) echo 'selected="selected" '?>>markdown </option>
                    <option value="fun" <?php if('fun' == $node['type']) echo ' selected="selected" '?>>函数 </option>
                    <option value="cla" <?php if('cla' == $node['type']) echo ' selected="selected" '?>>类 </option>
                    <option value="tes" <?php if('tes' == $node['type']) echo ' selected="selected" '?>>测试 </option>
                    </select -->
                    
                    
                    
                    
                    <h3>node <?=$node['nodeid']?> ： </h3>
                    <input name="sm_title" id="field-1" class="form-control sm_title" type="text" value="<?=$node['title']?>">
                    <h3>sort ： </h3>
                    <input name="sm_sort" id="field-1" class="form-control sm_sort" type="text" value="<?=$node['sort']?>">

                    <h3>说明文字</h3>
                    <textarea name="sm_nr" class="form-control ckeditor sm_nr" rows="5" ><?=$node['nr']?></textarea>
                    <h3>代码示例2</h3>
                    <textarea name="sm_nrcode" class="form-control sm_nrcode" rows="5" data-uk-htmleditor="{markdown:true}"><?=$node['nrcode']?></textarea>
                    
                    <!-- h3>参数【json】</h3>
                    <textarea name="params" class="form-control" rows="10"><?=$node['params']?></textarea -->
                    <input type="hidden" name="sm_nodeid" class="sm_nodeid" value="<?=$node['nodeid']?>">
                  <input type="button" name="button" id="sm_sub" value="提交">
				</div>
			
			
			<br />
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
  <!-- Or class "fixed" to  always fix the footer to the end of page --></div>
		
			
		<!-- start: Chat Section -->
  <div id="chat" class="fixed"><!-- conversation template --></div>
		<!-- end: Chat Section -->
		
		
</div>
	<!-- Imported styles on this page -->

<script type='text/dialog']>
$(document).ready(function() {
// put all your jQuery goodness in here.


    
    

	$("#sm_sub").click(function(){
		
		
		
		
		var res = $.ajax({
				url : '/doc/doclist/show/',
				type: 'post',
				data: {
					bookid 	: $('.sm_bookid').val(),
					preid 	: $('.sm_preid').val(),
					type 	: $('.sm_type').val(),
					title 	: $('.sm_title').val(),
					sort 	: $('.sm_sort').val(),
					nr 		: $('.sm_nr').val(),
					nrcode 	: $('.sm_nrcode').val(),
					nodeid 	: $('.sm_nodeid').val(),
					},
				dataType: "json",
				async:false,
				cache:false
			}).responseJSON;
			//==========================1
			if(res.code<0){
				alert(res.msg);
				return false;
			}else{
				//location.reload();
				alert(res.msg);
				return true;
			}			
		
		
		
		
		
		
		
		
		
		
		
	});
});  
</script>
	
	



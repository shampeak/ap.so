


<form role="form" class="form-horizontal">
								
								
								
								<div class="form-group">
									<label class="col-sm-2 control-label">密码</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="edpwd" class="form-control no-right-border" placeholder="密码">
											<input name="eduid" type="hidden" value="<?=$row['uid']?>">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">确认密码</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="edpwdre" class="form-control no-right-border" placeholder="确认密码">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">真实姓名</label>
									
									<div class="col-sm-10">
										<div class="input-group input-group-lg input-group-minimal">
											<span class="input-group-addon">
												<i class="linecons-pencil"></i>
											</span>
											<input name="edtname" class="form-control no-right-border" placeholder="真实姓名" value="<?=$row['tname']?>">
											<span class="input-group-addon">
												<i class="linecons-paper-plane"></i>
											</span>
										</div>

									</div>
								</div>
                                
                                
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">用户组</label>
									<div class="col-sm-10">
                                    
<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#sboxit-1").selectBoxIt().on('open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
											});
										});
									</script>
									
									<select name="edgroupid" class="form-control" id="edgroupid">
                                    <?php
                                    foreach($grouplist as $key=>$value){
									?>
										<option value="<?=$value['groupid']?>"  <?php echo ($value['groupid'] == $row['groupid'])?'selected="selected"':''?>><?=$value['groupname']?></option>
                                    <?php
										}
									?>
									</select>

									</div>
								</div>
								
								
							
                                
                                
                                
                                
                                
							
							</form>


<script type="text/dialog">
$(document).ready(function(){
	
$(".modal_ok").unbind( "click" );
	
	
		$('.modal_ok').click(function(){
			if($("input[name='edpwd']").val() != $("input[name='edpwdre']").val()){
				alert('两次密码不一致!');
				return false;
			}

			if($("input[name='edpwd']").val() != ''){
				if($("input[name='edpwd']").val().length < 6){
					alert('长度太短!');
					return false;
				}
			}
			
			var res = $.ajax({
				url : '/s/user/userlist/ed',
				type: 'post',
				data: {
					uid 		: $("input[name='eduid']").val(),
					pwd 		: $("input[name='edpwd']").val(),
					tname 		: $("input[name='edtname']").val(),
					groupid 	: $("#edgroupid").val(),
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
				location.reload();
				return true;
			}			
			
			
			
		});
});

</script>
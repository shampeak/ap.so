<form role="form" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">组名</label>
        
        <div class="col-sm-10">
            <div class="input-group input-group-lg input-group-minimal">
                <span class="input-group-addon">
                    <i class="linecons-pencil"></i>
                </span>
                <input name="edgroupname" class="form-control no-right-border" placeholder="" value="<?=$res['groupname']?>">
                <input name="edgroupid" type="hidden" value="<?=$res['groupid']?>">
                <span class="input-group-addon">
                    <i class="linecons-paper-plane"></i>
                </span>
            </div>

        </div>
    </div>
    
    <div class="form-group-separator"></div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">标识</label>
        
        <div class="col-sm-10">
            <div class="input-group input-group-lg input-group-minimal">
                <span class="input-group-addon">
                    <i class="linecons-pencil"></i>
                </span>
                <input name="edgroupchr" class="form-control no-right-border" placeholder="标识" value="<?=$res['groupchr']?>">
                <span class="input-group-addon">
                    <i class="linecons-paper-plane"></i>
                </span>
            </div>

        </div>
    </div>
    
    <div class="form-group-separator"></div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">排序</label>
        
        <div class="col-sm-10">
            <div class="input-group input-group-lg input-group-minimal">
                <span class="input-group-addon">
                    <i class="linecons-pencil"></i>
                </span>
                <input name="edsort" class="form-control no-right-border" placeholder="排序" value="<?=$res['sort']?>">
                <span class="input-group-addon">
                    <i class="linecons-paper-plane"></i>
                </span>
            </div>

        </div>
    </div>
</form>


<script type="text/dialog">
$(document).ready(function(){
$(".modal_ok").unbind( "click" );
	
		$('.modal_ok').click(function(){
			var res = $.ajax({
				url : '/s/user/Grouplist/ed',
				type: 'post',
				data: {
					groupid 	: $("input[name='edgroupid']").val(),
					groupname 	: $("input[name='edgroupname']").val(),
					groupchr 	: $("input[name='edgroupchr']").val(),
					sort 		: $("input[name='edsort']").val(),
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
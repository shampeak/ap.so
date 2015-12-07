<form role="form" class="form-horizontal">
<table>
    <tr>
        <td valign="top"><table class="table table-model-2 table-hover">
                <tr>
                  <td>排序 ： 
                    <input name="edsort" type="text" value="<?=$row['sort']?>"/><input name="edid" type="hidden" value="<?=$row['id']?>"/></td>
                </tr>
                <tr>
                    <td>版本 :
                        <input name="edv" type="text" value="<?=$row['v']?>"/></td>
                </tr>
                <tr>
                    <td>接口 :<input type="text" name="edapi"  value="<?=$row['api']?>"/>
                        </td>
                </tr>
                <tr>
                  <td>名称 :
                    <input name="edname" type="text" size="50"  value="<?=$row['name']?>"/></td>
                </tr>
                <tr>
                  <td>调试 :
                    <input name="eddebug" type="radio" value="0" <?php if(!$row['debug'])echo 'checked="checked"';?>/>
                    开启
                    <input name="eddebug" type="radio" value="1"  <?php if($row['debug'])echo 'checked="checked"';?>/>
                    关闭</td>
                </tr>
                <tr>
                  <td>关闭 :
                    <input name="edenable" type="radio" value="1" <?php if($row['enable'])echo 'checked="checked"';?>/>
有效
<input type="radio" name="edenable" value="0" <?php if(!$row['enable'])echo 'checked="checked"';?>/>
无效</td>
                </tr>
                <tr>
                    <td>类型 ： 
                      <br />
                      <input name="edtype" type="radio" value="GET" <?php if($row['type'] == 'GET')echo 'checked="checked"';?>/> 
                      GET
<br />
<input type="radio" name="edtype" value="POST" <?php if($row['type'] == 'POST')echo 'checked="checked"';?>/> 
POST
<br />
<input type="radio" name="edtype" value="PUT" <?php if($row['type'] == 'PUT')echo 'checked="checked"';?>/> 
PUT
<br />
<input type="radio" name="edtype" value="DELETE" <?php if($row['type'] == 'DELETE')echo 'checked="checked"';?>/> 
DELETE
<br />
<input type="radio" name="edtype" value="OTHER" <?php if($row['type'] == 'OTHER')echo 'checked="checked"';?>/> 
OTHER</td>
                </tr>
            </table></td>
        <td><table class="table table-hover table-condensed" >
                <tr>
                    <td>模拟提交<br />
                      <textarea class="edrequest" name="edrequest" cols="60" rows="6"><?=$row['request']?></textarea></td>
                </tr>
                <tr>
                    <td>模拟回复<br />
                      <textarea class="edresponse" name="edresponse" cols="60" rows="6"><?=$row['response']?></textarea></td>
                </tr>
                <tr>
                    <td>说明<br />
          <textarea class="eddis" name="eddis" cols="60" rows="6"><?=$row['dis']?></textarea></td>
                </tr>
            </table></td>
    </tr>
</table>
</form>


<script type="text/dialoglist_edit">

$(document).ready(function(){
$(".modal_ok").unbind( "click" );
	
		$('.modal_ok').click(function(){
			
			var res = $.ajax({
				url : '/s/api/list/ed',
				type: 'post',
				data: {
					id 		: $("input[name='edid']").val(),
					sort 	: $("input[name='edsort']").val(),
					v 		: $("input[name='edv']").val(),
					api 	: $("input[name='edapi']").val(),
					name 	: $("input[name='edname']").val(),
					
					debug 	: $("input[name='eddebug']:checked").val(),
					enable 	: $("input[name='edenable']:checked").val(),
					type 	: $("input[name='edtype']:checked").val(),
					
					request : $(".edrequest").val(),
					response: $(".edresponse").val(),
					
					dis 	: $(".eddis").val(),
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
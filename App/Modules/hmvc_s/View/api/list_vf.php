<div class="row">

<div class="col-sm-6">


<form role="form" class="form-horizontal">
  <table class="table table-model-2 table-hover">
    <tr>
      <td><?=$row['name']?></td>
    </tr>
    <tr>
      <td>访问地址 :
        <input class="baseurl" name="edv" type="text" value="<?=$row['v']?>/<?=$row['api']?>" size="50"/></td>
    </tr>
    <tr>
      <td>模拟提交<br />
        <textarea class="rowrequest" name="edrequest" cols="60" rows="6"><?=$row['request']?></textarea></td>
    </tr>
    <tr>
      <td><pre><?=$row['dis']?></pre></td>
    </tr>

    <tr>
      <td><button type="button" class="btn btn-info modal_ok">提交</button>
</td>
    </tr>

    
  </table>
</form>
</div>
<div class="col-sm-6">
 <table class="table table-model-2 table-hover">
<tr>
<td>返回的json数据 ： <div class="resultte"></div>
</td>
</tr>

<tr>
<td>获得到的post数据 ：  <pre class="resultte_getpost"></pre></td>
</tr>

    
  </table>
</div>

</div>


<script type="text/dialoglist_edit">

$(document).ready(function(){
$(".modal_ok").unbind( "click" );
	
		$('.modal_ok').click(function(){
			
			var co = $('.rowrequest').val();
			if(co == '')co = '{}';
			co=co.replace(/\ +/g,"");//去掉空格
			//co=co.replace(/[ ]/g,"");    //去掉空格
			co=co.replace(/[\r\n]/g,"");//去掉回车换行			
			var vs = JSON.parse(co)
			vs.type_cv1 = 'javascript_debug';
			//提交的地址url
			var url = '/'+$('.baseurl').val();
			
			var res = $.ajax({
			//			url :  '/'+$('.baseurl').val(),
				url :  url,
				type: 'post',
				data: vs,
				dataType: "json",
				async:false,
				cache:false
			}).responseJSON;
			var _getpost = res.getpost;
			//res.getpost = {};
			console.log(_getpost);
			//getpost = JSON.stringify(_getpost);
			getpost = _getpost;//JSON.stringify(_getpost)
			
			console.log(getpost);
			res = JSON.stringify(res)
			
			$('.resultte_getpost').text(getpost)
			$('.resultte').text(res)
			
			
			
			
		});
});



</script>
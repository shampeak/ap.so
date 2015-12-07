/*
//功能有限，适用范围是 功能简单，不需要刷新，没有复窗口

$(".dialog222").click(function(){
	$.CK({
		rel:$(this).attr('rel'),
		//width:'96%',
	});
});

//命令关闭窗口

$('#'+bootstrap_dialog.diaid).hide();
$('.modal-backdrop').remove();
==
$.CKend(bootstrap_dialog);


*/
var bootstrap_dialog;
jQuery.extend({
	CKend:function(option) {
		$('#'+option.diaid).hide();
		$('.modal-backdrop').remove();
	},
	CKfill:function(option) {
		console.log(option);
		var htmlget = function(option){
			options = {
				url : option.rel,
				dataType: "html",
				async:false,
				cache:true
			};
			return $.ajax(options).responseText;
		};
		
		html = htmlget(option)
		$('#'+option.tid).html(html);
		
		
		var JS = $("script[type='text/dialog']").html();
		eval(JS);												//sytle
		//option.backdrop = 'fade';								//先加载
		
		//bootstrap_dialog = option;
		//console.log(option_ck);
		//jQuery("#"+tag).modal('show', {backdrop: 'fade'});
	},
	

});

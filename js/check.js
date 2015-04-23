$('document').ready(function(){
	
	$('.btn').click(function(){
		var title		= $(".topic").val();
		var content 		= $("#editor").val();
		if(title.length<=1){
			alert('请填写正确的主题,确保两个字符以上');
			return false;
		}
		if(content.length<=2){
			alert('请填写正确的内容');
			return false;
		}

	});

});
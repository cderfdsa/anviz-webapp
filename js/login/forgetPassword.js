mui.ready(function(){
	jQuery('#forgetPassword').on('tap',function(){
		forgetPsd();
	});
	
	jQuery('#email').focus();
})

function forgetPsd(){
	mui.ajax({
		type: 'POST',
		url: MyAnviz.baseUrl+'/register/forgotsave.html',
		data: buildJson(),
		dataType: 'json',
		timeout: 10000,
		success: function(data) {
			console.log(data);
			if(data.success == true){
				mui.openWindow({
					//如果注册成功，则跳转至登录窗口
					url: MyAnviz.baseUrl+'/login.html'
				})
			}else{
				mui.toast(data.message);
			}
			mui.back();
		},
		error: function(xhr, type, errorThrown, data) {
			if(data.success == false) {
				mui.toast(data.message);
			}
		}
	})
}

function buildJson(){
	var email = jQuery('#email').val();
	/*if(!email){
		mui.toast('Please enter the email address you want to modify!');
		return false;
	}*/
	
	var jsonObj = {
		'email':email
	}
	
	return jsonObj;
}

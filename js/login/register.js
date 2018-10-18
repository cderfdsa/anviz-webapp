mui.ready(function() {
	jQuery('#register').on('tap',function(){
		registerData();
	});
	
	jQuery('#email').focus();
})

function registerData() {
	mui.ajax({
		type: 'POST',
		url: MyAnviz.baseUrl+'/register/save.html',
		data: buildJson(),
        dataType: 'json',
        timeout: 10000,
        success: function (data) {
			console.log(data);
			if(data.success == true){
				jQuery('.anviz-successful-prompting').text(data.message);
				mui.toast('Successfully!')
				setTimeout(function(){
					mui.openWindow({
					//如果注册成功，则跳转至登录窗口
						url: MyAnviz.baseUrl+'/login.html'
					})
				},200);
			}
			else {
				jQuery('.anviz-warning-prompting').text(data.message);
			}
			/*mui.back();*/
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
	var password = jQuery('#password').val();
	var configPassword = jQuery('#ConfigPassword').val();
	var last_name = jQuery('#last_name').val();
	
	var jsonObj = {
		'email':email,
		'password':password,
		'confirmpassword':configPassword,
		'last_name':last_name
	};
	
	return jsonObj;
}

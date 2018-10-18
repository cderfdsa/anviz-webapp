mui.ready(function() {
	jQuery('#changeEmailSave').on('tap',function(){
		setChangeEmail();
	});
	
	jQuery('#passwordSave').on('tap',function(){
		setChangePwd();
	});
	
	jQuery('#changeMail').focus();
	jQuery('#originalPassword').focus();
});

function setChangeEmail() {
	mui.ajax({
		type: 'Post',
		url: MyAnviz.baseUrl+'/profile/email/save.html',
		data: emailBuildJson(),
		dataType: 'json',
		timeout: 10000,
		success: function(data) {
			console.log(data);
			if(data.success == true) {
				jQuery('.anviz-warning-prompting').text(data.message);
				setTimeout(function(){
					mui.openWindow({
					//如果注册成功，则跳转至登录窗口
						url: MyAnviz.baseUrl+'/login.html'
					})
				},500);
			} else {
				jQuery('.anviz-warning-prompting').text(data.message);
			}
		},
		error: function(xhr, type, errorThrown, data) {
			if(data.success == false) {
				mui.toast(data.message);
			}
		}

	})
}

function setChangePwd() {
	mui.ajax({
		type: 'Post',
		url: MyAnviz.baseUrl +'/profile/password/save.html',
		data: pwdBuildJson(),
		dataType: 'json',
		timeout: 10000,
		success: function(data) {
			console.log(data);
			if(data.success == true) {
				mui.back();
			} else {
				mui.toast(data.message);
			}
		},
		error: function(xhr, type, errorThrown, data) {
			if(data.success == false) {
				mui.toast(data.message);
			}
		}

	})
}

function emailBuildJson() {
	var newMail = jQuery('.new-mail').val();
	var oldMail = jQuery('.original-mail').val();

	/*if(!originalMail) {
		mui.toast('The original mail cannot be empty!');
		return false;
	}

	if(!newMail) {
		mui.toast('The new mail cannot be empty!');
		return false;
	}

	if(!newMailAgain) {
		mui.toast('The new-mail-again cannot be empty!');
		return false;
	}*/

	var jsonObj = {
		'email': newMail,
		'old_email': oldMail
	}

	return jsonObj
}

function pwdBuildJson() {
	var originalPwd = jQuery('.original-password').val();
	var newPwd = jQuery('.new-password').val();
	var newPwdAgain = jQuery('.new-password-again').val();

	/*if(!originalPwd) {
		mui.toast('The original password cannot be empty!');
		return false;
	}

	if(!newPwd) {
		mui.toast('The new-password cannot be empty!');
		return false;
	}

	if(!newPwdAgain) {
		mui.toast('The new-password again cannot be empty!');
		return false;
	}*/

	var jsonObj = {
		'old_password': originalPwd,
		'password': newPwd,
		'confirmpassword': newPwdAgain
	}

	return jsonObj
}
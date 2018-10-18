mui.ready(function() {
	isFouce();

	jQuery('#login').on('tap', function() {
		var isSwitchValue;
		var emailValue = jQuery('#email').val();
		var passwordValue = jQuery('#password').val();
		jQuery('.mui-content .mui-switch').each(function(e) {
			isSwitchValue = (this.classList.contains('mui-active') ? 'true' : 'false');
			if(isSwitchValue == 'true') {
				localStorage.setItem('email',emailValue);
				localStorage.setItem('password',passwordValue);
			}
		});

		if(isSwitchValue == true) {

			var email = localStorage.getItem('email') ? localStorage.getItem('email') : '';
			var password = localStorage.getItem('password') ? localStorage.getItem('password') : '';
			
			jQuery('#email').text(email);
			jQuery('#password').text(password);
			
			var entityCookie = {
				'email': email,
				'password': password
			}
			setLogin(entityCookie);
		} else {
			var entity = buildJson();
			setLogin(entity);
		}

	})

	jQuery('#reg').on('tap', function() {
		var url = jQuery(this).attr('href');
		mui.openWindow({
			url: url,
			id: 'registerPage'
		})
	});
	jQuery('#forgetPassword').one('tap', function() {
		var url = jQuery(this).attr('href');
		mui.openWindow({
			url: url,
			id: 'forgetPasswordPage'
		})
	});

	jQuery('#email').focus();
});

function setLogin(entity) {
	if(entity.email != '' && entity.password != '') {
		mui.ajax({
			type: 'POST',
			url: MyAnviz.baseUrl + '/login/chklogin.html',
			data: entity,
			dataType: 'json',
			timeout: 10000,
			beforeSend: function(data) {
				if(data.readyState == 0) {
					jQuery('.anviz-loading').show(100);
				}
			},
			success: function(data) {
				console.log(data);
				if(data.success == true) {
					mui.openWindow({
						url: MyAnviz.baseUrl + '/profile.html'
					});
				} else {
					mui.toast(data.message);
				}
			},
			complete: function(data) {
				if(data.status == 200) {
					jQuery('.anviz-loading').show(100).hide();
					return false;
				}
			},
			error: function(data) {
				if(data.success == false) {
					mui.toast(data.message);
				}
			}
		})
	} else {
		mui.toast('Please enter an email address!');
		return false;
	}

}

function buildJson() {
	var emailValue = jQuery('#email').val();
	var passwordValue = jQuery('#password').val();

	//是否将密码保存在本地
	jQuery('.mui-content .mui-switch').each(function(e) {

		var isSwitchValue = (this.classList.contains('mui-active') ? 'true' : 'false');
		console.log("是否被选中：" + isSwitchValue);
		if(isSwitchValue == 'true') {
			jQuery.cookie('email', emailValue, {
				expires: 7,
				path: '/'
			});
			jQuery.cookie('password', passwordValue, {
				expires: 7,
				path: '/'
			});
		} else {
			jQuery.cookie('email', '', {
				expires: -1,
				path: '/'
			});
			jQuery.cookie('password', '', {
				expires: -1,
				path: '/'
			});
		}
	});

	var josnObj = {
		'email': emailValue,
		'password': passwordValue
	};

	return josnObj;
}

function isFouce() {
	var h = document.body.scrollHeight;
    window.onresize = function(){
        if (document.body.scrollHeight < h) {
            document.getElementsByTagName("nav")[0].style.display = "none";
        }else{
            document.getElementsByTagName("nav")[0].style.display = "block";
        }
    };
}
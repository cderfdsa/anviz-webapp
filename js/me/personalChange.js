
mui.ready(function() {
	jQuery('#moreList').on('tap', function() {
		mui.openWindow({
			url: "./sub_information.html"
		})
	});

	jQuery('#informationSave').on('tap', function() {
		simplePersonal();
	});
	
	jQuery('#firstName').focus();

})

function simplePersonal() {
	mui.ajax({
		type: 'POST',
		url: MyAnviz.baseUrl+'/profile/index/save.html',
		data: buildJson(),
		dataType: 'json',
		timeout: 10000,
		success: function(data) {
			console.log(data);
			if(data.success == true){
				mui.back();
			}
			else {
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

function buildJson() {
	var firstName = jQuery('#firstName').val();
	var lastName = jQuery('#lastName').val();
	var jobTitle = jQuery('#jobTitle').val();
	var Tel = jQuery('#Tel').val();

	var genderSelected = jQuery('#Gender').find('.mui-selected').text();
	if(genderSelected == 'Male'){
		var salutation = 'Mr.';
	}else{
        var salutation = 'Mrs.';
	}

	/*if(!firstName) {
		mui.toast('The First Name cannot be empty!');
		return false;
	}
	if(!lastName) {
		mui.toast('The Last Name cannot be empty!');
		return false;
	}
	if(!jobTitle) {
		mui.toast('The job title cannot be empty!');
		return false;
	}
	if(!Tel) {
		mui.toast('The tel num cannot be empty!');
		return false;
	}*/

	var jsonObj = {
		'firstName': firstName,
		'lastName': lastName,
		'job_title': jobTitle,
		'phone': Tel,
		'salutation': salutation
	};
	return jsonObj;
}
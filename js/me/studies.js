mui.ready(function() {
	/*getCountryData();*/
	fontNum();
	jQuery('#studiesSave').on('tap', function() {
		setStudiesData();
	});
	
	jQuery('#studiesTitle').focus();
});

function setStudiesData() {
	mui.ajax({
		type: 'POST',
		url: MyAnviz.baseUrl+'/casestudy/index/save.html',
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
		error: function(data) {
			if(data.success == false) {
				mui.toast(data.message);
			}
		}
	})
}

function buildJson() {
	var title = jQuery('#studiesTitle').val();
	var countrySelect = jQuery('#countrySelect').val();
	var modelSelect = jQuery('#modelSelect').val();
	var studiesText = jQuery('#studiesText').val();
	
	var studiesDate = jQuery('#selectTime').text();
	var jsonObj = {
		'title': title,
		'country': countrySelect,
		'model': modelSelect,
		'description': studiesText,
		'studiesDate': studiesDate
	};

	return jsonObj;

}

function fontNum() {
	jQuery('.anviz-textarea').delegate('#studiesNum', 'input propertychange', function(e) {
		e.stopPropagation();
		var fontNum = jQuery(this).val().length;
		if(fontNum > 200) {
			var curChart = jQuery(this).value;
			curChart = curChart.substr(0, 200);

			jQuery(this).val(curChart);
			fontNum = 200;
			mui.toast('输入字数不能超过200');
		}
		jQuery(this).parent().find('.font-num').text(fontNum);
	})
}


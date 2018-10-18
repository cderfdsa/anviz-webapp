mui.ready(function() {
	fontNum();
	jQuery('#storieslSave').on('tap', function() {
		getStorieslDada();
	})
	
	jQuery('#addTicketTitle').focus();
	jQuery('#storieslTitle').focus();
})

function fontNum() {
	jQuery('.anviz-textarea').delegate('#storieslText', 'input propertychange', function(e) {
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

function getStorieslDada() {
	mui.ajax({
		type: 'POST',
		url: MyAnviz.baseUrl+'/stories/index/save.html',
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
	var title = jQuery('#storieslTitle').val();
	var curDate = $('#selectTime').text();
	var curStoriesl = jQuery('#storieslText').val();

	var jsonObj = {
		'title': title,
		'date': curDate,
		'description': curStoriesl
	}
	return jsonObj;
}


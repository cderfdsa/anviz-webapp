mui.ready(function() {
	fontNum();

	jQuery('#adviceSave').on('tap', function() {
		/*mui.toast('还没有接口！');*/
		setData();
	});
	
	jQuery('#adviceName').focus();
});

function setData() {
	if(jQuery('#adviceId').val() != '') {
		mui.ajax({
			type: "post",
			url: MyAnviz.baseUrl + '/advice/index/save.html',
			data: buildJson(),
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
}

function buildJson() {
	var title = jQuery('#adviceName').val();
	console.log('title' + title);
	var adviceCategory = jQuery('#adviceCategory').val();
	var textareaValue = jQuery('#advieText').val();

	/*if(!title){
		mui.toast('The title cannot be empty!');
		return false;
	}
	if(!adviceCategory){
		mui.toast('The category cannot be empty!');
		return false;
	}
	if(!textareaValue){
		mui.toast('Description cannot be empty!')
		return false;
	}*/

	var jsonObj = {
		'title': title,
		'advices_type': adviceCategory,
		'contents': textareaValue,
		'imgList': uploadData()
	};

	return jsonObj;
}

//即时搜索
function fontNum() {
	jQuery('.anviz-textarea').delegate('#advieText', 'input propertychange', function(e) {
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

//图片上传
function uploadData() {
	var box = jQuery('#image-list');
	var content = jQuery('.mui-page-content');
	var feedback = jQuery('#feedback');
	var filesHtml = [];

	jQuery('#image-list').on('change', function(e) {
		// 获取图片资源
		var file = e.target.files[0];

		// 用formdata上传文件
		var fd = new FormData();
		// 填入文件，可以作为上传的参数
		fd.append('file', file, file.name);

		// 成功后显示文件预览
		var reader = new FileReader();
		// 读取文件
		reader.readAsDataURL(file);
		//渲染文件
		reader.onload = function() {
			var closeBtn = "X";
			//处理 android 4.1 兼容问题
			var base64 = reader.result.split(',')[1];
			var dataUrl = 'data:image/png;base64,' + base64;
			var img = '<div class="image-item" style="position: relative;top: -59px;background: url(' + dataUrl + ') no-repeat;background-size: contain;background-size: 100% 100%;"></div>';
			var html = jQuery.parseHTML(img);
			jQuery('#image-list').prepend(html);
			//添加closebtn
			Query('.image-item').append(closeBtn);
		}
		//选择的全部图片
		filesHtml.push(file);
		return filesHtml;
	})
}
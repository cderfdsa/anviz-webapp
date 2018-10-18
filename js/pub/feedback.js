mui.ready(function(){
	fontNum();
	loadingProductor();
	newPlaceholder();
	
	$('#ticketSave').on('tap', function() {
		addTicket();
	});
	
	//关联查询
	jQuery('#addSelectedTicket').change(function(){
		var value = jQuery(this).val(); 
		getProName(value);
	});
	
	jQuery('#addTicketTitle').focus();
})


/**
 * 获取图片
 * 初始化图片占位
 * 删除图片
 * 预览图片
 */
var fileArr = [];
var imageList = get('image-list');
var imgHtml = imageList.innerHTML = '';

function get(id) {
	return document.getElementById(id);
};

function getFileInputArray() {
	return [].slice.call(imageList.querySelectorAll('input[type="file"]'));
};

function getFileInputIdArray() {
	var fileInputArray = getFileInputArray();
	var idArray = [];
	fileInputArray.forEach(function(fileInput) {
		if (fileInput.value != '') {
			idArray.push(fileInput.getAttribute('id'));
		}
	});
	return idArray;
};

/**
 * 初始化图片域占位
 */
var imageIndexIdNum = 0;
function newPlaceholder() {
	
	var data;
	var fileInputArray = getFileInputArray();
	
	if (fileInputArray &&
		fileInputArray.length > 0 &&
		fileInputArray[fileInputArray.length - 1].parentNode.classList.contains('space')) {
		return;
	}
	imageIndexIdNum++;
	var placeholder = document.createElement('div');
	placeholder.setAttribute('class', 'image-item space');
	//删除图片
	var closeButton = document.createElement('div');
	closeButton.setAttribute('class', 'image-close');
	closeButton.innerHTML = 'X';
	//小X的点击事件
	closeButton.addEventListener('tap', function(event) {
		event.stopPropagation();
		event.cancelBubble = true;
		setTimeout(function() {
			imageList.removeChild(placeholder);
		}, 0);
		return false;
	}, false);
	
	
	var fileInput = document.createElement('input');
	fileInput.setAttribute('type', 'file');
	fileInput.setAttribute('accept', 'image/*');
	fileInput.setAttribute('id', 'image-' + imageIndexIdNum);
	fileInput.addEventListener('change', function(event) {
		var file = fileInput.files[0];
		var fileEntity = {};
		
		if (file) {
			var reader = new FileReader();
			reader.onload = function() {
				
				//处理 android 4.1 兼容问题
				var base64 = reader.result.split(',')[1];
				var dataUrl = 'data:image/png;base64,' + base64;
				var fileName = file.name;
				var fileType = file.type;
				
				fileEntity.fileName = fileName;
				fileEntity.fileType = fileType;
				fileEntity.fileUrl = dataUrl;
				
				fileArr.push(fileEntity);
				var data = JSON.stringify(fileArr);
				sessionStorage.setItem('arr',data);
				
				placeholder.style.backgroundImage = 'url(' + dataUrl + ')';
			}
			
			reader.readAsDataURL(file);
			placeholder.classList.remove('space');
			/*如果不运行，只能上传一张图片就隐藏上传按钮*/
			newPlaceholder();
		}
	});
	
	placeholder.appendChild(closeButton);
	placeholder.appendChild(fileInput);
	imageList.appendChild(placeholder);	
}


//查询子级产品
function getProName(value){
	var url = MyAnviz.baseUrl + '/product/ajax/select.html?category_id=' + value;
	var optionp  = '';
	var defaultOption = '<option value="-1">--None--</option>';
	mui.ajax({
		type: 'GET',
		url: url,
		dataType: 'json',
		success: function(data) {
			for(var i = 0; i < data.length; i++){
				var name = data[i].productorName;
				var value = data[i].contentId;
				optionp += "<option  value='" + value + "'>"+name+"</option>";
			}
			jQuery('#addTicketModelSelected').html(optionp);
		},
		error: function(data) {
			if(data.success == false){
				mui.toast(data.message)
			}
		}
	});
}

//即时搜索
function fontNum() {
	jQuery('.js-textarea').delegate('#textarea', 'input propertychange', function(e) {
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



function addTicket() {
	var url = MyAnviz.baseUrl + '/ticket/index/save.html';
	mui.ajax({
		type: "post",
		url: url,
		data: buildJson(),
		dataType: 'json',
		timeout: 10000,
		success: function(data) {
			if(data != null && data != undefined){
				mui.toast('success!')
				mui.back();
			}else {
				/*mui.toast(data.message);*/
				mui.toast('save failed!')
			}
		},
		error: function(data) {
			if(data.success == false) {
				mui.toast(data.message);
			}
		}
	})
}

function console(string){
	console.log(string);
}

function buildJson() {
	/*var ticketId = jQuery('#ticketId').val();*/
	var title = jQuery('.js-ticket-title').val() ? jQuery('.js-ticket-title').val() : '';
	var categoryValue = jQuery(".js-category").val() ? jQuery(".js-category").val() : '';
	var modelValue = jQuery('.js-model').val() ? jQuery('.js-model').val() : '';
	var troubleValue = jQuery('.js-trouble').val() ? jQuery('.js-trouble').val() : '';
	var textareaValue = jQuery('.js-textarea').find('#textarea').val() ? jQuery('.js-textarea').find('#textarea').val() : '';
	var imgList = JSON.parse(sessionStorage.getItem('arr'));
	
	
	var jsonObj = {
		'title': title,
		'product_id': modelValue,
		'ticketcategories': categoryValue,
		'content': textareaValue,
		'imgList': imgList
	}
	return jsonObj;
}


function loadingProductor(){
	var loading = 
	'<div class="anviz-loading">' +
	    '<div class="spinner">' + 
	        '<div class="spinner-container container1">' + 
	            '<div class="circle1"></div>' + 
	            '<div class="circle2"></div>' + 
	            '<div class="circle3"></div>' + 
	            '<div class="circle4"></div>' + 
	        '</div>' +
	        '<div class="spinner-container container2">' + 
	            '<div class="circle1"></div>' + 
	            '<div class="circle2"></div>' + 
	            '<div class="circle3"></div>' + 
	            '<div class="circle4"></div>' + 
	        '</div>' + 
	        '<div class="spinner-container container3">' +
	            '<div class="circle1"></div>' + 
	            '<div class="circle2"></div>' + 
	            '<div class="circle3"></div>' +
	            '<div class="circle4"></div>' +
	        '</div>' +
	    '</div>' +
	'</div>';
	
	jQuery('body').append(loading);
	document.onreadystatechange = function () {     
          var status = document.readyState
          if(status == 'complete'){
               $('.anviz-loading').fadeOut();
          }
     }
}

function prom(params){
	if(params == ''){
		mui.toast("The form data can't be empty!");
		return false;
	}
}


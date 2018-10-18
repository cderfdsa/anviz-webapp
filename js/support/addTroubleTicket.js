mui.ready(function(){
	fontNum();
	loadingProductor();
	getImgList();
	
	//关联查询
	jQuery('#addSelectedTicket').change(function(){
		var value = jQuery(this).val(); 
		getProName(value);
	});
	
	jQuery('#addTicketTitle').focus();
	
	//保存
	var url = MyAnviz.baseUrl + '/ticket/index/save.html';
	var form = jQuery('#addTicketPage');
	form.ajaxForm({
		dataType: "json",
		url: url,
		beforeSend: function(data){
			if(jQuery('#addTicketTitle').val() == ''){
				mui.toast('Please enter the title');
				return false;
			};
			if(data.readyState == 0) {
                jQuery('.anviz-loading').show();
           };
			return true;
		},
		success: function(data){
			if(data.readyState == 4){
				setTimeout(function(){
              	 	mui.toast('Your trouble ticket is submited successfully!');
			     	mui.openWindow({
						url: MyAnviz.baseUrl + '/ticket.html'
				 	});
              	},500);
			} else {
				mui.toast('fail!');
			}
		},
		complete: function(data) {
              if(data.status == 200) {
                   jQuery('.anviz-loading').hide();
              }
        },
		error: function(data) {
			if(data.success == false) {
				mui.toast(data.message);
			}
		}
	})
})



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

function getImgList(){
	var myfile = document.getElementById('file');	
	var List = document.getElementsByClassName('img-list')[0];
	var fileArr =  [];
	var fileEntity = {};
	var form = jQuery('#upload-file');
	
	myfile.addEventListener('change', function(event) {
		var files = this.files;
		
		if(!files)return;
		if(files.length > 0){
			jQuery('#imgList').show();		
		}else{
			jQuery('#imgList').hide();		
		}
		
		if(files){
			for(var i = 0;i<files.length;i++){	
				fileArr.push(files[i]);
				//预览
				var oLi = '<li><img src="'+URL.createObjectURL(files[i])+'" data-preview-src="" data-preview-group="1"><span class="close" onclick="closeli(this)" >&times;</span></li>';	
				List.innerHTML+=oLi; 
			}
		}
	});
}


function closeli(obj){
	var filearr = [];
	var closes = document.getElementsByClassName('close');
	var children = jQuery('#imgList').children().length;
	[].slice.call(closes).forEach(function(dom,index){
		if(obj === closes[index]){
			filearr.splice(index,1);
		};
		if(closes[index] == 0){
			jQuery('#imgList').hide();		
		}
	});
	if(children == 0){
		jQuery('#imgList').hide();		
	}
	obj.parentNode.remove();			
}


//function buildJson(){
//	var imgList = [];
//	var files = $('#file').prop('files');
//	
//	
//	var title = jQuery('.js-ticket-title').val() ? jQuery('.js-ticket-title').val() : '';
//	var categoryValue = jQuery(".js-category").val() ? jQuery(".js-category").val() : '';
//	var modelValue = jQuery('.js-model').val() ? jQuery('.js-model').val() : '';
//	var troubleValue = jQuery('.js-trouble').val() ? jQuery('.js-trouble').val() : '';
//	var textareaValue = jQuery('.js-textarea').find('#textarea').val() ? jQuery('.js-textarea').find('#textarea').val() : '';
//
//	var formData = new FormData();
//	formData.append('title',title);
//	formData.append('product_id',modelValue);
//	formData.append('ticketcategories',categoryValue);
//	formData.append('content',textareaValue);
//	
//	for(var i = 0; i < files.length; i++){
//		formData.append("upfile[]", files[i]);
//	}
//	
//	return formData;
//	console.log(formData.get("upfile[]"));
//}


//function addTicket() {
//	var url = MyAnviz.baseUrl + '/ticket/index/save.html';
//	var form = jQuery('#addData');
//	form.ajaxForm({
//		dataType: "json",
//		url: url,
//		beforeSend: function(data){
//			if(jQuery('#addTicketTitle').val() == ''){
//				alert('Please enter the title');
//				return false;
//			};
//			if(data.readyState == 0) {
//              jQuery('.anviz-loading').show();
//         };
//			return true;
//		},
//		success: function(data){
//			if(data.success == true) {
//				mui.back();
//				jQuery('#imgList').empty().hide();
//			} else {
//				mui.toast(data.message);
//			}
//		},
//		complete: function(data) {
//            if(data.status == 200) {
//                 jQuery('.anviz-loading').hide();
//            }
//      },
//		error: function(data) {
//			if(data.success == false) {
//				mui.toast(data.message);
//			}
//		}
//	})
//}
	
	
//	mui.ajax({
//		type: "post",
//		url: url,
//		data: buildJson(),
//		cache: false,
//      processData: false,
//      contentType: false,
//      beforeSend: function(data) {
//            if(data.readyState == 0) {
//                 jQuery('.anviz-loading').show();
//            }
//      },
//		success: function(data) {
//			if(data.success == true) {
//				mui.back();
//				jQuery('#imgList').empty().hide();
//			} else {
//				mui.toast(data.message);
//			}
//		},
//		complete: function(data) {
//            if(data.status == 200) {
//                 jQuery('.anviz-loading').hide();
//            }
//      },
//		error: function(data) {
//			if(data.success == false) {
//				mui.toast(data.message);
//			}
//		}
//	});
//}




//base64 转blob

function dataURLtoBlob(dataURI){
	var byteString = atob(dataURI.split(',')[1]);  
	var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];  
	var ab = new ArrayBuffer(byteString.length);  
	var ia = new Uint8Array(ab);  
	for (var i = 0; i < byteString.length; i++) {  
	   ia[i] = byteString.charCodeAt(i);  
	}  
	return new Blob([ab], {type: mimeString});  
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
		mui.toast(params + ",can't be empty!");
		return false;
	}
}









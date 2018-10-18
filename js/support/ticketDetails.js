mui.ready(function(){
	
	jQuery('#revertTicket').focus();
	jQuery('#addTicketDetails').on('tap',function(){
		var revertTicketValue = jQuery('#revertTicket').val();
		var imgObj = {};
		
		var dataEntity = {
			'revertTicketValue':revertTicketValue,
			'imgObj':imgObj
		}
		var url = MyAnviz.baseUrl + '/ticket/index/save.html';
		/*var url2 = MyAnviz.baseUrl + '/save.html';*/
		mui.ajax({
			type: "post",
			url: url,
			data: dataEntity,
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
			error: function(data) {
				if(data.success == false) {
					mui.toast(data.message);
				}
			}
		})
	})
})

//即时搜索
function fontNum() {
	jQuery('.anviz-textarea').delegate('#revertTicket', 'input propertychange', function(e) {
		e.stopPropagation();
		var fontNum = jQuery(this).val().length;
		if(fontNum > 200) {
			var curChart = jQuery(this).value;
			curChart = curChart.substr(0, 200);

			jQuery(this).val(curChart);
			fontNum = 200;
			mui.toast('输入字数不能超过200');
		}
		/*jQuery(this).parent().find('.font-num').text(fontNum);*/
	})
}

function setPostReply(){
	var status = getUrlParam('status');
	var headerBox = jQuery('#ticketProgress').find('header');
	var postBtn = jQuery('<button id="postReplyBtn" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right"><span class="mui-icon mui-icon-compose"></span>&nbsp;Post Reply</button>');
	switch(status){
		case '1':
		case '2':
			headerBox.append(postBtn);
			openAddPost();
			break;
		case '3':
			
	}
}

function openAddPost(){
	jQuery('#postReplyBtn').on('tap',function(){
		var name = jQuery(this)[0].firstChild.data;
		mui.openWindow({
			url:"../../page/support/add_post_reply.html?title=" + name
		})
	});
}

// 获取url中的参数
function getUrlParam(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if(r != null) {
		return unescape(r[2]);
	} else {
		return null;
	}
}

//获取上传图片
function uploadImg(){
	/**
	 * 获取图片
	 * 初始化图片占位
	 * 删除图片
	 * 预览图片
	 */
	var fileArr = [];
	var imageList = get('image-list');
	var imgHtml = imageList.innerHTML = '';
	
	var get = function(id) {
		return document.getElementById(id);
	};
	
	var getFileInputArray = function() {
		return [].slice.call(imageList.querySelectorAll('input[type="file"]'));
	};
	
	var getFileInputIdArray = function() {
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
	var newPlaceholder = function() {
		
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
					fileEntity.fileName = fileName;
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
}

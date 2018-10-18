mui.ready(function() {
	cwf.getParams();
});


var cwf = {
	
	upload:function(id){
		/**
		 * 获取图片
		 * 初始化图片占位
		 * 删除图片
		 * 预览图片
		 */
		var fileArr = [];
		var imageList = document.getElementById('image-list');
		var imgHtml = imageList.innerHTML = '';
		
		var getFileInputArray = function(){
			return [].slice.call(imageList.querySelectorAll('input[type="file"]'));
		};
		
		var getFileInputIdArray = function(){
			var fileInputArray = cwf.getFileInputArray();
			var idArray = [];
			fileInputArray.forEach(function(fileInput) {
				if (fileInput.value != '') {
					idArray.push(fileInput.getAttribute('id'));
				}
			});
			return idArray;
		};
		
		//初始化图片域占位
		var imageIndexIdNum = 0;
		var newPlaceholder = function(){
			var data;
			var fileInputArray = cwf.getFileInputArray();
			
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
						/**
						 * 存放在sessionStorage中，
						 * 从sessionStorage中拿数据：var imgList = JSON.parse(sessionStorage.getItem('arr'));
						 */
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
	},
	//提交成功后显赫的图片
	postOk:function(){
		var okWarp = jQuery('<div class="anviz-ok"></div>');
		var okIcon = jQuery('<span class="check"></span>');
		okWarp.css({
			'width': '100px',
		    'height': '100px',
		    'position': 'absolute',
		    'top': '36%',
		    'left': '50%',
		    'transform': 'translateX(-50px)',
		    'background': '#555',
		    'opacity': '0.8',
		    'z-index': '10',
		    'border-radius': '4px'
		    
		}).hide();
		okIcon.css({
			'display': 'inline-block',
		    'width': '1.4em',
		    'height': '0.7em',
		    'border-radius': '0.08em',
		    'border-left': '0.15rem solid white',
		    'border-bottom': '0.15rem solid white',
		    'transform': 'rotate(309.6deg)',
		    'margin-top': '0.7em',
		    'margin-left': '0.6em'
		})
		okWarp.append(okIcon);
		return okWarp;
	},
	//跳转页面
	getPage:function(curId, curHtml, pageId){
		jQuery(curId).on('tap', function() {
			mui.openWindow({
				url: curHtml,
				id: pageId
			});
		});
	},
	//显示search控件
	search:function(id){
		var id = jQuery(id);
		var searchIcon = id.find('header a.icon-search');
		var inputSearch = id.find('.anviz-slider-search');
	
		searchIcon.on('tap', function() {
			inputSearch.slideToggle(500);
		});
	},
	//跳转到指定id页面
	back:function(id){
		var viewApi;
		var view = viewApi.view;
		if(viewApi.canBack()) {
			viewApi.back();
		} else {
			oldBack();
		}
		viewApi.Go(id);
	},
	//页面转场动画，如果页面加载完成，则隐藏loading
	loadingProductor:function(){
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
	          console.log(document.readyState);
	          var status = document.readyState
	          if(status == 'complete'){
	               $('.anviz-loading').fadeOut();
	          }
	     }
	},
	//更换标题
	getParams:function(){
		var titleParams = cwf.getUrlParam('title');
		//如果获取到的参数中函数 & 符号，则可以正常获取des.replace(/\&/g,"%26");
		/*var des = jQuery(this).attr('data-des');
		des = des.replace(/\&/g,"%26");*/
		console.log("获取到的title为：" + titleParams);
	
		jQuery(".mui-title").text(titleParams);
	},
	//从sessionStorage中取得参数
	buildJson:function(){
		var revertTicket = jQuery('#revertTicket').val() ? jQuery('#revertTicket').val() : '';
		var imgList = JSON.parse(sessionStorage.getItem('arr'));
		
		if(revertTicket == ''){
			mui.toast('The problem description cannot be empty!');
			return false;
		}
		
		var jsonObj = {
			'ticketDes':revertTicket,
			'imgList':imgList
		};
		
		return jsonObj;
	},
	// 获取url中的参数
	getUrlParam:function(name){
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
		var r = window.location.search.substr(1).match(reg);
		if(r != null) {
			return unescape(r[2]);
		} else {
			return null;
		}
	},
	//dataURL转换为Blob对象
	dataURLtoBlob:function(dataurl){
		var arr = dataurl.split(','), 
        mime = arr[0].match(/:(.*?);/)[1], 
        bstr = atob(arr[1]), 
        n = bstr.length, 
        u8arr = new Uint8Array(n); 
        while(n--){ 
            u8arr[n] = bstr.charCodeAt(n); 
        } 
    	return new Blob([u8arr], {type:mime});
	}
}

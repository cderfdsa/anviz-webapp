mui.ready(function() {
	getDowntload();
	navTab();
    removeStyle();
   
    
    //分享
	jQuery('.anviz-share-icon').on('tap', function(e) {
		jQuery('.anviz-share-warper').slideToggle(500);
		var isNone = jQuery('.anviz-share-warper').css('display');
		if(isNone === 'none'){
			jQuery('#productorDownloadWarp').last().addClass('anviz-share-bottom');
		}else{
			jQuery('#productorDownloadWarp').last().removeClass('anviz-share-bottom');
		}
			
		setTimeout(function(){
			var st1 = jQuery('#st-1');
			var dataNetwork = st1.find('.st-btn').attr('data-network');
			switch(dataNetwork){
				case 'facebook':
				case 'twitter':
				case 'linkedin':
				case 'flipboard':
				case 'googleplus':
					st1.find('.st-btn').show().addClass('st-btns-scroll');
			}
			jQuery('.st-logo a').children().empty();
			jQuery('#st-el-5 .st-close').remove();
			jQuery('#st-3').children().remove();
			
		},500);
	});

	//点击列表
	jQuery('#productorDownloadWarp').on('tap','li',function(e){
		e.stopPropagation();
		/**
		 * 直接跳转至系统浏览器
		*/
		var href = jQuery(this).attr('data-url');
		mui.toast('loading...');
		mui.openWindow({
			url:href
		});
	});
	
	//无子级内容则不会显示
	/*var fourChild = jQuery('#pageFour .anviz-card').children();
	if(fourChild.length = 1){
		jQuery('#pageFour .anviz-card').remove();
		jQuery('#pageFour .js-label').remove();
	}*/
	
	jQuery('.st-sticky-share-buttons').hide();
});

function removeStyle(){
	var pageFour = jQuery('#pageFour');
    var imgStyle = pageFour.find('.mui-card .anviz-card-content .mui-content-padded img');
    var removePadding = pageFour.find('.mui-card .anviz-card-content');
    if(imgStyle.attr('style')) {
    	imgStyle.removeAttr('style').addClass('anviz-img-card');
    	removePadding.removeClass('anviz-card-content');
    	console.log('是否含有style' + imgStyle.attr('style'));
    }
}


function navTab() {

	jQuery('#itemOne').on("tap", function() {
		jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
	});
	jQuery('#itemTwo').on("tap", function() {
		jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
	});
	jQuery('#itemThree').on("tap", function() {
		jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
	});
	jQuery('#itemFour').on("tap", function() {
		jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
	});
	jQuery('#itemFive').on("tap", function() {
		jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
	});
}

function getDowntload() {
	var downDiv = jQuery('#pageFive');
	var ul = downDiv.find('#productorDownloadWarp');

	var data = {
		'category': '',
		'model': ''
	}
    var url = MyAnviz.baseUrl+'/product/index/download.html?id='+productId;
	mui.ajax({
		type: 'GET',
		data: '',
		url: url,
		dataType: 'json',
		beforeSend: function(data) {
			if(data.readyState == 0) {
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {
			for(var i = 0; i < data.length; i++) {
				var item = data[i];
				var fileType = item.fileType;
				var fileName = item.fileName;
				var fileSize = item.fileSize;
				var uploadTime = item.uploadTime;
				var downloadUrl = item.downloadUrl;
				
				var li = jQuery(
        			'<li class="mui-table-view-cell mui-media js-download" data-url=' + downloadUrl + '>' + 
        				'<div class="anviz-other-list mui-pull-left js-anviz-img">' + 
        					'<span class="anviz-download-img"></span>' + 
        				'</div>' + 
        				'<div class="anviz-download-content">' + 
        					'<div class="mui-media-body">' + fileName + '</div>' + 
        					'<div class="anviz-info">' + 
        						'<span class="anviz-ellipsis js-date">' + uploadTime + '</span>' + 
        						'<span class="anviz-ellipsis js-size">' + fileSize + '</span>' + 
        					'</div>' + 
        				'</div>' + 
        				/*'<span class="anviz-update-icon update-icon-size update-biometric_larger file-view"></span>' + */
        			'</li>'
        		);
        		
        		li.attr('data-name',fileName);
        		li.attr('data-url',downloadUrl);
        		var downloadImg = li.find('.js-anviz-img');
				var spanImg = downloadImg.find('span');


				switch(fileType) {
					case '10':
						spanImg.addClass('anviz-update-icon update-software_larger icon-anviz-size')
						break;
					case '13':
						spanImg.addClass('anviz-update-icon update-manual_larger icon-anviz-size')
						break;
					case '14':
						spanImg.addClass('anviz-update-icon update-training_larger icon-anviz-size')
						break;
					case '2':
						spanImg.addClass('anviz-update-icon update-catalogue_larger icon-anviz-size')
						break;
					case '11':
						spanImg.addClass('anviz-update-icon update-video_larger icon-anviz-size')
						break;
					case '15':
						spanImg.addClass('anviz-update-icon update-warranty_larger icon-anviz-size')
						break;
				}
				ul.append(li);
			}
		},
		complete: function(data) {
			if(data.status == 200) {
				jQuery('.anviz-loading').hide();
			}
		},
		error: function(data) {
			mui.alert('Error 500--Internal Server Error!');
		}
	})
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

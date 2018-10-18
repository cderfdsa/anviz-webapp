mui.ready(function(){
	/*search('#pageDownload');*/
	/*searchDownData();*/
	getDowntload();
	
	jQuery('#downloadSearch').on('tap',function(){
		var proSelected = jQuery('#proSelected').val() == '-1' ? '' : jQuery('#proSelected').val();
		var modeSelected = jQuery('#modeSelected').val() == '-1' ? '' : jQuery('#modeSelected').val();
		
		if(proSelected && modeSelected){
			searchNewDownData(modeSelected);
			jQuery('#downLoadContent').slideDown(500);
		}else{
			mui.alert('Please select the following options!');
		}
	})
});

//downloadlist
function getDowntload() {
	var downDiv = jQuery('#downLoadContent');
	var downWarp = downDiv.find('.dowload-warp');
	var liObj = downWarp.find('li').remove();

	//查询参数
	var params = {
		'product_category_id': 0,
		'product_id': 0
	}

   /* var url = MyAnviz.baseUrl+'/product/index/download.html?id='+id;*/
  	var url = MyAnviz.baseUrl+'/download/ajax.html';

	mui.ajax({
		type: 'GET',
		data: params,
		url: url,
		dataType: 'json',
		beforeSend: function(data) {
			if(data.readyState == 0) {
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {
			console.log('data:' + data);

			for(var i = 0; i < data.length; i++) {
				var liCon = liObj.clone();

				var item = data[i];
				var fileType = item.fileType;
				var fileName = item.fileName;
				var fileSize = item.fileSize + "M";
				var uploadTime = item.uploadTime;
				var downloadUrl = item.downloadUrl;

				var downloadImg = liCon.find('.js-anviz-img');
				var spanImg = downloadImg.find('span');

				// 2catalogue 10software 12casestudy 13manual 14training 15certificates 11video

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

				var downloadCon = liCon.find('.anviz-download-content');
				var downloadFileTitle = downloadCon.find('.anviz-media-body');
				downloadFileTitle.text(fileName);

				var downloadFileInfo = downloadCon.find('.anviz-info');
				var infoDate = downloadFileInfo.find('.js-date').text(uploadTime);
				var infoSize = downloadFileInfo.find('js-size').text(fileSize);
				downloadFileInfo.append(infoDate);
				downloadFileInfo.append(infoSize);

				downloadImg.append(spanImg);
				downloadCon.append(downloadFileTitle);
				downloadCon.append(downloadFileInfo);

				liCon.append(downloadImg);
				liCon.append(downloadCon);

				liCon.on('tap', function() {
					mui.openWindow({
						url: downloadUrl
					})
				})

				downWarp.append(liCon);
			}
			downDiv.append(downWarp);
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

function getDownData(){
	var downDiv = jQuery('#downLoadContent');
	var ulDiv = jQuery('#downLoadContent>.mui-table-view');
	var liContent = ulDiv.find('li.mui-table-view-cell').remove();
	
	for(var i = 0; i < downDataList.length; i++) {
		var li = liContent.clone();
		
		var item = downDataList[i];
		var proDownName = item.proDownName;
		var proVersion = item.proVersion;
		var proImg  = item.proImg;
		
		li.find('a div.js-anviz-img img').attr('src',proImg).addClass('anviz-cell-img');
		li.find('a div.js-anviz-body').text(proDownName).addClass('anviz-media-body');
		li.find('a p.js-des').text(proVersion);
		li.find('a span').addClass('icon-download');
		
		ulDiv.append(li);
	}
	downDiv.append(ulDiv);
}




function searchDownData(){
	var downDiv = jQuery('#downLoadContent');
	var downWarp = downDiv.find('.dowload-warp');
	var liObj = downWarp.find('li').remove();
	
	//查询参数
	var data = {
		'category': '',
		'model':''
	}
	
	var url = MyAnviz.baseUrl+'/download/ajax.html?product_category_id=0&product_id=0';
	
	mui.ajax({
		type:'GET',
		data:'',
		url:url,
		dataType:'json',
		beforeSend: function(data) {
			if(data.success == true) {
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {
			console.log('data:' + data);
			
			for(var i = 0; i < data.length; i++){
				var liCon = liObj.clone();
				
				var item = data[i];
				var fileType = item.fileType;
				var fileName = item.fileName;
				var fileSize = item.fileSize + "M";
				var uploadTime = item.uploadTime;
				var downloadUrl = item.downloadUrl;
				
				var downloadImg = liCon.find('.js-anviz-img');
				var spanImg = downloadImg.find('span');
				
				// 3 manual 2 video  4 catalogue 5  software 1 Certificate
				
				switch(fileType){
					case '1':
						/*spanImg.addClass('anviz-manual-img');*/
						spanImg.addClass('icon-anviz icon-warranty_larger icon-anviz-size')
						break;
					case '2':
						/*spanImg.addClass('anviz-video-img');*/
						spanImg.addClass('icon-anviz icon-video_larger icon-anviz-size')
						break;
					case '3':
					    /*spanImg.addClass('anviz-catalogue-img');*/
					    spanImg.addClass('icon-anviz icon-manual_larger icon-anviz-size')
					    break;
					case '4':
						/*spanImg.addClass('anviz-search-img');*/
						spanImg.addClass('icon-anviz icon-catalogue_larger icon-anviz-size')
						break;
					case '5':
						/*spanImg.addClass('anviz-crossChex-img');*/
						spanImg.addClass('icon-anviz icon-software_larger icon-anviz-size')
						break;
				}
				
				var downloadCon = liCon.find('.anviz-download-content');
				var downloadFileTitle = downloadCon.find('.anviz-media-body');
				downloadFileTitle.text(fileName);
				
				var downloadFileInfo = downloadCon.find('.anviz-info');
				var infoDate = downloadFileInfo.find('.js-date').text(uploadTime);
				var infoSize = downloadFileInfo.find('js-size').text(fileSize);
				downloadFileInfo.append(infoDate);
				downloadFileInfo.append(infoSize);
				
				
				downloadImg.append(spanImg);
				downloadCon.append(downloadFileTitle);
				downloadCon.append(downloadFileInfo);
				
				
				liCon.append(downloadImg);
				liCon.append(downloadCon);
				
				liCon.on('tap',function(){
					mui.openWindow({
						url:downloadUrl
					})
				})
				
				downWarp.append(liCon);
			}
			downDiv.append(downWarp);
		},
		complete: function(data) {
			if(data.success == true) {
				jQuery('.anviz-loading').hide();
			}
		},
		error: function(data) {
			if(data.success == false){
				mui.toast(data.message)
			}
		}
	})
}

function searchNewDownData(modeSelected){
	var downDiv = jQuery('#downLoadContent');
	var oldUlWarp = downDiv.find('.dowload-warp');
	var ulWarp = oldUlWarp.empty();
	
	var newWarp = downDiv.find('.dowload-warp');

	jQuery('.js-download-title').text(modeSelected);
	
	var newDowdWarpLi = jQuery("<li class='mui-table-view-cell mui-media js-download'></li>");
	var newDownImgWarp = jQuery("<div class='anviz-other-list mui-pull-left js-anviz-img'></div>");
	var newDownImgUrl = jQuery("<span class='anviz-download-img'></span>");
	newDownImgWarp.append(newDownImgUrl);
	newDowdWarpLi.append(newDownImgWarp);
	
	
	var newDownContent = jQuery("<div class='anviz-download-content'></div>");
	var newDownBody = jQuery("<div class='mui-media-body js-media-body js-anviz-body mui-ellipsis anviz-media-body'></div>");
	var newDownInfo = jQuery("<div class'anviz-info'></div>");
	var newDownSpanDate = jQuery("<span class='anviz-ellipsis js-date'></span>");
	var newDownSpanSize = jQuery("<span class='anviz-ellipsis js-size'></span>");
	newDownInfo.append(newDownSpanDate);
	newDownInfo.append(newDownSpanSize);
	
	var newDownFooterIcon = jQuery("<span class='iconfont icon-size mui-pull-right anviz-icon-cell icon-download'></span>");
	
	newDownContent.append(newDownInfo);
	newDownContent.append(newDownBody);
	newDownContent.append(newDownFooterIcon)
	
	
	newDowdWarpLi.append(newDownContent);
	
	newWarp.append(newDowdWarpLi);

	
	//查询参数
	var data = {
		'category': '',
		'model':''
	}
	
	var url = '../../js/support/download.json';
	
	mui.ajax({
		type:'GET',
		data:'',
		url:url,
		dataType:'json',
		beforeSend: function(data) {
			if(data.readyState == 0) {
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {
			console.log('data:' + data);
			var liObj = newDowdWarpLi.remove();
			for(var i = 0; i < data.length; i++){
				var liCon = liObj.clone();
				
				var item = data[i];
				var fileType = item.fileType;
				var fileName = item.fileName;
				var fileSize = item.fileSize + "M";
				var uploadTime = item.uploadTime;
				var downloadUrl = item.downloadUrl;
				
				var downloadImg = liCon.find('.js-anviz-img');
				var spanImg = downloadImg.find('span');
				
				// 1 manual 2 video  3 catalogue 4 其它  5crossChex
				
				switch(fileType){
					case '1':
						spanImg.addClass('anviz-manual-img');
						break;
					case '2':
						spanImg.addClass('anviz-video-img');
						break;
					case '3':
					    spanImg.addClass('anviz-catalogue-img');
					    break;
					case '4':
						spanImg.addClass('anviz-search-img');
						break;
					case '5':
						spanImg.addClass('anviz-crossChex-img');
						break;
				}
				
				var downloadCon = liCon.find('.anviz-download-content');
				var downloadFileTitle = downloadCon.find('.anviz-media-body');
				downloadFileTitle.text(fileName);
				
				var downloadFileInfo = downloadCon.find('.anviz-info');
				var infoDate = downloadFileInfo.find('.js-date');
				var infoSize = downloadFileInfo.find('js-size');
				infoDate.text(uploadTime);
				infoSize.text(fileSize);
				
				downloadFileInfo.append(infoDate);
				downloadFileInfo.append(infoSize);
				
				
				downloadImg.append(spanImg);
				downloadCon.append(downloadFileTitle);
				downloadCon.append(downloadFileInfo);
				
				
				liCon.append(downloadImg);
				liCon.append(downloadCon);
				
				liCon.on('tap',function(){
					mui.openWindow({
						url:downloadUrl
					})
				})
				
				newWarp.append(liCon);
			}
			downDiv.append(newWarp);
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

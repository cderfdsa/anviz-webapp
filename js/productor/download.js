
mui.ready(function(){
	search('#pageDownload');
	searchDownData();
});



function searchDownData(){
	var downDiv = jQuery('#downLoadContent');
	var downWarp = downDiv.find('.dowload-warp');
	var liObj = downWarp.find('li').remove();
	
	//查询参数
	var data = {
		'category': '',
		'model':''
	}
	
	var url = MyAnviz.baseUrl+'/product/index/download.html?id='+productId;
	
	mui.ajax({
		type:'GET',
		data:'',
		url:url,
		dataType:'json',
		beforeSend: function(data) {
			if(data.success == true)
				mui.toast('loading...');
			}
		},
		success:function(data) {
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
			if(data.success == true){
				mui.toast('loading...');
			}
		},
		error: function(data) {
			if(data.success == false){
				 mui.toast(data.message);
			}	
			
		}
	})
}

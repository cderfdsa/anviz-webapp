var bannerList = [{
	"bannerId":"banner-01",
	"imgUrl":"http://www.anviz.com/Style/crmtmp/storage/2016/September/week1/480372_Anviz_A300_01_thumb_520_520.png",
	"bannerUrl":"#",
	"bannerName":"A300"
},{
	"bannerId":"banner-02",
	"imgUrl":"http://www.anviz.com/Style/crmtmp/storage/2017/September/week5/642956_Anviz-W1-White-02_thumb_520_520.png",
	"bannerUrl":"#",
	"bannerName":"W1"
},{
	"bannerId":"banner-03",
	"imgUrl":"http://www.anviz.com/Style/crmtmp/storage/2017/March/week2/577755_Anviz-W2-01_thumb_520_520.png",
	"bannerUrl":"#",
	"bannerName":"w2"
},{
	"bannerId":"banner-04",
	"imgUrl":"http://www.anviz.com/Style/crmtmp/storage/2016/July/week4/471217_C2-Pro_Pictures-02_thumb_520_520.jpg",
	"bannerUrl":"#",
	"bannerName":"C2pro"
}];


//var url = MyAnviz.baseUrl+"/product/ajax/homeupgrade.html";
var upgradeList = 
		[{
			"contentId": "95574",
			"productorImg": "http://www.anviz.com/myanviz/img/tmp/480364_Anviz_D200_01_thumb_550_550.png",
			"productorName": "D200",
			"productUpdate":"29-09-2017",
			"productorDes": " Fingerprint Time Attendance",
			"updateContent":"Increase the TCP/IP"
		},{
			"contentId": "95579",
			"productorImg": "http://www.anviz.com/myanviz/img/tmp/480375_Anviz_A300_04_thumb_550_550.png",
			"productorName": "A300",
			"productUpdate":"19-07-2017",
			"productorDes": "Fingerprint & RFID Time Attendance",
			"updateContent":"Increase the WIFI"
		},{
			"contentId": "277906",
			"productorImg": "http://www.anviz.com/myanviz/img/tmp/533749_M5-01_thumb_550_550.png",
			"productorName": "M5",
			"productUpdate":"11-06-2017",
			"productorDes": "Outdoor Fingerprint RFID Access Controller",
			"updateContent":"Increase support for Mifare CARDS"
		},{
			"contentId": "455372",
			"productorImg": "http://www.anviz.com/myanviz/img/tmp/455376_m3-02_thumb_550_550.png",
			"productorName": "M3",
			"productUpdate":"15-10-2017",
			"productorDes": "Outdoor RFID Access Controller",
			"updateContent":"the user has a capacity of 50000 pieces, the recording capacity is 200,000, and the EM card and Mifare are supported, 16 groups are supported, and 32 door time periods are supported."
		},{
			"contentId": "642954",
			"productorImg": "http://www.anviz.com/Style/crmtmp/storage/2018/January/week3/684215_4_thumb_520_520.png",
			"productorName": "W1",
			"productUpdate":"19-01-2018",
			"productorDes": "RFID Access Control with Battery",
			"updateContent":"Optional 2600mah Lithium battery.Full Upgrade for W Series with Battery Power Your Business Anytime and Anywhere.."
		}];


mui.ready(function(){
	searchBannerList();
	newProductList();
	upgradeProductList();
	searchLog();
	//loading...
	loadingProductor();
	
	
	var newId = jQuery('#newHomeProductList .new-product');
	var newBox = jQuery('.new-product-warp');
	
	var upgradeId = jQuery('#newHomeProductList .upgrade-product');
	var upgradeBox = jQuery('.upgrade-product-warp');
	
	newId.on('tap',function(){
		upgradeId.removeClass('active').addClass('product-btn');
		jQuery(this).removeClass('product-btn').addClass('active');
		newBox.show();
		upgradeBox.hide();
	});
	
	upgradeId.on('tap',function(){
		newId.removeClass('active').addClass('product-btn');;
		jQuery(this).removeClass('product-btn').addClass('active');
		upgradeBox.show();
		newBox.hide();
	});
	
	var newsUrl = MyAnviz.baseUrl+ '/news/index/view.html?id=601529';
	var expositionUrl = MyAnviz.baseUrl + '/news/index/view.html?id=642961';
	var updateLogUrl = MyAnviz.baseUrl+ '/product/release.html';
	
	jQuery('#newHomeNews').on('tap',function(){
		mui.openWindow({
			url:newsUrl,
			show:{
				autoShow:true,
				aniShow:'slide-in-right',
			},
			waiting:{
				autoShow:true
			}
		})
	});
	
	jQuery('#newHomeExhibition').on('tap',function(){
		mui.openWindow({
			url:expositionUrl,
			show:{
				autoShow:true,
				aniShow:'slide-in-right',
			},
			waiting:{
				autoShow:true
			}
		})
	});
	
	jQuery('#newHomeUpdateLog').on('tap',function(){
		mui.openWindow({
			url:updateLogUrl,
			show:{
				autoShow:true,
				aniShow:'slide-in-right',
			},
			waiting:{
				autoShow:true
			}
		})
	});
	
	jQuery('.new-view').on('tap','li',function(e){
		e.stopPropagation();
		var id = jQuery(this).attr('data-id');
		mui.openWindow({
			url:MyAnviz.baseUrl+'/product/index/view.html?id='+id,
			id: '#proPage'
		})
	});
	
	jQuery('.upgrade-product-warp').on('tap','li',function(e){
		e.stopPropagation();
		var id = jQuery(this).attr('data-id');
		mui.openWindow({
			url:MyAnviz.baseUrl+'/product/index/view.html?id='+id,
			id: '#proPage'
		})
	});
	
	jQuery('#slider').on('tap','.mui-slider-item',function(e){
		e.stopPropagation();
		var id = jQuery(this).attr('data-id');
		mui.openWindow({
			url:MyAnviz.baseUrl+'/product/index/view.html?id='+id,
			id: '#proPage'
		})
	});
	
	var LearnMoreLetter = jQuery('#newsWarp').find('a').text();
	console.log('5454' + LearnMoreLetter);
	if(LearnMoreLetter = 'Learn more'){
		jQuery('#newsWarp').find('a').remove();
	}
});

function searchLog(){
	var ul = jQuery('#updateLogWarp .anviz-new-time-shaft ul');
	
	for(var i = 0;  i < upgradeList.length; i++) {

		var item = upgradeList[i];
		var p_id = item.contentId;
		var p_img = item.productorImg;
		var p_name = item.productorName;
		var p_des = item.productorDes;
		var p_date = item.productUpdate;
		var p_content = item.updateContent;
		
		var li = jQuery(
			'<li class="anviz-timeline-item">' + 
				'<div class="anviz-timeline-item-tail"></div>' + 
				'<div class="anviz-timeline-item-head anviz-timeline-item-head-blue"></div>' + 
				'<div class="anviz-timeline-item-content">' + 
					'<div class="anviz-update-name">' + p_name + '</div>' + 
					'<div class="anviz-timeline-update-warp">' + 
						'<div class="anviz-timeline-product-date">' + p_date + '</div>' + 
						'<div class="anviz-timeline-product-content">' + 
							'<div class="anviz-timeline-update-flag"></div>' + 
							'<div class="anviz-timeline-update-info">' + p_content + '</div>' + 
						'</div>' + 
					'</div>' + 
				'</div>' + 
			'</li>'
		);

		li.attr('data-id',p_id);

		ul.append(li);
	}
}

/*function upgradeProductList(){
	var ul = jQuery('.upgrade-product-warp ul');
	for(var i = 0;  i < upgradeList.length; i++) {
		var item = upgradeList[i];
		var p_id = item.contentId;
		var p_img = item.productorImg;
		var p_name = item.productorName;
		var p_des = item.productorDes;
		var p_date = item.productUpdate;
		var p_content = item.updateContent;
		
		var li = jQuery(
			'<li class="mui-table-view-cell mui-media js-media">' + 
				'<img class="mui-media-object mui-pull-left js-img" />' + 
				'<div class="mui-media-body js-media-body">' + p_name + '</div>' + 
				'<div class="anviz-ellipsis js-des js-info">' + p_des + '</div>' + 
			'</li>'
		);
		
		li.find('.js-img').attr('src', p_img);
		li.attr('data-id',p_id);
		ul.append(li);
	}
	ul.last().addClass('anviz-media');
}*/

function upgradeProductList(){
	var url = MyAnviz.baseUrl+"/product/ajax/homeupgrade.html";
	var ul = jQuery('.upgrade-product-warp ul');
	
	mui.ajax({
		type: "GET",
		url: url,
		dataType: "json",
		beforeSend: function(data) {
			if(data.readyState == 0) {
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {
			console.log('data' + data);
			for(var i = 0;  i < data.length; i++) {
				var item = data[i];
				var p_id = item.contentId;
				var p_img = item.productorImg;
				var p_name = item.productorName;
				var p_des = item.productorDes;
				var p_date = item.productUpdate;
				var p_content = item.updateContent;
				
				var li = jQuery(
					'<li class="mui-table-view-cell mui-media js-media">' + 
						'<img class="mui-media-object mui-pull-left js-img" />' + 
						'<div class="mui-media-body js-media-body">' + p_name + '</div>' + 
						'<div class="anviz-ellipsis js-des js-info">' + p_des + '</div>' + 
					'</li>'
				);
				
				li.find('.js-img').attr('src', p_img);
				li.attr('data-id',p_id);
				ul.append(li);
			}
			ul.last().addClass('anviz-media');
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

function newProductList(){
	var ul = jQuery('.new-product-warp ul');
	
	var url = MyAnviz.baseUrl+"/product/ajax/homenew.html";
	mui.ajax({
		type: "GET",
		url: url,
		dataType: "json",
		beforeSend: function(data) {
			if(data.readyState == 0) {
				/*mui.toast('loading...');*/
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {
			console.log('data' + data);

			var count = 1;
			var p = '<p class="anviz-ellipsis js-des">' + '</p>'
			for(var i = 0;  i < data.length; i++) {

				var item = data[i];
				var p_id = item.contentId;
				var p_img = item.productorImg;
				var p_name = item.productorName;
				var p_des = item.productorDes;
				var p_url = item.productorUrl;
				
				var li = jQuery(
					'<li class="mui-table-view-cell mui-media js-media">' + 
						'<img class="mui-media-object mui-pull-left js-img" />' + 
						'<div class="mui-media-body js-media-body">' + p_name + '</div>' + 
						'<div class="anviz-ellipsis js-des js-info">' + p_des + '</div>' + 
					'</li>'
				);

				li.find('.js-img').attr('src', p_img);
				li.attr('data-id',p_id);

				ul.append(li);
			}
			ul.last().addClass('anviz-media');
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

function searchBannerList(){
	var slider = jQuery('#slider');
	var sliderGroup = slider.find('.js-group');
	
	var divImgContent = sliderGroup.find('.js-item').remove();
	var firstContent = sliderGroup.find('.js-first-slider');
	var lastContent = sliderGroup.find('.js-last-slider');
	var divIndicator = sliderGroup.find('.js-indicator');
	
	var imgUrl = '';
	var firstImgUrl = '';
	var lastImgUrl = '';
	var bannerName = '';
	var aObj;
	
	for(var i = 0; i < bannerList.length; i++){
		var imgContent = divImgContent.clone();
		var item = bannerList[i];
		imgUrl = item.imgUrl;
		bannerName = item.bannerName;
		
		var imgObj = jQuery('<img>').attr('src',imgUrl);
		var imgInfo = jQuery('<p class="mui-slider-title"></p>').text(bannerName);
		aObj = imgObj.wrap('<a href="#"></a>');
		
		imgContent.append(aObj);
		imgContent.append(imgInfo);
		sliderGroup.append(imgContent).insertBefore(divIndicator).appendTo(slider);
		
		var firstObj = jQuery('.js-item').eq(1);
		var lastObj = jQuery('.js-item').eq(4);
		var imgId = item.bannerId;
		switch(imgId){
			case 'banner-01':
			firstImgUrl = jQuery('<img>').attr('src',item.imgUrl);
			firstContent.append(imgInfo).appendTo(sliderGroup);
			firstContent.append(firstImgUrl).insertBefore(firstObj).appendTo(sliderGroup);
			
			break;
			case 'banner-04':
			lastImgUrl = jQuery('<img>').attr('src',item.imgUrl);
			lastContent.append(imgInfo).appendTo(sliderGroup);
			lastContent.append(lastImgUrl).appendTo(sliderGroup);
			break;
		}
	}
	slider.addClass('anviz-slider');
}

function newHomeTab(id,box){
	id.bind('tap',function(){
		var index = jQuery(this).index();
		jQuery(this).parent().children("div").attr("class", "product-btn");
		jQuery(this).attr("class", "active");
		box.hide();
		box.eq(index).show();
	})
}

function loadingProductor() {
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
	document.onreadystatechange = function() {
		console.log(document.readyState);
		var status = document.readyState
		if(status == 'complete') {
			$('.anviz-loading').fadeOut();
		}
	}
}

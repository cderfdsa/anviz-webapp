
mui.ready(function () {
    productorBannerList();
    
    //移除style
    var pageFour = jQuery('#pageFour');
    var imgStyle = pageFour.find('.mui-card .mui-card-content p img');
    if(imgStyle.attr('style')) {
    	imgStyle.removeAttr('style');
    	console.log('是否含有style' + imgStyle.attr('style'));
    }
});

function productorBannerList() {
	
    var slider = jQuery('#slider');
    var sliderGroup = slider.find('.js-group');

    var firstContent = sliderGroup.find('.js-first-slider');
    var lastContent = sliderGroup.find('.js-last-slider');
    var indicator = slider.find('.js-indicator');
    
    var firstObj = jQuery('.js-first-slider');
	var lastObj = jQuery('.js-last-slider');

    var imgUrl = '';
    var firstImgUrl = '';
    var lastImgUrl = '';

	if(bannerList){
		for (var i = 0; i < bannerList.length; i++) {
	        var item = bannerList[i];
	        imgUrl = item.imgUrl;
			var imgId = item.bannerId;
			var firstId = bannerList[0].bannerId;
			var lastId = bannerList[bannerList.length-1].bannerId;
			
			var imgWarp = jQuery('<a href="#"><img src="' + imgUrl + '" /></a>');
			var indicatorWarp = jQuery('<div class="mui-indicator"></div>');
			var imgContent = jQuery('<div class="mui-slider-item js-item"><a href="#"><img src="' + imgUrl + '" /></a></div>');
			
			imgContent.insertAfter(firstContent);
			
			if(imgId == firstId) firstContent.append(imgWarp);
			if(imgId == lastId) lastContent.append(imgWarp);
			
			var length = bannerList.length;
			for(var z = 0; z < length + 1; z++){
				indicator.append(indicatorWarp);
			}
	    }
	}
    slider.addClass('anviz-slider');
}

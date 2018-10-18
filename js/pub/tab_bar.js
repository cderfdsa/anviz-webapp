mui.ready(function(){
	jumpTab();
})

function jumpTab() {
	jQuery('.anviz-bar-bottom .mui-tab-item').on('tap', function(){
		var index  = jQuery(this).index();
		console.log("index:" + index);
        var url = $(this).attr('href');
        mui.openWindow({
        	url:url
        });
        //切换样式
        jQuery(this).addClass('mui-active').siblings().removeClass('mui-active');
        
       
      /*  window.location.href = url;*/
	});
}


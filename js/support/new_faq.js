mui.ready(function() {
	/*弹框搜索*/		
	jQuery('#searchIcon').on('tap',function(){
		jQuery(this).hide();
		jQuery('#showSearchWarpContent').show();
		jQuery('#closeIcon').show();
	});
	
	jQuery('#closeIcon').on('tap',function(){
		jQuery(this).hide();
		jQuery('#showSearchWarpContent').hide();
		jQuery('#searchIcon').show();
	})
		
		
    //faq跳转
    jQuery('.js-slider ul').on('tap', 'li', function() {
        var id = jQuery(this).attr('data-id');
        var url = MyAnviz.baseUrl+'/faq/index/view.html?id=' + id;
        mui.openWindow({
            url: url
        })
    });

    //faq分类查询
    jQuery('#sliderSegmentedControl .mui-scroll a').on('tap', function() {
        jQuery('#sliderSegmentedControl .mui-scroll a').removeAttr('data-active');
        jQuery(this).attr('data-active', '1');
        getFaqList();
    })

    //faq Model查询
    jQuery('#proSelected').change(function(){
        var value = jQuery(this).val();
        getProName(value);
        getFaqList();
    });
    
    //search bar
    jQuery('#searchBtn').on('tap',function(){
    	var categoryValue = jQuery('#proSelected').val() == '0' ? '' : jQuery('#proSelected').val();
    	var productorValue = jQuery('#modeSelected').val() == '0' ? '' : jQuery('#modeSelected').val();
    	if(categoryValue != '' && productorValue != ''){
    		jQuery('#showSearchWarpContent').hide();
	    	jQuery('#closeIcon').hide();
	    	jQuery('#searchIcon').show();
	    	onTab();
    	}else{
    		mui.toast('Query keywords cannot be empty!');
    	}
    	
    });
    

    jQuery('#modeSelected').change(function(){
        getFaqList();
    });

	//初始调用，初始触发
    getFaqList();
});

function onTab(){
	jQuery('#proSelected').change(function(){
        var value = jQuery(this).val();
        getProName(value);
        getFaqList();
    })
}

function getProName(value){
    var url = MyAnviz.baseUrl + '/product/ajax/select.html?category_id=' + value;
    var selectElement = jQuery('#modeSelected');
    selectElement.empty();
    selectElement.append('<option value="0">--None--</option>');
    mui.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if(data.length > 0){
                for(var i = 0; i < data.length; i++){
                    var name = data[i].productorName;
                    var subValue = data[i].contentId;
                    selectElement.append('<option  value="' + subValue + '">'+name+'</option>');
                }
            }
        },
        error: function(data) {
            if(data.success == false){
                mui.toast(data.message)
            }
        }
    });
}

function getFaqList() {
    var box = jQuery('.anviz-slider-box > ul');
    box.empty();

    if(jQuery('#sliderSegmentedControl a[data-active="1"]').length <= 0){
        var url = jQuery('#sliderSegmentedControl a:eq(0)').attr('href');
    }else{
        var url = jQuery('#sliderSegmentedControl a[data-active="1"]').attr('href');
    }
    var product_id = jQuery('#modeSelected').val();

    mui.ajax({
        type: 'GET',
        url: url,
        data:{
            product_id: product_id
        },
        dataType: 'json',
        beforeSend: function(data) {
            if(data.status == 0) {
                jQuery('.anviz-loading').fadeIn();
            }
        },
        success: function(data) {
            console.log(data);
            var list = data.data;
            if(list == '' || list == null){
                setTimeout(function(){
                    box.append('<div class="anviz-empty">There is no list of your FAQ</div>');
                },800);
            }else{
                for(var i = 0; i < list.length; i++) {
                    var item = list[i];
                    var faqName = item.faqName;
                    var faqId = item.faqId;

                    box.append('<li class="mui-table-view-cell" data-id=' + faqId + '><a class="mui-navigate-right"><p class="anviz-ellipsis js-ellipsis">' + faqName + '</p></a></li>');
                }
            }
        },
        complete: function(data) {
            if(data.status == 200) {
                jQuery('.anviz-loading').fadeOut();
            }
        },
        error: function(data) {
            if(data.success == false){
                mui.toast(data.message)
            }
        }
    });
}




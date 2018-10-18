mui.ready(function() {

	//首次加载
	var page = 1;
	var size = 10;
	biometricContent(page, size);

	jQuery('.mui-scroll-wrapper').scroll({
		deceleration: 0.0005 //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
	});

	jQuery('#biometricList').on('tap', 'li', function(e) {
		e.stopPropagation();
		var id = jQuery(this).attr('data-id');
		mui.openWindow({
			url: MyAnviz.baseUrl + '/product/index/view.html?id=' + id
		});
	})
});

function biometricContent(page, size) {

	var jsView = jQuery('.js-view'),
		liDiv = '';

	var url = MyAnviz.baseUrl + '/product/ajax/productlist.html';
	//查询参数,因为是假数据，因此这个对象没有作为查询参数使用
	var dataEntity = {
		"userId": "1",
		"page": page,
		"size": size
	};

	mui.ajax({
		type: "GET",
		url: url,
		data: dataEntity,
		dataType: "json",
		success: function(data) {
			console.log('data' + data.data);
			/* dataEntity.page = parseInt(data.page) + 1;*/
			for(var i = 0; i < data.data.length; i++) {

				var item = data.data[i];
				if(item) {
					var p_id = item.contentId;
					var p_img = item.productorImg;
					var p_name = item.productorName;
					var p_des = item.productorDes;
					var p_url = item.productorUrl;
				}

				liDiv += '<li class="mui-table-view-cell mui-media js-media" data-id="' + p_id + '">' + '<img class="mui-media-object mui-pull-left js-img" src="' + p_img + '" /><div class="mui-media-body js-media-body">' + p_name + '</div>' + '<div class="anviz-ellipsis js-des js-info">' + p_des + '</div></li>';
				jsView.html(liDiv);
			}
		},
		error: function(data) {
			mui.alert('Error 500--Internal Server Error!');
		}
	})
}

/*function addData(){
	var jsView = jQuery('.js-view');
    var li = jsView.find('.mui-table-view-cell');
    var liDiv = '';

    var url = MyAnviz.baseUrl + '/product/ajax/productlist.html';
     //查询参数,因为是假数据，因此这个对象没有作为查询参数使用
   var dataEntity = {
	    "userId": "1",
	    "page": 1,
	    "size": 10
    };
    
    mui.ajax({
        type: "GET",
        url: url,
        data: dataEntity,
        dataType: "json",
        success: function (data) {
            console.log('data' + data.data);
            dataEntity.page = parseInt(data.page) + 1;
            for (var i = li.length,len = i + 10; i < len; i++) {

                var item = data.data[i];
                var p_id = item.contentId;
                var p_img = item.productorImg;
                var p_name = item.productorName;
                var p_des = item.productorDes;
                var p_url = item.productorUrl;

                liDiv += '<li class="mui-table-view-cell mui-media js-media" data-id="' + p_id + '">' + '<img class="mui-media-object mui-pull-left js-img" src="' + p_img + '" /><div class="mui-media-body js-media-body">' + p_name + '</div>' + '<div class="anviz-ellipsis js-des js-info">' + p_des + '</div></li>';
                jsView.insertBefore(li,liDiv);
            }
            jsView.last().addClass('anviz-media');
        },
        error: function (data) {
            mui.alert('Error 500--Internal Server Error!');
        }
    })
}
*/
<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/5
 * Time: 15:46
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/slideDown.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/public.js?<?php echo time();?>"></script>
<!--<script src="<?php echo $this->assetsUrl; ?>/js/support/download.js?<?php echo time();?>"></script>-->
<?php $this->endClip(); ?>
<div class="anviz-loading" style="display: none;">
    <div class="spinner">
        <div class="spinner-container container1">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
        <div class="spinner-container container2">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
        <div class="spinner-container container3">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
    </div>
</div>
<div id="loginPage" class="mui-content"></div>

<div class="mui-content mui-scroll-wrapper" id="pageDownload">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <!--<a id="downloadSearch" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Search</a>-->
        <a id="searchIcon" class="iconfont icon-search icon-color mui-icon mui-icon-left-nav mui-pull-right"></a>
      	<a id="closeIcon" class="icon-color mui-icon mui-icon-closeempty mui-pull-right" style="display: none;"></a>
        <h1 class="mui-title icon-color"></h1>
    </header>
    <div id="downloadProgressbar" class="mui-progressbar" style="margin-top: 44px;">
		<span></span>
	</div>
    <!--search content-->
	<div id="showSearchWarpContent" class="anviz-search-content" style="display: none;">
		<!--search-->
        <div class="mui-input-row mui-search anviz-slider-select">
            <div class="mui-input-group">
                <div class="mui-input-row anviz-advice-country">
                    <label>Product</label>
                    <select id="downloadSelected" class="anviz-select js-pro-select">
                        <option value="0">--None--</option>
                        <?php foreach($productCategories as $row):?>
                            <optgroup label="<?php echo $row['name'];?>">
                                <?php foreach($row['children'] as $col):?>
                                    <option value="<?php echo $col['id'];?>"><?php echo $col['name'];?></option>
                                <?php endforeach;?>
                            </optgroup>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mui-input-row anviz-advice-model">
                    <label>Model</label>
                    <!-- product/ajax/select.html?category_id=1  -->
                    <select id="downloadModeSelected" class="anviz-select js-model-select">
                        <option value="-1">--None--</option>
                    </select>
                </div>
            </div>
        </div>
        <button id="searchBtn" class="icon-color mui-btn mui-btn-primary">Search</button>
	</div>
	<span class="anviz-search-info">Select product category for query</span>
	<!--serarch content-->
	<div class="mui-content mui-scroll-wrapper">
		<div class="mui-scroll">
			<div id="searchDownload"></div>
		</div>
	</div>
    <!--content-->
    <div id="pullrefresh" class="mui-content mui-scroll-wrapper" style="padding-top: 0;margin-top:44px">
		<div class="mui-scroll">
		    <!--数据列表-->
            <ul id="downloadWarp" class="mui-table-view mui-table-view-chevron js-view"></ul>
		</div>
	</div>
</div>
<!--show download page-->
<div id="downloadPage" class="mui-content" style="display: none;">
	<header class="mui-bar mui-bar-nav mui-bar-transparent">
		<h1 class="mui-title">test</h1>
		<a id="closeBtn" class="mui-icon mui-icon-closeempty mui-pull-right" style="color: #FFFFFF;"></a>
	</header>
	<div class="mui-content">
	</div>
</div>

<script type="text/javascript">
    mui.init({
        pullRefresh: {
        	container:'#pullrefresh',
			up: {
				height:50,
				contentrefresh: "loading...",
				contentnomore:"'There's no more data'",
				callback: pullupRefresh
			}
        }
    });
     mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false //是否显示滚动条
    });
    mui.ready(function(){
    	
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
    	
    	//关联查询
    	jQuery('#downloadSelected').change(function(){
    		var value = jQuery(this).val(); 
		    console.log('value: ' + value);
		    getQueryChild(value);
    	});
    	
    	//条件查询
    	jQuery('#searchBtn').on('tap',function(){
    		var product_category_id = jQuery('#downloadSelected').val() == '-1' ? '' : jQuery('#downloadSelected').val();
		    var product_id = jQuery('#downloadModeSelected').val() == '-1' ? '' : jQuery('#downloadModeSelected').val();
		    
		    if(product_category_id && product_id){
		    	//清空【下拉刷新容器】并隐藏它,将根据条件查询的数据储存入 【条件查询容器】
				jQuery('#pullrefresh').empty().hide();
		    	var url = MyAnviz.baseUrl+'/download/ajax.html?product_category_id=' + product_category_id + '&product_id=' + product_id;
		    	
		    	jQuery('#showSearchWarpContent').hide();
				jQuery('#closeIcon').hide();
				jQuery('#searchIcon').show();
				
		    	downloadKeyWordSearch(url);
		    }
		   
    	});
    	
    	//取消下载
    	var cancelBtn = jQuery('#downloadNav').find('ul>li>b');
    	cancelBtn.on('tap',function(e){
    		e.stopPropagation();
    		/*$(this).unbind("tap");*/
    		
    		var url = jQuery(this).attr('data-url');
			var xhr = new XMLHttpRequest();
			//终止请求
			xhr.abort();
    	});
    	
    	//点击所有列表跳转打开
    	tapLi('#downloadWarp');
    	
    	//点击搜索列表跳转打开
    	tapLi('#searchDownload');
    });
    
    /**
	 * 直接跳转至系统浏览器
	 */
    function tapLi(id){
		jQuery(id).on('tap','li',function(e){
			e.stopPropagation();
			var href = jQuery(this).attr('data-url');
    		var xhr = new XMLHttpRequest();
    		mui.toast('Just a moment, please...');
    		mui.openWindow({
				url:href,
				styles:{
					top:'0px',
					bottom:'0px'
				},
				show:{
					autoShow:true,
					aniShow:'zoom-fade-out',
					duration:'300'
				},
				waiting:{
					autoShow:true,
					title:'loading'
				}
			})
		})
    }
    
    mui.plusReady(function(){
		if(plus.networkinfo.getCurrentType() == plus.networkinfo.CONNECTION_NONE){
			mui.toast("The current network does not give force, please try again!");
		}else{
			//屏幕真实宽度
			var width = window.innerWidth;
			var height = window.innerHeight;
			
			var adHeight = parseInt(width)*3/20;
			var adBottom = mui.os.ios?('-'+adHeight+'px'):'0';
			var ad = plus.webview.create(url,'ad',{height:adHeight+'px',bottom:adBottom,position:"absolute"});
			
			//目前Android平台不支持子webview的setStyle动画，因此分平台处理；
			if(mui.os.ios){
				//为了支持iOS平台左侧边缘滑动关闭页面，需要append进去；
				plus.webview.currentWebview().append(ad);
				ad.addEventListener('loaded',function () {
					ad.setStyle({
						bottom:'0',
						transition: {
							duration: 150
						}
					});
				});
			}else{
				ad.addEventListener('loaded',function () {
					ad.show('slide-in-bottom');
				});
			}
			//设置主页面的底部留白，否则会被遮住；
			document.querySelector('.mui-content').style.paddingBottom = adHeight + 'px';
		}
		
	});
	
    
    var count = 1;
	var size = 10;
	function pullupRefresh(){
		setTimeout(function(){
			var table = jQuery('#downloadWarp');
		    var cells = table.find('.mui-table-view-cell');
			var url = MyAnviz.baseUrl+'/download/ajax.html?product_category_id=0&product_id=0';
			
			mui.ajax({
		        type: "GET",
		        url: url,
		        data: {
		        	"userId": "1",
		        	"page": count,
		        	"size": size
		        },
		        dataType: "json",
		        success: function (data) {
		            console.log('data' + data.data);
		            var pageCount = data.pageCount;
		            var pageNum = data.page;
		            var pageSize = Math.ceil(pageCount / pageNum);
	            	mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > pageCount));//参数为true代表没有更多数据了。
	            
	            	console.log('当前的请求页数为:' + count);
	            	
	            	var list = data.data;
	            	for(var i = 0; i < list.length; i++){
	            		var item = list[i];
	            		if(item){
	            			var fileType = item.fileType;
	            			var fileName = item.fileName;
	            			var fileSize = item.fileSize;
	            			var uploadTime = item.uploadTime;
	            			var downloadUrl = item.downloadUrl;
	            		}
	            		
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
	            				/*'<span class="anviz-update-icon update-icon-size update-biometric_larger"></span>' + */
	            			'</li>'
	            		);
	            		
	            		li.attr('data-name',fileName);
	            		
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
						};
	            		
	            		console.log('新的li为：' + li.length);
						
						/*新的li数组添加到第一次加载的10条li的后面*/
		            	cells.push(li[0]);
		            	console.log('新的li数量' + cells.length);
		            	table.append(cells);
	            	}
		        }
			});
		},1500);
	}
	if (mui.os.plus) {
        mui.plusReady(function() {
            setTimeout(function() {
                mui('#pullrefresh').pullRefresh().pullupLoading();
            }, 1000);

        });
    } else {
        mui.ready(function() {
            mui('#pullrefresh').pullRefresh().pullupLoading();
        });
    }
    
    //关联查询
    function getQueryChild(value){
    	var url = MyAnviz.baseUrl + '/product/ajax/select.html?category_id=' + value;
		var optionp  = '';
		var defaultOption = '<option value="-1">--None--</option>';
		
		mui.ajax({
			type: 'GET',
			url: url,
			dataType: 'json',
			success: function(data) {
				console.log(data);
				for(var i = 0; i < data.length; i++){
					var name = data[i].productorName;
					var value = data[i].contentId;
					optionp += "<option  value='" + value + "'>"+name+"</option>";
				}
				jQuery('#downloadModeSelected').html(optionp);
			},
			error: function(data) {
				if(data.success == false){
					mui.toast(data.message)
				}
			}
		});
    }
    
    //条件查询
    function downloadKeyWordSearch(url){
    	var table = jQuery('#searchDownload'),
    		detailInner = '';
    	
    	table.find('li').remove();
    	
    	mui.ajax({
			type: 'GET',
			url: url,
			dataType: 'json',
			beforeSend: function(data) {
				if(data.status == 0) {
					jQuery('.anviz-loading').fadeIn();
				}
			},
			success: function(data) {
				console.log(data);
				var list = data.data;
				if(list == '' || list == null || list.length == 0){
					setTimeout(function(){
						detailInner += '<div class="anviz-empty">There is no list of your FAQ</div>';
						table.html(detailInner);
					},800);
				}else{
					for(var i = 0; i < list.length; i++) {
						var item = list[i];
		            		if(item){
		            			var fileType = item.fileType;
		            			var fileName = item.fileName;
		            			var fileSize = item.fileSize;
		            			var uploadTime = item.uploadTime;
		            			var downloadUrl = item.downloadUrl;
		            		}
		            		
		            		var detailInner = jQuery(
		            			'<ul class="mui-table-view mui-table-view-chevron js-view">' +
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
		            					/*'<span class="anviz-update-icon update-icon-size update-biometric_larger"></span>' + */
		            				'</li>' + 
		            		    '</ul>'
		            		);
		            		detailInner.attr('data-name',fileName);
		            		
		            		var downloadImg = detailInner.find('.js-anviz-img');
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
							};
						table.append(detailInner);
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
    
    //loading
    function loadingProductor(){
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
    }

    
</script>
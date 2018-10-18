<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/11
 * Time: 15:14
 * FileName: list.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<!--<script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>-->
<script src="<?php echo $this->assetsUrl; ?>/js/pub/public.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/productor/productor.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.pullToRefresh.material.js?<?php echo time();?>"></script>
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
	<span>loading</span>
</div>
<!--侧滑菜单容器-->
<div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable">
	<!--菜单部分-->
	<aside id="offCanvasSide" class="mui-off-canvas-right" style="background: #FFFFFF;width: 90%;z-index: 99;height: 100%;width: 90%;overflow: hidden;">
		<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
			<div class="mui-scroll">
				<div id="Fingerprint" class="mui-table-view-cell">
					<div class="anivz-title">
						<h5 class="anviz-padded">Category Selection</h5>
					</div>
					<!--筛选子菜单-->
					<div class="mui-collapse-content anviz-collapse-content"></div>
				</div>
			</div>
		</div>
		<div id="indexbnts" class="index-bnts">	
			<div id="reset" class="left J_ping">Reset</div>	
			<div id="submit" class="right J_ping">Submit</div>
		</div>
	</aside>
	<div id="productList" class="mui-inner-wrap">
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        	<h1 class="mui-title icon-color"></h1>
			<!--<a id="offCanvasBtn" href="#offCanvasSide" class="mui-icon mui-action-menu mui-icon-bars mui-pull-right icon-color"></a>-->
		</header>
		<!--筛选-->
	    <div class="mui-slider-group">
			<div id="slider" class="mui-slider">
				<div id="newSubProduct" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted" style="margin-top: 44px;">
					<div class="mui-scroll scroll-nav">
						<a class="js-anviz-tab mui-control-item anviz-item-all mui-active" data-id="5-0" style="display: none;">All</a>
						<div id="filtrateNav" class="mui-control-item filtrate-nav" style="color: #00a0e8;display: none;"><img src="<?php echo $this->assetsUrl; ?>/img/icon/filtrate.png" style="width: 20px;">Filtrate</div>
					</div>
				</div>
			</div>
		</div>
		<!--content-->
	    <div id="pullrefresh" class="mui-content mui-scroll-warpper">
	    	<div class="mui-scroll">
	    		<ul id="biometricList" class="mui-table-view mui-table-view-chevron js-view" id="productList"></ul>
	    	</div>
	    </div>
		<!-- off-canvas backdrop -->
		<div class="mui-off-canvas-backdrop"></div>
	</div>
</div>

<script src="<?php echo $this->assetsUrl; ?>/js/pub/webviewGroup.js?<?php echo time();?>"></script>
<script type="text/javascript" charset="utf-8">
    mui.init({
        pullRefresh: {
        	container:'#pullrefresh',
			up: {
				height:50,
				contentrefresh: "loading...",
				contentnomore:"There's no more data",
				callback: function pullupRefresh(){
					var id = cwf.getUrlParam('id');
					upLoad(id);
				}
			}
        }
    });
    mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false //是否显示滚动条
    });
    mui.ready(function(){
    	/*searchSubCatalog();*/
    	jQuery('#biometricList').on('tap','li',function(e){
    		e.stopPropagation();
    		var id = jQuery(this).attr('data-id');
    		var des = jQuery(this).attr('data-des');
    		des = des.replace(/\&/g,"%26");
    		var url = MyAnviz.baseUrl+'/product/index/view.html?id='+id;
			mui.openWindow({
				url:url,
				id: '#proPage'
			})
    	});
    	
	var id = cwf.getUrlParam('id');
    	//第一次加载数据时查询二级菜单
    	submenu(id);
    	//第一次加载数据时添加三级菜单内容
    	LevelThreeSubMenu(id);
    	
    	//筛选查询
    	jQuery('#submit').on('tap',function(){
    		setTimeout(function(){
    			//添加所选中的button对应的内容列表
	    		var avtive = jQuery('.anviz-collapse-content').find('button').hasClass('anviz-sub-product-btn-active');
	    		if(avtive){
	    			var id = jQuery('.anviz-sub-product-btn-active').attr('data-id');
	    			var table = jQuery('#pullrefresh .mui-table-view');
			    	table.empty();
			    	jQuery('.no-data').empty();
			    	
			    	var cells = table.find('.mui-table-view-cell');
			    	var url = MyAnviz.baseUrl + '/product/ajax/productlist.html';
			    	
					ajaxData(table,cells,url,id);
	    		}
    		 	//数据查询OK后，关闭侧滑菜单
	            mui('.mui-off-canvas-wrap').offCanvas('close');
    		},500);
    		
    	})
    	
    	//筛选重置
    	jQuery('#reset').on('tap',function(){
    		var isActiveBtn = jQuery('.anviz-collapse-content').find('button').hasClass('anviz-sub-product-btn-active');
    		if(isActiveBtn){
    			jQuery('.anviz-collapse-content').find('button').removeClass('anviz-sub-product-btn-active');
    		}else{
    			return false;
    		}
    	})
    	
    	 //侧滑容器父节点
		var offCanvasWrapper = mui('#offCanvasWrapper');
		 //主界面容器
		var offCanvasInner = offCanvasWrapper[0].querySelector('.mui-inner-wrap');
		 //菜单容器
		var offCanvasSide = mui("#offCanvasSide");
		 //移动效果是否为整体移动
		var moveTogether = false;
		 //侧滑容器的class列表，增加.mui-slide-in即可实现菜单移动、主界面不动的效果；
		var classList = offCanvasWrapper[0].classList;
		 //变换侧滑动画移动效果；
		jQuery('#filtrateNav').on('tap',function(e){
			var index = jQuery(this).index();
			if(index == '4'){
				mui('.mui-off-canvas-wrap').offCanvas().show();
				offCanvasWrapper.offCanvas().refresh();
			}
		});
    });
    
   /* function searchSubCatalog(){
    	
    }*/
   
	
	var count = 1;
	var size = 10;
	//第一次加载，上拉加载
	function upLoad(id){
		setTimeout(function(){
			/*第一次加载时取得所有的li*/
	    	var table = jQuery('#pullrefresh .mui-table-view');
	    	/*table.empty();*/
	        var cells = table.find('.mui-table-view-cell');
	    	var url = MyAnviz.baseUrl + '/product/ajax/productlist.html';
	    	
	    	mui.ajax({
		        type: "GET",
		        url: url,
		        data: {
		        	"id": id,
		        	"page": count,
		        	"size": size
		        },
		        dataType: "json",
		        beforeSend: function(data) {
					if(data.success == true){
						/*mui.toast('loading...');*/
						jQuery('.anviz-loading').show();
					}
				},
		        success: function (data) {
		            console.log('data' + data.data);
		            var pageCount = data.pageCount;
		            var pageNum = data.page;
		            var pageSize = Math.ceil(pageCount / pageNum);
	            	mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > pageCount));//参数为true代表没有更多数据了。
	            	
		    		for (var i = 0; i < data.data.length; i++) {
		            	var item = data.data[i];
		            	if(item){
		            		var p_id = item.contentId;
			                var p_img = item.productorImg;
			                var p_name = item.productorName;
			                var p_des = item.productorDes;
			                var p_url = item.productorUrl;
		            	}
		            	
		            	var li = jQuery('<li class="mui-table-view-cell mui-media js-media" data-id="' + p_id + '">' + '<img class="mui-media-object mui-pull-left js-img" src="' + p_img + '" /><div class="mui-media-body js-media-body">' + p_name + '</div>' + '<div class="anviz-ellipsis js-des js-info">' + p_des + '</div></li>');
		            	li.attr('data-des',p_des);
		            	
		            	/*新的li数组添加到第一次加载的10条li的后面*/
		            	if(cells.length > 1){
		            		cells.push(li[0]);
		            		table.append(cells);
		            	}else{
		            		table.append(li);
		            	}
		            }
		            
		    	}
    		});
		},500)
	}
	
	//查询二级子菜单，并填充
	function submenu(id){
		var subUl = jQuery('.scroll-nav');
		var subAll = jQuery('.scroll-nav').find('.anviz-item-all');
		var subUrl = MyAnviz.baseUrl + '/product/ajax/category.html?id=' + id;
		
		switch(id){
			case '1':
				jQuery('.scroll-nav').find('.anviz-item-all').attr('data-id','5-0');
				break;
			case '2':
				jQuery('.scroll-nav').find('.anviz-item-all').attr('data-id','29-0');
				break;
			case '3':
				jQuery('.scroll-nav').find('.anviz-item-all').attr('data-id','34-0');
				break;
		}
		
		setTimeout(function(){
			jQuery('.scroll-nav').find('.anviz-item-all').fadeIn();
			jQuery('#filtrateNav').fadeIn();
		},500);
		
		mui.ajax({
	        type: "GET",
	        url: subUrl,
		    dataType: "json",
	        beforeSend: function(data) {
				if(data.success == true){
					/*mui.toast('loading...');*/
					jQuery('.anviz-loading').show();
				}
			}, 
			success: function (data) {
		        console.log('data' + data);  
		        
		        for(var i = 0; i < data.length; i++){
		        	var item = data[i].data;
		        	var id = data[i].id;
		        	
		        	var productName = item.productName;
		        	
		        	var aObj = jQuery(
		        		'<a class="js-anviz-tab js-sub-menu mui-control-item" data-id=' + id + '>' + productName + '</a>'
		        	);
		        	subAll.after(aObj);
		        }
			}
		});								
	}
	
	/**
	 * 二级子菜单点击后
	 * 1、查询三级子菜单，并填充
	 * 2、查询二级子菜单，显示对应内容
	 */
	jQuery('#newSubProduct').delegate('.js-sub-menu','tap',function(e){
		e.stopPropagation();
		var id = jQuery(this).attr('data-id');
		var table = jQuery('#pullrefresh .mui-table-view');
    		table.empty();
    		jQuery('.no-data').empty();
    	
    		var cells = table.find('.mui-table-view-cell');
    		var url = MyAnviz.baseUrl + '/product/ajax/productlist.html';
    	
		jQuery(this).addClass('mui-active').siblings().removeClass('mui-active').not('#filtrateNav');
		
		LevelThreeSubMenu(id);
		ajaxData(table,cells,url,id);
	});	
	
	/**
	 * 二级子菜单 All 点击事件
	 */
	jQuery('#newSubProduct').delegate('.anviz-item-all','tap',function(e){
		var table = jQuery('#pullrefresh .mui-table-view');
    	table.empty();
    	jQuery('#biometricList .no-data').html('');
    	
    	var cells = table.find('.mui-table-view-cell');
    	var url = MyAnviz.baseUrl + '/product/ajax/productlist.html';
    	
		var id = jQuery(this).attr('data-id');
		ajaxData(table,cells,url,id);
	});
	
	
	function LevelThreeSubMenu(id){
		var table = jQuery('#Fingerprint').find('.anviz-collapse-content');
    		table.empty();
		var levelThreeUrl = MyAnviz.baseUrl + '/product/ajax/category.html?id=' + id;
		setTimeout(function(){
			mui.ajax({
				type: "GET",
	            url: levelThreeUrl,
	            dataType: "json",
	            beforeSend: function(data) {
				    if(data.success == true){
					    jQuery('.anviz-loading').show();
				   }
			    },
			    success: function (data) {
	            	console.log('data' + data);
	            	for(var a = 0; a < data.length; a++){
	            		var id = data[a].id;
	            		var productName = data[a].data.productName;
	            		
	            		var button = jQuery(
            				'<button type="button" class="anviz-sub-product-btn" data-id=' + id + '>' + productName + '</button>'
            			);
            			
            			table.append(button);
	            	}
	           }
			})
		},500);
	}
	
	
	//三级筛选及选中button切换
	jQuery('.anviz-collapse-content').delegate('button', 'tap',function(e){
		e.stopPropagation();
		var index = $(this).index();
		var id = jQuery(this).attr('data-id');
       
        $('.anviz-sub-product-btn-active').removeClass('anviz-sub-product-btn-active');
	    $(this).addClass('anviz-sub-product-btn-active');
	    
	    jQuery(this).attr('data-id',id);
	});
	
	
	//二级子菜单查询数据的方法
	function ajaxData(table,cells,url,id){
		var size = 10;
		var count = 1;
    	var paramEntity;
    	if(id == '5-0' || id == '34-0' || id == '29-0'){
    		paramEntity = {
    			"id": id,
	        	"page": count,
	        	"size": size
    		};
    		getData(table,cells,url,paramEntity);
    	}else{
    		paramEntity = {
    			"id": id
    		};
    		getData(table,cells,url,paramEntity);
    	}
    }
    
   
    function getData(table,cells,url,paramEntity){
    	setTimeout(function(){
    		mui.ajax({
		        type: "GET",
		        url: url,
		        data: paramEntity,
		        dataType: "json",
		        beforeSend: function(data) {
					if(data.success == true){
						jQuery('.anviz-loading').show();
					}
				},
		        success: function (data) {
		            console.log('data' + data.data);
		            var pageCount = data.pageCount;
		            var pageNum = data.page;
		            var pageSize = Math.ceil(pageCount / pageNum);
		        	mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > pageCount));//参数为true代表没有更多数据了。
		        	
            		var info = "There's no more data";
            		var nullContent = jQuery(
        				'<div class="no-data" style="display:block;margin:10px auto;text-align: center;color:#555;">' + info + '</div>'
				);
		        	if(data.data.length == 0){
	        			setTimeout(function(){
	            			jQuery('.mui-pull-bottom-pocket').css('visibility','visible').html(nullContent);
	            		},1000);
		        	}else{
		        		for (var i = 0; i < data.data.length; i++) {
		            	var item = data.data[i];
		            	if(item){
		            		var p_id = item.contentId;
			                var p_img = item.productorImg;
			                var p_name = item.productorName;
			                var p_des = item.productorDes;
			                var p_url = item.productorUrl;
		            	}else{
		            		var nullContent = "There's no more data";
		            	}
		            	
		            	var li = jQuery('<li class="mui-table-view-cell mui-media js-media" data-id="' + p_id + '">' + '<img class="mui-media-object mui-pull-left js-img" src="' + p_img + '" /><div class="mui-media-body js-media-body">' + p_name + '</div>' + '<div class="anviz-ellipsis js-des js-info">' + p_des + '</div></li>');
		            	li.attr('data-des',p_des);
		            	if(cells.length > 1){
			            	//新的li数组添加到第一次加载的10条li的后面
		            		cells.push(li[0]);
		            		table.append(cells);
		            	}else{
		            		table.append(li);
		            		setTimeout(function(){
		            			jQuery('.mui-pull-bottom-pocket').css('visibility','visible').html(nullContent);
		            		},1000);
		            		
		            	}
		            }
		        	}
			    },
				complete: function(data) {
					if(data.success == true){
						jQuery('.anviz-loading').hide();
					}
				},
				error: function(data) {
					if(data.success == false){
						mui.toast(data.message)
					}
				}
			});
    	},500);
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
    
    
    
    function onSubTab(){
    	jQuery('#newSubProduct .scroll-nav a').on('tap',function(){
    		var index = jQuery(this).index();
    		var id = jQuery(this).attr('data-id');
    		return id;
    	})
    }
    
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
	          var status = document.readyState;
	          if(status == 'complete'){
	               $('.anviz-loading').fadeOut();
	          }
	     }
	}
	
	if (mui.os.plus && mui.os.ios) {
		offCanvasWrapper[0].addEventListener('shown', function(e) { //菜单显示完成事件
			plus.webview.currentWebview().setStyle({
				'popGesture': 'none'
			});
		});
		offCanvasWrapper[0].addEventListener('hidden', function(e) { //菜单关闭完成事件
			plus.webview.currentWebview().setStyle({
				'popGesture': 'close'
			});
		});
	}
</script>

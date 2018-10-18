<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 12:31
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/animate.css" />
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
<div id="troubleTicket" class="mui-content">
    <!--marking-->
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
       	<a id="searchIcon" class="iconfont icon-search icon-color mui-icon mui-icon-left-nav mui-pull-right"></a>
      	<a id="closeIcon" class="icon-color mui-icon mui-icon-closeempty mui-pull-right" style="display: none;"></a>
        <h1 class="mui-title icon-color">Trouble Ticket</h1>
    </header>

    <!--content  roleRight anviz-animation-->
	<span class="anviz-search-info">Select product category for query</span>
	<!--search content-->
	<div id="showSearchWarpContent" class="anviz-search-content" style="display: none;">
		<!--search-->
        <div class="mui-input-row mui-search anviz-slider-select">
            <div class="mui-input-group">
                <div class="mui-input-row anviz-advice-country">
                    <label>Category</label>
                    <select id="troubleCountry" class="anviz-select">
                        <option value="-1">--None--</option>
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
                    <select id="troubleModel" class="anviz-select">
                    	<option value="-1">--None--</option>
                    </select>
                </div>
            </div>
        </div>
        
        <button id="searchBtn" class="icon-color mui-btn mui-btn-blue">Search</button>
	</div>
	
	<div id="ticketNum" class="mui-content js-trouble">
		<div class="mui-media">
			<div id="addMessage" class="anviz-add-message">
				<span class="iconfont icon-trolble-size icon-add" style="margin-left: 10px;"></span>
			</div>
		</div>
		<div class="anviz-new-card-content" style="margin-bottom: 30px;">
			<div class="anviz-processing-num">0</div>
			<div class="anviz-processing-info">Processing</div>
			<span class="anviz-update-icon update-warning-news waring-size">The problem has been solved, not updated</span>
		</div>
		<ul class="mui-table-view num-list">
			<li class="mui-table-view-cell anviz-li">
				<div class="anviz-ticket-times mui-pull-left">
					<div class="anviz-times-num">0</div>
					<div class="anviz-times-info">Times</div>
				</div>
				<div class="aniz-ticket-line"></div>
				<div class="anviz-ticket-completes mui-pull-right">
					<div class="anviz-completes-num">0</div>
					<div class="anviz-completes-info">Complete</div>
				</div>
			</li>
		</ul>
	</div>
	<!--条件查询容器-->
	<div id="searchToubleWarp" class="mui-content mui-scroll-wrapper anviz-ticket-scroll-wrapper" style="padding-top: 0;">
		<div class="mui-scroll">
			<div id="searchTrouble"></div>
		</div>
	</div>
    <!--下拉刷新容器-->
    <div id="pullrefresh" class="mui-content mui-scroll-wrapper anviz-ticket-scroll-wrapper" style="padding-top: 0;">
        <div class="mui-scroll">
            <!--数据列表-->
            <div id="anvizTrouble"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    mui.init({
        pullRefresh: {
            container: '#pullrefresh',
            up: {
                style: 'circle',
                color: '#2BD009',
                height: 50,
                auto: false,
                contentrefresh: "loading...",
				contentnomore:"There's no more data",
                callback: pullupRefresh
            }
        }
    });
	mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false
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
		
		//筛选，清空【下拉刷新容器】并隐藏它,将根据条件查询的数据储存入 【条件查询容器】
		jQuery('#searchBtn').on('tap', function() {
			var product_category_id = jQuery('#troubleCountry').val() == '-1' ? '' : jQuery('#troubleCountry').val();
			var product_id = jQuery('#troubleModel').val() == '-1' ? '' : jQuery('#troubleModel').val();
	
			if(product_category_id && product_id){
				jQuery('#showSearchWarpContent').hide();
				jQuery('#closeIcon').hide();
				jQuery('#searchIcon').show();
				
				var count = 1;
				var dataEntity = {
					'product_category_id':product_category_id,
					'product_id':product_id,
					'page':count,
					'type':1
				}
				pullupRefresh(dataEntity);
			}else{
				mui.toast('Query keywords cannot be empty!');
				jQuery('.anviz-ticket-scroll-wrapper').css('top','120');
			}
		});
		
		//详情
		jQuery('#anvizTrouble').on('tap', 'li', function() {
			var id = jQuery(this).attr('data-id');
			
			var url = MyAnviz.baseUrl+'/ticket/index/view.html?id=' + id;
			mui.openWindow({
				url:url
			});
		});
		
		//子级下拉
		jQuery('#troubleCountry').change(function(){
			var value = jQuery(this).val(); 
			console.log('value: ' + value);
			getProName(value);
		});
		
		//添加
		jQuery('#addMessage').on('tap', function() {
			mui.openWindow({
				url: MyAnviz.baseUrl+"/ticket/index/add.html",
				id: "#addTicketPage"
			});
		});
	});
	
	function getProName(value){
		var url = MyAnviz.baseUrl + '/product/ajax/select.html?category_id=' + value;
		var optionp  = '<option value="-1">--None--</option>';
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
				jQuery('#troubleModel').html(optionp);
			},
			error: function(data) {
				if(data.success == false){
					mui.toast(data.message)
				}
			}
		});
	}
	
	
	/**
     * 上拉加载业务
     */
    var count = 1;
    var searchCount = 1;
	var size = 10;
    function pullupRefresh(params) {
    	var url =  MyAnviz.baseUrl+"/ticket/ajax/ticketlist.html";
    	if(params){
    		var dataEntity = {
    			"page": params.page,
				"size": size,
				"product_category_id": params.product_category_id,
				"product_id": params.product_id
    		};
    		
    		var types = params.type;
    		setTimeout(function() {
		    	mui.ajax({
			        type: "GET",
			        url: url,
			        data: dataEntity,
			        dataType: "json",
			        beforeSend: function(data) {
		                  if(data.readyState == 0) {
		                       jQuery('.anviz-loading').show();
		                  }
		            },
			        success: function (data) {
			        	jQuery('#anvizTrouble').html('');
			        	getAjax(data);
			        	//上拉加载,娘的，这个地方真不好控制
			        	if(types == 1){
			        		mui('#pullrefresh').pullRefresh().endPullupToRefresh((++dataEntity.page > data.pageCount));
			        	}
			        },
			        complete: function(data) {
		                  if(data.status == 200) {
		                       jQuery('.anviz-loading').hide();
		                  }
		            },
		    	})
	        }, 1500);
    	}else{
    		setTimeout(function() {
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
			        	getAjax(data);
			        	//上拉加载
			        	mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > data.pageCount));
			        }
		    	})
	        }, 1500);
    	}
    }

    if(mui.os.plus) {
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
    
    function getAjax(data){
    	/*第一次加载时取得所有的li*/
    	var table = jQuery('#anvizTrouble');
        var cells = table.find('.mui-table-view');
        var ticketObj = $('.js-ticket-num-list');
    	console.log(data);
		        	
		var userId = data.userId;
		var total = data.total;
		var times = data.times;
		var size = data.size;
		var processing = data.processing;
		var pageCount = data.pageCount;
		var page = data.page;
		var isTicket = data.isTicket;
		var complete = data.complete;
		if(ticketObj){
			ticketObj.find('.times-num').text(times);
			ticketObj.find('.complete-num').text(complete);
			ticketObj.find('.processing-num').text(processing);
		}
		
		var ticketList = data.ticketList;
		if(ticketList){
			for(var i = 0; i < ticketList.length; i++){
				var item = ticketList[i];
				if(item){
					var id = item.id;
					var ticketDate = item.ticketDate;
					var ticketDes = item.ticketDes;
					var ticketName = item.ticketName;
					var ticketNum = item.ticketNum;
					var ticketStatus = item.ticketStatus;
				}
				
				jQuery('#ticketNum .anviz-processing-num').text(processing);
				jQuery('#ticketNum .anviz-times-num').text(times);
				jQuery('#ticketNum .anviz-completes-num').text(complete);
				//new li
				var li = jQuery(
					' <ul class="mui-table-view anviz-pro-list js-ul-box">' +
	    				'<li class="mui-table-view-cell" data-id=' + id + '>' + 
	    					'<div class="anviz-pro-title">' + 
	    						'<div class="anviz-pro-number mui-pull-left">' + ticketNum + '</div>' + 
	    						'<span class="anviz-update-icon update-completed update-size"></span>' + 
	    						'<div class="anviz-pro-date mui-pull-right">' + ticketDate + '</div>' + 
	    					'</div>' +
	    					'<div class="mui-media-body anviz-pro-body">' + ticketName + '</div>' + 
	    					'<div class="anviz-pro-recovery-info">' +
	    						'<span class="anviz-update-icon update-new-news update-solved-size"></span>' +
	    						'<div class="anviz-recovery-time">' + 45454465 + '</div>' + 
	    					'</div>'+
	    				'</li>' +
	    			'</ul>'
				);
				
				var icon = li.find('span');
				var recoveryInfoIcon = li.find('.anviz-pro-recovery-info span');
				
				
				//1 进行时 2完成  3关闭
				//由时间先后顺序排序
				switch(ticketStatus) {
	                case '0':
	                    icon.removeClass('anviz-update-icon update-completed update-size').addClass('anviz-update-icon update-be-solved update-solved-size');
	                    recoveryInfoIcon.remove();
	                    break;
					case '1':
	                    icon.removeClass('anviz-update-icon update-completed update-size').addClass('anviz-update-icon update-be-solved update-solved-size');
						recoveryInfoIcon.addClass('news-color');
						break;
					case '2':
					case '3':
	                    recoveryInfoIcon.remove();
						break;
				}
				
				/*新的li数组添加到第一次加载的10条li的后面*/
	        	cells.push(li[0]);
	        	table.append(cells);
			}
		}
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
	          var status = document.readyState
	          if(status == 'complete'){
	               $('.anviz-loading').fadeOut();
	          }
	     }
	}
	
</script>

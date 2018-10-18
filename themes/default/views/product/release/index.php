<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/10/16
 * Time: 17:11
 * FileName: index.php
 */
?>
<div class="mui-content" style="max-width: 100%;">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 id="homeTitle" class="mui-title icon-color">Update-log</h1>
    </header>
    <!--content-->
    <div id="updateLogWarp">
        <div class="anviz-new-time-shaft">
            <ul class="anviz-timeline"></ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    mui.ready(function(){
        loadingProductor();
        searchLog();
    });
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
    };
    
    function searchLog(){
		var upgradeList = 
			[{
				"contentId": "455372",
				"productorImg": "http://www.beta.anviz.com/myanviz/img/tmp/455376_m3-02_thumb_550_550.png",
				"productorName": "M3",
				"productUpdate":"15-10-2017",
				"productorDes": "Outdoor RFID Access Controller",
				"updateContent":"the user has a capacity of 50000 pieces, the recording capacity is 200,000, and the EM card and Mifare are supported, 16 groups are supported, and 32 door time periods are supported."
			},{
				"contentId": "95574",
				"productorImg": "http://www.beta.anviz.com/myanviz/img/tmp/480364_Anviz_D200_01_thumb_550_550.png",
				"productorName": "D200",
				"productUpdate":"29-09-2017",
				"productorDes": " Fingerprint Time Attendance",
				"updateContent":"Increase the TCP/IP"
			},{
				"contentId": "95579",
				"productorImg": "http://www.beta.anviz.com/myanviz/img/tmp/480375_Anviz_A300_04_thumb_550_550.png",
				"productorName": "A300",
				"productUpdate":"19-07-2017",
				"productorDes": "Fingerprint & RFID Time Attendance",
				"updateContent":"Increase the WIFI"
			},{
				"contentId": "277906",
				"productorImg": "http://www.beta.anviz.com/myanviz/img/tmp/533749_M5-01_thumb_550_550.png",
				"productorName": "M5",
				"productUpdate":"11-06-2017",
				"productorDes": "Outdoor Fingerprint RFID Access Controller",
				"updateContent":"Increase support for Mifare CARDS"
			},{
				"contentId": "642954",
				"productorImg": "http://www.anviz.com/Style/crmtmp/storage/2018/January/week3/684215_4_thumb_520_520.png",
				"productorName": "W1",
				"productUpdate":"19-01-2018",
				"productorDes": "RFID Access Control with Battery",
				"updateContent":"Optional 2600mah Lithium battery.Full Upgrade for W Series with Battery Power Your Business Anytime and Anywhere.."
			}];
		
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
</script>

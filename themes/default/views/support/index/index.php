<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 11:07
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<!--<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/live-chat.css" />-->
<?php $this->endClip(); ?>
<style>
	/*修改livechat的基本样式*/
	body #livechat-compact-container {
		position: absolute !important;
		bottom: 130px !important;
		right: 50px !important;
		display: none;
	}
	.change-css{
		position: absolute !important;
		bottom: 130px !important;
		right: 50px !important;
	}
	.anviz-customer{
		 display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -webkit-box-orient: horizontal;
	    -webkit-box-direction: normal;
	    -ms-flex-direction: row;
	            flex-direction: row;
	    -ms-flex-pack: distribute;
	        justify-content: space-around;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	            align-items: center;
	            margin-bottom: 30px;
	}
	.anviz-customer .anviz-customer-info .livechat_button a img{
		width: 100px;
	    display: block;
	    margin: 10px auto;
	}
	.anviz-customer-name{
		text-align: center;
		display: block;
		font-size: 14px;
	}
</style>
<div class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <!--<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>-->
        <h1 id="homeTitle" class="mui-title icon-color">Support</h1>
    </header>

    <!--content-->
    <div id="contentGroup" class="mui-slider-group anviz-content" style="width: 100%;">
        <div id="support" class="mui-slider-item anviz-content">
            <div class="mui-content">
                <!--第一版隐藏chat-->
            	<!--<div class="anviz-support-times">
					<span class="iconfont icon-time1 icon-support-size"></span>
					<span class="anviz-support-info anviz-media-320">You have received 231 minutes support</span>
				</div>-->
				<!--label-->
				<ul class="mui-table-view mui-grid-view mui-grid-9">
					<li class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12">
						<h5 class="anviz-padded">ONLINE REPS</h5>
					</li>
					<!--<li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
						<div class="anviz-online-num">1</div>
					</li>-->
				</ul>
                <?php $this->Widget('application.widgets.ChatWidget'); ?>
				<ul id="onLineOther" class="mui-table-view">
                    <?php $this->Widget('application.widgets.SupportWidget', array(
                        'block' => 'ticket'
                    )); ?>
                    <?php $this->Widget('application.widgets.SupportWidget', array(
                        'block' => 'faq'
                    )); ?>
                    <?php $this->Widget('application.widgets.SupportWidget', array(
                        'block' => 'download'
                    )); ?>
                </ul>
            </div>
        </div>
    </div>
    

    <?php $this->Widget('application.widgets.BlockWidget', array(
        'block' => 'bottom',
        'module' => $this->module,
        'controller' => $this->controller,
    )); ?>
</div>
<!--测试用 salse-->
<!--<script type="text/javascript">			
	(function() {
	var phplive_e_1509330061 = document.createElement("script") ;
	phplive_e_1509330061.type = "text/javascript" ;
	phplive_e_1509330061.async = true ;
	v=24，24为http://chat.anviz.com > Chat Icons > 区域选择的 option 的 value，这里是写死的
	1509330061 为 24 这个区域配置的刚上传的图片的 id
	区域选择的 option 的 value=24 对应的 name = Africa_Sales
	<!--phplive_e_1509330061.src = "//chat.anviz.com/js/phplive_v2.js.php?v=24|1509330061|0|" ;
	document.getElementById("phplive_btn_1509330061").appendChild( phplive_e_1509330061 ) ;
	})() ;			
</script>-->

<!--测试用 support-->
<!--<script type="text/javascript">
	(function() {
	var phplive_e_1509330902 = document.createElement("script") ;
	phplive_e_1509330902.type = "text/javascript" ;
	phplive_e_1509330902.async = true ;
	//v=25，24为http://chat.anviz.com > Chat Icons > 区域选择的 option 的 value，这里是写死的
	//1509330902 为 25 这个区域配置的刚上传的图片的 id
	//区域选择的 option 的 value=25 对应的 name = Africa_Support
	phplive_e_1509330902.src = "//chat.anviz.com/js/phplive_v2.js.php?v=25|1509330902|0|" ;
	document.getElementById("phplive_btn_1509330902").appendChild( phplive_e_1509330902 ) ;
	})() ;
</script>-->
<input name="" type="hidden" value="<{$countryname}>-<{$countryname_long}>-<{$countrynameip}>" />

<script type="text/javascript">
    mui.init({});
    mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false //是否显示滚动条
    });
    mui.ready(function () {

        loadingProductor();
		drag();
		
		jQuery('#nn').on('tap',function(){
			jQuery('#livechat-full').addClass('fun-show');
			jQuery('#livechat-full').show();
		})
        //support
        jQuery('#onLineOther #faq a').on('tap', function () {
            var faqVal = jQuery(this).find('.js-anviz-body')[0].firstChild.data;
            console.log("当前的li标签的内容为：" + faqVal);

            mui.openWindow({
                /*url: "../faq.html?title=" + faqVal,*/
                url: MyAnviz.baseUrl + "/faq.html?title=" + faqVal,
                id: "#faqPage"
            });
        });

        jQuery('#onLineOther #download a').on('tap', function () {
            var downloadVal = jQuery(this).find('.js-anviz-body')[0].firstChild.data;
            console.log("当前的li标签的内容为：" + downloadVal);

            mui.openWindow({
                /*url: "../download_center.html?title=" + downloadVal,*/
                url: MyAnviz.baseUrl + "/download.html?title=" + downloadVal,
                id: "#pageDownload"
            });
        });
        
    });
    
    function setCss(){
    	/*var style = jQuery('#livechat-compact-container')[0].style;*/
    	var styleObj = jQuery('#livechat-compact-container').Attr('style');
        styleObj.css({
        	'position':'absolute !important',
        	'bottom':'180px !important',
        	'right':'50px !important',
        	'width':'93.5px !important',
        	'height':'93.5px !important'
        });
    }
    
    //拖动chat
    function drag(){
    	var divObj = jQuery('#livechat-compact-container');
    	divObj.bind('mousedown',function(e){
    		var offset_x = jQuery(this)[0].offsetLeft;//x坐标
			var offset_y = jQuery(this)[0].offsetTop;//y坐标
			
			var mouse_x = event.pageX;
			var mouse_y = event.pageY;	
			
			jQuery(document).bind("mousemove",function(ev){
				var _x = ev.pageX - mouse_x;
				var _y = ev.pageY - mouse_y;
				
				/* 设置移动后的元素坐标 */
				var now_x = (offset_x + _x ) + "px";
				var now_y = (offset_y + _y ) + "px";
				
				console.log('now_x:' + now_x + 'now_y:' + now_y);
				
				/* 改变目标元素的位置 */
				divObj.css({
					top:now_y,
					left:now_x
				});
			});
    	});
    	/* 当鼠标左键松开，接触事件绑定 */
		jQuery(document).bind("mouseup",function(){
			jQuery(this).unbind("mousemove");
		});
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
        document.onreadystatechange = function () {
            console.log(document.readyState);
            var status = document.readyState
            if (status == 'complete') {
                $('.anviz-loading').fadeOut();
            }
        }
    }
</script>

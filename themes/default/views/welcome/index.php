<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/18
 * Time: 16:55
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/welcome.css"/>
<?php $this->endClip(); ?>
<div id="sliderWelcome" class="mui-slider mui-fullscreen welcome-slider" style="background-color: black;">
    <div class="mui-slider-group">
        <!-- 第一张 -->
        <div class="mui-slider-item">
            <div class="item-logo" style="background-color: #D74B28">
                <a href="#">
                    <img src="<?php echo $assetsUrl;?>/img/logo/my_anviz.png"/>
                </a>
                <div class="animate guide-show">
                    <h2 class="animated bounceInDown">Technical Support</h2>
                    <li class="animated bounceInLeft">Online Support</li>
                    <li class="animated bounceInRight">FAQs</li>
                </div>
                <div class="anviz-logo">
                    <img src="<?php echo $assetsUrl;?>/img/logo/anviz.png"/>
                </div>
            </div>
        </div>
        <!-- 第二张 -->
        <div class="mui-slider-item">
            <div class="item-logo" style="background-color: #02C1ED;">
                <a href="#">
                    <img src="<?php echo $assetsUrl;?>/img/logo/my_anviz.png"/>
                </a>
                <div id="tips-2" class="animate mui-hidden">
                    <h2 class="animated bounceInDown">Product Library</h2>
                    <li class="animated bounceInLeft">Access Control, CCTV</li>
                    <li class="animated bounceInRight">Time Attendance, Software etc</li>
                </div>
                <div class="anviz-logo">
                    <img src="<?php echo $assetsUrl;?>/img/logo/anviz.png"/>
                </div>
            </div>
        </div>
        <!-- 第三张 -->
        <div class="mui-slider-item">
            <div class="item-logo" style="background-color: #67C962;">
                <a href="#">
                    <img src="<?php echo $assetsUrl;?>/img/logo/my_anviz.png"/>
                </a>
                <div id="tips-3" class="animate mui-hidden">
                    <h2 class="animated bounceInDown">Download Center</h2>
                    <li class="animated bounceInLeft">Product Docs, Software, Brochures</li>
                    <li class="animated bounceInRight">Quick Guides, Training Materials etc</li>
                </div>
                <div class="anviz-logo">
                    <img src="img/logo/anviz.png"/>
                </div>
            </div>
        </div>
        <!-- 第四张 -->
        <div class="mui-slider-item">
            <div class="item-logo" style="background-color: #465465;">
                <a href="#">
                    <img src="<?php echo $assetsUrl;?>/img/logo/my_anviz.png"/>
                </a>
                <div id="tips-4" class="animate mui-hidden">
                    <h2 class="animated bounceInDown">News</h2>
                    <li class="animated bounceInLeft">New Product Release</li>
                    <li class="animated bounceInRight">Product Upgrades, Promotional Info etc</li>
                </div>
                <div class="anviz-logo">
                    <img src="<?php echo $assetsUrl;?>/img/logo/anviz.png"/>
                </div>
            </div>
        </div>
        <!-- 第五张 -->
        <div class="mui-slider-item">
            <div class="item-logo" style="background-color: #FCD208;">
                <a href="#">
                    <img src="<?php echo $assetsUrl;?>/img/logo/my_anviz.png"/>
                </a>
                <div class="animate">
                    <button id='close' class="mui-btn mui-btn-warning mui-btn-outlined">Try</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mui-slider-indicator">
        <div class="mui-indicator mui-active"></div>
        <div class="mui-indicator"></div>
        <div class="mui-indicator"></div>
        <div class="mui-indicator"></div>
        <div class="mui-indicator"></div>
    </div>
</div>
<script>
	mui.init();
	mui.ready(function(){
		jQuery('#close').on('tap',function(){
			mui.openWindow({
				url: MyAnviz.baseUrl+'/'
			})
		});
	})
    mui.back = function() {};
    mui.plusReady(function() {
        if(mui.os.ios){
            plus.navigator.setFullscreen(true);
        }
        plus.navigator.closeSplashscreen();
    });
    //立即体验按钮点击事件
    document.getElementById("close").addEventListener('tap', function(event) {
        plus.storage.setItem("lauchFlag", "true");
        plus.navigator.setFullscreen(false);
        plus.webview.currentWebview().close();
    }, false);
    //图片切换时，触发动画
    document.querySelector('.mui-slider').addEventListener('slide', function(event) {
        //注意slideNumber是从0开始的；
        var index = event.detail.slideNumber+1;
        if(index==2||index==4||index==3){
            var item = document.getElementById("tips-"+index);
            if(item.classList.contains("mui-hidden")){
                item.classList.remove("mui-hidden");
                item.classList.add("guide-show");
            }
        }
    });

</script>
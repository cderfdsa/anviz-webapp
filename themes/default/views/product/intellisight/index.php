<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/5
 * Time: 15:09
 * FileName: index.php
 */
?>
<?php $this->beginClip('cssHeader'); ?>
	<!--webp js-->
	<script src="<?php echo $this->assetsUrl; ?>/js/pub/webpjs_02.min.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/public.js?<?php echo time();?>"></script>
<style>
    .anviz-cross-img {
        max-width: 100%;
        display: block;
        margin: 0 auto;
    }

    .anviz-cross-p {
        margin: 0 auto;
    }

    .nav {
        background: #fff;
    }
     .mui-bar-nav ~ .mui-content{
    	padding-top: 0;
    }
    .mui-slider .mui-slider-group .mui-slider-item img{
    	background: #fff;
    }
</style>
<?php $this->endClip(); ?>
<div class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <!--<a id="biometricSearch" class="iconfont icon-search icon-color mui-icon mui-icon-left-nav mui-pull-right"></a>-->
        <h1 class="mui-title icon-color">IntelliSight</h1>
    </header>
    <!--content-->
	<div id="IntelliSightPage" class="mui-slider-group">
        <div class="mui-card anviz-card-intelli">
            <div class="mui-card-header mui-card-media">
                <span class="anviz-update-icon update-intellisight update-intellisight-color anviz-icon-size-intellli"></span>
                <div class="mui-media-body anviz-media-body-intelli">IntelliSight
                    <p>Intelligent Video Surveillance System Solution</p>
                </div>
            </div>
            <div class="mui-card-content anviz-card-intelli">
                IntelliSight is an application software matched with embedded network surveillance devices launched by
                ANVIZ. It can be used with DVR, NVR, IPC, DVS, network storage etc. Thanks to IntelliSight, you can
                easily view live video and dynamic information anywhere in the world over the network, to realize the
                control and management to the entire security surveillance system. Research and development of
                IntelliSight emphasizes the simplicity of use and intuition to operate, to ensure everyone can
                effectively manage events and export HD video quickly. IntelliSight supports all standard PCs and find
                cameras and NVRs on the network automatically. The setup wizard will guide every step, which enables the
                system will operate normally within a few minutes.
            </div>
        </div>
        <div class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12 js-label">
            <h5 class="anviz-padded">Features</h5>
        </div>
        <ul class="mui-table-view">
            <li class="mui-table-view-cell">
                <p>Application in local area network and wide area network support up to 64 channel live view</p>
            </li>
            <li class="mui-table-view-cell">
                <p>E-map function</p>
            </li>
            <li class="mui-table-view-cell">
                <p>Remote configuration for ANVIZ devices</p>
            </li>
            <li class="mui-table-view-cell">
                <p>User permission management</p>
            </li>
            <li class="mui-table-view-cell">
                <p>Manages alarms and Logs</p>
            </li>
        </ul>
        <div class="mui-content-padded">
            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/IntelliSight_UI.webp"
                 data-preview-src="" data-preview-group="1"/>
        </div>
        <div class="anviz-slider-box">
            <div class="nav">
                <a href="#Function" id="itemOne" class="itemBtn itemBtn-avtive">Function</a>
                <a href="#Configuration" id="itemTwo" class="itemBtn">Configuration</a>
                <a href="#Download" id="itemThree" class="itemBtn">Download</a>
                <a href="#CompatibleDevice" id="itemFour" class="itemBtn">Compatible Device</a>
            </div>
        </div>
        <div class="full-page" id="Function">
            <div class="mui-content-padded">
                <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/banner/IntelliSight_banner.png" data-preview-src=""
                     data-preview-group="1"/>
            </div>
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Window Controller
                        <p>Lock、Maximize、Background、Exit.</p>
                    </div>
                </li>
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Menu
                        <p>Function buttons, such as video preview, video playback.</p>
                    </div>
                </li>
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Emap Window
                        <p>Display all cameras in the currently selected layout; display by grid forms or icon / window
                            embedded in the electronic map.</p>
                    </div>
                </li>
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Device List
                        <p>Display all current channels and devices in the system.</p>
                    </div>
                </li>
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Live Channel
                        <p>1、4、6、9、10、16、25、36、64 Grille.</p>
                    </div>
                </li>
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Profile
                        <p>The display channels are defined by users.</p>
                    </div>
                </li>
            </ul>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/intellisight_live.webp" data-preview-src=""
                     data-preview-group="1"/>
                <p class="anviz-cross-p">Live</p>
            </div>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/intellisight_playback.webp"
                     data-preview-src="" data-preview-group="1"/>
                <p class="anviz-cross-p">Playback</p>
            </div>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/intellisight_alarm.webp" data-preview-src=""
                     data-preview-group="1"/>
                <p class="anviz-cross-p">Alarm</p>
            </div>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/intellisight_emap.webp" data-preview-src=""
                     data-preview-group="1"/>
                <p class="anviz-cross-p">Emap</p>
            </div>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/intellisight_device.webp"
                     data-preview-src="" data-preview-group="1"/>
                <p class="anviz-cross-p">Device</p>
            </div>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/intellisight_alarm.webp" data-preview-src=""
                     data-preview-group="1"/>
                <p class="anviz-cross-p">Log</p>
            </div>
        </div>
        <div class="full-page" id="Configuration">
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Configuration</div>
                </li>
            </ul>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/application-intellisight.jpg"
                     data-preview-src="" data-preview-group="1"/>
            </div>
        </div>
        <div class="full-page" id="Download">
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Download</div>
                </li>
            </ul>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/IntelliSight_UI.webp" data-preview-src=""
                     data-preview-group="1"/>
            </div>
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">PC Client
                        <p>ANVIZ surveillance maintenance and management client provides you a customized layout of
                            preview, easy installation and configuration, multi-terminal synchronization of intelligent
                            alarm, and a more humanized daily security.</p>
                    </div>
                </li>
                <ul class="mui-table-view dowload-warp">
                    <li class="mui-table-view-cell mui-media js-download">
                        <span class="iconfont icon-size mui-pull-right anviz-icon-cell icon-download"></span>
                        <div class="anviz-other-list mui-pull-left js-anviz-img">
                            <span class="anviz-download-img anviz-update-icon update-manual_larger icon-anviz-size"></span>
                        </div>
                        <div class="anviz-download-content">
                            <div class="mui-media-body js-media-body js-anviz-body mui-ellipsis anviz-media-body">
                                Intellisight 1.2.02 64bit 64ch Beta
                            </div>
                            <div class="anviz-info">
                                <span class="anviz-ellipsis js-size"></span>
                                <span class="anviz-ellipsis js-date">07/14/2017 - 42.6 MB</span>
                            </div>
                        </div>
                    </li>
                    <li class="mui-table-view-cell mui-media js-download">
                        <span class="iconfont icon-size mui-pull-right anviz-icon-cell icon-download"></span>
                        <div class="anviz-other-list mui-pull-left js-anviz-img">
                            <span class="anviz-download-img anviz-update-icon update-catalogue_larger icon-anviz-size"></span>
                        </div>
                        <div class="anviz-download-content">
                            <div class="mui-media-body js-media-body js-anviz-body mui-ellipsis anviz-media-body">
                                Intellisight 1.2.02 32bit 36ch 36_x86_36ch_Beta
                            </div>
                            <div class="anviz-info">
                                <span class="anviz-ellipsis js-size"></span>
                                <span class="anviz-ellipsis js-date">07/14/2017- 31.6 MB</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Mobile Client
                        <p>Mobile app gives you quick and easy access to local and remote viewing of real-time video
                            streaming, high security user management, flexible sharing of profile, optimized
                            installation and configuration, easy to use.</p>
                    </div>
                </li>
                <div class="mui-content-padded">
                    <div class="mui-row">
                        <div class="mui-col-sm-6 mui-col-xs-6" style="text-align: center;">
                            <span class="anviz-update-icon update-anzhuo update-icon-size"></span>
                        </div>
                        <div class="mui-col-sm-6 mui-col-xs-6" style="text-align: center;">
                            <span class="anviz-update-icon update-apple2 update-icon-size"></span>
                        </div>
                        <div class="mui-col-sm-12 mui-col-xs-12" style="text-align: center;">
                            <span class="anviz-update-icon update-erweima update-erweima-size"></span>
                            <p>Scan to download</p>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        <div class="full-page" id="CompatibleDevice">
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">Compatible Devices</div>
                </li>
            </ul>
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    <div class="mui-media-body anviz-media-body-intelli">All anviz cameras & video recorder</div>
                    <div class="mui-btn mui-btn-primary">Find product</div>
                </li>
            </ul>
            <div class="mui-content-padded">
                <img class="anviz-cross-img"
                     src="<?php echo $assetsUrl;?>/img/security_one/surveillance_product_family.webp"
                     data-preview-src="" data-preview-group="1"/>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    mui.init({});
    mui.previewImage();
    mui.ready(function () {
        //loading...
        loadingProductor();
        //nav切换效果
        nav();
        //根据滚动调整nav的显示位置
        /*getNavscroll();*/

        //锚点跳转
        jQuery('.itemBtn').on('tap', function () {
            var href = jQuery(this).attr("href");
            var pos = jQuery(href).offset().top;
            $("html,body").animate({
                scrollTop: pos
            }, 100);
            return false;
        })
    });
	mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false //是否显示滚动条
    });
    function nav() {
        jQuery('#itemOne').on("tap", function () {
            jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
        });
        jQuery('#itemTwo').on("tap", function () {
            jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
        });
        jQuery('#itemThree').on("tap", function () {
            jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
        });
        jQuery('#itemFour').on("tap", function () {
            jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
        });
        jQuery('#itemFive').on("tap", function () {
            jQuery(this).addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
        });
    }

    function getNavscroll() {
        var win = jQuery(window);
        var nav = jQuery('.nav');
        var doc = jQuery(document);

        win.scroll(function () {
            if (doc.scrollTop() >= 300) {
                console.log('aaa' + doc.scrollTop());
                nav.removeClass('nav').addClass('fixed-nav');
            } else {
                nav.removeClass('fixed-nav').addClass('nav');
            }

            if (doc.scrollTop() >= 300) {
                jQuery('#itemOne').addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
                ;
            }
            if (doc.scrollTop() >= 589) {
                jQuery('#itemTwo').addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
                ;
            }
            if (doc.scrollTop() >= 1195) {
                jQuery('#itemThree').addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
            }
            if (doc.scrollTop() >= 2126) {
                jQuery('#itemFour').addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
            }
            if (doc.scrollTop() >= 2489) {
                jQuery('#itemFive').addClass('itemBtn-avtive').siblings().removeClass('itemBtn-avtive');
            }
        })
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
<script>
	(function(){var WebP=new Image();WebP.onload=WebP.onerror=function(){
		if(WebP.height!=2){
			var sc=document.createElement('script');
			sc.type='text/javascript';
			sc.async=true;
			
			var s=document.getElementsByTagName('script')[0];
			sc.src='<?php echo $this->assetsUrl; ?>/js/pub/webpjs_02.min.js?<?php echo time();?>';
			s.parentNode.insertBefore(sc,s);
		}};
		WebP.src='data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
	})();
</script>
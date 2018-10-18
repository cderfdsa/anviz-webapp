<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/5
 * Time: 15:07
 * FileName: index.php
 */
?>
<?php $this->beginClip('cssHeader'); ?>
	<!--shareThis-->
	<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59c1d45ab7040a0012c1f32e&product=inline-share-buttons"></script>
	<!--webp js-->
	<script src="<?php echo $this->assetsUrl; ?>/js/pub/webpjs_02.min.js?<?php echo time();?>"></script>
	<style>
		.mui-bar-nav ~ .mui-content{
	    	padding-top: 0;
	    }
	</style>
<?php $this->endClip(); ?>
<div class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <!--<a id="biometricSearch" class="iconfont icon-search icon-color mui-icon mui-icon-left-nav mui-pull-right"></a>-->
        <h1 class="mui-title icon-color">CrossChex</h1>
    </header>
    <!--content-->
    <div class="mui-content mui-scroll-wrapper">
    	<div class="mui-scroll">
    		<div id="CrossChexPage" class="mui-slider-group">
        <div class="mui-card anviz-card-intelli">
            <div class="mui-card-header mui-card-media">
                <span class="anviz-update-icon update-crosschex anviz-icon-size-intellli update-crosschex-color"></span>
                <div class="mui-media-body anviz-media-body-intelli">CrossChex
                    <p>Time Attendance and Access Control Management System.</p>
                </div>
            </div>
            <div class="mui-card-content anviz-card-intelli">
                CrossChex is an intelligent management system of access control and time attendance devices, which is
                applicable to all Anviz access controls and time attendances. The user-friendly and interactive design
                makes this system very easy to operate, the powerful function makes this system realize the management
                of department, staff, shift, payroll, access authority, and exports different time attendance and access
                control reports, satisfying different time attendance and access control requirements in different
                complicated environments.
            </div>
        </div>
        <div class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12 js-label">
            <h5 class="anviz-padded">Features</h5>
        </div>
        <div class="mui-content-padded">
            <img class="anviz-cross-img"
                 src="<?php echo $assetsUrl;?>/img/security_one/themb_crosschex_main.webp" data-preview-src=""
                 data-preview-group="1"/>
        </div>
        <ul class="mui-table-view">
            <li class="mui-table-view-cell">
                <div class="mui-media-body">Manages departments and employees</div>
            </li>
            <li class="mui-table-view-cell">
                <div class="mui-media-body">Manages devices and access restrictions</div>
            </li>
            <li class="mui-table-view-cell">
                <div class="mui-media-body">Manages schedules, shifts and reports</div>
            </li>
            <li class="mui-table-view-cell">
                <div class="mui-media-body">Rules out unauthorized overtime</div>
            </li>
            <li class="mui-table-view-cell">
                <div class="mui-media-body">Imports/exports data in various file formats, such as CSV, XLS/XLSX, PDF,
                    etc.
                </div>
            </li>
            <li class="mui-table-view-cell">
                <div class="mui-media-body">Exports attendance reports to 3rd party accounting/payroll software</div>
            </li>
            <li class="mui-table-view-cell">
                <div class="mui-media-body">Sends reports via email</div>
            </li>
            <li class="mui-table-view-cell">
                <div class="mui-media-body">Connect to SQL database or Access database for easy installation and
                    maintenance
                </div>
            </li>
            <li class="mui-table-view-cell" style="border-bottom: 0;">
                <div class="mui-media-body">*Support all Anviz Biometric/RFID access control and time&attendance
                    devices
                </div>
            </li>
        </ul>
        <div class="mui-content-padded">
            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/icon/1.gif" data-preview-src="" data-preview-group="1"/>
        </div>
        <div class="mui-content-padded">
            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/icon/2.gif" data-preview-src="" data-preview-group="1"/>
        </div>
        <div class="mui-content-padded">
            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/icon/3.gif" data-preview-src="" data-preview-group="1"/>
        </div>
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">System Configuration</a>
                <div class="mui-collapse-content">
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-media-body">Functionalities</div>
                            <p>Featuring a user-friendly GUI, AIM CrossChex provides feature-rich time and attendance
                                management experience, meeting all needs of employee attendance tracking and access
                                restriction of small and medium-sized businesses that house employees in a centralized
                                workplace.</p>
                        </div>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschex_01.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                                <p class="anviz-cross-p">Main Page</p>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschex_02.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                                <p class="anviz-cross-p">Software Guide</p>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschex_03.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                                <p class="anviz-cross-p">Device Management</p>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschex_04.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                                <p class="anviz-cross-p">Scheduling Management</p>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschex_05.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                                <p class="anviz-cross-p">Attendance Staistics</p>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschex_06.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                                <p class="anviz-cross-p">Oline FAQ</p>
                            </div>
                        </div>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-media-body">System Configuration</div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschextoph_desktop.png"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">Professional</a>
                <div class="mui-collapse-content">
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-media-body">Functionalities</div>
                            <p>For organizations with multiple locations/facilities, AIM CrossChex enables on-line
                                employee scheduling and time tracking. It enhances the convenience and flexibility of
                                employers to manage the timekeeping, scheduling, and attendance reporting tasks.</p>
                        </div>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschexenterprise_demo_1.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschexenterprise_demo_2.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschexenterprise_demo_3.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                        </div>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-media-body">Compatible with a variety of web browsers: IE, Chrome, Firefox,
                                Safari
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschexenterprise_support.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                        </div>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-media-body">System Configuration</div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschextoph_enterprise.png"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">Cloud</a>
                <div class="mui-collapse-content">
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-media-body">Functionalities</div>
                            <p>It can fill the needs of all kinds of enterprises, without limitation of cross-regional
                                business. Convenient deployment, centralized management attendance, wide-ranging
                                statistics report and a third-party system integration. All staff can easily apply for a
                                leave and check their attendance.</p>
                        </div>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschexcloud_1.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschexcloud_2.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschexcloud_3.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                        </div>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-media-body">Compatible with a variety of web browsers: IE, Chrome, Firefox,
                                Safari
                            </div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschexenterprise_support.jpg"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                        </div>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <div class="mui-media-body">System Configuration</div>
                            <div class="mui-content-padded">
                                <img class="anviz-cross-img"
                                     src="<?php echo $assetsUrl;?>/img/security_one/crosschextop_cloud.webp"
                                     data-preview-src="" data-preview-group="1" style="max-width: 100%;"/>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    	</div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    mui.init();
    mui.previewImage();
    mui.ready(function () {
        loadingProductor();
    });
	mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false //是否显示滚动条
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
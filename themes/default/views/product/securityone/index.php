<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/5
 * Time: 15:02
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
</style>
<?php $this->endClip(); ?>
<div class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">SecurityOne</h1>
    </header>
    <!--content-->
    <div class="mui-content mui-scroll-wrapper">
    	<div class="mui-scroll">
    		<div id="SecurityOne" class="mui-slider-group">
        <div class="mui-card anviz-card-intelli">
            <div class="mui-card-header mui-card-media">
                <span class="anviz-update-icon update-sercurityone update-sercurityone-color anviz-icon-size-intellli"></span>
                <div class="mui-media-body anviz-media-body-intelli">SecurityONE
                    <p>Intelligent Security System</p>
                </div>
            </div>
            <div class="mui-content-padded">
                <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Clients.webp" data-preview-src="" data-preview-group="1" />
            </div>
            <div class="mui-card-content anviz-card-intelli">
                SecurityONE is an integration solution designed for small to medium-sized enterprises, including access control, video surveillance and alarm integration. It applies to IT, manufacturing, retail, finance, government, education and health care, to name a few. SecurityONE focuses on solving all kinds of security problems within and surrounding the building, to enhance the ability to monitor and prevent crime, and ensure a safe environment for enterprise property and employees. Different from the traditional way of managing access, SecurityONE access control system can intelligently recognize entrance, exit, force open and other kinds of states. SecurityONE can link with video to extract scene images, intelligent analysis, cloud upload, to realize the data analysis of tracking path, access recording and other data analysis. SecurityONE video surveillance supports intelligent recognition, intelligent event analysis, and video upload of event screenshots to the cloud, remote surveillance by a remote client and emergency alarm linkage. The Cloud Storage can meet your needs anytime, anywhere. SecurityONE will continue to be committed to provide you with a one-stop service to open the door to the new world of security.
            </div>
        </div>
        <div id="slider" class="mui-slider">
            <div id="nav" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                <div class="mui-scroll scroll-nav">
                    <a class="js-anviz-tab mui-control-item mui-active" href="#item1mobile">
                        Why SecurityONE
                    </a>
                    <a class="js-anviz-tab mui-control-item" href="#item2mobile">
                        Feature
                    </a>
                    <a class="js-anviz-tab mui-control-item" href="#item3mobile">
                        Configuration
                    </a>
                    <a class="js-anviz-tab mui-control-item" href="#item4mobile">
                        Compatible Devices
                    </a>
                    <a class="js-anviz-tab mui-control-item" href="#item5mobile">
                        System Works
                    </a>
                </div>
            </div>
            <div id="item1mobile mui-scroll" class="anviz-slider-box mui-slider-item mui-active js-slider">
                <div class="mui-content-padded">
                    <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/banner/banner_1.png" data-preview-src="" data-preview-group="1" />
                </div>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">What is SecurityONE?</div>
                        <p>All In One Security SecurityONE is an integration solution designed for small to medium-sized enterprises, including access control, video surveillance and alarm integration. It applies to IT, manufacturing, retail, finance, government, education and health care, to name a few. SecurityONE focuses on solving all kinds of security problems within and surrounding the building, to enhance the ability to monitor and prevent crime, and ensure a safe environment for enterprise property and employees. Different from the traditional way of managing access, SecurityONE access control system can intelligently recognize entrance, exit, force open and other kinds of states. SecurityONE can link with video to extract scene images, intelligent analysis, cloud upload, to realize the data analysis of tracking path, access recording and other data analysis. SecurityONE video surveillance supports intelligent recognition, intelligent event analysis, and video upload of event screenshots to the cloud, remote surveillance by a remote client and emergency alarm linkage. The Cloud Storage can meet your needs anytime, anywhere. SecurityONE will continue to be committed to provide you with a one-stop service to open the door to the new world of security. See how the system works.</p>
                    </li>
                </ul>
                <ul class="why-security mui-table-view">
                    <div class="mui-media-body">Why SecurityONE?</div>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-HighSecurity icon-securityOne-size"></span>
                        <p>High Security</p>
                        <div class="mui-media-body">Intelligent license plate recognition and video linkage at the entrance and exit and intelligent video surveillance in the scope of the building perimeter ensure alarm linkage. Visitor intelligent management, visitor Identity Recognition and recording ensure to link with the gate. Predefined linkage to office and arrange security according to time.</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-EasyInstallation icon-securityOne-size"></span>
                        <p>Easy Installation</p>
                        <div class="mui-media-body">By using intelligent video that recognizes the population density in the area or wireless sensor to identify the number of persons in the building, SecurityONE can Intelligently judge the environment demand for light, air condition, heating and fresh air within the area. SecurityONE supports intelligent adjustment of various regional types of electrical switches to achieve a green office.</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-RemoteSecurity icon-securityOne-size"></span>
                        <p>Remote Security</p>
                        <div class="mui-media-body">With the highly intuitive software interface, map site selection operation, click and view, SecurityONE can greatly reduce the complexity of equipment searching. With event rating of the client and emergency warning popup, With distributed cloud deployment, the system can be extended to multiple branch office due to simple equipment installation. The cloud can monitor device status, and pass back the scene images, easy to maintain. It supports Web/IOS/Android.</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-LowerCost icon-securityOne-size"></span>
                        <p>Lower Cost</p>
                        <div class="mui-media-body">Free from server, machine room, maintenance in the preliminary stage, and extension of the system can be seamless increase in scale in the later stage to avoid loss in investment. Server software can exempt from authorization by windows and no dongles, which further lower the investment and the difficulty of implementation. Client based on Web browser integrates with subsystem like access control, video, alarm, energy consumption which reduces the difficulty in maintenance and the human resources effort.</div>
                    </li>
                </ul>
            </div>
            <div id="item2mobile mui-scroll" class="anviz-slider-box mui-slider-item mui-active js-slider" style="display: none;">
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">SecurityONE System</div>
                        <p>All In One Security Since traditional security technology was not designed to effectively deal with extremely large data, nor manage the massive video files and intelligent analysis of the present, the cloud based security platform has become a necessity. SecurityONE, based on a powerful cloud server, is suitable for all kinds of network environments and can get functional equipment information to the cloud anytime and from anywhere. SecurityONE can search, store and manage video data in the cloud. With distributed cloud deployment, the SecurityONE system can be expanded to multiple branch offices as required with ease. Real-time data analysis, processing and response and intelligent video analysis can significantly reduce the acquisition cost of hardware and software.</p>
                    </li>
                </ul>
                <ul class="why-security mui-table-view">
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Workonsite icon-securityOne-size"></span>
                        <p>Work onsite</p>
                        <div class="mui-row">
                            <div class="mui-col-sm-1 mui-col-xs-12">
                                <div class="why-red"></div>
                            </div>
                            <div class="mui-col-sm-1 mui-col-xs-12">
                                <div class="why-blue"></div>
                            </div>
                        </div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/banner/securityONE-system.png" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">
                            <a href="http://www.anviz.com/page/securityone.html"><button class="mui-btn mui-btn-primary">Learn more</button></a>
                        </div>
                    </li>
                </ul>
                <ul class="why-security mui-table-view">
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Workincloud icon-securityOne-size"></span>
                        <p>Work in cloud</p>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/cloud.png" data-preview-src="" data-preview-group="1" />
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/sensor.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Alarm</div>
                        <p>Alarm Alarm module is compatible with a variety of alarm input and output devices, which can match with the mainstream alarm hosts on the market. A variety of alarm inputs can effectively protect your building and enhance the accuracy of the alarm by linking with other subsystems.</p>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/video.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Video Surveillance</div>
                        <p>Video Surveillance subsystem includes IPCs and NVRs. IPC is the eye of the SecurityONE system which is responsible for the I/O of video. IPC can be connected to access control and IO alarm, and take snapshot and video segment to server when event or alarm occurs. NVR is mainly responsible for the storage of video on the local disk.</p>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/p7+wlock.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/m5_sco11.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/ultraMatch+Sc011.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Access control</div>
                        <p>SecurityONE access control subsystem manages the access controller function for access rules of personnel, management time, monitoring of event & alarm and image capture with IPCs for abnormal or illegal door opening. Using the IP network, it can achieve flexible and complex access control area logic, such as anti-passback, multi door interlock or other open logic.</p>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Security_Box.png" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Security Box</div>
                        <p>SecurityONE is the host of the control site, which connects and manages access control equipment, IO switches, video products and alarm hosts. Each Security Box can connect up to 32 doors, 64 cameras, 32 IOs. With distributed cloud deployment, the number of Security Box can be arbitrarily matched with the number of sites. Each Security Box can act independently and when it runs into an offline emergency, the Box can record event and event log.</p>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/colud.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Cloud server</div>
                        <p>The Cloud server is the place where all the information is stored. Each system must be equipped with an information storage server. The powerful Cloud server computing ability can effectively deal with the massive data, manage enormous video data files and intelligent analysis. This Cloud server is suitable for all kinds of network environments and can get functional equipment information from the cloud anytime, anywhere.</p>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Clients.webp" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Clients</div>
                        <p>SecurityONE client is Web browser based, with functions including, site selection, click and live view, emergency popup, video playback, alarm push sends, forward and share. The Mobile client supports IOS/Android systems with the functions of remote monitoring and operation.</p>
                    </li>
                </ul>
            </div>
            <div id="item3mobile mui-scroll" class="anviz-slider-box mui-slider-item mui-active js-slider" style="display: none;">
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">High Security</div>
                        <p>Intelligent license plate recognition and video linkage at the entrance and exit and intelligent video surveillance in the scope of the building perimeter ensure alarm linkage. Visitor intelligent management, visitor Identity Recognition and recording ensure to link with the gate. Predefined linkage to office and arrange security according to time.</p>
                    </li>
                </ul>
                <ul class="why-security mui-table-view">
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-EntranceandExit icon-securityOne-size"></span>
                        <p>Entrance and Exit</p>
                        <div class="mui-media-body">Vehicle Management</div>
                        <div class="mui-media-body">Video Linkage</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Gate.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Perimeter icon-securityOne-size"></span>
                        <p>Perimeter</p>
                        <div class="mui-media-body">Intelligent Video</div>
                        <div class="mui-media-body">Alarm Linkage</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Perimeter.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Gate icon-securityOne-size"></span>
                        <p>Entrance and Exit</p>
                        <div class="mui-media-body">Visitor Management</div>
                        <div class="mui-media-body">Gate Linkage</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Gate.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Office icon-securityOne-size"></span>
                        <p>Office</p>
                        <div class="mui-media-body">Predefined Linkage</div>
                        <div class="mui-media-body">Period Security Deployment</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Perimeter.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Energy efficiency</div>
                        <p>By using intelligent video that recognizes the population density in the area or wireless sensor to identify the number of persons in the building, SecurityONE can Intelligently judge the environment demand for light, air condition, heating and fresh air within the area. SecurityONE supports intelligent adjustment of various regional types of electrical switches to achieve a green office.</p>
                    </li>
                </ul>
                <ul class="why-security mui-table-view">
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Peopleawareness icon-securityOne-size"></span>
                        <p>People awareness</p>
                        <div class="mui-media-body">Wireless sensor Video analysis</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Temperaturecontrol icon-securityOne-size"></span>
                        <p>Temperature control</p>
                        <div class="mui-media-body">Intelligent temperature control</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Lightcontrol icon-securityOne-size"></span>
                        <p>Light control</p>
                        <div class="mui-media-body">Intelligent switch</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Switch icon-securityOne-size"></span>
                        <p>Switch</p>
                        <div class="mui-media-body">Water dispenser Hot water</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Energy-efficiency.jpg" data-preview-src="" data-preview-group="1" />
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Convenience</div>
                        <p>With the highly intuitive software interface, map site selection operation, click and view, SecurityONE can greatly reduce the complexity of equipment searching. With event rating of the client and emergency warning popup, With distributed cloud deployment, the system can be extended to multiple branch office due to simple equipment installation. The cloud can monitor device status, and pass back the scene images, easy to maintain. It supports Web/IOS/Android.</p>
                    </li>
                </ul>
                <ul class="why-security mui-table-view">
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Clouddeployment icon-securityOne-size"></span>
                        <p>Cloud deployment</p>
                        <div class="mui-media-body">Multi-point deployment Spot controller Cloud maintenance</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Mapoperation icon-securityOne-size"></span>
                        <p>Map operation</p>
                        <div class="mui-media-body">Cdivck and view Warning popup Device Monitor</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Client icon-securityOne-size"></span>
                        <p>Cdivent</p>
                        <div class="mui-media-body">Web，mobile phone IOS，Android</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Alarmpush icon-securityOne-size"></span>
                        <p>Alarm push</p>
                        <div class="mui-media-body">Picture and text combination Remote Operation and quick response Forward and share</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Convenience.webp" data-preview-src="" data-preview-group="1" />
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Low Cost</div>
                        <p>Free from server, machine room, maintenance in the preliminary stage, and extension of the system can be seamless increase in scale in the later stage to avoid loss in investment. Server software can exempt from authorization by windows and no dongles, which further lower the investment and the difficulty of implementation. Client based on Web browser integrates with subsystem like access control, video, alarm, energy consumption which reduces the difficulty in maintenance and the human resources effort.</p>
                    </li>
                </ul>
                <ul class="why-security mui-table-view">
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Lowhardwarecost icon-securityOne-size"></span>
                        <p>Low hardware cost</p>
                        <div class="mui-media-body">No need for server No need for Machine room No need to maintain</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-Lowsoftwarecost icon-securityOne-size"></span>
                        <p>Low software cost</p>
                        <div class="mui-media-body">No need for windows authorization No need for Software Dongle Web，Easy to Deploy</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-ReduceSecurityGuar1 icon-securityOne-size"></span>
                        <p>Low maintenance cost</p>
                        <div class="mui-media-body">Remote maintenance Remote diagnosis</div>
                    </li>
                    <li class="mui-table-view-cell">
                        <span class="security-iconfont icon-ReduceSecurityGuar icon-securityOne-size"></span>
                        <p>Reduce Security Guard</p>
                        <div class="mui-media-body">Reduce IT</div>
                    </li>
                </ul>
            </div>
            <div id="item4mobile mui-scroll" class="anviz-slider-box mui-slider-item mui-active js-slider" style="display: none;">
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Security Products</div>
                        <p>Intelligent license plate recognition and video linkage at the entrance and exit and intelligent video surveillance in the scope of the building perimeter ensure alarm linkage.</p>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Security Box</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Security_Box.png" data-preview-src="" data-preview-group="1" />
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Surveillance / Recoder</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/EverStore-01.png" data-preview-src="" data-preview-group="1" />
                            <p style="text-align: center;">EverStore</p>
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Surveillance / Camera</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/ShotView-01.png" data-preview-src="" data-preview-group="1" />
                            <p style="text-align: center;">ShotView</p>
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Access Control / Interior door</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/P7_WLock.png" data-preview-src="" data-preview-group="1" />
                            <p style="text-align: center;">P7+WLock</p>
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Access Control / Exterior door</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/m5_sco11.jpg" data-preview-src="" data-preview-group="1" />
                            <p style="text-align: center;">M5+SC011</p>
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Access Control / Important door</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/UltraMatch_SC011.png" data-preview-src="" data-preview-group="1" />
                            <p style="text-align: center;">UltraMatch+SC011</p>
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Alarm / Alarm host</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Alarm_host-01.png" data-preview-src="" data-preview-group="1" />
                            <p style="text-align: center;">Alarm</p>
                        </div>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">Alarm / Sensor</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/PIR_Sensor-01.png" data-preview-src="" data-preview-group="1" />
                            <p style="text-align: center;">PIR Sensor</p>
                        </div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Smoke_Sensor-01.png" data-preview-src="" data-preview-group="1" />
                            <p style="text-align: center;">Smoke Sensor</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="item5mobile mui-scroll" class="anviz-slider-box mui-slider-item mui-active js-slider" style="display: none;">
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body">How the SecurityONE System Works</div>
                        <p>Below you will find an in-depth understanding to SecurityONE, showing you in detail how SecurityONE seamlessly connects system equipment, subsystems to achieve intelligent integration and how SecurityONE provides you with a one-stop, full range of services.</p>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <div class="mui-media-body" style="text-align: center;margin-bottom: 15px;">Access Control</div>
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/IP-Camera.png" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">IP Camera & NVR Integration</div>
                        <p>Real-time video monitoring</p>
                        <p>Still image capturing</p>
                        <p>Control of PTZ cameras</p>
                        <p>Video log search through NVR</p>
                    </li>
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Visual-Map-Interface.png" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Visual Map Interface</div>
                        <p>Graphical representation of the system</p>
                        <p>Device/door setting modification from the map</p>
                        <p>Real-time monitoring on the map</p>
                        <p>Event notifications in graphic icons</p>
                        <p>Monitoring interface for doors and zones</p>
                    </li>
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Leave-Management.png" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Shift, Holiday & Leave Management</div>
                        <p>Daily and weekly cycle scheduling</p>
                        <p>Multiple shift rules per user</p>
                        <p>Holiday Schedule configurable per group</p>
                        <p>Leave schedule configurable per user</p>
                    </li>
                    <li class="mui-table-view-cell">
                        <div class="mui-content-padded">
                            <img class="anviz-cross-img" src="<?php echo $assetsUrl;?>/img/security_one/Zone-Management.png" data-preview-src="" data-preview-group="1" />
                        </div>
                        <div class="mui-media-body">Zone Management</div>
                        <p>Fire alarm, alarm, anti-passback, entrance limit,</p>
                        <p>interlock, muster and access zones</p>
                        <p>Controls up to 32 advanced zones</p>
                        <p>Customizable alarm settings for each zones</p>
                        <p>View event log for selected zones</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    	</div>
    </div>
</div>
<script type="text/javascript">
    mui.init({});
    mui.previewImage();
    mui.ready(function() {
        //loading...
        loadingProductor();
        //切换
        tabName();
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
        document.onreadystatechange = function() {
            console.log(document.readyState);
            var status = document.readyState
            if(status == 'complete') {
                $('.anviz-loading').fadeOut();
            }
        }
    }

    function tabName() {
        var index = '';
        var sliderBox = jQuery('#slider').find('.anviz-slider-box');
        jQuery('#nav .mui-scroll a').on('tap', function() {
            index = jQuery(this).index();
            jQuery('.js-slider').eq(index).show(200).siblings('.js-slider').hide();
        })
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

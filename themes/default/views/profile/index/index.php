<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 10:53
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/me/me.js?<?php echo time();?>"></script>
<?php $this->endClip(); ?>
<div class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a id="homeBack" class="iconfont icon-home icon-color mui-icon mui-icon-left-nav mui-pull-right"
           style="display: none;"></a>
        <h1 id="homeTitle" class="mui-title icon-color">ME</h1>
        <a href="<?php echo Yii::app()->createUrl('login/logoff');?>" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">LogOut</a>
    </header>
    <div class="mui-slider-group anviz-content mui-scroll-wrapper">
    	<div class="mui-scroll">
    		<!--ME-->
	        <div id="514654654" class="mui-slider-item anviz-content">
	            <div class="anviz-user-info">
	                <!--<div class="anviz-header">
	                    <img src="../../../../../img/logo/default-logo.png"/>
	                </div>-->
	                <div class="mui-media-body anviz-user-name"><?php echo ToolHelper::contactName($thisMember['firstname'], $thisMember['lastname']); ?></div>
	                <div class="mui-media-body anviz-user-email"><?php echo $thisMember['email']; ?></div>
	                <button id="changeInfoBtn" type="button" class="mui-btn mui-btn-primary mui-btn-outlined"
	                        style="margin-top: 20px;"><span class="mui-icon mui-icon-compose"></span>&nbsp;edit
	                </button>
	            </div>
	            <!--label-->
	            <ul class="mui-table-view mui-grid-view mui-grid-9">
	                <li class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12">
	                    <h5 class="anviz-padded">Setting</h5>
	                </li>
	            </ul>
	            <!--list-->
	            <ul class="mui-table-view anviz-me-basic">
	                <li id="password" class="mui-table-view-cell anviz-tabel-view-cell">
	                    <a class="mui-navigate-right anviz-me-list-title">
	                        Change password
	                    </a>
	                </li>
	                <li id="changeEmail" class="mui-table-view-cell anviz-tabel-view-cell">
	                    <a class="mui-navigate-right">
	                        Change email
	                    </a>
	                </li>
	            </ul>
	            <!--label-->
	            <ul class="mui-table-view mui-grid-view mui-grid-9">
	                <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
	                    <h5 class="anviz-padded">Feedback</h5>
	                </li>
	                <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6"></li>
	            </ul>
	            <!--list-->
	            <ul class="mui-table-view anviz-me-list anviz-me-senior">
	                <li id="advice" class="mui-table-view-cell anviz-tabel-view-cell">
	                    <a class="mui-navigate-right">
	                        Advice
	                    </a>
	                </li>
	                <li id="caseStudies" class="mui-table-view-cell anviz-tabel-view-cell">
	                    <a class="mui-navigate-right">
	                        Case studies
	                    </a>
	                </li>
	                <li id="successStories" class="mui-table-view-cell anviz-tabel-view-cell">
	                    <a class="mui-navigate-right">
	                        Success stories
	                    </a>
	                </li>
	            </ul>
	            <!--label-->
	            <!--<ul class="mui-table-view mui-grid-view mui-grid-9">
	                <li class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12">
	                    <h5 class="anviz-padded">Download List</h5>
	                </li>
	            </ul>
	            <ul class="mui-table-view anviz-me-list anviz-me-senior">
	            	<li id="downloadList" class="mui-table-view-cell anviz-tabel-view-cell" style="margin-bottom: 50px;">
	                    <a class="mui-navigate-right">
	                        Download files
	                    </a>
	                </li>
	            </ul>-->
	        </div>
    	</div>
    </div>

    <?php $this->Widget('application.widgets.BlockWidget', array(
        'block' => 'bottom',
        'module' => $this->module,
        'controller' => $this->controller,
    )); ?>
</div>
<script type="text/javascript" charset="utf-8">
    mui.init({});
    mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false
    });
</script>

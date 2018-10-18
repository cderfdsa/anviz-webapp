<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/10/16
 * Time: 17:28
 * FileName: view.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/home/new_home.js?<?php echo time(); ?>"></script>
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59c1d45ab7040a0012c1f32e&product=inline-share-buttons"></script>
<?php $this->endClip(); ?>
<div class="mui-content" style="max-width: 100%;">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 id="homeTitle" class="mui-title icon-color"><?php echo $news['type'];?></h1>
    </header>
    <!--content-->
    <div id="newsWarp" class="">
        <div class="mui-card">
            <div class="mui-card-header mui-card-media">
                <img src="<?php echo $this->assetsUrl; ?>/img/banner/new_home/Anviz-News.jpg" alt="" />
                <div class="mui-media-body">
                    <?php echo $news['title'];?>
                    <p>Release date: <?php echo $news['publictime'];?></p>
                </div>
            </div>
        </div>
        <div class="mui-card">
            <div class="mui-card-content">
                <?php echo $news['content'];?>
            </div>
        </div>
    </div>
    <div class="mui-card">
	    <div class="mui-card-content">
	        <div class="mui-card-content-inner">
	            <!--分享按钮-->
	            <div class="sharethis-inline-share-buttons"></div>
	        </div>
	    </div>
	</div>
</div>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.zoom.js"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.previewimage.js"></script>
<script type="text/javascript">
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    /*mui('#newsWarp').scroll({
        deceleration: 0.0005,
        indicators: false //是否显示滚动条
    });*/
    mui.previewImage();
    mui.ready(function(){
        loadingProductor();
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
</script>
<style>
    /*强制去除分享插件的logo*/
    .st-logo {
        display: none;
    }
    /*强制给添加滚动*/
    .st-btns {
        overflow: scroll;
        bottom: 10px;
    }
    /*强制隐藏底部分享按钮*/
    #st-3.st-left {
        left: 0px;
        display: none;
    }
    body {
        padding-bottom: 0px;
    }
</style>
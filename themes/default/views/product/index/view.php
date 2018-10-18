<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/15
 * Time: 12:12
 * FileName: view.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script type="text/javascript">
    var productId = <?php echo $product['productorId'];?>;
    var bannerList = <?php echo CJSON::encode($pictures);?>;
</script>
<!--<script src="<?php echo $this->assetsUrl; ?>/js/pub/public.js"></script>-->
<script src="<?php echo $this->assetsUrl; ?>/js/productor/banner.js"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/slideDown.js"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/productor/proPageDes.js"></script>
<!--shareThis-->
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59c1d45ab7040a0012c1f32e&product=inline-share-buttons"></script>

<style>
    #demoUl {
        margin-left: -46px;
    }

    .mui-slider .mui-slider-group .mui-slider-item img {
        /*width: 300px;
        height: 300px;*/
        display: block;
        padding: 20px;
        margin: 0 auto;
        max-width: 100%;
        max-height: 100%;
    }

    .mui-card-content p img {
        max-width: 100%;
    }
    .mui-slider .mui-slider-group .mui-slider-item img{
    	background: #fff;
    }
    #slider .mui-slider-group .mui-slider-item a img, #slider .mui-slider-group .mui-slider-item img{
    	background: transparent;
    }
</style>
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
<div class="mui-content" id="proPage">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color"><?php echo $product['productModel']; ?></h1>
    </header>
    <!--content 去掉 anviz-scroll-wrapper-->
    <div class="mui-scroll-wrapper">
        <div class="mui-scroll js-scroll">
            <div class="mui-slider-group roleRight anviz-animation">
                <div class="mui-slider-item mui-control-content mui-active">
                    <!--banner-->
                    <div id="slider" class="mui-slider">
                        <div class="mui-slider-group mui-slider-loop js-group">
                            <div class="mui-slider-item mui-slider-item-duplicate js-first-slider"></div>
                            <div class="mui-slider-item mui-slider-item-duplicate js-last-slider"></div>
                        </div>
                        <div class="mui-slider-indicator js-indicator"></div>
                    </div>
                </div>
                <!--title-->
                <ul class="mui-table-view anviz-prodctor-view-ul">
                    <li class="mui-table-view-cell mui-media anviz-title-info">
                        <img src="../../img/icon/share.png"
                             class="mui-media-object anviz-midia-object mui-pull-right anviz-share-icon"/>
                        <div class="anviz-des-warp">
	                        	<div class="mui-media-body anviz-pro-name"><?php echo $product['productModel']; ?></div>
	                        <p class="anviz-pro-des"><?php echo $product['productName']; ?></p>
                        </div>
                    </li>
                </ul>
                <!--share list-->
                <ul class="mui-table-view anviz-share-warper" style="display: none;">
                    <div class="mui-table-view-cell anviz-share-list">
                        <!--分享按钮-->
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </ul>
            </div>

            <!--<div class="anviz-slider-box">
                <div class="nav mui-scroll-wrapper">
                    <a href="#pageOne" id="itemOne" class="itemBtn itemBtn-avtive">Describe</a>
                    <a href="#pageTwo" id="itemTwo" class="itemBtn">Featuer</a>
                    <a href="#pageThree" id="itemThree" class="itemBtn">Parameter</a>
                    <a href="#pageFour" id="itemFour" class="itemBtn">Application</a>
                    <a href="#pageFive" id="itemFive" class="itemBtn">Download</a>
                </div>
            </div>-->

            <div id="pageOne" class="full-page">
                <!--label-->
                <div class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12 js-label"
                     style="margin-top: 10px;">
                    <h5 class="anviz-padded">Description</h5>
                </div>
                <div class="product-describe">
                    <?php if (!empty($product['productorModuleIcon'])): ?>
                        <div class="mui-row">
                            <?php foreach ($product['productorModuleIcon'] as $icon): ?>
                                <div class="mui-col-sm-4 mui-col-xs-4 mui-col-xs-6 mui-col-xs-10">
                                    <li class="anviz-tabel-view-cell">
                                        <a class="<?php echo $icon; ?>"></a>
                                    </li>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="product-describe-info">
                    <div class="mui-row">
                        <div class="mui-table-view">
                            <div class="mui-table-view-cell">
                                <div class="mui-media-body describe-info" style="width: 100%;">
                                    <?php echo $product['productorDesc']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($product['productorFeature'])): ?>
                <div id="pageTwo" class="full-page">
                    <!--label-->
                    <div class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12 js-label">
                        <h5 class="anviz-padded">Feature</h5>
                    </div>
                    <div class="mui-card anviz-card">
                        <div class="mui-card-content anviz-card-content">
                            <?php echo $product['productorFeature']; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($product['productorParameter'])): ?>
                <div id="pageThree" class="full-page">
                    <div class="product-parameter">
                        <?php foreach ($product['productorParameter'] as $label => $parameters): ?>
                            <div class="item js-param-warp">
                                <!--label-->
                                <div class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6 js-label">
                                    <h5 class="anviz-padded"><?php echo $label; ?></h5>
                                </div>
                                <!--params-->
                                <ul class="mui-table-view js-params">
                                    <?php foreach ($parameters as $parameter): ?>
                                        <li class="mui-table-view-cell">
                                            <div class="mui-media-body js-param-name"><?php echo strip_tags($parameter[0]); ?></div>
                                            <p class="anviz-ellipsis js-param-info"><?php echo strip_tags($parameter[1]); ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($product['productorApplication'])):?>
            <div id="pageFour" class="full-page">
                <!--label-->
                <div class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12 js-label">
                    <h5 class="anviz-padded">Application</h5>
                </div>
                <div class="mui-card anviz-card">
                    <?php echo $product['productorApplication']; ?>
                </div>
            </div>
            <?php endif;?>
            <div id="pageFive" class="full-page">
                <!--label-->
                <ul class="mui-table-view mui-grid-view mui-grid-9">
                    <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                        <h5 class="anviz-padded">Document list</h5>
                    </li>
                </ul>
                <ul id="productorDownloadWarp" class="mui-table-view dowload-warp"></ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    mui.init();
    mui.previewImage();
    mui('.mui-scroll-wrapper').scroll({
        deceleration: 0.0005,
        indicators: false //是否显示滚动条
    });

    mui('body').scroll();
    mui.previewImage();
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
</style>

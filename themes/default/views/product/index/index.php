<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/11
 * Time: 13:28
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/tab_bar.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/productor/productor.js?<?php echo time();?>"></script>
<?php $this->endClip(); ?>
<div class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a id="homeBack" class="iconfont icon-home icon-color mui-icon mui-icon-left-nav mui-pull-right" style="display: none;"></a>
        <h1 id="homeTitle" class="mui-title icon-color">PRODUCTS</h1>
    </header>
    <!--products-->
    <div id="productorContent" class="mui-slider-group anviz-content js-container mui-scroll-wrapper">
    	<div class="mui-scroll">
    		<div id="products" class="mui-slider-item anviz-content">
	            <!--label-->
	            <ul class="mui-table-view mui-grid-view mui-grid-9">
	                <li class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12">
	                    <h5 class="anviz-padded">Product</h5>
	                </li>
	            </ul>
	            <!--产品列表-->
	            <ul id="productList" class="mui-table-view mui-table-view-chevron js-productor">
	                <li class="mui-table-view-cell mui-media js-media">
	                    <div class="pro-pannel">
	                        <!--<img class="mui-media-object mui-pull-left js-img js-pro-img" src="">-->
	                        <div class="mui-media-object mui-pull-left js-pro-font">
	                        	<span class="anviz-productor-font"></span>
	                        </div>
	                        <div class="mui-media-body js-media-body">
	                            <p class="anviz-ellipsis js-des js-pro-des"></p>
	                        </div>
	                    </div>
	                </li>
	            </ul>
	            <!--label-->
	            <ul class="mui-table-view mui-grid-view mui-grid-9">
	                <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
	                    <h5 class="anviz-padded">Solution</h5>
	                </li>
	                <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6"></li>
	            </ul>
	            <ul id="solutionList" class="mui-table-view mui-table-view-chevron js-solution">
	                <li id="SecurityONE" class="mui-table-view-cell mui-media js-media">
	                    <a href="javascript:;">
	                        <!--<img class="mui-media-object mui-pull-left js-img js-soul-img" src="">-->
	                        <div class="mui-media-object mui-pull-left js-pro-font">
	                        	<span class="anviz-productor-font"></span>
	                        </div>	
	                        <div class="mui-media-body js-media-body">
	                            <p class="anviz-ellipsis js-des js-solu-des"></p>
	                        </div>
	                    </a>
	                </li>
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
<script type="text/javascript" charset="utf-8">
    mui.init({});
    mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false
    });
</script>
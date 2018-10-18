<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/28
 * Time: 14:20
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/slideDown.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/support/new_faq.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/public.js?<?php echo time();?>"></script>
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
<div class="mui-content" id="faqPage">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <!--<button id="searchFaqBtn" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Search</button>-->
        <a id="searchIcon" class="iconfont icon-search icon-color mui-icon mui-icon-left-nav mui-pull-right"></a>
      	<a id="closeIcon" class="icon-color mui-icon mui-icon-closeempty mui-pull-right" style="display: none;"></a>
        <h1 class="mui-title icon-color"></h1>
    </header>
    <!--search content-->
    <div id="showSearchWarpContent" class="anviz-search-content" style="display: none;">
		<!--search-->
        <div class="mui-input-row mui-search anviz-slider-select">
            <div class="mui-input-group">
                <div class="mui-input-row anviz-advice-country">
                    <label>Product</label>
                    <select id="proSelected" class="anviz-select js-pro-select">
                        <option value="0">--None--</option>
                        <?php foreach($productCategories as $row):?>
                            <optgroup label="<?php echo $row['name'];?>">
                                <?php foreach($row['children'] as $col):?>
                                    <option value="<?php echo $col['id'];?>"><?php echo $col['name'];?></option>
                                <?php endforeach;?>
                            </optgroup>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mui-input-row anviz-advice-model">
                    <label>Model</label>
                    <!-- product/ajax/select.html?category_id=1  -->
                    <select id="modeSelected" class="anviz-select js-model-select">
                        <option value="0">--None--</option>
                    </select>
                </div>
            </div>
        </div>
         <span class="anviz-search-info">Select product category for query</span>
        <button id="searchBtn" class="icon-color mui-btn mui-btn-blue">Search</button>
	</div>
    <!--content-->
    <div class="mui-slider-group">
        <div id="slider" class="mui-slider">
            <div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                <div class="mui-scroll scroll-nav">
                    <a class="js-anviz-tab mui-control-item mui-active" href="<?php echo Yii::app()->createUrl('faq/ajax');?>">
                        All
                    </a>
                    <?php foreach($faqCategories as $row):?>
                    <a class="js-anviz-tab mui-control-item" href="<?php echo Yii::app()->createUrl('faq/ajax', array('category_id'=>$row['id']));?>">
                        <?php echo $row['name'];?>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
            <!--通过判断 a 标签的index ，如果 1 ，则anviz-slider-box更换它的 id 且清空ul 中的数据，添加 index 为 1 的内容；
                如果是 2 ，同样更换anviz-slider-box更换它的 id且清空原数据添加新数据，以此类推
            -->
            <!-- faq/ajax.html?product_category_id=1&product_id=1&category_id=1&keyword=aaaa  -->
            <div class="mui-slider-group">
            	<div id="item1mobile" class="mui-scroll-wrapper anviz-slider-box mui-slider-item mui-active js-slider">
	                <ul class="mui-table-view"></ul>
	            </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/webviewGroup.js"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.pullToRefresh.material.js"></script>
<script>
	mui.init();
	mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false //是否显示滚动条
    });
</script>

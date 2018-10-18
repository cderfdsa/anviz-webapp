<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 13:28
 */
?>
<?php $this->beginClip('jsHeader'); ?>

<script src="<?php echo $this->assetsUrl; ?>/js/home/new_home.js?<?php echo time(); ?>"></script>
<?php $this->endClip(); ?>
<div class="mui-content" style="max-width: 100%;">
	<!--header-->
	<header class="mui-bar mui-bar-nav">
		<h1 id="homeTitle" class="mui-title icon-color">My Anviz</h1>
	</header>
	<!--content-->
	<div class="" >
		<div class="scroll">
			<div id="newHomeBanner" class="mui-slider-group">
				<div class="mui-slider-item mui-control-content mui-active">
					<!--banner-->
					<div id="slider" class="mui-slider">
						<div class="mui-slider-group mui-slider-loop">
							<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
							<div class="mui-slider-item mui-slider-item-duplicate" data-id="95579">
								<a href="#">
									<img src="http://www.anviz.com/Style/crmtmp/storage/2016/September/week1/480372_Anviz_A300_01_thumb_520_520.png">
									<p class="mui-slider-title">A300</p>
								</a>
							</div>
							<div class="mui-slider-item" data-id="642954">
								<a href="#">
									<img src="http://www.anviz.com/Style/crmtmp/storage/2018/January/week3/684215_4_thumb_520_520.png">
									<p class="mui-slider-title">W1(with Battery)</p>
								</a>
							</div>
							<div class="mui-slider-item" data-id="374834">
								<a href="#">
									<img src="http://www.anviz.com/Style/crmtmp/storage/2016/July/week4/471217_C2-Pro_Pictures-02_thumb_520_520.jpg">
									<p class="mui-slider-title">C2Pro</p>
								</a>
							</div>
							<div class="mui-slider-item" data-id="644463">
								<a href="#">
									<img src="http://www.anviz.com/Style/crmtmp/storage/2017/October/week2/644476_TC580_01_thumb_520_520.png">
									<p class="mui-slider-title">TC580</p>
								</a>
							</div>
							<div class="mui-slider-item" data-id="95579">
								<a href="#">
									<img src="http://www.anviz.com/Style/crmtmp/storage/2016/September/week1/480372_Anviz_A300_01_thumb_520_520.png">
									<p class="mui-slider-title">A300</p>
								</a>
							</div>
							<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
							<div class="mui-slider-item mui-slider-item-duplicate" data-id="642954">
								<a href="#">
									<img src="http://www.anviz.com/Style/crmtmp/storage/2017/September/week5/642956_Anviz-W1-White-02_thumb_520_520.png">
									<p class="mui-slider-title">W1</p>
								</a>
							</div>
						</div>
						<div class="mui-slider-indicator mui-text-right">
							<div class="mui-indicator mui-active"></div>
							<div class="mui-indicator"></div>
							<div class="mui-indicator"></div>
							<div class="mui-indicator"></div>
						</div>
					</div>
				</div>
			</div>
			<!--news-->
			<div id="newHomeNews" class="full-page">
				<img src="<?php echo $this->assetsUrl; ?>/img/banner/new_home/news2.jpg"/>
				<div class="anviz-news-footer">
					<div class="mui-media-body">Anviz China channel investment</div>
					<p>16 + years of independent research and develop...</p>
				</div>
			</div>
			<!--exhibition-->
			<div id="newHomeExhibition" class="full-page">
				<img src="<?php echo $this->assetsUrl; ?>/img/banner/2018-ISC-WEST-invitation_01.jpg" alt="" />
				<div class="anviz-exhibition-footer">
					<div class="mui-media-body">Anviz 2018-ISC-WEST-invitation</div>
					<p>Date:  11~13 April 2018</p>
				</div>
			</div>
			<!--update log-->
			<div id="newHomeUpdateLog" class="full-page">
				<div class="new-home-card">
					<div class="mui-card-content">
						<ul class="mui-table-view">
							<li class="mui-table-view-cell">
								<div href="#" class="mui-navigate-right">
									All Upgrade Log
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--product list-->
			<div id="newHomeProductList" class="full-page">
				<div class="new-home-product">
					<div class="product-btn new-product active">New Product</div>
					<div class="product-btn upgrade-product">Upgrade Product</div>
				</div>
			</div>
			<div class="new-product-content new-product-warp">
				<ul class="mui-table-view mui-table-view-chevron new-view"></ul>
			</div>
			<div class="new-product-content upgrade-product-warp" style="display: none;">
				<ul class="mui-table-view mui-table-view-chevron upgrade-view"></ul>
			</div>
		</div>
	</div>
	
	<!--bottom nav-->
	<?php $this->Widget('application.widgets.BlockWidget', array(
        'block' => 'bottom',
        'module' => $this->module,
        'controller' => $this->controller,
    )); ?>
</div>


<script type="text/javascript" charset="utf-8">
    mui.init({
    		swipeBack:true //启用右滑关闭功能
    });
    mui('.mui-scroll-wrapper').scroll({
	    	deceleration: 0.0005,
	    	indicators: false
    });
   //iOS 11的bug如果页面内容不够多的时候。底部会有白色的间距
   jQuery(".mui-content").css("height"，(window.innerHeight+44)+"px");
</script>
<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/30
 * Time: 17:10
 * FileName: view.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<!--<script src="<?php echo $this->assetsUrl; ?>/js/support/faq.js?<?php echo time();?>"></script>-->
<?php $this->endClip(); ?>
<div class="mui-content" id="faqPageDetails">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color"></h1>
    </header>
    <!--content-->
    <div class="mui-content mui-scroll-wrapper">
        <div id="pullrefresh" class="mui-scroll">
            <div id="faqView" class="mui-card anviz-faq-card">
                    <!--ask start-->
                    <div class="mui-card-header anviz-card-header">
                        <div class="anviz-problem-title">
                            <span class="iconfont icon-ask icon-zuijiadaan-size"></span>
                            <div class="mui-media-body js-card-pro-title"><?php echo $faq['question'];?></div>
                        </div>
                    </div>
                    <!--answer start-->
                    <div class="mui-card-content anviz-card-content">
                        <div class="content-item">
                            <?php echo $faq['answer'];?>
                        </div>
                    </div>
                    <!--time-->
                    <div class="mui-card-footer anviz-card-footer">
                        <div class="anviz-problem-footer">
                            <span class="iconfont icon-time1 icon-zuijiadaan-size"></span>
                            <p class="mui-pull-right js-pro-date">15:30 &nbsp;15/07/2017</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!--20170905 添加图片预览-->
<script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.zoom.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.previewimage.js?<?php echo time();?>"></script>
<script type="text/javascript">
    mui.init({
    });
    mui('.mui-scroll-wrapper').scroll({
    	deceleration: 0.0005,
    	indicators: false //是否显示滚动条
    });
    mui.previewImage();
    mui.ready(function(){
    	loadingProductor();
    	
    	//移除style  data-preview-src="" data-preview-group="1"
	    var faqView = jQuery('#faqView');
	    var imgStyle = faqView.find('.anviz-card-content p img');
	    imgStyle.attr('data-preview-src','');
	    imgStyle.attr('data-preview-group','1');
	    if(imgStyle.attr('style')) {
	    	imgStyle.removeAttr('style').addClass('anviz-img-card');
	    }
    });
    function loadingProductor(){
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
              if(status == 'complete'){
                   $('.anviz-loading').fadeOut();
              }
         }
    }
</script>

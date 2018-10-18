<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 13:46
 */
?>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/tab_bar.js?<?php echo time();?>"></script>
<!--bottom nav-->
<nav class="mui-bar mui-bar-tab anviz-bar-bottom" style="margin-top: 44px;">
    <a id="home" class="mui-tab-item <?php if(empty($module) && $controller != 'login'):?>mui-active<?php endif;?>" href="<?php echo Yii::app()->createUrl('/');?>">
        <span class="mui-icon iconfont icon-home"></span>
        <span class="mui-tab-label">HOME</span>
    </a>
    <a id="support" class="mui-tab-item <?php if(!empty($module) && $module == 'support'):?>mui-active<?php endif;?>" href="<?php echo Yii::app()->createUrl('support');?>">
        <span class="mui-icon iconfont icon-support"></span>
        <span class="mui-tab-label">SUPPORT</span>
    </a>
    <a id="porductor" class="mui-tab-item <?php if(!empty($module) && $module == 'product'):?>mui-active<?php endif;?>" href="<?php echo Yii::app()->createUrl('product');?>">
        <span class="mui-icon iconfont icon-product"></span>
        <span class="mui-tab-label">PRODUCTS</span>
    </a>
    <?php if($isLogin):?>
        <a id="me" class="mui-tab-item <?php if(!empty($module) && $module == 'profile'):?>mui-active<?php endif;?>" href="<?php echo Yii::app()->createUrl('profile');?>">
            <span class="mui-icon iconfont icon-profile"></span>
            <span class="mui-tab-label">Me</span>
        </a>
    <?php else:?>
        <a id="me" class="mui-tab-item <?php if($controller == 'login'):?>mui-active<?php endif;?>" href="<?php echo Yii::app()->createUrl('login');?>">
            <span class="mui-icon iconfont icon-profile"></span>
            <span class="mui-tab-label">LOGIN</span>
        </a>
    <?php endif;?>
</nav>
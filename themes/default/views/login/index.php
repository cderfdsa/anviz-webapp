<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 14:00
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/login/login.js?<?php echo time();?>"></script>
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
<div id="loginPage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav mui-bar-transparent">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Sign In</h1>
    </header>
    <!--content-->
    <div class="mui-slider-group">
        <form id='login-form' class="mui-input-group">
			<div class="mui-input-row">
				<label>Email</label>
				<input id='email' type="text" class="mui-input-clear mui-input" placeholder="Please enter your email">
			</div>
			<div class="mui-input-row">
				<label>Password</label>
				<input id='password' type="password" class="mui-input-clear mui-input" placeholder="Please enter your password">
			</div>
		</form>
        <!--<form class="mui-input-group">
            <ul class="mui-table-view mui-table-view-chevron">
                <li class="mui-table-view-cell">
                    Automatic Login
                    <div id="autoLogin" class="mui-switch mui-active">
                        <div class="mui-switch-handle"></div>
                    </div>
                </li>
            </ul>
        </form>-->
        <div class="mui-content-padded">
            <button id='login' class="mui-btn mui-btn-block mui-btn-primary">Log In</button>
            <div class="link-area">
                <span style="font-size: 14px;color: #555;">New user? </span><a id='reg' href="<?php echo Yii::app()->createUrl('register');?>" style="color:#00a0e8">Register</a> <span class="spliter">|</span>
                <a id='forgetPassword' href="<?php echo Yii::app()->createUrl('register/forgot');?>" style="color:#00a0e8">Forgot password?</a>
            </div>
        </div>
    </div>

    <?php $this->Widget('application.widgets.BlockWidget', array(
        'block' => 'bottom',
        'module' => $this->module,
        'controller' => $this->controller,
    )); ?>
</div>
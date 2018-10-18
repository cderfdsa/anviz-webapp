<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 17:36
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/login/register.js?<?php echo time();?>"></script>
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
    <span>loading</span>
</div>
<div id="registerPage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav mui-bar-transparent">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Register</h1>
    </header>
    <!--content-->
    
    <div class="mui-slider-group roleRight anviz-animation">
    	<p class="anviz-prompting">Please enter your email address, and then you will receive an email, enter this email and activate your account.</p>
        <form id='register-form' class="mui-input-group">
            <div class="mui-input-row">
                <label>Email</label>
                <input id='email' type="text" class="mui-input-clear mui-input" placeholder="Please enter your email">
            </div>
            <div class="mui-input-row">
                <label>Password</label>
                <input id='password' type="text" class="mui-input-clear mui-input"
                       placeholder="Please enter your password">
            </div>
            <div class="mui-input-row">
                <label>Confirm</label>
                <input id='ConfigPassword' type="text" class="mui-input-clear mui-input"
                       placeholder="Please enter your password">
            </div>
            <div class="mui-input-row">
                <label>Name</label>
                <input id='last_name' type="text" class="mui-input-clear mui-input" placeholder="Please enter your name">
            </div>
        </form>
		<p class="anviz-successful-prompting"></p>
        <div class="mui-content-padded">
            <button id='register' class="mui-btn mui-btn-block mui-btn-primary">Register</button>
        </div>
    </div>
</div>

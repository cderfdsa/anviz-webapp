<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 17:44
 */
?>
<script src="<?php echo $this->assetsUrl; ?>/js/login/forgetPassword.js?<?php echo time();?>"></script>
<div id="forgetPasswordPage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav mui-bar-transparent">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Password retrieval</h1>
    </header>
    <!--content-->
    <div class="mui-slider-group roleRight anviz-animation">
        <form id='forget-form' class="mui-input-group">
            <div class="mui-input-row">
                <label>Email</label>
                <input id='email' type="text" class="mui-input-clear mui-input" placeholder="Please enter your email">
            </div>
        </form>

        <div class="mui-content-padded">
            <button id='forgetPassword' class="mui-btn mui-btn-block mui-btn-primary">Send out</button>
        </div>
    </div>
</div>

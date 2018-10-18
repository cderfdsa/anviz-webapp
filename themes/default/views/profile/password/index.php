<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 12:22
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/me/changePwd.js?<?php echo time();?>"></script>
<?php $this->endClip(); ?>
<div id="passwordPage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav mui-bar-transparent">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Change Password</h1>
        <button id="passwordSave" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Submit</button>
    </header>
    <!--content-->
    <div class="mui-slider-group roleRight anviz-animation">
        <!--label-->
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                <h5 class="anviz-padded">Change Password</h5>
            </li>
        </ul>
        <div class="mui-input-group">
            <div class="mui-input-row anviz-me-user-original-psw">
                <label>Password</label>
                <input id="originalPassword" type="password" class="mui-input-password original-password" placeholder="original password">
            </div>
            <div class="mui-input-row anviz-me-user-new-psw">
                <label>NewPwd</label>
                <input type="password" class="mui-input-password new-password" placeholder="new password">
            </div>
            <div class="mui-input-row anviz-me-user-new-psw-config">
                <label>NewPwd</label>
                <input type="password" class="mui-input-password new-password-again" placeholder="new password again">
            </div>
        </div>
    </div>
</div>

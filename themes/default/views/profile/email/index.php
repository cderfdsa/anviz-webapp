<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 12:39
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/me/changePwd.js?<?php echo time();?>"></script>
<?php $this->endClip(); ?>
<div id="emailPage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav mui-bar-transparent">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Change Email</h1>
        <button id="changeEmailSave" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Submit</button>
    </header>
    <!--content-->
    <div class="mui-slider-group roleRight anviz-animation">
        <!--label-->
        
        <!--<div class="mui-input-group">
            <div class="mui-input-row anviz-me-user-original-email">
                <label>Email</label>
                <input type="text" class="mui-input-clear original-mail" placeholder="original mail" value="<?php echo $thisMember['email'];?>">
            </div>
            <div class="mui-input-row anviz-me-user-new-email">
                <label>New Email</label>
                <input type="text" class="mui-input-clear new-mail" placeholder="new mail">
            </div>
        </div>-->
        <p class="anviz-prompting">Please enter your email address and then you will receive an email to reset your password.</p>
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                <h5 class="anviz-padded">Change Email</h5>
            </li>
        </ul>
        <ul class="mui-table-view mui-table-view-chevron">
			<li class="mui-table-view-cell">
				<div class="mui-pull-left">Email</div>
				<div class="mui-pull-right"><?php echo $thisMember['email'];?></div>
			</li>
			<li class="mui-input-row anviz-me-user-new-email">
				<label>New Email</label>
				<input id="changeMail" type="text" class="mui-input-clear new-mail anviz-change-input" placeholder="new mail">
			</li>
		</ul>
		<p class="anviz-warning-prompting"></p>
    </div>
</div>

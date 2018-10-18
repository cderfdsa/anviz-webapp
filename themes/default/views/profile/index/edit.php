<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 15:42
 * FileName: edit.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<script src="<?php echo $this->assetsUrl; ?>/js/me/personalChange.js?<?php echo time();?>"></script>
<?php $this->endClip(); ?>
<div class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <a id="homeBack" class="iconfont icon-home icon-color mui-icon mui-icon-left-nav mui-pull-right" style="display: none;"></a>
        <button id="informationSave" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Submit</button>
        <h1 id="homeTitle" class="mui-title icon-color">Personal information</h1>
    </header>
    <!--list-->
    <div id="editUserInfo" class="mui-slider-group anviz-content">
        <ul class="mui-table-view">
           <!-- <li class="mui-table-view-cell" style="line-height: 64px;">Head portrait
                <img class="mui-media-object mui-pull-right avniz-header" src="../../../../../img/logo/default-logo.png">
            </li>-->
            <li class="mui-table-view-cell anviz-input-box">First name
                <input type="text" id="firstName" class="anviz-input-box mui-pull-right mui-input-clear" name="firstName" value="<?php echo $thisMember['firstname'];?>" />
            </li>
            <li class="mui-table-view-cell anviz-input-box">Last name
                <input type="text" id="lastName" class="anviz-input-box mui-pull-right mui-input-clear" name="lastName" value="<?php echo $thisMember['lastname'];?>" />
            </li>
            <li class="mui-table-view-cell anviz-input-box">Job title
                <input type="text" id="jobTitle" class="anviz-input-box mui-pull-right mui-input-clear" value="<?php echo $thisMember['setype'] == 'Leads'?$thisLead['job_title']:$thisContact['job_title'];?>" />
            </li>
            <li class="mui-table-view-cell anviz-input-box">Tel
                <input type="text" id="Tel" class="anviz-input-box mui-pull-right mui-input-clear" value="<?php echo $thisMember['setype'] == 'Leads'?$thisLead['phone']:$thisContact['phone'];?>" />
            </li>
        </ul>
        <!--label-->
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                <h5 class="anviz-padded">Gender</h5>
            </li>
        </ul>
        <ul id="Gender" class="mui-table-view mui-table-view-radio">
            <li class="mui-table-view-cell mui-selected <?php if($thisMember['salutation'] == 'Mr.'):?>mui-selected<?php endif;?>">
                <a class="mui-navigate-right">
                    Male
                </a>
            </li>
            <li class="mui-table-view-cell <?php if($thisMember['salutation'] == 'Mrs.'):?>mui-selected<?php endif;?>">
                <a class="mui-navigate-right">
                    Female
                </a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    mui.init({});

</script>

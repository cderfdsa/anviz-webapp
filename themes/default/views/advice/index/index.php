<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 14:52
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/feedback-page.css" />
<script src="<?php echo $this->assetsUrl; ?>/js/me/advice.js?<?php echo time();?>"></script>
<?php $this->endClip(); ?>
<div id="advicePage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav mui-bar-transparent">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Advice</h1>
        <button id="adviceSave" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Submit</button>
    </header>
    <!--content-->
    <div class="mui-slider-group roleRight anviz-animation">
        <!--label-->
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                <h5 class="anviz-padded">New Adivces</h5>
            </li>
        </ul>
        <div class="mui-content">
            <div class="mui-input-group">
                <div id="adiveTitle" class="mui-input-row">
                    <label>Title</label>
                    <input name="advice-name" id="adviceName" type="text" class="mui-input-clear"
                           placeholder="Please enter content">
                </div>
                <div class="mui-input-row anviz-advice-category">
                    <label>Category </label>
                    <select id="adviceCategory" class="anviz-select">
                        <option value="">--None--</option>
                        <?php foreach($adviceTypes as $val):?>
                            <option value="<?php echo $val;?>"><?php echo $val;?></option>
                        <?php endforeach;?>
                    </select>
                </div>

            </div>
        </div>
        <!--label-->
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                <h5 class="anviz-padded">Contents</h5>
            </li>
        </ul>
        <div class="mui-content">
            <div class="mui-input-row anviz-textarea">
                <textarea id="advieText" rows="5" placeholder="Anviz Standalone..."></textarea>
                <div class="font-box"><span class="font-num">0</span>/200</div>
            </div>
        </div>
        <!--upload-->
        <!--<div id="feedback" class="mui-page feedback">
            <div class="mui-page-content">
                <div id='image-list' class="row image-list"></div>
            </div>
        </div>-->
    </div>
</div>
<!--<script src="<?php echo $this->assetsUrl; ?>/js/feedback.js?<?php echo time();?>"></script>-->
<!--<script src="<?php echo $this->assetsUrl; ?>/js/feedback-page.js?<?php echo time();?>"></script>-->

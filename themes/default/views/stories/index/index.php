<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/13
 * Time: 11:30
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/feedback-page.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/mui.picker.min.css" />
<script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.picker.min.js"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/me/stories.js?<?php echo time();?>"></script>
<?php $this->endClip(); ?>
<div id="successStorieslPage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav mui-bar-transparent">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Success Stories</h1>
        <button id="storieslSave" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Submit</button>
    </header>
    <!--content-->
    <div class="mui-slider-group roleRight anviz-animation">
        <!--label-->
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                <h5 class="anviz-padded">New Success Story</h5>
            </li>
        </ul>
        <div class="mui-content">
            <div class="mui-input-group">
                <div id="adiveTitle" class="mui-input-row anviz-advice-title">
                    <label>Story Title</label>
                    <input id="storieslTitle" type="text" class="mui-input-clear" placeholder="Please enter content">
                </div>
                <div class="mui-input-row anviz-advice-time">
                    <label>Date</label>
                    <div id="selectTime" class="anviz-advice-date" data-options='{"type":"date"}'>select date</div>
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
                <textarea id="storieslText" rows="5" placeholder="Anviz Standalone..."></textarea>
                <div class="font-box"><span class="font-num">0</span>/200</div>
            </div>
        </div>
        <!--<div id="feedback" class="mui-page feedback">
            <div class="mui-page-content">
                <div id='image-list' class="row image-list"></div>
            </div>
        </div>-->
    </div>
</div>
<script type="text/javascript">
    (function($) {
        mui.init({});
        var result = document.getElementById('selectTime'); //选择div的值
        var btns = $('#selectTime'); //选择要点击的对象
        btns.each(function(i, btn) { //遍历有多少个div
            btn.addEventListener('tap', function() {
                var _self = this;
                if(_self.picker) {
                    _self.picker.show(function(rs) {
                        /*result.innerText = '选择结果: ' + rs.text;*/
                        result.innerHTML = rs.text; //改变div的值
                        console.log('选择的日期为：' + rs.text);
                        _self.picker.dispose();
                        _self.picker = null;
                    });
                } else {
                    var optionsJson = this.getAttribute('data-options') || '{}';
                    var options = JSON.parse(optionsJson);
                    var id = this.getAttribute('id');
                    _self.picker = new $.DtPicker(options);
                    _self.picker.show(function(rs) {
                        /*result.innerText = '选择结果: ' + rs.text;*/
                        result.innerHTML = rs.text;
                        /*console.log('选择的日期为：' + rs.text);*/
                        _self.picker.dispose();
                        _self.picker = null;
                    });
                }
            }, false);
        });
    })(mui);
</script>

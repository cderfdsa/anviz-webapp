<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/6
 * Time: 11:50
 * FileName: index.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/feedback-page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/mui.picker.min.css" />
    <script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.picker.min.js"></script>
    <script src="<?php echo $this->assetsUrl; ?>/js/me/studies.js?<?php echo time();?>"></script>
<?php $this->endClip(); ?>
<div id="caseStudiesPage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav mui-bar-transparent">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Case Studies</h1>
        <button id="studiesSave" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Submit</button>
    </header>
    <!--content-->
    <div class="mui-slider-group roleRight anviz-animation">
        <!--label-->
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12">
                <h5 class="anviz-padded">New Casestudy</h5>
            </li>
        </ul>
        <div class="mui-content">
            <div class="mui-input-group">
                <div id="adiveTitle" class="mui-input-row anviz-advice-title">
                    <label>Title</label>
                    <input id="studiesTitle" type="text" class="mui-input-clear" placeholder="Please enter content">
                </div>
                <div class="mui-input-row anviz-advice-country">
                    <label>Country</label>
                    <select id="countrySelect" class="anviz-select">
                        <option value="0">--None--</option>
                        <?php foreach($countries as $country):?>
                            <option value="<?php echo $country['name'];?>"><?php echo $country['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mui-input-row anviz-advice-time">
                    <label>Date</label>
                    <div id="selectTime" class="anviz-advice-date" data-options='{"type":"date"}'>select date</div>
                </div>
                <div class="mui-input-row anviz-advice-model">
                    <label>Model</label>
                    <select id="modelSelect" class="anviz-select">
                        <option value="0">--None--</option>
                        <?php foreach($productCategories as $category):?>
                            <optgroup label="<?php echo $category['name'];?>">
                                <?php foreach($products[$category['id']] as $product):?>
                                    <option value="<?php echo $product['id'];?>"><?php echo $product['model'];?></option>
                                <?php endforeach;?>
                            </optgroup>
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
                <textarea id="studiesNum" rows="5" placeholder="Anviz Standalone..."></textarea>
                <div class="font-box"><span class="font-num">0</span>/200</div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/feedback.js?<?php echo time();?>"></script>
<!--<script src="<?php echo $this->assetsUrl; ?>/js/pub/feedback-page.js?<?php echo time();?>"></script>-->
<script type="text/javascript">
    (function($) {
        mui.init({});
        mui('.mui-scroll-wrapper').scroll({
	    	deceleration: 0.0005,
	    	indicators: false //是否显示滚动条
	    });
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
                        console.log('选择的日期为：' + rs.text);
                        _self.picker.dispose();
                        _self.picker = null;
                    });
                }
            }, false);
        });
    })(mui);
</script>

<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/28
 * Time: 16:55
 * FileName: add.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<!--<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/feedback-page.css" />-->
<script src="<?php echo $this->assetsUrl; ?>/js/support/addTroubleTicket.js?<?php echo time();?>"></script>
<script src="https://cdn.bootcss.com/jquery.form/3.09/jquery.form.min.js"></script>
<?php $this->endClip(); ?>
<style>
	.anviz-upload-file .image-item{
		width: 30px;
	    height: 30px;
	    background-image: url(../../img/icon/add.png);
	    background-size: 100% 100%;
	    display: inline-block;
	    position: relative;
	    border-radius: 5px;
	    margin-right: 10px;
	    margin-bottom: 10px;
	    border: solid 1px #e8e8e8;
	    margin-left: 20px;
	}
	.anviz-upload-file .image-item .image-close
	{
		position: absolute;
	    display: inline-block;
	    right: -6px;
	    top: -6px;
	    width: 20px;
	    height: 20px;
	    text-align: center;
	    line-height: 20px;
	    border-radius: 12px;
	    background-color: #FF5053;
	    color: #f3f3f3;
	    border: solid 1px #FF5053;
	    font-size: 9px;
	    font-weight: 200;
	    z-index: 1;
	}
	.anviz-upload-file .image-item input[type="file"]{
		position: absolute;
	    left: 0px;
	    top: 0px;
	    width: 100%;
	    height: 100%;
	    opacity: 0;
	    cursor: pointer;
	    z-index: 0;
	}
	.img-list{
		width: 100%;
		height: 105px;
	    padding: 10px 10px;
	    overflow: hidden;
	    border-top: 1px solid #c8c7cc;
	    border-bottom: 1px solid #c8c7cc;
	    background: #fff;
	    margin: 0;
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    justify-content: flex-start;
	    overflow: scroll;
	    
	}
	.img-list li{
		position: relative;
		margin-right: 15px;
	}
	.img-list li img{
		width: 85px;
		height: 85px;
	}
	.img-list li span{
		position: absolute;
	    top: -5px;
		left: 73px;
	    background: #00a0e8;
	    width: 20px;
	    height: 20px;
	    border-radius: 20px;
	    text-align: center;
	    line-height: 18px;
	    color: #fff;
	}
</style>
<form method="post" enctype="multipart/form-data" id="addTicketPage" class="mui-content">
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <button id="ticketSave" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Submit</button>
        <h1 class="mui-title icon-color"></h1>
    </header>
    <!--content-->
    <div class="mui-slider-group">
        <div class="mui-content">
            <div id="anvizTicketGroup" class="mui-input-group">
                <div class="mui-input-row">
                    <label>Title</label>
                    <input id="addTicketTitle" name="title" type="text" class="mui-input-clear js-ticket-title" placeholder="Please enter title">
                </div>
            </div>
        </div>
        <!--label-->
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                <h5 class="anviz-padded">Choose Product</h5>
            </li>
        </ul>
        <div class="mui-input-group">
            <div class="mui-input-row anviz-category">
                <label>Category</label>
                <select name="product_id" id="addSelectedTicket" class="anviz-select js-category">
                    <option value="0">Choose Category</option>
                    <?php foreach($productCategories as $row):?>
                        <optgroup label="<?php echo $row['name'];?>">
                            <?php foreach($row['children'] as $col):?>
                                <option value="<?php echo $col['id'];?>"><?php echo $col['name'];?></option>
                            <?php endforeach;?>
                        </optgroup>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mui-input-row anviz-model">
                <label>Model</label>
                <select id="addTicketModelSelected" class="js-model">
                	<option value="-1">--None--</option>
                </select>
            </div>
            <div class="mui-input-row anviz-trouble">
                <label>Trouble</label>
                <select name="ticketcategories" class="js-trouble">
                    <option value="0">Please Select</option>
                    <?php foreach($ticketCategories as $row):?>
                        <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <ul class="mui-table-view mui-grid-view mui-grid-9">
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                <h5 class="anviz-padded">Contents</h5>
            </li>
        </ul>
        <div class="mui-content">
            <div class="mui-input-row anviz-textarea js-textarea">
                <textarea name="content" id="textarea" rows="5" placeholder="Write something..."></textarea>
                <div class="font-box"><span class="font-num">0</span>/200</div>
            </div>
        </div>
        
        <ul class="mui-table-view mui-grid-view mui-grid-9">
			<li class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12 anviz-upload-warp" style="display: flex;padding: 0;">
				<h5 class="anviz-padded">Attachments<span style="">,Can choose more</span></h5>
				<div class="anviz-upload-file">
					<div class="image-item">
						<div id="upload-file">
							<input id="file" name="file_data[]" type="file" multiple />
						</div>
					</div>
				</div>
			</li>
		</ul>
		<ul id="imgList" class="img-list" style="display: none;"></ul>
    </div>
</form>
<script type="text/javascript">
	mui.previewImage();
	
</script>


<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/13
 * Time: 13:29
 * FileName: view.php
 */
?>
<?php $this->beginClip('jsHeader'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/feedback-page.css" />
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
<div id="ticketProgress" class="mui-content">
    <!--marking-->
    <!--header-->
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <h1 class="mui-title icon-color">Trouble Ticket</h1>
        <button id="addTicketDetails" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Submit</button>
    </header>

    <!--content-->
    <div class="mui-content mui-scroll-wrapper">
        <div class="mui-scroll">
            <div class="mui-slider-group">
                <!--total-->
                <div class="mui-card anviz-faq-card">
                    <!--ask id-->
                    <div class="mui-card-header anviz-card-header">
                        <div class="anviz-problem-title">
                            <span class="iconfont icon-ask icon-zuijiadaan-size"></span>
                            <div class="mui-media-body mui-ellipsis js-card-pro-title"><?php echo $ticket['title'];?></div>
                        </div>
                    </div>
                    <!--info-->
                    <div class="mui-card-content">
                        <ul class="mui-table-view" ">
                        <div class="mui-row " style="width: 100%; ">
                            <div class="mui-col-sm-12 mui-col-xs-12 ">
                                <li class="mui-table-view-cell ">Ticket NO:
                                    <span class="mui-pull-right anviz-card-span-color-res "><?php echo $ticket['ticket_no'];?> </span>
                                </li>
                            </div>
                            <div class="mui-col-sm-6 mui-col-xs-12 ">
                                <li class="mui-table-view-cell ">Category:
                                    <span class="mui-pull-right anviz-card-span-color "><?php echo $ticket['category'];?></span>
                                </li>
                            </div>
                            <div class="mui-col-sm-6 mui-col-xs-12 ">
                                <li class="mui-table-view-cell ">Creat by:
                                    <span class="mui-pull-right anviz-card-span-color "><?php echo $ticket['createdby'];?></span>
                                </li>
                            </div>
                            <div class="mui-col-sm-6 mui-col-xs-12 ">
                                <li class="mui-table-view-cell ">Status:
                                    <span class="mui-pull-right anviz-card-span-color "><?php echo $ticket['status'];?></span>
                                </li>
                            </div>
                            <div class="mui-col-sm-6 mui-col-xs-12 ">
                                <li class="mui-table-view-cell ">Last Modified:
                                    <span class="mui-pull-right anviz-card-span-color "><?php echo $ticket['modifiedtime'];?></span>
                                </li>
                            </div>
                            <div class="mui-col-sm-12 mui-col-xs-12 ">
                                <li class="mui-table-view-cell "><?php echo $ticket['content'];?></li>
                            </div>
                        </div>
                        </ul>
                    </div>
                    <div class="mui-card-footer anviz-card-footer ">
                        <div class="anviz-problem-footer ">
                            <span class="iconfont icon-time1 icon-zuijiadaan-size "></span>
                            <p class="mui-pull-right js-pro-date "> <?php echo $ticket['createdtime'];?></p>
                        </div>
                    </div>
                </div>
                <!--label-->
                <!--<ul class="mui-table-view mui-grid-view mui-grid-9 ">
                    <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6 ">
                        <h5 class="anviz-padded ">Replies</h5>
                    </li>
                </ul>-->
                <?php if(!empty($commentlist)):?>
                    <div class="anviz-card-answered ">
                        <!--first-->
                        <?php foreach($commentlist as $comment):?>
                            <div class="mui-card anviz-faq-card ">
                                <div class="mui-card-header anviz-card-header ">
                                    <div class="anviz-problem-title ">
                                        <span class="iconfont icon-support icon-zuijiadaan-size "></span>
                                        <div class="mui-media-body mui-ellipsis mui-pull-right js-card-pro-title ">Posted On: <span class="anviz-posted-on"><?php echo $comment['createdtime'];?></span></div>
                                    </div>
                                </div>
                                <div class="mui-card-content anviz-card-content ">
                                    <div class="content-item ">
                                        <p><?php echo $comment['content'];?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
                <!--<div class="anviz-btn-group">
                    <button id="postReplyBtn" type="button" class="mui-btn mui-btn-primary mui-btn-outlined" style="margin-top: 20px;"><span class="mui-icon mui-icon-compose"></span>&nbsp;Post Reply</button>
                </div>-->
            </div>
            <ul class="mui-table-view mui-grid-view mui-grid-9">
                <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                    <h5 class="anviz-padded">Contents</h5>
                </li>
            </ul>
            <div class="mui-content" style="padding-top: 0;">
                <div class="mui-input-row anviz-textarea js-textarea">
                    <textarea id="revertTicket" rows="5" placeholder="13212313213"></textarea>
                    <!-- <div class="font-box"><span class="font-num">0</span>/200</div>-->
                </div>
            </div>

            <ul class="mui-table-view mui-grid-view mui-grid-9">
                <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                    <h5 class="anviz-padded">Upload</h5>
                </li>
            </ul>
            <!--upload-->
            <div id="feedback" class="mui-page feedback">
                <div class="mui-page-content">
                    <div id='image-list' class="row image-list"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
<script>
    mui.init();
    mui('.mui-scroll-wrapper').scroll({
        deceleration: 0.0005,
        indicators: false
    });
</script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/feedback.js?<?php echo time();?>"></script>
<script src="<?php echo $this->assetsUrl; ?>/js/pub/feedback-page.js?<?php echo time();?>"></script>

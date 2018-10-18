<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 12:21
 * FileName: ticket.php
 */
?>
<li id="Ticket" class="mui-table-view-cell">
    <a class="mui-navigate-right">
        <div class="anviz-other-list mui-pull-left">
            <span class="mui-icon iconfont icon-edit icon-size"></span>
            <span class="anviz-table-view-num"><?php echo $count['times'];?></span>
            
        </div>
        <div class="mui-media-body js-media-body js-anviz-body">Trouble Ticket
            <p class="anviz-ellipsis js-des">Summit your troubles and questions.</p>
        </div>
        <?php if(!empty($count['answered'])):?>
            <span class="mui-badge mui-badge-danger anviz-badge-danger"><?php echo $count['answered'];?></span>
        <?php endif;?>
    </a>
</li>
<script type="text/javascript">
    mui.ready(function () {
        //support
        jQuery('#onLineOther #Ticket a').on('tap', function () {
            mui.openWindow({
                url: MyAnviz.baseUrl+'/ticket.html'
            });
        });
    });
</script>

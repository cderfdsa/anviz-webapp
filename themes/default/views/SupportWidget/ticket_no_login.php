<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 12:20
 * FileName: ticket_no_login.php
 */
?>
<li id="noLoginTicket" class="mui-table-view-cell">
    <a class="mui-navigate-right">
        <div class="anviz-other-list mui-pull-left">
            <span class="mui-icon iconfont icon-edit icon-size"></span>
            <span class="anviz-table-view-num">0</span>
        </div>
        <div class="mui-media-body js-media-body js-anviz-body">Trouble Ticket
            <p class="anviz-ellipsis js-des">Summit your troubles and questions.</p>
        </div>
    </a>
</li>
<script type="text/javascript">
    mui.ready(function () {
        //support
        jQuery('#onLineOther #noLoginTicket a').on('tap', function () {
            var btnArray = ['Cancel', 'Login'];
            mui.confirm('', 'Login successfully can be accessed!', btnArray, function (e) {
                if (e.index == 1) {
                    mui.openWindow({
                        url: MyAnviz.baseUrl+'/login.html'
                    });
                } else {
                    mui.back();
                }
            });
        });
    });
</script>

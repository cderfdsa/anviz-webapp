<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 11:28
 * FileName: header_no_login.php
 */
?>
<div class="anviz-login-warp">
    <button id="loginBtn" type="button" class="mui-btn mui-btn-primary mui-btn-outlined">Login In</button>
</div>
<script type="text/javascript">
    mui.ready(function () {
        //support
        jQuery('#loginBtn').on('tap', function () {
            mui.openWindow({
                url: MyAnviz.baseUrl + '/login.html'
            });
        });
    });
</script>

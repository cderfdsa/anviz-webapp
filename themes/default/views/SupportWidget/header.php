<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 11:30
 * FileName: header.php
 */
?>
<ul class="mui-table-view mui-grid-view mui-grid-9">
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4">
        <span class="times-num"><?php echo $count['times']; ?></span>
        <div class="mui-media-body times-body">Times</div>
    </li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4">
        <span class="complete-num"><?php echo $count['complete']; ?></span>
        <div class="mui-media-body complete-body">Complete</div>
    </li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-4">
        <span class="processing-num"><?php echo $count['processing']; ?></span>
        <div class="mui-media-body processing-body">Processing</div>
    </li>
</ul>

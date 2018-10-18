<?php
/**
 * File Name: log.php
 * Created by Junzhu <junzhu@188.com>.
 * Website: http://www.256th.com
 * Date: 2017/2/21
 * Time: 9:37
 */

return array(
    'handler' => true,
    'types' => array(
        1 => 'error',
        2 => 'warn',
        4 => 'notice',
        8 => 'info',
        16 => 'debug',
        32 => 'action', //Action Log
    ),
    'level' => 63,
);
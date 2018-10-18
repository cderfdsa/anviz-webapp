<?php
/**
 * File Name: rules.php
 * Created by Junzhu <junzhu@188.com>.
 * Website: http://www.256th.com
 * Date: 2017/4/26
 * Time: 14:24
 */

return array(
    '<controller:\w+>/<id:\d+>(.*)' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
);
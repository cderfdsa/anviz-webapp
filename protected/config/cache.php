<?php
/**
 * File Name: cache.php
 * Created by Junzhu <junzhu@188.com>.
 * Website: http://www.256th.com
 * Date: 2017/3/27
 * Time: 12:13
 */
// This is the database connection configuration.
$__config = array(
    'class' => 'system.caching.CMemCache',
    'servers' => array(
        array(
            'host' => 'localhost',
            'port' => 11211,
            'weight' => 60,
        )
    ),
    'keyPrefix' => '',
    'hashKey' => false,
    'serializer' => false
);
if (file_exists(dirname(__FILE__) . '/_cache.php')) {
    $__config = require_once(dirname(__FILE__) . '/_cache.php');
    //$__config = array_merge($__config, $___config);
}

return $__config;
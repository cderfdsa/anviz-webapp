<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/6
 * Time: 8:55
 */
$__config = array(
    'dir' => '/home/ubuntu/www/crm.anvizsys.com/',
    'url' => 'https://crm.anvizsys.com'
);
if (file_exists(dirname(__FILE__) . '/_crm.php')) {
    $___config = require_once(dirname(__FILE__) . '/_crm.php');
    $__config = array_merge($__config, $___config);
}

return $__config;
<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 10:40
 * FileName: website.php
 */

$__config = array(
    'baseUrl' => 'http://www.anviz.com'
);
if (file_exists(dirname(__FILE__) . '/_website.php')) {
    $__config = require_once(dirname(__FILE__) . '/_website.php');
    //$__config = array_merge($__config, $___config);
}

return $__config;
<?php

// This is the database connection configuration.
$__config = array(
    // uncomment the following lines to use a MySQL database
    'class' => 'DbConnection',
    'connectionString' => 'mysql:host=anvizcrm.cqefv226uyfe.us-west-2.rds.amazonaws.com;dbname=crm',
    'emulatePrepare' => true,
    'enableParamLogging' => true,   //这个就相对比较简单了，如果你设置为True，你在log中，就可以看到你的每次参数的参数是什么了，而不是:y01:y02这样的顺序变量。
    'username' => 'root',
    'password' => 'anviz2014',
    'tablePrefix' => '',
    'charset' => 'utf8',
    'schemaCachingDuration' => 3600,
    'enableSlave' => false,
    'slaves' => array(
        array(
            'connectionString' => 'mysql:host=anvizcrm.cqefv226uyfe.us-west-2.rds.amazonaws.com;dbname=crm',
            'username' => 'root',
            'password' => 'anviz2014',
        ),
        array(
            'connectionString' => 'mysql:host=anvizcrm.cqefv226uyfe.us-west-2.rds.amazonaws.com;dbname=crm',
            'username' => 'root',
            'password' => 'anviz2014',
        )
    )
);
if (file_exists(dirname(__FILE__) . '/_database.php')) {
    $___config = require_once(dirname(__FILE__) . '/_database.php');
    $__config = array_merge($__config, $___config);
}

return $__config;
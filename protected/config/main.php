<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'MyAnviz',
    'charset' => 'utf-8',
    'theme' => 'default',
    'language' => 'es',
    'timeZone' => 'UTC',
    'defaultController' => 'Index',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
    ),

    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'anvizjiang',
            'components' => array(
                'bootstrap' => array(
                    'class' => 'bootstrap.components.BsApi'
                ),
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array(
                '127.0.0.1',
                '::1'
            ),
        ),
        'product' => array(),
        'profile' => array(),
        'advice' => array(),
        'casestudy' => array(),
        'stories' => array(),
        'support' => array(),
        'ticket' => array(),
        'faq' => array(),
        'download' => array(),
        'news' => array()
    ),

    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('login/index'),
        ),
        'ip2location' => array(
            'class' => 'application.extensions.ip2location.Ip2location'
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '.html',
            'rules' => require(dirname(__FILE__) . '/rules.php'),
        ),
        'db' => require(dirname(__FILE__) . '/database.php'),
        'dbcache' => array(
            'class' => 'system.caching.CDbCache'
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'Error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
        'cache' => require(dirname(__FILE__) . '/cache.php'),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'log' => require(dirname(__FILE__) . '/log.php'),
        'crm' => require(dirname(__FILE__) . '/crm.php'),
        'email' => require(dirname(__FILE__) . '/phpmailer.php'),
        'website' => require(dirname(__FILE__) . '/website.php'),
    ),
);
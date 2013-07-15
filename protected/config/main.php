<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => ':: DBD ::',
    'language' => 'th',
    'sourceLanguage' => 'th',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.ckeditor.*',
        'application.helpers.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'dbd',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            //'ipFilters'=>array('127.0.0.1','::1'),
            'ipFilters' => array($_SERVER['REMOTE_ADDR'], '::1'),
//            'generatorPaths' => array('ext.MultiActiveRecord.mpgii'), //this line does the trick
        ),
        'knowledge',
        'member',
        'link',
        'dataCenter',
        'faq',
        'about',
        'learning',
        'news',
    ),
    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/site/index'),
        ),
        'Smtpmail' => array(
            'class' => 'application.extensions.smtpmail.PHPMailer',
            'Host' => "ssl://smtp.gmail.com",
            'Username' => 'dbdmart2013@gmail.com',
            'Password' => 'qoolative',
            'Mailer' => 'smtp',
            'Port' => 465,
            'SMTPAuth' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=dbdmart',
            'emulatePrepare' => true,
            'username' => 'dbd',
            'password' => 'dbdqo',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
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
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'postsPerPage' => 15,
        'foldersPerPage' => 5,
        'defaultPageSize' => 20,
        'track_lifetime' => 129600,
        'languages' => array('th' => "ไทย", 'en' => "English"),
    ),
    //for rss feed
    'controllerMap' => array(
        'YiiFeedWidget' => 'ext.yii-feed-widget.YiiFeedWidgetController'
    ),
);
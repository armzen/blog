<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //'language' => ['en_US','ru_RU','hy_HY'],
    'language' => 'en_EN',
    'charset' => 'UTF-8',
    'name' => 'yii blog',
    'layout' => 'blog',
    
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    //'defaultRoute'=>'blog/index', /* post -controller, index- action*/
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
           'cookieValidationKey' => 'kjhgf895623gfdx',
           //'baseUrl'=>'',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '../common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => TRUE,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
                'rules' => [

                    [
                        'pattern' => '',
                        'route' => 'blog/index',
                        'suffix' => '',
                    ],

                    [
                        'pattern' => '<controller>/<lang_id:\d+>',  
                        'route' => '<controller>/view',
                        'suffix' => '',
                    ],
                    [
                        'pattern' => '<controller>/<action>/<lang_id:\d+>',  
                        'route' => '<controller>/<action>',
                        'suffix' => '',
                    ],
                    [
                        'pattern' => '<controller>/<action>/<id:\d+>',  
                        'route' => '<controller>/<action>',
                        'suffix' => '',
                    ],
                    [
                        'pattern' => '<controller>/<action>',  
                        'route' => '<controller>/<action>',
                        'suffix' => '.html',
                    ],

                    
                    /* modules*/                   
                    // 1. for language id
                    
                    [
                        'pattern' => '<module>/<controller>/<action>/<lang_id:\d+>',  
                        'route' => '<module>/<controller>/<action>',
                        'suffix' => '',
                    ],
                    [
                        'pattern' => '<module>/<controller>/<action>/<lang_id:\d+>/<id:\d+>',  
                        'route' => '<module>/<controller>/<action>',
                        'suffix' => '',
                    ],
                    [
                        'pattern' => '<module>/<controller>/<action>',  
                        'route' => '<module>/<controller>/<action>',
                        'suffix' => '.html',
                    ],
                ],
        ],  
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

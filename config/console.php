<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$urlManager  = require(__DIR__ . '/urlmanager.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => 3,
            'targets' => [
                [
                    'enabled' => true,
                    'class' => '\simonefalcini\SlackTarget\SlackTarget',
                    'channel' => getenv('SLACK_CHANNEL'),
                    'hook' => getenv('SLACK_HOOK'),
                    'logVars' => [],
                    'levels' => ['error', 'warning'],
                    'except' => [
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:400',
                        'yii\web\BadRequestHttpException:400',
                    ],
                ],
                [
                    'logVars' => [],
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/console.log',
                    'levels' => ['error', 'warning'],
                ]
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    // configuration adjustments for 'dev' environment
    // requires version `2.1.21` of yii2-debug module
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

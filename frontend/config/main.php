<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'PHOTOGRAPHY',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu'
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*']
        ]
    ],
    'components' => [
      'assetManager' => [
          'bundles' => [
              'kartik\form\ActiveFormAsset' => [
                  'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
              ],
          ],
      ],
      'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        /*'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
              '<controller:\w+>/<id:\d+>' => '<controller>/view',
              '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
              '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ],
        ],

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
          'site/login',
          'site/signup',
          'site/cindex',
          'site/contactus',
          'site/aboutme',
          'site/gallery',
          'site/package',
          'package/view',
          'site/checked-date',
          'site/checked-order',
          'site/logout',
          'site/order-list',
          'site/order-cancel'
        ]
    ],
    'params' => $params,
];

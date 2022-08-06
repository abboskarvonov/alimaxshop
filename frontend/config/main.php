<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language'   => 'en',
    'sourceLanguage' => 'en_GB',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'easyImage' => [
            'class' => 'cliff363825\image\EasyImage',
            'driver' => 'GD',
            'quality' => 100,
            'cachePath' => '/img/easyimage/',
            'cacheTime' => 2592000,
            'retinaSupport' => false,
            'basePath' => '@webroot',
            'baseUrl' => '@web',
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
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['uz', 'ru'],
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'pattern'=>'product-view-detail/<link:\w+>',
                    'route' => 'site/view',
                    'suffix' => '.html',
                ],
                [
                    'pattern'=>'page/home',
                    'route' => 'site/index',
                    'suffix' => '.html',
                ],
                [
                    'pattern'=>'page/registration',
                    'route' => 'site/signup',
                    'suffix' => '.html',
                ],
                [
                    'pattern'=>'category-view/<link:\w+>',
                    'route' => 'site/category',
                    'suffix' => '.html',
                ],
                [
                    'pattern'=>'product-category-page/<link:\w+>',
                    'route' => 'site/categoryview',
                    'suffix' => '.html',
                ],
                [
                    'pattern'=>'product-category-all-view/<link:\w+>',
                    'route' => 'site/categoryall',
                    'suffix' => '.html',
                ],
            ],
        ],
        
    ],
    'params' => $params,
];

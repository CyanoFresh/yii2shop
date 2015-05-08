<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'Yii2shop',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Site
                '/' => 'site/index',
                'sitemap.xml' => 'sitemap/index',
                // Cart
                'cart' => 'cart/index',
                'cart/order' => 'cart/order',
                'cart/add/<id:\d+>' => 'cart/add',
                'cart/remove/<id:\d+>' => 'cart/remove',
                'cart/clear' => 'cart/clear',
                // Catalog
                'catalog/page/<page:\d+>' => 'catalog/index',
                'catalog' => 'catalog/index',
                '<category:.+>/<slug>' => 'catalog/view',
                '<category:.+>' => 'catalog/category',
            ],
        ],
    ],
    'params' => $params,
];

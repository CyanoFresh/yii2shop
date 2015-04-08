<?php
return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'urlManagerFrontEnd' => [
            'class' => 'yii\web\urlManager',
            // !!! insert frontend url here!
            'baseUrl' => '//yii2shop/',
        ],
    ],
];

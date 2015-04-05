<?php
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

$this->registerCss("body { padding-top: 50px; }");

$this->beginContent('@app/views/layouts/base.php');

echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]);

echo $content;

$this->endContent();

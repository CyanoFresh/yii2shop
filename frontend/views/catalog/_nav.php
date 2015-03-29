<?php
use common\models\Category;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */

// Items
$navItems = [];
foreach (Category::find()->all() as $category) {
    $label = $category->name
        . '<span class="badge pull-right">'
        . $category->getProducts()->count()
        . '</span>';

    $navItems[] = [
        'label' => $label,
        'url' => ['catalog/category', 'category' => $category->slug],
    ];
}

echo Nav::widget([
    'items' => $navItems,
    'options' => ['class' => 'nav-pills nav-stacked'],
    'encodeLabels' => false,
]);
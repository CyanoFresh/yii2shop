<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = Yii::t('frontend/cart', 'Cart');
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="page-header">
    <?= $this->title ?>
</h1>

<div class="panel panel-default">
    <div class="panel-body">
        <?= Html::a(
            '<span class="glyphicon glyphicon-arrow-left"></span> ' . Yii::t('frontend/cart', 'Continue shopping'),
            ['catalog/index'],
            ['class' => 'btn btn-primary']
        ) ?>

        <?= Html::a(
            '<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('frontend/cart', 'Clear Cart'),
            ['cart/clear'],
            ['class' => 'btn btn-default ' . ((Yii::$app->cart->getCount() <= 0) ? 'disabled' : false)]
        ) ?>

        <?= Html::a(
            '<span class="glyphicon glyphicon-ok"></span> ' . Yii::t('frontend/cart', 'Order'),
            ['cart/order'],
            ['class' => 'btn btn-success pull-right ' . ((Yii::$app->cart->getCount() <= 0) ? 'disabled' : false)]
        ) ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-9">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'columns' => [
                [
                    'attribute' => 'image',
                    'label' => Yii::t('frontend/cart', 'Image'),
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::img($model->mainImage, [
                            'width' => 80,
                        ]);
                    },
                    'contentOptions' => [
                        'style' => 'width: 15%',
                    ],
                ],
                [
                    'attribute' => 'name',
                    'label' => Yii::t('frontend/cart', 'Product'),
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a($model->name, ['catalog/view', 'slug' => $model->slug, 'category' => $model->category->slug]);
                    },
                ],
                [
                    'attribute' => 'category_id',
                    'label' => Yii::t('frontend/cart', 'Category'),
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a($model->category->name, ['catalog/category', 'category' => $model->category->slug]);
                    },
                ],
                [
                    'attribute' => 'price',
                    'format' => 'currency',
                    'label' => Yii::t('frontend/cart', 'Price'),
                ],
                [
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            ['cart/remove', 'id' => $model->id],
                            ['class' => 'btn btn-danger btn-xs']
                        );
                    },
                ]
            ],
        ]) ?>
    </div>

    <div class="col-sm-3">
        <?= $this->render('_summary') ?>
    </div>
</div>
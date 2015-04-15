<?php

use common\models\Image;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/product', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$image_models = Image::findAll(['model_id' => $model->id]);
$images = null;

foreach ($image_models as $image) {
    $images .= Html::img(Yii::$app->urlManagerFrontEnd->baseUrl . '/uploads/product/' . $model->id . '/' . $image->id . '.jpg', [
        'width' => '200px',
        'class' => 'img-thumbnail',
    ]);
}
?>
<div class="product-view">

    <h1 class="page-header">
        <?= Html::encode($this->title) ?>
        <div class="btn-group pull-right">
            <?= Html::a(
                '<span class="glyphicon glyphicon-eye-open"></span>',
                Yii::$app->urlManagerFrontEnd->createUrl(['catalog/view', 'slug' => $model->slug, 'category' => $model->category->slug]),
                [
                    'class' => 'btn btn-success',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('backend/product', 'View on site'),
                ]
            ) ?>
            <?= Html::a(
                '<span class="glyphicon glyphicon-pencil"></span>',
                ['update', 'id' => $model->id],
                [
                    'class' => 'btn btn-primary',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('backend/product', 'Update'),
                ]
            ) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'title' => Yii::t('backend/product', 'Delete'),
                'data' => [
                    'toggle' => 'tooltip',
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => Html::img($model->getMainImage('urlManagerFrontEnd'), [
                    'class' => 'img-thumbnail',
                    'width' => '200px',
                ]),
            ],
            'name',
            'price:currency',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'value' => Html::a($model->category->name, ['category/view', 'id' => $model->category->id]),
            ],
            [
                'attribute' => 'status_id',
                'format' => 'raw',
                'value' => Html::a($model->status->name, ['status/view', 'id' => $model->status->id]),
            ],
            'date:datetime',
            'slug',
            'description:html',
            [
                'attribute' => 'images',
                'format' => 'raw',
                'value' => $images,
            ],
            'meta_description',
            'meta_keywords',
        ],
    ]) ?>

</div>

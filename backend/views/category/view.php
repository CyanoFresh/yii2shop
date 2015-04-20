<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/category', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1 class="page-header">
        <?= $this->title ?>

        <div class="btn-group pull-right">
            <?= Html::a(
                '<span class="glyphicon glyphicon-eye-open"></span>',
                Yii::$app->urlManagerFrontEnd->createUrl(['catalog/category', 'category' => $model->slug]),
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
                ['class' => 'btn btn-primary']
            ) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>',
                ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]
            ) ?>
        </div>
    </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => $model->parent
                    ? Html::a($model->parent->name, ['category/view', 'id' => $model->parent->id])
                    : null,
            ],
            'slug',
            'name',
            'description:html',
            'meta_description',
            'meta_keywords',
        ],
    ]) ?>

</div>

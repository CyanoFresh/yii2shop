<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('order', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('order', 'Set as New'), ['new', 'id' => $model->id], [
            'class' => 'btn btn-default'
        ]) ?>
        <?= Html::a(Yii::t('order', 'Set as Done'), ['done', 'id' => $model->id], [
            'class' => 'btn btn-success'
        ]) ?>
        <?= Html::a(Yii::t('order', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('order', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'status',
                'value' => $model->getStatusLabel($model->status),
            ],
            'total_cost:currency',
            'date:datetime',
            // 'data:ntext',
            'name',
            'email:email',
            'phone',
            'message:ntext',
        ],
    ]) ?>

    <h2><?= Yii::t('product', 'Products') ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}',
        'columns' => [
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    /** @var $model common\models\Product */
                    return Html::img($model->getMainImage('urlManagerFrontEnd'), [
                        'width' => 80,
                    ]);
                },
                'contentOptions' => [
                    'style' => 'width: 15%',
                ],
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name, ['product/view', 'id' => $model->id]);
                },
            ],
            'price:currency',
        ],
    ]) ?>

</div>

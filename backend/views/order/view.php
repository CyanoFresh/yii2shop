<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/order', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1 class="page-header">
        <?= Yii::t('backend/order', 'Order #{orderID}', [
            'orderID' => $model->id,
        ]) ?>

        <div class="btn-group pull-right">
            <?= Html::a(Yii::t('backend/order', 'New'), ['new', 'id' => $model->id], [
                'class' => 'btn btn-default',
                'data-toggle' => 'tooltip',
                'title' => Yii::t('backend/order', 'Set this order as new'),
            ]) ?>
            <?= Html::a(Yii::t('backend/order', 'Done'), ['done', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'data-toggle' => 'tooltip',
                'title' => Yii::t('backend/order', 'Set this order as done'),
            ]) ?>
            <?= Html::a(Yii::t('backend/order', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
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
                'attribute' => 'status',
                'value' => $model->getStatusLabel($model->status),
            ],
            'total_cost:currency',
            'date:datetime',
            'name',
            'email:email',
            'phone',
            'message:ntext',
        ],
    ]) ?>

    <h2><?= Yii::t('backend/order', 'Products') ?></h2>

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

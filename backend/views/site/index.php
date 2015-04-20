<?php

use common\models\Order;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categoryModel common\models\Category */
/* @var $productModel common\models\Product */

$this->title = Yii::t('yii', 'Home');
?>

<h1 class="page-header">
    <?= Yii::t('backend/site', 'New Orders') ?>
    <?= Html::a(
        Yii::t('backend/site', 'All Orders'),
        ['order/index'],
        ['class' => 'btn btn-primary pull-right']
    ) ?>
</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summaryOptions' => ['class' => 'alert alert-info'],
    'rowOptions' => function ($model) {
        /** @var $model common\models\Order */
        if ($model->status === Order::STATUS_NEW) {
            return ['class' => 'success'];
        } elseif ($model->status === Order::STATUS_REVIEWED) {
            return ['class' => 'info'];
        }

        return ['class' => 'active'];
    },
    'columns' => [
        'id',
        'name',
        'total_cost:currency',
        'date:datetime',
        [
            'attribute' => 'status',
            'value' => function ($model) {
                /** @var $model common\models\Order */
                return $model->getStatusLabel($model->status);
            }
        ],
        // 'email:email',
        // 'phone',
        // 'message:ntext',

        [
            'class' => 'common\components\ActionButtonGroupColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['order/view', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-primary'
                    ]);
                },
            ],
        ],
    ],
]) ?>

<h1 class="page-header">
    <?= Yii::t('backend/site', 'Short Actions') ?>
</h1>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseCategory" aria-expanded="true" aria-controls="collapseOne">
                <?= Yii::t('backend/site', 'Create Category') ?>
            </a>
        </h4>
    </div>
    <div id="collapseCategory" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <?= $this->render('/category/_form', [
                'model' => $categoryModel,
            ]) ?>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?= Yii::t('backend/site', 'Create Product') ?>
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <?= $this->render('/product/_form', [
                'model' => $productModel,
            ]) ?>
        </div>
    </div>
</div>

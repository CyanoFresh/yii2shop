<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/order', 'Orders');

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1 class="page-header">
        <?= $this->title ?>
    </h1>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summaryOptions' => ['class' => 'alert alert-info'],
        'rowOptions' => function ($model) {
            /** @var $model common\models\Order */
            if ($model->status === 1) {
                return ['class' => 'success'];
            } elseif ($model->status === 2) {
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
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>

</div>

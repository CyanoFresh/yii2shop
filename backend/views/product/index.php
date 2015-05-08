<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/product', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1 class="page-header">
        <?= $this->title ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </h1>

    <?= $this->render('_search', [
        'model' => $searchModel
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'summaryOptions' => ['class' => 'alert alert-info'],
        'columns' => [
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    /** @var $model common\models\Product */
                    return Html::img($model->getMainImage('urlManagerFrontEnd'), [
                        'width' => '80px'
                    ]);
                },
            ],
            'name',
            'price:currency',
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    /** @var $model common\models\Product */
                    return Html::a($model->category->name, ['category/view', 'id' => $model->category->id]);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'status_id',
                'value' => function ($model) {
                    /** @var $model common\models\Product */
                    return Html::a($model->status->name, ['status/view', 'id' => $model->status->id]);
                },
                'format' => 'raw',
            ],

            ['class' => 'common\components\ActionButtonGroupColumn'],
        ],
    ]); ?>

</div>
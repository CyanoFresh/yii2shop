<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('product', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('product', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id',
                'value' => function ($model) {
                    return $model->image->image;
                },
                'format' => 'raw',
                'label' => 'image',
            ],
            'name',
            [
                'attribute' => 'price',
                'value' => function ($model) {
                    return Yii::$app->formatter->asCurrency($model->price);
                },
            ],
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return Html::a($model->category->name, ['category/view', 'id' => $model->category->id]);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'status_id',
                'value' => function ($model) {
                    return Html::a($model->status->name, ['status/view', 'id' => $model->status->id]);
                },
                'format' => 'raw',
            ],
            // 'date',
            // 'slug',
            // 'description:ntext',
            // 'meta_description',
            // 'meta_keywords',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
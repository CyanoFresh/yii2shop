<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/category', 'Categories');

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1 class="page-header">
        <?= Html::encode($this->title) ?>
        <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span>',
            ['create'],
            ['class' => 'btn btn-success pull-right']
        ) ?>
    </h1>

    <?= $this->render('_search', [
        'model' => $searchModel
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summaryOptions' => ['class' => 'alert alert-info'],
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->parent) {
                        return Html::a($model->parent->name, ['category/view', 'id' => $model->parent->id]);
                    }

                    return false;
                },
            ],
            'slug',
            ['class' => 'common\components\ActionButtonGroupColumn'],
        ],
    ]); ?>

</div>

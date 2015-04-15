<?php

use yii\helpers\Html;
use himiklab\sortablegrid\SortableGridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/slide', 'Slides');

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-index">

    <h1 class="page-header">
        <?= $this->title ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </h1>

    <?= $this->render('_search', [
        'model' => $searchModel
    ]) ?>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'summaryOptions' => ['class' => 'alert alert-info'],
        'columns' => [
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    /** @var $model common\models\Slide */
                    return Html::img(Yii::$app->urlManagerFrontEnd->baseUrl . '/uploads/slide/' . $model->id . '.jpg', [
                        'width' => '200px'
                    ]);
                },
            ],
            'title',
            'body:html',

            ['class' => 'common\components\ActionButtonGroupColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('category', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1 class="page-header">
        <?= Html::encode($this->title) ?>
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
            'id',
            'name',
            'parent_id',
            'slug',
            ['class' => 'backend\components\ActionButtonColumn'],
        ],
    ]); ?>

</div>

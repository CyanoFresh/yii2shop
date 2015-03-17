<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */

$this->title = Yii::t('categories', 'Update {modelClass}: ', [
    'modelClass' => 'Categories',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('categories', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('categories', 'Update');
?>
<div class="categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

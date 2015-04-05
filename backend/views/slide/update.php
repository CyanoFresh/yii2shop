<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */

$this->title = Yii::t('slide', 'Update {modelClass}: ', [
    'modelClass' => 'Slide',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('slide', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('slide', 'Update');
?>
<div class="slide-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

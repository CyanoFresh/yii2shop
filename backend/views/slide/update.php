<?php

/* @var $this yii\web\View */
/* @var $model common\models\Slide */

$this->title = Yii::t('backend/slide', 'Update Slide: ') . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/slide', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend/slide', 'Update');
?>
<div class="slide-update">

    <h1 class="page-header">
        <?= $this->title ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

/* @var $this yii\web\View */
/* @var $model common\models\Status */

$this->title = Yii::t('backend/status', 'Update status: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/status', 'Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend/status', 'Update');
?>
<div class="status-update">

    <h1 class="page-header">
        <?= $this->title ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

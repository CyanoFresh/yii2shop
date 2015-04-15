<?php
/* @var $this yii\web\View */
/* @var $model common\models\Status */

$this->title = Yii::t('backend/status', 'Create Status');

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/status', 'Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-create">

    <h1 class="page-header">
        <?= $this->title ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

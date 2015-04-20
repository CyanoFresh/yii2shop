<?php
/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = Yii::t('backend/category', 'Update Category: ') . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/category', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend/category', 'Update');
?>
<div class="category-update">

    <h1 class="page-header">
        <?= $this->title ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

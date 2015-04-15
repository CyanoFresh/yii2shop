<?php
/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = Yii::t('backend/category', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/category', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <h1 class="page-header">
        <?= $this->title ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

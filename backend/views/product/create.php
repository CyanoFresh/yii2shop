<?php
/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = Yii::t('backend/product', 'Create Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/product', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1 class="page-header">
        <?= $this->title ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

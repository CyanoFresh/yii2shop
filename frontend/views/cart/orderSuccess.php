<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = Yii::t('cart', 'Ordered successful');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cart', 'Cart'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?= Html::encode($this->title) ?></h1>

<div class="alert alert-success">
    <?= Yii::t('cart', 'Congratulations! Your request was successfully ordered. We will contact you soon') ?>
</div>

<p class="lead">
    <?= Yii::t('cart', 'Your order number: {orderNumber}', [
        'orderNumber' => $model->id,
    ]) ?>
</p>

<p>
    <?= Yii::t('cart', 'It can bu used when you are contact us to know some information about your order') ?>
</p>
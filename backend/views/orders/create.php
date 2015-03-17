<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = Yii::t('orders', 'Create Orders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('orders', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

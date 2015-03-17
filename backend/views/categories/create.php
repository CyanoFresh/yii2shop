<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Categories */

$this->title = Yii::t('categories', 'Create Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('categories', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

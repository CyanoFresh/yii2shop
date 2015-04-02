<?php
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Home');
?>
<h1 class="page-header text-center">
    <?= Yii::t('frontend', 'Last products') ?>
</h1>

<?= ListView::widget([
    'layout' => "<div class=\"row\">{items}</div>",
    'dataProvider' => $dataProvider,
    'itemView' => '/catalog/_product',
    'summaryOptions' => [
        'class' => 'alert alert-info'
    ],
]) ?>

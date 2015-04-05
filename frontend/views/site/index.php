<?php
use yii\bootstrap\Carousel;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Home');
?>

<?= Carousel::widget([
    'id' => 'home-slider',
    'controls' => [
        '<span class="icon-prev"></span>',
        '<span class="icon-next"></span>'
    ],
    'items' => [
        [
            'content' => '<img src="http://placehold.it/2048x800/000/fff"/>',
            'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
            'options' => [],
        ],
        [
            'content' => '<img src="http://placehold.it/2048x800/555/fff"/>',
            'caption' => '<h4>fsdfsdf</h4><p>sdfsdfsdf</p>',
            'options' => [],
        ],
        [
            'content' => '<img src="http://placehold.it/2048x800/999/fff"/>',
            'caption' => '<h4>afsdfasdf</h4><p>asdfasdfasdf</p>',
            'options' => [],
        ],
    ],
    'options' => [
        'class' => 'slide',
    ]
]) ?>

<div class="container">

    <h1 class="page-header text-center">
        <?= Yii::t('frontend', 'Last products') ?>
    </h1>

    <?= ListView::widget([
        'layout' => "<div class=\"row\">{items}</div>",
        'dataProvider' => $dataProvider,
        'itemView' => '/catalog/_product',
        'viewParams' => [
            'class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-6'
        ],
        'summaryOptions' => [
            'class' => 'alert alert-info'
        ],
    ]) ?>

</div>

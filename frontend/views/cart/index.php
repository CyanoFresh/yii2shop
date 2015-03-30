<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider common\models\Product */

$this->title = Yii::t('cart', 'Cart');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?= Html::encode($this->title) ?></h1>

<div class="row">
    <div class="col-sm-9">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'columns' => [
                [
                    'attribute' => 'image',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::img($model->mainImage, [
                            'width' => 80,
                        ]);
                    },
                    'contentOptions' => [
                        'style' => 'width: 15%',
                    ],
                ],
                'name',
                'price:currency',
                [
                    'class' => yii\grid\ActionColumn::className(),
                    'template' => '{remove}',
                    'buttons' => [
                        'remove' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['remove', 'id' => $model->id], [
                                'class' => 'btn btn-default btn-sm',
                            ]);
                        }
                    ],
                    'contentOptions' => [
                        'style' => 'width: 10%',
                    ],
                ]
            ],
        ]) ?>

        <div class="well">
            <?= Html::a(Yii::t('cart', 'Continue shopping'), ['catalog/index'], [
                'class' => 'btn btn-primary',
            ]) ?>
            <?= Html::a(Yii::t('cart', 'Clear Cart'), ['cart/clear'], [
                'class' => 'btn btn-primary',
            ]) ?>
            <?= Html::a(Yii::t('cart', 'Checkout'), ['cart/order'], [
                'class' => 'btn btn-primary',
            ]) ?>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Yii::t('cart', 'Summary') ?>
            </div>
            <div class="panel-body">
                <?= Yii::t('cart', 'Total') ?>: <b><?= Yii::$app->formatter->asCurrency(Yii::$app->cart->getCost()) ?></b>
                <br>
                <?= Yii::t('cart', 'Count of products') ?>: <b><?= Yii::$app->cart->getCount() ?></b>
            </div>
        </div>
    </div>
</div>
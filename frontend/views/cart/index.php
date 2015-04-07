<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = Yii::t('cart', 'Cart');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header"><?= Html::encode($this->title) ?></h1>

<div class="panel panel-default">
    <div class="panel-body">
        <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> ' . Yii::t('cart', 'Continue shopping'), ['catalog/index'], [
            'class' => 'btn btn-primary',
        ]) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('cart', 'Clear Cart'), ['cart/clear'], [
            'class' => 'btn btn-default ' . ((Yii::$app->cart->getCount() <= 0) ? 'disabled' : false),
        ]) ?>
        <?= Html::a('<span class="glyphicon glyphicon-ok"></span> ' . Yii::t('cart', 'Order'), ['cart/order'], [
            'class' => 'btn btn-success pull-right ' . ((Yii::$app->cart->getCount() <= 0) ? 'disabled' : false),
        ]) ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-9">
        <!-- TODO: wrong attribute labels -->
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
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->name, ['catalog/view', 'slug' => $model->slug, 'category' => $model->category->slug]);
                    },
                ],
                [
                    'attribute' => 'category_id',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->category->name, ['catalog/category', 'category' => $model->category->slug]);
                    },
                ],
                'price:currency',
                [
                    'class' => yii\grid\ActionColumn::className(),
                    'template' => '{remove}',
                    'buttons' => [
                        'remove' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['remove', 'id' => $model->id], [
                                'class' => 'btn btn-danger btn-sm',
                            ]);
                        }
                    ],
                    'contentOptions' => [
                        'style' => 'width: 10%',
                    ],
                ]
            ],
        ]) ?>
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
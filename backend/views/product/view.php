<?php

use common\models\Image;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('product', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$image_models = Image::findAll(['model_id' => $model->id]);
$images = null;

foreach ($image_models as $image) {
    $images .= Html::img(Yii::$app->urlManagerFrontEnd->baseUrl . '/uploads/product/' . $model->id . '/' . $image->id . '.jpg', ['width' => '200px']);
}
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('product', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('product', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => Html::img($model->mainImage, [
                    'width' => '200px'
                ]),
            ],
            'name',
            [
                'attribute' => 'price',
                'value' => $model->price . ' ' . Yii::$app->params['currency'],
            ],
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'value' => Html::a($model->category->name, ['category/view', 'id' => $model->category->id]),
            ],
            [
                'attribute' => 'status_id',
                'format' => 'raw',
                'value' => Html::a($model->status->name, ['status/view', 'id' => $model->status->id]),
            ],
            'date',
            'slug',
            'description:html',
            [
                'attribute' => 'images',
                'format' => 'raw',
                'value' => $images,
            ],
            'meta_description',
            'meta_keywords',
        ],
    ]) ?>

</div>

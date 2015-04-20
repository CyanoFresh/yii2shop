<?php
use common\models\Image;
use dosamigos\gallery\Gallery;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name . ' - ' . $model->category->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend/catalog', 'Catalog'), 'url' => ['catalog/index']];

if ($model->category->parent) {
    $this->title .= ' - ' . $model->category->parent->name;
    $this->params['breadcrumbs'][] = ['label' => $model->category->parent->name, 'url' => ['catalog/category', 'category' => $model->category->parent->slug]];
}

$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['catalog/category', 'category' => $model->category->slug]];
$this->params['breadcrumbs'][] = $model->name;

// Meta tags
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keywords]);

// Gallery images
$galleryItems[] = [
    'src' => Yii::$app->urlManager->baseUrl . '/uploads/product/' . $model->id . '/main.jpg',
    'options' => [
        'title' => $model->name,
    ],
];
foreach (Image::findAll(['model_id' => $model->id]) as $image) {
    $galleryItems[] = [
        'src' => Yii::$app->urlManager->baseUrl . '/uploads/product/' . $model->id . '/' . $image->id . '.jpg',
        'options' => [
            'title' => $model->name,
        ],
    ];
}
?>

<div class="row">
    <div class="col-sm-6">
        <?= Gallery::widget([
            'items' => $galleryItems,
            'id' => 'product-gallery-links',
        ]) ?>
    </div>

    <div class="col-sm-6">
        <h1 class="product-header">
            <?= $model->name ?>
        </h1>

        <hr>

        <p class="product-description">
            <?= $model->description ?>
        </p>

        <hr>

        <div class="product-price">
            <?= Yii::$app->formatter->asCurrency($model->price) ?>
            <?php if ($model->status_id): ?>
                <span class="status"
                      style="color: <?= $model->status->color ?>;
                          background: <?= $model->status->background ?>;
                          font-size: inherit">
                    <?= $model->status->name ?>
                </span>
            <?php endif ?>
        </div>

        <hr>

        <div class="product-button">
            <?= Html::a(Yii::t('frontend/catalog', 'Add To Cart'), ['cart/add', 'id' => $model->id], [
                'class' => 'btn btn-primary btn-lg'
            ]) ?>
        </div>

        <hr>

        <div class="row">
            <div class="col-sm-4">
                <h4><?= Yii::t('frontend/catalog', 'Share') ?></h4>
                <?= ijackua\sharelinks\ShareLinks::widget([
                    'viewName' => '@frontend/views/catalog/shareLinks',
                ]) ?>
            </div>
            <div class="col-sm-4">
                <h4><?= Yii::t('frontend/catalog', 'Category') ?></h4>
                <?= Html::a($model->category->name, ['catalog/category', 'category' => $model->category->slug]) ?>
            </div>
            <div class="col-sm-4">
                <h4><?= Yii::t('frontend/catalog', 'Date Created') ?></h4>
                <?= Yii::$app->formatter->asDatetime($model->date) ?>
            </div>
        </div>
    </div>
</div>
<?php
use common\models\Image;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('catalog', 'Catalog'), 'url' => ['catalog/index']];
$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['catalog/category', 'category' => $model->category->slug]];
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->meta_keywords]);
?>
<h1 class="page-header"><?= $this->title ?></h1>

<div class="row">
    <div class="col-sm-6">
        <?= Html::img($model->mainImage, [
            'class' => 'img-responsive img-display',
            'alt' => $model->name,
        ]) ?>

        <div class="product-images">
            <?= Html::img($model->mainImage, [
                'class' => 'active',
                'alt' => $model->name,
            ]) ?>

            <?php foreach (Image::findAll(['model_id' => $model->id]) as $image): ?>
                <?= Html::img(Yii::$app->urlManager->baseUrl . '/uploads/product/' . $model->id . '/' . $image->id . '.jpg', [
                    'alt' => $model->name,
                ]) ?>
            <?php endforeach ?>
        </div>
    </div>

    <div class="col-sm-6">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge"><?= $model->name ?></span>
                <?= $model->getAttributeLabel('name') ?>
            </li>
            <li class="list-group-item">
                <span class="badge"><?= Yii::$app->formatter->asCurrency($model->price) ?></span>
                <?= $model->getAttributeLabel('price') ?>
            </li>
            <a class="list-group-item" href="<?= \yii\helpers\Url::to(['catalog/category', 'category' => $model->category->slug]) ?>">
                <span class="badge"><?= $model->category->name ?></span>
                <?= $model->getAttributeLabel('category') ?>
            </a>
            <li class="list-group-item">
                <span class="badge"><?= Yii::$app->formatter->asDatetime($model->date) ?></span>
                <?= $model->getAttributeLabel('date') ?>
            </li>
            <li class="list-group-item">
                <?= $model->description ?>
            </li>
            <li class="list-group-item">
                <?= Html::a(Yii::t('catalog', 'Add To Cart'), ['cart/add', 'id' => $model->id], [
                    'class' => 'btn btn-default btn-block'
                ]) ?>
            </li>
        </ul>
    </div>
</div>
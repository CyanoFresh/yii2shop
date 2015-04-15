<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $class */
?>
<div class="<?= $class ?>">
    <div class="panel panel-default panel-product">
        <div class="panel-image">
            <?= Html::img($model->mainImage, [
                'class' => 'img-responsive',
            ]) ?>

            <?php if ($model->status_id): ?>
                <div class="promotion">
                    <span class="status"
                          style="color: <?= $model->status->color ?>;
                              background: <?= $model->status->background ?>">
                        <?= $model->status->name ?>
                    </span>
                </div>
            <?php endif ?>
        </div>
        <div class="panel-body">
            <h4>
                <?= Html::encode($model->name) ?>
            </h4>

            <p class="text-muted">
                <?= Html::a($model->category->name, ['catalog/category', 'category' => $model->category->slug], [
                    'class' => 'category-link',
                ]) ?>
            </p>

            <p><?= Yii::$app->formatter->asCurrency($model->price) ?></p>

            <?= Html::a(Yii::t('frontend/catalog', 'View'), ['catalog/view', 'slug' => $model->slug, 'category' => $model->category->slug], [
                'class' => 'btn btn-primary',
            ]) ?>
        </div>
    </div>
</div>
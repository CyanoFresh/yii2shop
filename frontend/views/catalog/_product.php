<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
?>
<div class="col-sm-4 col-lg-4 col-md-4 col-xs-6">
    <div class="panel panel-default panel-product">
        <div class="panel-image">
            <?= Html::img($model->mainImage, [
                'class' => 'img-responsive',
            ]) ?>

            <?php if ($model->status_id): ?>
                <div class="promotion">
                    <span class="status"
                          style="color: <?= $model->status->color ?>; background: <?= $model->status->background ?>">
                        <?= Html::encode($model->status->name) ?>
                    </span>
                </div>
            <?php endif ?>
        </div>
        <div class="panel-body">
            <h4>
                <?= Html::encode($model->name) ?>
            </h4>

            <p class="text-muted"><?= $model->category->name ?></p>

            <p><?= Yii::$app->formatter->asCurrency($model->price) ?></p>

            <?= Html::a(Yii::t('catalog', 'View'), ['catalog/view',
                'slug' => $model->slug,
                'category' => $model->category->slug,
            ], [
                'class' => 'btn btn-default',
            ]) ?>
        </div>
    </div>
</div>
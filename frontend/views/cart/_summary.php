<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('frontend/cart', 'Summary') ?>
    </div>

    <div class="panel-body">
        <?= Yii::t('frontend/cart', 'Count of products') ?>:
        <b><?= Yii::$app->cart->getCount() ?></b>

        <br>

        <?= Yii::t('frontend/cart', 'Total cost') ?>:
        <b><?= Yii::$app->formatter->asCurrency(Yii::$app->cart->getCost()) ?></b>
    </div>
</div>
<?php
use kartik\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = Yii::t('cart', 'Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cart', 'Cart'), 'url' => ['index']];
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
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->name, ['catalog/view', 'slug' => $model->slug, 'category' => $model->category->slug]);
                    },
                ],
                'price:currency',
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

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => '255']) ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => '255']) ?>
<?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('cart', 'Order'), ['class' => 'btn btn-default']) ?>
    <?= Html::resetButton(Yii::t('cart', 'Reset'), ['class' => 'btn btn-danger']) ?>
</div>

<?php ActiveForm::end() ?>
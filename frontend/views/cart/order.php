<?php
use kartik\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = Yii::t('frontend/cart', 'Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend/cart', 'Cart'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="page-header">
    <?= $this->title ?>
</h1>

<div class="row">
    <div class="col-sm-9">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'columns' => [
                [
                    'attribute' => 'image',
                    'label' => Yii::t('frontend/cart', 'Image'),
                    'format' => 'html',
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
                    'label' => Yii::t('frontend/cart', 'Product'),
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a($model->name, ['catalog/view', 'slug' => $model->slug, 'category' => $model->category->slug]);
                    },
                ],
                [
                    'attribute' => 'category_id',
                    'label' => Yii::t('frontend/cart', 'Category'),
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::a($model->category->name, ['catalog/category', 'category' => $model->category->slug]);
                    },
                ],
                [
                    'attribute' => 'price',
                    'format' => 'currency',
                    'label' => Yii::t('frontend/cart', 'Price'),
                ],
            ],
        ]) ?>
    </div>

    <div class="col-sm-3">
        <?= $this->render('_summary') ?>
    </div>
</div>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => '255']) ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => '255']) ?>
<?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('frontend/cart', 'Order'), ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton(Yii::t('frontend/cart', 'Reset'), ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end() ?>
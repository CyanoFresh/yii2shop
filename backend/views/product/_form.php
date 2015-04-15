<?php

use common\models\Category;
use common\models\Image;
use common\models\Status;
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use vova07\imperavi\Widget as Imperavi;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

$category_models = Category::find()->all();
$categories = ArrayHelper::map($category_models, 'id', 'name');

$status_models = Status::find()->all();
$statuses = ArrayHelper::map($status_models, 'id', 'name');

$image_models = Image::findAll(['model_id' => $model->id]);
$images = [];

foreach ($image_models as $image) {
    $images[] = Html::img(
        Yii::$app->urlManagerFrontEnd->baseUrl . '/uploads/product/' . $model->id . '/' . $image->id . '.jpg',
        ['class' => 'file-preview-image']
    );
}
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'image')->widget(FileInput::className(), [
        'options' => [
            'accept' => 'image/*',
        ],
        'pluginOptions' => [
            'showUpload' => false,
            'browseLabel' => Yii::t('backend/product', 'Browse'),
            'removeLabel' => Yii::t('backend/product', 'Delete'),
            'removeClass' => 'btn btn-danger',
            'initialPreview' => $model->isNewRecord ? false : [
                Html::img($model->getMainImage('urlManagerFrontEnd'), ['class' => 'file-preview-image'])
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'images[]')->widget(FileInput::className(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'maxFileCount' => 10,
            'showUpload' => false,
            'browseLabel' => Yii::t('backend/product', 'Browse'),
            'removeLabel' => Yii::t('backend/product', 'Delete'),
            'removeClass' => 'btn btn-danger',
            'initialPreview' => $images,
        ],
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => '255']) ?>

    <?= $form->field($model, 'price', [
        'addon' => [
            'prepend' => [
                'content' => Yii::$app->formatter->currencyCode,
            ],
        ],
    ])->input('number') ?>

    <?= $form->field($model, 'description')->widget(Imperavi::className(), [
        'settings' => [
            'minHeight' => 200,
            'plugins' => [
                'table',
                'video',
                'fontsize',
                'fontfamily',
                'fontcolor',
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'date')->widget(DateTimePicker::className(), [
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd hh:ii',
            'todayBtn' => true,
            'convertFormat' => true,
        ],
    ]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($categories) ?>

    <?= $form->field($model, 'status_id')->dropDownList($statuses) ?>

    <?= $form->field($model, 'slug')
        ->textInput(['maxlength' => 255])
        ->hint(Yii::t('backend/product', 'If empty it will be generated from name')) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('backend/product', 'Create') : Yii::t('backend/product', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use kartik\widgets\FileInput;
use vova07\imperavi\Widget as Imperavi;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'sortOrder')->textInput() ?>

    <?= $form->field($model, 'image')->widget(FileInput::className(), [
        'options' => [
            'accept' => 'image/jpeg',
        ],
        'pluginOptions' => [
            'showUpload' => false,
            'browseLabel' => Yii::t('slide', 'Browse'),
            'removeLabel' => Yii::t('slide', 'Delete'),
            'removeClass' => 'btn btn-danger',
            'initialPreview' => $model->isNewRecord ? false : [
                Html::img(Yii::$app->urlManagerFrontEnd->baseUrl . '/uploads/slide/' . $model->id . '.jpg', ['class' => 'file-preview-image'])
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(Imperavi::className(), [
        'settings' => [
            'minHeight' => 200,
            'plugins' => [
                'fontsize',
                'fontfamily',
                'fontcolor',
            ],
            'buttons' => ['html', 'formatting', 'bold', 'italic', 'deleted', 'link'],
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('slide', 'Create') : Yii::t('slide', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

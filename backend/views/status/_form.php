<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\ColorInput;

/* @var $this yii\web\View */
/* @var $model common\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'color')->widget(ColorInput::className(), [
        'options' => [
            'placeholder' => Yii::t('backend/status', 'Select color ...'),
        ],
        'pluginOptions' => [
            'chooseText' => Yii::t('backend/status', 'Choose'),
            'cancelText' => Yii::t('backend/status', 'Cancel'),
        ],
    ]) ?>

    <?= $form->field($model, 'background')->widget(ColorInput::className(), [
        'options' => [
            'placeholder' => Yii::t('backend/status', 'Select color ...'),
        ],
        'pluginOptions' => [
            'chooseText' => Yii::t('backend/status', 'Choose'),
            'cancelText' => Yii::t('backend/status', 'Cancel'),
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('backend/status', 'Create') : Yii::t('backend/status', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use vova07\imperavi\Widget as Imperavi;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */

$categories = $model->find()->all();
$categories = ArrayHelper::map($categories, 'id', 'name');
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

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

    <?= $form->field($model, 'parent_id')->dropDownList($categories, [
        'prompt' => Yii::t('yii', '(not set)'),
    ]) ?>

    <?= $form->field($model, 'slug')
        ->textInput(['maxlength' => 255])
        ->hint(Yii::t('backend/category', 'If empty it will be generated from name')) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord
                ? Yii::t('backend/category', 'Create')
                : Yii::t('backend/category', 'Save'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

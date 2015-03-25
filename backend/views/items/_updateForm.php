<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form row">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <div class="col-sm-6">

        <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'price')->textInput() ?>

        <?= $form->field($model, 'category_id')->textInput() ?>

        <?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'short')->widget(Widget::className()) ?>

        <?= $form->field($model, 'full')->widget(Widget::className()) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

        <?= $form->field($model, 'keywords')->textarea(['rows' => 2]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('items', 'Create') : Yii::t('items', 'Update'), [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            ]) ?>
        </div>
    </div>

    <div class="col-sm-6">
    </div>

    <?php ActiveForm::end(); ?>

</div>

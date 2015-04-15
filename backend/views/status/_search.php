<?php

use kartik\widgets\ColorInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StatusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?= Yii::t('backend/status', 'Search Statuses') ?>
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="status-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <?= $form->field($model, 'id') ?>

                <?= $form->field($model, 'name') ?>

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
                    <?= Html::submitButton(Yii::t('backend/status', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('backend/status', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

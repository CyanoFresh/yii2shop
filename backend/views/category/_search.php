<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */

$categories = $model->find()->all();
$categories = ArrayHelper::map($categories, 'id', 'name');
?>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?= Yii::t('backend/category', 'Search Categories') ?>
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="category-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <?= $form->field($model, 'id') ?>

                <?= $form->field($model, 'parent_id')->dropDownList($categories, [
                    'prompt' => Yii::t('yii', '(not set)'),
                ]) ?>

                <?= $form->field($model, 'slug') ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'description') ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('backend/category', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('backend/category', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

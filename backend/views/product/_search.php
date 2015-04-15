<?php

use common\models\Status;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */

$category_models = Category::find()->all();
$categories = ArrayHelper::map($category_models, 'id', 'name');

$status_models = Status::find()->all();
$statuses = ArrayHelper::map($status_models, 'id', 'name');
?>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?= Yii::t('backend/product', 'Search Products') ?>
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="product-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <div class="row">
                    <div class="col-sm-3">
                        <?= $form->field($model, 'id') ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'name') ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'price') ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($model, 'slug') ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'category_id')->dropDownList($categories, [
                            'prompt' => Yii::t('backend/product', '- select category -'),
                        ]) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'status_id')->dropDownList($statuses, [
                            'prompt' => Yii::t('backend/product', '- select status -'),
                        ]) ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('backend/product', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('backend/product', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

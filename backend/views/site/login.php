<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model backend\models\LoginForm */

$this->title = Yii::t('backend/login', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="page-header"><?= $this->title ?></h1>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div class="form-group">
                <?= Html::submitButton(
                    Yii::t('backend/login', 'Login'),
                    ['class' => 'btn btn-primary', 'name' => 'login-button']
                ) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
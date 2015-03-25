<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('backend', 'Home');
?>
<div class="site-index">
    <div class="alert alert-info">
        <?= Yii::t('backend', 'Welcome back, {username}!', [
            'username' => Yii::$app->user->identity->username,
        ]) ?>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('backend', 'Items') ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <?= Html::a(Yii::t('backend', 'Add item'), ['/items/create'], [
                        'class' => 'btn btn-block btn-primary',
                    ]) ?>
                </div>
                <div class="col-sm-6">
                    <?= Html::a(Yii::t('backend', 'Manage items'), ['/items/index'], [
                        'class' => 'btn btn-block btn-primary',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('backend', 'Admin Panel') ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <?= Html::a(Yii::t('backend', 'Manage categories'), ['/categories/index'], [
                        'class' => 'btn btn-block btn-primary',
                    ]) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::a(Yii::t('backend', 'Manage orders'), ['/orders/index'], [
                        'class' => 'btn btn-block btn-primary',
                    ]) ?>
                </div>
                <div class="col-sm-4">
                    <?= Html::a(Yii::t('backend', 'View site'), Yii::$app->urlManagerFrontEnd->baseUrl, [
                        'class' => 'btn btn-block btn-primary',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

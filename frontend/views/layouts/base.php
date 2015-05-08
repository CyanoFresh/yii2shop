<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - <?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <header>
        <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => Yii::t('frontend', 'Home'), 'url' => ['site/index']],
                ['label' => Yii::t('frontend', 'Catalog'), 'url' => ['catalog/index']],
                [
                    'label' => Yii::t('frontend', 'Cart') . '&nbsp' . Html::tag('span', Yii::$app->cart->getCount(), ['class' => 'badge']),
                    'url' => ['cart/index'],
                ],
            ];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
            NavBar::end();
        ?>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h3><?= Yii::t('frontend', 'Support') ?></h3>
                        <ul>
                            <li class="supportLi">
                                <p><?= Yii::t('frontend', 'Contact us with preferable method:') ?></p>
                                <h4>
                                    <i class="glyphicon glyphicon-phone"></i>
                                    <?= Yii::$app->params['contactPhone'] ?>
                                </h4>
                                <h4>
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    <?= Yii::$app->params['contactEmail'] ?>
                                </h4>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h3><?= Yii::t('frontend', 'Shop') ?></h3>
                        <ul>
                            <li><?= Html::a(Yii::t('frontend', 'Home'), ['site/index']) ?></li>
                            <li><?= Html::a(Yii::t('frontend', 'Catalog'), ['catalog/index']) ?></li>
                            <li><?= Html::a(Yii::t('frontend', 'Cart'), ['cart/index']) ?></li>
                        </ul>
                    </div>

                    <!--
                    TODO: Subscribe form
                    <div class="col-sm-4">
                        <h3><?= Yii::t('frontend', 'Stay In Touch') ?></h3>
                    </div>
                    -->
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div>
        <!--/.footer-->

        <div class="footer-bottom">
            <div class="container">
                <p class="pull-left">
                    © <?= Yii::$app->name ?> <?= date('Y') ?>. <?= Yii::t('frontend', 'All rights reserved') ?>.
                </p>
            </div>
        </div>
        <!--/.footer-bottom-->
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

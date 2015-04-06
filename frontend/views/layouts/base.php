<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\assets\AppAsset;
//use raoul2000\bootswatch\BootswatchAsset;

/* @var $this \yii\web\View */
/* @var $content string */

//BootswatchAsset::$theme = 'Flatly';
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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
                    <div class="col-sm-4 col-xs-6">
                        <h3><?= Yii::t('frontend', 'Support') ?></h3>
                        <ul>
                            <li>
                                <p><?= Yii::t('frontend', 'Contact us with preferable method:') ?></p>
                                <h4>
                                    <i class="fa fa-phone"></i>
                                    <?= Yii::$app->params['contactPhone'] ?>
                                </h4>
                                <h4>
                                    <i class="fa fa-envelope-o"></i>
                                    <?= Yii::$app->params['contactEmail'] ?>
                                </h4>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <h3><?= Yii::t('frontend', 'Shop') ?></h3>
                        <ul>
                            <li><?= Html::a(Yii::t('frontend', 'Home'), ['site/index']) ?></li>
                            <li><?= Html::a(Yii::t('frontend', 'Catalog'), ['catalog/index']) ?></li>
                            <li><?= Html::a(Yii::t('frontend', 'Cart'), ['cart/index']) ?></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-xs-12 ">
                        <h3><?= Yii::t('frontend', 'Stay In Touch') ?></h3>
                        <!-- TODO: Subscribe form -->
<!--                        <ul>-->
<!--                            <li>-->
<!--                                <div class="input-append newsletter-box text-center">-->
<!--                                    <input type="text" class="full text-center" placeholder="Email ">-->
<!--                                    <button class="btn  bg-gray" type="button"> Lorem ipsum <i class="fa fa-long-arrow-right"> </i> </button>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                        <ul class="social">-->
<!--                            <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>-->
<!--                            <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>-->
<!--                            <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>-->
<!--                            <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>-->
<!--                            <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>-->
<!--                        </ul>-->
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div>
        <!--/.footer-->

        <div class="footer-bottom">
            <div class="container">
                <p class="pull-left"><?= Yii::t('frontend', 'Copyright') ?> © <?= Yii::$app->name ?> <?= date('Y') ?>. <?= Yii::t('frontend', 'All right reserved') ?>. </p>
            </div>
        </div>
        <!--/.footer-bottom-->
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

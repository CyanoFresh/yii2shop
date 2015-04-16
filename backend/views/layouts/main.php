<?php
use backend\assets\AppAsset;
use common\models\Order;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$newOrders = Order::find()->where(['status' => Order::STATUS_NEW])->count();
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

        // Left menu
        $menuItemsLeft = [
            //['label' => Yii::t('backend', 'Home'), 'url' => ['site/index']],
            ['label' => Yii::t('backend', 'Shop'), 'items' => [
                ['label' => Yii::t('backend', 'Products'), 'url' => ['product/index']],
                ['label' => Yii::t('backend', 'Categories'), 'url' => ['category/index']],
                ['label' => Yii::t('backend', 'Statuses'), 'url' => ['status/index']],
            ]],
            ['label' => Yii::t('backend', 'Slides'), 'url' => ['/slide/index']],
            [
                'label' => Yii::t('backend', 'Orders')
                    . ' '
                    . Html::tag('span', $newOrders, ['class' => 'badge']),
                'url' => ['order/index'],
            ],
        ];
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => $menuItemsLeft,
            'encodeLabels' => false,
        ]);

        // Right menu
        $menuItems[] = [
            'label' => Yii::t('backend', 'View site'),
            'url' => Yii::$app->urlManagerFrontEnd->baseUrl,
            'options' => [
                'target' => '_blank'
            ],
            'linkOptions' => [
                'target' => '_blank'
            ]
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => Yii::t('backend', 'Login'), 'url' => ['site/login']];
        } else {
            $menuItems[] = [
                'label' => Yii::t('backend', 'Logout ({username})', [
                    'username' => Yii::$app->user->identity->username
                ]),
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);

        NavBar::end();
        ?>
    </header>

    <main>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <hr>
            Yii2Shop &copy; <?= date('Y') ?>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

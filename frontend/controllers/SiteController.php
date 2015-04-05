<?php
namespace frontend\controllers;

use common\models\Product;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'fullwide';
        $dataProvider = new ArrayDataProvider([
            'allModels' => Product::find()->limit(8)->orderBy('date DESC')->all()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}

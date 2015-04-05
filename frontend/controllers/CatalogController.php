<?php

namespace frontend\controllers;

use common\models\Category;
use Yii;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($slug)
    {
        $model = $this->findModel($slug);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCategory($category)
    {
        $model = $this->findCategory($category);

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getProducts(),
            'sort' => [
                // Order by date for default
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
            'pagination' => [
                // Prevent creating additional params in the URL. For SEO
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ],
        ]);

        return $this->render('category', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Product model based on its slug.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($slug)
    {
        if (($model = Product::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('frontend', 'The requested page does not exist.'));
        }
    }

    /**
     * Finds the Category model based on its slug.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCategory($slug)
    {
        if (($model = Category::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('frontend', 'The requested page does not exist.'));
        }
    }

}

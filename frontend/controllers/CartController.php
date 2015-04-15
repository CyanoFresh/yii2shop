<?php

namespace frontend\controllers;

use common\models\Product;
use common\models\Order;
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CartController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => Yii::$app->cart->getPositions(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd($id)
    {
        $model = $this->findModel($id);

        Yii::$app->cart->put($model, 1);

        return $this->redirect(['index']);
    }

    public function actionRemove($id)
    {
        $model = $this->findModel($id);

        Yii::$app->cart->remove($model);

        return $this->redirect(['index']);
    }

    public function actionClear()
    {
        Yii::$app->cart->removeAll();

        return $this->redirect(['index']);
    }

    public function actionOrder()
    {
        $cartPositions = Yii::$app->cart->getPositions();

        if (!$cartPositions or $cartPositions === null) {
            return $this->redirect(['index']);
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $cartPositions,
        ]);

        $model = new Order();

        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->total_cost = Yii::$app->cart->getCost();
            $model->date = date('Y-m-d H:i');
            $model->data = Yii::$app->cart->getSerialized();

            if ($model->validate() && $model->save()) {
                Yii::$app->cart->removeAll();

                return $this->render('orderSuccess', [
                    'model' => $model,
                ]);
            }
        }

        return $this->render('order', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Product model based on its slug.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('frontend', 'The requested page does not exist.'));
        }
    }

}

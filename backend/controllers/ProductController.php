<?php

namespace backend\controllers;

use common\models\Image;
use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update' , 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product(['scenario' => 'create']);
        $model->date = date('Y-m-d H:i');

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->images = UploadedFile::getInstances($model, 'images');

            if ($model->validate() && $model->save() && $model->image) {
                // Working directory
                $dir = Yii::getAlias('@frontend/web/uploads/product/' . $model->id);
                FileHelper::createDirectory($dir);

                // Save main image
                $model->image->saveAs($dir . '/main.jpg');

                // Save images
                if ($model->images) {
                    foreach ($model->images as $image) {
                        $imageModel = new Image();
                        $imageModel->model_id = $model->id;
                        $imageModel->save();

                        $image->saveAs($dir . '/' . $imageModel->id . '.jpg');
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->images = UploadedFile::getInstances($model, 'images');

            if ($model->validate() && $model->save()) {
                $dir = Yii::getAlias('@frontend/web/uploads/product/' . $model->id);

                if ($model->image) {
                    $model->image->saveAs($dir . '/main.jpg');
                }

                if ($model->images) {
                    $imageModels = Image::findAll(['model_id' => $model->id]);
                    if ($imageModels) {
                        foreach ($imageModels as $image) {
                            $file = $dir . '/' . $image->id . '.jpg';

                            if (file_exists($file)) {
                                unlink($file);
                            }

                            $image->delete();
                        }
                    }

                    foreach ($model->images as $image) {
                        $imageModel = new Image();
                        $imageModel->model_id = $model->id;
                        $imageModel->save();

                        $image->saveAs($dir . '/' . $imageModel->id . '.jpg');
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $dir = Yii::getAlias('@frontend/web/uploads/product/' . $model->id);

        FileHelper::removeDirectory($dir);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
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
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

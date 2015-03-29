<?php

namespace frontend\controllers;

use yii\web\Controller;

class CartController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}

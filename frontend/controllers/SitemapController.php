<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\Response;
use common\models\Product;
use common\models\Category;

class SitemapController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml');

        $sitemap = $this->renderPartial('index', ['urls' => $this->urls]);

        return $sitemap;
    }

    public function getUrls()
    {
        $urls = [];

        $urls[] = Url::to(['site/index'], true);
        $urls[] = Url::to(['catalog/index'], true);

        foreach (Product::find()->all() as $item) {
            $urls[] = Url::to(['catalog/view', 'slug' => $item->slug, 'category' => $item->category->slug], true);
        }
        foreach (Category::find()->all() as $item) {
            $urls[] = Url::to(['catalog/category', 'category' => $item->slug], true);
        }

        return $urls;
    }

}
